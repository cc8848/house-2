<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
class CommonController extends BaseController
{
    public function __construct(){
        $session = new Session;
        $ss=$session->get("u_name");
        if(empty($ss))
        {
            echo "<script>alert('您需要先登录！');location.href='login'</script>";
        }
    }


    public function get_json_info($status,$msg,$url,$wait_time)
    {
    	$arr = array('status'=>$status,'msg'=>$msg,'url'=>$url,'wait_time'=>$wait_time);
    	return json_encode($arr);
    }

    public function get_message($status,$wait,$message,$url){
        return view('common/message',array('status'=>$status,'wait'=>$wait,'message'=>$message,'url'=>$url));
    }

}
?>