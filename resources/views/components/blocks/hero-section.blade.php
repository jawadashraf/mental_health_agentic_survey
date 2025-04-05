@props(['data'])

@php
    $background = isset($data['background']) ? "bg-{$data['background']}" : 'bg-primary';
    $color = $background === 'bg-white' ? 'text-black' : 'text-white';
@endphp

<div class="relative {{ $background }}">
    <div class="mx-auto max-w-7xl lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8">
        <div class="px-6 pb-24 pt-10 sm:pb-32 lg:col-span-7 lg:px-0 xl:col-span-6">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h1 class="mt-24 text-4xl font-extrabold font-secondary tracking-tight {{ $color }}">
                    {{ $data['hero_title'] }}
                </h1>
                <div class="mt-6 text-lg leading-8 {{ $color }}">{!! $data['hero_content'] !!}</div>
                <div class="mt-10 flex items-center gap-x-6 flex-col md:flex-row space-y-3 md:space-y-0">
                    @foreach($data['buttons'] ?? [] as $button)
                        @if(isset($button['variant']) && $button['variant'] !== 'transparent')
                            <a href="{{ $button['url'] }}" class="rounded-md bg-{{ $button['variant'] }}-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-{{ $button['variant'] }}-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-{{ $button['variant'] }}-600">
                                {{ $button['label'] }}
                            </a>
                        @else
                            <a href="{{ $button['url'] }}" class="text-sm font-semibold leading-6 {{ $color }}">
                                {{ $button['label'] }} <span aria-hidden="true">→</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @if(isset($data['hero_image']))
            <div class="relative lg:col-span-5 lg:-mr-8 xl:absolute xl:inset-0 xl:left-1/2 xl:mr-0">
                <img class="aspect-[3/2] w-full object-cover lg:absolute lg:inset-0 lg:aspect-auto lg:h-full" src="{{ asset($data['hero_image']) }}" alt="" />
            </div>
        @endif
    </div>
</div>