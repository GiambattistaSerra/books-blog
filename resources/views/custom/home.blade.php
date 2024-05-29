@extends('custom.layouts.app')

@section('content')
    <div class="container mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($books as $index => $book)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="d-block w-100" style="height: 400px; background: #ccc;"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $book->title }}</h5>
                            <p>{{ Str::limit($book->summary, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="banner mt-5">
            <a href="{{ route('books') }}" class="btn btn-primary btn-lg btn-block">Explore a world of books</a>
        </div>
    </div>
@endsection


