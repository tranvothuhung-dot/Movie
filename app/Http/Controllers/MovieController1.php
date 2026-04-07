<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController1 extends Controller
{
    // CÂU 2A: TRANG CHỦ (12 phim, pop > 450, vote > 7)
    public function index() {
        $genres = DB::table('genre')->get();
        $movies = DB::table('movie')
            ->where('status', 1)
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->limit(12)->get();
        return view('index', compact('movies', 'genres'));
    }

    // CÂU 2B: LỌC THEO THỂ LOẠI
    public function getByGenre($id) {
        $genres = DB::table('genre')->get();
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->where('movie.status', 1)
            ->select('movie.*')
            ->orderBy('release_date', 'desc')
            ->limit(12)->get();
        return view('index', compact('movies', 'genres'));
    }

    // CÂU 2C: CHI TIẾT PHIM
    public function detail($id) {
        $genres = DB::table('genre')->get();
        $movie = DB::table('movie')->where('id', $id)->first();
        if (!$movie) abort(404);
        return view('detail', compact('movie', 'genres'));
    }

    // CÂU 2D: TÌM KIẾM (Đúng SQL thầy yêu cầu)
    public function search(Request $request) {
        $genres = DB::table('genre')->get();
        $keyword = $request->keyword;
        $movies = DB::select("select * from movie where status = 1 and movie_name_vn like ?", ["%".$keyword."%"]);
        return view('index', compact('movies', 'genres'));
    }
}