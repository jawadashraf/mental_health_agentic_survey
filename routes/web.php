<?php

use App\Http\Controllers\HomeController;
use App\Livewire\AiAssistant;
use App\Livewire\Chat;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/', [HomeController::class , 'index'])->name('home');
//Route::get('/chat', AiAssistant::class)->name('chat');
Route::get('/chat', Chat::class);
