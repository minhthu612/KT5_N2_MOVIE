<?php
use App\Http\Controllers\MovieController3;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController4;
use App\Http\Controllers\MovieController2; 

/*CÂU 3*/
Route::get('/admin/', [MovieController3::class, 'adminIndex'])->name('admin.movie');
Route::get('/admin/delete/{id}', [MovieController3::class, 'delete'])->name('movie.delete');
Route::get('/movie/detail/{id}', [MovieController3::class, 'detail'])->name('movie.detail');

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

Route::get('add-movie', [App\Http\Controllers\MovieController4::class, 'create']);

Route::post('add-movie', [MovieController4::class, 'store'])->name('movie.store');

// web.php
/* Route::get('admin/movies', [AdminController::class, 'index'])->name('admin.movies');
Route::get('admin/movies/{id}/delete', [AdminController::class, 'delete'])->name('admin.movies.delete');

Route::get('admin/movies', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.movies');
Route::get('admin/movies/{id}/delete', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin.movies.delete'); */

Route::get('/', [MovieController2::class, 'index']);
Route::get('/theloai/{id}', [MovieController2::class, 'Genre']);
Route::get('/movie/{id}', [MovieController2::class, 'detail']);
Route::post('/timkiem', [MovieController2::class, 'search']);