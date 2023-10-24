<?php

namespace App\Mpesa;

use App\Events\MpesaReceived;
use App\Models\MpesaC2B;
use App\Models\Payment;
use App\Models\Statement;
use App\Models\Tenant;
use App\Services\InvoiceReceiptAutoAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;

class C2B
{
    public function confirm(Request $request)
    {
        Log::info('Confirmation endpoint has been hit');
        $payload = $request->all();


        $c2b = new MpesaC2B();
        $c2b->Transaction_type = $payload['TransactionType'];
        $c2b->Transaction_ID = $payload['TransID'];
        $c2b->Transaction_Time = $payload['TransTime'];
        $c2b->Amount = $payload['TransAmount'];
        $c2b->Business_Shortcode = $payload['BusinessShortCode'];
        $c2b->Account_Number = $payload['BillRefNumber'];
        $c2b->Invoice_no = $payload['InvoiceNumber'];
        $c2b->Organization_Account_Balance = $payload['OrgAccountBalance'];
        $c2b->ThirdParty_Transaction_ID = $payload['ThirdPartyTransID'];
        $c2b->Phonenumber = $payload['MSISDN'];
        $c2b->FirstName = $payload['FirstName'];
        $c2b->save();

        MpesaReceived::dispatch($c2b);

        $tenant = Tenant::where('id_number', $payload['BillRefNumber'])->get(['id', 'full_names', 'property_name', 'unit_name']);
        $debit_credit = Statement::selectRaw('tenant_name, SUM(debit) as total_debit, SUM(credit) as total_credit')
            ->where('tenant_name', $tenant['full_names'])
            ->groupBy('tenant_name')
            ->first();

        $payment = Payment::create([
            'receipt_number' => $payload['TransID'],
            'reference_number' => $payload['TransID'],
            'unit_name' => $tenant->first()->unit_name,
            'national_id' => $payload['BillRefNumber'],
            'tenant_name' => $tenant->first()->full_names,
            'property_name' => $tenant->first()->property_name,
            'mode_of_payment' => $payload['TransactionType'],
            'amount' => $payload['TransAmount'],
            'tenant_id' => $tenant[0]->id,
            'balance' => $payload['TransAmount'],
            'status' => 'unallocated',
            'paid_date'  => $payload['TransTime']
        ]);

        if ($payment) {
            $statement_data = [
                'tenant_id' => $tenant[0]->id,
                'tenant_name' => $tenant->first()->full_names,
                'description' => 'Mpesa',
                'reference' => $payload['TransID'],
                'credit' => $payment->balance,
                'debit' => 0,
                'balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit + $payment->balance) : -$payment->balance,
                'cummulative_balance' => $debit_credit != null ? $debit_credit->total_debit - ($debit_credit->total_credit + $payment->balance) : -$payment->balance
            ];
            Statement::create($statement_data);
            InvoiceReceiptAutoAllocation::handleNewReceipt($tenant->first()->full_names, $payment);
        }

        return $payload;
    }
}
