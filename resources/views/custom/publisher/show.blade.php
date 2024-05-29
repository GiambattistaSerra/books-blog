@extends('custom.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Books by {{ $publisher->name }}</h1>
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->authors->pluck('name')->join(', ') }}</p>
                            <p class="card-text">{{ Str::limit($book->summary, 120) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    </div>
@endsection

