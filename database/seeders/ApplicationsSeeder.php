<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Applications;

class ApplicationsSeeder extends Seeder
{
    public function run()
    {
        applications::create([
            'apnama' => 'ASURANSI UANG',
            'aplink' => 'asuransiuang/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'ASURANSI ASET',
            'aplink' => 'asuransiaset/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'A3KOL',
            'aplink' => 'a3kol/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'POLIS E-SIGN',
            'aplink' => 'polisesign/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'NEW A3KOL',
            'aplink' => 'a3kol2/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'ACTIVITY LOG',
            'aplink' => 'activitylog/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'MONITORING E-POLICY',
            'aplink' => 'monitoringepol/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'KUESIONER',
            'aplink' => 'kuesioner/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'KUPEDES RAKYAT',
            'aplink' => 'kupedesr/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'REPORTING',
            'aplink' => 'reporting/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'SIMSDM',
            'aplink' => 'simsdm/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'DEPOSITO',
            'aplink' => 'deposito/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'REGISTRASI SLIP',
            'aplink' => 'regisslip/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'ASURANSI UANG SYARIAH',
            'aplink' => 'aus/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'ASURANSI UANG BRIAGRO',
            'aplink' => 'aub/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'ASURANSI MIKRO',
            'aplink' => 'asmik/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'BRIGUNA',
            'aplink' => 'briguna/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'HADIAH SIMPEDES',
            'aplink' => 'hadiahsimpedes/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'PINANG',
            'aplink' => 'pinang/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'ASRAL',
            'aplink' => 'asral/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'A3KOL SYARIAH',
            'aplink' => 'a3kolsyariah/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'INQUERY POLIS',
            'aplink' => 'inquerypolis/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'BRIF',
            'aplink' => 'brif/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'MOIS CMS & PKM',
            'aplink' => 'mois/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'MONITORING PEJABAT',
            'aplink' => 'monitoringpejabat/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'E-LEARNING',
            'aplink' => 'elearning/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'APLIKASI CLAIM',
            'aplink' => 'apclaim/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'Briguna Kawan',
            'aplink' => 'brigunakawan/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'Brins Payment Gateway',
            'aplink' => 'bpg/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'Askred Kupedes Bangkit',
            'aplink' => 'askredkb/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'ASKREDAPP',
            'aplink' => 'askredapp/reck.php',
            'aptipe' => '2',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'BRIONE DASHBOARD',
            'aplink' => 'brione/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'KLAIM MPM PNM DASHBOARD',
            'aplink' => 'klaimmpmpnm/reck.php',
            'aptipe' => '2',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'REGISTER SPPA',
            'aplink' => 'registsppa/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'ASSET MANAGEMENT',
            'aplink' => 'assetmanagement/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'CLAIM PROGRESS',
            'aplink' => 'claimprogress/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'E-Confirm',
            'aplink' => 'econfirm/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'AKTUARIS',
            'aplink' => 'aktuaris/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'E-OFFICE',
            'aplink' => 'eoffice/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'Report EGM',
            'aplink' => 'reportegm/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'Corp-Apps',
            'aplink' => 'corpapps/reck.php',
            'aptipe' => '1',
            'permit' => ''
        ]);
        applications::create([
            'apnama' => 'BRINSAVE',
            'aplink' => 'brinsave/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'Booking Zoom Meeting',
            'aplink' => 'bookzoom/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'REASCOINS',
            'aplink' => 'reascoins/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'Monitoring UCL',
            'aplink' => 'monitorucl/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'PRODUCT CORNER',
            'aplink' => 'prodcorner/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'ReAccount RM',
            'aplink' => 'reaccountrm/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'BRINSPEDIA',
            'aplink' => 'brinspedia/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'MONBER',
            'aplink' => 'monber/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);
        applications::create([
            'apnama' => 'REGISTER SPPA v2',
            'aplink' => 'registersppa2/reck.php',
            'aptipe' => '1',
            'permit' => 'enabled'
        ]);

    }
}
