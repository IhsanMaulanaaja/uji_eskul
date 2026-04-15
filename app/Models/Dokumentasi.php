<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $guarded = ['id'];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'lomba_id');
    }

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'ekstrakurikuler_id');
    }

    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('images/no-image.png');
        }

        if (Storage::disk('public')->exists($this->foto)) {
            return Storage::disk('public')->url($this->foto);
        }

        return asset('images/no-image.png');
    }
}
