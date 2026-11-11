<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-gray-900 px-4 py-8"
     x-data="{ showDisclaimer: false }">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center size-12 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Restricted Survey Access</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">Please enter your access password or secret code provided by your survey organizer to continue.</p>
        </div>

        {{-- Privacy Notice Warning Card --}}
        <div class="mb-6 p-4 rounded-xl bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800/60 text-xs text-amber-800 dark:text-amber-200 leading-relaxed">
            <div class="flex items-start gap-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0 text-amber-600 dark:text-amber-400 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>
                <div>
                    <strong class="font-semibold block mb-0.5">Confidentiality & Privacy Notice:</strong>
                    {{ $privacyNotice }}
                </div>
            </div>
            <div class="mt-2.5 pt-2 border-t border-amber-200/70 dark:border-amber-800/60 text-right">
                <button type="button" @click="showDisclaimer = true" class="text-amber-900 dark:text-amber-300 font-semibold underline hover:no-underline cursor-pointer">
                    Read AI Trial Project Disclaimer &rarr;
                </button>
            </div>
        </div>

        <form wire:submit="verify" class="space-y-5">
            <div>
                <label for="code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Access Code / Secret
                </label>
                <input wire:model="code" type="password" id="code"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200 outline-none text-center font-mono tracking-wider text-base"
                    placeholder="Enter access code" autofocus>
                @error('code')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 text-center">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transition duration-200 flex items-center justify-center space-x-2 cursor-pointer">
                <span>Enter Survey Chat</span>
                <svg wire:loading.remove wire:target="verify" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
                <svg wire:loading wire:target="verify" class="animate-spin h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </button>
        </form>

        <div class="mt-6 pt-5 border-t border-gray-100 dark:border-gray-700 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
            <button type="button" @click="showDisclaimer = true" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition cursor-pointer">
                AI Trial Disclaimer
            </button>
            <a href="/" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                &larr; Back to Home
            </a>
        </div>
    </div>

    {{-- Disclaimer Modal --}}
    <div x-show="showDisclaimer" x-cloak
         x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
         @keydown.escape.window="showDisclaimer = false">
        <div @click.outside="showDisclaimer = false"
             class="w-full max-w-2xl bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-gray-200 dark:border-gray-700 max-h-[90vh] flex flex-col"
             role="dialog" aria-modal="true">
            <div class="flex items-start justify-between gap-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold tracking-tight">{{ $disclaimerTitle }}</h2>
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300">
                            Experimental Trial Service
                        </span>
                    </div>
                </div>
                <button type="button" @click="showDisclaimer = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="overflow-y-auto py-4 space-y-4 text-sm leading-relaxed text-gray-700 dark:text-gray-300 pr-2">
                <div class="p-3.5 rounded-xl bg-amber-50 dark:bg-amber-950/30 border border-amber-200 dark:border-amber-800/50 text-amber-900 dark:text-amber-200 text-xs">
                    <strong class="font-bold block mb-1">⚠️ Important Warning:</strong>
                    Users should not enter confidential, sensitive, personal or commercially sensitive information into the trial service.
                </div>

                <div class="whitespace-pre-line space-y-3">
                    {{ $disclaimerContent }}
                </div>
            </div>

            <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                <button type="button" @click="showDisclaimer = false"
                        class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm shadow transition cursor-pointer">
                    I Understand
                </button>
            </div>
        </div>
    </div>
</div>
