@component('components.movie-layout', ['title' => 'Trang chủ Movie', 'genre' => $genres])
    <style>
        /* Xóa Style của .hero vì không dùng banner ở đây nữa */
        .list-movie { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px; 
            padding: 20px; 
        }
        .movie { 
            background: #fff; 
            border-radius: 8px; 
            overflow: hidden; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
            transition: transform 0.2s;
        }
        .movie:hover { transform: translateY(-5px); }
        .movie-info { width: 100%; height: 280px; object-fit: cover; display: block; }
        .movie-name { padding: 10px 10px 5px; font-weight: bold; font-size: 14px; color: #000; height: 42px; overflow: hidden; }
        .movie-date { padding: 0 10px 15px; color: #999; font-size: 13px; }

        @media (max-width: 1024px) { .list-movie { grid-template-columns: repeat(2, 1fr); } }
    </style>

    <div class="home-wrapper">
        {{-- ĐÃ XÓA PHẦN HEADER HERO Ở ĐÂY ĐỂ KHÔNG BỊ TRÙNG --}}

        <div class="list-movie">
            @foreach($movies as $movie)
                <div class="movie">
                    <a href="{{ route('movie.detail', $movie->id) }}" style="text-decoration:none">
                        <img src="{{ asset('storage/'.$movie->image) }}" class="movie-info" onerror="this.src='https://via.placeholder.com/200x280?text=No+Image'">
                        <div class="movie-name">{{ $movie->movie_name_vn }}</div>
                        <div class="movie-date">{{ $movie->release_date }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endcomponent