<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.admin.auth.login');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/auth/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');

