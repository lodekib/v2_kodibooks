<?php

namespace App\Livewire;

use App\Models\Statement;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class StatementTable extends Component implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;


    public $record;

    public function table(Table $table): Table
    {
        return $table
            ->query(Statement::where('tenant_name', $this->record->full_names)->oldest())
            ->columns([
                TextColumn::make('created_at')->size('sm')->date()->label('Date'),
                TextColumn::make('reference')->sortable()->searchable()->size('sm'),
                TextColumn::make('description')->searchable()->size('sm'),
                TextColumn::make('debit')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Debit')->money('kes')),
                TextColumn::make('credit')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Credit')->money('kes')),
                TextColumn::make('balance')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Balance')->money('kes')),
                TextColumn::make('cummulative_balance')->label('Opening balance')->size('sm')->money('kes')
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
        return view('livewire.statement-table');
    }
}
