<?php

namespace App\Filament\Manager\Pages;

use App\Models\Statement;
use App\Models\Tenant;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Database\Eloquent\Builder;

class OldTenants extends Page implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;
    // protected static ?string $navigationIcon = 'heroicon-s-user-minus';
    protected static ?string $navigationGroup = 'Archives';
    protected static string $view = 'filament.manager.pages.old-tenants';

protected function paginateTableQuery(Builder $query): Paginator
{
    return $query->fastPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());

}

    public function table(Table $table): Table
    {
        return $table->query(Tenant::query()->where('status', 'stale'))->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScope('nonestale'))->columns([
            TextColumn::make('status')->colors([
                'danger' => static fn ($state): bool => $state === 'stale',
            ])->badge(),
            TextColumn::make('created_at')->label('Date')->date()->size('sm')->sortable(),
            TextColumn::make('full_names')->size('sm')->searchable()->sortable(),
            TextColumn::make('email')->size('sm')->sortable()->searchable(),
            TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
            TextColumn::make('units.unit_name')->size('sm')->searchable()->sortable()->badge()->color('gray')->inline()->limit(3),
            TextColumn::make('rent')->size('sm')->money('kes'),
            TextColumn::make('balance')->size('sm')->formatStateUsing(
                fn ($record) =>
                __('KES ' . number_format(Statement::where('tenant_name', $record->full_names)->selectRaw('SUM(debit) - SUM(credit) as balance')->first()->balance, 2, '.', ','))
            ),
            TextColumn::make('entry_date')->size('sm')->date(),
        ]);
    }
}
