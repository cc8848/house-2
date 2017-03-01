<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Request;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Redirect;
/**
 * 租户控制器
 * @author   liyang
 */
class RenterController extends CommonController
{
    /**
     * 租户列表
     * @return [type] [description]
     */
    public function renter_list()
    {   $data = DB::table('user')->paginate(3);
        //dd($data);

        return view('rent.renter_show',['data'=>$data]);
    }

    /**
     * 租户添加
     * @return [type] [description]
     */
    public function renter_add()
    {
        return view('rent.renter_add');
    }
    /*
     * 接值进行住户的添加入库操作
     */
    public function renter_add_pro(Request $request){
        $data=$request->all();

        //var_dump($data);die
        $username=$data['username'];
        $password=md5($data['password']);
        $mobile_phone=$data['mobile_phone'];
        $email=$data['email'];
        $add_time = date('Y-m-d');
        $res=DB::table('user')->insert(
            array('username' =>$username,
                'password'=>$password,
                'mobile_phone'=>$mobile_phone,
                'email'=>$email,
                'add_time'=>$add_time,
                'u_age'=>$data['u_age'],
                'u_sex'=>$data['u_sex']
            )
        );
        if($res){
            //echo"<script>alert('添加成功')</script>";
           echo $this->renter_list();
        }else{
            die('执行失败');
        }

        //die("<script>alert('密码错误');location.href='login'</script>");

    }
    /*
   * 删除列表
   * 接受ID通过ID进行删除操作
   */
    public function renter_del(Request $request){
        $id=$_GET['id'];
        //echo $id;die;
        $res= DB::table('user')->where('user_id', '=', $id)->delete();
        if($res){


            $data = DB::table('user')->get();
            return view('rent.renter_show',['data'=>$data]);
        }else{
            echo "失败";
        }

    }
    /*
     * 修改列表
     * 接受ID通过ID进行修改操作
     */
    public function renter_update(){

        $id=$_GET['id'];

        $data = DB::table('user')->where('user_id',$id)->first();
        //dd($data);
        return view('rent.renter_update',['data'=>$data]);



    }
    public function renter_updatepro(Request $request){
        $data=$request->all();
        //echo $data['username'];
        //dd($data);die;
        $res=DB::table('user')
            ->where('user_id',$data['user_id'] )
            ->update(array('username' => $data['username'],
                    'password' => $data['password'],
                    'mobile_phone' => $data['mobile_phone'],
                    'email' => $data['email'])
            );
        if($res){
            $data=DB::table('user')->get();
            return view('rent.renter_show',['data'=>$data]);
        }else{
            die('失败');
        }

    }
}