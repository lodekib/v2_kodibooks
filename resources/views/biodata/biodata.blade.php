<x-filament::modal slide-over sticky-header sticky-footer width='5xl' :close-button="true" :close-by-clicking-away="true" icon="heroicon-o-information-circle">
    <x-slot name="trigger">
        <x-filament::button>
            Open modal
        </x-filament::button>
    </x-slot>
    <x-slot name="heading">
        Get to know you
    </x-slot>
    
    <livewire:biodata />

    <x-slot name="footer">
        Kodibooks
    </x-slot>
</x-filament::modal>