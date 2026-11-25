<div class="relative min-h-screen flex items-center justify-center p-2 sm:p-4 md:p-6 transition-all duration-700"
     style="--brand-color: {{ $brandColor }};"
     x-data="{
         loaded: false,
         theme: @js($theme),
         showThemePicker: false,
         showGuide: @js($showGuide),
         showDisclaimer: false,
         confirmEnd: false,
         dismissGuide() {
             this.showGuide = false;
             $wire.dismissGuide();
         },
         acceptDisclaimer() {
             this.showDisclaimer = false;
             $wire.acceptDisclaimer();
         },
         scrollToQuestion(id) {
             const cards = document.querySelectorAll('[data-question-card=&quot;' + id + '&quot;]');
             const card = cards[cards.length - 1];
             if (card) {
                 card.scrollIntoView({ behavior: 'smooth', block: 'center' });
                 card.querySelector('textarea, input')?.focus({ preventScroll: true });
             }
         },
         themes: {
             bright:   { label: 'Bright',     icon: '☀️', bg: 'from-sky-100 via-teal-50 to-amber-100' },
             skyblue:  { label: 'Sky Blue',   icon: '🏔️', bg: 'from-sky-200 via-blue-100 to-indigo-200' },
             peach:    { label: 'Peach',      icon: '🍑', bg: 'from-orange-200 via-amber-100 to-rose-200' },
             alabaster:{ label: 'Alabaster',  icon: '☁️', bg: 'from-slate-50 via-gray-100 to-indigo-50' },
             aurora:   { label: 'Aurora',     icon: '🌌', bg: 'from-indigo-950 via-purple-900 to-slate-900' },
             ocean:    { label: 'Ocean',      icon: '🌊', bg: 'from-slate-900 via-cyan-900 to-blue-950' },
             sunset:   { label: 'Sunset',     icon: '🌅', bg: 'from-rose-950 via-orange-900 to-amber-950' },
             forest:   { label: 'Forest',     icon: '🌿', bg: 'from-emerald-950 via-green-900 to-teal-950' },
             midnight: { label: 'Midnight',   icon: '🌙', bg: 'from-gray-950 via-slate-900 to-zinc-950' },
         },
         get current() { return this.themes[this.theme] || this.themes.bright; },
         get isLight() { return ['bright', 'skyblue', 'peach', 'alabaster'].includes(this.theme); },
         setTheme(t) {
             this.theme = t;
             this.showThemePicker = false;
             $wire.setTheme(t);
             window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: t } }));
         },
         isProcessing: @entangle('isProcessing'),
         takesTime: @entangle('currentQuestionTakesTime'),
         nudgeTimer: null,
         initNudgeTimer() {
             this.clearNudgeTimer();
             if (!this.isProcessing && this.takesTime) {
                 this.nudgeTimer = setTimeout(() => {
                     $wire.triggerNudge();
                 }, 60000);
             }
         },
         clearNudgeTimer() {
             if (this.nudgeTimer) {
                 clearTimeout(this.nudgeTimer);
                 this.nudgeTimer = null;
             }
         },
         scrollToBottom(force = false) {
             const el = document.getElementById('raft-chat-messages');
             if (el) {
                 const isNearBottom = el.scrollHeight - el.scrollTop - el.clientHeight < 150;
                 if (force || isNearBottom) {
                     el.scrollTop = el.scrollHeight;
                 }
             }
         }
     }"
     x-init="
         setTimeout(() => loaded = true, 60);
         $watch('isProcessing', (val) => {
             initNudgeTimer();
             if (val) {
                 setTimeout(() => scrollToBottom(true), 50);
                 setTimeout(() => {
                     if (this.isProcessing) this.isProcessing = false;
                 }, 60000);
             }
         });
         $watch('takesTime', () => initNudgeTimer());

         const attachObserver = () => {
             const messagesEl = document.getElementById('raft-chat-messages');
             if (messagesEl && !messagesEl.dataset.observed) {
                 messagesEl.dataset.observed = 'true';
                 const observer = new MutationObserver(() => scrollToBottom(false));
                 observer.observe(messagesEl, { childList: true, subtree: true, characterData: true });
             }
         };
         attachObserver();
         $nextTick(() => attachObserver());
     "
     @keyup="clearNudgeTimer(); if (!isProcessing) { initNudgeTimer(); }"
     @click.away="showThemePicker = false"
     :class="'bg-linear-to-br ' + current.bg">

    {{-- Animated background orbs --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="absolute -top-32 -left-32 h-96 w-96 rounded-full blur-3xl animate-pulse transition-colors duration-700"
             :class="{
                 'bg-teal-300/40': theme === 'bright',
                 'bg-purple-500/20': theme === 'aurora',
                 'bg-cyan-500/20': theme === 'ocean',
                 'bg-rose-500/20': theme === 'sunset',
                 'bg-emerald-500/20': theme === 'forest',
                 'bg-slate-500/20': theme === 'midnight',
                 'bg-sky-400/40': theme === 'skyblue',
                 'bg-orange-300/40': theme === 'peach',
                 'bg-slate-300/40': theme === 'alabaster',
             }"></div>
        <div class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full blur-3xl animate-pulse transition-colors duration-700"
             :class="{
                 'bg-amber-300/40': theme === 'bright',
                 'bg-indigo-500/20': theme === 'aurora',
                 'bg-blue-500/20': theme === 'ocean',
                 'bg-orange-500/20': theme === 'sunset',
                 'bg-green-500/20': theme === 'forest',
                 'bg-gray-500/20': theme === 'midnight',
                 'bg-sky-300/40': theme === 'skyblue',
                 'bg-rose-300/40': theme === 'peach',
                 'bg-gray-200/40': theme === 'alabaster',
             }"
             style="animation-delay: 1.5s"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-64 w-64 rounded-full blur-3xl animate-pulse transition-colors duration-700"
             :class="{
                 'bg-sky-300/35': theme === 'bright',
                 'bg-violet-400/10': theme === 'aurora',
                 'bg-teal-400/10': theme === 'ocean',
                 'bg-amber-400/10': theme === 'sunset',
                 'bg-teal-400/10': theme === 'forest',
                 'bg-zinc-400/10': theme === 'midnight',
                 'bg-indigo-300/30': theme === 'skyblue',
                 'bg-amber-300/30': theme === 'peach',
                 'bg-indigo-100/30': theme === 'alabaster',
             }"
             style="animation-delay: 3s"></div>
    </div>

    @if(! $hasEnteredChat)
        {{-- Bright, Welcoming Survey Landing & Disclaimer Screen --}}
        <div class="relative z-10 w-full max-w-2xl my-4 sm:my-6">
            <div class="w-full rounded-3xl bg-white shadow-2xl shadow-teal-900/10 border border-white/80 overflow-hidden">
                {{-- Colourful Brand Banner --}}
                <div class="px-6 sm:px-9 pt-8 pb-7 text-center text-white relative overflow-hidden"
                     style="background: linear-gradient(135deg, {{ $brandColor }}, #0284c7);">
                    <div class="pointer-events-none absolute -top-12 -right-12 size-44 rounded-full bg-white/15 blur-2xl"></div>
                    <div class="pointer-events-none absolute -bottom-14 -left-10 size-44 rounded-full bg-amber-300/25 blur-2xl"></div>

                    <div class="relative z-10 flex flex-col items-center">
                        @if($logoUrl)
                            <div class="mb-4 px-5 py-3 rounded-2xl bg-white shadow-lg inline-flex items-center justify-center">
                                <img src="{{ $logoUrl }}" alt="{{ $organizationName }} logo" class="max-h-16 w-auto object-contain">
                            </div>
                        @else
                            <div class="mb-4 inline-flex items-center justify-center size-16 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/30 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 text-white">
                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>
                            </div>
                        @endif

                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold tracking-wide bg-white/20 backdrop-blur-sm border border-white/30 mb-3">
                            {{ $organizationName }} · Anonymous Survey
                        </span>

                        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                            {{ $welcomeTitle }}
                        </h1>
                        <p class="mt-3 text-sm sm:text-base text-white/95 leading-relaxed max-w-xl">
                            {{ $welcomeMessage }}
                        </p>
                    </div>
                </div>

                {{-- Body --}}
                <div class="p-6 sm:p-8 space-y-6">
                    {{-- How this works (3 friendly cards) --}}
                    <div>
                        <h2 class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-3">How this works</h2>
                        <div class="grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl bg-sky-50 border border-sky-100 p-3.5">
                                <div class="text-xl mb-1.5">🔒</div>
                                <div class="text-sm font-bold text-gray-900">100% Anonymous</div>
                                <p class="mt-0.5 text-xs text-gray-600 leading-relaxed">No names or accounts needed. Your answers are never linked to you.</p>
                            </div>
                            <div class="rounded-2xl bg-teal-50 border border-teal-100 p-3.5">
                                <div class="text-xl mb-1.5">⏭️</div>
                                <div class="text-sm font-bold text-gray-900">At Your Own Pace</div>
                                <p class="mt-0.5 text-xs text-gray-600 leading-relaxed">{{ count($questions) }} short questions. Skip any question or stop whenever you like.</p>
                            </div>
                            <div class="rounded-2xl bg-amber-50 border border-amber-100 p-3.5">
                                <div class="text-xl mb-1.5">💬</div>
                                <div class="text-sm font-bold text-gray-900">Friendly Helper</div>
                                <p class="mt-0.5 text-xs text-gray-600 leading-relaxed">Ask questions about {{ $organizationName }} or the survey at any point in the chat.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Privacy & Disclaimer Agreement --}}
                    <div class="rounded-2xl bg-amber-50/90 border border-amber-200 p-4 sm:p-5 space-y-3.5">
                        <div class="flex items-start gap-3">
                            <span class="text-lg leading-none mt-0.5 shrink-0">⚠️</span>
                            <div class="text-xs sm:text-sm text-amber-950 leading-relaxed">
                                <strong class="font-bold block mb-0.5">Privacy:</strong>
                                {{ $privacyNotice }}
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-2 pt-2.5 border-t border-amber-200/80">
                            <span class="text-xs font-medium text-amber-900">
                                This survey uses an experimental AI assistant.
                            </span>
                            <button type="button"
                                    @click="showDisclaimer = true"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white border border-amber-300 text-xs font-bold text-amber-950 hover:bg-amber-100 transition cursor-pointer shadow-xs">
                                <span>Read {{ $disclaimerTitle }}</span>
                                <span aria-hidden="true">&rarr;</span>
                            </button>
                        </div>

                        @if($requireDisclaimer)
                            <label for="disclaimer-agreement"
                                   class="flex items-start gap-3 p-3.5 rounded-xl bg-white border-2 transition cursor-pointer"
                                   :class="$wire.disclaimerCheckbox ? 'border-teal-500 ring-2 ring-teal-500/15' : 'border-amber-300 hover:border-teal-400'">
                                <input id="disclaimer-agreement"
                                       type="checkbox"
                                       wire:model.live="disclaimerCheckbox"
                                       class="mt-0.5 size-5 rounded border-gray-300 text-teal-600 focus:ring-teal-500 shrink-0 cursor-pointer">
                                <span class="text-xs sm:text-sm font-semibold text-gray-800 leading-snug">
                                    I understand this is an anonymous AI trial project and I agree to the {{ $disclaimerTitle }}.
                                </span>
                            </label>
                            @error('disclaimerCheckbox')
                                <p class="text-xs sm:text-sm font-semibold text-rose-600 flex items-center gap-1.5">
                                    <span aria-hidden="true">!</span>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                        @endif
                    </div>

                    {{-- Primary & Secondary CTAs --}}
                    <div class="space-y-3">
                        <button type="button"
                                wire:click="startSurvey"
                                wire:loading.attr="disabled"
                                wire:target="startSurvey,enterChat"
                                style="background-color: {{ $brandColor }};"
                                class="w-full py-4 px-6 rounded-2xl text-white font-bold text-base sm:text-lg shadow-xl hover:brightness-105 active:scale-[0.99] transition duration-200 flex items-center justify-center gap-2.5 cursor-pointer disabled:opacity-60">
                            <span>{{ $requireDisclaimer ? 'Agree & Start Survey' : 'Start the Survey' }}</span>
                            <svg wire:loading.remove wire:target="startSurvey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                            </svg>
                            <svg wire:loading wire:target="startSurvey" class="animate-spin size-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>

                        <div class="text-center">
                            <button type="button"
                                    wire:click="enterChat"
                                    wire:loading.attr="disabled"
                                    wire:target="startSurvey,enterChat"
                                    class="text-xs sm:text-sm font-semibold text-gray-600 hover:text-gray-900 underline underline-offset-4 transition cursor-pointer">
                                Want to ask a question about {{ $organizationName }} first? Open chat
                            </button>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-100 text-center text-[11px] text-gray-400">
                        Raft AI Assistant · {{ $surveyName }}
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Main chat card wrapper --}}
        <div class="relative z-10 w-full max-w-6xl flex flex-col lg:flex-row items-center justify-center gap-4 lg:gap-12 px-1 sm:px-4 transition-all duration-700">
            {{-- Side Image --}}
            <div class="hidden lg:block w-1/2 max-w-sm animate-[fadeInLeft_0.8s_ease-out] transition-all duration-700">
                <img src="{{ asset('assets/images/chat/chat_side_image.webp') }}"
                     alt="Chat Background"
                     class="w-full h-auto rounded-[2.5rem] shadow-2xl border border-white/20 ring-1 ring-black/5 mx-auto">
            </div>

            {{-- Main chat card --}}
            <div class="w-full max-w-2xl flex flex-col h-[95dvh] sm:h-[90dvh] rounded-2xl sm:rounded-3xl backdrop-blur-xl shadow-2xl overflow-hidden transition-all duration-700"
                 :class="isLight
                     ? 'bg-white/90 border border-black/10 shadow-teal-900/10'
                     : 'bg-white/5 border border-white/10 shadow-purple-900/30'"
                 x-bind:class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">

                {{-- Header --}}
                <div class="flex items-center gap-3 px-4 sm:px-6 py-3 sm:py-4 border-b transition-colors duration-500"
                     :class="isLight ? 'border-black/10 bg-white/80' : 'border-white/10 bg-white/5'">
                    <div class="relative shrink-0">
                        @if($logoUrl)
                            <div class="flex items-center justify-center h-10 sm:h-11 px-2 rounded-xl bg-white border border-black/10 shadow-xs">
                                <img src="{{ $logoUrl }}" alt="{{ $organizationName }} logo" class="max-h-8 max-w-20 object-contain">
                            </div>
                        @else
                            <div class="flex items-center justify-center size-10 sm:size-11 rounded-xl shadow-lg transition-all duration-500"
                                 :style="theme === 'bright' ? 'background: linear-gradient(135deg, {{ $brandColor }}, #0284c7);' : ''"
                                 :class="{
                                     'bg-linear-to-br from-purple-500 to-indigo-600 shadow-purple-500/30': theme === 'aurora',
                                     'bg-linear-to-br from-cyan-500 to-blue-600 shadow-cyan-500/30': theme === 'ocean',
                                     'bg-linear-to-br from-rose-500 to-orange-600 shadow-rose-500/30': theme === 'sunset',
                                     'bg-linear-to-br from-emerald-500 to-teal-600 shadow-emerald-500/30': theme === 'forest',
                                     'bg-linear-to-br from-slate-400 to-gray-600 shadow-slate-500/30': theme === 'midnight',
                                     'bg-linear-to-br from-sky-500 to-blue-600 shadow-sky-500/30': theme === 'skyblue',
                                     'bg-linear-to-br from-orange-400 to-rose-500 shadow-orange-400/30': theme === 'peach',
                                     'bg-linear-to-br from-slate-400 to-gray-500 shadow-slate-300/30': theme === 'alabaster',
                                 }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 sm:size-6 text-white">
                                    <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-2.995a3.745 3.745 0 0 1-1.087-3.612V2.658Z" />
                                    <path d="M16.5 13.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM12 13.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                                </svg>
                            </div>
                            <span class="absolute -bottom-0.5 -right-0.5 size-3 bg-emerald-400 rounded-full border-2 animate-pulse"
                                  :class="isLight ? 'border-white' : 'border-slate-900'"></span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h1 class="text-base sm:text-lg font-bold tracking-tight truncate transition-colors duration-500"
                            :class="isLight ? 'text-gray-900' : 'text-white'">{{ $surveyName }}</h1>
                        <p class="text-xs truncate transition-colors duration-500"
                           :class="isLight ? 'text-gray-500' : 'text-white/50'">Raft AI Assistant · Anonymous</p>
                    </div>

                    {{-- Disclaimer toggle --}}
                    <button type="button"
                            @click="showDisclaimer = true"
                            class="flex items-center justify-center size-9 rounded-xl border transition-all duration-200 group cursor-pointer"
                            :class="isLight
                                ? 'bg-black/5 border-black/10 hover:bg-black/10'
                                : 'bg-white/10 border-white/10 hover:bg-white/20 hover:border-white/20'"
                            title="AI Trial Disclaimer & Privacy"
                            aria-label="AI Trial Disclaimer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="size-4 transition-colors duration-200"
                             :class="isLight ? 'text-gray-600 group-hover:text-gray-900' : 'text-white/60 group-hover:text-white'">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    {{-- Help toggle --}}
                    <button type="button"
                            @click="showGuide = !showGuide"
                            class="flex items-center justify-center size-9 rounded-xl border transition-all duration-200 group cursor-pointer"
                            :class="isLight
                                ? 'bg-black/5 border-black/10 hover:bg-black/10'
                                : 'bg-white/10 border-white/10 hover:bg-white/20 hover:border-white/20'"
                            title="How this works"
                            aria-label="How this works">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="size-4 transition-colors duration-200"
                             :class="isLight ? 'text-gray-600 group-hover:text-gray-900' : 'text-white/60 group-hover:text-white'">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0ZM8.94 6.94a.75.75 0 1 1-1.061-1.061 3 3 0 1 1 2.871 5.026v.345a.75.75 0 0 1-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 1 0 8.94 6.94ZM10 15a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    {{-- End survey --}}
                    @if($surveyStarted && !$surveyCompleted)
                        <button type="button"
                                @click="confirmEnd = true"
                                class="flex items-center gap-1.5 h-9 px-3 rounded-xl border text-xs font-semibold transition-all duration-200 cursor-pointer"
                                :class="isLight
                                    ? 'bg-black/5 border-black/10 text-gray-600 hover:bg-rose-50 hover:border-rose-200 hover:text-rose-700'
                                    : 'bg-white/10 border-white/10 text-white/70 hover:bg-rose-500/20 hover:border-rose-400/30 hover:text-white'"
                                title="End the survey">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z" clip-rule="evenodd" />
                            </svg>
                            <span class="hidden sm:inline">End</span>
                        </button>
                    @endif

                    {{-- Theme switcher --}}
                    <div class="relative" @click.stop>
                        <button @click="showThemePicker = !showThemePicker"
                                class="flex items-center justify-center size-9 rounded-xl border transition-all duration-200 group cursor-pointer"
                                :class="isLight
                                    ? 'bg-black/5 border-black/10 hover:bg-black/10'
                                    : 'bg-white/10 border-white/10 hover:bg-white/20 hover:border-white/20'"
                                title="Change theme">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 class="size-4 transition-colors duration-200"
                                 :class="isLight
                                     ? 'text-gray-600 group-hover:text-gray-900'
                                     : 'text-white/60 group-hover:text-white'">
                                <path fill-rule="evenodd" d="M7.455 2.004a.75.75 0 0 1 .26.77 7.003 7.003 0 0 0 9.5 9.511.75.75 0 0 1 1.032.954 9.002 9.002 0 0 1-16.674-5.735.75.75 0 0 1 .77-.26A7 7 0 0 0 7.455 2.004Z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        {{-- Theme dropdown --}}
                        <div x-show="showThemePicker" x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                             class="absolute right-0 top-full mt-2 w-48 rounded-2xl backdrop-blur-xl shadow-2xl overflow-hidden z-50 p-1.5"
                             :class="isLight
                                 ? 'bg-white border border-black/10 shadow-black/15'
                                 : 'bg-gray-900/95 border border-white/15 shadow-black/40'"
                             @click.outside="showThemePicker = false">
                            <div class="px-3 py-2 text-[10px] font-semibold uppercase tracking-wider"
                                 :class="isLight ? 'text-gray-400' : 'text-white/40'">Choose Theme</div>
                            <template x-for="(data, key) in themes" :key="key">
                                <button @click="setTheme(key)"
                                        wire:loading.attr="disabled"
                                        wire:target="setTheme"
                                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all duration-200 cursor-pointer"
                                        :class="theme === key
                                            ? (isLight ? 'bg-black/8 text-gray-900 font-medium' : 'bg-white/15 text-white font-medium')
                                            : (isLight ? 'text-gray-600 hover:bg-black/5 hover:text-gray-900' : 'text-white/70 hover:bg-white/10 hover:text-white')">
                                    <span class="text-base" x-text="data.icon"></span>
                                    <span x-text="data.label"></span>
                                    <svg x-show="theme === key" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 ml-auto text-emerald-500">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </template>
                        </div>
                    </div>

                    @if($surveyCompleted)
                        <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-emerald-500">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs font-semibold text-emerald-700">Complete</span>
                        </div>
                    @endif
                </div>

                {{-- How this works (toggleable from ? button) --}}
                <div x-show="showGuide" x-cloak
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-4 sm:px-6 py-4 border-b transition-colors duration-500"
                     :class="isLight ? 'border-black/5 bg-teal-50/80' : 'border-white/5 bg-indigo-500/10'">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h2 class="text-sm font-bold" :class="isLight ? 'text-gray-800' : 'text-white'">How this works</h2>
                        <button type="button" @click="dismissGuide()"
                                class="shrink-0 px-3 py-1 rounded-lg text-xs font-semibold transition-colors duration-200 cursor-pointer"
                                :class="isLight ? 'bg-white text-gray-700 border border-black/10 hover:bg-gray-50' : 'bg-white/10 text-white border border-white/10 hover:bg-white/20'">
                            Got it
                        </button>
                    </div>
                    <ol class="grid gap-2.5 sm:grid-cols-3 text-xs leading-relaxed" :class="isLight ? 'text-gray-600' : 'text-white/70'">
                        <li class="flex gap-2">
                            <span class="shrink-0 flex items-center justify-center size-5 rounded-full text-[10px] font-bold" :class="isLight ? 'bg-teal-600 text-white' : 'bg-indigo-400 text-indigo-950'">1</span>
                            <span><strong :class="isLight ? 'text-gray-800' : 'text-white'">Chat with me</strong> using the message box at the bottom. Ask anything, such as what Raft does or how your answers are used.</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="shrink-0 flex items-center justify-center size-5 rounded-full text-[10px] font-bold" :class="isLight ? 'bg-teal-600 text-white' : 'bg-indigo-400 text-indigo-950'">2</span>
                            <span><strong :class="isLight ? 'text-gray-800' : 'text-white'">Answer in the question cards.</strong> Each survey question has its own answer box. Press Submit to save your answer.</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="shrink-0 flex items-center justify-center size-5 rounded-full text-[10px] font-bold" :class="isLight ? 'bg-teal-600 text-white' : 'bg-indigo-400 text-indigo-950'">3</span>
                            <span><strong :class="isLight ? 'text-gray-800' : 'text-white'">You're in control.</strong> Skip any question, or press End to stop at any time. Your answers are anonymous.</span>
                        </li>
                    </ol>
                </div>

                {{-- Progress bar --}}
                @if($surveyStarted && !$surveyCompleted)
                    @php
                        $totalQuestions = count($questions);
                        $answeredCount = count($responses ?? []);
                        $progressPercent = $totalQuestions > 0 ? round(($answeredCount / $totalQuestions) * 100) : 0;
                    @endphp
                    <div class="px-4 sm:px-6 py-2.5 border-b transition-colors duration-500"
                         :class="isLight ? 'border-black/5 bg-teal-50/40' : 'border-white/5 bg-white/2'">
                        <div class="flex items-center justify-between mb-1.5">
                            <div class="flex items-center gap-2">
                                <span class="text-[11px] font-semibold transition-colors duration-500"
                                      :class="isLight ? 'text-gray-500' : 'text-white/40'">Progress</span>
                                @if($this->currentSectionTitle)
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold tracking-wider transition-all duration-300"
                                          :class="isLight ? 'bg-teal-100 text-teal-800 border border-teal-200' : 'bg-indigo-500/20 text-indigo-200 border border-indigo-500/30'">
                                        Section {{ $this->currentSectionNumber }} of {{ $this->totalSections }}: {{ $this->currentSectionTitle }}
                                    </span>
                                @endif
                            </div>
                            <span class="text-[11px] font-bold transition-colors duration-500"
                                  :class="isLight ? 'text-gray-700' : 'text-white/70'">{{ $answeredCount }} / {{ $totalQuestions }}</span>
                        </div>
                        <div class="w-full h-2 rounded-full overflow-hidden transition-colors duration-500"
                             :class="isLight ? 'bg-black/10' : 'bg-white/10'">
                            <div class="h-full rounded-full transition-all duration-500 ease-out"
                                 :style="theme === 'bright' ? 'background-color: {{ $brandColor }}; width: {{ $progressPercent }}%' : 'width: {{ $progressPercent }}%'"
                                 :class="{
                                     'bg-linear-to-r from-purple-500 to-indigo-500': theme === 'aurora',
                                     'bg-linear-to-r from-cyan-500 to-blue-500': theme === 'ocean',
                                     'bg-linear-to-r from-rose-500 to-orange-500': theme === 'sunset',
                                     'bg-linear-to-r from-emerald-500 to-teal-500': theme === 'forest',
                                     'bg-linear-to-r from-slate-400 to-gray-500': theme === 'midnight',
                                     'bg-linear-to-r from-sky-500 to-blue-500': theme === 'skyblue',
                                     'bg-linear-to-r from-orange-400 to-rose-400': theme === 'peach',
                                     'bg-linear-to-r from-slate-400 to-gray-400': theme === 'alabaster',
                                 }"></div>
                        </div>

                        @if($this->pendingQuestion)
                            <div class="mt-2 flex items-center gap-2 text-xs">
                                <span class="shrink-0 font-semibold" :class="isLight ? 'text-gray-500' : 'text-white/50'">Now answering:</span>
                                <span class="truncate" :class="isLight ? 'text-gray-700' : 'text-white/80'" title="{{ $this->pendingQuestion['question'] }}">
                                    Q{{ $this->pendingQuestion['id'] }}. {{ $this->pendingQuestion['question'] }}
                                </span>
                                <button type="button"
                                        @click="scrollToQuestion(@js($this->pendingQuestion['id']))"
                                        class="shrink-0 ml-auto px-2.5 py-1 rounded-lg font-semibold transition-colors duration-200 cursor-pointer"
                                        :class="isLight ? 'bg-white text-teal-700 border border-teal-200 hover:bg-teal-50' : 'bg-white/10 text-white border border-white/15 hover:bg-white/20'">
                                    Go to question
                                </button>
                            </div>
                        @endif
                    </div>
                @endif

                {{-- Messages area --}}
                <div class="flex-1 overflow-y-auto p-4 sm:p-6 flex flex-col-reverse" id="raft-chat-messages">
                    <div class="flex flex-col gap-3">
                        @foreach($messages as $key => $message)
                            @if ($message['role'] === 'user')
                                <div class="max-w-[85%] sm:max-w-[75%] space-y-1 self-end animate-[fadeInUp_0.3s_ease-out]">
                                    <div class="text-[11px] text-right font-medium transition-colors duration-500"
                                         :class="isLight ? 'text-gray-400' : 'text-white/40'">You</div>
                                    <div class="text-white rounded-2xl rounded-tr-sm px-4 py-2.5 text-sm leading-relaxed shadow-lg transition-all duration-500"
                                         :style="theme === 'bright' ? 'background-color: {{ $brandColor }};' : ''"
                                         :class="{
                                             'bg-linear-to-br from-purple-600 to-indigo-600 shadow-purple-600/20': theme === 'aurora',
                                             'bg-linear-to-br from-cyan-600 to-blue-600 shadow-cyan-600/20': theme === 'ocean',
                                             'bg-linear-to-br from-rose-600 to-orange-600 shadow-rose-600/20': theme === 'sunset',
                                             'bg-linear-to-br from-emerald-600 to-teal-600 shadow-emerald-600/20': theme === 'forest',
                                             'bg-linear-to-br from-slate-600 to-gray-600 shadow-slate-600/20': theme === 'midnight',
                                             'bg-linear-to-br from-sky-500 to-blue-600 shadow-sky-500/20': theme === 'skyblue',
                                             'bg-linear-to-br from-orange-500 to-rose-500 shadow-orange-500/20': theme === 'peach',
                                             'bg-linear-to-br from-slate-500 to-gray-600 shadow-slate-500/20': theme === 'alabaster',
                                         }">
                                        {{ $message['content'] }}
                                    </div>
                                </div>
                            @endif

                            @if ($message['role'] === 'assistant')
                                <livewire:raft-chat-response
                                    :wire:key="'ai-resp-' . $key . '-' . (isset($metadata[$key]['type']) ? $metadata[$key]['type'] : 'default')"
                                    :message="$message" :metadata="$metadata[$key] ?? []" :prompt="$messages[$key - 1] ?? []" :theme="$theme" :msg-index="$key" />
                            @endif
                        @endforeach

                        {{-- Prominent Start Survey CTA when inside chat before Q1 has started --}}
                        @if(! $surveyStarted && ! $surveyCompleted)
                            <div class="pt-1">
                                <button type="button"
                                        wire:click="askQuestion"
                                        wire:loading.attr="disabled"
                                        style="background-color: {{ $brandColor }};"
                                        class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl text-white font-bold text-sm shadow-lg hover:brightness-105 active:scale-[0.98] transition cursor-pointer">
                                    <span>Start the Survey</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                        <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Input bar (hidden when survey is completed) --}}
                @if($surveyCompleted)
                    <div class="p-4 sm:p-6 border-t transition-colors duration-500 space-y-4"
                         :class="isLight ? 'border-black/10 bg-white/70' : 'border-white/10 bg-white/5'">
                        <div class="text-center">
                            <div class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-emerald-500/15 border border-emerald-500/25">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-emerald-500">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-medium" :class="isLight ? 'text-emerald-700' : 'text-emerald-300'">Survey complete — thank you for your time!</span>
                            </div>
                        </div>

                        {{-- Optional mailing list sign-up --}}
                        <div class="max-w-lg mx-auto rounded-2xl border p-4"
                             :class="isLight ? 'bg-white/90 border-black/10' : 'bg-white/5 border-white/10'">
                            @if($joinedMailingList)
                                <p class="text-sm text-center font-medium" :class="isLight ? 'text-gray-700' : 'text-white/80'">
                                    Thanks! You're on the mailing list.
                                </p>
                            @else
                                <p class="text-sm font-semibold mb-1" :class="isLight ? 'text-gray-800' : 'text-white'">Want to hear about Raft's events and support?</p>
                                <p class="text-xs mb-3" :class="isLight ? 'text-gray-500' : 'text-white/50'">Optional. Your email is kept separately and is never linked to your survey answers.</p>
                                <form wire:submit="joinMailingList" class="flex gap-2">
                                    <input type="email" wire:model="mailingListEmail" placeholder="you@example.com"
                                           aria-label="Email address"
                                           class="flex-1 min-w-0 rounded-xl border px-3 py-2 text-sm focus:outline-none"
                                           :class="isLight ? 'bg-white border-black/10 text-gray-800 placeholder-gray-400 focus:border-black/25' : 'bg-white/10 border-white/10 text-white placeholder-white/30 focus:border-white/30'">
                                    <button type="submit" wire:loading.attr="disabled" wire:target="joinMailingList"
                                            style="background-color: {{ $brandColor }};"
                                            class="shrink-0 px-4 py-2 rounded-xl text-sm font-semibold text-white hover:brightness-105 transition duration-200 disabled:opacity-50 cursor-pointer">
                                        Join
                                    </button>
                                </form>
                                @error('mailingListEmail')
                                    <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
                                @enderror
                            @endif
                        </div>
                    </div>
                @else
                    <form @submit.prevent="if($wire.body.trim() !== '') { $wire.send(); isProcessing = true; }" class="p-3 sm:p-4 border-t transition-colors duration-500"
                          :class="isLight ? 'border-black/10 bg-white/80' : 'border-white/10 bg-white/5'">
                        {{-- Privacy reminder banner above input --}}
                        <div class="mb-2 px-3 py-1.5 rounded-xl text-xs flex items-center justify-between gap-2 transition-colors duration-500"
                             :class="isLight ? 'bg-amber-50/95 text-amber-900 border border-amber-200' : 'bg-amber-500/10 text-amber-200 border border-amber-500/20'">
                            <div class="flex items-center gap-2 overflow-hidden">
                                <span class="text-sm shrink-0">🔒</span>
                                <span class="truncate"><strong>Privacy:</strong> {{ $privacyNotice }}</span>
                            </div>
                            <button type="button" @click="showDisclaimer = true"
                                    class="text-[11px] font-bold underline hover:no-underline shrink-0 cursor-pointer">
                                Disclaimer
                            </button>
                        </div>

                        <div class="flex items-center gap-2 sm:gap-3">
                            <div class="relative flex-1 flex items-center rounded-2xl border transition-all duration-300 focus-within:shadow-lg"
                                 :class="isLight
                                     ? 'bg-white border-black/15 focus-within:border-teal-500 focus-within:shadow-teal-500/10'
                                     : 'bg-white/10 border-white/10 focus-within:bg-white/15 focus-within:border-white/20 focus-within:shadow-purple-500/10'"
                                 x-data="{
                                     resize() {
                                         $refs.chatInput.style.height = 'auto';
                                         $refs.chatInput.style.height = Math.min($refs.chatInput.scrollHeight, 160) + 'px';
                                     }
                                 }">
                                <textarea x-ref="chatInput"
                                          class="w-full bg-transparent px-4 py-2.5 text-sm focus:outline-none transition-colors duration-500 disabled:opacity-50 resize-none overflow-y-auto"
                                          :class="isLight ? 'text-gray-800 placeholder-gray-400' : 'text-white placeholder-white/30'"
                                          placeholder="Type your message..."
                                          wire:model="body"
                                          :disabled="isProcessing"
                                          rows="1"
                                          @input="resize()"
                                          @keydown.enter="if (!$event.shiftKey) { $event.preventDefault(); if ($wire.body.trim() !== '' && !isProcessing) { $wire.send(); isProcessing = true; } }"
                                          x-effect="if (!isProcessing) { $el.removeAttribute('disabled'); }"></textarea>
                            </div>

                            {{-- Skip Button --}}
                            @if($surveyStarted)
                                <button type="button"
                                    wire:click="skipQuestion"
                                    :disabled="isProcessing"
                                    class="shrink-0 flex items-center justify-center px-4 py-2.5 rounded-2xl text-xs font-semibold shadow-sm hover:scale-105 active:scale-95 transition-all duration-200 disabled:opacity-50 disabled:scale-100 cursor-pointer"
                                    :class="isLight
                                        ? 'bg-white text-gray-700 border border-black/15 hover:bg-gray-50'
                                        : 'bg-white/10 text-white/90 border border-white/10 hover:bg-white/20'">
                                    Skip
                                </button>
                            @endif

                            {{-- Finish Button (skip phase only) --}}
                            @if($inSkipPhase)
                                <button type="button"
                                    wire:click="finishSurvey"
                                    :disabled="isProcessing"
                                    class="shrink-0 flex items-center justify-center px-4 py-2.5 rounded-2xl text-xs font-semibold shadow-lg hover:scale-105 active:scale-95 transition-all duration-200 disabled:opacity-50 disabled:scale-100 bg-emerald-600 text-white border border-emerald-500 hover:bg-emerald-500 cursor-pointer">
                                    Finish
                                </button>
                            @endif

                            {{-- Send Button --}}
                            <button type="submit"
                                :disabled="isProcessing"
                                :style="theme === 'bright' ? 'background-color: {{ $brandColor }};' : ''"
                                class="shrink-0 flex items-center justify-center size-11 sm:size-12 rounded-2xl text-white shadow-lg hover:scale-105 active:scale-95 transition-all duration-200 disabled:opacity-50 disabled:scale-100 cursor-pointer"
                                :class="{
                                    'bg-linear-to-br from-purple-500 to-indigo-600 shadow-purple-500/30 hover:shadow-purple-500/50': theme === 'aurora',
                                    'bg-linear-to-br from-cyan-500 to-blue-600 shadow-cyan-500/30 hover:shadow-cyan-500/50': theme === 'ocean',
                                    'bg-linear-to-br from-rose-500 to-orange-600 shadow-rose-500/30 hover:shadow-rose-500/50': theme === 'sunset',
                                    'bg-linear-to-br from-emerald-500 to-teal-600 shadow-emerald-500/30 hover:shadow-emerald-500/50': theme === 'forest',
                                    'bg-linear-to-br from-slate-400 to-gray-600 shadow-slate-500/30 hover:shadow-slate-500/50': theme === 'midnight',
                                    'bg-linear-to-br from-sky-500 to-blue-600 shadow-sky-500/30 hover:shadow-sky-500/50': theme === 'skyblue',
                                    'bg-linear-to-br from-orange-400 to-rose-500 shadow-orange-400/30 hover:shadow-orange-400/50': theme === 'peach',
                                    'bg-linear-to-br from-slate-500 to-gray-600 shadow-slate-400/30 hover:shadow-slate-400/50': theme === 'alabaster',
                                }">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                    <path d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endif

    {{-- End survey confirmation modal (root level so never clipped by chat card) --}}
    <div x-show="confirmEnd" x-cloak
         x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
         @keydown.escape.window="confirmEnd = false">
        <div @click.outside="confirmEnd = false"
             class="w-full max-w-sm rounded-2xl p-6 shadow-2xl bg-white text-gray-900 border border-gray-200"
             role="dialog" aria-modal="true" aria-labelledby="end-survey-title">
            <h2 id="end-survey-title" class="text-base font-bold mb-2">End the survey?</h2>
            <p class="text-sm leading-relaxed text-gray-600 mb-5">
                The answers you've already given are saved anonymously. You won't be able to come back and finish the rest.
            </p>
            <div class="flex justify-end gap-2">
                <button type="button" @click="confirmEnd = false"
                        class="px-4 py-2 rounded-xl text-sm font-semibold border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors duration-200 cursor-pointer">
                    Keep going
                </button>
                <button type="button" @click="confirmEnd = false; $wire.endSurvey()"
                        class="px-4 py-2 rounded-xl text-sm font-semibold text-white bg-rose-600 hover:bg-rose-700 transition-colors duration-200 cursor-pointer">
                    End survey
                </button>
            </div>
        </div>
    </div>

    {{-- Full AI Trial Disclaimer Modal (root level, viewport-safe scrolling on mobile & desktop) --}}
    <div x-show="showDisclaimer" x-cloak
         x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-4 bg-black/60 backdrop-blur-sm"
         @keydown.escape.window="showDisclaimer = false">
        <div @click.outside="showDisclaimer = false"
             class="w-full max-w-2xl max-h-[90dvh] rounded-3xl shadow-2xl flex flex-col overflow-hidden bg-white text-gray-900 border border-gray-200"
             role="dialog" aria-modal="true" aria-labelledby="disclaimer-title">
            {{-- Sticky Header --}}
            <div class="shrink-0 flex items-start justify-between gap-3 px-5 sm:px-7 pt-5 pb-4 border-b border-gray-200 bg-white">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center size-10 rounded-2xl bg-teal-50 text-teal-700 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 id="disclaimer-title" class="text-base sm:text-lg font-bold text-gray-900">{{ $disclaimerTitle }}</h2>
                        <span class="inline-block mt-0.5 text-[11px] font-semibold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800">
                            Experimental Trial Project
                        </span>
                    </div>
                </div>
                <button type="button" @click="showDisclaimer = false"
                        aria-label="Close disclaimer"
                        class="shrink-0 p-2 rounded-xl text-gray-500 hover:text-gray-800 hover:bg-gray-100 transition cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </button>
            </div>

            {{-- Scrollable Body --}}
            <div class="flex-1 min-h-0 overflow-y-auto px-5 sm:px-7 py-4 space-y-4">
                <div class="p-3.5 rounded-xl border bg-amber-50 border-amber-200 text-amber-900 text-xs leading-relaxed">
                    <strong class="font-bold block mb-0.5">⚠️ Confidentiality &amp; Privacy Notice:</strong>
                    Users should not enter confidential, sensitive, personal, medical, financial, safeguarding, or commercially sensitive information into this trial service.
                </div>

                <div class="text-xs sm:text-sm leading-relaxed text-gray-700 whitespace-pre-line">{{ $disclaimerContent }}</div>
            </div>

            {{-- Sticky Footer --}}
            <div class="shrink-0 px-5 sm:px-7 py-4 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <span class="text-xs text-gray-500">
                    By proceeding, you acknowledge this experimental service.
                </span>
                <div class="flex items-center justify-end gap-2">
                    <button type="button" @click="showDisclaimer = false"
                            class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 transition cursor-pointer">
                        Close
                    </button>
                    <button type="button" @click="acceptDisclaimer()"
                            style="background-color: {{ $brandColor }};"
                            class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold text-white hover:brightness-105 shadow-md transition cursor-pointer">
                        I Understand & Accept
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
