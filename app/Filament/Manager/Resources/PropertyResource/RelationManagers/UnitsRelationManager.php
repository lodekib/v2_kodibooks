<?php

namespace App\Filament\Manager\Resources\PropertyResource\RelationManagers;

use App\Models\Property;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitsRelationManager extends RelationManager
{
    protected static string $relationship = 'units';
    protected static bool $isLazy = false;

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('unit_name')->required()->maxLength(255)->unique(),
                Select::make('unit_type')->options(['bedsitter' => 'Bedsitter', 'one_bedroom' => 'One Bedroom', 'two_bedroom' => 'Two Bedroom',])->required(),
                TextInput::make('unit_size')->integer()->minValue(1)->prefix('sq . m')->required(),
                TextInput::make('rent')->prefix('Ksh')->required()->integer()->minValue(1),
                TextInput::make('deposit')->prefix('Ksh')->required()->lte('rent')->integer()->minValue(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('unit_name')
            ->columns([
                TextColumn::make('created_at')->label('Date')->size('sm')->date(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                IconColumn::make('unit_condition')->label('Condition')->icons([
                    'heroicon-o-check-circle' => 'good',
                    'heroicon-o-x-circle' => 'maintenance'
                ])
                    ->colors([
                        'success' => 'good',
                        'warning' => 'maintenance',
                    ]),
                TextColumn::make('unit_type')->size('sm')->sortable()->searchable()->badge(),
                TextColumn::make('rent')->size('sm')->prefix('Ksh '),
                TextColumn::make('deposit')->size('sm')->prefix('Ksh '),
                TextColumn::make('unit_size')->size('sm')->suffix(' sq. m'),
                TextColumn::make('status')->badge()->color(fn ($state) => $state == 'vacant' ? 'warning' : 'primary')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->icon('heroicon-o-plus-circle')->action(function (array $data) {
                    $unit_data = array_merge(
                        $data,
                        [
                            'property_name' => $this->getOwnerRecord()->property_name,
                            'property_id' => $this->getOwnerRecord()->id
                        ]
                    );
                    Unit::create($unit_data);
                    Notification::make()->success()->color('success')->body('Unit added successfully')->send();
                })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
            ]);
    }
}
