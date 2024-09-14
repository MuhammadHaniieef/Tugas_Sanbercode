@extends('main')

@section('judul', 'Detail Buku')

@section('content')
    <div class="card">
        <img src="{{ asset('uploads/' . $book->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text">{{ $book->summary }}</p>
            <p class="card-text">Stok: {{ $book->stock }}</p>
            <p class="card-text">Kategori: {{ $book->category ? $book->category->name : 'Kategori tidak ditemukan' }}</p>

        </div>
    </div>
@endsection
