@extends('custom.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $book->title }}</h1>
        <p>Authors:
            @foreach($book->authors as $author)
                <a href="{{ route('author.books', $author->id) }}">{{ $author->name }}</a>
            @endforeach
        </p>
        <p>Publisher: <a href="{{ route('publisher.books', $book->publisher->id) }}">{{ $book->publisher->name }}</a></p>
        <p>Genre: <a href="{{ route('genre.books', $book->genre->id) }}">{{ $book->genre->name }}</a></p>
        <p>Summary: {{ $book->summary }}</p>

        <h2>Comments</h2>
        @foreach($comments as $comment)
            <div>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
@endsection



