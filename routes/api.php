<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app(\Dingo\Api\Routing\Router::class);

$api->version('v1',['namespace' => '\App\Http\Controllers\Api'],function ($api){
    
    $api->get('newsIndex/{category?}', 'NewsController@index');
    //获取单个新闻接口
    $api->get('news/{id}','NewsController@news');
    //获取所有分类接口
    $api->get('category','CategoryController@index');
    //登录接口
    $api->post('login', 'AuthController@login');
    //退出登录接口
    $api->get('logout', 'AuthController@logout');
    //获取已登录用户信息接口
    $api->get('me', 'AuthController@me');
    
});
