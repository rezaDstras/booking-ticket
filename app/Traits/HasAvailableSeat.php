<?php


namespace App\Traits;


use App\Models\Ticket;

trait HasAvailableSeat
{
    public static function checkSeat($request)
    {
        $occupiedSet = Ticket::where([
            'seat_id' => $request['seat_id'],
            'movie_id' => $request['movie_id']
        ])->count();

        if ($occupiedSet > 0) {
            return response([
                'message' => 'you can not book it.This seat has already been booked'
            ]);
        }
    }
}
