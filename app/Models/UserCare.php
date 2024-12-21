<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCare extends Model
{
    use HasFactory;
    protected $table = 'sysuser';
    protected $fillable = [
        'ID_SyUser',
        'Name',
        'Password',
        'Type',
        'Tole',
        'Validation',
        'Expiry',
        'LimitIn',
        'LimitOut',
        'CT',
        'ExportOption',
        'BackDatedF',
        'BRANCH',
        'SEGMENT',
        'MID',
        'ImmediateF',
        'LockedF',
        'BLLocked',
        'Email',
        'Mobile',
        'Password_Expiry',
        'Owner',
        'MenuID',
        'AllowedF',
        'ShariaF',
        'Last_Opr',
        'Last_Update',
        'Title',
        'LOCATION',
        'AROLE',
        'CCODE',
        'ID_No',
        'ID_Type',
        'SignerImageID',
        'SignerName',
        'SignerTitle',
        'ISID',
        'ISIDF',
        'CDATE',
        'CUserID',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'userCare', 'ID_SyUser');
    }

}
