<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function showBooks(Author $author)
    {
        $books = $author->books()->simplePaginate(9);
        return view('custom.author.show', compact('author', 'books'));
    }


}
