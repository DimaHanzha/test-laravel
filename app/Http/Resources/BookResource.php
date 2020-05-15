<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BookResource
 */
class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->title,
            'created_at' => $this->created_at,
            'update_at' => $this->updated_at,
            'authors' => AuthorResource::collection($this->authors),
        ];
    }
}
