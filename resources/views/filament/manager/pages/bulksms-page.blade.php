<x-filament-panels::page>

    <div x-data="{ activeTab: 'Message Tenants' }">
        <x-filament::tabs label="bulksms info tabs">
            <x-filament::tabs.item alpine-active="activeTab === 'Message Tenants'" x-on:click="activeTab = 'Message Tenants'" icon="heroicon-s-users">
                Message Tenants
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Message Vendors'" x-on:click="activeTab = 'Message Vendors'" icon="heroicon-s-truck">
                Message Vendors
            </x-filament::tabs.item>
        </x-filament::tabs>

        <div x-show="activeTab === 'Message Tenants'" class="py-6">@livewire('bulk-tenant')</div>
        <div x-show="activeTab === 'Message Vendors'" class="py-6">@livewire('bulk-vendor')</div>
    </div>
</x-filament-panels::page>