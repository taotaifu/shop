<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        //dd (1);
        admin_has_permission('Admin-role');

        $roles=Role::paginate( 8 );

        return view( 'admin.role.index' , compact( 'roles' ) );
    }

    public function create()
    {
        admin_has_permission('Admin-role');
        return view( 'admin.role.create' );
    }

    public function store( RoleRequest $request , Role $role )
    {
        admin_has_permission('Admin-role');
        $role->title     =$request->title;
        $role->name      =$request->name;
        $role->guard_name='admin';
        $role->save();

        return redirect()->route( 'admin.role.index' )->with( 'success' , '角色添加成功' );
    }


    public function edit( Request $request , Role $role )
    {
        admin_has_permission('Admin-role');
        return view( 'admin.role.edit' , compact( 'role' ) );
    }

    public function update( Request $request , Role $role )
    {
        admin_has_permission('Admin-role');
        $this->authorize( 'update' , $role );
        $role->title=$request->title;
        $role->name =$request->name;
        $role->save();

        return redirect()->route( 'admin.role.index' )->with( 'success' , '角色编辑成功' );
    }

    public function destroy( Role $role )
    {
        admin_has_permission('Admin-role');
        $this->authorize( 'delete' , $role );
        $role->delete();

        return redirect()->route( 'admin.role.index' )->with( 'success' , '角色删除成功' );
    }

    public function show( Role $role )
    {
        admin_has_permission('Admin-role');
        $modules=Module::all();

        return view( 'admin.role.set_role_permission' , compact( 'modules' , 'role' ) );
    }

    public function setRolePermission( Role $role , Request $request )
    {
        admin_has_permission('Admin-role');
        $this->authorize( 'update' , $role );
        $role->syncPermissions( $request->permissions );

        return back()->with( 'success' , '操作成功' );
    }
}
