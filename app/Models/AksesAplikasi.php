<?php

namespace App\Models;

use App\Models\User;
use App\Models\applications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AksesAplikasi extends Model
{
    use HasFactory;
    protected $table = 'akses_aplikasis';
    protected $fillable = [
        'id_user',
        'id_aplikasi'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'id_user', 'id');
    }

    public function applications()
    {
        return $this->belongsToMany(applications::class, 'id_aplikasi', 'id');
    }
}
