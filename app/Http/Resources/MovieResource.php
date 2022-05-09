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
        return $resource = [
            'id' => $this->id,
            'name' => $this->name,
            'moviedb_id' => $this->moviedb_id,
            'full_details' => json_decode($this->full_details),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'links' => [
                'self' => route('api.movie.show', $this->id),
            ],
        ];
    }
}
