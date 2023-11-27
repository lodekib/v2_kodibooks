<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Partner extends Page implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static string $view = 'filament.pages.partner';

    function table(Table $table): Table
    {
        return $table->query(User::query()->role('Partner'))
            ->columns([
                TextColumn::make('name')->label('Partner name')->size('sm')->searchable(),
                TextColumn::make('email')->size('sm')->searchable()->sortable(),
                TextColumn::make('is_verified')->label('Status')->badge()->formatStateUsing(fn ($state) => $state == 0 ? 'pending approval' : 'Approved')
                    ->icon(fn (string $state): string => match ($state) {
                        '0' => 'heroicon-o-clock',
                        '1' => 'heroicon-o-check',
                    })->color(fn (string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'info',
                    })
                // TextColumn::make('partners.kyc')->size('sm'),
                // TextColumn::make('partners.commission')->label('Commission')->size('sm')->formatStateUsing(fn ($state) => $state == null ? '-' : $state)
            ])->actions([
                Action::make('Approve Partner')->color('gray')->outlined()->icon('heroicon-o-shield-check')->button()->action(function () {})
            ]);
    }
}
