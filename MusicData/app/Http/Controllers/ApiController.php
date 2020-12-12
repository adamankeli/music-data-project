<?php

namespace App\Http\Controllers;

use Session;
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
        if (Music::where('sku',$id)->exists()){
            $music = Music::where('sku', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($music,200);
        }else{
            return response()->json([
                "message" => "Music Record not found"
            ], 404);
        }
    }

    public function updateMusic(Request $request, $id)
    {
        if (Music::where('sku', $id)->exists()) {
            $music = Music::find($id);
            $music->album = is_null($request->album) ? $music->album : $request->album;
            $music->artist = is_null($request->artist) ? $music->artist : $request->artist;
            $music->genre = is_null($request->genre) ? $music->genre : $request->genre;
            $music->tags= is_null($request->tags) ? $music->tags : $request->tags;
            $music->price = is_null($request->price) ? $music->price : $request->price;
            $music->save();

            return response()->json([
                "message" => "Music records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Music Record Not Found"
            ], 404);
        }
    }

    public function deleteMusic($id)
    {
        //use to delete music record
        if (Music::where('sku', $id)->exists()) {
            $music = Music::find($id);
            $music->delete();

            return response()->json([
                "message" => "Music record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Music record not found"
            ], 404);
        }
    }

}
