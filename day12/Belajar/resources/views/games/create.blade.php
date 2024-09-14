@extends('main')

@section('judul')
    Create Game 
@endsection

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
      integrity="sha384-ZCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
      crossorigin="anonymous">
@endpush

@section('content')
<div class="container mt-3">
    <h2>Create Data Game</h2>
    <form action="{{ url('/games') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Game Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter game name" required>
        </div>
        <div class="form-group">
            <label for="gameplay">Gameplay</label>
            <textarea class="form-control" id="gameplay" name="gameplay" rows="3" placeholder="Enter gameplay description" required></textarea>
        </div>
        <div class="form-group">
            <label for="developer">Developer</label>
            <input type="text" class="form-control" id="developer" name="developer" placeholder="Enter developer name" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" placeholder="Enter release year" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
