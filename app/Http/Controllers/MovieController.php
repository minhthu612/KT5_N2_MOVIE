<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //
    public function index()
{
    $movies = DB::table('movie')
        ->where('popularity', '>', 450)
        ->where('vote_average', '>', 7)
        ->where('status', 1)
        ->orderBy('release_date', 'desc')
        ->limit(12)
        ->get();
    
    return view('index', compact('movies'));
}
}
