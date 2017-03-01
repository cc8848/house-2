<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class WxfollowController extends Controller
{
    //

    //用户关注  取消关注
    public function follow(Request $Request){

        $uid = $Request->input('userid');  //用户id
        $fid = $Request->input('fid'); //房源id

        //状态    1。关注  2.取消关注
        $stat = $Request->input('stat');


        if(empty($uid)){

            $array = array('static'=>'10003','msg'=>'请先登录');

            return json_encode($array);
        }else{

            if($stat==1){

                $data = array('userid'=>$uid,'fid'=>$fid);
                $res = DB::table('follow')->insert($data);

                if($res){

                    return '10001';

                }


            }else if($stat==2){

                $data = array('userid'=>$uid,'fid'=>$fid);

                $res = DB::table('follow')->where($data)->delete();

                if($res){
                    return '10002';
                }
            }

        }


    }

    //用户关注的房源
    public function myfollow(Request $Request){

        $userid = $Request->session()->get('userid');

        $list = DB::select("select * from rent_house where rent_id in (select fid from follow where userid = $userid)");



        $data['list'] = $list;
        return view('static_wx/myfollow',$data);
    }


}
