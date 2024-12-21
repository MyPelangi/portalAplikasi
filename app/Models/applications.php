<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class applications extends Model
{
    protected $fillable = [
        'apnama',
        'aplink',
        'aptipe',
        'permit',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
