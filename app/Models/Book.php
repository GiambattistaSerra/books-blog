<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
