<?php

namespace App\Imports;

use App\Music;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMusic implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Music([
            'album' => @$row[0],
            'artist' => @$row[1],
            'genre' => @$row[2],
            'tags' => @$row[3],
            'price' => @$row[4]
        ]);
    }
}
