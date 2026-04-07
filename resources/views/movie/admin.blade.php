@component('components.movie-layout', ['title' => $title, 'genre' => $genre])
    <style>
        #id-table, #id-table th, #id-table td {
            border: 1px solid #dee2e6 !important;
        }

        #id-table thead th {
            background-color: #f8f9fa;
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }

        #id-table td {
            vertical-align: middle;
        }

        .btn-success {
            margin-bottom: 15px;
        }
    </style>

    <div class="main-content bg-white p-3 border rounded shadow-sm">
        <h2 class="text-center mb-4">DANH SÁCH PHIM</h2>
        
        {{-- Nút thêm phim trỏ đến route create ở Câu 4 --}}
        <a href="{{ route('movie.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Thêm
        </a>

        <table id="id-table" class="table table-bordered table-striped">
            <thead class="table-light text-center">
    <tr>
        <th style="width: 10%;">Ảnh đại diện</th>
        <th style="width: 20%;">Tiêu đề</th>
        <th style="width: 30%;">Giới thiệu</th>
        <th style="width: 15%;">Ngày phát hành</th>
        <th style="width: 10%;">Điểm đánh giá</th>
        <th style="width: 15%;"></th>
    </tr>
</thead>
            <tbody>
                @foreach($movies as $item)
                <tr>
                    <td class="text-center">
                        {{-- Hiển thị ảnh từ storage/app/public --}}
                        <img src="{{ asset('storage/' . $item->image) }}" width="70" 
                             onerror="this.src='https://via.placeholder.com/70x100?text=No+Image'">
                    </td>
                    <td><strong>{{ $item->movie_name_vn }}</strong></td> 
                    <td>{{ \Illuminate\Support\Str::limit($item->overview_vn, 100) }}</td>
                    <td class="text-center">{{ $item->release_date }}</td>
                    <td class="text-center">{{ $item->vote_average }}</td>
                    <td class="text-center" style="vertical-align: middle; width: 15%;">
    <div class="d-flex justify-content-center align-items-center gap-1">
        {{-- Nút Xem --}}
        <a href="{{ route('movie.detail', $item->id) }}" class="btn btn-primary btn-sm px-2" style="font-size: 12px; min-width: 45px;">Xem</a> 
        {{-- Nút Xóa --}}
        <a href="{{ route('admin.delete', $item->id) }}" 
           class="btn btn-danger btn-sm px-2" 
           style="font-size: 12px; min-width: 45px;"
           onclick="return confirm('Xác nhận xóa?')">Xóa</a> 
    </div>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Khởi tạo DataTable với bStateSave để giữ trạng thái khi load lại trang
            $('#id-table').DataTable({ 
                responsive: true, 
                pageLength: 5, 
                lengthMenu: [5, 10, 25, 50, 100], 
                bStateSave: true 
            }); 
        });
    </script>
@endcomponent