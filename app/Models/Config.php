<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
   protected $fillable=['name','data'];

    //通过$casts将得到的josn数据格式转为数组格式
   protected $casts=[
     'data'=>'array',
   ];
}
