<?php

namespace App\Livewire;

use App\Models\MpesaC2B;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Console\Concerns\InteractsWithIO;
use Livewire\Component;

class ClientPaymentsComponent extends Component implements HasTable, HasForms
{

    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table->query(MpesaC2B::query())
            ->columns([
                TextColumn::make('created_at')->date()->size('sm')->searchable(),
                TextColumn::make('FirstName')->searchable()->size('sm'),
                TextColumn::make('Transaction_ID')->size('sm')->searchable(),
                TextColumn::make('Amount')->size('sm')->money('KES')->summarize(Sum::make()->money('KES')),
                TextColumn::make('Account_Number')->size('sm')->searchable(),
                TextColumn::make('Phonenumber')->size('sm')->searchable(),

            ]);
    }

    public function render()
    {
        return view('livewire.client-payments-component');
    }
}
