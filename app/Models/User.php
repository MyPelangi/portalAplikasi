<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\UserCare;
use App\Models\UnitKerja;
use Illuminate\Support\Str;
use App\Models\applications;
use App\Models\CabangAplikasi;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;
    protected $table = 'users';
    protected $fillable = [
        'kd_pegawai',
        'nm_pegawai',
        'kd_divisi',
        'kd_bidang',
        'kd_seksi',
        'KodeUnit',
        'userCare',
        'userCareSH',
        'type',
        'role',
        'name',
        'password',
        'email',
        'unit_kerja',
        'status_p',
        'level_p',
        'kd_cabang',
        'id_useraplikasi',
        'role_portal',
        'status_reset',
        'status_login',
        'token_login',
    ];

    // Fungsi untuk set status login
    public function setLoginStatus($status)
    {
        $this->status_login = $status ? 1 : 0;
        $this->token_login = $status ? Str::random(32) : null; // Generate atau hapus token
        $this->save();
    }

    public function applications()
    {
        return $this->belongsToMany(applications::class);
    }

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'KodeUnit', 'KodeUnit');
    }

    public function userCare()
    {
        return $this->belongsTo(UserCare::class, 'userCare', 'ID_SyUser');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'role', 'ID_jabatan');
    }

    public function cabang()
    {
        return $this->belongsTo(CabangAplikasi::class, 'kd_cabang', 'kd');
        // 'kd_cabang' adalah foreign key di tabel users
        // 'kd' adalah primary key di tabel cab_aplikasi
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
