<?php

namespace App\Filament\Manager\Resources\InvoiceResource\Pages;

use App\Filament\Manager\Resources\InvoiceResource;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()->color('success')
            ->body('Invoice created successfully.');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $tenant = Tenant::where('unit_name', $data['unit_name'])->get(['full_names', 'id', 'id_number'])->first();
        $invoice_data = array_merge($data, [
            'tenant_id' => $tenant->id,
            'tenant_name' => $tenant->full_names,
            'national_id' => $tenant->id_number,
            'invoice_status' => 'pending',
            'balance' => $data['amount_invoiced']
        ]);
        $invoice =  $this->getModel()::create($invoice_data);
        if ($invoice) {
            $debit_credit = Statement::selectRaw('tenant_name, SUM(debit) as total_debit, SUM(credit) as total_credit')
                ->where('tenant_name', $invoice->tenant_name)
                ->groupBy('tenant_name')
                ->first();
            $statement_data = [
                'tenant_id' => $invoice->tenant_id,
                'tenant_name' => $invoice->tenant_name,
                'description' => $invoice->invoice_type . " invoice",
                'reference' => $invoice->invoice_number,
                'debit' => $invoice->balance,
                'credit' => 0,
                'balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit - $invoice->balance) : $invoice->balance,
                'cummulative_balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit - $invoice->balance) : $invoice->balance
            ];
            Statement::create($statement_data);
            InvoiceReceiptAutoAllocation::handleNewInvoice($invoice);
        }
        return $invoice;
    }
}
