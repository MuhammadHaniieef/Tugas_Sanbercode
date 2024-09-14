@extends('main')

@section('judul')
    Detail Data Game
@endsection

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
      integrity="sha384-ZCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
      crossorigin="anonymous">
@endpush

@section('content')
<div class="container mt-3">
    <h2>Detail Data Game</h2>
    <div class="card">
        <div class="card-header">
            Game Details
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $game->name }}</h5>
            <p class="card-text">Gameplay: {{ $game->gameplay }}</p>
            <p class="card-text">Developer: {{ $game->developer }}</p>
            <p class="card-text">Year: {{ $game->year }}</p>
            <a href="{{ url('/games') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
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
