<?php

namespace App\Livewire;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Models\Statement;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class Ageing extends Component implements HasForms, HasTable
{

    use InteractsWithForms,InteractsWithTable;

    public $record;
    public function table(Table $table): Table
    {
        return $table
        ->query(Statement::where('tenant_name', $this->record->full_names)->oldest())->poll('2s')
        ->columns([
            TextColumn::make('No')->rowIndex(),
            TextColumn::make('custom_date')->size('sm')->datetime()->label('Date'),
            TextColumn::make('reference')->sortable()->searchable()->size('sm'),
            TextColumn::make('description')->searchable()->size('sm'),
            TextColumn::make('debit')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Debit')->money('kes'))->formatStateUsing(fn($state) => $state == 0 ? '-' :'KES ' .number_format($state,2)),
            TextColumn::make('credit')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Credit')->money('kes'))->formatStateUsing(fn($state) => $state == 0 ? '-' :'KES ' .number_format($state,2)),
            TextColumn::make('balance')->size('sm')->money('kes'),
            TextColumn::make('cummulative_balance')->label('Opening balance')->size('sm')->money('kes'),
        ])
        ->filters([
            // ...
        ])->headerActions([
                FilamentExportHeaderAction::make('Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns()
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
        return view('livewire.ageing');
    }
}
