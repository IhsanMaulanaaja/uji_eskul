<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)->nullable()->after('keterangan');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            $table->float('accuracy')->nullable()->after('longitude')->comment('Akurasi GPS dalam meter');
            $table->timestamp('gps_timestamp')->nullable()->after('accuracy')->comment('Waktu capture GPS');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude', 'accuracy', 'gps_timestamp']);
        });
    }
};
