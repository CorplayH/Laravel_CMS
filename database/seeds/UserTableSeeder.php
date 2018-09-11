<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();
        $user           = \App\User::find(1);
        $user->name     = 'William';
        $user->email    = 'hwjmsn@hotmail.com';
        $user->mobile     = '13067300136';
        $user->password = bcrypt('123');
        $user->is_admin = true;
        $user->save();
    
        $user           = \App\User::find(2);
        $user->name     = '第二';
        $user->email    = 'william@isme.co.nz';
        $user->mobile     = '13067300137';
        $user->password = bcrypt('123');
        $user->save();
    
    }
}
