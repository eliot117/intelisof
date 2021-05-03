<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PermissionController;


//Rutas del Frontend
Auth::routes();

Route::get('/', [HomeController::class,'index'])->name('sitio.principal');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/team', [HomeController::class,'team'])->name('team');
Route::get('/testimonial', [HomeController::class,'testimonial'])->name('testimonial');
Route::get('/services', [HomeController::class,'services'])->name('services');
Route::get('/portafolio', [HomeController::class,'portafolio'])->name('portafolio');
Route::get('/blog', [HomeController::class,'blog'])->name('blog');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');

//Rutas Logueadas
Route::get('/admin', [AdminController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function ()
{
    Route::resource('users', UsersController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('productos', ProductController::class);
    Route::resource('posts', PostsController::class);
});



