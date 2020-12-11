<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'music';

    protected $fillable = ['album', 'artist', 'genre', 'tags', 'price'];

    protected $primaryKey = 'sku';
}
