@if ($media)
    @php
        $preset = new \Awcodes\Curator\Curations\ThumbnailPreset();
    @endphp


    @if (str($media->type)->contains('image'))
        @if ($media->hasCuration('thumbnail'))
            <x-curator-curation :media="$media" curation="thumbnail"/>
        @else
            <img
                src="{{ $source }}"
                alt="{{ $media->alt }}"
    {{--            @if ($width && $height)--}}
    {{--                width="{{ $width }}"--}}
    {{--                height="{{ $height }}"--}}
    {{--            @else--}}
    {{--                width="{{ $media->width }}"--}}
    {{--                height="{{ $media->height }}"--}}
    {{--            @endif--}}
                @if ($sourceSet)
                    srcset="{{ $sourceSet }}"
                    sizes="{{ $sizes }}"
                @endif
                {{ $attributes->filter(fn ($attr) => $attr !== '') }}
            />
        @endif
    @else
        <x-curator::document-image
            label="{{ $media->name }}"
            icon-size="xl"
            {{ $attributes->merge(['class' => 'p-4']) }}
        />
    @endif
@endif
