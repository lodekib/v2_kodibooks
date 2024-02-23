<x-filament::page>
    <div x-data="{ activeTab: 'Water Readings' }">
        <x-filament::tabs label="tenant info tabs">
            <x-filament::tabs.item alpine-active="activeTab === 'Water Readings'" x-on:click="activeTab = 'Water Readings'" icon="heroicon-s-beaker">
                Water Readings
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Invoices'" x-on:click="activeTab = 'Invoices'" icon="heroicon-s-clipboard-document">
                Invoices
            </x-filament::tabs.item>
        </x-filament::tabs>
        <div x-show="activeTab === 'Water Readings'" class="py-6">@livewire('outsourcewater-component') </div>
        <div x-show="activeTab === 'Invoices'" class="py-6">@livewire('outsource-invoice-table')</div>
    </div>
</x-filament::page>