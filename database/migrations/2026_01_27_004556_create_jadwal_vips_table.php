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
        Schema::create('jadwal_vips', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal');              // tanggal kegiatan
            $table->time('mulai');                // jam mulai
            $table->time('selesai');              // jam selesai

            $table->enum('media', [
                'Online',
                'Offline',
                'Hybrid'
            ]);

            $table->enum('tamu', [
                'Internal',
                'Eksternal'
            ]);

            $table->string('keterangan');          // deskripsi acara

            $table->enum('status', [
                'Terjadwal',
                'Dibatalkan'
            ])->default('Terjadwal');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_vips');
    }
};
