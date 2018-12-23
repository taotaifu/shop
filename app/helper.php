<?php

if ( ! function_exists ( 'hd_config' ) ) {

    function hd_config ( $var , $defult = '' )
    {
        static $cache = [];
        $info = explode ( '.' , $var );
        static $cache = [];
        if ( ! $cache ) {

            $cache = \Cache::get ( 'cache_config' , function () {

                return \App\Models\Config::pluck ( 'data' , 'name' );

            } );
        }

        return $cache[ $info[ 0 ] ][ $info[ 1 ] ] ?? $defult;
    }

}

if ( ! function_exists ( 'admin_has_permission' ) ) {
    function admin_has_permission ( $permission )
    {
        //if ( is_array ( $permission ) ) {
        //    if ( ! auth ( 'admin' )->user ()->hasAnyPermission ( $permission ) ) {
        //        throw  new \App\Exceptions\PermissionException( '不准进去,再进去打死你丫的!!!' );
        //    }
        //}
        //
        //if ( is_string ( $permission ) ) {
        //    if ( ! auth ( 'admin' )->user ()->hasPermissionTo ( $permission ) ) {
        //        throw  new \App\Exceptions\PermissionException( '不准进去,再进去打死你丫的!!!' );
        //    }
        //}

    }
}

