@extends('main')

@section('judul')
    Halaman Tampil Berita
@endsection

@section('content')
<a href="/news/create" class="btn btn-sm btn-primary mb-5">Tambah Berita</a>

<div class="row">
    @forelse ($news as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{ asset('uploads/' . $item->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h2>{{ $item->title }}</h2>
                <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                <a href="/news/{{ $item->id }}" class="btn btn-primary btn-block">Read More</a>
                <div class="row mt-2">
                    <div class="col">
                        <a href="/news/{{ $item->id }}/edit" class="btn btn-warning btn-block">Edit</a>
                    </div>
                    <div class="col">
                        <form action="/news/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    @empty
    <h4>Belum ada berita</h4>
    @endforelse
</div>
@endsection
