<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class ChatbotAccess extends Component
{
    #[Validate('required')]
    public string $code = '';

    public function verify(): void
    {
        $this->validate();

        if ($this->code === '123456') {
            session(['chatbot_access_granted' => true]);

            $this->redirectIntended(route('chat'));

            return;
        }

        $this->addError('code', 'Invalid access code.');
    }

    public function render()
    {
        return view('livewire.chatbot-access');
    }
}
