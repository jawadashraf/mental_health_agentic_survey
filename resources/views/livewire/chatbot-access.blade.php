<div class="relative min-h-screen flex flex-col items-center justify-center bg-linear-to-br from-sky-100 via-teal-50 to-amber-100 px-4 py-8 sm:py-12"
     style="--brand-color: {{ $brandColor }};"
     x-data="{ showDisclaimer: false }">

    {{-- Bright decorative background glows --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="absolute -top-28 -left-28 size-80 rounded-full bg-teal-300/35 blur-3xl"></div>
        <div class="absolute -bottom-28 -right-28 size-80 rounded-full bg-amber-300/35 blur-3xl"></div>
        <div class="absolute top-1/3 right-1/4 size-64 rounded-full bg-sky-300/30 blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-lg w-full bg-white rounded-3xl shadow-2xl shadow-teal-900/10 border border-white/80 overflow-hidden">
        {{-- Bright Brand Header --}}
        <div class="px-6 sm:px-8 pt-8 pb-6 text-center text-white relative overflow-hidden"
             style="background: linear-gradient(135deg, {{ $brandColor }}, #0284c7);">
            <div class="pointer-events-none absolute -top-10 -right-10 size-36 rounded-full bg-white/15 blur-xl"></div>
            <div class="pointer-events-none absolute -bottom-12 -left-10 size-36 rounded-full bg-amber-300/20 blur-xl"></div>

            <div class="relative z-10 flex flex-col items-center">
                @if($logoUrl)
                    <div class="mb-4 px-5 py-3 rounded-2xl bg-white shadow-md inline-flex items-center justify-center">
                        <img src="{{ $logoUrl }}" alt="{{ $organizationName }} logo" class="max-h-14 w-auto object-contain">
                    </div>
                @else
                    <div class="mb-4 inline-flex items-center justify-center size-16 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/30 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 text-white">
                            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>
                    </div>
                @endif

                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-sm border border-white/25 mb-3">
                    {{ $organizationName }} · Anonymous Survey
                </span>

                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white">
                    {{ $welcomeTitle }}
                </h1>
                <p class="mt-2 text-sm text-white/90 leading-relaxed max-w-md">
                    {{ $welcomeMessage }}
                </p>
            </div>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            {{-- Access Code Form --}}
            <form wire:submit="verify" class="space-y-4">
                <div>
                    <label for="code" class="block text-sm font-semibold text-gray-800 mb-1.5">
                        Enter your survey access code
                    </label>
                    <p class="text-xs text-gray-500 mb-3">
                        Type the code shared by your survey organiser to continue to the survey welcome &amp; disclaimer.
                    </p>
                    <input wire:model="code" type="text" id="code" autocomplete="off"
                           class="w-full px-4 py-3.5 rounded-xl border-2 border-gray-200 bg-gray-50/70 text-gray-900 focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/15 transition duration-200 outline-none text-center font-mono tracking-wider text-base"
                           placeholder="Enter access code" autofocus>
                    @error('code')
                        <p class="mt-2 text-sm font-medium text-rose-600 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        style="background-color: {{ $brandColor }};"
                        class="w-full hover:brightness-105 active:scale-[0.99] text-white font-bold py-3.5 px-5 rounded-xl shadow-lg transition duration-200 flex items-center justify-center gap-2 cursor-pointer">
                    <span>Continue to Survey</span>
                    <svg wire:loading.remove wire:target="verify" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                    </svg>
                    <svg wire:loading wire:target="verify" class="animate-spin size-5 text-white"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </button>
            </form>

            {{-- Privacy Notice Card --}}
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-xs text-amber-900 leading-relaxed">
                <div class="flex items-start gap-2.5">
                    <span class="text-base leading-none mt-0.5 shrink-0">🔒</span>
                    <div>
                        <strong class="font-bold block mb-0.5">Confidentiality & Privacy Notice:</strong>
                        {{ $privacyNotice }}
                    </div>
                </div>
                <div class="mt-2.5 pt-2 border-t border-amber-200/80 flex justify-end">
                    <button type="button" @click="showDisclaimer = true" class="text-amber-900 font-bold underline hover:no-underline cursor-pointer">
                        Read {{ $disclaimerTitle }} &rarr;
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Viewport-safe Disclaimer Modal --}}
    <div x-show="showDisclaimer" x-cloak
         x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-4 bg-black/60 backdrop-blur-sm"
         @keydown.escape.window="showDisclaimer = false">
        <div @click.outside="showDisclaimer = false"
             class="w-full max-w-2xl max-h-[90dvh] bg-white text-gray-900 rounded-3xl shadow-2xl border border-gray-200 flex flex-col overflow-hidden"
             role="dialog" aria-modal="true" aria-labelledby="access-disclaimer-title">
            <div class="shrink-0 flex items-start justify-between gap-4 px-5 sm:px-7 pt-5 pb-4 border-b border-gray-200 bg-white">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-2xl bg-teal-50 text-teal-700 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 id="access-disclaimer-title" class="text-lg sm:text-xl font-bold tracking-tight text-gray-900">{{ $disclaimerTitle }}</h2>
                        <span class="inline-block mt-0.5 text-xs font-semibold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800">
                            Experimental Trial Service
                        </span>
                    </div>
                </div>
                <button type="button" @click="showDisclaimer = false"
                        aria-label="Close disclaimer"
                        class="shrink-0 rounded-xl p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="flex-1 min-h-0 overflow-y-auto px-5 sm:px-7 py-4 space-y-4 text-sm leading-relaxed text-gray-700">
                <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-900 text-xs">
                    <strong class="font-bold block mb-1">⚠️ Important Warning:</strong>
                    Users should not enter confidential, sensitive, personal or commercially sensitive information into the trial service.
                </div>

                <div class="whitespace-pre-line space-y-3">{{ $disclaimerContent }}</div>
            </div>

            <div class="shrink-0 px-5 sm:px-7 py-4 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button type="button" @click="showDisclaimer = false"
                        style="background-color: {{ $brandColor }};"
                        class="px-5 py-2.5 rounded-xl text-white font-semibold text-sm shadow hover:brightness-105 transition cursor-pointer">
                    Close &amp; Return
                </button>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
