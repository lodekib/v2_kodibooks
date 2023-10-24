<?php

namespace App\Filament\Resources\PlanResource\Pages;

use App\Filament\Resources\PlanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePlans extends ManageRecords
{
    protected static string $resource = PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->action(function ($data) {

                return $this->getModel()::create([
                    'tag' => explode(' ',$data['name'])[0],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'currency' => 'KES',
                ]);
            })->createAnother(false),
        ];
    }

    
}
