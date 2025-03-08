<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\user\PagesController as UserPagesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
    // return view('pages.admin.service.index');
});
Route::get('/home', [UserPagesController::class, 'index'])->name('home');
Route::get('/services', [UserPagesController::class, 'services'])->name('services');
Route::get('/about-us', [UserPagesController::class, 'aboutUs'])->name('about-us');
Route::get('/products', [UserPagesController::class, 'products'])->name('products');
Route::get('/contact-us', [UserPagesController::class, 'contactUs'])->name('contact-us');
Route::get('/blogs', [UserPagesController::class, 'blog'])->name('blog.user');
Route::get('/blogs/{slug}', [UserPagesController::class, 'blogDetail'])->name('blog.detail');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/auth/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');
// Route::get('/service', [ServiceController::class, 'service'])->name('service.index');

Route::middleware(['checkToken'])->group(function () {
    Route::get('/dashboard', [PagesController::class, 'index'])->name('dashboard');

    Route::get('/product', [ProductController::class, 'product'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    Route::get('/service', [ServiceController::class, 'service'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'serviceCreate'])->name('service.create');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/create', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{slug}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::patch('/blog/update/{slug}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/delete/{slug}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::post('/upload-image', [BlogController::class, 'uploadImage']);

    Route::get('/users', [UserController::class, 'user'])->name('user.index');
    
    Route::get('/category', [CategoryController::class, 'category'])->name('category.index');
});
