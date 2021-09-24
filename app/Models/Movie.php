<?php

namespace App\Models;

use App\Traits\HasManyTickets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory ,HasManyTickets ;



    //Getting Occupied Seat
    public static function occupiedSeat($id)
    {
        return self::where('id', $id)->with('tickets')->get()->pluck('tickets.*.seat_id');
    }

    //RelationShips

//    public function tickets()
//    {
//        return $this->hasMany(Ticket::class);
//    }

}
