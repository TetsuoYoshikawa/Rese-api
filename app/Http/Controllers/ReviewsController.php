<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    public function get(Request $request)
    {
        $items = Review::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }
    public function post(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "restaurant_id" => $request->restaurant_id,
            "review_content" => $request->review_content,
            "num_of_stars" => $request->num_of_stars,
        ];
        DB::table('reviews')->insert($param);
        return response()->json([
            'message' => 'Favotite created successfully',
            'data' => $param
        ], 200);
    }
    public function put(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "restaurant_id" => $request->restaurant_id,
            'review_content' => $request->reviwe_content,
            'num_of_stars' => $request->num_of_stars
        ];
        $datas = Review::where('id', $request->id)->where('user_id', $request->user_id)->update($param);
        return response()->json([
            'message' => 'Rewiews updataed successfully',
            'data' => $datas,
        ], 200);
    }


    public function delete(Request $request)
    {
        $items = Review::where('id', $request->id)->where('user_id', $request->user_id)->delete();
        if ($items) {
            return response()->json([
                'message' => 'Rewiews deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => "Not found"
            ], 404);
        }
    }
}
