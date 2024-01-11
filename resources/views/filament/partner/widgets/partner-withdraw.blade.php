<x-filament-widgets::widget>
    <x-filament::section aside icon="heroicon-o-banknotes" icon-color="primary">
        <x-slot name="description">
            You can withdraw your earnings from this area.
        </x-slot>
        <x-filament::modal>

            <x-slot name="trigger">
                <x-filament::button color="primary" icon="heroicon-s-rocket-launch">
                    Withdraw
                </x-filament::button>
            </x-slot>
            <x-slot name="heading">
                Recepient Phone Number :
            </x-slot>

            <x-slot name="description">
                Please provide the receiving phone number ?
            </x-slot>
            <x-filament::input.wrapper suffix-icon="heroicon-m-phone">
                <x-filament::input type="tel" wire:model="phone" />
            </x-filament::input.wrapper>
            <div class="text-red-500">@error('phone') {{ $message }} @enderror</div>

            <x-filament::button wire:click="withdraw" color="primary" icon="heroicon-s-rocket-launch">Withdraw</x-filament::button>

        </x-filament::modal>
    </x-filament::section>
</x-filament-widgets::widget>