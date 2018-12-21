<?php

namespace App\Http\Controllers\Home;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends CommonController
{

    public function index ()
    {
        //dd (1);
        //获取所有的地址
        $addresses = Address::get ();

        //dd ($addresses);
        return view ( 'home.address.index' , compact ( 'addresses' ) );

    }


    public function create ( Address $address )
    {
        //$address = Address::all ()->toArray ();
        //获取所有的地址
        $addresses = Address::get ();

        return view ( 'home.address.create' );
    }


    public function store ( Request $request )
    {
        $address = auth ()->user ()->address ()->create ( $request->all () );
        //dd ($address);
        //修改默认地址状态
        //判断当前是否是默认地址
        if ( $request->is_default ) {

            Address::where ( 'user_id' , auth ()->id () )->where ( 'id' , '!=' , $address[ 'id' ] )->update ( [ 'is_default' => 0 ] );
        }

        return redirect ()->route ( 'home.address.index' )->with ( 'success' , '地址添加成功' );

    }


    public function show ( Address $address )
    {
        Address::where('user_id',auth ()->id ())->where('id',$address['id'])->update(['is_default'=>1]);

        //dd (1);
        Address::where('user_id',auth ()->id ())->where('id','!=',$address['id'])->update(['is_default'=>0]);

           return back ();
    }


    public function edit (Request $request, Address $address )
    {
        $addresses = Address::all ();
        //dd ($addresses);
        return view ( 'home.address.edit' , compact ('address', 'addresses') );
    }


    public function update ( Request $request , Address $address )
    {
        //dd (1);
        //dd ($request->all ()) ;
        //dd (auth ()->user ()->address()->get());
        $address = auth ()->user ()->address ()->update( $request->all () );

        //dd ($address);
        //修改默认地址状态
        //判断当前是否是默认地址
        if ( $request->is_default ) {
            Address::where ( 'user_id' , auth ()->id () )->where ( 'id' , '!=' , $address[ 'id' ] )->update ( [ 'is_default' => 0 ] );
        }
        return redirect ()->route ( 'home.address.index' )->with ( 'success' , '地址添加成功' );
    }


    public function destroy ( Address $address )
    {
        $address->delete ();

        return redirect ()->route ( 'home.address.index' )->with ( 'success' , '删除成功' );
    }
}
