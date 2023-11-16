<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use App\Models\ActiveUtility;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Statement;
use App\Models\Utility;
use App\Services\InvoiceReceiptAutoAllocation;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewTenant extends ViewRecord
{
    protected static string $resource = TenantResource::class;

    protected static string $view = 'filament.manager.resources.tenant-resource.pages.view-tenant';

    public string $activeTab;

    public function getUtilities()
    {
        $all_array = [];
        $active = [];

        $property_util = Utility::where('property_name', $this->getRecord()->property_name)->get('utility_name');
        $active_utils = ActiveUtility::where('property_name', $this->getRecord()->property_name)
            ->where('tenant_name', $this->getRecord()->full_names)
            ->get('active_utilities');

        foreach ($property_util as $key => $value) {
            array_push($all_array, $value->utility_name);
        }

        foreach ($active_utils as $active_util) {
            foreach ($active_util->active_utilities as $key => $value) {
                array_push($active, $value);
            }
        }

        return [$all_array, $active];
    }

    public function getBalance()
    {

        $total_invoices =  Invoice::where('tenant_name', $this->getRecord()->full_names)->sum('balance');
        $total_receipts =  Payment::where('tenant_name', $this->getRecord()->full_names)->sum('balance');

        return $total_invoices - $total_receipts;
    }

    public function hasWater(): bool
    {
        $has_water_utility = ActiveUtility::where('tenant_name', $this->getRecord()->full_names)
            ->whereJsonContains('active_utilities', 'Water')
            ->exists();

        return $has_water_utility;
    }

    public function refund()
    {
        $total_debit = Statement::where('tenant_name', $this->record->full_names)->sum('debit');
        $total_credit = Statement::where('tenant_name', $this->record->full_names)->sum('credit');
        $receipt_number = strtoupper(substr($this->record->property_name, 0, 3)) . "-" . time();
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
            $statement = Statement::create($statement_data);
            InvoiceReceiptAutoAllocation::handleNewReceipt($this->record->full_names, $receipt);
            Notification::make()->success()->color('success')->body("Deposit refunded  successfully !")->send();
        } else {
            Notification::make()->warning()->color('warning')->body('Unable to refund the deposit !')->send();
        }
    }
}
