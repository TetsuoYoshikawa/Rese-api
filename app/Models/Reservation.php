<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
