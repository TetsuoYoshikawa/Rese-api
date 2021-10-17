<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Prefecture;
use App\Models\Genre;

class FavoritesController extends Controller
{
    public function get(Request $request)
    {
        $favorites = Favorite::where('user_id', $request->user_id)->with('restaurant.genre', 'restaurant.prefecture')->get();
        return response()->json([
            'message' => 'OK',
            'data' => $favorites
        ], 200);
    }
    public function post(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "restaurant_id" => $request->restaurant_id,
        ];
        DB::table('favorites')->insert($param);
        return response()->json([
            'message' => 'Favotite created successfully',
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        $items = Favorite::where('user_id', $request->user_id)->where('restaurant_id', $request->restaurant_id)->delete();
        if ($items) {
            return response()->json([
                'message' => 'Favorite deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => "Not found"
            ], 404);
        }
    }
}
