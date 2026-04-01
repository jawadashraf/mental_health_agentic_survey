<div class="transition-all duration-300 ease-in-out animate-[fadeInUp_0.3s_ease-out]" wire:key="resp-container-{{ $this->getId() }}"
    @if(empty($message['content']) && ($metadata['type'] ?? '') !== 'question') wire:init="getResponse" @endif>

    @if($message['content'] === '')
        <div class="max-w-[85%] sm:max-w-[75%] space-y-1 has-[.stream:empty]:hidden"
             id="next-bot-response-{{ $this->getId() }}">

            <div class="text-[11px] text-purple-300/60 font-medium">Raft AI</div>
            <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl rounded-tl-sm px-4 py-2.5 text-sm text-purple-100 leading-relaxed">
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
        <div class="max-w-[85%] sm:max-w-[75%] space-y-1 transition-opacity duration-300 ease-in-out" x-data="{ show: true }" x-init="setTimeout(() => show = true, 100)" x-show="show">
            <div class="text-[11px] text-purple-300/60 font-medium">Raft AI</div>
                <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl rounded-tl-sm px-4 py-3 text-sm text-purple-100 leading-relaxed">
                    <div class="mb-3 font-semibold text-white">Q{{ $question['id'] }}: {{ $question['question'] }}</div>

                    @if(!isset($responses[$question['id']]['response']))
                        @if($question['type'] === 'radio')
                            <div class="space-y-2">
                                @foreach($question['options'] as $index => $option)
                                    <label for="option-{{ $index }}-{{ $question['id'] }}"
                                           class="flex items-center gap-3 px-3 py-2 rounded-xl cursor-pointer border border-white/5 hover:border-purple-400/30 hover:bg-white/5 transition-all duration-200 group">
                                        <input type="radio" id="option-{{ $index }}-{{ $question['id'] }}"
                                               wire:model="selectedOption" value="{{ $option }}"
                                               name="options"
                                               class="size-4 shrink-0 accent-purple-500">
                                        <span class="text-purple-200 group-hover:text-white transition-colors duration-200">{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @elseif($question['type'] === 'text')
                            <div class="mt-2">
                                <input type="text" wire:model.defer="textResponse"
                                       class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-white placeholder-purple-300/40 focus:outline-none focus:border-purple-400/50 focus:bg-white/15 transition-all duration-200"
                                       placeholder="Type your answer here...">
                            </div>
                        @endif

                        <button wire:click="handleUserInput" type="submit"
                                class="mt-3 inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-indigo-600 text-white text-sm font-medium px-5 py-2 rounded-xl shadow-lg shadow-purple-500/20 hover:shadow-purple-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                            <span>Submit</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif

                    @if(isset($responses[$question['id']]["response"]))
                        <div class="mt-3 flex items-center gap-2 text-emerald-400 text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 shrink-0">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                            </svg>
                            <span>Your Response: {{ $responses[$question['id']]["response"] }}</span>
                        </div>
                    @endif

                </div>

            </div>
        @else
        <div class="max-w-[85%] sm:max-w-[75%] space-y-1 transition-opacity duration-300 ease-in-out" x-data="{ show: true }" x-init="setTimeout(() => show = true, 100)" x-show="show">
            <div class="text-[11px] text-purple-300/60 font-medium">Raft AI</div>
                <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl rounded-tl-sm px-4 py-2.5 text-sm text-purple-100 leading-relaxed">
                    <div>{{ $message['content'] }}</div>
                </div>
            </div>
        @endif
    @endif
</div>
