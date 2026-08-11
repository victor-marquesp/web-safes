<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SaferController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/animals', AnimalController::class);
Route::resource('/safers', SaferController::class);
