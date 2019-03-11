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

$middleware=['jwt.auth','api'];
//无规则验证路由
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login')->name('login');//登录
    Route::post('logout', 'AuthController@logout')->name('logout');//退出
    Route::post('refresh', 'AuthController@refresh');//刷新token
});
//包含jwt验证的路由示例
Route::group(['prefix'=>'user','middleware'=>$middleware],function (){
    Route::post('test', 'TestController@test');
});
