<?php

namespace App\Livewire;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class Biodata extends Component implements HasForms
{

    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }



    public function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make()->schema([
                Radio::make('type')->options(['agent' => 'Agent', 'manager' => 'Manager'])->required()->reactive(),
                TextInput::make('commision')->visible(fn ($get) => $get('type') == 'agent' ? true : false),
            ]),
        ])->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }
}
