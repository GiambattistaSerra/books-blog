<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('/dashboard', '/home')->name('dashboard');
    Route::get('/home', [CustomController::class, 'home'])->name('home');
    Route::get('/books', [CustomController::class, 'books'])->name('books');
    Route::get('/books/{book}', [CustomController::class, 'showBook'])->name('books.show');
    Route::get('/authors/{author}',[AuthorController::class, 'showBooks'])->name('author.books');
    Route::get('/genres/{genre}',[GenreController::class, 'showGenre'])->name('genre.books');
    Route::get('/publishers/{publisher}', [PublisherController::class, 'showBooks'])->name('publisher.books');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
