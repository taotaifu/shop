<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class HdModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hd_module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '自定义的命令';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modules=glob( 'app/Http/Controllers/*' );
        foreach( $modules as $module ){
            if( is_dir( $module . '/System' ) ){
                $moduleName =basename( $module );
                $config     =include $module . '/System/config.php';
                $permissions=include $module . '/System/permission.php';
                Module::firstOrNew( [ 'name'=>$moduleName ] )->fill( [
                    'title'      =>$config[ 'app' ] ,
                    'permissions'=>$permissions
                ] )->save();
                foreach( $permissions as $permission ){
                    Permission::firstOrNew( [ 'name'=>$moduleName . '-' . $permission[ 'name' ] ] )->fill( [
                        'title'     =>$permission[ 'title' ] ,
                        'module'    =>$moduleName ,
                        'guard_name'=>'admin'
                    ] )->save();
                }
            }
        }
        $role       =Role::where( 'name' , 'webmaster' )->first();
        $permissions=Permission::pluck( 'name' );
        $role->syncPermissions( $permissions );
        $user=Admin::find( 1 );
        $user->assignRole( 'webmaster' );
        //清除权限缓存
        \Artisan::call( 'permission:cache-reset' );
        //命令执行成功提示信息
        $this->info( 'permission init successfully' );
    }


}
