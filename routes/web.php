<?php

use App\Http\Controllers\MlController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MlController::class,'index']);

Route::get('/prediction', [MlController::class, 'calculationInput'])->name('calculation.input');
