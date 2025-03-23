<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LHKPN extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['judul', 'tanggal'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file_lhkpn')
             ->acceptsMimeTypes(['application/pdf']);
    }
}
