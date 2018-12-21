<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //protected $guarded = ['_token'];
    protected  $fillable=['name','phome','province','detail','user_id','is_default'];

}
