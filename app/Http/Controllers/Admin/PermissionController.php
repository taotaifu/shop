<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        //dd (1);
        admin_has_permission('Admin-permission');
        //dd (1);
        $modules=Module::all();

        return view( 'admin.permission.index' , compact( 'modules' ) );
    }

    public function forgetPermissionCache()
    {
        admin_has_permission('Admin-permission');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        return back()->with( 'success' , '缓存清除成功' );
    }
}
