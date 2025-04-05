<div class="relative py-16 bg-white overflow-hidden">
    <div class="relative px-4 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            <h1>
                <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Blog</span>
                <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</span>
            </h1>
            <p class="mt-2 text-center text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($publishedAt)->format('F j, Y') }}
            </p>
        </div>
        <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
            {!! $content !!}
        </div>
    </div>
</div>