<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Movie App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; display: flex; height: 100vh; }
        .sidebar { width: 260px; background: #212121; color: white; flex-shrink: 0; }
        .sidebar-header { padding: 15px 20px; font-weight: bold; border-bottom: 1px solid #333; }
        .genre-list { list-style: none; }
        .genre-list a { display: block; padding: 12px 20px; color: #ccc; text-decoration: none; border-bottom: 1px solid #2a2a2a; }
        .main-content { flex: 1; overflow-y: auto; }
        .banner { position: relative; height: 300px; background: #032541; display: flex; align-items: center; justify-content: center; color: white; }
        .banner img { position: absolute; width: 100%; height: 100%; object-fit: cover; opacity: 0.5; }
        .hero-text { position: relative; z-index: 2; text-align: center; width: 80%; }
        .search-form { position: relative; margin-top: 20px; display: flex; }
        .search-form input { width: 100%; padding: 12px 20px; border-radius: 25px; border: none; outline: none; }
        .search-form button { position: absolute; right: 0; padding: 12px 25px; border-radius: 25px; border: none; background: linear-gradient(to right, #1ed5a9, #01b4e4); color: white; font-weight: bold; cursor: pointer; }
        .container { padding: 30px; }
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
        <header class="banner">
            <img src="{{ asset('library/banner.jpg') }}">
            <div class="hero-text">
                <h1>Welcome.</h1>
                <form action="{{ route('movie.search') }}" method="GET" class="search-form">
                    <input type="text" name="keyword" placeholder="Tìm kiếm phim..." value="{{ request('keyword') }}">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>
        </header>
        <div class="container">@yield('content')</div>
    </main>
</body>
</html>