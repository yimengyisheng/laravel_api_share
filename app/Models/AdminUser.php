<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected  $table='admin_users';
    public function users()
    {
        return $this->hasOne(DiUser::class,'id','tx_id');
    }

}
