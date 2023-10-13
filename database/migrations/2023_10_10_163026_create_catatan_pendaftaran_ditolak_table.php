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
        Schema::create('catatan_pendaftaran_ditolak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id');
            $table->text('isi_catatan');
            $table->date('tanggal_ditolak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_pendaftaran_ditolak');
    }
};
