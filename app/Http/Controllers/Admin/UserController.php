<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index()
    {
        $admins = User::where('is_admin',1)->get();
        return view('admin.user.index',compact('admins'));
    }
    
    public function create()
    {
        return view('admin.user.create');
    }
    
    public function assignRole(User $admin)
    {
        $roles = Role::where('name', '!=', 'webmaster')->get();
        return view('admin.user.assignRole',compact('roles','admin'));
    }
    
    public function storeRole(User $admin,Request $request)
    {
        $admin->syncRoles($request->input('roles'));
        return redirect()->route('admin.userIndex')->with('success','角色赋予成功');
    }
}
