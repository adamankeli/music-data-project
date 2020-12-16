<?php

namespace App\Imports;

use App\Album;
use App\Artist;
use App\Genre;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMusic implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            
            $artist =
            Artist::create([
                'artist_name' => $row['artist']
            ]);
            $genre =
            Genre::create([
                'genre_name' => $row['genre']
            ]);

            Album::create([
                'sku' => $row['sku'],
                'album_name' => $row['album'],
                'tags' => $row['tags'],
                'price' => $row['price'],
                'artist_id' => $artist->id,
                'genre_id' => $genre->id,
            ]);
        }
    }


    public function startRow(): int
    {
        return 2;
    }
}
