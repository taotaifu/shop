<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Good;
use App\Models\Spec;
use Illuminate\Http\Request;

class CartController extends CommonController
{

    public function __construct ()
    {
        $this->middleware ( 'auth' , [
            'except' => [] ,
        ] );

        parent::__construct ();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ( Cart $cart )
    {
        //获取当前用户购物车所有的数据
        //$newCart=Cart::all ();
        $carts = Cart::where ( 'user_id' , auth ()->id () )->get ();
        //dd ($carts);
        //循环购物车的数据
        foreach($carts as $k=>$cart){
            $carts[$k]['checked'] = false;
        }
        return view ( 'home.cart.index' , compact ( 'carts' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store ( Request $request , Cart $cart )
    {
        //dd (111);
        //获取所有的数据
        //dd ($request->all ());
        //根据商品的id获取所有的商品数据
        //$good =Good::all ();
        //dd ($good);
        $good = Good::find ( $request->id );
        //dd ($good);
        //根据规格获取规格数据
        $spec = Spec::find ( $request->spec );
        //dd ($spec);
        $newCart = Cart::where ( 'user_id' , auth ()->id () )->where ( 'good_id' , $request->id )->where ( 'spec_id' , $request->spec )->first ();
        //dd ($newCart);

        if ( ! $newCart ) {
            //执行购物车添加
            $cart->pic     = $good->list_pic;
            $cart->good_id = $request->id;
            $cart->title   = $good->title;
            $cart->spec    = $spec->spec;
            $cart->price   = $good->price;
            $cart->num     = $request->num;
            $cart->user_id = auth ()->id ();
            $cart->spec_id = $request->spec;
            $cart->save ();
        } else {

            $newCart->num = (int) $newCart[ 'num' ] + (int) $request->num;
            $newCart->save ();
        }

        return ['code'=>1,'msg'=>'添加成功'];

        //return redirect ()->route ( 'home.cart.index' )->with ( 'success' , '跳转成功' );
    }


    public function update ( Request $request , Cart $cart )
    {
        //dd ($request->all ());
        //dd ($request->all ());
        //商品数量
        $cart->num=$request->num;
        $cart->save ();
        //更新数量

        //$rel=Spec::where('id',$request->id)->first();
        //dd ($rel);

        //$cart->update (['num'=>$request->num]);
        return [ 'code'=>1 ,'msg'=>'更新成功' ];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart $cart
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Cart $cart )
    {
        $cart->delete ();

        return [ 'code'=>1 ,'msg'=>'删除成功' ];
    }
}
