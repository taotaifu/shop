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
           'username'=>'admin',
        ])->fill(['password'=>bcrypt ('admin')])->save();
    }
}
