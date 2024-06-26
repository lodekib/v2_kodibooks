<?php

namespace App\Filament\Manager\Resources\PaymentResource\Pages;

use App\Filament\Manager\Resources\PaymentResource;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()->success()->color('success')->body('Payment has been added successfully !');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $receipt_number  = strtoupper(substr($data['property_name'], 0, 3)) . "-" . time();
        $reference_number = $data['mode_of_payment'] == 'Cash' ? 'cash payment' : $data['reference_number'];
        $tenant = Tenant::where('full_names', $data['tenant_name'])->get(['id', 'full_names']);
        $debit_credit = Statement::selectRaw('tenant_name, SUM(debit) as total_debit, SUM(credit) as total_credit')
            ->where('tenant_name', $data['tenant_name'])
            ->groupBy('tenant_name')
            ->first();
        // $total_debit = $debit_credit->total_debit;
        // $total_credit = $debit_credit->total_credit;
        $payment_data = array_merge(
            $data,
            [
                'reference_number' => $reference_number,
                'receipt_number' => $receipt_number,
                'status' => 'unallocated',
                'tenant_id' => $tenant[0]->id,
                'balance' => $data['amount'],
            ]
        );
        $payment  = $this->getModel()::create($payment_data);

        if ($payment) {
            $statement_data = [
                'tenant_id' => $tenant[0]->id,
                'tenant_name' => $data['tenant_name'],
                'description' => $data['mode_of_payment'],
                'reference' => $payment->receipt_number,
                'credit' => $payment->balance,
                'debit' => 0,
                'balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit + $payment->balance) : -$payment->balance,
                'cummulative_balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit + $payment->balance) : -$payment->balance,
                's_balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit + $payment->balance) : -$payment->balance,

            ];
            Statement::create($statement_data);
            InvoiceReceiptAutoAllocation::handleNewReceipt($tenant->first()->full_names, $payment);
            $bal = Statement::where('tenant_name', $tenant->first()->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance;
            $tenant->first()->update(['balance' => $bal]);
        }
        return $payment;
    }
}
