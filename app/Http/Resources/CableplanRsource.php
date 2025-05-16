<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CableplanRsource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'planId' => $this->plan_id,
            'provider' => $this->provider,
            'price' => $this->price,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }
}
