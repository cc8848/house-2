<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class WxpersonalController extends Controller
{
    //租户个人信息修改
    public function personalupd(Request $Request){
    	$userid = $Request->session()->get('userid');

    	

    	$data = $Request->input();

    	unset($data['_token']);

    	$res = DB::table('user')->where('user_id',$userid)->update($data);


    	if($res){
    		echo "修改成功!";
    	}else{
    		echo "修改失败！";
    	}

    }


}
