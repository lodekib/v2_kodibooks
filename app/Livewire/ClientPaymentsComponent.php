<?php

namespace App\Livewire;

use App\Models\MpesaC2B;
use App\Models\Paybill;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
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
    public $paybill;
    public function mount()
    {
        $p = Paybill::get();
        if($p->isNotEmpty()){
            $this->paybill = $p->first()->paybill_number;
        }else{
            Notification::make()->danger()->body('Please notify Admin to add your paybill details')->persistent()->send();
        }
    }

    public function table(Table $table): Table
    {
        return $table->query(MpesaC2B::where('Business_Shortcode', $this->paybill))
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
