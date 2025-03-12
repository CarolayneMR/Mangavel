<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/create_book', function () {
    return view('create_book');
})->name('create_book');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/browse_books/', [BookController::class, 'show'])->name('browse_books');;
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
