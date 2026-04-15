<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update Futsal jadwal to Sabtu 15:00 - 17:00 at Lapangan VND
        $futsal = DB::table('ekstrakurikuler')->where('nama', 'Futsal')->first();
        
        if ($futsal) {
            DB::table('jadwal_ekskul')
                ->where('ekskul_id', $futsal->id)
                ->update([
                    'hari' => 'sabtu',
                    'jam_mulai' => '15:00:00',
                    'jam_selesai' => '17:00:00',
                    'lokasi' => 'Lapangan VND',
                    'updated_at' => now(),
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original
        $futsal = DB::table('ekstrakurikuler')->where('nama', 'Futsal')->first();
        
        if ($futsal) {
            DB::table('jadwal_ekskul')
                ->where('ekskul_id', $futsal->id)
                ->update([
                    'hari' => 'selasa',
                    'jam_mulai' => '16:00:00',
                    'jam_selesai' => '18:00:00',
                    'lokasi' => 'Lapangan Futsal',
                    'updated_at' => now(),
                ]);
        }
    }
};
