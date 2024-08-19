<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PingController;

Route::get('/', [PingController::class, 'index'])->name('home');
