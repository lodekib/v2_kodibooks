<x-filament::page>
    <div>
        @php
        $relationManagers = $this->getRelationManagers();
        @endphp

        @if ((! $this->hasCombinedRelationManagerTabsWithContent()) || (! count($relationManagers)))
        @if ($this->hasInfolist())
        {{ $this->infolist }}
        @endif
        @endif
    </div>

    <div x-data="{ activeTab: 'Units' }">

        <x-filament::tabs label="tenant info tabs">
            <x-filament::tabs.item alpine-active="activeTab === 'Units'" x-on:click="activeTab = 'Units'" icon="heroicon-s-cube-transparent">
                Units
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Invoices'" x-on:click="activeTab = 'Invoices'" icon="heroicon-s-newspaper">
                Invoices
            </x-filament::tabs.item>

            <x-filament::tabs.item alpine-active="activeTab === 'Payments'" x-on:click="activeTab = 'Payments'" icon="heroicon-s-banknotes">
                Payments
            </x-filament::tabs.item>

            <x-filament::tabs.item alpine-active="activeTab === 'Statement'" x-on:click="activeTab = 'Statement'" icon="heroicon-s-clipboard-document">
                Statement
            </x-filament::tabs.item>
        </x-filament::tabs>

        <div x-show="activeTab === 'Units'" class="py-6">
            @if (count($relationManagers))
            <x-filament-panels::resources.relation-managers :active-locale="isset($activeLocale) ? $activeLocale : null" :active-manager="$activeRelationManager" :content-tab-label="$this->getContentTabLabel()" :managers="$relationManagers" :owner-record="$record" :page-class="static::class">
                @if ($this->hasCombinedRelationManagerTabsWithContent())
                <x-slot name="content">
                    @if ($this->hasInfolist())
                    {{ $this->infolist }}
                    @else
                    {{ $this->form }}
                    @endif
                </x-slot>
                @endif
            </x-filament-panels::resources.relation-managers>
            @endif
        </div>
        <div x-show="activeTab === 'Invoices'">Invoices</div>
        <div x-show="activeTab === 'Payments'">Payments</div>
        <div x-show="activeTab === 'Statement'">Statements</div>

    </div>



</x-filament::page>