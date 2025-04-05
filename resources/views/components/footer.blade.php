<footer class="bg-primary" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-12">
        <div class="xl:grid xl:grid-cols-4 xl:gap-8">
            <img class="h-7" src="/logo.svg" alt="{{ $globals['general']['copyright'] ?? 'Logo' }}" />
            <div class="mt-16 grid grid-cols-1 gap-8 xl:col-span-3 xl:mt-0">
                <div class="md:grid md:grid-cols-4 md:gap-8">
                    @foreach($globals['footer']['linkgroups'] ?? [] as $linkGroup)
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-primary-foreground">{{ $linkGroup['title'] }}</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                @foreach($linkGroup['links'] as $item)
                                    <li>
                                        <a href="{{ $item['link'] }}" class="text-sm leading-6 text-primary-foreground">{{ $item['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-white/10 pt-8 md:flex md:items-center md:justify-between">
            <p class="mt-8 text-xs leading-5 text-primary-foreground md:order-1 md:mt-0">&copy; {{ $globals['general']['copyright'] ?? date('Y') }}</p>
        </div>
    </div>
</footer>