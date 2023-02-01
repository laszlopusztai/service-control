<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceSheetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tags' => TagRecource::collection($this->tags),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
