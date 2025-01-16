<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');

Route::get('/dashboard', [PagesController::class, 'index'])->name('dashboard');