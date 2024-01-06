<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use App\Models\Invoice;
use App\Models\Statement;
use App\Models\Unit;
use App\Services\InvoiceReceiptAutoAllocation;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()->success()->color('success')->body('Tenant has been created successfully !');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $unit  = Unit::select(['property_id', 'id'])->where('unit_name', $data['unit_name'])->get();
        $tenant_data = array_merge(
            $data,
            [
                'property_id' => $unit->first()->property_id,
                'slug' => substr(md5(uniqid(rand(), true)), 0, 6),
                'balance' => intval($data['rent']) + intval($data['deposit'])
            ]
        );
        $tenant = $this->getModel()::create($tenant_data);

        if ($tenant) {
            $unit->first()->update([
                'status' => 'occupied',
                'tenant_id' => $tenant->id,
                'rent' => $data['rent'],
                'deposit' => $data['deposit']
            ]);

            //CREATE THE DEPOSIT INVOICE
            $invoice_number = strtoupper(substr($tenant->property_name, 0, 3)) . "-" . time();
            $final_invoice_data = [
                'tenant_id' => $tenant->id,
                'national_id' => $tenant->id_number,
                'invoice_number' => $invoice_number,
                'invoice_type' => 'Deposit',
                'due_date' => Carbon::now(),
                'from' => Carbon::now(),
                'to' => Carbon::now(),
                'tenant_name' => $tenant->full_names,
                'property_name' => $tenant->property_name,
                'unit_name' => $tenant->unit_name,
                'invoice_description' => 'Deposit Invoice',
                'amount_invoiced' => $tenant->deposit,
                'invoice_status' => 'pending',
                'balance' => $tenant->deposit
            ];

            $final_invoice = Invoice::create($final_invoice_data);
            //check for auto invoicing 
            if ($final_invoice) {
                //TODO::OPTIMIZATION NEEDED
                $total_debit = Statement::where('tenant_name', $tenant->full_names)->sum('debit');
                $total_credit = Statement::where('tenant_name', $tenant->full_names)->sum('credit');

                $statement_data = [
                    'tenant_id' => $tenant->id,
                    'tenant_name' => $tenant->full_names,
                    'description' => "Deposit invoice",
                    'reference' => $final_invoice->invoice_number,
                    'debit' => $final_invoice->balance,
                    'credit' => 0,
                    'balance' => $total_debit - ($total_credit - $final_invoice->balance),
                    'cummulative_balance' => $total_debit - ($total_credit - $final_invoice->balance),
                    's_balance' => $total_debit - ($total_credit - $final_invoice->balance),

                ];
                Statement::create($statement_data);
                InvoiceReceiptAutoAllocation::handleNewInvoice($final_invoice);
            }
            //END
        }
        return $tenant;
    }
}
