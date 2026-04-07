<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chi tiết phim</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS Sidebar và Banner giữ nguyên như trang chủ */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; display: flex; height: 100vh; }
        .sidebar { width: 260px; background: #1c1c1c; color: white; flex-shrink: 0; }
        .sidebar-header { padding: 20px; font-weight: bold; border-bottom: 1px solid #333; }
        .genre-list a { display: block; padding: 12px 20px; color: #bbb; text-decoration: none; border-bottom: 1px solid #252525; }
        .main-content { flex: 1; overflow-y: auto; }
        .hero { position: relative; height: 300px; background: #032541; display: flex; align-items: center; justify-content: center; }
        .hero img { position: absolute; width: 100%; height: 100%; object-fit: cover; opacity: 0.3; }
        .search-box { position: relative; width: 80%; max-width: 700px; z-index: 2; margin-top:50px }
        .search-box input { width: 100%; padding: 14px 25px; border-radius: 30px; border: none; }
        .search-box button { position: absolute; right: 0; height: 100%; padding: 0 30px; border-radius: 30px; border: none; background: linear-gradient(to right, #1ed5a9, #01b4e4); color: white; font-weight: bold; }
        
        /* Layout 2 cột cho chi tiết */
        .detail-card { display: flex; gap: 30px; padding: 30px; background: #efefef; margin: 30px; border-radius: 8px; }
        .poster { width: 300px; flex-shrink: 0; }
        .poster img { width: 100%; border-radius: 6px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
        .info { flex: 1; color: #333; }
        .info-row { margin-bottom: 10px; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header"><i class="fa fa-list"></i> Thể loại phim</div>
        <ul class="genre-list" style="list-style:none">
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
                <form action="{{ route('movie.search') }}" method="GET" style="position:relative">
                    <input type="text" name="keyword" placeholder="Tìm kiếm phim...">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>
        </header>
        <div class="detail-card">
            <div class="poster"><img src="{{ asset('storage/'.$movie->image) }}"></div>
            <div class="info">
                <h2 style="margin-bottom:20px">{{ $movie->movie_name_vn }} - {{ $movie->movie_name }}</h2>
                <div class="info-row"><span class="bold">Ngày phát hành:</span> {{ $movie->release_date }}</div>
                <div class="info-row"><span class="bold">Quốc gia:</span> United States of America</div>
                <div class="info-row"><span class="bold">Thời gian:</span> {{ $movie->runtime }} phút</div>
                <div class="info-row"><span class="bold">Doanh thu:</span> {{ number_format($movie->revenue) }}</div>
                <div class="info-row" style="margin-top:15px">
                    <span class="bold">Mô tả:</span>
                    <p style="text-align:justify; line-height:1.6">{{ $movie->overview }}</p>
                </div>
                <a href="#" style="display:inline-block; background:#28a745; color:white; padding:10px 20px; text-decoration:none; border-radius:4px; margin-top:20px">Xem trailer</a>
            </div>
        </div>
    </main>
</body>
</html>