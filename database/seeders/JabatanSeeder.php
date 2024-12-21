<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['ID_Jabatan' => '00', 'Nama_Jabatan' => 'Direksi'],
            ['ID_Jabatan' => '01', 'Nama_Jabatan' => 'Division Head'],
            ['ID_Jabatan' => '02', 'Nama_Jabatan' => 'Deputy Division Head'],
            ['ID_Jabatan' => '03', 'Nama_Jabatan' => 'Departement Head/Kepala Bidang'],
            ['ID_Jabatan' => '04', 'Nama_Jabatan' => 'Branch Manager (Pimpinan Cabang)'],
            ['ID_Jabatan' => '05', 'Nama_Jabatan' => 'Deputy Branch Manager (Wakil Pimpinan Cabang)'],
            ['ID_Jabatan' => '06', 'Nama_Jabatan' => 'Pegawai'],
        ];

        // Insert data ke tabel cabang
        DB::table('jabatan')->insert($data);
    }
}
