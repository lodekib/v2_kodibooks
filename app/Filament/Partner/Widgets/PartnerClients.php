<?php

namespace App\Filament\Partner\Widgets;

use App\Models\Partner;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PartnerClients extends BaseWidget
{
    public $code;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Your referred property managers';


    public function mount()
    {
        $this->code = Partner::find(auth()->id())->reg_code;
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->role('Manager')->where('code',$this->code))
            ->columns([
                TextColumn::make('created_at')->date()->size('sm'),
                TextColumn::make('manager.org_brand')->label('Property Manager')->size('sm')->searchable()->sortable(),
                TextColumn::make('manager.org_address')->label('Property address')->size('sm')->searchable()->sortable(),
                TextColumn::make('is_verified')->label('Status')->badge()->formatStateUsing(fn ($state) => $state == 0 ? 'pending approval' : 'Approved')
                    ->icon(fn (string $state): string => match ((bool)$state) {
                        false => 'heroicon-o-clock',
                        true => 'heroicon-o-check',
                    })->color(fn (string $state): string => match ((bool)$state) {
                        false => 'warning',
                        true => 'success',
                    }),
            ]);
    }
}
