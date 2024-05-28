<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $books = Book::all();

        Comment::factory(200)
            ->recycle($users)
            ->recycle($books)
            ->create();
    }
}
