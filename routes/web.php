<?php
use App\Http\Controllers\MovieController3;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index']);
/*CÂU 3*/
Route::get('/admin/', [MovieController3::class, 'adminIndex'])->name('admin.movie');
Route::get('/admin/delete/{id}', [MovieController3::class, 'delete'])->name('movie.delete');
Route::get('/movie/detail/{id}', [MovieController3::class, 'detail'])->name('movie.detail');
