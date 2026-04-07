<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController2 extends Controller
{
  public function index()
{
    $genre = DB::select("select * from genre");
    $movies = DB::select("select * from movie where status = 1");

    return view('movie.admin', [
        'movies' => $movies, 
        'genre' => $genre, 
        'title' => 'Quản lý phim'
    ]);
}

public function delete($id)
{
    \Illuminate\Support\Facades\DB::update("update movie set status = 0 where id = ?", [$id]);
    
    return redirect()->back()->with('success', 'Đã xóa mềm phim thành công!');
}
}