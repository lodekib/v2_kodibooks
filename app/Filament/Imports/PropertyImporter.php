<?php

namespace App\Filament\Imports;

use App\Models\Property;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Filament\Forms\Components\Select;

class PropertyImporter extends Importer
{
    protected static ?string $model = Property::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('property_name')
                ->requiredMapping()
                ->rules(['required', 'max:255','unique:properties']),
            ImportColumn::make('property_size')
                ->requiredMapping()
                ->numeric()
                ->rules(['required']),
            ImportColumn::make('property_cost')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('property_location')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('property_status')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
        ];
    }

    // public static function getOptionsFormComponents(): array
    // {
    //     return [
    //         Select::make('sample')->options(Property::pluck('property_name','property_name'))
    //     ];
    // } 

    public function resolveRecord(): ?Property
    {
        // return Property::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Property();
    }
    

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your property import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
