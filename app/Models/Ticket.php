<?php

namespace App\Models;

use App\Traits\HasMovie;
use App\Traits\HasSeat;
use App\Traits\HasSeatStatus;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use
        HasFactory ,
        HasSeat,
        HasUser,
        HasSeatStatus,
        HasMovie;

    protected $fillable = [
      'movie_id',
      'user_id',
      'seat_id'
    ];

    //RelationShips
//    public function movie()
//    {
//        return $this->belongsTo(Movie::class);
//    }
//    public function seat()
//    {
//        return $this->belongsTo(Seat::class);
//    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }



}
