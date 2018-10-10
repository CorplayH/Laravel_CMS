<?php
//工具类路由
Route::group (['namespace'=>'Util'],function (){
    Route::any('code/send', 'CodeController@send')->name ('code.send');
    Route::any('upload/upload', 'UploadController@upload')->name ('upload.upload');
    Route::any('upload/lists', 'UploadController@lists')->name ('upload.lists');
});


//微信
Route::group (['prefix'=>'wechat','as'=>'wechat.','namespace'=>'Wechat'],function (){
    Route::any ('api/handler','ApiController@handler')->name ('api.handler');
    Route::resource ('baseResponse','BaseResponseController');
    Route::resource('wxMenu','WxMenuController');
    Route::get('wxMenu/push/{wxMenu}','WxMenuController@push')->name('wxMenu.push');
    Route::resource('keywordReply','KeywordReplyController');
    Route::resource('news','WxNewsController');
});

/**
 * 前台路由
 */
Route::group(['middleware'=>[], 'namespace'=>'Home'],function(){
    Route::get('/','IndexController@index')->name('index');
    Route::get('/login','LoginController@loginIndex')->name('login');
    Route::post('/login','LoginController@login')->name('login');
    Route::resource ('user','UserController');
    Route::get('/logout','LoginController@logout')->name('logout');
    Route::resource ('article','ArticleController');
    Route::get ( '/article/zan/{article}' , 'ArticleController@toggleZan' )->name ( 'article.zan' );
    Route::resource('topic','TopicController');
    //这个get 必须在 前面, 不然和下面的resource 里的show 参数 冲突
    Route::get('lists','LessonController@lists')->name('lesson.lists');
    Route::resource('lesson','LessonController');
    Route::resource('video','VideoController');
    //搜索
    Route::get('/search','SearchController@lists')->name('search');
});

/**
 * 后台管理路由'
 */
Route::group (['middleware'=>['auth.admin'],'prefix'=>'admin','as'=>'admin.','namespace'=>'Admin'],function (){
    Route::get ('/','HomeController@index')->name ('index');
    Route::get ('config/edit/{name}','ConfigController@edit')->name ('config.edit');
    Route::post ('config/update/{name}','ConfigController@store')->name ('config.store');
    Route::resource('category','CategoryController');
    Route::get('template', 'ConfigController@edit_template')->name('edit_template');
    Route::get('set_template/{name}','ConfigController@set_template')->name('set_template');
});

//新闻博客
Route::group(['middleware' => [],'prefix' => 'news', 'as' => 'news.', 'namespace'=>'News'],function (){
    Route::resource('customMenu','CustomMenuController');
    Route::resource('news','NewsController');
    Route::get('index','HomeController@index')->name('index');

});

//会员中心
Route::group ( [ 'middleware' => ['auth'] , 'prefix' => 'member' , 'as' => 'member.' , 'namespace' => 'Member' ] , function () {
    Route::get ( '/' , 'UserController@index' )->name ( 'index' );
    Route::resource ( 'user' , 'UserController' );
    Route::get ( '/follow/{user}' , 'UserController@toggleFollow' )->name ( 'toggleFollow' );
    Route::resource ('notify','NotifyController');
    Route::get ('/user/getFans/{user}','UserController@getFans')->name ('user.getFans');
    Route::get ('/user/getFollower/{user}','UserController@getFollower')->name ('user.getFollower');
    
} );


//公共类
Route::group (['middleware'=>[],'prefix'=>'common','as'=>'common.','namespace'=>'Common'],function (){
    Route::resource ('comment','CommentController');
    Route::get('/favorite/make','FavoriteController@make')->name('favorite.make');
    Route::get('/zan/make','ZanController@make')->name('zan.make');
});

//RBAC的角色路由
Route::group(['middleware'=>[],'prefix'=>'role','as'=>'role.','namespace'=>'Role'],function(){
    Route::resource('role','RoleController');
    Route::get('permission','PermissionController@index')->name('permission.index');
});
