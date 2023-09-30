<?php

namespace App\Jobs;

use App\Mail\InvoiceSent;
use App\Models\Invoice;
use App\Models\Mail;
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
        $tenants = Tenant::get();
        foreach ($tenants as $tenant) {
            $invoice_number = strtoupper(substr($tenant->first()->property_name, 0, 3)) . "-" . time();
            $new_data =
                [
                    'due_date' => Carbon::now(),
                    'from' => Carbon::now()->subMonth(),
                    'to' => Carbon::now(),
                    'invoice_details' => 'Please pay your rent',
                    'invoice_title' => 'Rent Invoice',
                    'invoice_number' => $invoice_number,
                    'amount' => $tenant->first()->rent,
                    'quantity' => 1
                ];

            // $mail = Mail::to($tenant->first()->email)->send(new InvoiceSent($tenant->first(), $new_data));
            $mail_config = Mail::where('manager_id', auth()->id());
            $get_mail_config = Mail::find($mail_config->first()->id);
            $get_mail_config->mailer()->to($tenant->first()->email)->send(new InvoiceSent($tenant->first(), $new_data));
            $final_data = [
                'tenant_id' => $tenant->first()->id,
                'invoice_number' => $invoice_number,
                'invoice_type' => 'Rent',
                'due_date' => $new_data['due_date'],
                'from' => $new_data['from'],
                'to' => $new_data['to'],
                'tenant_name' => $tenant->first()->full_names,
                'property_name' => $tenant->first()->property_name,
                'unit_name' => $tenant->first()->unit_name,
                'invoice_description' => $new_data['invoice_details'],
                'amount_invoiced' =>  $tenant->first()->rent,
                'balance' => $tenant->first()->rent
            ];
            $final_invoice =  Invoice::create($final_data);
            $total_debit = Statement::where('tenant_name', $tenant->first()->full_names)->sum('debit');
            $total_credit = Statement::where('tenant_name', $tenant->first()->full_names)->sum('credit');

            $statement_data = [
                'tenant_id' => $tenant->first()->id,
                'tenant_name' => $tenant->first()->full_names,
                'description' => 'Rent Invoice',
                'reference' => $final_invoice->invoice_number,
                'debit' => $final_invoice->balance,
                'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance)
            ];
            $statement = Statement::create($statement_data);
            InvoiceReceiptAutoAllocation::handleNewInvoice($tenant->first(), $final_invoice);


            $tenant->update(['is_rent_invoiced' => true]);
        }
    }
}
