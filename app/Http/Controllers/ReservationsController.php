<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    public function get(Request $request)
    {
        $items = Reservation::where('user_id', $request->user_id)->with('restaurant.genre', 'restaurant.prefecture')->get();
        return response()->json([
            'data' => $items
        ], 200);
    }
    public function post(Request $request)
    {
        $param = [
            'user_id' => $request->user_id,
            'restaurant_id' => $request->restaurant_id,
            'date' => $request->date,
            'time' => $request->time,
            'number_reservation' => $request->number_reservation,
        ];
        DB::table('reservations')->insert($param);
        return response()->json([
            'message' => "Reservation successsfully",
            'data' => $param
        ], 200);
    }
    public function put(Request $request)
    {
        $param = [
            'date' => $request->date,
            'time' => $request->time,
            'number_reservation' => $request->number_reservation,
        ];
        $items = Reservation::where('id', $request->id)->where('user_id', $request->user_id)->where('restaurant_id', $request->restaurant_id)->update($param);
        return response()->json([
            'message' => "Reservation updated successsfully",
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        $items = Reservation::where('user_id', $request->user_id)->where('restaurant_id', $request->restaurant_id)->delete();
        if ($items) {
            return response()->json([
                'message' => 'Reservation deleted successsfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ]);
        }
    }
}
