<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $books = Books::all();
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required|integer',
            'category_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        $book = new Books;
        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stock = $request->input('stock');
        $book->category_id = $request->input('category_id');
        $book->image = $imageName;
        $book->save();

        return redirect('/books')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $book = Books::find($id);
        return view('books.detail', ['book' => $book]);
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $book = Books::find($id);
        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        $book = Books::find($id);
        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stock = $request->input('stock');
        $book->category_id = $request->input('category_id');

        if ($request->has('image')) {
            File::delete('uploads/' . $book->image);

            $fileImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $fileImage);
            $book->image = $fileImage;
        }

        $book->save();
        return redirect('/books')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $book = Books::find($id);

        if ($book->image) {
            File::delete('uploads/' . $book->image);
        }

        $book->delete();
        return redirect('/books');
    }
}
