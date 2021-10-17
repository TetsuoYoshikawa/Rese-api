<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public static function index_stores($user_data)
    {
        $user_favorites = Favorite::where('user_id', $user_data->user_id);
        $restaurant = Restaurant::select('name', 'restaurants.id',  'prefecture_id', 'genre_id', 'image_url', 'user_favorites.user_id')->with('prefecture', 'genre')
            ->leftJoinSub($user_favorites, 'user_favorites', function ($join) {
                $join->on('restaurants.id', '=', 'user_favorites.restaurant_id');
            })
            ->get();
        return $restaurant;
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
