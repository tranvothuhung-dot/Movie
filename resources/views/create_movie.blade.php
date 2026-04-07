@component('components.movie-layout', ['genre' => $genre, 'title' => $title])
    
    <div class="container mt-4">
        <h3 class="text-center text-primary font-weight-bold">THÊM PHIM MỚI</h3>

        <form action="{{ url('/movie/store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            
            <div class="form-group mb-3">
                <label class="font-weight-bold">Tên tiếng Anh</label>
                <input type="text" name="movie_name_en" class="form-control @error('movie_name_en') is-invalid @enderror" value="{{ old('movie_name_en') }}">
                @error('movie_name_en')
                    <div class="text-danger font-italic small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold">Tên tiếng Việt</label>
                <input type="text" name="movie_name_vn" class="form-control @error('movie_name_vn') is-invalid @enderror" value="{{ old('movie_name_vn') }}">
                @error('movie_name_vn')
                    <div class="text-danger font-italic small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold">Ngày phát hành (yyyy-mm-dd)</label>
                <input type="text" name="release_date" class="form-control @error('release_date') is-invalid @enderror" placeholder="2026-04-07" value="{{ old('release_date') }}">
                @error('release_date')
                    <div class="text-danger font-italic small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold">Mô tả</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger font-italic small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label class="font-weight-bold">Ảnh đại diện</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="text-danger font-italic font-weight-bold small mt-1">
                        ⚠ {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-center mb-5">
                <button type="submit" class="btn btn-primary px-5 shadow-sm">Lưu phim</button>
            </div>
        </form>
    </div>

@endcomponent