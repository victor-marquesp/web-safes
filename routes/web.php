<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoinController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SafeController;
use App\Http\Controllers\DepositController;

use App\Http\Controllers\Auth\AuthController;

Route::view('/', 'welcome')->name('welcome');

Route::resource('/currencies', CurrencyController::class);
Route::resource('/coins', CoinController::class);
Route::resource('/animals', AnimalController::class);
Route::resource('/safes', SafeController::class);

Route::get('/safes/{safe}/deposits', [DepositController::class, 'index'])->name('safes.history');
Route::get('/safes/{safe}/deposits/create', [DepositController::class, 'create'])->name('deposits.create');
Route::post('/safes/{safe}/deposits', [DepositController::class, 'store'])->name('deposits.store');

// Autenticação

Route::view('/register', 'auth.register')->name('auth.register.form');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::view('login', 'auth.login')->name('auth.login.form');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
