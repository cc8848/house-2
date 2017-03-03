<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Users;
use Mail;
use Symfony\Component\HttpFoundation\Session\Session;

class WxLoginController extends Controller
{
   
    public $email;
    public function index(Request $Request)
    {

       //判断是否登录
       if($Request->session()->get('fd_username'))
       {

           return redirect('fd_personal');
           die;

       };

        return view('static_wx/login');
   }

    //注册页面
    public function register(){

        return view('static_wx/register');
    }

    //找回密码
    public function newPassword()
    {
        if(\Request::isMethod('post'))
        {
            $email = \Request::all()['email'];
            $user_info = Users::where('email',$email)->first()->toArray();
            //dd($user_info);
            $return = array('status'=>'','msg'=>'','url'=>'');
            if(!empty($user_info) && is_array($user_info))
            {
                //存在数据
                //发送邮件
                $this->email = $user_info['email'];
                $this->send();
                $return['status'] = 1;
                $return['msg'] = "邮件已发送到您的绑定邮箱，请注意查收";
                return json_encode($return);
            }
            else
            {
                //不存在
                $return['status'] = 2;
                $return['msg'] = "邮件已发送到您的绑定邮箱，请注意查收";
                return json_encode($return);
            }

        }
        else
        {
            //echo Session::get('username');die;
            return view('static_wx/newPassword');
        }
        
    }

    public function send()
    {
        $num = Mail::raw('您现在正在使用爱乌及屋验证码，验证码为:'.$this->get_code(), function($message) 
        {

            $message->from('864912185@qq.com', 'NIan');
            $message->subject('邮件主题');
            $message->to($this->email);
        });     
    }

    public function get_code()
    {
        $code = rand(1000,9999);
        $user = Users::where('email',$this->email)->first();
        $user->code = $code;
        $user->save();
        return $code;
    }


    public function check_password()
    {
        $data = \Request::all();
        $user_info = Users::where('email',$data['email'])->first();
        if($data['code'] == $user_info['code'] && !empty($user_info['code']))
        {
            if($data['password'] == $data['password1'])
            {
                //修改密码
                $user_info->password = md5($data['password']);
                $user_info->save();
                if($user_info->save())
                {
                    // Session::put('username',$user_info->username);
                    // Session::save();
                    echo "<script>alert('恭喜您密码修改成功');location.href='wx'</script>";
                }
            }
            else
            {
                echo "<script>alert('前后密码不一致');location.href='newPassword'</script>";
            }
        }
        else
        {
            echo "<script>alert('验证码错误，请重新验证');location.href='newPassword'</script>";
        }
    }

