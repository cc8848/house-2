<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
class LoginController extends BaseController
{
    //跳转到登陆页面
    public function login(){
        return view('Login.login');
    }
    //验证登陆是否正确
    public function check_login(){
//        $u_name=Request::input('u_name');
//        $u_pwd=Request::input('u_pwd');
//        $ar = DB::table('admin')->where('u_name',$u_name)->first();//一维
//        if($ar)
//        {
//if($ar->u_pwd==$u_pwd)
//{
//    $session = new Session;
//    $session->set("u_name",$ar->u_name);
//    $session->set("u_pwd",$ar->u_pwd);
    return redirect('index');

//}else
//{
//    return redirect('login');
//}
//        }else
//        {
//            return redirect('login');
//        }
    }
}
