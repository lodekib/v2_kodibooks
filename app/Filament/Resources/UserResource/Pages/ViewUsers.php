<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ViewUsers extends ViewRecord
{

    
    protected static string $resource = UserResource::class;
    protected static string $view = 'filament.resources.user-resource.pages.view-users';
    protected ?string $heading = 'Client Invoices';

}
