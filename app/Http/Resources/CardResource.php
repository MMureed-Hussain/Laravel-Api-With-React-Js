<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\ListtResource;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
            'description' => $this->description,
            'position' => $this->position,
            'created_at'=> $this->created_at,
            'listt' => new ListtResource($this->listt),
            // 'listt' => ListtResource::collection($this->listts),
            // 'comment' => CommentResource::collection($this->comments),
        ];
    }
}
