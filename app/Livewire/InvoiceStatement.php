<?php

namespace App\Livewire;

use App\Models\Invoice;
use Carbon\Carbon;
use Livewire\Component;

class InvoiceStatement extends Component
{
    public $record;

    public function invoices()
    {
        $currentMonth = Carbon::now()->format('Y-m');

        $pending_invoices = Invoice::where('tenant_name', $this->record->full_names)
            ->where('invoice_status', '!=', 'fully paid')
            ->whereBetween('created_at', [Carbon::parse($currentMonth . '-01 00:00:00'), Carbon::parse($currentMonth . '-31 23:59:59')])
            ->get(['invoice_type', 'balance', 'created_at']);
        return $pending_invoices;
    }


    public function render()
    {
        return view('livewire.invoice-statement');
    }
}
