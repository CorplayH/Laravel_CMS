<?php

namespace App\Http\Controllers\Role;

use App\Model\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $modules = Module::get();
        return view('role.permission',compact('modules'));
    }
}
