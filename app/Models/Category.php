<?php

namespace App\Models;

use Houdunwang\Arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static $temp = [];

    //获得树状结构的所有栏目名称
    public function getTreeDate ( $data )
    {
        //$categories=Category::all ();
        //dd ($categories);
        return ( new Arr() )->tree ( $data , 'name' , 'id' , 'pid' );
    }

    //用递归找所属栏目下的所有子级
    public function getSon ( $data , $id )
    {
        //初始值为空数组 第二次在追加的时候回覆盖原先的数据 所以用到静态变量
        //static $temp = [];
        foreach ( $data as $v ) {

            if ( $id == $v[ 'pid' ] ) {
                $temp[] = $v[ 'id' ];
                $this->getSon ( $data , $v[ 'id' ] );
            }
        }

        return self::$temp;
    }

    //获取编辑时候的所有栏目数据,不包含自己和自己的子集
    public function getEditCategory ( $id )
    {
        //获取所有的栏目
        $categories = static::all ();
        //获取当前子级的数据
        $idm = $this->getSon ( $categories , $id );
        //dd ($idm);
        //   追加子级
        $idm[] = $id;
        //将包含自己的id数据刷选出去
        $data = $this->whereNotin ( 'id' , $idm )->get ();

        //转为树状结构
        return $this->getTreeDate ( $data->toArray () );
    }

    //关联商品 一对多正向
    public function good ()
    {

        return $this->hasMany ( Good::class );
    }

    public function getFacher ($data,$id)
    {
        static $temp=[];
        foreach ($data as $v ){
           //判断子集中pid == id 说明是父子关系
           if ($v['id']==$id){
               $temp[]=$v;
               $this->getFacher ($data,$v['pid']);
           }
        }

        return $temp;
    }
}

