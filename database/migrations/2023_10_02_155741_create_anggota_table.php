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
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran')->unique();
            $table->string('nama_lengkap');
            $table->string('nama_ibu_kandung');
            $table->string('no_identitas')->unique();
            $table->enum('jenis_identitas',['KTP','SIM']);
            $table->foreignId('majlis_id');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->foreignId('tempat_lahir_id');
            $table->date('tanggal_lahir');
            $table->foreignId('kantor_id');
            $table->foreignId('jenis_usaha_id');
            $table->enum('pendidikan_terakhir',['Tidak Bersekolah', 'SD', 'SMP', 'SMA', 'Diploma 3', 'Sarjana 1', 'Sarjana 2', 'Sarjana 3']);
            $table->enum('agama',['Islam','Hindu','Budha','Katolik','Protestan','Khonghucu']);
            $table->enum('status_pernikahan',['Belum Menikah','Nikah','Cerai','Janda/Duda']);
            $table->string('no_telepone',15);
            $table->text('alamat');
            $table->enum('metode_bayar_pendaftaran',['Cash','Transfer']);
            $table->enum('status_pendaftaran',['Pending','Ditolak','Diajukan Ulang','Diterima']);
            $table->boolean('is_aktif')->default(false);
            $table->string('foto_identitas');
            $table->string('foto_kk');
            $table->string('foto_usaha');
            $table->string('bukti_bayar_pendaftaran');
            $table->foreignId('id_penginput')->nullable();

            // $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
