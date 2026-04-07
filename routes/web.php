<?php
use App\Http\Controllers\MovieController3;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController2; 

/*CÂU 3*/
Route::get('/admin/', [MovieController3::class, 'adminIndex'])->name('admin.movie');
Route::get('/admin/delete/{id}', [MovieController3::class, 'delete'])->name('movie.delete');
Route::get('/movie/detail/{id}', [MovieController3::class, 'detail'])->name('movie.detail');
Route::get('/', [MovieController2::class, 'index']);
Route::get('/theloai/{id}', [MovieController2::class, 'Genre']);
Route::get('/movie/{id}', [MovieController2::class, 'detail']);
Route::post('/timkiem', [MovieController2::class, 'search']);
