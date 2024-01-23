<?php

namespace App\Services;

use App\Models\Allocation;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Receipt;
use App\Models\Scopes\ManagerScope;
use App\Models\Statement;

class InvoiceReceiptAutoAllocation
{


    public static  function   handleNewInvoice($invoice)
    {
        $payments = Payment::where('tenant_name', $invoice->tenant_name)
            ->where('status', '!=', 'fully allocated')->withoutGlobalScopes([ManagerScope::class])
            ->oldest()->get();
            

        if ($payments->isNotEmpty()) {
            foreach ($payments as $payment) {
                if ($payment->balance <= $invoice->balance) {
                    // Fully allocate the receipt
                    $update_receipt = Payment::find($payment->id)->update([
                        'status' => 'fully allocated',
                        'balance' => 0
                    ]);

                    if ($update_receipt) {
                        Statement::where('reference', $payment->receipt_number)->update([
                            'balance' => 0
                        ]);
                    }

                    $invoice->balance -= $payment->balance; // Update invoice balance

                    if ($invoice->balance == 0) {
                        $auto_allocation_data = [
                            'tenant_id' => $invoice->tenant_id,
                            'tenant_name' => $invoice->tenant_name,
                            'receipt_number' => $payment->receipt_number,
                            'invoice_number' => $invoice->invoice_number,
                            'amount_allocated' => $payment->balance
                        ];

                        // The invoice has been fully paid
                        $invoice->invoice_status = 'fully paid';
                        $invoice->save();

                        Allocation::create($auto_allocation_data);

                        break;
                    } else {

                        $auto_allocation_data = [
                            'tenant_id' => $invoice->tenant_id,
                            'tenant_name' => $invoice->tenant_name,
                            'receipt_number' => $payment->receipt_number,
                            'invoice_number' => $invoice->invoice_number,
                            'amount_allocated' => $payment->balance
                        ];

                        $invoice->invoice_status = 'partially paid';
                        $invoice->save();

                        Allocation::create($auto_allocation_data);
                    }
                } else {
                    // Partially allocate the receipt
                    $update_receipt = Payment::find($payment->id)->update([
                        'status' => 'partially allocated',
                        'balance' => $payment->balance - $invoice->balance
                    ]);

                    if ($update_receipt) {
                        Statement::where('reference', $payment->receipt_number)->update([
                            'balance' => $payment->balance - $invoice->balance
                        ]);
                    }
                    $invoice->balance = 0; // Invoice balance fully utilized
                    $invoice->invoice_status = 'fully paid';
                    $invoice->save();
                    $auto_allocation_data = [
                        'tenant_id' => $invoice->tenant_id,
                        'tenant_name' => $invoice->tenant_name,
                        'receipt_number' => $payment->receipt_number,
                        'invoice_number' => $invoice->invoice_number,
                        'amount_allocated' => $payment->amount - $payment->balance
                    ];
                    Allocation::create($auto_allocation_data);

                    break; // No need to continue with remaining receipts
                }
            }
        }
    }


    public static function handleNewReceipt($tenant_name, $payment)
    {

        $pending_invoices =  Invoice::where('tenant_name', $tenant_name)->where('invoice_status', '!=', 'fully paid')->oldest()->get();
        if ($pending_invoices->isNotEmpty()) {
            foreach ($pending_invoices as $pending_invoice) {
                if ($pending_invoice->balance <= $payment->balance) {
                    // Fully pay the pending invoice
                    $update_invoice = Invoice::find($pending_invoice->id)->update([
                        'invoice_status' => 'fully paid',
                        'balance' => 0
                    ]);

                    if ($update_invoice) {
                        Statement::where('reference', $pending_invoice->invoice_number)->update([
                            'balance' => 0
                        ]);
                    }

                    $payment->balance -= $pending_invoice->balance; // Update receipt balance

                    if ($payment->balance == 0) {
                        // The receipt has been fully allocated
                        $payment->status = 'fully allocated';
                        $payment->save();
                        $auto_allocation_data = [
                            'tenant_id' => $pending_invoice->tenant_id,
                            'tenant_name' => $pending_invoice->tenant_name,
                            'receipt_number' => $payment->receipt_number,
                            'invoice_number' => $pending_invoice->invoice_number,
                            'amount_allocated' => $pending_invoice->balance
                        ];
                        Allocation::create($auto_allocation_data);

                        break;
                    } else {
                        $payment->status = 'partially allocated';
                        $payment->save();
                        $auto_allocation_data = [
                            'tenant_id' => $pending_invoice->tenant_id,
                            'tenant_name' => $pending_invoice->tenant_name,
                            'receipt_number' => $payment->receipt_number,
                            'invoice_number' => $pending_invoice->invoice_number,
                            'amount_allocated' => $pending_invoice->balance
                        ];
                        Allocation::create($auto_allocation_data);
                    }
                } else {
                    // Partially pay the pending invoice
                    $update_invoice = Invoice::find($pending_invoice->id)->update([
                        'invoice_status' => 'partially paid',
                        'balance' => $pending_invoice->balance - $payment->balance
                    ]);

                    if ($update_invoice) {
                        Statement::where('reference', $pending_invoice->invoice_number)->update([
                            'balance' => $pending_invoice->balance - $payment->balance
                        ]);
                    }

                    $payment->balance = 0; // payment balance fully utilized
                    $payment->status = 'fully allocated';
                    $payment->save();
                    $auto_allocation_data = [
                        'tenant_id' => $pending_invoice->tenant_id,
                        'tenant_name' => $pending_invoice->tenant_name,
                        'receipt_number' => $payment->receipt_number,
                        'invoice_number' => $pending_invoice->invoice_number,
                        'amount_allocated' => $payment->amount
                    ];
                    Allocation::create($auto_allocation_data);

                    break; // No need to continue with remaining pending invoices
                }
            }
        }
    }
}
