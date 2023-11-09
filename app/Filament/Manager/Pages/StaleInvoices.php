<?php

namespace App\Filament\Manager\Pages;

use App\Models\Invoice;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class StaleInvoices extends Page implements HasForms, HasTable

{
    use InteractsWithForms, InteractsWithTable;
    // protected static ?string $navigationIcon = 'heroicon-s-archive-box';
    protected static ?string $navigationGroup = 'Archives';
    protected static string $view = 'filament.manager.pages.stale-invoices';

    public function table(Table $table): Table
    {
        return $table->query(Invoice::query()->where('invoice_status', 'like', 'stale/%'))->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScope('nonestale'))->columns([
            TextColumn::make('invoice_status')->color('danger')->formatStateUsing(fn() => 'stale')->label('Status')->searchable()->sortable()->badge(),
            TextColumn::make('created_at')->date()->label('Date')->size('sm'),
            TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
            TextColumn::make('tenant_name')->size('sm')->searchable()->sortable(),
            TextColumn::make('unit_name')->size('sm')->sortable()->searchable(),
            TextColumn::make('invoice_number')->size('sm')->searchable()->sortable(),
            TextColumn::make('invoice_type')->size('sm')->searchable()->sortable(),
            TextColumn::make('due_date')->date()->size('sm'),
            TextColumn::make('amount_invoiced')->size('sm')->money('kes')->searchable(),
            TextColumn::make('balance')->size('sm')->money('kes')
        ]);
    }
}
