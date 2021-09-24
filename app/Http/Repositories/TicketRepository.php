<?php


namespace App\Http\Repositories;


use App\Http\Requests\TicketRequest;
use App\Models\Seat;
use App\Models\Ticket;

class TicketRepository
{
    public function storeTicket($request)
    {
       $ticket = Ticket::create([
            'movie_id' => $request['movie_id'],
            'seat_id' => $request['seat_id'],
            'user_id' => auth()->id()
        ]);
       //Increase Number of Booked Mentioned Book
        Seat::whereId($request['seat_id'])->increment('total');
        return $ticket;

    }
}
