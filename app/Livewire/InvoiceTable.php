<?php

namespace App\Livewire;

use App\Models\Invoice;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class InvoiceTable extends Component implements HasForms, HasTable
{

    use InteractsWithTable, InteractsWithForms;
    public $record;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Invoice::where('tenant_name', $this->record->full_names)->latest())
            ->columns([
                TextColumn::make('created_at')->date()->label('Date')->size('sm'),
                TextColumn::make('property_name')->size('sm')->searchable()->sortable(),
                TextColumn::make('unit_name')->size('sm')->sortable()->searchable(),
                TextColumn::make('invoice_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_type')->size('sm')->searchable()->sortable(),
                TextColumn::make('invoice_status')->badge()->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'partially_paid' => 'gray',
                    'fully_paid' => 'success'
                })->searchable()->sortable(),
                TextColumn::make('due_date')->date()->size('sm'),
                TextColumn::make('amount_invoiced')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Invoiced')->money('kes')),
                TextColumn::make('balance')->size('sm')->money('kes')
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
        return view('livewire.invoice-table');
    }
}
