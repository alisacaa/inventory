<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'year', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}