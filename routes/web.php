<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandomUserController;


// Rota inicial redireciona para a rota de login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de autenticação fornecidas por Laravel
Auth::routes();

// Rota para a página inicial após o login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rota para obter dados aleatórios de usuários
Route::get('/random-users-data', [RandomUserController::class, 'getRandomData'])
    ->name('random-users-data')
    ->middleware('auth');
