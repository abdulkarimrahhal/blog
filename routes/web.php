<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Models\Category;


Route::get('/Home', [PostController::class, 'home']);
Route::get('/', [PostController::class, 'home']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/store', [PostController::class, 'store'])->middleware('auth');
Route::delete('/posts/{id}/delete', [PostController::class, 'destroy'])->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/categories/store', [CategoryController::class, 'store'])->middleware('auth');
Route::get('/categories/{post}/edit', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy'])->middleware('auth');
Route::get('/categories/posts', [CategoryController::class, 'post_cat'])->name('posts.byCategory');




Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'storeUser']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);
