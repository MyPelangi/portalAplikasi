<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'ms_unitkerja';
    protected $fillable = ['UnitKerja'];

    public function user()
    {
        return $this->hasMany(User::class, 'KodeUnit', 'KodeUnit');
    }

}
