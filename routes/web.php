<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController4;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

Route::get('add-movie', [App\Http\Controllers\MovieController4::class, 'create']);

Route::post('add-movie', [MovieController4::class, 'store'])->name('movie.store');

// web.php
Route::get('admin/movies', [AdminController::class, 'index'])->name('admin.movies');
Route::get('admin/movies/{id}/delete', [AdminController::class, 'delete'])->name('admin.movies.delete');

Route::get('admin/movies', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.movies');
Route::get('admin/movies/{id}/delete', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin.movies.delete');