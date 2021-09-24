<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeatStatisticsResources;
use App\Models\Seat;

class SeatController extends Controller
{

    /**
     * Display Seat Statistics.
     *
     */
    public function seatStatistics()
    {
        /*
        |--------------------------------------------------------------------------
        | Returning Each Statistic Of Each Seat By SeatStatisticsResources
        |--------------------------------------------------------------------------
        | Defined Static Function of OccupiedSeatNumber In Seat Model
        */
        return SeatStatisticsResources::collection(Seat::OccupiedSeatNumber());
    }

}
