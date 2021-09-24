<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'title' => $this->title,
            'release year' =>$this->release_year,
            'play date' =>$this->play_date,
            'play time' =>$this->play_time,
            'ticket' => $this->whenLoaded(
                'tickets',
                function () {
                    return TicketResource::collection($this->tickets);
                }
            ),
        ];
    }
}
