<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangAplikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kd' => '00', 'nama_cabang' => 'Kantor Pusat', 'jenis' => 'Cabang'],
            ['kd' => '01', 'nama_cabang' => 'Mayestik', 'jenis' => 'Cabang'],
            ['kd' => '02', 'nama_cabang' => 'Surabaya', 'jenis' => 'Cabang'],
            ['kd' => '03', 'nama_cabang' => 'Bandung', 'jenis' => 'Cabang'],
            ['kd' => '04', 'nama_cabang' => 'Yogyakarta', 'jenis' => 'Cabang'],
            ['kd' => '05', 'nama_cabang' => 'Semarang', 'jenis' => 'Cabang'],
            ['kd' => '06', 'nama_cabang' => 'Rawamangun', 'jenis' => 'Cabang'],
            ['kd' => '07', 'nama_cabang' => 'Medan', 'jenis' => 'Cabang'],
            ['kd' => '08', 'nama_cabang' => 'Makassar', 'jenis' => 'Cabang'],
            ['kd' => '09', 'nama_cabang' => 'Palembang', 'jenis' => 'Cabang'],
            ['kd' => '10', 'nama_cabang' => 'PekanBaru', 'jenis' => 'Cabang'],
            ['kd' => '12', 'nama_cabang' => 'Syariah Jakarta', 'jenis' => 'Cabang'],
            ['kd' => '14', 'nama_cabang' => 'Balikpapan', 'jenis' => 'Cabang'],
            ['kd' => '16', 'nama_cabang' => 'Denpasar', 'jenis' => 'Cabang'],
            ['kd' => '17', 'nama_cabang' => 'Malang', 'jenis' => 'Cabang'],
            ['kd' => '18', 'nama_cabang' => 'Aceh', 'jenis' => 'MRO'],
            ['kd' => '19', 'nama_cabang' => 'Padang', 'jenis' => 'Cabang'],
            ['kd' => '20', 'nama_cabang' => 'Lampung', 'jenis' => 'MRO'],
            ['kd' => '21', 'nama_cabang' => 'Cirebon', 'jenis' => 'MRO'],
            ['kd' => '23', 'nama_cabang' => 'Banjarmasin', 'jenis' => 'MRO'],
            ['kd' => '24', 'nama_cabang' => 'Manado', 'jenis' => 'Cabang'],
            ['kd' => '25', 'nama_cabang' => 'Semanggi', 'jenis' => 'MRO'],
            ['kd' => '26', 'nama_cabang' => 'Batam', 'jenis' => 'MRO'],
            ['kd' => '27', 'nama_cabang' => 'Jayapura', 'jenis' => 'Cabang'],
            ['kd' => '28', 'nama_cabang' => 'BSD', 'jenis' => 'MRO'],
            ['kd' => '22', 'nama_cabang' => 'Solo', 'jenis' => 'MRO'],
            ['kd' => '29', 'nama_cabang' => 'ParePare', 'jenis' => 'MRO'],
            ['kd' => '32', 'nama_cabang' => 'Kediri', 'jenis' => 'MRO'],
            ['kd' => '31', 'nama_cabang' => 'Jember', 'jenis' => 'MRO'],
            ['kd' => '33', 'nama_cabang' => 'Pati', 'jenis' => 'MRO'],
            ['kd' => '30', 'nama_cabang' => 'Pontianak', 'jenis' => 'Cabang'],
            ['kd' => '36', 'nama_cabang' => 'Purwokerto', 'jenis' => 'MRO'],
            ['kd' => '38', 'nama_cabang' => 'Lamongan', 'jenis' => 'MRO'],
            ['kd' => '35', 'nama_cabang' => 'Tasikmalaya', 'jenis' => 'MRO'],
        ];

        // Insert data ke tabel cabang
        DB::table('cab_aplikasi')->insert($data);
    }
}
