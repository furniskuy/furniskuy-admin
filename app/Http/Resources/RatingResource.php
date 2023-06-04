<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rating' => $this->rating,
            'id_user' => $this->id_user,
            'id_inventaris' => $this->id_inventaris,
            'review' => $this->review,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
