<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\WatervendResource\Pages;
use App\Filament\Manager\Resources\WatervendResource\RelationManagers;
use App\Filament\Manager\Resources\WatervendResource\RelationManagers\OutsourcewatersRelationManager;
use App\Models\OutsourceInvoice;
use App\Models\Outsourcewater;
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
                    TextInput::make('rate')->label('Rate ( Ksh )')->required()->integer()
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
                TextColumn::make('email')->size('sm')->sortable()->searchable(),
                TextColumn::make('rate')->size('sm')->money('kes')->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('Record Water Reading')->icon('heroicon-o-beaker')
                        ->action(function (Watervend $record, array $data) {
                            $new_data = [
                                'watervend_id' => $record->id,
                                'vend_name' => $record->name,
                                'previous_reading' => $data['previous_reading'],
                                'current_reading' => $data['current_reading'],
                                'date_added' => $data['date_added']
                            ];

                            if (Outsourcewater::create($new_data)) {
                                $invoice_number = strtoupper(substr($record->name, 0, 3)) . "-" . time();
                                $amount_invoiced = ($data['current_reading'] - $data['previous_reading']) * $data['rate'];
                                $invoice_data = [
                                    'watervend_id' => $record->id,
                                    'vend_name' => $record->name,
                                    'national_number' => $record->national_number,
                                    'invoice_number' => $invoice_number,
                                    'invoice_type' => 'Outsourced Water',
                                    'invoice_description' => 'Payment Invoice',
                                    'amount_invoiced' => $amount_invoiced,
                                    'balance' => $amount_invoiced
                                ];
                                OutsourceInvoice::create($invoice_data);
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
                                    TextInput::make('rate')->label('Rate (ksh)')->disabled()->dehydrated()->default($record->rate),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWatervends::route('/'),
            'create' => Pages\CreateWatervend::route('/create'),
            'view' => Pages\ViewWatervend::route('/{record}')
        ];
    }
}
