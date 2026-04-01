<div class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-950 via-purple-900 to-slate-900 p-2 sm:p-4 md:p-6"
     x-data="{ loaded: false }"
     x-init="setTimeout(() => loaded = true, 100)">

    {{-- Animated background orbs --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -top-32 -left-32 h-96 w-96 rounded-full bg-purple-500/20 blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-indigo-500/20 blur-3xl animate-pulse" style="animation-delay: 1.5s"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-64 w-64 rounded-full bg-violet-400/10 blur-3xl animate-pulse" style="animation-delay: 3s"></div>
    </div>

    {{-- Main chat card --}}
    <div class="relative z-10 w-full max-w-2xl flex flex-col h-[95vh] sm:h-[90vh] rounded-2xl sm:rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl shadow-2xl shadow-purple-900/30 overflow-hidden transition-all duration-700"
         x-bind:class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-4 sm:px-6 py-3 sm:py-4 border-b border-white/10 bg-white/5">
            <div class="relative">
                <div class="flex items-center justify-center size-10 sm:size-11 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 shadow-lg shadow-purple-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 sm:size-6 text-white">
                        <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-2.995a3.745 3.745 0 0 1-1.087-3.612V2.658Z" />
                        <path d="M16.5 13.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM12 13.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                    </svg>
                </div>
                <span class="absolute -bottom-0.5 -right-0.5 size-3 bg-emerald-400 rounded-full border-2 border-slate-900 animate-pulse"></span>
            </div>
            <div class="flex-1">
                <h1 class="text-base sm:text-lg font-bold text-white tracking-tight">Raft AI Assistant</h1>
                <p class="text-xs text-purple-300/80">Foster care survey · Anonymous</p>
            </div>
            @if($surveyCompleted)
                <div class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-emerald-400">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-xs font-semibold text-emerald-300">Complete</span>
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
            <div class="px-4 sm:px-6 py-2 border-b border-white/5 bg-white/2">
                <div class="flex items-center justify-between mb-1.5">
                    <span class="text-[11px] font-medium text-purple-300/70">Progress</span>
                    <span class="text-[11px] font-semibold text-purple-200">{{ $answeredCount }} / {{ $totalQuestions }}</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-white/10 overflow-hidden">
                    <div class="h-full rounded-full bg-linear-to-r from-purple-500 to-indigo-500 transition-all duration-500 ease-out"
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
                            <div class="text-[11px] text-purple-300/60 text-right font-medium">You</div>
                            <div class="bg-gradient-to-br from-purple-600 to-indigo-600 text-white rounded-2xl rounded-tr-sm px-4 py-2.5 text-sm leading-relaxed shadow-lg shadow-purple-600/20">
                                {{ $message['content'] }}
                            </div>
                        </div>
                    @endif

                    @if ($message['role'] === 'assistant')
                        <livewire:raft-chat-response
                            :wire:key="'ai-resp-' . $key . '-' . (isset($metadata[$key]['type']) ? $metadata[$key]['type'] : 'default')"
                            :message="$message" :metadata="$metadata[$key] ?? []" :prompt="$messages[$key - 1] ?? []" />
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Input bar (hidden when survey is completed) --}}
        @if($surveyCompleted)
            <div class="p-4 sm:p-6 border-t border-white/10 bg-white/5">
                <div class="text-center">
                    <div class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-emerald-500/10 border border-emerald-400/20">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-emerald-400">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium text-emerald-300">Survey complete — thank you for your time!</span>
                    </div>
                </div>
            </div>
        @else
        <form wire:submit="send" class="p-3 sm:p-4 border-t border-white/10 bg-white/5">
            <div class="flex items-center gap-2 sm:gap-3">
                <div class="relative flex-1 flex items-center rounded-2xl bg-white/10 border border-white/10 focus-within:border-purple-400/50 focus-within:bg-white/15 transition-all duration-300 focus-within:shadow-lg focus-within:shadow-purple-500/10">
                    <input class="w-full bg-transparent px-4 py-3 text-sm text-white placeholder-purple-300/40 focus:outline-none"
                        placeholder="Type your message..." wire:model="body" />
                </div>
                <button type="submit"
                    class="shrink-0 flex items-center justify-center size-11 sm:size-12 rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-600 text-white shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-105 active:scale-95 transition-all duration-200">
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

<style>
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
