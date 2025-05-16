<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataPlanResource extends JsonResource
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
            'name' => $this->display_name,
            'title' => $this->title,
            'planId' => $this->plan_id,
            'subcategoryId' => $this->subcategory_id,
            'price' => $this->price,
            'category' => $this->category,
            'validity' => $this->validity,
            'network' => $this->network,
            'status' => $this->status,
        ];
    }
}
