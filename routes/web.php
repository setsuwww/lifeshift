<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:Admin'])
    ->group(function () {

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })
        ->name('dashboard');

        // Resource Users
        Route::resource('users', UserController::class);
});