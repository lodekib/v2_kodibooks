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

class ClientInvoicesComponent extends Component implements HasForms,HasTable

{

    use InteractsWithTable,InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table->query(ManagerInvoice::query())
        ->columns([
            TextColumn::make('created_at')->date()->size('sm')->searchable()
        ]);
    }

    public function render()
    {
        return view('livewire.client-invoices-component');
    }
}
