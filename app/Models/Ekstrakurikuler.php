<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikuler';
    protected $guarded = ['id'];

    public function pembina()
    {
        return $this->belongsTo(User::class, 'pembina_id');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalEkskul::class, 'ekskul_id');
    }

    public function anggota()
    {
        return $this->hasMany(AnggotaEkskul::class, 'ekskul_id');
    }
}
