<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalEkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwalData = [
            'Pramuka' => ['hari' => 'jumat', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lokasi' => 'Lapangan Utama'],
            'Futsal' => ['hari' => 'sabtu', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lokasi' => 'Lapangan VND'],
            'Basket' => ['hari' => 'rabu', 'jam_mulai' => '15:30:00', 'jam_selesai' => '17:30:00', 'lokasi' => 'Lapangan Basket'],
            'PMR' => ['hari' => 'kamis', 'jam_mulai' => '15:00:00', 'jam_selesai' => '16:30:00', 'lokasi' => 'UKS'],
            'Voli' => ['hari' => 'sabtu', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'lokasi' => 'Lapangan Voli'],
            'Paskibra' => ['hari' => 'senin', 'jam_mulai' => '15:30:00', 'jam_selesai' => '17:00:00', 'lokasi' => 'Lapangan Utama'],
            'Rohis' => ['hari' => 'jumat', 'jam_mulai' => '13:30:00', 'jam_selesai' => '15:00:00', 'lokasi' => 'Masjid Sekolah'],
            'Seni Musik' => ['hari' => 'rabu', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lokasi' => 'Aula Sekolah'],
            'Taekwondo' => ['hari' => 'kamis', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lokasi' => 'Aula Sekolah'],
        ];

        foreach ($jadwalData as $namaEkskul => $j) {
            $ekskul = DB::table('ekstrakurikuler')->where('nama', $namaEkskul)->first();
            
            if ($ekskul) {
                DB::table('jadwal_ekskul')->insert([
                    'ekskul_id' => $ekskul->id,
                    'hari' => $j['hari'],
                    'jam_mulai' => $j['jam_mulai'],
                    'jam_selesai' => $j['jam_selesai'],
                    'lokasi' => $j['lokasi'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
