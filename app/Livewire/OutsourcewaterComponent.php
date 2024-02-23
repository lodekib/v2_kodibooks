<?php

namespace App\Livewire;

use App\Models\Outsourcewater;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class OutsourcewaterComponent extends Component implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;


    public function table(Table $table): Table
    {
        return $table->query(Outsourcewater::query()->latest())->columns([
            TextColumn::make('date_added')->date()->size('sm')->searchable(),
            TextColumn::make('previous_reading')->size('sm')->formatStateUsing(fn($state) =>number_format($state,2))->searchable(),
            TextColumn::make('current_reading')->size('sm')->formatStateUsing(fn($state) => number_format($state,2))->searchable(),
            TextColumn::make('updated_at')->label('Consumption Rate (m3)')->formatStateUsing(fn ($record) => number_format($record->current_reading - $record->previous_reading,2)),
            TextColumn::make('watervend.rate')->label('Rate (ksh)')->money('kes'),
            TextColumn::make('created_at')->label('Total (ksh)')->formatStateUsing(fn($record) => 'KES '.number_format(($record->current_reading - $record->previous_reading) * $record->watervend->rate,2))
        ]);
    }

    public function render()
    {
        return view('livewire.outsourcewater-component');
    }
}
