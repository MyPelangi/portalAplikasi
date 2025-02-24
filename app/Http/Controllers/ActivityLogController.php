<?php

namespace App\Http\Controllers;

use App\Models\ActivityLogs;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ActivityLogs::with('cabang');

            // Filter berdasarkan Start Date & End Date
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $query->whereBetween('created_at', [$request->start_date . " 00:00:00", $request->end_date . " 23:59:59"]);
            }

            // Filter berdasarkan Nama Pegawai
            if (!empty($request->nama_pegawai)) {
                $query->where('nm_pegawai', 'like', '%' . $request->nama_pegawai . '%');
            }

            // Filter berdasarkan Nama Cabang
            if (!empty($request->nama_cabang)) {
                $query->whereHas('cabang', function ($q) use ($request) {
                    $q->where('nama_cabang', 'like', '%' . $request->nama_cabang . '%');
                });
            }

            $data = $query->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id_user', function ($row) {
                    return $row->id_user;
                })
                ->addColumn('nip', function ($row) {
                    return $row->kd_pegawai;
                })
                ->addColumn('nama_pegawai', function ($row) {
                    return $row->nm_pegawai;
                })
                ->addColumn('kode_cabang', function ($row) {
                    return $row->kd_cabang ?? '-';
                })
                ->addColumn('cabang', function ($row) {
                    return $row->cabang->nama_cabang ?? '-';
                })
                ->addColumn('type', function ($row) {
                    return $row->type;
                })
                ->addColumn('ip_user', function ($row) {
                    return $row->ip_user;
                })
                ->addColumn('latitude', function ($row) {
                    return $row->latitude ?? '-';
                })
                ->addColumn('longitude', function ($row) {
                    return $row->longitude ?? '-';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d H:i:s');
                })
                ->make(true);
        }

        return view('admin/activityLog');
    }

    public function getMonitoringLog(){
        $datalogs = ActivityLogs::count();
        $datalogin = ActivityLogs::where('type', 'login')->count();
        $datalogout = ActivityLogs::where('type', 'logout')->count();

        // Contoh: Mengambil data dari database (misalnya data penjualan per bulan)
        $logins = ActivityLogs::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            // ->where('type', 'login') // Filter hanya aktivitas login
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Format data untuk Chart.js
        $labels = $logins->pluck('date'); // Tanggal login
        $values = $logins->pluck('total'); // Jumlah login per tanggal

        return view('admin.monitoringLog', compact('datalogs','datalogin','datalogout','labels', 'values'));
    }


}
