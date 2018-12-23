<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //protected $guarded = ['_token'];
    protected  $fillable=['name','phome','province','detail','user_id','is_default'];

    //地址关联
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }

    public function settlement(){

        return $this->hasMany(Settlement::class);
    }
}
