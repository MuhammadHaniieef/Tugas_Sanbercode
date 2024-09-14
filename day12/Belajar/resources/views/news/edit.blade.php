@extends('main')

@section('judul')
    Edit Berita
@endsection

@section('content')
    <form method="POST" action="/news/{{ $news->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group">
            <label for="title">Judul Berita</label>
            <input type="text" name="title" value="{{ $news->title }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Konten Berita</label>
            <textarea name="content" class="form-control" cols="30" rows="10">{{ $news->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control">
            @if($news->image)
                <img src="{{ asset('uploads/' . $news->image) }}" alt="Gambar Berita" width="150" class="mt-3">
            @endif
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">--Pilih Kategori--</option>
                @forelse ($categories as $item)
                    @if ($item->id === $news->category_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @empty
                    <option value="">Belum ada kategori</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Berita</button>
    </form>
@endsection
