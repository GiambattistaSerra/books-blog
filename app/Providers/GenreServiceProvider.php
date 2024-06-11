<?php

namespace App\Providers;

use App\Models\Genre;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class GenreServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->createDefaultGenres();
        } else {
            $this->publishDefaultGenres();
        }
    }

    /**
     * Create default genres if they don't exist.
     *
     * @return void
     */
    private function createDefaultGenres()
    {
        $defaultGenres = ['Fantasy', 'Science Fiction', 'Mystery', 'Thriller', 'Romance', 'Historical Fiction', 'Biography'. 'Autobiography', 'Non-Fiction', 'Young Adult', 'Children\'s Literature', 'Classic Literature', 'Poetry', 'Graphic Novels', 'Comics'];


        foreach ($defaultGenres as $genre) {
            Genre::firstOrCreate(['name' => $genre]);
        }
    }

    /**
     * Publish default genres.
     *
     * @return void
     */
    private function publishDefaultGenres()
    {
        // Make default genres available to all views
        $genres = Genre::all();
        View::share('defaultGenres', $genres);
    }
}
