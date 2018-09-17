<?php


//工具类路由
Route::group (['namespace'=>'Util'],function (){
    Route::any('code/send', 'CodeController@send')->name ('code.send');
    Route::any('upload/upload', 'UploadController@upload')->name ('upload.upload');
    Route::any('upload/lists', 'UploadController@lists')->name ('upload.lists');
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
});

/**
 * 后台管理路由
 */
Route::group (['middleware'=>['auth.admin'],'prefix'=>'admin','as'=>'admin.','namespace'=>'Admin'],function (){
    Route::get ('/','HomeController@index')->name ('index');
    Route::get ('config/edit/{name}','ConfigController@edit')->name ('config.edit');
    Route::post ('config/update/{name}','ConfigController@store')->name ('config.store');
});

//会员中心
Route::group ( [ 'middleware' => ['auth'] , 'prefix' => 'member' , 'as' => 'member.' , 'namespace' => 'Member' ] , function () {
    Route::get ( '/' , 'UserController@index' )->name ( 'index' );
    Route::resource ( 'user' , 'UserController' );
    Route::get ( '/follow/{user}' , 'UserController@toggleFollow' )->name ( 'toggleFollow' );
} );

