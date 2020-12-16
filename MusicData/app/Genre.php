<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['genre_name'];
    protected $table = 'genre';

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
