<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CabangAplikasi extends Model
{
    use HasFactory;
    protected $table = 'cab_aplikasi';

    public function user()
    {
        return $this->hasMany(User::class, 'kd_cabang', 'kd');
        // 'kd_cabang' adalah foreign key di tabel users
        // 'kd' adalah primary key di tabel cab_aplikasi
    }
}
