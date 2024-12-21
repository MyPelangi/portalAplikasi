<?php

namespace Database\Seeders;

use App\Models\SyUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SyUser::create([
            'ID_SyUser' => 'NINUKE',
            'Name' => 'Ninuke Asri Wardani',
            'Password' => Hash::make('ninuke123'),
            'Type' => 'BR-UND-ASS. MGR',
            'Role' => 'UNDERWRITER',
            'Validation' => 'v*ex99Pu',
            'Expiry' => '2024-12-31 00:00:00.000',
            'LimitIn' => '0',
            'LimitOut' => '0',
            'CT' => '',
            'ExportOption' => '1',
            'BackDatedF' => '1',
            'BRANCH' => '205',
            'SEGMENT' => '',
            'MID' => '',
            'ImmediateF' => '1',
            'LockedF' => '0',
            'BLLocked' => '0',
            'Email' => 'ninuke@workbrins.ac.id',
            'Mobile' => '',
            'Password_Expiry' => '2024-05-22 00:00:00.000',
            'Owner' => 'UW/RI',
            'MenuID' => 'AllMENU',
            'AllowedF' => '1',
            'ShariaF' => '1',
            'Last_Opr' => 'YANTO',
            'Title' => 'PJ Supervisor Underwriter Kanca Semarang',
            'LOCATION' => '',
            'AROLE' => 'UNDERWRITER',
            'CCODE' => '15-DEMO',
            'ID_No' => '',
            'ID_Type' => '',
            'SignerImageID' => '0',
            'SignerName' => '',
            'SignerTitle' => '',
            'ISID' => 'NINUKE_SH',
            'ISIDF' => '0',
            'CDATE' => '2022-08-05 00:00:00.000',
            'CUserID' => 'YANTO',
        ]);
    }
}
