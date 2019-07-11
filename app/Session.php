<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'date', 'room_id', 'film_id','price','dimensions',
    ];
}
