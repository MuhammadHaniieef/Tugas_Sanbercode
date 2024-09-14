@extends('main')

@section('judul', 'Tambah Buku')

@section('content')
    <form method="POST" action="/books" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="summary">Ringkasan</label>
            <textarea name="summary" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="stock">Stok Buku</label>
            <input type="number" name="stock" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
