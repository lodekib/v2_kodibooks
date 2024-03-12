<?php

namespace App\Livewire;

use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\Unit;
use Livewire\Component;
use Filament\Actions\CreateAction;

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
        ]);
    }
    public function render()
    {
        return view('livewire.units-tenant-component');
    }
}
