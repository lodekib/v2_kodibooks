<?php

namespace App\Livewire;

use App\Models\Vendor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class BulkVendor extends Component implements HasForms, HasTable
{

    use InteractsWithForms, InteractsWithTable;


    public function table(Table $table): Table
    {
        return $table->query(Vendor::query())->columns([
            TextColumn::make('No')->rowIndex(),
            TextColumn::make('company_name')->size('sm')->sortable()->searchable(),
            TextColumn::make('industry')->size('sm')->searchable()->sortable(),
            TextColumn::make('contact_person')->size('sm')->searchable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('contact_number')->size('sm')->searchable()->sortable(),
            TextColumn::make('email')->size('sm')->searchable(),
            TextColumn::make('vendor_type')->size('sm')->searchable()->sortable(),
            TextColumn::make('vendor_particular')->size('sm')->searchable()->sortable(),
            TextColumn::make('payment_method')->size('sm')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true)
        ])->striped()
        ->bulkActions([
            BulkAction::make('Vendor bulk sms')->label('Bulk Message Vendors')->action(function(Collection $records){
                dd($records->first()->contact_number);
            })
        ])
        ;
    }

    public function render()
    {
        return view('livewire.bulk-vendor');
    }
}
