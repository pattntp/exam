<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', fn() => redirect('/transactions'));
Route::resource('transactions', TransactionController::class);
