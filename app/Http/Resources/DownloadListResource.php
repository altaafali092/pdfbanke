<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DownloadListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'title'=>$this->title,
            'files'=>$this->files,
            'slug'=>$this->slug,
            'download_category_id'=>$this->download_category_id,
            'publisher'=>$this->publisher,
            'publisher_date'=>$this->publisher_date,
            'status'=>$this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
