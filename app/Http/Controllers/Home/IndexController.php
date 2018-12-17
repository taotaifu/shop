<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Figure;
use App\Models\Good;
use Houdunwang\Arr\Arr;

class IndexController extends CommonController
{
    public function index ( Category $category )
    {

        //获取所有的轮播图
        $figures = Figure::all ();
        //获取所有的菜单栏目
        $categories = Category::all ()->toArray ();
        //dd ($categories);
        //轮播图左侧菜单数据
        //channelLevel 下级菜单 层次 4个参数
        $categoryData = ( new Arr() )->channelLevel ( $categories , $pid = 0 , $html = "&nbsp;" , $fieldPri = 'id' , $fieldPid = 'pid' );
        //dd ($categoryData);die;
        //获取最近5个新的商品
        $latestGood = Good::latest ()->limit ( 5 )->get ();
        //dd ($lateGood);
        //获取楼层的大数据
        //找办公家具的所有子数据
        $sonIds   = $category->getSon ( $categories , 1 );
        $sonIds[] = 1;
        //dd ($sonIds);
        $oneFloor = [
            'name' => '电子产品' ,
            'data' => Good::whereIn ( 'category_id' , $sonIds )->get ()
        ];
        //dd ($oneFloor);
        return view ( 'home.index.index' , compact ( 'categoryData' , 'latestGood' , 'oneFloor' , 'figures' ) );
    }
}
