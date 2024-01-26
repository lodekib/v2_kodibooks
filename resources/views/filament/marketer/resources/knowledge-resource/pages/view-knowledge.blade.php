<x-filament::page>
    @foreach($this->record->getMedia() as $media)
    <x-filament::section icon="heroicon-o-information-circle" icon-color="primary" aside>
        <x-slot name="heading">
            {{$this->record->category}}
        </x-slot>
        <x-slot name="description">
            {{$this->record->title}} <br />
            <x-filament::badge color="gray" size="sm" icon="heroicon-o-clock" style="margin-top: 10px;">
                <div style="margin-top: 6px;margin-bottom:6px;">
                    {{ $this->record->created_at->diffForHumans() }}
                </div>
            </x-filament::badge>
        </x-slot>
        <video controls width="640" height="260" style="border-radius: 10px;">
            <source src="{{ $media->getUrl() }}" type="{{ $media->mime_type }}">
            Your browser does not support the video tag.
        </video>
    </x-filament::section>

    @endforeach
</x-filament::page>