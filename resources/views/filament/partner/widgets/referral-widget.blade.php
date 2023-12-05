<x-filament-widgets::widget>
    <x-filament::section aside>
        <x-slot name="heading">
            @if($hasCode)
            <x-filament::button icon="heroicon-o-link" disabled>
                Referral Link
            </x-filament::button>
            @else
            <x-filament::button wire:click="generateLink" icon="heroicon-o-link">
                Referral Link
            </x-filament::button>
            @endif
        </x-slot>
        <div>
            <x-filament::input.wrapper>
                <x-filament::input disabled wire:model="generatedCode" />
            </x-filament::input.wrapper>
            <x-filament::modal>
                <x-slot name="heading">
                    Share link
                </x-slot>

                <x-slot name="description">
                    Share your referral link to the new manager
                </x-slot>
                <x-slot name="trigger">
                    <x-filament::icon-button icon="heroicon-m-share" />
                </x-slot>
                <form wire:submit.prevent="share">
                    <x-filament::input.wrapper :valid="! $errors->has('email')">
                        <x-filament::input type="email" wire:model="email" required />
                    </x-filament::input.wrapper> <br>
                    <x-filament::button type="submit">
                        Share
                    </x-filament::button>
                </form>
            </x-filament::modal>
        </div>
    </x-filament::section>

</x-filament-widgets::widget>