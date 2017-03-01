<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * 导航控制器
 * @author  liuyanmeng
 */
class NavController extends CommonController
{
    /**
     * 导航列表页面
     * @return [type] [description]
     */
    public function nav_list(){
        $arr=DB::table('r_nav')->paginate(2);; //二维
        return view('nav.nav_list',['arr'=>$arr]);
    }

    /**
     * 导航添加页面
     * @return [type] [description]
     */
    public function nav_add(){
        return view('nav.nav_add');
    }
    //添加进数据库
    public function classify_ads(){
        //接收照片
        $n_file = Request::file('n_img');
        if($n_file->isValid()){
            //获取文件名称
            $clientName = $n_file -> getClientOriginalName();
            $realPath = $n_file -> getRealPath();
            //获取图片格式
            $entension = $n_file -> getClientOriginalExtension();
            //图片保存路径
            $mimeTye = $n_file -> getMimeType();
            $path = $n_file -> move('IMG');
        }
        //接受其他变量
        $n_name=Request::input('n_name');
        $n_link=Request::input('n_link');
        $n_status=Request::input('n_status');
        $n_order=Request::input('n_order');
        $user=array('n_name'=>$n_name,'n_link'=>$n_link,'n_status'=>$n_status,'n_order'=>$n_order,'n_img'=>$path);
        $res = DB::table('r_nav')->insert($user);
        if($res)
        {
            return redirect('nav_list');
        }
    }
    //删除
    public function del(){
        $id=Request::input('id');
        $res =DB::delete("delete from r_nav where n_id='$id'");
        if($res)
        {
            return redirect('nav_list');
        }
    }

    //修改状态
    public function classify_up(){
        //接受改变之
        $zstatus=Request::input('zstatus');
        //接受改变ID
        $n_id=Request::input('n_id');
        $res =DB::update("UPDATE r_nav SET n_status='$zstatus' WHERE n_id='$n_id'");
        if($res)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }
}