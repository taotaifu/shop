<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get ( '/' , 'Home\IndexController@index' );

//前台路由
Route::group ( [ 'prefix' => 'home' , 'namespace' => 'Home' , 'as' => 'home.' ] , function () {
    //登录
    Route::get ( '/' , 'IndexController@index' )->name ( 'home' );
    Route::get ( 'list/{list}' , 'ListController@index' )->name ( 'list' );
    Route::get ( 'content/{content}' , 'ContentController@index' )->name ( 'content' );
    //根据规格请求对应的库存
    Route::post ( 'spec_to_get_total' , 'ContentController@specGetTotal' )->name ( 'spec_to_get_total' );
    //用户管理
    Route::resource('user','UserController');
    //登录
    Route::get ( '/login' , 'UserController@login' )->name ( 'login' );
    //接收登录
    Route::post ( '/login' , 'UserController@loginForm' )->name ( 'login' );
    //注册
    Route::get ( '/register' , 'UserController@register' )->name ( 'register' );
    //接收注册
    Route::post ( '/register' , 'UserController@store' )->name ( 'register' );
    //密码重置
    Route::get ( '/password_reset' , 'UserController@passwordReset' )->name ( 'password_reset' );
    //接收密码重置
    Route::post ( '/password_reset' , 'UserController@passwordResetForm' )->name ( 'password_reset' );
    //退出
    Route::get ( '/logout' , 'UserController@logout' )->name ( 'logout' );
    //购物车
    Route::resource('cart','CartController');


} );

//后台不需要登录拦截
Route::group ( [ 'prefix' => 'admin' , 'namespace' => 'Admin' , 'as' => 'admin.' ] , function () {
    //登录页面
    Route::get ( '/login' , 'LoginController@index' )->name ( 'login' );
    Route::post ( '/login' , 'LoginController@login' )->name ( 'login' );
} );
//后台不需要登录拦截
Route::group ( [ 'middleware' => [ 'admin.auth' ] , 'prefix' => 'admin' , 'namespace' => 'Admin' , 'as' => 'admin.' ] , function () {
    //退出
    Route::get ( '/logout' , 'LoginController@logout' )->name ( 'logout' );
    //后台欢迎页面
    Route::get ( '/' , 'IndexController@index' )->name ( 'index' );
    //商品管理
    Route::resource ( 'good' , 'GoodController' );
    //栏目管理
    Route::resource ( 'category' , 'CategoryController' );

} );
//工具类
Route::group ( [ 'prefix' => 'util' , 'namespace' => 'Util' , 'as' => 'util.' ] , function () {
    //上传
    Route::any ( '/upload' , 'UploadController@upload' )->name ( 'upload' );
    Route::any ( '/filesLists' , 'UploadController@filesLists' )->name ( 'filesLists' );
    //发送验证码
    Route::any ( '/code/send' , 'CodeController@send' )->name ( 'code.send' );
} );

//后台配置项
Route::group ( [ 'middleware' => [ 'admin.auth' ] , 'prefix' => 'admin' , 'namespace' => 'Admin' , 'as' => 'admin.' ] , function () {
    //后台配置路由
    Route::get ( 'config/edit/{name}' , 'ConfigController@edit' )->name ( 'config.edit' );
    Route::post ( 'config/update/{name}' , 'ConfigController@update' )->name ( 'config.update' );
} );

//轮播图管理
Route::group ( [ 'prefix' => 'shower' , 'namespace' => 'Shower' , 'as' => 'shower.' ] , function () {
    //轮播图管理
    Route::resource ( 'figure' , 'FigureController' );

} );


