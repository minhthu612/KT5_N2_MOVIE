<x-movie-layout :genre="$genre">

    <x-slot name="title">
        Danh sách phim
    </x-slot>

<style>
    body {
        background: #f4f6f9;
    }

    .card-custom {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    table img {
        border-radius: 6px;
    }

    table td {
        vertical-align: middle;
    }

    h3 {
        font-weight: bold;
    }

    .btn-sm {
        padding: 4px 10px;
    }

    #movie-table tbody tr:nth-child(even) {
        background-color: #f2f2f2 !important;
    }

    #movie-table tbody tr:hover {
        background-color: #d0ebff;
    }

    #movie-table td:nth-child(3) {
        text-align: left;
        line-height: 1.4;
    }

    #movie-table th:nth-child(1),
    #movie-table td:nth-child(1) {
        width: 80px;
    }

    #movie-table th:nth-child(2),
    #movie-table td:nth-child(2) {
        width: 200px;
    }

    #movie-table th:nth-child(3),
    #movie-table td:nth-child(3) {
        width: 250px;
        text-align: left;
    }

    #movie-table th:nth-child(4),
    #movie-table td:nth-child(4) {
        width: 150px;
    }

    #movie-table th:nth-child(5),
    #movie-table td:nth-child(5) {
        width: 90px;
    }

    #movie-table th:nth-child(6),
    #movie-table td:nth-child(6) {
        width: 150px;
        white-space: nowrap;
    }
</style>

<div class="container mt-4">

    <div class="card-custom">

        <div class="position-relative mb-4">
            <a href="{{ url('/add-movie') }}"
               class="btn btn-success position-absolute start-0">
                + Thêm
            </a>

            <h3 class="text-center m-0">DANH SÁCH PHIM</h3>
        </div>

        <table id="movie-table" class="table table-bordered table-hover text-center">
            <thead class="table-light">
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th>Ngày phát hành</th>
                    <th>Điểm</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach($movies as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->image) }}" width="60">
                    </td>

                    <td class="fw-bold">
                        {{ $item->movie_name_vn }}
                    </td>

                    <td>
                        {{ $item->tagline_vn ?: $item->tagline }}
                    </td>

                    <td>{{ $item->release_date }}</td>

                    <td>
                        <span class="badge bg-warning text-dark">
                             {{ $item->vote_average }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ url('/movie/'.$item->id) }}" 
                           class="btn btn-primary btn-sm">
                            Xem
                        </a>

                        <a href="{{ url('/admin/delete/'.$item->id) }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Xóa phim này?')">
                           Xóa
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

</x-movie-layout>

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