<?php

namespace App\Livewire;

use App\Models\Payment;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class PaymentTable extends Component implements HasForms, HasTable
{

    use InteractsWithTable, InteractsWithForms;

    public $record;

    public function table(Table $table): Table
    {
        return $table
            ->query(Payment::where('tenant_name', $this->record->full_names)->latest())
            ->columns([
                TextColumn::make('paid_date')->date()->size('sm')->searchable()->sortable(),
                TextColumn::make('receipt_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('reference_number')->size('sm')->searchable()->sortable(),
                TextColumn::make('mode_of_payment')->size('sm')->label('Payment')->sortable()->searchable(),
                TextColumn::make('amount')->size('sm')->money('kes')->summarize(Sum::make()->label('Total Payments')->money('kes'))->money('kes'),
                TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                    'unallocated' => 'success',
                    'fully allocated' => 'gray',
                    'partially allocated' => 'warning'
                }),
                TextColumn::make('balance')->size('sm')->sortable()->money('kes')->summarize(Sum::make()->label('Total Balance')->money('kes'))->money('kes'),
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
        return view('livewire.payment-table');
    }
}
