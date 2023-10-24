<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriberResource\Pages;
use App\Filament\Resources\SubscriberResource\RelationManagers;
use App\Models\Subscriber;
use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Bpuig\Subby\Models\PlanSubscription;
use Filament\Tables\Columns\TextColumn;

class SubscriberResource extends Resource
{
    protected static ?string $model = PlanSubscription::class;
    protected static ?string $navigationGroup = 'Subscriptions';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Index')->rowIndex(),
                TextColumn::make('subscriber_id')->label('Subscriber Name')->searchable()->sortable()->formatStateUsing(fn($state) => User::find($state)->name),
                TextColumn::make('plan_id')->label('Plan Name')->size('sm')->searchable()->sortable()->formatStateUsing(fn ($state) => Plan::find($state)->name),
                TextColumn::make('payment_method')->size('sm')->searchable()->sortable(),
                TextColumn::make('price')->size('sm')->money('KES')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSubscribers::route('/'),
        ];
    }
}
