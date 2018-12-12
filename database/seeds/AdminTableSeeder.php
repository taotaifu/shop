<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::firstOrnew([
           'username'=>'729589198@qq.com'
        ])->fill(['password'=>bcrypt ('admin')])->save();
    }
}
