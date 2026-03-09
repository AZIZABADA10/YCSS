<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CongeController;
use App\Http\Controllers\Admin\ClasseController;
use App\Http\Controllers\Admin\DejeunerController;
use App\Http\Controllers\Apprenant\ApprenantDashboardController;

Route::get('/', function () {
    return view('auth.register');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

     Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/admin/conges', [CongeController::class, 'index'])->name('admin.conges');
        Route::get('/admin/classes', [ClasseController::class, 'index'])->name('admin.classes');
        Route::get('/admin/dejeuner', [DejeunerController::class, 'index'])->name('admin.dejeuner');
    });

     Route::middleware(['apprenant'])->group(function () {
        Route::get('/apprenant/dashboard', [ApprenantDashboardController::class, 'index'])->name('apprenant.dashboard');
    });
});