<?php

namespace App\Jobs;

use App\Mail\InvoiceSent;
use App\Models\Invoice;
use App\Models\Mail as ModelsMail;
use App\Models\Scopes\ManagerScope;
use App\Models\Statement;
use App\Models\Tenant;
use App\Models\Utility;
use App\Services\InvoiceReceiptAutoAllocation;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class GarbageInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tenants = Tenant::withoutGlobalScope(new ManagerScope())->get();
        foreach ($tenants as $tenant) {
            $invoice_number = strtoupper(substr($tenant->property_name, 0, 3)) . "-" . time();
            $value  = Utility::withoutGlobalScope(new ManagerScope())->where('property_name', $tenant->property_name)->where('utility_name', 'Garbage')->first();
            if ($value != null) {
                $amount =  $value->amount;
                $quantity = 1;

                $new_data = [
                    'due_date' => Carbon::now(),
                    'from' => Carbon::now()->subMonth(),
                    'invoice_title' => 'Garbage',
                    'invoice_number' => $invoice_number,
                    'amount' => $amount,
                    'quantity' => $quantity
                ];

                // $invoice =  InvoiceTenant::invoiceTenant($tenant->first(), $new_data);
                // $mail = Mail::to($tenant->email)->send(new InvoiceSent($tenant, $new_data));
                $mail_config = ModelsMail::withoutGlobalScope(new ManagerScope())->where('manager_id', $tenant->manager_id)->first();
                $mail_config->mailer()->to($tenant->email)->send(new InvoiceSent($tenant, $new_data));
                $final_data = [
                    'manager_id' => $tenant->manager_id,
                    'tenant_id' => $tenant->id,
                    'national_id' => $tenant->id_number,
                    'invoice_number' => $invoice_number,
                    'invoice_type' => 'Garbage',
                    'due_date' => $new_data['due_date'],
                    'from' => $new_data['from'],
                    'to' => $new_data['to'],
                    'tenant_name' => $tenant->full_names,
                    'property_name' => $tenant->property_name,
                    'unit_name' => $tenant->unit_name,
                    'invoice_description' => $new_data['invoice_details'],
                    'amount_invoiced' =>  $amount,
                    'balance' =>  $amount
                ];
                $final_invoice = Invoice::create($final_data);

                $total_debit = Statement::withoutGlobalScope(new ManagerScope())->where('tenant_name', $tenant->full_names)->sum('debit');
                $total_credit = Statement::withoutGlobalScope(new ManagerScope())->where('tenant_name', $tenant->full_names)->sum('credit');

                $statement_data = [
                    'manager_id' => $tenant->manager_id,
                    'tenant_id' => $tenant->id,
                    'tenant_name' => $tenant->full_names,
                    'description' => 'Garbage Invoice',
                    'reference' => $final_invoice->invoice_number,
                    'debit' => $final_invoice->balance,
                    'credit' => 0,
                    'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                    'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance)
                ];
                $statement = Statement::create($statement_data);
                InvoiceReceiptAutoAllocation::handleNewInvoice($tenant, $final_invoice);

                $tenant->update(['is_garbage_invoiced' => true]);
            } else {
                continue;
            }
        }
    }
}
