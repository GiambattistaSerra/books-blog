@extends('custom.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Share Your Books</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author1">Author 1</label>
                <input type="text" class="form-control" id="author1" name="authors[]" required>
            </div>
            <div class="form-group">
                <label for="author2">Author 2</label>
                <input type="text" class="form-control" id="author2" name="authors[]">
            </div>
            <div class="form-group">
                <label for="author3">Author 3</label>
                <input type="text" class="form-control" id="author3" name="authors[]">
            </div>
            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea class="form-control" id="summary" name="summary" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <select class="form-control" id="genre" name="genre_id" required>
                    @foreach($defaultGenres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <select class="form-control" id="publisher" name="publisher_id" required>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="published_year">Published Year</label>
                <input type="number" class="form-control" id="published_year" name="published_year" required min="1900" max="{{ date('Y') }}">
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
@endsection




