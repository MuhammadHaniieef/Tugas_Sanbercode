@extends('main')

@section('judul')
    Halaman Detail Kategori
@endsection

@section('content')
    <h1 class="text-primary">{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
@endsection
