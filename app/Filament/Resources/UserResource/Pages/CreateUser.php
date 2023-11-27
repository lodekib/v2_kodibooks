<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Caretaker;
use App\Models\Manager;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $caretaker = $this->getModel()::create($data);

        if(array_key_exists('manager',$data))
        {
            $manager = User::where('name',$data['manager'])->first();          
            Caretaker::create([
                'id' => $caretaker->id,
                'manager_id' => $manager->id
            ]);
        }

        return $caretaker ;
    }
}
