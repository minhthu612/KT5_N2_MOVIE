<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $movies = DB::table('movie')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(5);
        
        return view('admin.movies', compact('movies'));
    }

    public function delete($id)
    {
        DB::table('movie')->where('id', $id)->update(['status' => 0]);
        
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}