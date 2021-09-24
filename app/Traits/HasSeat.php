<?php


namespace App\Traits;


use App\Models\Seat;

trait HasSeat
{
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
