<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoinController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SafeController;
use App\Http\Controllers\DepositController;

Route::view('/', 'welcome');

Route::resource('/currencies', CurrencyController::class);
Route::resource('/coins', CoinController::class);
Route::resource('/animals', AnimalController::class);
Route::resource('/safes', SafeController::class);

Route::get('/safes/{safe}/deposits', [DepositController::class, 'index'])->name('safes.history');
Route::get('/safes/{safe}/deposits/create', [DepositController::class, 'create'])->name('deposits.create');
Route::post('/safes/{safe}/deposits', [DepositController::class, 'store'])->name('deposits.store');
