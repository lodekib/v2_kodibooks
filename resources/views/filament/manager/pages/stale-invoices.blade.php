<x-filament-panels::page>
    <button @click="$dispatch('open-modal', { id: 'biodata' })">TEST DISPATCH</button>
    {{ $this->table }}
</x-filament-panels::page>