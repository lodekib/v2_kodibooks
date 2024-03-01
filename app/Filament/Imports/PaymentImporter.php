<?php

namespace App\Filament\Imports;

use App\Models\Payment;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PaymentImporter extends Importer
{
    protected static ?string $model = Payment::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('property_name')
                ->requiredMapping()
                ->rules(['required', 'max:100', 'exists:properties,property_name']),
            ImportColumn::make('tenant_name')
                ->requiredMapping()
                ->rules(['required', 'max:255', 'exists:tenants,full_names']),
            ImportColumn::make('unit_name')
                ->requiredMapping()
                ->rules(['required', 'max:30']),
            ImportColumn::make('national_id')
                ->requiredMapping()
                ->rules(['required', 'max:20', 'exists:tenants,id_number']),
            ImportColumn::make('receipt_number')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('reference_number')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('mode_of_payment')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('amount')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('paid_date')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?Payment
    {
        $tenant = Tenant::where('id_number', $this->data['national_id'])->pluck('id');
        $this->data = array_merge($this->data, [
            'tenant_id' => $tenant[0],
            'balance' => $this->data['amount'],
            'status' => 'unallocated'
        ]);
        $payment =  Payment::create($this->data);
        if ($payment) {
            $debit_credit = Statement::selectRaw('tenant_name, SUM(debit) as total_debit, SUM(credit) as total_credit')
                ->where('tenant_name', $payment->tenant_name)
                ->groupBy('tenant_name')
                ->first();
            $statement_data = [
                'tenant_id' => $payment->tenant_id,
                'tenant_name' => $payment->tenant_name,
                'description' => $payment->mode_of_payment . "# " . $payment->reference_number,
                'reference' => $payment->reference_number,
                'credit' => $payment->amount,
                'debit' => 0,
                'balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit + $payment->balance) : -$payment->balance,
                'cummulative_balance' => $debit_credit != null ?  $debit_credit->total_debit - ($debit_credit->total_credit + $payment->balance) : -$payment->balance
            ];
            Statement::create($statement_data);
            InvoiceReceiptAutoAllocation::handleNewReceipt($payment->tenant_name, $payment);

            return $payment;
        }
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your payment import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
