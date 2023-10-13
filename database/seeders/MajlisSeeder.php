<?php

namespace Database\Seeders;

use App\Models\Majlis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajlisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majlis_pusat = Majlis::insert([
            [
                'kantor_id' => '1',
                'nama_majlis' => 'Majlis Pusat 1'
            ],
            [
                'kantor_id' => '1',
                'nama_majlis' => 'Majlis Pusat 2'
            ],
            [
                'kantor_id' => '1',
                'nama_majlis' => 'Majlis Pusat 3'
            ],
        ]);

        $majlis_teluknaga = Majlis::insert([
            [
                'kantor_id' => '3',
                'nama_majlis' => 'Majlis Pusat 1'
            ],
            [
                'kantor_id' => '3',
                'nama_majlis' => 'Majlis Pusat 2'
            ],
            [
                'kantor_id' => '3',
                'nama_majlis' => 'Majlis Pusat 3'
            ],
        ]);
    }
}
