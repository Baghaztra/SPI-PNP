<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RealisasiAnggaran extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['judul'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file_realisasi_anggaran')
             ->acceptsMimeTypes(['application/pdf']);
    }
}
