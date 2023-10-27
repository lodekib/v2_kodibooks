<x-filament-panels::page>
    <x-filament::section icon="heroicon-o-user" icon-color="primary" aside >
        <x-slot name="heading">
            Transaction Code
        </x-slot>
        <form wire:submit="create" class="py-4">
            <x-filament::input.wrapper>
                <x-filament::input type="text" wire:model="code" required />
            </x-filament::input.wrapper>
            <br>
            <x-filament::button type="submit" icon="heroicon-m-sparkles">
                Submit
            </x-filament::button>
        </form>
        <x-slot name="description">
            Make payment to the Paybill 4237321 and provide the transaction code below.
        </x-slot>
    </x-filament::section>
</x-filament-panels::page>