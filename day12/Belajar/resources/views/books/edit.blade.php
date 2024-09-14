@extends('main')

@section('judul', 'Edit Buku')

@section('content')
    <form method="POST" action="/books/{{ $book->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="summary">Ringkasan</label>
            <textarea name="summary" class="form-control" rows="5">{{ $book->summary }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control">
            @if($book->image)
                <img src="{{ asset('uploads/' . $book->image) }}" alt="Gambar Buku" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="stock">Stok Buku</label>
            <input type="number" name="stock" value="{{ $book->stock }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
