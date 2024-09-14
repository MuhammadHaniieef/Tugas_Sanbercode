@extends('main')

@section('judul')
    List Game
@endsection

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
      integrity="sha384-ZCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
      crossorigin="anonymous">
@endpush

@section('content')
<div class="container mt-3">
    <h2>List Game</h2>
    <a href="{{ url('/games/create') }}" class="btn btn-primary mb-2">Tambah</a> 

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gameplay</th>
                <th scope="col">Developer</th>
                <th scope="col">Year</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game) <!-- Loop untuk menampilkan semua data game -->
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $game->name }}</td>
                <td>{{ $game->gameplay }}</td>
                <td>{{ $game->developer }}</td>
                <td>{{ $game->year }}</td>
                <td>
                    <a href="{{ url('/games/' . $game->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <a href="{{ url('/games/' . $game->id) }}" class="btn btn-info btn-sm">Detail</a>

                    <form action="{{ url('/games/' . $game->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" 
        crossorigin="anonymous"></script>
@endpush
