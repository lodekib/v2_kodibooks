<?php

namespace App\Livewire;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Refund;
use App\Models\Statement;
use App\Services\InvoiceReceiptAutoAllocation;
use Carbon\Carbon;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class RefundComponent extends Component implements HasForms
{

    use InteractsWithForms;

    public $data;
    public $record;

    public function mount()
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Wizard::make()->schema([
                Step::make('')->description('Deductables')->icon('heroicon-o-question-mark-circle')->schema([
                    Radio::make('status')->required()->boolean()->inline()->reactive()->default(true),
                    Repeater::make('deductables')->schema([
                        Section::make()->schema([
                            TextInput::make('deductable')->required(),
                            TextInput::make('amount')->required()
                        ])->columns(2)
                    ])->collapsible()
                        ->required(fn (Get $get) => $get('status') != null ? $get('status') : $get('status'))->visible(fn (Get $get) => $get('status') != null ? $get('status') : $get('status'))
                ])
            ])->submitAction(new HtmlString('<button type="submit" wire:loading.attr="disabled" class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">
                <svg class="animate-spin h-4 w-4 mr-1" wire:loading wire:target="deduct" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Submit
            </button>
            '))
        ];
    }

    public function deduct()
    {
        $data = $this->form->getState();
        $total_debit = Statement::where('tenant_name', $this->record->full_names)->sum('debit');
        $total_credit = Statement::where('tenant_name', $this->record->full_names)->sum('credit');
        $receipt_number = strtoupper(substr($this->record->property_name, 0, 3)) . "-" . time();


        if ($data['status']) {
            $deductables = $data['deductables'];
            //add the deposit as a receipt
            $receipt_data = [
                'tenant_id' => $this->record->id,
                'tenant_name' => $this->record->full_names,
                'national_id' => $this->record->id_number,
                'property_name' => $this->record->property_name,
                'unit_name' => $this->record->unit_name,
                'reference_number' => 'Deposit',
                'receipt_number' => $receipt_number,
                'mode_of_payment' => 'Deposit',
                'amount' => $this->record->deposit,
                'balance' => $this->record->deposit,
                'paid_date' => Carbon::now(),
                'status' => 'unallocated'
            ];
            $receipt = Payment::create($receipt_data);
            if ($receipt) {
                $statement_data = [
                    'tenant_id' => $this->record->id,
                    'tenant_name' => $this->record->full_names,
                    'description' => 'Deposit refund',
                    'reference' => $receipt->receipt_number,
                    'credit' => $receipt->balance,
                    'debit' => 0,
                    'balance' => $total_debit - ($total_credit + $receipt->balance),
                    'cummulative_balance' => $total_debit - ($total_credit + $receipt->balance),
                    's_balance' => $total_debit - ($total_credit + $receipt->balance),
                ];
                Statement::create($statement_data);
                InvoiceReceiptAutoAllocation::handleNewReceipt($this->record->full_names, $receipt);
                //receipt done.

                //save the deductables
                foreach ($deductables as $key => $value) {
                    $refund  = Refund::create([
                        'tenant_id' => $this->record->id,
                        'deductable' => $value['deductable'],
                        'amount' => $value['amount']
                    ]);
                    if ($refund) {
                        //After saving the deductable record , create an invoice
                        $invoice = Invoice::create([
                            'tenant_id' => $this->record->id,
                            'national_id' => $this->record->id_number,
                            'invoice_number' => 'REF-' . time(),
                            'invoice_type' => 'Refund',
                            'due_date' => Carbon::now(),
                            'from' => Carbon::now(),
                            'to' => Carbon::now(),
                            'tenant_name' => $this->record->full_names,
                            'property_name' => $this->record->property_name,
                            'unit_name' => $this->record->unit_name,
                            'invoice_description' => 'Deductable from deposit',
                            'amount_invoiced' => $refund->amount,
                            'invoice_status' => 'pending',
                            'balance' => $refund->amount
                        ]);
                        $statement_data = [
                            'tenant_id' => $this->record->id,
                            'tenant_name' => $this->record->full_names,
                            'description' => 'Refund Invoice',
                            'reference' => $invoice->invoice_number,
                            'debit' => $invoice->balance,
                            'credit' => 0,
                            'balance' => $total_debit - ($total_credit - $invoice->balance),
                            'cummulative_balance' => $total_debit - ($total_credit - $invoice->balance),
                            's_balance' => $total_debit - ($total_credit - $invoice->balance),

                        ];
                        Statement::create($statement_data);
                        InvoiceReceiptAutoAllocation::handleNewInvoice($invoice);
                    }
                }
            }
            $this->record->update(['is_refunded' => true]);
            Notification::make()->success()->color('primary')->title('Success !')->body('Deductables calculated successfully for the tenant !')->send();
        } else {
            //just add deposit as the receipt and stop.
            $receipt_data = [
                'tenant_id' => $this->record->id,
                'tenant_name' => $this->record->full_names,
                'national_id' => $this->record->id_number,
                'property_name' => $this->record->property_name,
                'unit_name' => $this->record->unit_name,
                'reference_number' => 'Deposit',
                'receipt_number' => $receipt_number,
                'mode_of_payment' => 'Deposit',
                'amount' => $this->record->deposit,
                'balance' => $this->record->deposit,
                'paid_date' => Carbon::now(),
                'status' => 'unallocated'
            ];
            $receipt = Payment::create($receipt_data);

            if ($receipt) {
                $statement_data = [
                    'tenant_id' => $this->record->id,
                    'tenant_name' => $this->record->full_names,
                    'description' => 'Deposit refund',
                    'reference' => $receipt->receipt_number,
                    'credit' => $receipt->balance,
                    'debit' => 0,
                    'balance' => $total_debit - ($total_credit + $receipt->balance),
                    'cummulative_balance' => $total_debit - ($total_credit + $receipt->balance),
                    's_balance' => $total_debit - ($total_credit + $receipt->balance),
                ];
                Statement::create($statement_data);
                InvoiceReceiptAutoAllocation::handleNewReceipt($this->record->full_names, $receipt);
            }
            $this->record->update(['is_refunded' => true]);
        }
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    public function render()
    {
        return view('livewire.refund-component');
    }
}
