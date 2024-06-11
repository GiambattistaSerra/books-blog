<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('custom.create', compact('genres', 'publishers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
            'published_year' => 'required|integer|min:1900|max:' . date('Y'),
            'authors' => 'required|array',
            'authors.*' => 'nullable|string|max:255',
        ]);

        $book = new Book();
        $book->title = $validatedData['title'];
        $book->summary = $validatedData['summary'];
        $book->genre_id = $validatedData['genre_id'];
        $book->publisher_id = $validatedData['publisher_id'];
        $book->published_year = $validatedData['published_year'];
        $book->user_id = auth()->id();

        $book->save();

        foreach ($validatedData['authors'] as $authorName) {
            if ($authorName) { // Check if the author name is not empty
                $author = Author::firstOrCreate(['name' => trim($authorName)]);
                $book->authors()->attach($author->id);
            }
        }

        return redirect()->route('books')->with('success', 'Book published successfully!');
    }
}



