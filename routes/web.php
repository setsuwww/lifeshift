<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\ShiftsController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('users', UsersController::class)->names('admin.users');
    Route::resource('schedules', SchedulesController::class)->names('admin.schedules');
    Route::resource('shifts', ShiftsController::class)->names('admin.shifts');
    Route::resource('attendances', AttendancesController::class)->names('admin.attendances');
});
