<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kd_pegawai' => '479278',
            'nm_pegawai' => 'Ninuke Asri',
            'kd_divisi' => 'AKU',
            'kd_bidang' => 'AKT1',
            'kd_seksi' => 'AKT1A',
            'KodeUnit' => 'VSDM',
            'userCare' => 'NINUKE',
            'userCareSH' => 'NINUKE_SH',
            'type' => 'AKU-STAFF',
            'role' => '06',
            'usernamePegawai' => 'Ninuke',
            'pass_pegawai' => Hash::make('ninuke123'),
            'email_pegawai' => 'ninuke.asri@brins.co.id',
            'unit_kerja' => '',
            'status_p' => '1',
            'level_p' => '10',
            'kd_cabang' => '00',
            'id_useraplikasi' => '',
            'role_portal' => 'user',
            'status_reset' => '0',
            'status_login' => '0',
            'token_login' => '0',
        ]);
        User::create([
            'kd_pegawai' => '479279',
            'nm_pegawai' => 'Fauzi Sofyan',
            'kd_divisi' => '',
            'kd_bidang' => '',
            'kd_seksi' => '',
            'KodeUnit' => 'VTSI',
            'userCare' => 'NINUKE',
            'userCareSH' => 'NINUKE_SH',
            'type' => '',
            'role' => '06',
            'usernamePegawai' => 'Fauzi',
            'pass_pegawai' => Hash::make('fauzi123'),
            'email_pegawai' => 'fauzi.sofyan@brins.co.id',
            'unit_kerja' => '',
            'status_p' => '1',
            'level_p' => '10',
            'kd_cabang' => '00',
            'id_useraplikasi' => '',
            'role_portal' => 'user',
            'status_reset' => '0',
            'status_login' => '0',
            'token_login' => '0',
        ]);
        User::create([
            'kd_pegawai' => '479280',
            'nm_pegawai' => 'Pelangi Dwi Mawarni',
            'kd_divisi' => '',
            'kd_bidang' => '',
            'kd_seksi' => '',
            'KodeUnit' => 'VTSI',
            'userCare' => 'NINUKE',
            'userCareSH' => 'NINUKE_SH',
            'type' => '',
            'role' => '06',
            'usernamePegawai' => 'Pelangi',
            'pass_pegawai' => Hash::make('pelangi123'),
            'email_pegawai' => 'pelangi.dwimawarni@brins.co.id',
            'unit_kerja' => '',
            'status_p' => '1',
            'level_p' => '8',
            'kd_cabang' => '00',
            'id_useraplikasi' => '',
            'role_portal' => 'admin',
            'status_reset' => '0',
            'status_login' => '0',
            'token_login' => '0',
        ]);
    }
}
