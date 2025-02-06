<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;



Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/register',[RegisterController::class, 'create']);
Route::post('/register',[RegisterController::class, 'store']);
Route::get('/login',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/create', [PostController::class, 'store'])->name('store');
Route::get('/{post}', [PostController::class, 'show'])->name('show');

Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');

Route::put('/{post}', [PostController::class, 'update'])->name('update');

Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');




