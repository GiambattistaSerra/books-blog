<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showGenre(Genre $genre)
    {
        $books = $genre->books()->simplePaginate(9);
        return view('custom.genre.show', compact('genre', 'books'));
    }
}
