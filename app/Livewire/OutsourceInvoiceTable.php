<?php

namespace App\Livewire;

use App\Models\OutsourceInvoice;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class OutsourceInvoiceTable extends Component implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table->query(OutsourceInvoice::query()->latest())->columns([
            TextColumn::make('created_at')->date()->size('sm'),
            TextColumn::make('vend_name')->size('sm'),
            TextColumn::make('national_number')->size('sm'),
            TextColumn::make('invoice_type')->size('sm')->searchable(),
            TextColumn::make('amount_invoiced')->size('sm')->money('kes'),
            TextColumn::make('balance')->size('sm')->money('kes'),
            TextColumn::make('invoice_status')->badge()->color(fn (string $state): string => match ($state) {
                'unpaid' => 'danger',
                'partially paid' => 'gray',
                'paid' => 'success',
            })
        ]);
    }

    public function render()
    {
        return view('livewire.outsource-invoice-table');
    }
}
