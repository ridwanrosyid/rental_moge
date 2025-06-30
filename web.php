<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// Halaman awal langsung redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// Login Admin
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout Admin
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routing CRUD untuk Motor (route resource gak boleh pakai spasi)
Route::resource('motor', MotorController::class);
