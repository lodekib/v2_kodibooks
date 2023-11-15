<?php

namespace App\Filament\Manager\Pages;

use App\Models\ActiveUtility;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\Waterbill;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class WaterbillPage extends Page implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Utilities';
    protected static string $view = 'filament.manager.pages.waterbill-page';
    protected static ?string $navigationLabel = 'Water bills';


    public function table(Table $table): Table
    {
        return $table->query(Waterbill::query())
            ->columns([
                TextColumn::make('date_added')->label('Date')->size('sm'),
                TextColumn::make('tenant_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('property_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('unit_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('previous_reading')->label('Previous Reading (m3)')->size('sm')->formatStateUsing(fn($state) => number_format($state,2)),
                TextColumn::make('current_reading')->label('Previous Reading (m3)')->size('sm')->formatStateUsing(fn($state) => number_format($state,2))
            ])->headerActions([
                CreateAction::make()->label('Add Reading')->outlined()->action(function (array $data) {
                    $tenant = Tenant::where('full_names', $data['tenant_name'])->where('unit_name', $data['unit_name'])->first();
                    $new_data = [
                        'tenant_id' => $tenant->id,
                        'tenant_name' => $data['tenant_name'],
                        'property_name' => $tenant->property_name,
                        'unit_name' => $data['unit_name'],
                        'previous_reading' => $data['previous_reading'],
                        'current_reading' => $data['current_reading'],
                        'date_added' => $data['date_added']

                    ];
                    if (Waterbill::create($new_data)) {
                        Notification::make()->success()->color('success')->body('Water bill added successfully !')->send();
                    } else {
                        Notification::make()->warning()->color('warning')->body('Unable to add water bill')->send();
                    }
                })->form([
                    Fieldset::make('')->schema(
                        [
                            Select::make('tenant_name')->options(fn () =>  ActiveUtility::whereJsonContains('active_utilities', 'Water')->pluck('tenant_name', 'tenant_name'))->required()->reactive(),
                            Select::make('unit_name')->options(fn (Get $get) => $get('tenant_name') != null ? Tenant::where('full_names', $get('tenant_name'))->pluck('unit_name', 'unit_name') : [])->required()
                                ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                    $tenant_name = $get('tenant_name');
                                    if ($tenant_name != null) {
                                        $tenant_exists = Waterbill::where('tenant_name', $tenant_name)
                                            ->where('unit_name', $state)->pluck('current_reading');
                                        if ($tenant_exists->isEmpty()) {
                                            $set('previous_reading', 0);
                                        } else {
                                            $set('previous_reading', $tenant_exists->first());
                                        }
                                    }
                                })->reactive(),
                            TextInput::make('previous_reading')->label('Previous reading ( m3 )')->disabled()->dehydrated()->default(function ($state, Get $get, Set $set) {
                                $tenant_name = $get('tenant_name');
                                $unit_name = $get('unit_name');
                                if ($tenant_name != null && $unit_name != null) {
                                    $tenant_exists = Waterbill::where('tenant_name', $tenant_name)
                                        ->where('unit_name', $unit_name)->pluck('current_reading');
                                    if ($tenant_exists->isEmpty()) {
                                        return 0;
                                    } else {
                                        return $tenant_exists->first();
                                    }
                                }
                            }),
                            TextInput::make('current_reading')->label('Current reading ( m3)')->required()->integer()->minValue(0),
                            DatePicker::make('date_added')->label('Date')->required()
                        ]
                    )->columns(3)
                ])
            ]);
    }
}
