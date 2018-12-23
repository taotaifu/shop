<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Figure;
use App\Models\Good;
use App\Models\Keyword;
use Houdunwang\Arr\Arr;
use Illuminate\Http\Request;

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



    public function search(Request $request)
    {
        //获取搜素词
       $kwd=$request->query('kwd');
       //在数据表中查找当前的关键词是否存在
      $Keyword=Keyword::where('kwd',$kwd)->first();
      //判断有没有关键词 有关键词就让搜索执行
        if ($Keyword){
            //如果已经存在 就让搜索执行一次
            $Keyword->increment( 'click' );
        }else{
            //如果不存在 就创建一个关键词
            Keyword::create( [ 'kwd'=>$kwd ] );
        }

        //在商品中查找关键词,然后列出商品进行分页
        $goods=Good::search($kwd)->paginate(5);
        //加载模板
        return view ('home.index.search',compact ('kwd','goods'));
    }
    public function qqBack ()
    {

        echo 111;
        //return view ('home.index.index');
    }
}
