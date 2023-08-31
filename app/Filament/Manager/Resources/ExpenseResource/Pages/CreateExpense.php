<?php

namespace App\Filament\Manager\Resources\ExpenseResource\Pages;

use App\Filament\Manager\Resources\ExpenseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExpense extends CreateRecord
{
    protected static string $resource = ExpenseResource::class;
}
