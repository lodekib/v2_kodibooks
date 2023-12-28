<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use App\Models\Property;
use App\Models\Unit;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab as ListRecordsTab;
use Illuminate\Database\Eloquent\Builder;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ListTenants extends ListRecords
{
    protected static string $resource = TenantResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->icon('heroicon-o-plus-circle'),
            Action::make('Sample template')->icon('heroicon-o-arrow-down-circle')->url(route('template.tenant')),
            ImportAction::make()->uniqueField('id_number')->fields([
                ImportField::make('full_names')->required(),
                ImportField::make('email'),
                ImportField::make('phone_number')->required(),
                ImportField::make('id_number')->required(),
                ImportField::make('property_name')->required()->rules('exists:properties,property_name'),
                ImportField::make('unit_name')->rules('exists:units,unit_name'),
                ImportField::make('entry_date'),
            ], columns: 4)->icon('heroicon-o-arrow-down-tray')
                ->mutateBeforeCreate(function ($row) {
                    $property =  Property::where('property_name', $row['property_name'])->first();
                    $unit = Unit::where('unit_name',$row['unit_name'])->get('status')->first();
                    if ($property->units->isNotEmpty() && $property->units->contains('unit_name', $row['unit_name'])  && $unit->status == 'vacant' ) {
                        return $row;
                    } else {
                        Notification::make()->danger()->color('danger')
                        ->body('Please make sure the units exists in the given property and are vacant !')->send();
                    }
                })->handleRecordCreation(function ($data) {
                    $property =  Property::where('property_name', $data['property_name'])->first();
                    $unit = Unit::where('unit_name', $data['unit_name'])->get(['rent', 'deposit'])->first();
                    $new_data = array_merge($data, [
                        'property_id' => $property->id,
                        'balance' => 0,
                        'rent' => $unit->rent,
                        'deposit' => $unit->deposit,
                        'arrears' => 0,
                        'surplus' => 0,
                        'status' => 'active',
                        'entry_date' =>  array_key_exists('entry_date', $data) ? date('Y-m-d', strtotime($data['entry_date'])) : Carbon::now()->format('Y-m-d')
                    ]);
                    $tenant =  $this->getModel()::create($new_data);

                    if ($tenant) {
                        Unit::where('unit_name', $data['unit_name'])->update([
                            'status' => 'occupied',
                            'tenant_id' => $tenant->id
                        ]);
                    }
                    return $tenant;
                }),
        ];
    }
}
