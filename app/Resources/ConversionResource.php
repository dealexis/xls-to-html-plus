<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversionResource extends JsonResource
{
    public function toArray($request): array {
        return [
            'type' => $this->type,
            'created_at' => $this->created_at,
            'file' => FileResource::make($this->getFile()),
        ];
    }
}
