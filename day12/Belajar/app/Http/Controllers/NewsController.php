<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data berita dari database
    $news = News::all();

    // Mengirimkan data berita ke view 'news.tampil'
    return view('news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('news.tambah', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi file gambar
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        // Buat nama file unik dengan menambahkan timestamp
        $imageName = time() . '.' . $request->image->extension();

        // Pindahkan gambar yang diunggah ke folder 'uploads' di dalam direktori public
        $request->image->move(public_path('uploads'), $imageName);

        $news = new News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->category_id = $request->input('category_id');
        $news->image = $imageName;
        $news->save();

        return redirect('/news')->with('success', 'Berita berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data berita berdasarkan ID
    $news = News::find($id);

    // Mengirimkan data berita ke view 'news.detail'
    return view('news.detail', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $categories = Category::all();
    $news = News::find($id);

    return view('news.edit', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi input
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required',
        'image' => 'mimes:jpeg,jpg,png|max:2048', // Opsional, jika ada gambar baru
    ]);

    // Cari berita berdasarkan ID
    $news = News::find($id);
    $news->title = $request->input('title');
    $news->content = $request->input('content');
    $news->category_id = $request->input('category_id');

    // Jika ada file gambar yang diunggah, perbarui gambar
    if ($request->has('image')) {
        // Hapus file gambar lama
        File::delete('uploads/' . $news->image);
    
        // Masukkan gambar baru
        $fileImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $fileImage);
    
        // Simpan nama file gambar baru ke database
        $news->image = $fileImage;
    }

    // Simpan perubahan
    $news->save();

    // Redirect ke halaman index setelah update berhasil
    return redirect('/news')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);

    if ($news->image) {
        // Hapus file gambar dari folder uploads
        File::delete('uploads/' . $news->image);
    }

    // Hapus data berita dari database
    $news->delete();

    // Redirect ke halaman index news setelah berhasil dihapus
    return redirect('/news');
    }
}
