<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title', 'time', 'rating', 'genre', 'director', 'casting', 'synopsis', 'released', 'photo',
    ];
}