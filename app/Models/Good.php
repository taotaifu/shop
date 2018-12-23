<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Good extends Model
{

    use Searchable;

    protected $fillable=[ 'title','price','description','total','category_id','list_pic','pics','user_id','content'

    ];

    protected $casts=[ 'pics'=> 'array'];

    //关联商品栏目(一对多反向)
        public function category(){

        return $this->belongsTo(Category::class);
    }
    //关联商品规则表(一对多正向)
   public function spec(){
            return $this->hasMany (Spec::class);

   }

}
