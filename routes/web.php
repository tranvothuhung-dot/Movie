<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController4::class, 'index']);

use App\Http\Controllers\MovieController4;

Route::get('/movie/create', [App\Http\Controllers\MovieController4::class, 'create'])->name('movie.create');

Route::post('/movie/store', [App\Http\Controllers\MovieController4::class, 'store']);

