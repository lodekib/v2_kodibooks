<x-filament::page>
    @foreach($this->record as $index => $knowledgebase)
        <x-filament::section icon="heroicon-o-information-circle" icon-color="primary" aside>
            <x-slot name="heading">
                {{ $knowledgebase->category }}
            </x-slot>
            <x-slot name="description">
                {{ $knowledgebase->title }} <br />
                <x-filament::badge color="gray" size="sm" icon="heroicon-o-clock" style="margin-top: 10px;">
                    <div style="margin-top: 6px; margin-bottom:6px;">
                        {{ $knowledgebase->created_at->diffForHumans() }}
                    </div>
                </x-filament::badge>
            </x-slot>

            @foreach ($knowledgebase['media'] as $mediaIndex => $media)
                @if ($index == 0 && $mediaIndex == 0)
                    <!-- The first video in the first record is not locked -->
                    <video controls width="640" height="260" style="border-radius: 5px;" id="video-{{ $media->id }}">
                        <source src="{{ $media->getUrl() }}" type="{{ $media->mime_type }}">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <!-- Lock all other videos -->
                    <x-filament::badge color="danger">locked</x-filament::badge>
                    <video controls width="640" height="260" style="border-radius: 5px;" id="video-{{ $media->id }}" disabled>
                        <source src="{{ $media->getUrl() }}" type="{{ $media->mime_type }}">
                        Your browser does not support the video tag.
                    </video>
                @endif
            @endforeach
        </x-filament::section>
    @endforeach
</x-filament::page>
