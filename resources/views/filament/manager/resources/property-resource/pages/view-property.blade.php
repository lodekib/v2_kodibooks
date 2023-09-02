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
</x-filament::page>