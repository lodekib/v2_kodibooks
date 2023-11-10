<?php

namespace App\Livewire;

use App\Models\ManagerInvoice;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ClientInvoicesComponent extends Component implements HasForms, HasTable

{

    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table->query(ManagerInvoice::query())
            ->columns([
                TextColumn::make('created_at')->label('Date')->date()->size('sm')->searchable(),
                TextColumn::make('invoice_number')->size('sm')->searchable(),
                TextColumn::make('invoice_status')->badge()->searchable()->color(fn (string $state): string => match ($state) {
                    'unpaid' => 'danger',
                    'paid' => 'primary',
                }),
                TextColumn::make('amount')->size('sm')->money('KES')
            ])->actions([
                ViewAction::make()->label('View Invoice')->button()->outlined()
            ]);
    }

    public function render()
    {
        return view('livewire.client-invoices-component');
    }
}
