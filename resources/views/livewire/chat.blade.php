<div class="flex h-screen">
    <div class="w-1/2 flex items-center justify-center p-4">
        <canvas id="canvas" width="500" height="500"></canvas>
    </div>
    <div class="w-1/2 flex flex-col">
<div class="max-w-xl mx-auto my-16 border border-slate-200 rounded-xl overflow-hidden flex-1 flex flex-col">
    <div class="h-[80vh] bg-gradient-to-t from-slate-100 p-6 flex space-y-1.5 overflow-scroll flex-col-reverse">
        <div class="flex flex-col">
            @foreach($messages as $key => $message)
                @if ($message['role'] === 'user')
                    <div class="w-3/4 space-y-0.5 self-end">
                        <div class="text-xs text-right">You</div>
                        <div class="bg-slate-800 text-slate-50 rounded-xl rounded-tr-none px-3 py-1.5 text-sm">
                            {{ $message['content'] }}
                        </div>
                    </div>
                @endif

                @if ($message['role'] === 'assistant')
                    <livewire:chat-response :key="$key" :messages="$messages" :metadata="$metadata" :prompt="$messages[$key - 1]" />
                @endif
            @endforeach
        </div>
    </div>
    <form wire:submit="send" class="bg-slate-100 p-3 border-t border-slate-200 flex space-x-2">
        <div class="bg-white rounded-full grow relative flex items-center h-10 focus-within:ring-2 ring-inset ring-blue-500">
            <input class="bg-transparent rounded-full grow px-4 py-2 text-sm h-10 focus:outline-0" placeholder="Ask me anything" wire:model="body" />
            <button class="bg-slate-800 text-slate-50 rounded-3xl text-sm font-medium size-10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                </svg>
            </button>
        </div>
    </form>
</div>
</div>
</div>

<script src="https://unpkg.com/@rive-app/canvas"></script>
<script>

    const r = new rive.Rive({
        src: "/animations/robot_transparent_bg.riv",
        // src: 'https://cdn.rive.app/animations/vehicles.riv',
        canvas: document.getElementById('canvas'),
        autoplay: true,
        stateMachines: 'State Machine 1',
        fit: rive.Fit.cover,
        onLoad: (_) => {
            // // Get the inputs via the name of the state machine
            // const inputs = r.stateMachineInputs('State Machine 1');
            // // // Find the input you want to set a value for, or trigger
            // const expressionInput = inputs.find(i => i.name === 'Expressions');
            // expressionInput.value = 2;
            //
        },
    });

    function updateExpression(value) {

        const inputs = r.stateMachineInputs('State Machine 1');
        const expressionInput = inputs.find(i => i.name === 'Expressions');

        if (expressionInput) {
            expressionInput.value = value;
        }

        // Reset back to 1 after 3 seconds (3000 milliseconds)
        setTimeout(() => {
            expressionInput.value = 1;
        }, 3000);
    }

    function hideBotDiv(divId){
        console.log(divId, 'divId');
        console.log(document.getElementById(divId), 'divId Element');
        document.getElementById(divId)?.classList.add('hidden');
        console.log('div disappeared');
    }
</script>
