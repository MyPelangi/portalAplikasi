<?php

namespace App\Models;

use App\Models\User;
use App\Models\CabangAplikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityLogs extends Model
{
    use HasFactory;

    protected $table = 'activity_log';

    protected $fillable = [
        'id_user',
        'kd_pegawai',
        'nm_pegawai',
        'kd_cabang',
        'nama_cabang',
        'type',
        'ip_user',
        'latitude',
        'longitude'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cabang()
    {
        return $this->belongsTo(CabangAplikasi::class, 'kd_cabang', 'kd');
    }
}
