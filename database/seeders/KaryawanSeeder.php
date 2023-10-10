<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Karyawan Kantor Pusat
        $admin_pusat = Karyawan::create([
            'no_induk_karyawan' => 'MSI1001',
            'kantor_id' => '1',
            'nama_lengkap' => 'Admin',
            'email' => 'admin.pusat@example.com',
            'no_telepone' => '083874966186',
            'kota_id' => '246',
            'tanggal_lahir' => '1999-06-16',
            'is_aktif' => true,
            'role' => 'Admin',
            'password' => Hash::make('password'),
        ]);

        // $kasie_pembiayaan_pusat = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI1002',
        //     'kantor_id' => '1',
        //     'nama_lengkap' => 'Kasie Pembiayaan',
        //     'email' => 'kasie.pembiayaan.pusat@example.com',
        //     'no_telepone' => '083874966187',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Kasie Pembiayaan',
        //     'password' => Hash::make('password'),
        // ]);

        // $kasie_keuangan_pusat = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI1003',
        //     'kantor_id' => '1',
        //     'nama_lengkap' => 'Kasie Keuangan',
        //     'email' => 'kasie.keuangan.pusat@example.com',
        //     'no_telepone' => '083874966188',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Kasie Keuangan',
        //     'password' => Hash::make('password'),
        // ]);

        // $staff_lapangan_pusat = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI1004',
        //     'kantor_id' => '1',
        //     'nama_lengkap' => 'Staff Lapangan',
        //     'email' => 'staff.lapangan.pusat@example.com',
        //     'no_telepone' => '083874966189',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Staff Lapangan',
        //     'password' => Hash::make('password'),
        // ]);

        // // Karyawan Kantor Teluknaga
        // $admin_teluknaga = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI3001',
        //     'kantor_id' => '3',
        //     'nama_lengkap' => 'Admin',
        //     'email' => 'admin.teluknaga@example.com',
        //     'no_telepone' => '083874966186',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Admin',
        //     'password' => Hash::make('password'),
        // ]);

        // $kasie_pembiayaan_teluknaga = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI3002',
        //     'kantor_id' => '3',
        //     'nama_lengkap' => 'Kasie Pembiayaan',
        //     'email' => 'kasie.pembiayaan.teluknaga@example.com',
        //     'no_telepone' => '083874966187',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Kasie Pembiayaan',
        //     'password' => Hash::make('password'),
        // ]);

        // $kasie_keuangan_teluknaga = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI3003',
        //     'kantor_id' => '3',
        //     'nama_lengkap' => 'Kasie Keuangan',
        //     'email' => 'kasie.keuangan.teluknaga@example.com',
        //     'no_telepone' => '083874966188',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Kasie Keuangan',
        //     'password' => Hash::make('password'),
        // ]);

        // $staff_lapangan_teluknaga = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI3004',
        //     'kantor_id' => '3',
        //     'nama_lengkap' => 'Staff Lapangan',
        //     'email' => 'staff.lapangan.teluknaga@example.com',
        //     'no_telepone' => '083874966189',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Staff Lapangan',
        //     'password' => Hash::make('password'),
        // ]);

        // // Karyawan Kantor Kamiri
        // $admin_kemiri = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI7001',
        //     'kantor_id' => '7',
        //     'nama_lengkap' => 'Admin',
        //     'email' => 'admin.kemiri@example.com',
        //     'no_telepone' => '083874966186',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Admin',
        //     'password' => Hash::make('password'),
        // ]);

        // $kasie_pembiayaan_kemiri = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI7002',
        //     'kantor_id' => '7',
        //     'nama_lengkap' => 'Kasie Pembiayaan',
        //     'email' => 'kasie.pembiayaan.kemiri@example.com',
        //     'no_telepone' => '083874966187',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Kasie Pembiayaan',
        //     'password' => Hash::make('password'),
        // ]);

        // $kasie_keuangan_kemiri = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI7003',
        //     'kantor_id' => '7',
        //     'nama_lengkap' => 'Kasie Keuangan',
        //     'email' => 'kasie.keuangan.kemiri@example.com',
        //     'no_telepone' => '083874966188',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Kasie Keuangan',
        //     'password' => Hash::make('password'),
        // ]);

        // $staff_lapangan_kemiri = Karyawan::create([
        //     'no_induk_karyawan' => 'MSI7004',
        //     'kantor_id' => '7',
        //     'nama_lengkap' => 'Staff Lapangan',
        //     'email' => 'staff.lapangan.kemiri@example.com',
        //     'no_telepone' => '083874966189',
        //     'kota_id' => '246',
        //     'tanggal_lahir' => '1999-06-16',
        //     'is_aktif' => true,
        //     'role' => 'Staff Lapangan',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
