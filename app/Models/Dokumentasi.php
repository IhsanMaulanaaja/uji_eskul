<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $guarded = ['id'];
    protected $dates = ['tanggal', 'tanggal_juara'];
    protected $appends = ['fotoUrl'];

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

        // Use storage/public URL with /storage prefix
        return url('storage/' . $this->foto);
    }
}
