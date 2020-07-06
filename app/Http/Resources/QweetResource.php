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
            'parent_id' => $this->parent_id,
            'parent_ids' => $this->parents()->pluck('id'),
            'body' => $this->body,
            'user' => UserResource::make($this->user),
            'likes_count' => $this->likes->count(),
            'reqweets_count' => $this->reqweets->count(),
            'media' => new MediaCollection($this->media),
            'replies_count' => $this->replies->count(),
            'replying_to' => optional(optional($this->parentQweet)->user)->username,
            'replies' => new QweetCollection($this->replies),
            'entities' => new EntityCollection($this->entities),
            'created_at' => $this->created_at->timestamp
        ];
    }
}
