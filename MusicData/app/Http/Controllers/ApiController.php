<?php

namespace App\Http\Controllers;

use Session;
use App\Album;
use App\Artist;
use App\Genre;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllAlbum()
    {
        // use to get all Album records
        // $album = Album::get()->toJson(JSON_PRETTY_PRINT);
        // return response($album, 200);
        $rows  = Album::get();

        foreach ($rows as $row) {
            return response()->json([
                'sku' => $row['sku'],
                'album_name' => $row['album_name'],
                'artist' => $row['artist']['artist_name'],
                'genre' => $row['genre']['genre_name'], 
                'tags' => $row['tags'],
                'price' => $row['price']
            ],200);
        }
    }

    public function createAlbum(Request $request)
    {
        // use to create a album record 
        $artist =
            Artist::create([
                'artist_name' => $request->artist_name
            ]);
        $genre =
            Genre::create([
                'genre_name' => $request->genre_name
            ]);
            
        $album = new Album;
        $album->album_name = $request->album_name;
        $album->artist_id = $artist->id;
        $album->genre_id = $genre->id;
        $album->tags = $request->tags;
        $album->price = $request->price;
        $album->save();

        return response()->json([
            "message" => "Album record created Successfully"
        ], 201);
    }

    public function getAlbum($id)
    {
        // use to retrieve album record
        if (Album::where('sku',$id)->exists()){
            //$album = Album::where('sku', $id)->get()->toJson(JSON_PRETTY_PRINT);
            //return response($album,200);
            $rows  = Album:: where('sku', $id)->get();
            foreach ($rows as $row) {
                return response()->json([
                    'sku' => $row['sku'],
                    'album_name' => $row['album_name'],
                    'artist' => $row['artist']['artist_name'],
                    'genre' => $row['genre']['genre_name'],
                    'tags' => $row['tags'],
                    'price' => $row['price']
                ], 200);
            }
        }else{
            return response()->json([
                "message" => "Album Record not found"
            ], 404);
        }
    }

    public function updateAlbum(Request $request, $id)
    {
        if (Album::where('sku', $id)->exists()) {
            $album = Album::find($id);
            $album->album_name = is_null($request->album_name) ? $album->album_name : $request->album_name;
            $album->tags= is_null($request->tags) ? $album->tags : $request->tags;
            $album->price = is_null($request->price) ? $album->price : $request->price;
            $album->save();

            return response()->json([
                "message" => "Album records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Album Record Not Found"
            ], 404);
        }
    }

    public function deleteAlbum($id)
    {
        //use to delete album record
        if (Album::where('sku', $id)->exists()) {
            $album = Album::find($id);
            $album->delete();

            return response()->json([
                "message" => "Album record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Album record not found"
            ], 404);
        }
    }

}
