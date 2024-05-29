<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function show(Publisher $publisher)
    {
        $publisher->load('books');
        return view('publishers.show', compact('publisher'));
    }
}
