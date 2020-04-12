<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QweetCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var QweetResource $collects
     */
    public $collects = QweetResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    /**
     * Get any additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'likes' => $this->likes($request)
            ]
        ];
    }

    /**
     * Return all liked qweets ids.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function likes($request)
    {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->likes()
            ->whereIn('qweet_id', $this->collection->pluck('id'))
            ->pluck('qweet_id')
            ->toArray();
    }
}
