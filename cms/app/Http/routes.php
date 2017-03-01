<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
Route::any('/login','LoginController@login');
Route::any('/classify_ads','ClassifyController@classify_ads');
Route::any('/check_login','LoginController@check_login');
//退出方法
Route::any('/login_out','LoginController@login_out');


//跳转到后台主页
Route::any('/index','IndexController@index');

//跳转到房东管理
Route::any('/landlord_list','LandlordController@landlord_show');
//跳转到房东增加
Route::any('/landlord_add','LandlordController@landlord_add');
//跳转到房东删除
Route::any('/landlord_delete','LandlordController@landlord_delete');
//跳转到房东编辑
Route::any('/landlord_update','LandlordController@landlord_update');


Route::any('/cc','CommonController@cc');



//跳转到租户管理
Route::any('/renter_list','RenterController@renter_list');
//跳转到租户添加
Route::any('/renter_add','RenterController@renter_add');
//住户添加操作
Route::any('/renter_add_pro','RenterController@renter_add_pro');
//住户删除操作
Route::any('/renter_del','RenterController@renter_del');
//用户修改
Route::any('/renter_update','RenterController@renter_update');
//用户修改操作
Route::any('/renter_updatepro','RenterController@renter_updatepro');




//跳转到导航列表
Route::any('/nav_list','NavController@nav_list');
//跳转到导航添加
Route::any('/nav_add','NavController@nav_add');

//导航的
//添加入库
Route::any('/classify_ads','NavController@classify_ads');
//修改状态
Route::any('/classify_up','NavController@classify_up');
//删除
Route::any('/del','NavController@del');


//跳转到房源列表
Route::any('/house_list','HouseController@house_list');
//跳转到房源添加页面
Route::any('/house_add','HouseController@house_add');
//执行房源添加操作
Route::any('/add_pro','HouseController@add_pro');
//执行房源删除操作
Route::any('/house_del','HouseController@house_del');
//房源修改
Route::any('/house_update','HouseController@house_update');
//执行房源修改操作
Route::any('/house_updatepro','HouseController@house_updatepro');
//执行房源搜索功能
Route::any('/house_search','HouseController@house_search');
//房源详情页展示
Route::any('/house_minute','HouseController@house_minute');
//详情页修改操作
Route::any('/house_amend','HouseController@house_amend');

//图片管理
Route::any('/picture_list','PictureController@picture_list');
//新增图片
Route::any('/picture_add','PictureController@picture_add');
//执行添加图片操作
Route::any('/picture_add_pro','PictureController@picture_add_pro');
//执行图片的删除操作
Route::any('/picture_del','PictureController@picture_del');


//标签管理
Route::any('/label_list','labelController@index');
Route::any('/label_add','labelController@add');
Route::any('/label_update_status','labelController@update_status');
Route::any('/label_del','labelController@label_del');




