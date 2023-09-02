<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\TenantResource\Pages;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Manager\Resources\TenantResource\RelationManagers;
use App\Models\ActiveUtility;
use App\Models\Statement;
use App\Models\Waterbill;
use Filament\Forms\Components\Fieldset;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;

class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;
    protected static ?string $navigationGroup = 'Assets';
    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')->description('Personal & housing details.')->schema([
                    TextInput::make('full_names')->required(),
                    TextInput::make('email')->required()->unique(),
                    TextInput::make('phone_number')->required()->integer(),
                    TextInput::make('id_number')->required()->unique()->integer(),
                    Select::make('property_name')->options(Property::all()->pluck('property_name', 'property_name'))->required()->reactive(),
                    Select::make('unit_name')->options(function (callable $get) {
                        return Unit::where('status', 'vacant')->where('property_name', $get('property_name'))->pluck('unit_name', 'unit_name');
                    })->required()->reactive()->afterStateUpdated(function ($set, $state) {
                        $unit = Unit::where('unit_name', $state)->get();
                        $set('rent', $unit->first()->rent);
                        $set('deposit', $unit->first()->deposit);
                    }),
                ])->columns(3),
                Section::make('')->description('Payments & invoicing.')->schema([
                    TextInput::make('rent')->prefix('Ksh')->required(),
                    TextInput::make('deposit')->prefix('Ksh')->lte('rent')->required(),
                    TextInput::make('arrears')->prefix('Ksh')->required()->default(0),
                    TextInput::make('surplus')->prefix('Ksh')->required()->default(0),
                    DatePicker::make('entry_date')->required()
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm')->sortable(),
                TextColumn::make('full_names')->size('sm')->searchable()->sortable(),
                TextColumn::make('email')->size('sm')->sortable()->searchable(),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('rent')->size('sm')->money('kes'),
                TextColumn::make('deposit')->size('sm')->money('kes'),
                TextColumn::make('balance')->size('sm')->formatStateUsing(function ($record) {
                    $debit_credit = Statement::selectRaw('tenant_name, SUM(debit) as total_debit, SUM(credit) as total_credit')
                        ->where('tenant_name', $record->full_names)->groupBy('tenant_name')->first();
                    return $debit_credit != null ? $debit_credit->total_debit - $debit_credit->total_credit : 0;
                })->money('kes'),
                TextColumn::make('entry_date')->size('sm'),
                TextColumn::make('status')->colors([
                    'success' => static fn ($state): bool => $state === 'active',
                    'warning' => static fn ($state): bool => $state === 'inactive',
                ])->badge(),
            ])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('Add water bill')->icon('heroicon-o-funnel')
                        ->action(function (Tenant $record, array $data) {
                            $new_data = [
                                'tenant_id' => $record->id,
                                'tenant_name' => $record->full_names,
                                'property_name' => $record->property_name,
                                'unit_name' => $record->unit_name,
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
                            Fieldset::make('')->schema(function (Tenant $record) {
                                return [
                                    TextInput::make('full_names')->disabled()->label('Tenant')->default($record->full_names),
                                    TextInput::make('property')->label('Property')->disabled()->default($record->property_name),
                                    TextInput::make('unit')->label('Unit')->disabled()->default($record->unit_name),
                                    TextInput::make('previous_reading')->label('Previous reading ( m3 )')->disabled()->dehydrated()->default(function (Tenant $record) {
                                        $tenant_exists = Waterbill::where('property_name', $record->property_name)
                                            ->where('tenant_id', $record->id)
                                            ->where('unit_name', $record->unit_name)->pluck('current_reading');

                                        if ($tenant_exists->isEmpty()) {
                                            return 0;
                                        } else {
                                            return $tenant_exists->first()->current_reading;
                                        }
                                    }),
                                    TextInput::make('current_reading')->label('Current reading ( m3)')->required()->numeric(),
                                    DatePicker::make('date_added')->label('Date')
                                ];
                            })->columns(3)
                        ])->visible(function (Tenant $record) {
                            $water_exists = false;
                            $has_water_utility = ActiveUtility::where('property_name', $record->property_name)->get('active_utilities')->toArray();
                            foreach ($has_water_utility  as $item) {
                                if (in_array('Water', $item['active_utilities'])) {
                                    $water_exists =  true;
                                    break;
                                }
                            }
                            return $water_exists;
                        }),
                    ViewAction::make(),
                    EditAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UnitsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
            'view' => Pages\ViewTenant::route('/{record}')
        ];
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->schema([
                        Split::make([
                            Grid::make(3)
                                ->schema([
                                    Group::make([
                                        TextEntry::make('full_names'),
                                        TextEntry::make('property_name'),
                                    ]),
                                    Group::make([
                                        TextEntry::make('email'),
                                        TextEntry::make('entry_date')->date()
                                    ]),
                                    Group::make([
                                        TextEntry::make('phone_number'),
                                        TextEntry::make('status')->badge()->color(fn ($state) => $state == 'active' ? 'success' : 'warning'),
                                    ]),
                                ]),
                        ])->from('lg'),
                    ])->collapsible(),
            ]);
    }
}
