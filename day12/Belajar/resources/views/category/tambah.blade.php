@extends('main')

@section('judul')
    Halaman Tambah Kategori
@endsection

@section('content')
    <form method="POST" action="{{ url('/category') }}">
        @csrf
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Description Kategori</label>
            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
