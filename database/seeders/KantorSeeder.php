<?php

namespace Database\Seeders;

use App\Models\Kantor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_kantor = [
            [
                'nama_kantor' => 'KANTOR PUSAT KSPPS MSI',
                'email' => 'info@kopsyahmsi.com',
                'no_telepone' => '02154232925',
                'is_pusat' => true,
                'alamat' => 'Grand Batavia Ruko Arcade Blok F No. 52 Jl. Raya Cadas-Kukun kel.Sindangsari Kec.Pasar Kemis Kab.Tangerang Prov.Banten Kode Pos 15560',
            ],
            [
                'nama_kantor' => 'RAJEG',
                'email' => 'kpcmsi001@kopsyahmsi.com',
                'no_telepone' => '082298227071',
                'is_pusat' => false,
                'alamat' => 'Kp. Sukabakti Rt/Rw. 008/004 Ds. Lembangsari Kec. Rajeg',
            ],
            [
                'nama_kantor' => 'TELUKNAGA',
                'email' => 'kpcmsi002@kopsyahmsi.com',
                'no_telepone' => '083896553559',
                'is_pusat' => false,
                'alamat' => 'Komplek Garuda, blok A1 No.31 RT/RW. 009/015',
            ],
            [
                'nama_kantor' => 'PAKUHAJI',
                'email' => 'kpcmsi003@kopsyahmsi.com',
                'no_telepone' => '02159470639',
                'is_pusat' => false,
                'alamat' => 'Jl. Kyai haji syahdulillah RT/RW. 003/003 Kel. Pakuhaji Kec. Pakuhaji',
            ],
            [
                'nama_kantor' => 'SUKADIRI',
                'email' => 'kpcmsi004@kopsyahmsi.com',
                'no_telepone' => '083890519905',
                'is_pusat' => false,
                'alamat' => 'Buaran Armaya RT/RW.021/004 Ds. Tegal Kunir Kidul Kec. Mauk',
            ],
            [
                'nama_kantor' => 'GUNUNG KALER',
                'email' => 'kpcmsi005@kopsyahmsi.com',
                'no_telepone' => '083897603112',
                'is_pusat' => false,
                'alamat' => 'Kp. Mekar Jaya RT/RW. 008/004 Ds. Cibetok Kec. Gunung Kaler.',
            ],
            [
                'nama_kantor' => 'KEMIRI',
                'email' => 'kpcmsi006@kopsyahmsi.com',
                'no_telepone' => '087883776656',
                'is_pusat' => false,
                'alamat' => 'Kp. Kemiri warakas Rt 003/001 Ds. kemiri kec. Kemiri kab. Tangerang',
            ],
            [
                'nama_kantor' => 'SUKAMULYA',
                'email' => 'kpcmsi007@kopsyahmsi.com',
                'no_telepone' => '083804946459',
                'is_pusat' => false,
                'alamat' => 'Kp. Tegal Anyar Ds. Sukamulya Kec. Sukamulya (Belakang Sting Pasal Ceplak)',
            ],
            [
                'nama_kantor' => 'MEKAR BARU',
                'email' => 'kpcmsi008@kopsyahmsi.com',
                'no_telepone' => '085715416647',
                'is_pusat' => false,
                'alamat' => 'Kp. Tegal Ds. Mekar Baru Kec. MEKAR BARU',
            ],
            [
                'nama_kantor' => 'SINDANG JAYA',
                'email' => 'kpcmsi009@kopsyahmsi.com',
                'no_telepone' => '083897603111',
                'is_pusat' => false,
                'alamat' => 'Kp.Sindang Jaya Ds.sindang Jaya Kec.sindang Jaya',
            ],
            [
                'nama_kantor' => 'CISOKA',
                'email' => 'kpcmsi010@kopsyahmsi.com',
                'no_telepone' => '083804946458',
                'is_pusat' => false,
                'alamat' => 'Kp. CISOKA Ds. CISOKA Kec. CISOKA',
            ],
            [
                'nama_kantor' => 'KERESEK',
                'email' => 'kpcmsi011@kopsyahmsi.com',
                'no_telepone' => '081314697612',
                'is_pusat' => false,
                'alamat' => 'Kp.KRESEK Ds.Kresek Kec. Kresek',
            ],
            [
                'nama_kantor' => 'TIGARAKSA',
                'email' => 'kpcmsi012@kopsyahmsi.com',
                'no_telepone' => '083804946457',
                'is_pusat' => false,
                'alamat' => 'Kp. TIGA RAKSA Ds. TIGARAKSA Kec. TIGARAKSA',
            ],
        ];
        for ($i=0; $i < count($data_kantor); $i++) {
            Kantor::create([
                'nama_kantor' => $data_kantor[$i]['nama_kantor'],
                'email' => $data_kantor[$i]['email'],
                'no_telepone' => $data_kantor[$i]['no_telepone'],
                'is_pusat' => $data_kantor[$i]['is_pusat'],
                'alamat' => $data_kantor[$i]['alamat'],
            ]);
        }
    }
}
