<?php

namespace App\Filament\Manager\Resources\PropertyResource\Pages;

use App\Filament\Manager\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditProperty extends EditRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getRelationManagers(): array
    {
        return [];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        $record->units()->update(['property_name' => $data['property_name']]);
        $record->tenants()->update(['property_name' => $data['property_name']]);
        $record->payments()->update(['property_name' => $data['property_name']]);
        $record->invoices()->update(['property_name' => $data['property_name']]);
        $record->utilities()->update(['property_name' => $data['property_name']]);
        $record->expenses()->update(['property_name' => $data['property_name']]);

        $record->update($data);
        return $record;
    }
}
