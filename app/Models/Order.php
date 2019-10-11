<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='ordering_orderheader';

    public function detail()
    {
        return $this->hasMany (OrderDetail::class,'orderheader_id','id')
            ->select ('id','orderheader_id','product_sku');
    }
}
