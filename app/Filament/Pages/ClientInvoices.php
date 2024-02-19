<?php

namespace App\Filament\Pages;

use App\Models\ManagerInvoice;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ClientInvoices extends Page implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Clients';
    protected static string $view = 'filament.pages.client-invoices';

    public function table(Table $table): Table
    {
        return $table->query(ManagerInvoice::query()->latest())->columns([
            TextColumn::make('created_at')->label('Date')->size('sm')->searchable(),
            TextColumn::make('client')->size('sm')->searchable()->sortable(),
            TextColumn::make('national_id')->size('sm')->searchable()->sortable()->copyable(),
            TextColumn::make('invoice_number')->size('sm')->searchable()->sortable()->copyable(),
            TextColumn::make('amount')->size('sm')->searchable()->money('kes'),
            TextColumn::make('invoice_status')->size('sm')->badge()->colors([
                'success' => static fn ($state): bool => $state === 'paid',
                'danger' => static fn ($state): bool => $state === 'unpaid',
            ]),
            
        ]);
    }
}
