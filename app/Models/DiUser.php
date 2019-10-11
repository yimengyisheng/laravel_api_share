<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiUser extends Model
{
    protected $connection = 'mysql_didi';
    protected $table = 'users';
}
