<?php

use App\Http\Controllers\MlController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MlController::class,'index']);

Route::post('/process-input', [MlController::class, 'calculationInput'])->name('calculation.input');
