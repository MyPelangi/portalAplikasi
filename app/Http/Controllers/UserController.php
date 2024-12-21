<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\UserCare;
use App\Models\UnitKerja;
use App\Models\applications;
use Illuminate\Http\Request;
use App\Models\CabangAplikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // $search = $request->input('search'); // Ambil nilai pencarian dari query parameter

    // $data = User::query()
    //     ->when($search, function ($query, $search) {
    //         $query->where('nm_pegawai', 'like', '%' . $search . '%')
    //             ->orWhere('kd_pegawai', 'like', '%' . $search . '%');
    //     })
    //     ->orderBy('status_p', 'desc')
    //     ->get();

    // if ($request->ajax()) {
    //     $data = User::with('cabang')->get(); // Pastikan relasi cabang sudah ada
    //     // dd($data);
    //     // $data = User::all();
    //     return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('nm_email', function ($row) {
    //             return '<p style="margin: 0">' . $row->nm_pegawai . '</p>' .
    //                    '<a href="#">' . $row->email . '</a>';
    //         })
    //         ->addColumn('username_id', function ($row) {
    //             return $row->name . ' <span>(' . $row->kd_pegawai . ')</span>';
    //         })
    //         ->addColumn('cabang', function ($row) {
    //             return $row->cabang->nama_cabang ?? 'Cabang tidak ditemukan';
    //         })
    //         ->addColumn('bidang', function ($row) {
    //             return $row->kd_bidang;
    //         })
    //         ->addColumn('action', function ($row) {
    //             $akses = '<a class="btn btn-success btn-sm" href="' . route('daftarUser.show', ['daftarUser' => $row->id]) . '">Akses</a>';
    //             $edit = '<a class="btn btn-warning btn-sm" href="' . route('daftarUser.edit', ['daftarUser' => $row->id]) . '">Edit</a>';
    //             $reset = '<a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#resetPasswordModal' . $row->id . '">Reset Pass</a>';
    //             $status = $row->status_p == 1
    //                 ? '<a class="btn btn-danger btn-sm" href="' . route('users.toggleStatus', $row->id) . '">Nonaktif</a>'
    //                 : '<a class="btn btn-primary btn-sm" href="' . route('users.toggleStatus', $row->id) . '">Aktifkan</a>';

    //             return '<div class="aksi">' . $akses . ' ' . $edit . ' ' . $reset . ' ' . $status . '</div>';
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::with(['cabang'])->get(); // Pastikan relasi `cabang` dan `bidang` ada
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama_email', function ($row) {
                    return $row->nm_pegawai . '<br><a>' . $row->email . '</a>';
                })
                ->addColumn('name_id', function ($row) {
                    return $row->name . ' (' . $row->kd_pegawai . ')';
                })
                ->addColumn('cabang', function ($row) {
                    return $row->cabang ? $row->cabang->nama_cabang : '-';
                })
                ->addColumn('bidang', function ($row) {
                    return $row->kd_bidang;
                })
                ->addColumn('action', function ($row) {
                    $akses = '<a class="btn btn-success btn-sm" title="Akses" href="' . route('daftarUser.show', ['daftarUser' => $row->id]) . '"><i class="fa-solid fa-key"></i></a>';
                    $edit = '<a class="btn btn-outline-warning btn-sm" title="Edit user" href="' . route('daftarUser.edit', ['daftarUser' => $row->id]) . '"><i class="fa-solid fa-pen"></i></a>';
                    $reset = '<a href="" class="btn btn-warning btn-sm" title="Reset Password" data-bs-toggle="modal" data-bs-target="#resetPasswordModal' . $row->id . '"><i class="fa-solid fa-lock"></i></a>';
                    $status = $row->status_p == 1
                        ? '<a class="btn btn-danger btn-sm" title="Nonaktifkan" href="' . route('users.toggleStatus', $row->id) . '"><i class="fa-solid fa-user-slash"></i></a>'
                        : '<a class="btn btn-info btn-sm" title="Aktifkan" href="' . route('users.toggleStatus', $row->id) . '"><i class="fa-solid fa-user"></i></a>';

                    return '<div class="aksi">' . $akses . ' ' . $edit . ' ' . $reset . ' ' . $status . '</div>';
                })
                ->rawColumns(['nama_email', 'action'])
                ->make(true);
        }

        // Pass necessary data to the view
        // Ambil semua pengguna untuk modal
        $user = User::all();
        $unitkerja = UnitKerja::all();
        $usercare = UserCare::all();
        $jabatan = Jabatan::all();
        $cabang = CabangAplikasi::all();

        return view('admin/daftarUser', compact('user','unitkerja', 'usercare', 'jabatan', 'cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitkerja = UnitKerja::all();
        $usercare = UserCare::all();
        $jabatan = Jabatan::all();
        $cabang = CabangAplikasi::all();
        return view('admin/tambahUser', compact('unitkerja', 'usercare', 'jabatan', 'cabang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

        $validated = $request->validate([
            'nip' => 'required|unique:users,kd_pegawai',
            'unitkerja' => 'required|exists:ms_unitkerja,KodeUnit', // Validasi pilihan dropdown
            'nama_pegawai' => 'required',
            'username' => 'required|unique:users,name',
            'password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'email' => 'required|email',
            'usercare' => 'required|exists:sysuser,ID_SyUser',
            'jabatan' => 'required|exists:jabatan,ID_Jabatan',
            'cabang' => 'required|exists:cab_aplikasi,kd',
        ]
        );
        // Simpan data ke tabel users
        $data = [
            'kd_pegawai' => $validated['nip'],
            'KodeUnit' => $validated['unitkerja'],
            'nm_pegawai' => $validated['nama_pegawai'],
            'name' => $validated['username'],
            'password' => bcrypt($validated['password']), // Amankan password
            'email' => $validated['email'],
            'userCare' => $validated['usercare'],
            'role' => $validated['jabatan'], // Simpan kode jabatan
            'kd_cabang' => $validated['cabang'],
        ];
            // Proses simpan data
            $result = User::create($data);
            return redirect()->route('daftarUser.index')->with('berhasil', 'User berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, tambahkan openModal ke session
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('openModal', 'tambahUserModal');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $internalApp = Applications::where('aptipe', 1)->orderBy('apnama', 'asc')->get();
        $eksternalApp = Applications::where('aptipe', 2)->orderBy('apnama', 'asc')->get();
        $data = User::where('id', $id)->first();
        // Ambil akses yang sudah dimiliki user
        $userAccess = DB::table('akses_aplikasis')
        ->where('id_user', $id)
        ->pluck('id_aplikasi')
        ->toArray();
        return view('admin/aksesUser', compact('data', 'internalApp', 'eksternalApp', 'userAccess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $unitkerja = UnitKerja::all();
        $usercare = UserCare::all();
        $jabatan = Jabatan::all();
        $cabang = CabangAplikasi::all();
        $data = User::where('id', $id)->first();
        return view('admin/editUser', compact('data', 'unitkerja', 'usercare', 'jabatan', 'cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nip' => "nullable|unique:users,kd_pegawai,{$id},id",
            'unitkerja' => 'nullable|exists:ms_unitkerja,KodeUnit',
            'nama_pegawai' => 'nullable|string',
            'cabang' => 'nullable|exists:cab_aplikasi,kd',
            'username' => "nullable|unique:users,name,{$id},id",
            'usercare' => 'nullable|exists:sysuser,ID_SyUser',
            'email' => 'nullable|email',
            'jabatan' => 'nullable|exists:jabatan,ID_Jabatan',
            'status' => 'nullable|in:0,1',
        ]);

        // Cari data user lama
        $user = User::findOrFail($id);

        // Ambil inputan yang tidak null saja
        $data = array_filter([
                'kd_pegawai' => $request->input('nip'),
                'KodeUnit' => $request->input('unitkerja'),
                'nm_pegawai' => $request->input('nama_pegawai'),
                'kd_cabang' => $request->input('cabang'),
                'name' => $request->input('username'),
                'userCare' => $request->input('usercare'),
                'email' => $request->input('email'),
                'role' => $request->input('jabatan'),
                'status_p' => $request->input('status'),
        ], function ($value) {
            return !is_null($value);
        });

        $user->update($data);
        if ($user->wasChanged()) {
            // Redirect dengan pesan sukses
            return redirect()->route('daftarUser.edit', $id)->with('berhasil', 'Data pengguna berhasil diperbarui.');
        } else {
            return redirect()->route('daftarUser.edit', $id)->with('info', 'Tidak ada perubahan yang dilakukan.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function toggleStatus($id)
    {
        // Cari user berdasarkan id
        $user = User::where('id', $id)->first();

        if ($user) {
            // Ubah status_p: jika 1, ubah ke 0; jika 0/null, ubah ke 1
            $user->status_p = ($user->status_p == 1) ? 0 : 1;
            $user->save();

            // Kirimkan pesan sukses
            return redirect()->back()->with('berhasil', 'Status pengguna berhasil diperbarui.');
        }

        // Kirimkan pesan error jika user tidak ditemukan
        return redirect()->back()->with('gagal', 'Pengguna tidak ditemukan.');
    }

    public function reset(Request $request, $id)
    {
        try {
            $request->validate([
                'passwordbaru' => 'required|confirmed|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],[
                'passwordbaru.required' => 'Password baru harus diisi.',
                'passwordbaru.confirmed' => 'Password baru harus sesuai dengan konfirmasi password.',
                'passwordbaru.min' => 'Password baru minimal 6 karakter.',
                'passwordbaru.regex' => 'Format password tidak sesuai.'
            ]);

            $user = User::findOrFail($id);
            $user->password = bcrypt($request->passwordbaru);
            $user->save();

            return redirect()->back()->with('berhasil', 'Password berhasil direset.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, tambahkan openModal ke session
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('openModal', 'resetPasswordModal' . $id);
        }
    }

    public function handleValidationError(Request $request)
    {
        $currentRoute = $request->route()->getName();

        if ($currentRoute === 'daftarUser.store') {
            return redirect()->back()
                ->withErrors($request->errors ?? []) // Ambil validator errors
                ->withInput()
                ->with('openModal', 'tambahUserModal');
        } elseif ($currentRoute === 'users.resetPassword') {
            $id = $request->route('id'); // Ambil ID user dari route
            return redirect()->back()
                ->withErrors($request->errors ?? []) // Ambil validator errors
                ->withInput()
                ->with('openModal', 'resetPasswordModal' . $id);
        }
    }




    public function updateAccess(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'akses' => 'nullable|array',
            'akses.*' => 'exists:applications,id',
        ]);

        // Hapus akses lama user
        DB::table('akses_aplikasis')->where('id_user', $id)->delete();

        // Simpan akses baru jika ada
        if ($request->has('akses')) {
            foreach ($request->akses as $idAplikasi) {
                DB::table('akses_aplikasis')->insert([
                    'id_user' => $id,
                    'id_aplikasi' => $idAplikasi,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('daftarUser.index')->with('berhasil', 'Akses aplikasi berhasil diperbarui.');
    }

}
