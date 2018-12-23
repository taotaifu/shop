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
    Route::get ( 'login' , 'LoginController@index' )->name ( 'login' );
    //接收登录
    Route::post ( 'login' , 'LoginController@login' )->name ( 'login' );
    //注册
    Route::get ( 'register' , 'LoginController@register' )->name ( 'register' );
    //接收注册
    Route::post ( 'register' , 'LoginController@store' )->name ( 'register' );
    //密码重置
    Route::get ( 'reset_password/{token}' , 'UserController@resetPasswordView' )->name ( 'reset_password' );
    //接收密码重置
    Route::post ( 'reset_password/{token}' , 'UserController@resetPassword' )->name ( 'reset_password_post');
    //退出
    Route::get ( 'logout' , 'LoginController@logout' )->name ( 'logout' );
    //忘记密码页面
    Route::get ( 'forget_password' , 'UserController@forgetPasswordView' )->name ( 'forget_password' );
    Route::post ( 'forget_password' , 'UserController@forgetPassword' )->name ( 'forget_password' );
    //购物车
    Route::resource('cart','CartController');
    //结算车
    Route::resource('settlement','SettlementController');
    //用户收货地址管理
    Route::resource('address','AddressController');
    //支付页面
     Route::get('pay','PayController@index')->name('pay');
    //微信支付回调通知
    Route::any('notify','PayController@notify')->name('notify');
    //检测订单是否支付
    Route::post('check_order_status','PayController@checkOrderStatus')->name('check_order_status');
    //qq 回调地址
    Route::get('qq_back','IndexController@qqBack')->name('aa_back');
    //个人订单中心
    Route::resource('personal_center','PersonalCenterController');
    //个人资料中心
    Route::resource('material_center','MaterialCenterController');
    //搜索配置
    Route::get( 'search' , 'IndexController@search' )->name( 'search' );

} );

//后台不需要登录拦截
Route::group ( [ 'prefix' => 'admin' , 'namespace' => 'Admin' , 'as' => 'admin.' ] , function () {
    //登录页面
    Route::get ( '/login' , 'LoginController@index' )->name ( 'login' );
    Route::post ( '/login' , 'LoginController@login' )->name ( 'login' );
} );
//后台需要登录拦截
Route::group ( [ 'middleware' => [ 'admin.auth' ] , 'prefix' => 'admin' , 'namespace' => 'Admin' , 'as' => 'admin.' ] , function () {
    //退出
    Route::get ( '/logout' , 'LoginController@logout' )->name ( 'logout' );
    //后台欢迎页面
    Route::get ( '/' , 'IndexController@index' )->name ( 'index' );
    //商品管理
    Route::resource ( 'good' , 'GoodController' );
    //栏目管理
    Route::resource ( 'category' , 'CategoryController' );
    //后台商品详情
    Route::resource('settlement','SettlementController');
    //管理员管理
    Route::resource( 'admin' , 'AdminController' );
    Route::get( 'admin_set_role_create/{admin}' , 'AdminController@adminSetRoleCreate' )->name( 'admin_set_role_create' );
    Route::post( 'admin_set_role_store/{admin}' , 'AdminController@adminSetRoleStore' )->name( 'admin_set_role_store' );
    //角色管理
    Route::resource( 'role' , 'RoleController' );
    //给角色设置权限
    Route::post( 'set_role_permission/{role}' , 'RoleController@setRolePermission' )->name( 'set_role_permission' );
    //权限管理
    Route::get( 'permission' , 'PermissionController@index' )->name( 'permission' );
    //清除权限缓存
    Route::get( 'forget_permission_cache' , 'PermissionController@forgetPermissionCache' )->name( 'forget_permission_cache' );


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


