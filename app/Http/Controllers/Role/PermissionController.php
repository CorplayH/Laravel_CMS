<?php

namespace App\Http\Controllers\Role;

use App\Model\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $modules = Module::get();
        return view('role.permission',compact('modules'));
    }
    
    
    public function assignPermission(Role $role)
    {
        $modules = Module::get();
        return view('role.assignPermission',compact('modules','role'));
    }
    
    public function savePermission(Request $request,Role $role)
    {
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('role.role.index')->with('success','权限设置成功');
    }
}
