<?php

namespace App\Livewire;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\Waterbill;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class WaterTable extends Component implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;

    public $record;

    public function table(Table $table): Table
    {
        return $table
            ->query(Waterbill::where('tenant_name', $this->record->full_names)->latest())->poll('2s')
            ->columns([
                TextColumn::make('created_at')->label('Date')->size('sm')->date(),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('previous_reading')->label('Previous reading ( m3 )')->size('sm'),
                TextColumn::make('current_reading')->label('Current reading ( m3 )')->size('sm'),
                TextColumn::make('date_added')->date()->size('sm')
            ])
            ->filters([
                // ...
            ])->headerActions([
                CreateAction::make()->label('Record Water bill')->icon('heroicon-o-funnel')->action(function (array $data) {
                    $new_data = [
                        'tenant_id' => $this->record->id,
                        'tenant_name' => $this->record->full_names,
                        'property_name' => $this->record->property_name,
                        'unit_name' => $this->record->unit_name,
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
                            TextInput::make('previous_reading')->label('Previous reading ( m3 )')->disabled()->dehydrated()->required()->default(function () {
                                $tenant_exists = Waterbill::where('property_name', $this->record->property_name)
                                    ->where('tenant_id', $this->record->id)
                                    ->where('unit_name', $this->record->unit_name)->pluck('current_reading');
                                if ($tenant_exists->isEmpty()) {
                                    return 0;
                                } else {
                                    return $tenant_exists->first();
                                }
                            }),
                            TextInput::make('current_reading')->label('Current reading ( m3)')->required()->integer()->minValue(0),
                            DatePicker::make('date_added')->label('Date')->required()
                        ]
                    )->columns(3)
                ]),
                FilamentExportHeaderAction::make('Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()
            ])
            ->actions([])
            ->bulkActions([
                // ...
            ]);
    }



    public function render()
    {
        return view('livewire.water-table');
    }
}
