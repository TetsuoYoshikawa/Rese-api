<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function get()
    {
        $user = User::get();
        return response()->json([
            "message" => 'OK',
            'data' => $user
        ], 200);
    }
}
