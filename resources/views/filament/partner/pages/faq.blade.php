<x-filament-panels::page>
    @foreach($this->records as $faq)
    <x-filament::section icon="heroicon-o-question-mark-circle">
        <x-slot name="heading">
            {{$faq->question}}
        </x-slot>
        {{$faq->answer}}
    </x-filament::section>
    @endforeach
</x-filament-panels::page>