<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\TicketRepository;
use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Seat;
use App\Models\Ticket;
use App\QueryFilters\SeatCheck;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(TicketRequest $request)
    {
        /*
       |--------------------------------------------------------------------------
       | Checking seat Availability
       |--------------------------------------------------------------------------
       | using HasSeatStatus Trait
       */

        $status = Ticket::seatStatus($request);
        if ($status > 0) {
            return response()->json([
                'message' => 'you can not book it.This seat has already been booked'
            ],Response::HTTP_FORBIDDEN);
        }
        /*
        |--------------------------------------------------------------------------
        | Using TicketRepository to Refactoring Store Ticket
        |--------------------------------------------------------------------------
        */

        $ticket = resolve(TicketRepository::class)->storeTicket($request);
        return new TicketResource($ticket);

        /*
        |--------------------------------------------------------------------------
        | USING PIPELINE FOR FILTER AVAILABLE SEATS
        |--------------------------------------------------------------------------
        |
               $ticket = app(\Illuminate\Pipeline\Pipeline::class)
                    ->send($request)
                    ->through([
                        SeatCheck::class
                    ])
                    ->thenReturn();
                return response($ticket);
        */
    }

}
