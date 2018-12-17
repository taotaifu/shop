<?php

if (!function_exists ('hd_config')){

    function hd_config($var){
      static $cache =[];
      $info = explode ('.',$var);
      if(!$cache){

          $cache=\Cache::get('config_cache',function (){

              return \App\Models\Config::pluck('data','name');

          });
      }
         return $cache[$info[0]][$info[1]]??'';
    }

}
