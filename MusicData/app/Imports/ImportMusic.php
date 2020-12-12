<?php

namespace App\Imports;

use App\Music;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMusic implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    
        return new Music([
            'sku' => $row['sku'],
            'album' => $row['album'],
            'artist' => $row['artist'],
            'genre' => $row['genre'],
            'tags' => $row['tags'],
            'price' => $row['price']
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
