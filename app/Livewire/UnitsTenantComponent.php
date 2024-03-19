<?php

namespace App\Livewire;

use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\Unit;
use App\Models\Property;
use Livewire\Component;
use Filament\Notifications\Notification;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction as ActionsCreateAction;

class UnitsTenantComponent extends Component implements HasForms, HasTable
{

    public $record;

    use InteractsWIthForms, InteractsWithTable;


    public function table(Table $table): Table
    {
        return $table->query(Unit::where('tenant_id', $this->record->id))->columns([
            TextColumn::make('No')->rowIndex(),
            TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
            TextColumn::make('unit_name')->size('sm')->searchable()->sortable(),
            TextColumn::make('unit_type')->size('sm')->sortable()->searchable()->badge(),
            TextColumn::make('rent')->size('sm')->money('kes'),
            TextColumn::make('deposit')->size('sm')->money('kes'),
            TextColumn::make('unit_size')->size('sm')->suffix(' sq. m'),
        ])->headerActions([
            ActionsCreateAction::make()->action(function(array $data){
                $unit  = Unit::where('unit_name', $data['unit_name'])->first();
                $unit->update([
                    'status' => 'occupied',
                    'tenant_id' => $this->record->id,
                    'rent' => $unit->rent,
                    'deposit' => $unit->deposit
                ]);
                Notification::make()->color('success')->success()->title('Unit added .')->body('Unit added successfully to tenant')->send();
            })->form([
                Fieldset::make()->schema([
                    Select::make('property_name')->options(Property::all()->pluck('property_name', 'property_name'))->required()->reactive()->hiddenOn('edit'),
                    Select::make('unit_name')->options(function (callable $get) {
                        return Unit::where('status', 'vacant')->where('property_name', $get('property_name'))->pluck('unit_name', 'unit_name');
                    })->required()->hiddenOn('edit'),
                ])
            ])
        ]);
    }
    public function render()
    {
        return view('livewire.units-tenant-component');
    }
}
