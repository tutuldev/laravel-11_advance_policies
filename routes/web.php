<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');



// for registion
Route::post('/registerValue', [UserController::class, 'registerValue'])->name('registerSave');
Route::get('/register', [UserController::class, 'registerPage'])->name('registerPage');

Route::post('/login', [UserController::class, 'loginMatch'])->name('loginMatch');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Route::get('/books', [BookController::class, 'index'])->name('book.show');

Route::resource('/book',BookController::class)->middleware('auth');

// policy with route method 1
// Route::put('book/{id}',[BookController::class,'update'])
// ->middleware('can:update,delete');

// policy with route method 2
// Route::put('book/{id}',[BookController::class,'update'])
// ->can('update,delete');


