<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use App\Http\Resources\V1\CategoryResource;
use App\Http\Resources\V1\CategoryCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'content'=>$this->content,
            'slug'=>$this->slug,
            'image'=>$this->image,
            'created_at'=>$this->created_at->format('Y-m-d'),
            'category'=>new CategoryResource($this->category),
            'tags'=>new CategoryCollection($this->tags)
        ];
    }
}
