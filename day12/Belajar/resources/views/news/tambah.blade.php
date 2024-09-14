@extends('main')

@section('judul')
    Halaman Tambah Kategori
@endsection

@section('content')
    <form method="POST" action="/news" enctype="multipart/form-data">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        <div class="form-group">
            <label>Judul berita</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Konten berita</label>
            <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
        </div>
        
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">--Pilih Kategori--</option>
                @forelse ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option value="">Belum Kategori</option>
                @endforelse
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
