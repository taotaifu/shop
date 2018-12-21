<?php

namespace App\Http\Controllers\Home;

use App\Models\Settlement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

require_once public_path ( '' ) . "/org/php_sdk_v3.0.9/example/WxPay.NativePay.php";

class PayController extends CommonController
{
    public function index ( Request $request )
    {

        //根据订单号获取订单数据

        $settlements = Settlement::where ( 'number' , $request->query ( 'number' ) )->first ();
        //dd ($settlements);
        if ( $settlements[ 'status' ] != 1 ) {
            return redirect ()->route ( 'home.settlement.show' , $settlements )->with ( 'danger' , '当前订单已经支付' );
        }

        $input = new \WxPayUnifiedOrder();
        $input->SetBody ( "默书彤商城" );
        $input->SetAttach ( $request->query ( 'number' ) );
        $input->SetOut_trade_no ( "sdkphp123456789" . date ( "YmdHis" ) );
        $input->SetTotal_fee ( "1" );
        $input->SetTime_start ( date ( "YmdHis" ) );
        $input->SetTime_expire ( date ( "YmdHis" , time () + 600 ) );
        $input->SetGoods_tag ( "test" );
        $input->SetNotify_url ( route ( 'home.notify' ) );
        $input->SetTrade_type ( "NATIVE" );
        $input->SetProduct_id ( "123456789" );

        $notify = new \NativePay();
        $result = $notify->GetPayUrl ( $input );
        $url2   = $result[ "code_url" ];

        return view ( 'home.pay.index' , compact ( 'settlements' , 'url2' ) );
    }

    public function notify ()
    {
        //接受微信 post 通知我们的数据
        $result = simplexml_load_string ( file_get_contents ( 'php://input' ) , 'simpleXmlElement' , LIBXML_NOCDATA );
        //将以上微信返回的数据写入文件
        file_put_contents ( 'b.php' , var_export ( $result , true ) );
        if ( $result->result_code == 'SUCCESS' && $result->return_code == 'SUCCESS' ) {
            //付款成功
            //更新自己的状态状态
            Settlement::where ( 'number' , $result->attach )->update ( [ 'status' => 2 ] );
            //告诉微信我们已经收到通知
            echo "<xml>
                   <return_code><![CDATA[SUCCESS]]></return_code>
                   <return_msg><![CDATA[OK]]></return_msg>
</xml>";

            return true;
        }
    }

     //检测订单是否已经支付
    public function checkOrderStatus(){
        $number = \request()->number;
        $settlements = Settlement::where('number',$number)->first();
        if($settlements['status'] == 2){
            //说明已经支付
            return ['code'=>1,'msg'=>'已支付'];
        }else{
            //说明未支付
            return ['code'=>0,'msg'=>'未支付'];
        }
    }

}
