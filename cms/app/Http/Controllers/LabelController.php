<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use App\House;
/**
 * 标签管理系统
 * @author  昊
 */
class LabelController extends CommonController
{  /*
    *  标签展示
    */
    public function index(){
        $res=DB::table('label')->paginate(4);;
        return view('label/index',['res'=>$res]);
    }
    //添加标签
    public function add(){
        $data = Request::all();
        if($data){
            $res=DB::table('label')->insert(array(['label_name'=>$data['label_name']]));
            if($res){
                return redirect("label_list");
            }else{
                die('失败');
            }
        }else{
            return view('label/label_add');
        }
    }
    //修改状态
    public function update_status(){
        //状态  0 修改失败   修改成功  1 使用  2  弃用
        $data=Request::all();
        $res = DB::table('label')
            ->where('label_id', $data['label_id'])
            ->update(array('status' => $data['status']));
        if($res){
             if($data['status']==1){
                 echo 2;
             }else  if($data['status']==0){
                 echo 1;
             }
        }else{
            echo 0;
        }
    }
    //删除标签
    public function label_del(){
        $data=Request::all();
        $res = DB::table('label')->where('label_id', '=', $data['label_id'])->delete();
        if($res){
            return redirect("label_list");
        }else{
            return "删除失败";
        }
    }
}