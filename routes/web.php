<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController1;
use App\Http\Controllers\MovieController2;
use App\Http\Controllers\MovieController4;

// --- CÂU 1 & CÂU 2: TRANG CHỦ & CHI TIẾT ---
// Hưng dùng Controller4 làm gốc cho trang chủ nhé
Route::get('/', [MovieController1::class, 'index'])->name('movie.index');
Route::get('/the-loai/{id}', [MovieController1::class, 'getByGenre'])->name('movie.genre');
Route::get('/chi-tiet-phim/{id}', [MovieController1::class, 'detail'])->name('movie.detail');
Route::get('/tim-kiem', [MovieController1::class, 'search'])->name('movie.search');

// --- CÂU 3: QUẢN LÝ PHIM (ADMIN) ---
Route::get('/admin/movies', [MovieController2::class, 'index'])->name('admin.index');
Route::get('/admin/movies/delete/{id}', [MovieController2::class, 'delete'])->name('admin.delete');

// --- CÂU 4: THÊM PHIM MỚI ---
Route::get('/movie/create', [MovieController4::class, 'create'])->name('movie.create');
Route::post('/movie/store', [MovieController4::class, 'store'])->name('movie.store');