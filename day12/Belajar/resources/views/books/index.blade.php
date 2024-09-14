@extends('main')

@section('judul', 'Daftar Buku')

@section('content')
    <a href="/books/create" class="btn btn-primary mb-3">Tambah Buku</a>
    <div class="row">
        @forelse ($books as $book)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('uploads/' . $book->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ Str::limit($book->summary, 100) }}</p>
                        <a href="/books/{{ $book->id }}" class="btn btn-primary">Detail</a>
                        <a href="/books/{{ $book->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/books/{{ $book->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Belum ada buku</p>
        @endforelse
    </div>
@endsection
