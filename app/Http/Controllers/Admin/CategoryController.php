<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $categories = Category::paginate(10);
        return view ( 'admin.category.index' ,compact ('categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view ( 'admin.category.create' );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store ( CategoryRequest $request,Category $category )
    {
        $category->create ( $request->all () );
        return redirect ()->route ('admin.category.index')->with ('success','保存成功');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function show ( Category $category )
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ( Category $category )
    {
        return view ('admin.category.edit',compact ('category'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Category      $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update ( CategoryRequest $request , Category $category )
    {
        $category->update ($request->all ());
        return redirect ()->route ('admin.category.index')->with ('success','保存成功');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Category $category )
    {
        $category->delete();
        return back()->with ('success','删除成功');
    }
}
