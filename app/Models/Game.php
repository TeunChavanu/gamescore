<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'description',
        'image_url',
        'release_year',
        'rating',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
