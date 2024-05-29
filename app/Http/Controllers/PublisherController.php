<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function showBooks(Publisher $publisher)
    {
        $books = $publisher->books()->simplePaginate(9);
        return view('custom.publisher.show', compact('publisher', 'books'));
    }
}

