<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use App\Models\ActiveUtility;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Utility;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTenant extends ViewRecord
{
    protected static string $resource = TenantResource::class;

    protected static string $view = 'filament.manager.resources.tenant-resource.pages.view-tenant';

    public string $activeTab ;

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
        $water_exists = false;
        $has_water_utility = ActiveUtility::where('tenant_name', $this->getRecord()->full_names)->get('active_utilities')->toArray();
        if (!empty($has_water_utility)) {
            if (in_array('Water', $has_water_utility[0]['active_utilities'])) {
                $water_exists =  true;
            }
        }
        return $water_exists;
    }
    
}
