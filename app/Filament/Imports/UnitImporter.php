<?php

namespace App\Filament\Imports;

use App\Models\Property;
use App\Models\Unit;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Filament\Forms\Components\Select;

class UnitImporter extends Importer
{
    protected static ?string $model = Unit::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('unit_name')
                ->rules(['required', 'max:20']),
            ImportColumn::make('unit_size')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('unit_type')
                ->rules(['required', 'max:255']),
            ImportColumn::make('rent')
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('deposit')
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('unit_condition')
                ->rules(['required', 'max:20']),
        ];
    }

    public static function getOptionsFormComponents(): array
    {
        return [
            Select::make('property_name')->required()->options(Property::pluck('property_name', 'property_name'))
        ];
    }

    public function resolveRecord(): ?Unit
    {
        $id = Property::where('property_name',$this->options['property_name'])->value('id');
        $this->data = array_merge($this->data, ['property_name' => $this->options['property_name'],'property_id' => $id,'status' => 'vacant']);
        return Unit::create($this->data);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your unit import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
