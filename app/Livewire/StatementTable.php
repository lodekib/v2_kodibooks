<?php

namespace App\Livewire;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Models\Statement;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Query\Builder;
use Livewire\Component;

class StatementTable extends Component implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;


    public $record;


    public function table(Table $table): Table
    {
        return $table
            ->query(Statement::where('tenant_id', $this->record->id)->oldest())
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('created_at')->size('sm')->datetime()->label('Date'),
                TextColumn::make('reference')->sortable()->searchable()->size('sm'),
                TextColumn::make('description')->searchable()->size('sm'),
                TextColumn::make('debit')->size('sm')->money('kes')->formatStateUsing(fn ($state) => $state == 0 ? '-' : 'KES ' . number_format($state, 2)),
                TextColumn::make('credit')->size('sm')->formatStateUsing(fn ($state) => $state == 0 ? '-' : 'KES ' . number_format($state, 2)),
                TextColumn::make('s_balance')->label('Balance')->size('sm')->money('kes'),
            ])
            ->filters([
                // ...
            ])->headerActions([
                // FilamentExportHeaderAction::make('Reports')->color('gray')->icon('heroicon-o-clipboard-document')->disableAdditionalColumns(),
                ExportAction::make()->outlined()->label('Excel')->color('gray')->exports([ExcelExport::make('table')->fromTable()->withFilename(date('Y-m-d') . ' - export')->except(['No'])])
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
