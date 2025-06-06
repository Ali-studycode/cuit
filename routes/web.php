<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CuitController;

Route::get('/', [CuitController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('guest')->group(function (){
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/post', [AuthController::class, 'post'])->name('cuit.post')->middleware('auth');