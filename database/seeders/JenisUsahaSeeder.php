<?php

namespace Database\Seeders;

use App\Models\JenisUsaha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisUsaha::insert([
            [
                'kode_usaha' => 'TN',
                'nama_usaha' => 'Tani'
            ],
            [
                'kode_usaha' => 'TNK',
                'nama_usaha' => 'Ternak'
            ],
            [
                'kode_usaha' => 'DhTN',
                'nama_usaha' => 'Dagang Hasil Pertanian'
            ],
            [
                'kode_usaha' => 'DhTNK',
                'nama_usaha' => 'Dagang Hasil Peternakan'
            ],
            [
                'kode_usaha' => 'NL',
                'nama_usaha' => 'Nelayan'
            ],
            [
                'kode_usaha' => 'Dhl',
                'nama_usaha' => 'Dagang Hasil Perikanan'
            ],
            [
                'kode_usaha' => 'DM',
                'nama_usaha' => 'Dagang Makanan'
            ],
            [
                'kode_usaha' => 'DbM',
                'nama_usaha' => 'Dagang Bukan Makanan'
            ],
            [
                'kode_usaha' => 'WR',
                'nama_usaha' => 'Warung'
            ],
            [
                'kode_usaha' => 'JT',
                'nama_usaha' => 'Jasa Transportasi'
            ],
            [
                'kode_usaha' => 'JP',
                'nama_usaha' => 'Jasa Perbengkelan'
            ],
            [
                'kode_usaha' => 'IRTK',
                'nama_usaha' => 'Industri Rumah Tangga dan Kerajinan'
            ],
            [
                'kode_usaha' => 'LL',
                'nama_usaha' => 'Lain-Lain'
            ],
        ]);
    }
}
