@extends('main')

@section('judul')
    Halaman Detail Berita
@endsection

@section('content')
    <img src="{{ asset('uploads/' . $news->image) }}" width="100%" height="500px" alt="...">
    <h1 class="text-primary">{{ $news->title }}</h1>
    <p>{{ $news->content }}</p>
@endsection
