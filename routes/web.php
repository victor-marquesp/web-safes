<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoinController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SafeController;
use App\Http\Controllers\DepositController;

use App\Http\Controllers\Auth\AuthController;

Route::view('/', 'welcome')->name('welcome');

Route::resource('/currencies', CurrencyController::class)->middleware('auth');
Route::resource('/coins', CoinController::class)->middleware('auth');
Route::resource('/animals', AnimalController::class)->middleware('auth');
Route::resource('/safes', SafeController::class)->middleware('auth');
Route::patch('/safes/{safe}/break', [SafeController::class, 'break'])->name('safes.break');

Route::get('/safes/{safe}/deposits', [DepositController::class, 'index'])->name('safes.history')->middleware('auth');
Route::get('/safes/{safe}/deposits/create', [DepositController::class, 'create'])->name('deposits.create')->middleware('auth');
Route::post('/safes/{safe}/deposits', [DepositController::class, 'store'])->name('deposits.store')->middleware('auth');

// Autenticação

Route::view('/register', 'auth.register')->name('auth.register.form')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register')->middleware('guest');

Route::view('/login', 'auth.login')->name('auth.login.form')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
