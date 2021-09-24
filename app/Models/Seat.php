<?php

namespace App\Models;

use App\Traits\HasManyTickets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory ,HasManyTickets;

    public $timestamps = false;

    public static function OccupiedSeatNumber()
    {
        return self::where('total','>=',1)->orderBy('id','asc')->get();
    }

    //RelationShips
//    public function tickets()
//    {
//        return $this->hasMany(Ticket::class);
//    }



}