    //进行手机验证
    public function registers(Request $Request)
    {
        $code="code%3D".rand(1000,9999);
        $request=$Request->input();
        $mobile_phone = $request['mobile_phone'];
        $nowapi_parm['app']='sms.send';
        $nowapi_parm['tempid']=50895;
        $nowapi_parm['param']=$code;
        $nowapi_parm['phone']=$mobile_phone;
        $nowapi_parm['appkey']='20892';
        $nowapi_parm['sign']='28feb41149334bcdb2d02918f618d98d';
        $nowapi_parm['format']='json';
        $result=$this->nowapi_call($nowapi_parm);
        //print_r($result);exit;
        if($result['status']=='OK')
        {
            /* session(['code'=>$num]);*/
            /*$value = session('code');
            echo $value;*/
            $Request->session()->put('code',$code);
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    //短信验证码自带方法
    function nowapi_call($a_parm)
    {
        if(!is_array($a_parm))
        {
            return false;
        }
        //combinations
        $a_parm['format'] = empty($a_parm['format'])?'json':$a_parm['format'];
        $apiurl = empty($a_parm['apiurl'])?'http://api.k780.com:88/?':$a_parm['apiurl'].'/?';
        unset($a_parm['apiurl']);
        foreach($a_parm as $k=>$v)
        {
            $apiurl.=$k.'='.$v.'&';
        }
        $apiurl = substr($apiurl,0,-1);
        if(!$callapi=file_get_contents($apiurl))
        {
            return false;
        }
        //format
        if($a_parm['format']=='base64')
        {
            $a_cdata=unserialize(base64_decode($callapi));
        }
        elseif($a_parm['format']=='json')
        {
            if(!$a_cdata=json_decode($callapi,true))
            {
                return false;
            }
        }
        else
        {
            return false;
        }
        //array
        if($a_cdata['success']!='1')
        {
            echo $a_cdata['msgid'].' '.$a_cdata['msg'];
            return false;
        }
        return $a_cdata['result'];
    }
    //对比验证
    public function contrast(Request $request)
    {
        $zhi=$request->input("zhi");

        $codes=$request->session()->get('code');
        //echo $codes;die;
        if("code%3D".$zhi==$codes)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }
    //个人信息
    public function regis(Request $Request){
        $roles=\Request::Input("job");
        $username=\Request::Input("username");
        $sex=\Request::Input("sex");
        $age=\Request::Input("age");
        $mobile_phone=\Request::Input("mobile_phone");
        $password= md5(\Request::Input("password"));
        if(date_default_timezone_get() != "1Asia/Shanghai") date_default_timezone_set("Asia/Shanghai");
        $addtime=time();
        $email=\Request::Input("email");
        if($roles==2)
        {
            $arr = [
                'username'=>$username,
                'password'=>$password,
                'u_age'=>$age,
                'u_sex'=>$sex,
                'add_time'=>$addtime,
                'email'=>$email,
                'mobile_phone'=>$mobile_phone
            ];
            $res = DB::table('user')->insertGetId($arr);
            if($res)
            {
                return redirect('wx');
            }
        }
        else
        {
            $user=array('r_name'=>$username,'r_pwd'=>$password,'r_age'=>$age,'r_sex'=>$sex,'r_time'=>$addtime,'r_email'=>$email,'r_tel'=>$mobile_phone);
            $res = DB::table('renter')->insertGetId($user);
            if($res)
            {
               $Request->session()->put('fd_id',$res);               
               $Request->session()->put('fd_username',$username);

                return redirect('wx');
            }
        }
    }
    //验证邮箱唯一性
    public function sole(){
        $email=\Request::Input("email");
        $job=\Request::Input("job");
        if($job==2)
        {
            $res = DB::table('user')->where('email',$email)->first();//一维
            if($res)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        else
        {
            $re = DB::table('renter')->where('r_email',$email)->first();//一维
            if($re)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }

//证明用户名的唯一性
public function usole()
{
    $username=\Request::Input("username");
    $job=\Request::Input("job");
    if($job==2)
    {
        $res = DB::table('user')->where('username',$username)->first();//一维
        if($res)
        {
            echo 1;
        }else
        {
            echo 0;
        }
    }else
    {
        $re = DB::table('renter')->where('r_name',$username)->first();//一维
        if($re)
            if($re)
            {
                echo 1;
            }else
            {
                echo 0;
            }
    }
}


    //租户登录
    public function zf_login(Request $Request)
    {

        $fd_username = $Request->session()->get('fd_username');  //房东session
        $username = $Request->session()->get('username');  //租户session
        $openid =  $Request->session()->get('openid');

        if(!empty($fd_username))
        {

            $Request->session()->forget('username');  //删除租户session
            return redirect('fd_personal');
        }
        else if(!empty($username) || !empty( $openid))
        {

            $Request->session()->forget('echo ');  //删除房东session
            return redirect('zf_personal');
        }
        else
        {
            return view('static_wx/zf_login');
        }
            

    }

    //第三方登录
    public function qqlogin(Request $Request)
    {

        $openid = $Request->input('openid');

        $access_token = $Request->input('access_token');


        $user = DB::select("select openid,user_id from networklogin where openid = '$openid'");

         

        if(!$user)
        {

            $userinfo = file_get_contents('https://graph.qq.com/user/get_user_info?access_token='.$access_token.'&oauth_consumer_key=101369412&openid='.$openid.'');

            //插入随机生成到用户表
            $userData['username'] = 'Awjw'.uniqid();
            //系统生成的密码
            $systempwd = $userData['username'].'1234556';
            $userData['password'] = MD5("$systempwd");  //最终密码

            $userData['mobile_phone'] = '11111111111';
            $userData['add_time'] = time();
            $userData['email'] = '11@qq.com';

            //返回自增id
            $id = DB::table('user')->insertGetId($userData);

            if($id)
            {
                $NewUserInfo = json_decode($userinfo,true);
                $NewUserInfo['openid'] = $openid;
                $NewUserInfo['user_id'] = $id;


                $res = DB::table('networklogin')->insert($NewUserInfo);

                if($res)
                {

                    //如果是第三方登录则删除普通用户信息
                    $Request->session()->put('openid',"$openid");
                    $Request->session()->forget('username');

                    return redirect('zf_personal');
                }
                else
                {
                    
                    return redirect('zf');
                }
            }
            else
            {

                echo "操作失败";
            }
        }
        else
        {
            

             $userid = $user['0']->user_id;
            $Request->session()->put('userid',$userid);

              //用户存在

            $Request->session()->put('openid',"$openid");
            //如果是第三方登录则删除普通用户信息
            $Request->session()->forget('username');
            return redirect('zf_personal');

        }

    }

    //普通用户登录
    public function ordinaryUser(Request $Request)
    {


        $data = $Request->input();

        $res = DB::table('user')->where('username',$data['name'])
                                ->where('password',MD5($data['password']))
                                ->first();


        if($res)
        {

            $username = $res->username;
            $userid = $res->user_id;

            $Request->session()->put('username',$username);
            $Request->session()->put('userid',$userid);
            $Request->session()->put('status',3);
            return redirect('zf_personal');

        }
        else
        {
            $url = url('zf');
            echo "<script>alert('用户名或密码错误');</script>";
            echo "<script>window.location.href='".$url."';</script>";
        }


    }



    //房东登录页面
    public function fd_login(Request $Request)
    {

        $data = $Request->input();

        $username = $data['name'];
        $password = MD5($data['password']);

        $usernamepreg = '/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/';
        if(preg_match($usernamepreg,$username)){



            $res = DB::table('renter')->where('r_email',"$username")
                                      ->where('r_pwd',"$password")
                                      ->first();
            if($res)
            {

                $Request->session()->put('fd_username',$res->r_name);  //名称
                $Request->session()->put('r_toux',$res->r_toux);  //头像
              
                $Request->session()->put('fd_id',$res->r_id);
                $Request->session()->put('status',1);
                return redirect('fd_personal');
                die;

            }
            else
            {

                $url = url('fd_login');
                echo "<script>alert('用户名或密码错误')</script>";
                echo "<script>window.location.href='".$url."';</script>";
            }


        }

        $mobile = '/^1[34578]{1}\d{9}$/';
        if(preg_match($mobile,$username))
        {

            $res = DB::table('renter')->where('r_tel',"$username")
                ->where('r_pwd',"$password")
                ->first();
            if($res)
            {

                $Request->session()->put('fd_username',$res->r_name);
                $Request->session()->put('r_toux',$res->r_toux);  //头像
                $Request->session()->put('fd_id',$res->r_id);
                $Request->session()->put('status',1);
                return redirect('fd_personal');
                die;

            }
            else
            {

                $url = url('fd_login');
                echo "<script>alert('用户名或密码错误')</script>";
                echo "<script>window.location.href='".$url."';</script>";
            }

        }

        $url = url('fd_login');

        echo "<script>alert('请输入手机或邮箱')</script>";
        echo "<script>window.location.href='".$url."';</script>";

    }

    //退出登录
    public function outlogin(Request $request)
    {

        $request->session()->forget('fd_username');       
        $request->session()->forget('username');
        $request->session()->forget('userid');
        $request->session()->forget('openid');
        return redirect('wx');

    }

    public function wblogin(Request $Request)
    {
        $code=$_GET['code'];
//echo $code;die;
$url = "https://api.weibo.com/oauth2/access_token";
$data="client_id=2887630111&client_secret=1388b851dca19104940e861a723c3fb7&grant_type=authorization_code&code=$code&redirect_uri=http://house.wlf928.cn/wblogin";
$curlobj=curl_init();
//获取URL地址
curl_setopt($curlobj,CURLOPT_URL,$url);
//启用时会将头文件的信息作为数据流输出
curl_setopt($curlobj,CURLOPT_HEADER,0);
//不直接输出
curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,1);
//在HTTP请求中包含一个"User-Agent: "头的字符串
curl_setopt($curlobj,CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
curl_setopt($curlobj, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在

//指定POST方式传值
curl_setopt($curlobj,CURLOPT_POST,1);
curl_setopt($curlobj,CURLOPT_POSTFIELDS,$data);
//设置 HTTP 头字段的数组
curl_setopt($curlobj,CURLOPT_HTTPHEADER,array('application/x-www-form-urlencoded;   charset=utf-8',   'Content-length:'.strlen($data)));
$str = curl_exec($curlobj); //执行
curl_close($curlobj); //执行完毕释放curl
//print_r($str);die;

$re = json_decode($str,true);
$ken = $re['access_token'];
$uid = $re['uid'];
$urs = "https://api.weibo.com/2/users/show.json?access_token=$ken&uid=$uid";
$res = file_get_contents($urs);
$a = json_decode($res);
// var_dump($a);
echo "111";
                // $Request->session()->put('fd_username',$a['name']);  //名称
                // $Request->session()->put('r_toux',$a['profile_image_url']);  //头像
              
                // $Request->session()->put('fd_id',$a['id']);
                // $Request->session()->put('status',1);
                // return redirect('fd_personal');

    }


}
