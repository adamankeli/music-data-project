<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = ['album_name', 'tags', 'price', 'artist_id','genre_id'];
    protected $primaryKey = 'sku';
    protected $table = 'album';

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
