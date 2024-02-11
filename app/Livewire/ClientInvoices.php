<?php

namespace App\Livewire;

use App\Models\ManagerInvoice;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ClientInvoices extends Component implements HasForms, HasTable
{
    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table->query(ManagerInvoice::query()->where('national_id',$this->record->national_id))->columns([
            TextColumn::make('created_at')->label('Date')->date()->size('sm'),
            TextColumn::make('client')->size('sm')->searchable(),
            TextColumn::make('national_id')->size('sm')->searchable()->copyable(),
            TextColumn::make('invoice_number')->size('sm')->searchable(),
            TextColumn::make('amount')->size('sm')->searchable()->money('kes'),
            TextColumn::make('invoice_status')->size('size')->searchable()->badge()->color(fn (string $state): string => match ($state) {
                'paid' => 'success',
                'unpaid' => 'danger',
            }),

        ]);
    }
    public function render()
    {
        return view('livewire.client-invoices');
    }
}
