<?php

use App\Http\Controllers\HomeController;
use App\Livewire\AiAssistant;
use App\Livewire\Chat;
use App\Livewire\ChatAi;
use App\Livewire\ChatbotAccess;
use App\Livewire\ConversationBot;
use App\Livewire\RaftChat;
use App\Livewire\SimpleChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('index');
// });
Route::get('/clear/Session', function (Request $request) {
    if ($request->code && $request->code == '123456') {
        session()->flush();

        return 'Session Cleared';
    }

    return '...';
});
Route::get('/chatbot-access', ChatbotAccess::class)->name('chatbot-access');

Route::middleware('chatbot.access')->group(function () {
    Route::get('/chat', Chat::class)->name('chat');
    Route::get('/chat-v2', ChatAi::class)->name('chat-v2');
    Route::get('/simple-chat', SimpleChat::class)->name('simple-chat');
    Route::get('/conversation-bot', ConversationBot::class)->name('conversation-bot');
    Route::get('/raft-chat', RaftChat::class)->name('raft-chat');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('{any}', [HomeController::class, 'pageView']);

// Route::get('/', [HomeController::class , 'index'])->name('home');
// Route::get('/chat', AiAssistant::class)->name('chat');
Route::get('/dump-session', function () {
    return response()->json(session()->all());
});

Route::get('/clear-chat', function () {
    session()->forget(['survey_messages', 'survey_metadata', 'survey_index', 'survey_responses', 'survey_started']);

    return 'Chat cleared!';
});
