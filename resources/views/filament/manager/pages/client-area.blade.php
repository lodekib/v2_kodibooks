<x-filament-panels::page>
    <div x-data="{ activeTab: 'Invoices' }">
        <x-filament::tabs label="client area">
            <x-filament::tabs.item alpine-active="activeTab === 'Invoices'" x-on:click="activeTab = 'Invoices'" icon="heroicon-o-map">
                Invoices
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Payments'" x-on:click="activeTab = 'Payments'" icon="heroicon-o-newspaper">
                Payments
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Subscriptions'" x-on:click="activeTab = 'Subscriptions'" icon="heroicon-o-tag">
                Subscriptions
            </x-filament::tabs.item>
        </x-filament::tabs>

        <div x-show="activeTab === 'Invoices'" class="py-6">@livewire('client-invoices-component') </div>
        <div x-show="activeTab === 'Subscriptions'" class="py-6">@livewire('packages-component')</div>
        <div x-show="activeTab === 'Payments'" class="py-6">@livewire('client-payments-component')</div>
    </div>
</x-filament-panels::page>