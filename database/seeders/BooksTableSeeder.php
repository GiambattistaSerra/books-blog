<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $genres = Genre::all();
        $authors = Author::all();
        $publishers = Publisher::all();

        Book::factory(100)
            ->recycle($users)
            ->recycle($genres)
            ->recycle($publishers)
            ->create()
            ->each(function (Book $book) use ($authors) {
                $book->authors()->attach(
                    $authors->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
    }
}
