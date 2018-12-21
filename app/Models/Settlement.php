<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
