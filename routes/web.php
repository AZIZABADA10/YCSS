<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.auth');
});


 
Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
