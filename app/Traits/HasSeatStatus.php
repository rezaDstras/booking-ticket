<?php


namespace App\Traits;


use App\Models\Ticket;

trait HasSeatStatus
{
    public static function seatStatus($request)
    {
        return Ticket::where([
            'seat_id' => $request['seat_id'],
            'movie_id' => $request['movie_id']
        ])->count();

    }
}
