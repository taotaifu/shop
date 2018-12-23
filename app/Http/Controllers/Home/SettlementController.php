<?php

namespace App\Http\Controllers\Home;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Settlement;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SettlementController extends CommonController
{

    public function index(Request $request)
    {
        //获取地址栏的参数
        $ids=$request->query('ids');
        //dd($ids);
        $settlements=Cart::whereIn('id',explode (',',$ids))->get();
        //dd ($settlements);
        //计算总价
        //每次进来的时候为0 初始值为0
        $totalPrice=0;
        //循环所有的订单
        foreach ($settlements as $settlement){
            //总价 =数量 *单价
            $totalPrice+=$settlement['num']*$settlement['price'];
        }
        //获取当前用户的地址
        $addresses=Address::where('user_id',auth ()->id ())->get();

        //获取当前用户的默认地址 判断标识为1的时候为默认地址
        $defaultAddress = Address::where('user_id',auth ()->id())->where('is_default',1)->first();

        return view ('home.settlement.index',compact ('defaultAddress','settlements','addresses','totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(settlement $settlement)
    {
       //
    }


    public function store(Request $request,settlement $settlement)
    {
        //dd (1);
        //写入数据库
        //打印所有的订单
        //dd ($request->all ());
        $ids=$request->ids;
        //根据购物车ids获取所有数据 判断条件
        $cartData = Cart::whereIn('id',explode (',',$ids))->get();
        //dd ($cartData);
        //初始化 单价 跟数量为0  每次进行操作的时候做增加减少
        $total_price = 0;
        $total_num = 0;
        //循环购物车中的所有商品 得到总价格
        foreach($cartData as $v){
            $total_price += $v['num'] * $v['price'];
        }
        //开启事务 一组行动  只要懂一个地方 其他的地方跟着变化
        DB::beginTransaction();
        //添加订单表
        $settlement->number = time().str_random(8);
        $settlement->total_price = $total_price;
        $settlement->total_num = count($cartData);
        $settlement->user_id = auth()->id();
        $settlement->address_id = $request->address_id;
        $settlement->status = 1;
        $settlement->save();
        //添加订单详情表
        foreach($cartData as $v){
            $orderDetail = new OrderDetail();
            $orderDetail->settlement_id = $settlement->id;
            $orderDetail->title = $v['title'];
            $orderDetail->price = $v['price'];
            $orderDetail->pic = $v['pic'];
            $orderDetail->num = $v['num'];
            $orderDetail->spec = $v['spec'];
            $orderDetail->good_id = $v['good_id'];
            $orderDetail->spec_id = $v['spec_id'];
            $orderDetail->save();
        }
        //清除购物车对应数据
        Cart::whereIn('id',explode(',',$ids))->where('user_id',auth()->id())->delete();
        //关闭事务
        DB::commit();
        return ['code'=>1,'msg'=>'提交成功','number'=>$settlement->number];



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function show(Settlement $settlement)
    {
        return view ('home.settlement.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function edit(Settlement $settlement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settlement $settlement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settlement $settlement)
    {

       //
    }
}
