<?php

namespace App\Filament\Manager\Resources\VendorResource\Pages;

use App\Filament\Manager\Resources\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateVendor extends CreateRecord
{
    protected static string $resource = VendorResource::class;

}
