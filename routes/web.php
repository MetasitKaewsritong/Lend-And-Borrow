<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowingsController;

Route::get('/', [BorrowingsController::class, 'index']);
Route::resource('Borrowings',BorrowingsController::class);
