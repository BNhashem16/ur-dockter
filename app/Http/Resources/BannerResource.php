<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image_url' => $this->image_url,
            'stats' => $this->stats,
            'action_text' => $this->action_text,
            'action_url' => $this->action_url,
            'sort_order' => $this->sort_order,
        ];
    }
}
