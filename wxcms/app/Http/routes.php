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



//访问微信端主页
Route::get('wx','WxController@index');
//租房
Route::get('rentlist',"WxController@rentlist");
//房屋详情页面
Route::get('housedetail/{id}.html','WxController@housedetail');

/* 查询房屋评论 */
Route::get('comment/{id}.html','WxController@commlist');
/* 房屋评论添加 */
Route::get('comment/_add','WxController@commadd');
/* 评论回复入库 */
Route::get('comment/_reply','WxController@replyadd');

//房东登录
Route::get('fd_login','WxLoginController@index');

//百度地图模块
Route::get('map','WxController@map');

//注册页面
Route::get('register','WxLoginController@register');

//密码找回
Route::any('newPassword','WxLoginController@newPassword');
//密码修改
Route::post('check_password','WxLoginController@check_password');


//房东个人页面
Route::get('fd_personal','WxController@fd_personal');
//房东登录
Route::post('fd_personal','WxLoginController@fd_login');

//房东发布房源
Route::get('add_housing','WxController@add_housing');
Route::post('add_housing','WxController@add_housing');

//房东房源列表
Route::get('agent','WxController@agent_list');

//房东下租客
Route::get('tenants','WxController@tenants');

//房东列表
Route::get('landlord','WxController@landlord');

//租房
Route::get('zf','WxLoginController@zf_login');

//租户个人中心
Route::get('zf_personal','WxController@zf_personal');
Route::post('zf_personal','WxController@zf_personal');

//房东修改密码
Route::get('update_pass','WxController@update_pass');

//租户修改密码
Route::get('zf_update_pass','WxController@zf_update_pass');

//房东个人信息
Route::get('personal_info','WxController@personal_info');
Route::post('personal_info','WxController@personal_info');

//租户个人信息
Route::get('zf_personal_info','WxController@zf_personal_info');

//我关注的房东
Route::get('My_landlord','WxController@My_landlord');

//QQ登录
Route::get('qqlogin','WxLoginController@qqlogin');

//普通用户
Route::post('odu','WxLoginController@ordinaryUser');

//房东图片上传
Route::post('fileUpload','WxController@fileUpload');
Route::get('fileUpload','WxController@fileUpload');

//我关注的房东
Route::get('My_landlord','WxController@My_landlord');



//注册跳转验证
Route::any('registers','WxLoginController@registers');
//对比验证码
Route::any('contrast','WxLoginController@contrast');
//个人信息入库
Route::any('regis','WxLoginController@regis');
//验证邮箱唯一性
Route::any('sole','WxLoginController@sole');
//跳转到类型页面
Route::any('re','WxController@re');
//跳转到展示搜素
Route::any('rentlists','WxController@rentlists');
Route::any('usole','WxLoginController@usole');


//房东退出登录
Route::get('outlogin','WxLoginController@outlogin');

//文件上传
Route::get('toux','WxfileController@toux');
Route::post('toux','WxfileController@toux');

//普通用户个人信息修改
Route::post('personalupd','WxpersonalController@personalupd');

//用户关注或取消关注
Route::POST('follow','WxfollowController@follow');

//用户关注的房源
Route::get('myfollow','WxfollowController@myfollow');