<div class="nav">
    @if(isset($globals['nav']['banner']))
        <div class="notification text-center py-3 bg-red-600 px-4 text-sm font-medium text-primary-foreground sm:px-6 lg:px-8">{!! $globals['nav']['banner'] !!}</div>
    @endif
    <nav class="bg-primary">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button x-data x-on:click="$dispatch('toggle-mobile-menu')" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-primary-foreground hover:bg-gray-100 hover:text-black focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg x-data x-show="!$store.mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg x-data x-show="$store.mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="/{{ app()->getLocale() }}">
                            <img class="h-8 relative w-auto" src="/logo.svg" alt="{{ $globals['general']['copyright'] ?? 'Logo' }}" style="top: 1px;" />
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            @foreach($globals['nav']['navlinks'] ?? [] as $item)
                                <a href="{{ $item['link'] }}" 
                                   class="{{ request()->url() == $item['link'] ? 'bg-gray-100 text-black' : 'text-primary-foreground hover:bg-white/15' }} rounded-md px-3 py-2 font-medium"
                                   @if(request()->url() == $item['link']) aria-current="page" @endif>
                                    {{ $item['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button x-on:click="open = !open" class="mr-3 inline-block rounded-md px-3.5 py-2.5 text-sm font-semibold text-primary-foreground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open language menu</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 style="display: none;">
                                @foreach($availableLocales ?? [] as $key => $locale)
                                    <a href="/{{ $key }}" class="block px-4 py-2 text-sm text-gray-700">{{ $locale['native'] }}</a>
                                @endforeach
                            </div>
                        </div>
                        @if(isset($globals['nav']['nav_cta_text']))
                            <a href="{{ $globals['nav']['nav_cta_link'] }}" class="rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                {{ $globals['nav']['nav_cta_text'] }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div x-data x-show="$store.mobileMenuOpen" class="sm:hidden" style="display: none;">
            <div class="space-y-1 px-2 pb-3 pt-2">
                @foreach($globals['nav']['navlinks'] ?? [] as $item)
                    <a href="{{ $item['link'] }}" 
                       class="{{ request()->url() == $item['link'] ? 'bg-gray-100 text-black' : 'text-primary-foreground hover:bg-gray-100 hover:text-black' }} block rounded-md px-3 py-2 text-base font-medium"
                       @if(request()->url() == $item['link']) aria-current="page" @endif>
                        {{ $item['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </nav>
    <div class="line"></div>
</div>

<style>
.nav .line {
    background-color: hsla(0,0%,100%,.1);
    height: 1px;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
}
.nav {
    left: 0;
    position: sticky;
    right: 0;
    top: 0;
    z-index: 999;
}
</style>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.store('mobileMenuOpen', false);
    
    Alpine.data('navbar', () => ({
        init() {
            this.$watch('$store.mobileMenuOpen', value => {
                console.log('Mobile menu is now: ', value ? 'open' : 'closed');
            });
        }
    }));
});

window.addEventListener('toggle-mobile-menu', () => {
    Alpine.store('mobileMenuOpen', !Alpine.store('mobileMenuOpen'));
});
</script>