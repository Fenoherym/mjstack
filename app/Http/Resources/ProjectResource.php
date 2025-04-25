<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [            
            "name" => $this->name,
            "slug" => $this->slug,
            "description" => $this->description,
            "url" => $this->url,
            "repository" => $this->repository,
            "image" => $this->image,
            "stacks" => $this->stacks->map(function ($stack) {
                return [                   
                    "name" => $stack->name,
                ];
            }),
        ];
    }
}
