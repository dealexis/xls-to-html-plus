<?php

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'filename' => $this->file_name,
            'url' => $this->original_url,
            'size' => $this->size,
        ];
    }
}
