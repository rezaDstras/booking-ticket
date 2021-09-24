<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'movie_id'    => new MovieResource($this->movie),
            'seat_id'    => new SeatResource($this->seat),
            'user_id'    => new UserResource($this->user),
            'created_at' =>$this->created_at,
            'message'    =>'ticket created successfully'

        ];
    }
}
