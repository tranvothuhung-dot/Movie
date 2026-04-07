<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);


use App\Http\Controllers\MovieController2;
Route::get('/admin/movies', [MovieController2::class, 'index'])->name('admin.index');

Route::get('/admin/movies/delete/{id}', [MovieController2::class, 'delete'])->name('admin.delete');
Route::get('/', [App\Http\Controllers\MovieController4::class, 'index']);

use App\Http\Controllers\MovieController4;

Route::get('/movie/create', [App\Http\Controllers\MovieController4::class, 'create'])->name('movie.create');

Route::post('/movie/store', [App\Http\Controllers\MovieController4::class, 'store']);

