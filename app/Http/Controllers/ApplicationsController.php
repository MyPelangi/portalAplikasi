<?php

namespace App\Http\Controllers;

use App\Models\applications;
use App\Http\Requests\StoreapplicationsRequest;
use App\Http\Requests\UpdateapplicationsRequest;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function internal()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login

        // Ambil parameter pencarian
        $search = request('search');

        // Query aplikasi internal dengan kondisi akses dan pencarian
        $internalApp = Applications::select('applications.*', 'akses_aplikasis.id_user as access_granted')
            ->leftJoin('akses_aplikasis', function ($join) use ($userId) {
                $join->on('applications.id', '=', 'akses_aplikasis.id_aplikasi')
                    ->where('akses_aplikasis.id_user', '=', $userId);
            })
            ->where('aptipe', 1) // Hanya aplikasi internal
            ->when($search, function ($query) use ($search) {
                $query->where('applications.apnama', 'like', '%' . $search . '%');
            })
            ->orderBy('apnama', 'asc')
            ->get()
            ->map(function ($app) {
                // Logika penentuan status permit menggunakan AND
                if ($app->permit === 'enabled' && $app->access_granted) {
                    $app->permit = 'enabled'; // Jika kedua kondisi terpenuhi
                } else {
                    $app->permit = 'disabled'; // Selain itu, selalu disabled
                }
                return $app;
            });

        // Jika hasil pencarian kosong
        if ($internalApp->isEmpty() && $search) {
            return back()->with('error', 'Aplikasi dengan tipe internal tidak ditemukan atau tidak sesuai.');
        }

        return view('home', compact('internalApp'));
    }

    public function eksternal()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login

        // Ambil parameter pencarian
        $search = request('search');

        // Query aplikasi eksternal dengan kondisi akses dan pencarian
        $eksternalApp = Applications::select('applications.*', 'akses_aplikasis.id_user as access_granted')
            ->leftJoin('akses_aplikasis', function ($join) use ($userId) {
                $join->on('applications.id', '=', 'akses_aplikasis.id_aplikasi')
                    ->where('akses_aplikasis.id_user', '=', $userId);
            })
            ->where('aptipe', 2) // Hanya aplikasi eksternal
            ->when($search, function ($query) use ($search) {
                $query->where('applications.apnama', 'like', '%' . $search . '%');
            })
            ->orderBy('apnama', 'asc')
            ->get()
            ->map(function ($app) {
                // Logika penentuan status permit menggunakan AND
                if ($app->permit === 'enabled' && $app->access_granted) {
                    $app->permit = 'enabled'; // Jika kedua kondisi terpenuhi
                } else {
                    $app->permit = 'disabled'; // Selain itu, selalu disabled
                }
                return $app;
            });

        // Jika hasil pencarian kosong
        if ($eksternalApp->isEmpty() && $search) {
            return back()->with('error', 'Aplikasi dengan tipe eksternal tidak ditemukan atau tidak sesuai.');
        }

        return view('eksternal', compact('eksternalApp'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreapplicationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreapplicationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\applications  $applications
     * @return \Illuminate\Http\Response
     */
    public function show(applications $applications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\applications  $applications
     * @return \Illuminate\Http\Response
     */
    public function edit(applications $applications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapplicationsRequest  $request
     * @param  \App\Models\applications  $applications
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapplicationsRequest $request, applications $applications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\applications  $applications
     * @return \Illuminate\Http\Response
     */
    public function destroy(applications $applications)
    {
        //
    }
}
