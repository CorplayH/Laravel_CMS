<?php

namespace App\Http\Controllers\Util;

use App\Model\Attachment;
use App\Server\UploadServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //上传
    public function upload ( Request $request , UploadServer $uploadServer,Attachment $attachment )
    {
        //测试
        //dd(1);
        //打印可以看到上传文件信息
        //dd($_FILES);
        //方法('打印$_FILES看到下标')
        //dd($request->file('file'));
        //$request->file('file')   $request->file
        if ( $file = $request->file ( 'file' ) ) {
            //获取上传文件扩展名
            //调用UploadServer@upload方法完成上传
            $path = $uploadServer->upload ( $file ,$this->isImage ($file)?'image':'file');
            //dd ( $path );
            //将上传数据添加到数据表
            auth ()->user ()->attachment()->create(['filename'=>$file->getClientOriginalName (),'path'=>url ($path)]);
            return ['file' =>url ($path), 'code' => 0];
        }
        
    }
    
    /**
     * 检测是否为图片
     *
     * @param $file		上传文件
     *
     * @return bool		true/flase
     */
    protected function isImage ( $file )
    {
        //strtolower 扩展名不区分大小写
        $ext = strtolower ( $file->getClientOriginalExtension () );
        //检测上传文件是否为图片
        return in_array ( $ext , [ 'jpg' , 'jpeg' , 'png' , 'gif' ] );
        
    }
    
    //显示已上传图片列表
    public function lists ()
    {
        //查找当前用户上传的所有附件
        $data = Attachment::where('user_id',auth ()->user ()->id)->paginate(2);
        //将其转为数组
        $db = $data->toArray();
        //循环给每一个数据中追加一个下标为url的元素
        foreach($db['data'] as $k=>$v){
            $db['data'][$k]['url'] = $v['path'];
        }
        //dd($db);
        //返回数据，数据格式参考hdjs中图片列表
        return [
            'code'=>0,
            'data'=>$db['data'],
            'page'=>$data->links() . ''
        ];
    }
}
