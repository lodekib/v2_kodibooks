<?php

namespace App\Filament\Imports;

use App\Models\Invoice;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use DateTime;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class InvoiceImporter extends Importer
{
    protected static ?string $model = Invoice::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('tenant_name')
                ->requiredMapping()
                ->rules(['required', 'max:100', 'exists:tenants,full_names']),
            ImportColumn::make('property_name')
                ->requiredMapping()
                ->rules(['required', 'max:255', 'exists:properties,property_name']),
            ImportColumn::make('unit_name')
                ->requiredMapping()
                ->rules(['required', 'max:30', 'exists:units,unit_name']),
            ImportColumn::make('national_id')
                ->requiredMapping()
                ->rules(['required', 'max:20', 'exists:tenants,id_number']),
            ImportColumn::make('invoice_number')
                ->requiredMapping()
                ->rules(['required', 'max:50']),
            ImportColumn::make('invoice_type')
                ->requiredMapping()
                ->rules(['required', 'max:40']),
            ImportColumn::make('invoice_description')
                ->requiredMapping()
                ->rules(['required', 'max:65535']),
            ImportColumn::make('invoice_status')
                ->requiredMapping()
                ->rules(['required', 'max:30']),
            ImportColumn::make('amount_invoiced')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('due_date')
                ->rules(['date']),
            ImportColumn::make('from')
                ->rules(['date']),
            ImportColumn::make('invoice_date')
                ->rules(['date', 'required']),
        ];
    }

    public function resolveRecord(): ?Invoice
    {
        $tenant = Tenant::where('id_number', $this->data['national_id'])->pluck('id');
        $invoice_data = array_merge($this->data, [
            'tenant_id' => $tenant[0],
            'invoice_status' => 'pending',
            'balance' => $this->data['amount_invoiced'],
            'to' => array_key_exists('to', $this->data) ? DateTime::createFromFormat('d-m-Y', $this->data['to'])->format('Y-m-d') : null,
            'from' => array_key_exists('from', $this->data) ? DateTime::createFromFormat('d-m-Y', $this->data['from'])->format('Y-m-d') : null,
            'due_date' => array_key_exists('due_date', $this->data) ? DateTime::createFromFormat('d-m-Y', $this->data['from'])->format('Y-m-d') : null,
            'created_at' => DateTime::createFromFormat('d-m-Y', $this->data['invoice_date'])->format('Y-m-d H:i:s')
        ]);
        $invoice = Invoice::create($invoice_data);
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

            return $invoice;
        }
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your invoice import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
