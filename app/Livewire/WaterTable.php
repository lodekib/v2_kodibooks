<?php

namespace App\Livewire;

use App\Models\Waterbill;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class WaterTable extends Component implements HasForms,HasTable
{

    use InteractsWithForms,InteractsWithTable;

    public $record;

    public function table(Table $table): Table
    {
        return $table
            ->query(Waterbill::where('tenant_name',$this->record->full_names)->latest())->poll('2s')
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
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

   

    public function render()
    {
        return view('livewire.water-table');
    }
}
