<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllMusic()
    {
        // use to get all Music records
        $music = Music::get()->toJson(JSON_PRETTY_PRINT);
        return response($music, 200);
        
    }

    public function createMusic(Request $request)
    {
        // use to create a music record 
        $music = new Music;
        $music->album = $request->album;
        $music->artist = $request->artist;
        $music->genre = $request->genre;
        $music->tags = $request->tags;
        $music->price = $request->price;
        $music->save();

        return response()->json([
            "message" => "Music record created Successfully"
        ], 201);
    }

    public function getMusic($id)
    {
        // use to retrieve music record
    }

    public function updateMusic(Request $request, $id)
    {
        // use to update music record
    }

    public function deleteMusic($id)
    {
        //use to delete music record
    }
}
