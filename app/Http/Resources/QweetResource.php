<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QweetResource extends JsonResource
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
            'type' => $this->type,
            'original_qweet' => QweetResource::make($this->originalQweet),
            'body' => $this->body,
            'user' => UserResource::make($this->user),
            'created_at' => $this->created_at->timestamp
        ];
    }
}
