<x-movie-layout title="Quản lý phim">

<h4 class="text-center text-primary">QUẢN LÝ PHIM</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ url('/add-movie') }}" class="btn btn-success mb-3">+ Thêm phim</a>

<table id="movie-table" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên phim (VN)</th>
            <th>Ngày phát hành</th>
            <th>Ảnh</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->movie_name_vn }}</td>
            <td>{{ $movie->release_date }}</td>
            <td>
                <img src="{{ asset('images/'.$movie->image) }}" width="50" height="70">
            </td>
            <td>
                <a href="{{ url('/movie/'.$movie->id) }}" class="btn btn-sm btn-info">Xem</a>
                <a href="{{ url('/admin/movies/'.$movie->id.'/delete') }}" 
                   class="btn btn-sm btn-danger" 
                   onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $movies->links() }}

<script>
    $(document).ready(function() {
        $('#movie-table').DataTable({
            responsive: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 100],
            bStateSave: true,
        });
    });
</script>

</x-movie-layout>