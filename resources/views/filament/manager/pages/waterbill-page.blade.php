<x-filament-panels::page>
    <div x-data="{ activeTab: 'Water Consumption' }">
        <x-filament::tabs label="water info tabs">
            <x-filament::tabs.item alpine-active="activeTab === 'Water Consumption'" x-on:click="activeTab = 'Water Consumption'" icon="heroicon-s-beaker">
                Water Consumption
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Water Bill'" x-on:click="activeTab = 'Water Bill'" icon="heroicon-s-clipboard-document-list">
                Water Bills
            </x-filament::tabs.item>
        </x-filament::tabs>
        <div x-show="activeTab === 'Water Consumption'" class="py-6">
            {{$this->table}}
        </div>
        <div x-show="activeTab === 'Water Bill'" class="py-6">@livewire('water-bill-component')</div>

    </div>
</x-filament-panels::page>