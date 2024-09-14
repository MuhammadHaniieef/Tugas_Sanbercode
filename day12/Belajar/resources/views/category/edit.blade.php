@extends('main')

@section('judul')
    Halaman Tambah Kategori
@endsection

@section('content')
    <form method="POST" action="/category/{{$category->id}}">
        @method("put")
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
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
        </div>
        <div class="form-group">
            <label>Description Kategori</label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{$category->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
