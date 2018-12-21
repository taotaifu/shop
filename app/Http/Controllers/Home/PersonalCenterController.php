<?php

namespace App\Http\Controllers\Home;

use App\Models\OrderDetail;
use App\Models\Settlement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalCenterController extends CommonController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Settlement $settlement,OrderDetail $orderDetail)
    {
        //获取当前登录用户的全部订单数据
        $settlements = Settlement::where('user_id',auth()->id())->paginate(10);
        //dd ($settlements);
        //$orderDetail=OrderDetail::all ();
        //dd ($settlements->orderDetail());
        //dd ($orderDetail);
        return view('home.personal_center.index',compact('settlements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonalCenter  $personalCenter
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalCenter $personalCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonalCenter  $personalCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalCenter $personalCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonalCenter  $personalCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalCenter $personalCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonalCenter  $personalCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalCenter $personalCenter)
    {
        //
    }
}
