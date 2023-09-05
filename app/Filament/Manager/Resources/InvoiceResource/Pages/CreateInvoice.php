<?php

namespace App\Filament\Manager\Resources\InvoiceResource\Pages;

use App\Filament\Manager\Resources\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        dd($data);
    }
}
