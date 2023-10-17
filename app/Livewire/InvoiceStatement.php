<?php

namespace App\Livewire;

use App\Models\Invoice;
use App\Models\Property;
use App\Models\Statement;
use App\Models\Utility;
use App\Models\Waterbill;
use Carbon\Carbon;
use Livewire\Component;

class InvoiceStatement extends Component
{
    public $record;

    public function invoices()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $startOfMonth = Carbon::now()->startOfMonth();

        $pending_invoices = Invoice::where('tenant_name', $this->record->full_names)
            ->where('invoice_status', '!=', 'fully paid')
            ->whereBetween('created_at', [Carbon::parse($currentMonth . '-01 00:00:00'), Carbon::parse($currentMonth . '-31 23:59:59')])
            ->get(['invoice_type', 'balance']);
        $total_balances = Invoice::where('tenant_name', $this->record->full_names)
            ->where('invoice_status', '!=', 'fully paid')
            ->whereBetween('created_at', [Carbon::parse($currentMonth . '-01 00:00:00'), Carbon::parse($currentMonth . '-31 23:59:59')])
            ->sum('balance');
        $water_readings = Waterbill::where('tenant_id', $this->record->id)->latest()->get(['previous_reading', 'current_reading']);
        $property = $this->record->property;
        $rate = Utility::where('property_name', $property->property_name)->where('utility_name', 'Water')->get('amount')->first();
        $balance = Statement::where('tenant_name', $this->record->full_names)
            ->selectRaw('SUM(debit) - SUM(credit) as balance')->where('created_at', '<', $startOfMonth)->first()->balance;
        $consumption_total = ($water_readings->first()->current_reading - $water_readings->first()->previous_reading) * $rate->amount;
        $total_overdue = $balance + $consumption_total + $total_balances;
        return [$pending_invoices, $water_readings->first(), $rate, $balance, $total_overdue];
    }


    public function render()
    {
        return view('livewire.invoice-statement');
    }
}
