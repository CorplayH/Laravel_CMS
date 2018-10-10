<?php

namespace App\Model;

use houdunwang\arr\Arr;
use Illuminate\Database\Eloquent\Model;

class CustomMenu extends Model
{
    //
    protected $guarded =[];
    
    public function newCategory()
    {
        return $this->belongsTo(CustomMenu::class, 'parentId','id');
    }
    
    public function hasChild($customMenu){
        $son = CustomMenu::where('parentId', $customMenu['id'])->first();
        if($son){
            return true;
        }else{
            return false;
        }
    }
    
    public function getTreeCategory()
    {
        $data = CustomMenu::get()->toArray();
        $dataTree = Arr::tree($data, 'cname', 'id', 'parentId');
        return $dataTree;
    }
    
    public function getNewCategory($customMenu)
    {
        $category = $this->getTreeCategory();
        foreach ($category as $k => $v){
            if($v['id'] == $customMenu['id'] ){
                $customMenu = $v;
            }
        }
        
        foreach( $category as $k => $v){
            if( $v['_level'] >=$customMenu ['_level'] ){
                $category[$k]['_disable'] = 'disabled';
            }else{
                $category[$k]['_disable'] = '';
            }
        }
        return $category;
    }
}
