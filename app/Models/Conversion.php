<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Conversion extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'type',
        'columns',
        'f_header_row',
        'f_header_row_wr',
    ];

    protected $casts = [
        'columns' => 'array',
        'f_header_row' => 'boolean',
        'f_header_row_wr' => 'boolean',
    ];

    public function getFile(): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
    {
        return $this->getFirstMedia();
    }
}
