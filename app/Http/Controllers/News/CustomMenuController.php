<?php

namespace App\Http\Controllers\News;

use App\Model\CustomMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allCategories = CustomMenu::get();
        return view('admin.customMenu.index',compact('allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CustomMenu $customMenu)
    {
        //
        $allCategories = $customMenu->getTreeCategory();
        return view('admin.customMenu.create',compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        CustomMenu::create($request->all());
        return redirect()->route('admin.customMenu.index')->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CustomMenu  $customMenu
     * @return \Illuminate\Http\Response
     */
    public function show(CustomMenu $customMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CustomMenu  $customMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomMenu $customMenu)
    {
        //
        $allCategories = $customMenu->getNewCategory($customMenu);
        return view('admin.customMenu.edit',compact('customMenu','allCategories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CustomMenu  $customMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomMenu $customMenu)
    {
        //
        $customMenu -> update($request->all());
        return redirect()->route('admin.customMenu.index')->with('success', '修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CustomMenu  $customMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomMenu $customMenu)
    {
        //
        if($customMenu->hasChild($customMenu)){
            return back()->with('error','请先删除当前分类的子集,再来删除我');
        }else{
            $customMenu->delete();
            return redirect()->route('admin.customMenu.index')->with('success', '删除成功');
        }
    }
}
