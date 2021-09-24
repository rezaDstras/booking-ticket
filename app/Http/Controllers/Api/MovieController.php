<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Http\Resources\SeatResource;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Ticket;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Returning All Movies By MovieResource
        |--------------------------------------------------------------------------
        */
        return MovieResource::collection(Movie::all());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id,Ticket $ticket,Seat $seat)
    {
        /*
        |--------------------------------------------------------------------------
        | Returning Available Seats For Selected Movie By SeatResource
        |--------------------------------------------------------------------------
        */
        $OccupiedSeat=$ticket->where('movie_id',$id)->pluck('seat_id');
        $availableSeat=$seat->whereNotIn('id',$OccupiedSeat)->get();
        return  SeatResource::collection($availableSeat);
    }
}
