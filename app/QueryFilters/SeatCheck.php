<?php


namespace App\QueryFilters;


use App\Http\Repositories\TicketRepository;
use App\Models\Ticket;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class SeatCheck
{
    public function handle($request ,closure $next)
    {
        $occupiedSet=Ticket::where([
            'seat_id'  =>$request['seat_id'],
            'movie_id' =>$request['movie_id']
        ])->count();

        if ($occupiedSet > 0) {
            return response('you can not book it.This seat has already been booked!!',Response::HTTP_FORBIDDEN);
        }
        $builder=$next($request);
        $ticket= resolve(TicketRepository::class)->storeTicket($request);
        return response([
            'ticket' =>$ticket,
            'message'=>'create new ticket successfully'
        ]);

    }
}
