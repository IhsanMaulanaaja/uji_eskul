<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumentasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dokumentasi')->insert([
            [
                'ekstrakurikuler_id' => 1,
                'foto' => 'dokumentasi/HZTSmuMw7mK7lzYGPhRdZl26UWzNeV5k2eRbiugd.webp',
                'nama_lomba' => 'WALIKOTA CUP',
                'keterangan' => 'Juara 2 Lomba Basket Walikota Cup',
                'tanggal' => '2024-12-24',
                'tanggal_juara' => '2024-12-24',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ekstrakurikuler_id' => 2,
                'foto' => 'dokumentasi/jslmYph5fp6wkZ8pehdeeHyHfkZUqMpUBmCVkMLC.png',
                'nama_lomba' => 'PSSI CUP',
                'keterangan' => 'Juara 1 Futsal Dalam Rangka PSSI Kota Bogor',
                'tanggal' => '2025-03-28',
                'tanggal_juara' => '2025-03-28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ekstrakurikuler_id' => 1,
                'foto' => 'dokumentasi/HZTSmuMw7mK7lzYGPhRdZl26UWzNeV5k2eRbiugd.webp',
                'nama_lomba' => 'BASKET PROVINCIAL',
                'keterangan' => 'Juara 1 kompetisi basket tingkat provinsi dengan kerja sama tim yang solid.',
                'tanggal' => '2025-02-15',
                'tanggal_juara' => '2025-02-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
