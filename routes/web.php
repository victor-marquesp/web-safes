<?php

use App\Http\Controllers\SaferController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/safers', SaferController::class);
