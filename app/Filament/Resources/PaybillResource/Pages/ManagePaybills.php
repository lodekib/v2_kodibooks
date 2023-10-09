<?php

namespace App\Filament\Resources\PaybillResource\Pages;

use App\Filament\Resources\PaybillResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePaybills extends ManageRecords
{
    protected static string $resource = PaybillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->action(function (array $data) {
                $manager_id = User::where('name', $data['manager_name'])->pluck('id');
                $final_data =  array_merge($data, ['manager_id' => $manager_id[0]]);
                return $this->getModel()::create($final_data);
            }),
        ];
    }
}
