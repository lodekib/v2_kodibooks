<?php

namespace App\Filament\Manager\Resources\TenantResource\Pages;

use App\Filament\Manager\Resources\TenantResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTenant extends ViewRecord
{
    protected static string $resource = TenantResource::class;

    protected static string $view = 'filament.manager.resources.tenant-resource.pages.view-tenant';
    public string $activeTab ;
    
}
