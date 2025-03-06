<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/browse_books/', [BookController::class, 'show']);
