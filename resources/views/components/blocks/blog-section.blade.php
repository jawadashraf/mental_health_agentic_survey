@props(['data'])

<div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($data['items'] ?? [] as $post)
                <article class="flex flex-col items-start justify-between">
                    <div class="relative w-full">
                        @if(isset($post['featured_image']))
                            <img src="{{ asset($post['featured_image']) }}" alt="{{ $post['title'] }}" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]" />
                        @endif
                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    </div>
                    <div class="max-w-xl">
                        <div class="mt-8 flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $post['datetime'] ?? '' }}" class="text-gray-500">{{ $post['datetime_readable'] ?? '' }}</time>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="{{ $data['meta']['base_path'] ?? '/' }}/{{ $post['slug'] }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post['title'] }}
                                </a>
                            </h3>
                            <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post['short_description'] ?? '' }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="flex justify-center items-center py-10">
        @if(isset($data['meta']))
            {{ \Illuminate\Pagination\Paginator::resolveCurrentPath($data['meta']['base_path']) }}
            @php
                $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
                    $data['items'] ?? [], 
                    $data['meta']['total'] ?? 0, 
                    $data['meta']['per_page'] ?? 15, 
                    $data['meta']['current_page'] ?? 1,
                    ['path' => $data['meta']['base_path'] ?? '/']
                );
            @endphp
            {{ $paginator->links() }}
        @endif
    </div>
</div>