<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class RealisasiPNBP extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['judul', 'tanggal'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file_realisasi_pnbp')
             ->acceptsMimeTypes(['application/pdf']);
    }
}
