<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MasaPensiun extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['judul'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file_masa_pensiun')
             ->acceptsMimeTypes(['application/pdf']);
    }
}
