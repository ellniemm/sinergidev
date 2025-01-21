<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.auth.login');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/auth/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');

Route::middleware(['checkToken'])->group( function (){
    Route::get('/dashboard', [PagesController::class, 'index'])->name('dashboard');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    
    Route::get('/service', [ServiceController::class, 'service'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'serviceCreate'])->name('service.create');
    
    Route::get('/blog', [BlogController::class, 'blog'])->name('blog.index');
    Route::get('/about', [AboutController::class, 'about'])->name('about.index');
});
