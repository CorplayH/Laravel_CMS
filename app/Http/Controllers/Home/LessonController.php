<?php

namespace App\Http\Controllers\Home;

use App\Model\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lessons = Lesson::paginate(10);
        return view('home.lesson.index',compact('lessons'));
    }
    
    public function lists(Lesson $lesson){
        $lessons = Lesson::get();
        return view('home.lesson.lists',compact('lessons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $field=[
            'lesson' => [
                'title' => '',
                'description'=>'',
                'thumb'=>asset('org/hdjs/image/nopic.jpg'),
            ],
            'video' =>[]
        ];
        return view('home.lesson.create',compact('field'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lesson $lesson)
    {
        //
//        dd($request->toArray());
        //有true是为数组, 没true是为对象
        $data = json_decode($request->field,true);
        $this->validateData($data['lesson']);
//        dd($data);
//        dd($data['lesson']);
        $lesson = auth()->user()->lesson()->create($data['lesson']);
//        $lesson->user ()->associate(auth ()->user ())->fill($data['lesson'])->save();
        $lesson -> video()->createMany($data['video']);
        return redirect()->route('lesson.lists')->with('success','添加成功');
    }
    public function validateData($data){
        //https://laravel-china.org/docs/laravel/5.6/validation/1372
        //自动重定向
        \Validator::make($data,[
            'title'=>'required',
            'description'=>'required',
            'thumb'=>'required',
        ],[
            'title.required'=>'请输入课程标题',
            'description.required'=>'请输入课程描述',
            'thumb.required'=>'请上传缩略图',
        ])->validate ();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('home.lesson.show',compact ('lesson'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $field = [
            'lesson'=>$lesson->toArray (),
            'video'=>$lesson->video->toArray(),
        ];
        //dd($field);
        return view ('home.lesson.edit',compact ('field'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //将json数据转为php数组
        $data = json_decode ($request->field,true);
        //手动数据验证
        $this->validateData ($data['lesson']);
        //执行课程表更新
        $lesson->update ($data['lesson']);
        //视频更新
        $lesson->video ()->delete ();
        
        foreach($data['video'] as $video) {
            //	//dd($lesson->video()->withTrashed()->get());
            //	//$video['id']??0
            //	//isset($video['id']) ? $video['id'] : 0
            $lesson->video()->withTrashed()->updateOrCreate ( [ 'id' => $video['id']??0],$video )->restore();
            //$lesson->video()->updateOrCreate ( [ 'id' => $video['id']??0],$video );
        }
        return redirect  ()->route ('lesson.lists')->with ('success','数据保存成功');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //删除课程
        $lesson->delete ();
        //删除视频
        $lesson->video ()->forceDelete ();
        return back ()->with ('success','删除成功');
    }
}
