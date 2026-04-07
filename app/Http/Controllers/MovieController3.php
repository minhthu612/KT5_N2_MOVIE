<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieController3 extends Controller
{
    // CÂU 3
    public function adminIndex()
    {
        $movies = DB::table('movie')
            ->where('status', 1)
            ->get();

        $genre = DB::table('genre')->get();
        return view('admin.index', compact('movies','genre'));
    }

    public function delete($id)
    {
        DB::table('movie')
            ->where('id', $id)
            ->update(['status' => 0]);

        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
