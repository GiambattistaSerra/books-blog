<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors', 'genre', 'publisher','user')->get();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        $book->load('authors', 'genre', 'publisher', 'comments.user', 'user');
        return view('books.show', compact('book'));
    }

}
