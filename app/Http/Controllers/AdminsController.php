<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminsController extends Controller
{
    public function getFavorite()
    {
        $favorite = Favorite::with('restaurant.genre', 'restaurant.prefecture', 'user')->get();
        return response()->json([
            "message" => 'OK',
            "data" => $favorite
        ], 200);
    }
    public function getReservation()
    {
        $reservation = Reservation::with('restaurant.genre', 'restaurant.prefecture', 'user')->get();
        return response()->json([
            "message" => 'OK',
            "data" => $reservation
        ], 200);
    }
    public function put(Request $request)
    {
        $param = [
            'name' => $request->name,
            'prefecture_id' => $request->prefecture_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
        ];
        $items = Restaurant::where('id', $request->id)->update($param);
        return response()->json([
            'message' => "OK",
            'data' => $items
        ], 200);
    }
    public function post(Request $request)
    {
        $param = [
            'name' => $request->name,
            'prefecture_id' => $request->prefecture_id,
            'genre_id' => $request->genre_id,
            'image_url' => $request->image_url,
            'description' => $request->description,
        ];
        DB::table('restaurants')->insert($param);
        return response()->json([
            'message' => "OK",
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        $items = Restaurant::where('id', $request->id)->delete();
        if ($items) {
            return response()->json([
                'message' => 'Restaurant deleted successsfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ]);
        }
    }
}
