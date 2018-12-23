<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

/**
 * 后台管理员管理
 * Class AdminController
 *
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
{

    public function index()
    {
        admin_has_permission('Admin-index');
        $admins=Admin::paginate( 10 );

        return view( 'admin.admin.index' , compact( 'admins' ) );
    }


    public function create()
    {
        admin_has_permission('Admin-index');
        return view( 'admin.admin.create' );
    }


    public function store( AdminRequest $request , Admin $admin )
    {
        admin_has_permission('Admin-index');
        $admin->username=$request->username;
        $admin->password=bcrypt( $request->password );
        $admin->save();

        return redirect()->route( 'admin.admin.index' )->with( 'success' , '管理员添加成功' );
    }

    public function show( Admin $admin )
    {
        //
    }


    public function edit( Admin $admin )
    {
        admin_has_permission('Admin-index');
        return view( 'admin.admin.edit' , compact( 'admin' ) );
    }


    public function update( Request $request , Admin $admin )
    {
        admin_has_permission('Admin-index');
        $admin->username=$request->username;
        $admin->password=bcrypt( $request->password );
        $admin->save();

        return redirect()->route( 'admin.admin.index' )->with( 'success' , '管理员编辑成功' );
    }


    public function destroy( Admin $admin )
    {
        admin_has_permission('Admin-index');
        $this->authorize( 'delete' , $admin );
        $admin->delete();

        return redirect()->route( 'admin.admin.index' )->with( 'success' , '管理员编辑成功' );
    }

    public function adminSetRoleCreate( Admin $admin )
    {
        admin_has_permission('Admin-index');
        //获取所有角色
        $roles=Role::all();

        return view( 'admin.admin.set_role' , compact( 'admin' , 'roles' ) );
    }

    public function adminSetRoleStore( Admin $admin , Request $request )
    {
        admin_has_permission('Admin-index');
        $admin->syncRoles( $request->roles );

        return back()->with( 'success' , '设置成功' );
    }
}
