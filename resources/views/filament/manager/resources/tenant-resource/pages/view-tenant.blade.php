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

    <div x-data="{ activeTab: 'Invoice Statement' }">
        <x-filament::tabs label="tenant info tabs">
            <x-filament::tabs.item alpine-active="activeTab === 'Invoice Statement'" x-on:click="activeTab = 'Invoice Statement'" icon="heroicon-s-clipboard-document">
                Invoice Statement
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Statement'" x-on:click="activeTab = 'Statement'" icon="heroicon-s-clipboard-document">
                Statement
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Ageing'" x-on:click="activeTab = 'Ageing'" icon="heroicon-s-map">
                Ageing Statement
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Payments'" x-on:click="activeTab = 'Payments'" icon="heroicon-s-banknotes">
                Payments
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Invoices'" x-on:click="activeTab = 'Invoices'" icon="heroicon-s-newspaper">
                Invoices
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'Utilities'" x-on:click="activeTab = 'Utilities'" icon="heroicon-s-bolt">
                Utilities
            </x-filament::tabs.item>
            @if($this->hasWater() === true)
            <x-filament::tabs.item alpine-active="activeTab === 'Water'" x-on:click="activeTab = 'Water'" icon="heroicon-s-funnel">
                Water
            </x-filament::tabs.item>
            @endif
            <x-filament::tabs.item alpine-active="activeTab === 'Units'" x-on:click="activeTab = 'Units'" icon="heroicon-s-cube-transparent">
                Units
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
        <div x-show="activeTab === 'Invoice Statement'" class="py-6">@livewire('invoice-statement') </div>
        <div x-show="activeTab === 'Invoices'" class="py-6">@livewire('invoice-table',['record' => $this->record])</div>
        <div x-show="activeTab === 'Payments'" class="py-6">@livewire('payment-table',['record' => $this->record])</div>
        <div x-show="activeTab === 'Statement'" class="py-6">@livewire('statement-table',['record' => $this->record])</div>
        <div x-show="activeTab === 'Ageing'" class="py-6">@livewire('ageing',['record' => $this->record])</div>
        <div x-show="activeTab === 'Utilities'" class="py-6">
            <form action="{{ route('utilities.update',['tenant' => $this->getRecord()]) }}" method="POST">
                @csrf
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Utilities</h3>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-transparent  rounded-lg sm:flex dark:bg-gray-700  dark:text-white px-6">
                    @foreach ($this->getUtilities()[0] as $item)
                    <li class="w-full">
                        <div class="flex items-center pl-3">
                            <input type="checkbox" value="{{ $item }}" name="items[]" class="w-4 h-4 text-teal-500 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ in_array($item, $this->getUtilities()[1]) ? 'checked' : '' }}>
                            <label for="{{ $item }}" class="w-full py-3 px-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item }}</label>
                        </div>
                    </li>
                    @endforeach
                    <x-filament::button type="submit">Update</x-filament::button>

                </ul>
            </form>
        </div>
        @if ($this->hasWater() === true)
        <div x-show="activeTab === 'Water'" class="py-6">
            @livewire('water-table',['record' => $this->record])
        </div>
        @endif
    </div>



</x-filament::page>