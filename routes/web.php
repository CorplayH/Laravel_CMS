<?php







//工具类路由
Route::group (['namespace'=>'Util'],function (){
    Route::any('code/send', 'CodeController@send')->name ('code.send');
});

/**
 * 前台路由
 */
Route::group(['middleware'=>[], 'namespace'=>'Home'],function(){
    Route::get('/','IndexController@index')->name('index');
    Route::get('/login','LoginController@login')->name('login');
    Route::resource ('user','UserController');
});
/**
 * 后台管理路由
 */
Route::group (['middleware'=>[],'prefix'=>'admin','as'=>'admin.','namespace'=>'Admin'],function (){
    Route::get ('/','HomeController@index')->name ('index');
});
