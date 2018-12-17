<?php

namespace App\Exceptions;

use Exception;

class UploadException extends Exception
{
    public function render(){

        return response ()->json (['msg'=>$this->getMessage (),'code'=>1],200);
    }
}
