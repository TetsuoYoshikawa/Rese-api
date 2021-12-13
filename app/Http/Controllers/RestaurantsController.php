<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use App\Models\Restaurant;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestaurantsController extends Controller
{
    public function get(Request $request)
    {
        $restaurant = Restaurant::with("prefecture", "genre")->get();
        $prefecture = Prefecture::get();
        $genre = Genre::get();
        $item = [
            "restaurant" => $restaurant,
            "prefecture" => $prefecture,
            "genre" => $genre,
        ];
        return response()->json([
            'message' => 'OK',
            'data' => $item
        ], 200);
    }
    public function getUser(Request $request)
    {
        $restaurant = Restaurant::with("prefecture", "genre")->with("favorites", function ($q) use ($request) {
            $q->where("user_id", $request->user_id);
        })->get();
        $prefecture = Prefecture::get();
        $genre = Genre::get();
        $item = [
            "restaurant" => $restaurant,
            "prefecture" => $prefecture,
            "genre" => $genre,
        ];
        return response()->json([
            'message' => 'OK',
            'data' => $item
        ], 200);
    }
    function getGenre()
    {
        $data = Genre::get();
        return response()->json([
            "message" => "OK",
            "data" => $data
        ], 200);
    }
    public function getPrefecture()
    {
        $data = Prefecture::get();
        return response()->json([
            "message" => "OK",
            "data" => $data
        ], 200);
    }
    public function getRestaurant(Request $request)
    {
        $items = Restaurant::where('id', $request->id)->with('prefecture', 'genre')->get();
        if ($items) {
            return response()->json([
                "message" => 'OK',
                "data" => $items
            ], 200);
        } else {
            return response()->json([
                "message" => "Not found"
            ], 404);
        }
    }
}
