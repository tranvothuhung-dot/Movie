<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController1;

Route::get('/', [MovieController1::class, 'index'])->name('movie.index');
Route::get('/the-loai/{id}', [MovieController1::class, 'getByGenre'])->name('movie.genre');
Route::get('/chi-tiet-phim/{id}', [MovieController1::class, 'detail'])->name('movie.detail');
Route::get('/tim-kiem', [MovieController1::class, 'search'])->name('movie.search');