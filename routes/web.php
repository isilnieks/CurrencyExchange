<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AppController::class, 'show']);
Route::post('/', [AppController::class, 'calculate'])
    ->name('calculate');
