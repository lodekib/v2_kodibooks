<?php

use App\Livewire\ClientInvoices;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ClientInvoices::class)
        ->assertStatus(200);
});
