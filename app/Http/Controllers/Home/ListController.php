<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends CommonController
{
    public function index($list , Category $category){

        //获取所有栏目数据
       $categories=Category::all ()->toArray ();
        //获取最近5个新的商品
        $latestGood = Good::latest ()->limit ( 5 )->get ();
       //dd ($categories);
       // 获取栏目的子级栏目
        $sonIds=$category->getSon ($categories,$list);
        //dd ($sonIds);
        //将子级追加到栏目数据中
       $sonIds[]=$list;
       //获取子级中所有的商品
        $goods=Good::whereIn('category_id',$sonIds);
        //按照价格进行排序
        if(\request ()->query('price') == 'asc'){
            $goods = $goods->orderBy('price','asc');
        }
        if(\request ()->query('price') == 'desc'){
            $goods = $goods->orderBy('price','desc');
        }
        //按照库存量(销量)进行排序
        if(\request ()->query('total') == 'asc'){
            $goods = $goods->orderBy('total','asc');
        }
        if(\request ()->query('total') == 'desc'){
            $goods = $goods->orderBy('total','desc');
        }
        $goods = $goods->orderBy('created_at','desc')->paginate(4);

        //获取当前栏目的所有儿子栏目
        $sonCategory=Category::where('pid',$list)->get();
        //dd ($sonCategory);
        //面包屑 找父级
        $fartherData=$category->getFacher($categories,$list);
        //dd($list);
        //数组翻转
        $fartherData=array_reverse ($fartherData);
        //dd ($fartherData);
        return view ('home.list.index',compact ('goods','list','latestGood','sonCategory','fartherData','sonIds'));

    }

}
