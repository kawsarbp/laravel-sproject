<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEnd\SiteController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'home'])->name('home');
## Register
Route::get('/sign-up', [SiteController::class, 'signUp'])->name('signUp');
Route::post('/sign-up', [SiteController::class, 'register'])->name('register');
## Login
Route::get('/login', [SiteController::class, 'login_form'])->name('login_form');
Route::post('/login', [SiteController::class, 'login'])->name('login');
## Category
Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('index');
    ##logout
    Route::post('/logout', [SiteController::class, 'logout'])->name('logout');


    Route::resources([
        '/category' => CategoryController::class,
        '/post' => PostController::class
    ]);
});
