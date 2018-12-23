<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    public function upload(Request $request){

        //dd($request->all());
        $file = $request->file('file');

        if($file){

            $this->checkSize($file);
            $this->checkType($file);

            //$path = $file->store('上传文件存储目录','磁盘:filesystems 文件里面看disks');
            //上传需要 php 扩展:fileinfo
            $path = $file->store('upload','upload');
            //dd($path);
            return [
                "code"=> 0,
                "msg"=>'',
                "data"=>[
                    "src"=>'/'.$path
                ],
            ];
        }

    }

    //验证上传大小
    private function checkSize($file){
        //$file->getSize()获取上传文件大小
        if ( $file->getSize () > hd_config ('upload.upload_size',20000000000) )
        {
            throw new UploadException( '上传文件过大' );
        }
    }

    //验证上传类型
    private function checkType($file){

        if ( !in_array ( strtolower ($file->getClientOriginalExtension ()) , explode ('|',hd_config ('upload.upload_type','jpg|png|gif|bmp|jpeg')) ) )
        {
            throw new UploadException( '上传类型不允许' );
        }
    }
    //获取图片列表
    //public function filesLists(){
    //    $files = auth()->user()->attachment()->paginate(20);
    //    $data = [];
    //    foreach($files as $file){
    //        $data[] = [
    //            'url'=>$file['path'],
    //            'path'=>$file['path']
    //        ];
    //    }
    //    //1dd($data);
    //
    //    return [
    //        'data'=>$data,
    //        'page'=>$files->links() . '',//这里一定要注意分页后面拼接一个空字符串
    //        'code'=> 0
    //    ];
    //}

}
