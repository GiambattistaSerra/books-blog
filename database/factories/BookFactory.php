<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'summary' => $this->faker->realText(2000),
            'genre_id' => Genre::factory(),
            'publisher_id' => Publisher::factory(),
            'published_year' => $this->faker->year,
            'user_id' => User::factory(),
        ];
    }
}
