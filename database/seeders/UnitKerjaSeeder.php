<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['KodeUnit' => 'VHKM', 'UnitKerja' => 'Legal Group'],
            ['KodeUnit' => 'VAKU', 'UnitKerja' => 'Accounting And Finance Division'],
            ['KodeUnit' => 'VTSI', 'UnitKerja' => 'Technology And Information System Division'],
            ['KodeUnit' => 'VBRM', 'UnitKerja' => 'Retail And Micro Business Division'],
            ['KodeUnit' => 'VMNC', 'UnitKerja' => 'Divisi Marketing Non Captive'],
            ['KodeUnit' => 'VTAP', 'UnitKerja' => 'Divisi Treaty'],
            ['KodeUnit' => 'VSKAI', 'UnitKerja' => 'Internal Audit Division'],
            ['KodeUnit' => 'VRNT', 'UnitKerja' => 'Corporate Planning And Strategy Division'],
            ['KodeUnit' => 'VSDM', 'UnitKerja' => 'Human Capital Division'],
            ['KodeUnit' => 'VLGS', 'UnitKerja' => 'Logistic Division'],
            ['KodeUnit' => 'VUWR', 'UnitKerja' => 'Underwriting Division'],
            ['KodeUnit' => 'VADT', 'UnitKerja' => 'Divisi Administrasi Teknik'],
            ['KodeUnit' => 'VKLM', 'UnitKerja' => 'Claim Division'],
            ['KodeUnit' => 'VJLO', 'UnitKerja' => 'Corporate Transformation and Change Management Desk'],
            ['KodeUnit' => 'VSKP', 'UnitKerja' => 'Corporate Secretary Division'],
            ['KodeUnit' => 'CSBY', 'UnitKerja' => 'Surabaya'],
            ['KodeUnit' => 'CBDG', 'UnitKerja' => 'Bandung'],
            ['KodeUnit' => 'CSRG', 'UnitKerja' => 'Semarang'],
            ['KodeUnit' => 'CJK2', 'UnitKerja' => 'Jakarta 2'],
            ['KodeUnit' => 'CYGY', 'UnitKerja' => 'Yogyakarta'],
            ['KodeUnit' => 'CJK1', 'UnitKerja' => 'Jakarta 1'],
            ['KodeUnit' => 'CMDN', 'UnitKerja' => 'Medan'],
            ['KodeUnit' => 'VTMP', 'UnitKerja' => 'Treaty And Portofolio Management Division'],
            ['KodeUnit' => 'CMKS', 'UnitKerja' => 'Makassar'],
            ['KodeUnit' => 'CPLB', 'UnitKerja' => 'Palembang'],
            ['KodeUnit' => 'CSYRJ', 'UnitKerja' => 'Cabang Syariah Jakarta'],
            ['KodeUnit' => 'CPKB', 'UnitKerja' => 'Pekanbaru'],
            ['KodeUnit' => 'CBLP', 'UnitKerja' => 'Balikpapan'],
            ['KodeUnit' => 'CDPS', 'UnitKerja' => 'Denpasar'],
            ['KodeUnit' => 'CMLG', 'UnitKerja' => 'Malang'],
            ['KodeUnit' => 'MRC', 'UnitKerja' => 'MRO Cirebon'],
            ['KodeUnit' => 'MRS', 'UnitKerja' => 'MRO Solo'],
            ['KodeUnit' => 'CACH', 'UnitKerja' => 'Aceh'],
            ['KodeUnit' => 'CLMP', 'UnitKerja' => 'Lampung'],
            ['KodeUnit' => 'CPDG', 'UnitKerja' => 'Padang'],
            ['KodeUnit' => 'CBJM', 'UnitKerja' => 'Banjarmasin'],
            ['KodeUnit' => 'CMND', 'UnitKerja' => 'Manado'],
            ['KodeUnit' => 'VAKTR', 'UnitKerja' => 'Actuary Group'],
            ['KodeUnit' => 'MRB', 'UnitKerja' => 'MRO Batam'],
            ['KodeUnit' => 'CJPR', 'UnitKerja' => 'Jayapura'],
            ['KodeUnit' => 'CJK3', 'UnitKerja' => 'Jakarta 3'],
            ['KodeUnit' => 'MSBG', 'UnitKerja' => 'ROS Bandung'],
            ['KodeUnit' => 'MSBY', 'UnitKerja' => 'ROS Surabaya'],
            ['KodeUnit' => 'CKCU', 'UnitKerja' => 'KCU'],
            ['KodeUnit' => 'MRP', 'UnitKerja' => 'MRO Pontianak'],
            ['KodeUnit' => 'MPP', 'UnitKerja' => 'MRO Pare Pare'],
            ['KodeUnit' => 'MRJ', 'UnitKerja' => 'MRO Jember'],
            ['KodeUnit' => 'MRK', 'UnitKerja' => 'MRO Kediri'],
            ['KodeUnit' => 'VMRK', 'UnitKerja' => 'Compliance And Risk Management Division'],
            ['KodeUnit' => 'CSYRA', 'UnitKerja' => 'Cabang Syariah Aceh'],
            ['KodeUnit' => 'VDKPB', 'UnitKerja' => 'Development & Operational Business Division'],
            ['KodeUnit' => 'VDPC', 'UnitKerja' => 'Divisi Pembinaan Cabang 2'],
            ['KodeUnit' => 'MRG', 'UnitKerja' => 'MRO Tegal'],
            ['KodeUnit' => 'MTM', 'UnitKerja' => 'MRO Tasikmalaya'],
            ['KodeUnit' => 'VBK', 'UnitKerja' => 'Wholesale Business Division'],
            ['KodeUnit' => 'CKCC', 'UnitKerja' => 'Kantor Cabang'],
            ['KodeUnit' => 'MPO', 'UnitKerja' => 'MRO Purwokerto'],
            ['KodeUnit' => 'MLN', 'UnitKerja' => 'MRO Lamongan'],
            ['KodeUnit' => 'MBKL', 'UnitKerja' => 'MRO Bengkulu'],
            ['KodeUnit' => 'VDGT', 'UnitKerja' => 'Digital Business Division'],
            ['KodeUnit' => 'CSMG', 'UnitKerja' => 'Semanggi'],
            ['KodeUnit' => 'VDSA', 'UnitKerja' => 'Syariah Division'],
            ['KodeUnit' => 'MJMB', 'UnitKerja' => 'MRO Jambi'],
            ['KodeUnit' => 'MRT', 'UnitKerja' => 'MRO Pati'],
            ['KodeUnit' => 'VKP', 'UnitKerja' => 'Kantor Pusat'],
            ['KodeUnit' => 'MBKS', 'UnitKerja' => 'MRO Bekasi'],
            ['KodeUnit' => 'MBGR', 'UnitKerja' => 'MRO Bogor'],
            ['KodeUnit' => 'MSRNG', 'UnitKerja' => 'MRO Sorong'],
            ['KodeUnit' => 'VCNTR', 'UnitKerja' => 'Central Regional Office'],
            ['KodeUnit' => 'VWEST', 'UnitKerja' => 'West Regional Office'],
            ['KodeUnit' => 'VDBP', 'UnitKerja' => 'Digital Business Division And BDP Desk'],
            ['KodeUnit' => 'KMR', 'UnitKerja' => 'Divisi Kepatuhan dan Manajemen Risiko'],
            ['KodeUnit' => 'MNC1', 'UnitKerja' => 'Divisi Bisnis II'],
            ['KodeUnit' => 'VDME', 'UnitKerja' => 'Desk Monitoring Evaluasi Bisnis'],
            ['KodeUnit' => 'MKD', 'UnitKerja' => 'MRO Kendari'],
            ['KodeUnit' => 'MMTRM', 'UnitKerja' => 'MRO Mataram'],
            ['KodeUnit' => 'VDBDP', 'UnitKerja' => 'Digital Business Division'],
            ['KodeUnit' => 'VEAST', 'UnitKerja' => 'East Regional Office'],
            ['KodeUnit' => 'VSCRD', 'UnitKerja' => 'Subrogation and Claim Recovery Desk'],
            ['KodeUnit' => 'VTEAM', 'UnitKerja' => 'Transformation Team'],
            ['KodeUnit' => 'VRSC', 'UnitKerja' => 'Reinsurance Division'],
            ['KodeUnit' => 'VPTO', 'UnitKerja' => 'Policy And Technical Operational Division'],
        ];

        // Insert data ke tabel cabang
        DB::table('ms_unitkerja')->insert($data);
    }
}
