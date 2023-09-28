<?php

namespace App\Filament\Manager\Pages;

use App\Models\Payment;
use App\Models\Tenant;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ArchivedPayments extends Page implements HasForms, HasTable
{
    use InteractsWithTable, InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-s-document-minus';
    protected static ?string $navigationGroup = 'Archives';
    protected static string $view = 'filament.manager.pages.archived-payments';

    public function table(Table $table): Table
    {
        return $table->query(Payment::query()->where('status', 'like', 'stale/%'))->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScope('nonestale'))->columns([
            TextColumn::make('status')->badge()->formatStateUsing(fn () => 'stale')->color('danger')->searchable(),
            TextColumn::make('paid_date')->size('sm')->date()->searchable(),
            TextColumn::make('tenant_name')->size('sm')->searchable()->sortable(),
            TextColumn::make('receipt_number')->size('sm')->sortable()->searchable(),
            TextColumn::make('mode_of_payment')->size('sm')->searchable()->sortable(),
            TextColumn::make('amount')->money('kes')->searchable(),
            TextColumn::make('balance')->money('kes')->searchable(),
        ]);
    }
}
