<div
    class="flex flex-col h-[600px] max-w-2xl mx-auto border border-gray-200 rounded-lg shadow-sm bg-white overflow-hidden">
    <!-- Chat Header -->
    <div class="bg-gray-50 p-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Simple Stream Chat</h2>
        <p class="text-xs text-gray-500">Livewire 4 wire:stream implementation</p>
    </div>

    <!-- Messages Area -->
    <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50/30" id="chat-messages">
        @foreach($messages as $index => $message)
            <div @class([
                'flex flex-col max-w-[80%]',
                'self-end' => $message['role'] === 'user',
                'self-start' => $message['role'] === 'assistant',
            ]) wire:key="msg-{{ $index }}">
                <div @class([
                    'text-[10px] mb-1 px-1',
                    'text-right' => $message['role'] === 'user',
                    'text-left' => $message['role'] === 'assistant',
                ])>
                    {{ $message['role'] === 'user' ? 'You' : 'Assistant' }}
                </div>

                <div @class([
                    'px-4 py-2 rounded-2xl text-sm shadow-sm',
                    'bg-slate-800 text-white rounded-tr-none' => $message['role'] === 'user',
                    'bg-white border border-gray-200 text-gray-800 rounded-tl-none' => $message['role'] === 'assistant',
                ])>
                    <div id="stream-{{ $index }}" wire:stream="stream-{{ $index }}">
                        {!! nl2br(e($message['content'])) !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Input Area -->
    <div class="p-4 border-t border-gray-200 bg-white">
        <form wire:submit="send" class="flex gap-2">
            <input type="text" wire:model="body" placeholder="Type your message..."
                class="flex-1 rounded-full border border-gray-300 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-800 focus:border-transparent"
                autofocus>
            <button type="submit"
                class="bg-slate-800 text-white p-2 rounded-full hover:bg-slate-700 transition-colors flex items-center justify-center w-10 h-10"
                wire:loading.attr="disabled">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                </svg>
            </button>
        </form>
    </div>

    <script>
        // Auto-scroll to bottom when new content arrives
        document.addEventListener('livewire:initialized', () => {
            @this.on('echo:chat,ChatMessageSent', (e) => {
                const chatContainer = document.getElementById('chat-messages');
                chatContainer.scrollTop = chatContainer.scrollHeight;
            });
        });

        // Simple observer to scroll on stream
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('chat-messages');
            const observer = new MutationObserver(() => {
                container.scrollTop = container.scrollHeight;
            });
            observer.observe(container, { childList: true, subtree: true, characterData: true });
        });
    </script>
</div>