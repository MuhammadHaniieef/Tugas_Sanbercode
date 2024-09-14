<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Metode untuk menampilkan daftar kategori
    public function index()
    {
        // Ambil semua data kategori dari database
        $categories = DB::table('categories')->get();
        
        // Kirim data kategori ke view 'category.index'
        return view('category.index', ['categories' => $categories]);
    }

    public function show($id)
    {
        // Mengambil data kategori berdasarkan ID menggunakan find()
        $category = DB::table('categories')->find($id);

        // Mengirim data kategori ke view 'category.show'
        return view('category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        // Mengambil data kategori berdasarkan ID menggunakan find()
        $category = DB::table('categories')->find($id);

        // Mengirim data kategori ke view 'category.show'
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        // Update data kategori berdasarkan ID
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);

        // Arahkan kembali ke halaman kategori setelah update berhasil
        return redirect('/category')->with('success', 'Kategori berhasil diupdate');
    }


    public function create()
    {
        return view('category.tambah');
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

    public function destroy($id)
    {
        // Hapus kategori berdasarkan ID
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/category')->with('success', 'Kategori berhasil dihapus');
    }

}
