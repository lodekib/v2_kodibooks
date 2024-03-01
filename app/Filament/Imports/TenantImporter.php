<?php

namespace App\Filament\Imports;

use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Carbon\Carbon;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Filament\Notifications\Notification;

class TenantImporter extends Importer
{
    protected static ?string $model = Tenant::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('property_name')
                ->requiredMapping()
                ->rules(['required', 'exists:properties,property_name']),
            ImportColumn::make('full_names')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'max:50']),
            ImportColumn::make('phone_number')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('id_number')
                ->requiredMapping()
                ->rules(['required', 'max:15']),
            ImportColumn::make('unit_name')
                ->requiredMapping()
                ->rules(['required', 'max:15']),
        ];
    }

    public function resolveRecord(): ?Tenant
    {
        $property = Property::where('property_name', $this->data['property_name'])->first();
        $unit = Unit::where('unit_name', $this->data['unit_name'])->get()->first();
        if ($unit != null && $property->units->contains('unit_name', $unit->unit_name) && $unit->status == 'vacant') {
            $this->data = array_merge($this->data, [
                'property_id' => $property->id,
                'balance' => 0,
                'rent' => $unit->rent,
                'deposit' => $unit->deposit,
                'arrears' => 0,
                'surplus' => 0,
                'status' => 'active',
                'entry_date' => Carbon::now()->format('Y-m-d')
            ]);
            $tenant =  Tenant::create($this->data);

            if ($tenant) {
                Unit::where('unit_name', $this->data['unit_name'])->update([
                    'status' => 'occupied',
                    'tenant_id' => $tenant->id
                ]);
            }

            return $tenant;
        }
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your tenant import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
