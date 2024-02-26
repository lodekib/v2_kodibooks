<?php

namespace App\Filament\Manager\Resources\ManageuserResource\Pages;

use App\Filament\Manager\Resources\ManageuserResource;
use App\Models\Caretaker;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateManageuser extends CreateRecord
{
    protected static string $resource = ManageuserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $new_data = array_merge($data, ['type' => $data['role']]);
        $user = $this->getModel()::create($new_data);
        $user->assignRole($data['role']);
        $user->is_verified = true;
        $user->save();
        if (Caretaker::create(['manager_id' => auth()->id(), 'id' => $user->id])) {
            Notification::make()->success()->color('success')->title('Success !')->body('User created successfully !')->send();
        }
        return $user;
    }
}
