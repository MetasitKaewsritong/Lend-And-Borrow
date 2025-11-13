<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowingsController;

Route::resource('Borrowings',BorrowingsController::class);
