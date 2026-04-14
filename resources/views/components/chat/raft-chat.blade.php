<div class="relative min-h-screen flex items-center justify-center p-2 sm:p-4 md:p-6 transition-all duration-700"
     x-data="{
         loaded: false,
         theme: @js($theme),
         showThemePicker: false,
         themes: {
             aurora:   { label: 'Aurora',     icon: '🌌', bg: 'from-indigo-950 via-purple-900 to-slate-900' },
             ocean:    { label: 'Ocean',      icon: '🌊', bg: 'from-slate-900 via-cyan-900 to-blue-950' },
             sunset:   { label: 'Sunset',     icon: '🌅', bg: 'from-rose-950 via-orange-900 to-amber-950' },
             forest:   { label: 'Forest',     icon: '🌿', bg: 'from-emerald-950 via-green-900 to-teal-950' },
             midnight: { label: 'Midnight',   icon: '🌙', bg: 'from-gray-950 via-slate-900 to-zinc-950' },
             skyblue:  { label: 'Sky Blue',   icon: '🏔️', bg: 'from-sky-200 via-blue-100 to-indigo-200' },
             peach:    { label: 'Peach',      icon: '🍑', bg: 'from-orange-200 via-amber-100 to-rose-200' },
             alabaster:{ label: 'Alabaster',   icon: '☁️', bg: 'from-slate-50 via-gray-100 to-indigo-50' },
         },
         get current() { return this.themes[this.theme] || this.themes.alabaster; },
         get isLight() { return this.theme === 'skyblue' || this.theme === 'peach' || this.theme === 'alabaster'; },
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
                 }, 60000); // 60 seconds
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
         setTimeout(() => loaded = true, 100);
          $watch('isProcessing', (val) => {
              initNudgeTimer();
              if (val) {
                  setTimeout(() => scrollToBottom(true), 50);
                  // Failsafe: Re-enable input if stuck for more than 60 seconds
                  setTimeout(() => {
                      if (this.isProcessing) this.isProcessing = false;
                  }, 60000);
              }
          });
          $watch('takesTime', () => initNudgeTimer());
         
         const messagesEl = document.getElementById('raft-chat-messages');
         if (messagesEl) {
             const observer = new MutationObserver(() => scrollToBottom(false));
             observer.observe(messagesEl, { childList: true, subtree: true, characterData: true });
         }
     "
     @keyup="clearNudgeTimer(); if (!isProcessing) { initNudgeTimer(); }"
     @click.away="showThemePicker = false"
     :class="'bg-linear-to-br ' + current.bg">

    {{-- Animated background orbs --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -top-32 -left-32 h-96 w-96 rounded-full blur-3xl animate-pulse transition-colors duration-700"
             :class="{
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

    {{-- Main chat card --}}
    <div class="relative z-10 w-full max-w-6xl flex flex-col lg:flex-row items-center justify-center gap-4 lg:gap-12 px-4 transition-all duration-700">
        {{-- Side Image --}}
        <div class="hidden lg:block w-1/2 max-w-sm animate-[fadeInLeft_0.8s_ease-out] transition-all duration-700">
            <img src="{{ asset('assets/images/chat/chat_side_image.webp') }}"
                 alt="Chat Background"
                 class="w-full h-auto rounded-[2.5rem] shadow-2xl border border-white/10 ring-1 ring-white/5 mx-auto">
        </div>

        {{-- Main chat card --}}
        <div class="w-full max-w-2xl flex flex-col h-[95vh] sm:h-[90vh] rounded-2xl sm:rounded-3xl backdrop-blur-xl shadow-2xl overflow-hidden transition-all duration-700"
             :class="isLight
                 ? 'bg-white/70 border border-black/10 shadow-black/10'
                 : 'bg-white/5 border border-white/10 shadow-purple-900/30'"
             x-bind:class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-4 sm:px-6 py-3 sm:py-4 border-b transition-colors duration-500"
             :class="isLight ? 'border-black/10 bg-white/50' : 'border-white/10 bg-white/5'">
            <div class="relative">
                <div class="flex items-center justify-center size-10 sm:size-11 rounded-xl shadow-lg transition-all duration-500"
                     :class="{
                         'bg-linear-to-br from-purple-500 to-indigo-600 shadow-purple-500/30': theme === 'aurora',
                         'bg-linear-to-br from-cyan-500 to-blue-600 shadow-cyan-500/30': theme === 'ocean',
                         'bg-linear-to-br from-rose-500 to-orange-600 shadow-rose-500/30': theme === 'sunset',
                         'bg-linear-to-br from-emerald-500 to-teal-600 shadow-emerald-500/30': theme === 'forest',
                         'bg-linear-to-br from-slate-400 to-gray-600 shadow-slate-500/30': theme === 'midnight',
                         'bg-linear-to-br from-sky-500 to-blue-600 shadow-sky-500/30': theme === 'skyblue',
                         'bg-linear-to-br from-orange-400 to-rose-500 shadow-orange-400/30': theme === 'peach',
                         'bg-linear-to-br from-slate-200 to-gray-300 shadow-slate-300/30': theme === 'alabaster',
                     }">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 sm:size-6 text-white">
                        <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-2.995a3.745 3.745 0 0 1-1.087-3.612V2.658Z" />
                        <path d="M16.5 13.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM12 13.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                    </svg>
                </div>
                <span class="absolute -bottom-0.5 -right-0.5 size-3 bg-emerald-400 rounded-full border-2 animate-pulse"
                      :class="isLight ? 'border-white' : 'border-slate-900'"></span>
            </div>
            <div class="flex-1">
                <h1 class="text-base sm:text-lg font-bold tracking-tight transition-colors duration-500"
                    :class="isLight ? 'text-gray-800' : 'text-white'">Raft AI Assistant</h1>
                <p class="text-xs transition-colors duration-500"
                   :class="isLight ? 'text-gray-500' : 'text-white/50'">Foster care survey · Anonymous</p>
            </div>

            {{-- Theme switcher --}}
            <div class="relative" @click.stop>
                <button @click="showThemePicker = !showThemePicker"
                        class="flex items-center justify-center size-9 rounded-xl border transition-all duration-200 group"
                        :class="isLight
                            ? 'bg-black/5 border-black/10 hover:bg-black/10'
                            : 'bg-white/10 border-white/10 hover:bg-white/20 hover:border-white/20'"
                        title="Change theme">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         class="size-4 transition-colors duration-200"
                         :class="isLight
                             ? 'text-gray-500 group-hover:text-gray-700'
                             : 'text-white/60 group-hover:text-white'">
                        <path fill-rule="evenodd" d="M7.455 2.004a.75.75 0 0 1 .26.77 7.003 7.003 0 0 0 9.5 9.511.75.75 0 0 1 1.032.954 9.002 9.002 0 0 1-16.674-5.735.75.75 0 0 1 .77-.26A7 7 0 0 0 7.455 2.004Z" clip-rule="evenodd" />
                    </svg>
                </button>

                {{-- Theme dropdown --}}
                <div x-show="showThemePicker"
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
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all duration-200"
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
                    <span class="text-xs font-semibold text-emerald-600">Complete</span>
                </div>
            @endif
        </div>

        {{-- Progress bar --}}
        @if($surveyStarted && !$surveyCompleted)
            @php
                $totalQuestions = count($questions);
                $answeredCount = count($responses ?? []);
                $progressPercent = $totalQuestions > 0 ? round(($answeredCount / $totalQuestions) * 100) : 0;
            @endphp
            <div class="px-4 sm:px-6 py-2 border-b transition-colors duration-500"
                 :class="isLight ? 'border-black/5 bg-black/3' : 'border-white/5 bg-white/2'">
                <div class="flex items-center justify-between mb-1.5">
                    <span class="text-[11px] font-medium transition-colors duration-500"
                          :class="isLight ? 'text-gray-400' : 'text-white/40'">Progress</span>
                    <span class="text-[11px] font-semibold transition-colors duration-500"
                          :class="isLight ? 'text-gray-600' : 'text-white/70'">{{ $answeredCount }} / {{ $totalQuestions }}</span>
                </div>
                <div class="w-full h-1.5 rounded-full overflow-hidden transition-colors duration-500"
                     :class="isLight ? 'bg-black/10' : 'bg-white/10'">
                    <div class="h-full rounded-full transition-all duration-500 ease-out"
                         :class="{
                             'bg-linear-to-r from-purple-500 to-indigo-500': theme === 'aurora',
                             'bg-linear-to-r from-cyan-500 to-blue-500': theme === 'ocean',
                             'bg-linear-to-r from-rose-500 to-orange-500': theme === 'sunset',
                             'bg-linear-to-r from-emerald-500 to-teal-500': theme === 'forest',
                             'bg-linear-to-r from-slate-400 to-gray-500': theme === 'midnight',
                             'bg-linear-to-r from-sky-500 to-blue-500': theme === 'skyblue',
                             'bg-linear-to-r from-orange-400 to-rose-400': theme === 'peach',
                             'bg-linear-to-r from-slate-400 to-gray-400': theme === 'alabaster',
                         }"
                         style="width: {{ $progressPercent }}%"></div>
                </div>
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
                            :message="$message" :metadata="$metadata[$key] ?? []" :prompt="$messages[$key - 1] ?? []" :theme="$theme" />
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Input bar (hidden when survey is completed) --}}
        @if($surveyCompleted)
            <div class="p-4 sm:p-6 border-t transition-colors duration-500"
                 :class="isLight ? 'border-black/10 bg-white/50' : 'border-white/10 bg-white/5'">
                <div class="text-center">
                    <div class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-emerald-500/15 border border-emerald-500/25">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-emerald-500">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium" :class="isLight ? 'text-emerald-700' : 'text-emerald-300'">Survey complete — thank you for your time!</span>
                    </div>
                </div>
            </div>
        @else
        <form @submit.prevent="if($wire.body.trim() !== '') { $wire.send(); isProcessing = true; }" class="p-3 sm:p-4 border-t transition-colors duration-500"
              :class="isLight ? 'border-black/10 bg-white/50' : 'border-white/10 bg-white/5'">
            <div class="flex items-center gap-2 sm:gap-3">
                <div class="relative flex-1 flex items-center rounded-2xl border transition-all duration-300 focus-within:shadow-lg"
                     :class="isLight
                         ? 'bg-white/80 border-black/10 focus-within:border-black/20 focus-within:shadow-black/5'
                         : 'bg-white/10 border-white/10 focus-within:bg-white/15 focus-within:border-white/20 focus-within:shadow-purple-500/10'">
                    <input class="w-full bg-transparent px-4 py-3 text-sm focus:outline-none transition-colors duration-500 disabled:opacity-50"
                        :class="isLight ? 'text-gray-800 placeholder-gray-400' : 'text-white placeholder-white/30'"
                        placeholder="Type your message..." wire:model="body"
                        :disabled="isProcessing"
                        x-effect="if (!isProcessing) { $el.removeAttribute('disabled'); }" />
                </div>
                
                {{-- Skip Button --}}
                <button type="button"
                    wire:click="skipQuestion"
                    :disabled="isProcessing"
                    class="shrink-0 flex items-center justify-center px-4 py-2.5 rounded-2xl text-xs font-semibold shadow-lg hover:scale-105 active:scale-95 transition-all duration-200 disabled:opacity-50 disabled:scale-100"
                    :class="isLight 
                        ? 'bg-white text-gray-700 border border-black/10 hover:bg-gray-50' 
                        : 'bg-white/10 text-white/90 border border-white/10 hover:bg-white/20'">
                    Skip
                </button>

                {{-- Send Button --}}
                <button type="submit"
                    :disabled="isProcessing"
                    class="shrink-0 flex items-center justify-center size-11 sm:size-12 rounded-2xl text-white shadow-lg hover:scale-105 active:scale-95 transition-all duration-200 disabled:opacity-50 disabled:scale-100"
                    :class="{
                        'bg-linear-to-br from-purple-500 to-indigo-600 shadow-purple-500/30 hover:shadow-purple-500/50': theme === 'aurora',
                        'bg-linear-to-br from-cyan-500 to-blue-600 shadow-cyan-500/30 hover:shadow-cyan-500/50': theme === 'ocean',
                        'bg-linear-to-br from-rose-500 to-orange-600 shadow-rose-500/30 hover:shadow-rose-500/50': theme === 'sunset',
                        'bg-linear-to-br from-emerald-500 to-teal-600 shadow-emerald-500/30 hover:shadow-emerald-500/50': theme === 'forest',
                        'bg-linear-to-br from-slate-400 to-gray-600 shadow-slate-500/30 hover:shadow-slate-500/50': theme === 'midnight',
                        'bg-linear-to-br from-sky-500 to-blue-600 shadow-sky-500/30 hover:shadow-sky-500/50': theme === 'skyblue',
                        'bg-linear-to-br from-orange-400 to-rose-500 shadow-orange-400/30 hover:shadow-orange-400/50': theme === 'peach',
                        'bg-linear-to-br from-slate-400 to-gray-500 shadow-slate-400/30 hover:shadow-slate-400/50': theme === 'alabaster',
                    }">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path
                            d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                    </svg>
                </button>
            </div>
        </form>
        @endif
        </div>
    </div>
</div>

<style>
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
            transform: translateY(8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
