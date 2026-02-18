<div class="max-w-2xl mx-auto p-6" x-data>
    {{-- Include marked.js for markdown parsing --}}
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <style>
        .markdown-body ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .markdown-body ol {
            list-style-type: decimal;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .markdown-body p {
            margin-bottom: 1rem;
        }

        .markdown-body h1,
        .markdown-body h2,
        .markdown-body h3 {
            font-weight: bold;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .markdown-body code {
            background-color: rgba(0, 0, 0, 0.1);
            padding: 0.2rem 0.4rem;
            rounded: 0.25rem;
            font-family: monospace;
        }

        .markdown-body pre {
            background-color: #1a202c;
            color: #e2e8f0;
            padding: 1rem;
            rounded: 0.5rem;
            overflow-x: auto;
            margin-bottom: 1rem;
        }

        .typing-dots span {
            animation: typing 1.4s infinite both;
            display: inline-block;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: currentColor;
            margin: 0 1px;
        }

        .typing-dots span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dots span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {
            0% {
                opacity: 0.2;
                transform: scale(0.8);
            }

            20% {
                opacity: 1;
                transform: scale(1.2);
            }

            100% {
                opacity: 0.2;
                transform: scale(0.8);
            }
        }
    </style>
    <div
        class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-white">Conversation AI</h2>
                <p class="text-blue-100 text-sm">Remembers everything you say.</p>
            </div>
            <button wire:click="clear"
                class="text-blue-100 hover:text-white transition-colors text-sm font-medium px-3 py-1 rounded-lg hover:bg-white/10">
                Clear History
            </button>
        </div>

        {{-- Messages --}}
        <div class="h-[500px] overflow-y-auto p-6 space-y-4 bg-gray-50/50 dark:bg-gray-900/50" id="chat-container">
            @foreach ($messages as $index => $message)
                <div wire:key="message-{{ $index }}-{{ $conversationId }}" @class([
                    'flex flex-col max-w-[80%]',
                    'self-end items-end ml-auto' => $message['role'] === 'user',
                    'self-start items-start' => $message['role'] === 'assistant',
                ])>
                    <div @class([
                        'px-4 py-2 rounded-2xl text-sm leading-relaxed',
                        'bg-blue-600 text-white rounded-tr-none shadow-md' => $message['role'] === 'user',
                        'bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 border border-gray-200 dark:border-gray-700 rounded-tl-none shadow-sm' => $message['role'] === 'assistant',
                    ]) x-data="{ 
                                    init() {
                                        const raw = this.$refs.raw;
                                        const display = this.$refs.display;
                                        if (raw && display) {
                                            const update = () => { display.innerHTML = marked.parse(raw.innerText); };
                                            const observer = new MutationObserver(update);
                                            observer.observe(raw, { childList: true, characterData: true, subtree: true });
                                            update();
                                        }
                                    }
                                }">
                        @if ($message['role'] === 'assistant')
                            <div x-ref="raw" class="hidden" wire:stream="stream-{{ $index }}">{!! $message['content'] !!}</div>
                            <div x-ref="display" wire:ignore class="markdown-body prose prose-sm dark:prose-invert max-w-none">
                            </div>
                        @else
                            <div class="whitespace-pre-wrap">{!! nl2br(e($message['content'])) !!}</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Input --}}
        <div class="p-4 bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700">
            <form wire:submit.prevent="send" class="flex gap-2">
                <input type="text" wire:model.live="body" placeholder="Ask me anything..."
                    class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-900 border-none rounded-xl focus:ring-2 focus:ring-blue-500 text-gray-800 dark:text-gray-200"
                    autocomplete="off" @if($isTyping) disabled @endif>
                <button type="submit" wire:loading.attr="disabled" @disabled($isTyping || empty(trim($body)))
                    class="bg-blue-600 hover:bg-blue-700 disabled:opacity-50 text-white px-4 py-2 rounded-xl font-medium transition-all flex items-center gap-2">
                    <span wire:loading.remove wire:target="send, respond">
                        @if ($isTyping)
                            <div class="typing-dots flex items-center justify-center">
                                <span></span><span></span><span></span>
                            </div>
                        @else
                            Send
                        @endif
                    </span>
                    <span wire:loading wire:target="send, respond">
                        <div class="typing-dots flex items-center justify-center">
                            <span></span><span></span><span></span>
                        </div>
                    </span>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            const container = document.getElementById('chat-container');

            // Auto-scroll to bottom on new messages or updates
            const scrollToBottom = () => {
                container.scrollTop = container.scrollHeight;
            };

            scrollToBottom();

            Livewire.on('stream-updated', () => {
                scrollToBottom();
            });

            // Watch for DOM changes in the messages container to scroll
            const observer = new MutationObserver(scrollToBottom);
            observer.observe(container, { childList: true, subtree: true });
        });
    </script>
</div>