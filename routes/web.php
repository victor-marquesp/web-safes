<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoinController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SafeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/currencies', CurrencyController::class);
Route::resource('/coins', CoinController::class);
Route::resource('/animals', AnimalController::class);
Route::resource('/safes', SafeController::class);
