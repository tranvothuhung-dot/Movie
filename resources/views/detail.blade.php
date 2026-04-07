@component('components.movie-layout', ['title' => 'Chi tiết: ' . $movie->movie_name_vn, 'genre' => $genres])
    <style>
        .detail-card { 
            display: flex; gap: 30px; padding: 35px; background: #ffffff; 
            margin: 20px; border-radius: 12px; box-shadow: 0 4px 25px rgba(0,0,0,0.1);
        }
        .poster { width: 300px; flex-shrink: 0; }
        .poster img { width: 100%; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.3); }
        .info { flex: 1; color: #333; }
        .info h2 { color: #032541; font-size: 32px; margin-bottom: 5px; font-weight: bold; }
        .info h4 { font-style: italic; color: #777; margin-bottom: 25px; }
        .info-row { margin-bottom: 15px; font-size: 16px; }
        .bold { font-weight: bold; color: #444; width: 140px; display: inline-block; }
        .badge-score { background: #fadb14; padding: 4px 12px; border-radius: 20px; font-weight: bold; }
    </style>

    <div class="detail-container">
        {{-- ĐÃ XÓA PHẦN HEADER HERO Ở ĐÂY ĐỂ KHÔNG BỊ TRÙNG --}}

        <div class="detail-card">
            <div class="poster">
                <img src="{{ asset('storage/'.$movie->image) }}" onerror="this.src='https://via.placeholder.com/300x450?text=No+Poster'">
            </div>
            <div class="info">
                <h2>{{ $movie->movie_name_vn }}</h2>
                <h4>{{ $movie->movie_name }}</h4>
                <div class="info-row"><span class="bold">Điểm đánh giá:</span> <span class="badge-score">{{ $movie->vote_average }} / 10</span></div>
                <div class="info-row"><span class="bold">Ngày phát hành:</span> {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}</div>
                <div class="info-row"><span class="bold">Thời lượng:</span> {{ $movie->runtime ?? '120' }} phút</div>
                <div class="info-row"><span class="bold">Doanh thu:</span> ${{ number_format($movie->revenue ?? 0) }}</div>
                <div style="margin-top:20px">
                    <span class="bold" style="display:block; margin-bottom:10px">Mô tả nội dung:</span>
                    <p style="text-align: justify; line-height: 1.8; color: #555;">{{ $movie->overview_vn ?? $movie->overview }}</p>
                </div>
                <div class="mt-5">
                    <a href="#" class="btn btn-danger btn-lg" style="background:#e50914; border:none; padding:12px 35px; font-weight:bold;">XEM TRAILER</a>
                    <a href="{{ route('movie.index') }}" class="btn btn-outline-dark btn-lg" style="margin-left:15px; padding:12px 35px;">QUAY LẠI</a>
                </div>
            </div>
        </div>
    </div>
@endcomponent