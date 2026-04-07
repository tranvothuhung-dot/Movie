<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Movie App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; display: flex; height: 100vh; }
        .sidebar { width: 260px; background: #1c1c1c; color: white; flex-shrink: 0; overflow-y: auto; }
        .sidebar-header { padding: 20px; font-weight: bold; border-bottom: 1px solid #333; }
        .genre-list { list-style: none; }
        .genre-list a { display: block; padding: 12px 20px; color: #bbb; text-decoration: none; border-bottom: 1px solid #252525; }
        .main-content { flex: 1; overflow-y: auto; }
        .hero { position: relative; height: 320px; background: #032541; display: flex; align-items: center; justify-content: center; color: white; }
        .hero img { position: absolute; width: 100%; height: 100%; object-fit: cover; opacity: 0.3; }
        .search-box { position: relative; width: 80%; max-width: 700px; z-index: 2; }
        .search-box input { width: 100%; padding: 15px 25px; border-radius: 30px; border: none; outline: none; }
        .search-box button { position: absolute; right: 0; height: 100%; padding: 0 30px; border-radius: 30px; border: none; background: linear-gradient(to right, #1ed5a9, #01b4e4); color: white; font-weight: bold; cursor: pointer; }
        
        /* Bố cục 3 hàng x 4 cột */
        .list-movie { display: flex; flex-wrap: wrap; gap: 20px; padding: 40px; max-width: 1200px; margin: 0 auto; }
        .movie { width: calc((100% - 60px) / 4); background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .movie-info { width: 100%; height: 280px; object-fit: cover; display: block; }
        .movie-name { padding: 10px 10px 5px; font-weight: bold; font-size: 14px; color: #000; height: 42px; overflow: hidden; }
        .movie-date { padding: 0 10px 15px; color: #999; font-size: 13px; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header"><i class="fa fa-list"></i> Thể loại phim</div>
        <ul class="genre-list">
            <li><a href="{{ route('movie.index') }}">Tất cả phim</a></li>
            @foreach($genres as $gn)
                <li><a href="{{ route('movie.genre', $gn->id) }}">Phim {{ $gn->genre_name_vn }}</a></li>
            @endforeach
        </ul>
    </aside>
    <main class="main-content">
        <header class="hero">
            <img src="{{ asset('library/banner.jpg') }}">
            <div class="search-box">
                <h1 style="font-size:40px; margin-bottom:20px; text-align:center">Welcome.</h1>
                <form action="{{ route('movie.search') }}" method="GET" style="position:relative">
                    <input type="text" name="keyword" placeholder="Tìm kiếm phim..." value="{{ request('keyword') }}">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>
        </header>
        <div class="list-movie">
            @foreach($movies as $movie)
                <div class="movie">
                    <a href="{{ route('movie.detail', $movie->id) }}" style="text-decoration:none">
                        <img src="{{ asset('storage/'.$movie->image) }}" class="movie-info">
                        <div class="movie-name">{{ $movie->movie_name_vn }}</div>
                        <div class="movie-date">{{ $movie->release_date }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>