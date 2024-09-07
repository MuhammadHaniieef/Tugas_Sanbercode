<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view ('category.tambah');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Insert data inputan ke database table categories
        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Arahkan ke halaman GET /category
        return redirect('/category');
    }
}
