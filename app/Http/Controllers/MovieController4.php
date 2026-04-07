<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController4 extends Controller
{
    public function index() {
        $genre = DB::table('genre')->get();
        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->where('status', 1)
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        return view('index', ['genre' => $genre, 'movies' => $movies, 'title' => 'Trang chủ']);
    }

    public function create() {
        $genre = DB::table('genre')->get(); 
        return view('create_movie', ['genre' => $genre, 'title' => 'Thêm phim mới']);
    }

    public function store(Request $request) {
        $request->validate([
            'movie_name_en' => 'required',
            'movie_name_vn' => 'required',
            'release_date'  => 'required|date_format:Y-m-d', 
            'description'   => 'required',
          'image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ], [
            'required'    => ':attribute không được để trống.',
            'image'       => 'File tải lên phải là định dạng ảnh.',
            'mimes'       => 'File tải lên phải là định dạng ảnh.',
            'date_format' => ':attribute phải theo định dạng yyyy-mm-dd.',
        ], [
            'movie_name_en' => 'Tên tiếng Anh',
            'movie_name_vn' => 'Tên tiếng Việt',
            'release_date'  => 'Ngày phát hành',
            'description'   => 'Mô tả',
            'image'         => 'Ảnh đại diện',
        ]);

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/images', $fileName);

        DB::table('movie')->insert([
            'movie_name'    => $request->movie_name_en,
            'movie_name_vn' => $request->movie_name_vn,
            'original_name' => $request->movie_name_en,
            'release_date'  => $request->release_date,
            'overview'   => $request->description,
            'image'         => 'images/' . $fileName, 
            'status'        => 1, 
        ]);

        return redirect()->back()->with('success', 'Thêm phim thành công!');
    }
}