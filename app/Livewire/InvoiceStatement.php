<?php

namespace App\Livewire;

use App\Mail\ShareInvoiceStatement;
use App\Models\Invoice;
use App\Models\Mail as ModelsMail;
use App\Models\Property;
use App\Models\Scopes\ManagerScope;
use App\Models\Statement;
use App\Models\Utility;
use App\Models\Waterbill;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Barryvdh\DomPDF\PDF;

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

    public static function share($record)
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $startOfMonth = Carbon::now()->startOfMonth();

        $pending_invoices = Invoice::where('tenant_name', $record->full_names)
            ->where('invoice_status', '!=', 'fully paid')
            ->whereBetween('created_at', [Carbon::parse($currentMonth . '-01 00:00:00'), Carbon::parse($currentMonth . '-31 23:59:59')])
            ->get(['invoice_type', 'balance']);
        $total_balances = Invoice::where('tenant_name', $record->full_names)
            ->where('invoice_status', '!=', 'fully paid')
            ->whereBetween('created_at', [Carbon::parse($currentMonth . '-01 00:00:00'), Carbon::parse($currentMonth . '-31 23:59:59')])
            ->sum('balance');
        $water_readings = Waterbill::where('tenant_id', $record->id)->latest()->get(['previous_reading', 'current_reading']);
        $property = $record->property;
        $rate = Utility::where('property_name', $property->property_name)->where('utility_name', 'Water')->get('amount')->first();
        $balance = Statement::where('tenant_name', $record->full_names)
            ->selectRaw('SUM(debit) - SUM(credit) as balance')->where('created_at', '<', $startOfMonth)->first()->balance;
        $consumption_total = ($water_readings->first()->current_reading - $water_readings->first()->previous_reading) * $rate->amount;
        $total_overdue = $balance + $consumption_total + $total_balances;


        $pdf = FacadePdf::loadView('pdfs.i-statement',  [
            'tenant' => $record->full_names,
            'pending_invoices' => $pending_invoices,
            'water_readings' => $water_readings->first(),
            'rate' => $rate,
            'balance' => $balance,
            'total_overdue' => $total_overdue
        ]);

        return $pdf->output();
    }

    public function i_share()
    {
        InvoiceStatement::share($this->record);
        $mail_config = ModelsMail::withoutGlobalScope(new ManagerScope())->where('manager_id', $this->record->manager_id)->first();
        $mail_config->mailer()->to($this->record->email)->send(new ShareInvoiceStatement($this->record));
    }

    public function render()
    {
        return view('livewire.invoice-statement');
    }
}
