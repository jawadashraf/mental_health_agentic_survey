@php
    $message = end($messages);
@endphp
<div>


@if($message['type'] === 'stream')
    <div class="w-3/4 space-y-0.5 has-[.stream:empty]:hidden">
        <div class="text-xs">Assist</div>
        <div class="bg-slate-200 rounded-xl rounded-tl-none px-3 py-1.5 text-sm">
            <div wire:stream="stream-{{ $this->getId()  }}">{{ $response }}</div>
        </div>
    </div>
@elseif($message['type'] === 'question')
    @php
        $question = $message['content'];
    @endphp
    <div class="mb-2 font-medium">{{ $question['question'] }}</div>

    @if($question['type'] === 'radio')
        <div class="space-y-2">
            @foreach($question['options'] as $index => $option)
                <div class="flex items-center">
                    <input type="radio" id="option-{{ $index }}-{{ $loop->index }}"
                           wire:click="handleUserInput('{{ $option }}')"
                           class="mr-2">
                    <label for="option-{{ $index }}-{{ $loop->index }}">{{ $option }}</label>
                </div>
            @endforeach
        </div>
    @elseif($question['type'] === 'text')
        <div class="mt-2">
            <input type="text" wire:model="textResponse" class="w-full border border-gray-300 rounded-md px-3 py-2"
                   placeholder="Type your answer here...">
            <button wire:click="handleUserInput(textResponse)"
                    class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Submit
            </button>
        </div>
    @endif
@else
    <div>{{ $message['content'] }}</div>
@endif
</div>
