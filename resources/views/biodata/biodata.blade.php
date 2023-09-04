<x-filament::modal id="biodata"  slide-over sticky-header sticky-footer width='5xl' :close-button="true" :close-by-clicking-away="true" icon="heroicon-o-information-circle">
    <x-slot name="heading">
        Biodata
    </x-slot>
    <x-slot name="description">
        Thank you for choosing Kodibooks. Please provide information about you and your organization.
    </x-slot>
 

    <livewire:biodata />

    <x-slot name="footer">
        Kodibooks
    </x-slot>
</x-filament::modal>