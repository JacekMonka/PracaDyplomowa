<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Strona domowa
Route::get('/', [HomeController::class, 'index'])->name('home');
