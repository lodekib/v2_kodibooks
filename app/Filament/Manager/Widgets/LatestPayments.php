<?php

namespace App\Filament\Manager\Widgets;

use App\Models\Payment;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPayments extends BaseWidget

{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {

        return $table
            ->query(
                Payment::where('status', '!=', 'allocated')->latest()->withoutGlobalScopes([ManagerScope::class])
            )
            ->columns([
                TextColumn::make('created_at')->label('Date')->size('sm')->searchable()->date(),
                TextColumn::make('tenant_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('receipt_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('mode_of_payment')->size('sm')->searchable()->sortable(),
                TextColumn::make('amount')->money('kes'),
                TextColumn::make('status')->badge()->colors([
                    'secondary' => static fn ($state): bool => $state === 'unallocated',
                    'warning' => static fn ($state): bool => $state === 'partially allocated',
                    'success' => static fn ($state): bool => $state === 'fully allocated',
                ])->size('sm'),
                TextColumn::make('balance')->money('kes'),
            ]);
    }
}
