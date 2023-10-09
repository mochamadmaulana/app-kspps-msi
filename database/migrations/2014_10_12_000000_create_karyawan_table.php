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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk_karyawan')->unique();
            $table->foreignId('kantor_id');
            $table->string('nama_lengkap');
            $table->string('email')->nullable();
            $table->string('no_telepone',15);
            $table->foreignId('kota_id')->comment('Tempat Lahir');
            $table->date('tanggal_lahir');
            $table->boolean('is_aktif')->default(true);
            $table->enum('role',['Admin','Kasie Pembiayaan','Kasie Keuangan','Staff Lapangan']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            // $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
