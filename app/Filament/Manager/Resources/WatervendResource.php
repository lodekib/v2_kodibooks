<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\WatervendResource\Pages;
use App\Filament\Manager\Resources\WatervendResource\RelationManagers;
use App\Models\Waterbill;
use App\Models\Watervend;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WatervendResource extends Resource
{
    protected static ?string $model = Watervend::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel =  'Water Vend';
    protected static ?string $navigationGroup = 'Utilities';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('national_number')->required(),
                    TextInput::make('email')->required()->email(),
                    TextInput::make('phone_number')->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')->unique(ignoreRecord: true)->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->date()->size('sm'),
                TextColumn::make('name')->size('sm')->searchable()->sortable(),
                TextColumn::make('national_number')->label('Identity Number')->searchable()->sortable()->copyable(),
                TextColumn::make('phone_number')->size('sm')->copyable()->searchable(),
                TextColumn::make('email')->size('sm')->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('Record Water Reading')->icon('heroicon-o-beaker')
                        ->action(function (Watervend $record, array $data) {
                            $new_data = [
                                'tenant_id' => $record->id,
                                'tenant_name' => $record->name,
                                'property_name' => 'outsourced',
                                'unit_name' => 'Outsourced',
                                'previous_reading' => $data['previous_reading'],
                                'current_reading' => $data['current_reading'],
                                'date_added' => $data['date_added']

                            ];

                            if (Waterbill::create($new_data)) {
                                Notification::make()->success()->body('Water bill added successfully !')->send();
                            } else {
                                Notification::make()->warning()->body('Unable to add water bill')->send();
                            }
                        })->form([
                            Fieldset::make('')->schema(function (Watervend $record) {
                                return [
                                    TextInput::make('name')->disabled()->label('Tenant')->default($record->name),
                                    TextInput::make('previous_reading')->label('Previous reading ( m3 )')->disabled()->dehydrated()->default(function (Watervend $record) {
                                        $tenant_exists = Waterbill::where('tenant_id', $record->id)->pluck('current_reading');
                                        if ($tenant_exists->isEmpty()) {
                                            return 0;
                                        } else {
                                            return $tenant_exists->last();
                                        }
                                    }),
                                    TextInput::make('current_reading')->label('Current reading ( m3)')->required()->integer()->minValue(function (Watervend $record) {
                                        $tenant_exists = Waterbill::where('tenant_id', $record->id)->pluck('current_reading');
                                        if ($tenant_exists->isEmpty()) {
                                            return 0;
                                        } else {
                                            return $tenant_exists->last() + 1;
                                        }
                                    }),
                                    DatePicker::make('date_added')->label('Date')->required()
                                ];
                            })->columns(3)
                        ]),
                        EditAction::make(),
                ])->button(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWatervends::route('/'),
            'create' => Pages\CreateWatervend::route('/create'),
            'edit' => Pages\EditWatervend::route('/{record}/edit'),
        ];
    }
}
