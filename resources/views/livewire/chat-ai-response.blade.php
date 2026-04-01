<div class="transition-all duration-300 ease-in-out" wire:key="resp-container-{{ $this->getId() }}"
    @if(empty($message['content']) && ($metadata['type'] ?? '') !== 'question') wire:init="getResponse" @endif>

    @if($message['content'] === '')
        <div class="w-3/4 space-y-0.5"
             id="next-bot-response-{{ $this->getId() }}">

            <div class="text-xs text-slate-500">Assistant (AI SDK)</div>
            <div class="bg-slate-200 rounded-xl rounded-tl-none px-3 py-1.5 text-sm">
                <div class="stream" wire:stream="stream-{{ $this->getId()  }}">{{ $response }}</div>
            </div>
        </div>
    @elseif(trim($message['content']) === '' && ($metadata['type'] ?? '') !== 'options')
        <!-- Do nothing -->
    @else
        @if(($metadata['type'] ?? '') === 'question')
            @php
                $question = $metadata['content'];
            @endphp
            <div class="w-3/4 space-y-0.5 transition-opacity duration-300 ease-in-out" x-data="{ show: true }" x-init="setTimeout(() => show = true, 100)" x-show="show">
                <div class="text-xs text-slate-500">Assistant (AI SDK)</div>
                <div class="bg-slate-200 rounded-xl rounded-tl-none px-4 py-3 text-sm shadow-sm border border-slate-300">
                    <div class="mb-3 font-semibold text-slate-800">Q{{$question['id']}}: {{ $question['question'] }}</div>

                    @if(!isset($responses[$question['id']]['response']))
                        @if($question['type'] === 'radio')
                            <div class="space-y-3 mb-3">
                                @foreach($question['options'] as $index => $option)
                                    <label class="flex items-center space-x-3 p-2 rounded-lg hover:bg-slate-300 cursor-pointer transition-colors bg-white/50 border border-slate-300">
                                        <input type="radio" id="option-{{ $index }}-{{$question['id']}}-ai"
                                               wire:model="selectedOption" value="{{ $option }}"
                                               name="options" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                        <span class="text-slate-700 font-medium">{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @elseif($question['type'] === 'text')
                            <div class="mt-3">
                                <textarea wire:model.defer="textResponse"
                                       class="w-full border border-slate-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all"
                                       placeholder="Type your answer here..." rows="3"></textarea>
                            </div>
                        @endif

                        <button wire:click="handleUserInput" type="button"
                                class="w-full mt-2 bg-slate-800 text-white font-semibold px-4 py-2.5 rounded-lg hover:bg-slate-700 active:scale-95 transition-all shadow-md">
                            Submit Response
                        </button>
                    @else
                        <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-xs font-medium italic">
                            ✓ Your Response: {{ $responses[$question['id']]["response"] }}
                        </div>
                    @endif
                </div>
            </div>
        @elseif(($metadata['type'] ?? '') === 'options')
            <div class="w-3/4 space-y-0.5 transition-opacity duration-300 ease-in-out" x-data="{ show: true }" x-init="setTimeout(() => show = true, 100)" x-show="show">
                <div class="text-xs text-slate-500">Assistant (AI SDK)</div>
                <div class="bg-slate-200 rounded-xl rounded-tl-none px-4 py-3 text-sm shadow-sm border border-slate-300">
                    <div class="mb-3 text-slate-800 wrap-break-word">{{ $message['content'] }}</div>

                    @if(isset($metadata['options']) && !isset($selectedOption))
                        <div class="grid grid-cols-2 gap-3 mt-4">
                            @foreach($metadata['options'] as $index => $option)
                                <button wire:click="$set('body', '{{ $option }}'); send();" type="button"
                                        class="bg-white border border-slate-300 text-slate-700 font-semibold px-4 py-2 rounded-lg hover:bg-slate-50 active:scale-95 transition-all shadow-sm">
                                    {{ $option }}
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="w-3/4 space-y-0.5 transition-opacity duration-300 ease-in-out" x-data="{ show: true }" x-init="setTimeout(() => show = true, 100)" x-show="show">
                <div class="text-xs text-slate-500">Assistant (AI SDK)</div>
                <div class="bg-indigo-50 border border-indigo-200 rounded-xl rounded-tl-none px-4 py-3 text-sm shadow-sm">
                    <div class="text-slate-800 wrap-break-word">{{ $message['content'] }}</div>
                </div>
            </div>
        @endif
    @endif
</div>
