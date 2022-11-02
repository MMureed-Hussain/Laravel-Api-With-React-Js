<?php

namespace App\Http\Resources;

use App\Http\Resources\CardResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ListtResource;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
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
            'title' => $this->title,
            'background' => $this->background,
            'background_type' => $this->background_type,
            'created_at'=> $this->created_at,
            'user' => new UserResource($this->user),
            // 'card' => CardResource::collection($this->cards),
            // 'listt' => ListtResource::collection($this->listts),
            // 'comment' => CommentResource::collection($this->comments),

        ];
    }
}
