<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    
    public function user()
    {
        return $this->hasMany(User::class, 'role', 'ID_jabatan');
        // 'role' adalah foreign key di tabel users
        // 'ID_jabatan' adalah primary key di tabel cab_aplikasi
    }
}
