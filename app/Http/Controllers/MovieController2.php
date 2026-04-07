<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieController2 extends Controller
{
    //
    
    public function index()
    {
        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc')
            ->limit(12)
            ->get();

        $genre = DB::table('genre')->get(); 

        return view('movie.index', compact('movies', 'genre'));
    }
    public function Genre($id)
    {
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->orderBy('movie.release_date', 'desc')
            ->select('movie.*')
            ->limit(12)
            ->get();

        return view('movie.index', compact('movies'));
    }
    public function detail($id)
    {
        $movie = DB::table('movie')->where('id', $id)->first();

        $genre = DB::table('genre')->get();

        return view('movie.detail', compact('movie','genre'));
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $movies = DB::select(
            "select * from movie where movie_name_vn like ?",
            ["%".$keyword."%"]
        );

        $genre = DB::table('genre')->get();

        return view('movie.index', compact('movies','genre'));
    }

}