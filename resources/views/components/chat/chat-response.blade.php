<div class="transition-all duration-300 ease-in-out">

    @if($message['content'] === '')
        <div class="w-3/4 space-y-0.5 has-[.stream:empty]:hidden"
             id="next-bot-response-{{ $this->getId() }}">

            <div class="text-xs">Assist#</div>
            <div class="bg-slate-200 rounded-xl rounded-tl-none px-3 py-1.5 text-sm">
                <div wire:stream="stream-{{ $this->getId()  }}">{{ $response }}</div>
            </div>
        </div>
    @else
        @if(($metadata['type'] ?? '')  === 'question')

            @php
                $question = $metadata['content'];
            @endphp
        <div class="w-3/4 space-y-0.5 transition-opacity duration-300 ease-in-out" x-data="{ show: true }" x-init="setTimeout(() => show = true, 100)" x-show="show">
            <div class="text-xs">Assist#</div>
                <div class="bg-slate-200 rounded-xl rounded-tl-none px-3 py-1.5 text-sm">
                    <div class="mb-2 font-medium">Q{{$question['id']}}: {{ $question['question'] }}</div>

                    @if(!isset($responses[$question['id']]['response']))
                        @if($question['type'] === 'radio')
                            <div class="space-y-2">
                                @foreach($question['options'] as $index => $option)
                                    <div class="flex items-center">
                                        <input type="radio" id="option-{{ $index }}-{{$question['id']}}"
                                               wire:model="selectedOption" value="{{ $option }}"
                                               name="options" class="mr-2">
                                        <label for="option-{{ $index }}-{{$question['id']}}">{{ $option }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($question['type'] === 'text')
                            <div class="mt-2">
                                <input type="text" wire:model.defer="textResponse"
                                       class="w-full border border-gray-300 rounded-md px-3 py-2"
                                       placeholder="Type your answer here...">
                            </div>

                        @endif

                        <button wire:click="handleUserInput" type="submit"
                                class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Submit
                        </button>
                    @endif


{{--                    @if (session()->has('message'))--}}
{{--                        <div class="mt-2 text-green-500">{{ session('message') }}</div>--}}
{{--                    @endif--}}

                    @if(isset($responses[$question['id']]["response"]))
                        <div class="mt-2 text-green-500">Your Response: {{ $responses[$question['id']]["response"] }}</div>
                    @endif

                </div>

            </div>
        @else
        <div class="w-3/4 space-y-0.5 transition-opacity duration-300 ease-in-out" x-data="{ show: true }" x-init="setTimeout(() => show = true, 100)" x-show="show">
            <div class="text-xs">Assist..</div>
                <div class="bg-slate-200 rounded-xl rounded-tl-none px-3 py-1.5 text-sm">
                    <div>{{ $message['content'] }}</div>
                </div>
            </div>
        @endif
    @endif
</div>
