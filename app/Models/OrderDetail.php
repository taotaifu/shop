<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function settlement(){

        return $this->hasMany(Settlement::class);
    }
}
