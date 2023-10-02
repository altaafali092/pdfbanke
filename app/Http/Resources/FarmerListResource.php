<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FarmerListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'slug'=>$this->slug,
            'farmer_category_id'=>$this->farmer_category_id,
            'publisher'=>$this->publisher,
            'publish_date'=>$this->publish_date,
            'status'=>$this->status,
            'files'=>$this->files,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
