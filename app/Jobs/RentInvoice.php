<?php

namespace App\Jobs;

use App\Mail\InvoiceSent;
use App\Models\Invoice;
use App\Models\Mail;
use App\Models\Scopes\ManagerScope;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail as FacadesMail;

class RentInvoice implements ShouldQueue
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
            $new_data = [
                'due_date' => Carbon::now(),
                'from' => Carbon::now()->subMonth(),
                'to' => Carbon::now(),
                'invoice_details' => 'Please pay your rent',
                'invoice_title' => 'Rent Invoice',
                'invoice_number' => $invoice_number,
                'amount' => $tenant->rent,
                'quantity' => 1
            ];
            // $mail = FacadesMail::to('lodekib@gmail.com')->send(new InvoiceSent($tenant, $new_data));
            $mail_config = Mail::withoutGlobalScope(new ManagerScope())->where('manager_id', $tenant->manager_id)->first();
            $mail_config->mailer()->to($tenant->email)->send(new InvoiceSent($tenant, $new_data));
            $final_data = [
                'manager_id' => $tenant->manager_id,
                'tenant_id' => $tenant->id,
                'national_id' => $tenant->id_number,
                'invoice_number' => $invoice_number,
                'invoice_type' => 'Rent',
                'due_date' => $new_data['due_date'],
                'from' => $new_data['from'],
                'to' => $new_data['to'],
                'tenant_name' => $tenant->full_names,
                'property_name' => $tenant->property_name,
                'unit_name' => $tenant->unit_name,
                'invoice_description' => $new_data['invoice_details'],
                'invoice_status' => 'pending',
                'amount_invoiced' =>  $tenant->rent,
                'balance' => $tenant->rent
            ];
            $final_invoice =  Invoice::create($final_data);
            $total_debit = Statement::withoutGlobalScope(new ManagerScope())->where('tenant_name', $tenant->full_names)->sum('debit');
            $total_credit = Statement::withoutGlobalScope(new ManagerScope())->where('tenant_name', $tenant->full_names)->sum('credit');

            $statement_data = [
                'manager_id' => $tenant->manager_id,
                'tenant_id' => $tenant->id,
                'tenant_name' => $tenant->full_names,
                'description' => 'Rent Invoice',
                'reference' => $final_invoice->invoice_number,
                'debit' => $final_invoice->balance,
                'credit' => 0,
                'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance)
            ];
            $statement = Statement::create($statement_data);
            InvoiceReceiptAutoAllocation::handleNewInvoice($tenant, $final_invoice);


            $tenant->update(['is_rent_invoiced' => true]);
        }
    }
}
