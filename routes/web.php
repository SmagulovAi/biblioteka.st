<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;

/*
Вход и регистрация
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', [BookController::class, 'showBook']);

Route::get('/author', [AuthorController::class, 'showAuthor']);

Route::get('/history', [HistoryController::class, 'showHistory']);

Route::middleware('guest')->group(function () {
    // отображение формы регистрации
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    // прием данных с формы регистрации
    Route::post('register', [RegisteredUserController::class, 'store']);

    // отображение формы логина
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // прием данных с формы логина
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// группа роутеров для тех пользователей, кто успешно вошел в свой аккаунт
Route::middleware('auth')->group(function () {
    // роутер для выхода из своего аккаунта
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::view('auth', 'auth');
Route::view('guest', 'auth')->middleware('guest'); // только для гостей

// роутер доступный только для тех у кого есть право "is-admin"
Route::get('secret', function () {
    echo 'secret';
})->can('is-admin');