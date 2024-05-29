<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $books = Book::latest()->take(3)->get();
        return view('custom.home', compact('books'));
    }

    /**
     * Show the books grid.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function books()
    {
        $books = Book::latest()->simplePaginate(9);
        return view('custom.books', compact('books'));
    }

    /**
     * Show a single book.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showBook(Book $book)
    {
        $comments = $book->comments;

        return view('custom.show', compact('book', 'comments'));
    }
}


