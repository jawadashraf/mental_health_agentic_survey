<?php

use App\Http\Controllers\HomeController;
use App\Livewire\AiAssistant;
use App\Livewire\Chat;
use App\Livewire\SimpleChat;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('index');
// });
Route::get('/clear/Session', function (Illuminate\Http\Request $request) {
    if ($request->code && $request->code == '123456') {
        session()->flush();

        return 'Session Cleared';
    }

    return '...';
});
Route::get('/chatbot-access', \App\Livewire\ChatbotAccess::class)->name('chatbot-access');

Route::middleware('chatbot.access')->group(function () {
    Route::get('/chat', Chat::class)->name('chat');
    Route::get('/chat-v2', \App\Livewire\ChatAi::class)->name('chat-v2');
    Route::get('/simple-chat', SimpleChat::class)->name('simple-chat');
    Route::get('/conversation-bot', \App\Livewire\ConversationBot::class)->name('conversation-bot');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'pageView']);

// Route::get('/', [HomeController::class , 'index'])->name('home');
// Route::get('/chat', AiAssistant::class)->name('chat');
