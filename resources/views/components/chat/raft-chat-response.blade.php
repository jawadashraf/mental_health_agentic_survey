<div class="transition-all duration-300 ease-in-out animate-[fadeInUp_0.3s_ease-out]" wire:key="resp-container-{{ $this->getId() }}"
    @if(empty($message['content']) && ($metadata['type'] ?? '') !== 'question') wire:init="getResponse" @endif
    x-data="{
        theme: @js($theme),
        get isLight() { return this.theme === 'skyblue' || this.theme === 'peach' || this.theme === 'alabaster'; },
    }"
    @theme-changed.window="theme = $event.detail.theme">

    @if($message['content'] === '')
        <div class="max-w-[85%] sm:max-w-[75%] space-y-1 has-[.stream:empty]:hidden"
             id="next-bot-response-{{ $this->getId() }}">

            <div class="text-[11px] font-medium transition-colors duration-300"
                 :class="{
                     'text-purple-300/60': theme === 'aurora',
                     'text-cyan-300/60': theme === 'ocean',
                     'text-rose-300/60': theme === 'sunset',
                     'text-emerald-300/60': theme === 'forest',
                     'text-slate-300/60': theme === 'midnight',
                     'text-sky-600/70': theme === 'skyblue',
                     'text-orange-600/70': theme === 'peach',
                     'text-slate-500/70': theme === 'alabaster',
                 }">Raft AI</div>
            <div class="rounded-2xl rounded-tl-sm px-4 py-2.5 text-sm leading-relaxed transition-colors duration-300"
                 :class="isLight
                     ? 'bg-black/5 border border-black/8 text-gray-700'
                     : 'bg-white/10 backdrop-blur-sm border border-white/10 text-purple-100'">
                <div wire:stream="stream-{{ $this->getId()  }}">{{ $response }}</div>
            </div>
        </div>
    @elseif(trim($message['content']) === '')
        {{-- Hidden completely --}}
    @else
        @if(($metadata['type'] ?? '')  === 'question')

            @php
                $question = $metadata['content'];
            @endphp
        <div class="max-w-[85%] sm:max-w-[75%] space-y-1 transition-all duration-300 ease-in-out">
            <div class="text-[11px] font-medium transition-colors duration-300"
                 :class="{
                     'text-purple-300/60': theme === 'aurora',
                     'text-cyan-300/60': theme === 'ocean',
                     'text-rose-300/60': theme === 'sunset',
                     'text-emerald-300/60': theme === 'forest',
                     'text-slate-300/60': theme === 'midnight',
                     'text-sky-600/70': theme === 'skyblue',
                     'text-orange-600/70': theme === 'peach',
                     'text-slate-500/70': theme === 'alabaster',
                 }">Raft AI</div>
                <div class="rounded-2xl rounded-tl-sm px-4 py-3 text-sm leading-relaxed transition-colors duration-300"
                     :class="isLight
                         ? 'bg-black/5 border border-black/8 text-gray-700'
                         : 'bg-white/10 backdrop-blur-sm border border-white/10 text-purple-100'">
                    <div class="mb-3 font-semibold transition-colors duration-300"
                         :class="isLight ? 'text-gray-900' : 'text-white'">Q{{ $question['id'] }}: {{ $question['question'] }}</div>

                    @if(!isset($responses[$question['id']]['response']))
                        @if($question['type'] === 'radio')
                            <div class="space-y-2">
                                @foreach($question['options'] as $index => $option)
                                    <label for="option-{{ $index }}-{{ $question['id'] }}"
                                           class="flex items-center gap-3 px-3 py-2 rounded-xl cursor-pointer border transition-all duration-200 group has-disabled:opacity-50 has-disabled:cursor-not-allowed"
                                           :class="isLight
                                               ? 'border-black/8 hover:border-black/15 hover:bg-black/5'
                                               : 'border-white/5 hover:border-white/20 hover:bg-white/5'">
                                        <input type="radio" id="option-{{ $index }}-{{ $question['id'] }}"
                                               wire:model="selectedOption" value="{{ $option }}"
                                               name="options"
                                               wire:loading.attr="disabled"
                                               wire:target="handleUserInput"
                                               class="size-4 shrink-0"
                                               :class="{
                                                   'accent-purple-500': theme === 'aurora',
                                                   'accent-cyan-500': theme === 'ocean',
                                                   'accent-rose-500': theme === 'sunset',
                                                   'accent-emerald-500': theme === 'forest',
                                                   'accent-slate-500': theme === 'midnight',
                                                   'accent-sky-500': theme === 'skyblue',
                                                   'accent-orange-500': theme === 'peach',
                                                   'accent-slate-500': theme === 'alabaster',
                                               }">
                                        <span class="transition-colors duration-200"
                                              :class="isLight
                                                  ? 'text-gray-600 group-hover:text-gray-900'
                                                  : 'text-purple-200 group-hover:text-white'">{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @elseif($question['type'] === 'text')
                            <div class="mt-2">
                                <input type="text" wire:model.defer="textResponse"
                                       wire:loading.attr="disabled"
                                       wire:target="handleUserInput"
                                       class="w-full border rounded-xl px-4 py-2.5 text-sm focus:outline-none transition-all duration-200 disabled:opacity-50"
                                       :class="isLight
                                           ? 'bg-white/80 border-black/10 text-gray-800 placeholder-gray-400 focus:border-black/20'
                                           : 'bg-white/10 border-white/10 text-white placeholder-white/30 focus:border-white/30 focus:bg-white/15'"
                                       placeholder="Type your answer here...">
                            </div>
                        @endif

                        <button wire:click="handleUserInput" type="submit"
                                wire:loading.attr="disabled"
                                wire:target="handleUserInput"
                                class="mt-3 inline-flex items-center gap-2 bg-linear-to-r text-white text-sm font-medium px-5 py-2 rounded-xl shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 disabled:opacity-50 disabled:scale-100"
                                :class="{
                                    'from-purple-500 to-indigo-600 shadow-purple-500/20 hover:shadow-purple-500/40': theme === 'aurora',
                                    'from-cyan-500 to-blue-600 shadow-cyan-500/30 hover:shadow-cyan-500/40': theme === 'ocean',
                                    'from-rose-500 to-orange-600 shadow-rose-500/20 hover:shadow-rose-500/40': theme === 'sunset',
                                    'from-emerald-500 to-teal-600 shadow-emerald-500/20 hover:shadow-emerald-500/40': theme === 'forest',
                                    'from-slate-400 to-gray-600 shadow-slate-500/20 hover:shadow-slate-500/40': theme === 'midnight',
                                    'from-sky-500 to-blue-600 shadow-sky-500/20 hover:shadow-sky-500/40': theme === 'skyblue',
                                    'from-orange-400 to-rose-500 shadow-orange-400/20 hover:shadow-orange-400/40': theme === 'peach',
                                    'from-slate-400 to-gray-600 shadow-slate-400/20 hover:shadow-slate-400/40': theme === 'alabaster',
                                }">
                            <span>Submit</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif

                    @if(isset($responses[$question['id']]["response"]))
                        <div class="mt-3 flex items-center gap-2 text-sm font-medium transition-colors duration-300"
                             :class="isLight ? 'text-emerald-600' : 'text-emerald-400'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 shrink-0">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                            </svg>
                            <span>Your Response: {{ $responses[$question['id']]["response"] }}</span>
                        </div>
                    @endif

                </div>

            </div>
        @elseif(($metadata['type'] ?? '') === 'progress')
            {{-- Progress encouragement message --}}
            <div class="max-w-[85%] sm:max-w-[75%] space-y-1 transition-all duration-300 ease-in-out animate-[fadeInUp_0.3s_ease-out]">
                <div class="text-[11px] font-medium transition-colors duration-300"
                     :class="{
                         'text-purple-300/60': theme === 'aurora',
                         'text-cyan-300/60': theme === 'ocean',
                         'text-rose-300/60': theme === 'sunset',
                         'text-emerald-300/60': theme === 'forest',
                         'text-slate-300/60': theme === 'midnight',
                         'text-sky-600/70': theme === 'skyblue',
                         'text-orange-600/70': theme === 'peach',
                         'text-slate-500/70': theme === 'alabaster',
                     }">Raft AI</div>
                <div class="rounded-2xl rounded-tl-sm px-4 py-3 text-sm leading-relaxed transition-colors duration-300"
                     :class="isLight
                         ? 'bg-amber-100 border border-amber-300/50 text-amber-800'
                         : 'bg-linear-to-r from-amber-500/15 to-orange-500/15 backdrop-blur-sm border border-amber-400/20 text-amber-100'">
                    <div class="flex items-start gap-2">
                        <span class="text-lg leading-none mt-0.5">🔥</span>
                        <span>{{ $message['content'] }}</span>
                    </div>
                </div>
            </div>
        @elseif(($metadata['type'] ?? '') === 'conclusion')
            {{-- Survey conclusion message --}}
            <div class="max-w-[90%] sm:max-w-[80%] space-y-1 transition-all duration-300 ease-in-out animate-[fadeInUp_0.4s_ease-out]">
                <div class="text-[11px] font-medium transition-colors duration-300"
                     :class="{
                         'text-purple-300/60': theme === 'aurora',
                         'text-cyan-300/60': theme === 'ocean',
                         'text-rose-300/60': theme === 'sunset',
                         'text-emerald-300/60': theme === 'forest',
                         'text-slate-300/60': theme === 'midnight',
                         'text-sky-600/70': theme === 'skyblue',
                         'text-orange-600/70': theme === 'peach',
                         'text-slate-500/70': theme === 'alabaster',
                     }">Raft AI</div>
                <div class="rounded-2xl rounded-tl-sm px-5 py-4 text-sm leading-relaxed transition-colors duration-300"
                     :class="isLight
                         ? 'bg-emerald-100 border border-emerald-300/50 text-emerald-800'
                         : 'bg-linear-to-br from-emerald-500/15 to-teal-500/15 backdrop-blur-sm border border-emerald-400/20 text-emerald-100'">
                    <div class="whitespace-pre-line">{{ $message['content'] }}</div>
                </div>
            </div>
        @else
        <div class="max-w-[85%] sm:max-w-[75%] space-y-1 transition-all duration-300 ease-in-out">
            <div class="text-[11px] font-medium transition-colors duration-300"
                 :class="{
                     'text-purple-300/60': theme === 'aurora',
                     'text-cyan-300/60': theme === 'ocean',
                     'text-rose-300/60': theme === 'sunset',
                     'text-emerald-300/60': theme === 'forest',
                     'text-slate-300/60': theme === 'midnight',
                     'text-sky-600/70': theme === 'skyblue',
                     'text-orange-600/70': theme === 'peach',
                     'text-slate-500/70': theme === 'alabaster',
                 }">Raft AI</div>
                <div class="rounded-2xl rounded-tl-sm px-4 py-2.5 text-sm leading-relaxed transition-colors duration-300"
                     :class="isLight
                         ? 'bg-black/5 border border-black/8 text-gray-700'
                         : 'bg-white/10 backdrop-blur-sm border border-white/10 text-purple-100'">
                    <div>{{ $message['content'] }}</div>
                </div>
            </div>
        @endif
    @endif
</div>
