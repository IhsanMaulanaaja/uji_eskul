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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('ekskul_id')->constrained('ekstrakurikuler')->onDelete('cascade');
            $table->enum('nilai', ['A', 'B', 'C'])->default('B');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Agar satu siswa hanya punya satu nilai per ekskul
            $table->unique(['user_id', 'ekskul_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
