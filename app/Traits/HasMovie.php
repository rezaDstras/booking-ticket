<?php


namespace App\Traits;


use App\Models\Movie;

trait HasMovie
{
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
