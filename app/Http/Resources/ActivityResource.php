<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\CardResource;
use App\Http\Resources\BoardResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'type' => $this->type,
            'message' => $this->message,
            'created_at'=> $this->created_at,
            'user' => new UserResource($this->user),
            // 'board' => BoardResource::collection($this->boards),
            // 'card' => CardResource::collection($this->cards),
            // 'card' => new CardResource($this->card),
            // 'board' => new BoardResource($this->board),
        ];
    }
}
