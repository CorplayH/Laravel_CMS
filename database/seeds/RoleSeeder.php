<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //添加2个初始角色
        Role::create(['title' => '站长','name' => 'webmaster']);
        Role::create(['title' => '超级管理员','name' => 'master']);
    }
}
