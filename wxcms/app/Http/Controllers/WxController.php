<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\rent_house;
use DB;
use App\History;
use Input;
class WxController extends Controller
{
    //
    public function index(){

        $like = DB::table('rent_house')->take(3)->get();
        $like=json_encode($like);
        $like=json_decode($like,true);
        $rent_label=array();
        foreach($like as $key => $value){
            $like[$key]['label_name']=array();
            $rent_label[$key]=DB::table('rent_label')->where('rent_id','=',"$value[rent_id]")->get();
        }
        $rent_label=json_encode($rent_label);
        $rent_label=json_decode($rent_label,true);
        foreach($rent_label as $key =>$value) {
            foreach ($value as $k => $v) {
                $label[$k] = DB::table('label')->where('label_id', '=', $v['label_id'])->select('label_name')->get();
                $label=json_encode($label);
                $label=json_decode($label,true);
                $like[$key]['label_name'][$k] = $label[$k][0]['label_name'];
            }
        }
        $data['like'] = $like;
        return view('static_wx/index',$data);
    }

    //房源列表
    public function rentlist()
    {
        $r_adress=\Request::Input('r_adress');
        $r_district=\Request::Input("r_district");
        $r_price=\Request::Input("r_price");
        $r_type=\Request::Input("r_type");
        if(!empty($r_district))
        {
            $list= DB::select("SELECT * FROM rent_house WHERE r_district='$r_district'");
        }
        elseif(!empty($r_price))
        {
            $list= DB::select("SELECT * FROM rent_house WHERE r_price='$r_price'");
        }
        elseif(!empty($r_adress))
        {
            $list= DB::select("SELECT * FROM rent_house WHERE r_adress='$r_adress'");
        }
        elseif(!empty($r_type))
        {
            $list= DB::select("SELECT * FROM rent_house WHERE r_type='$r_type'");
        }
        else
        {
            $list=DB::select("SELECT * FROM rent_house");
        }
        //发送不重复的区域
        $arr1=DB::select("SELECT DISTINCT(r_district) FROM rent_house");
        //发送不重复的价格
        $arr2=DB::select("SELECT DISTINCT(r_price) FROM rent_house");
        //发送不重复的的类型
        $arr3=DB::select("SELECT DISTINCT(r_type) FROM rent_house");
        $ym="http://www.back.com/";
        $data['ym']=$ym;
        $list=json_encode($list);
        $list=json_decode($list,true);
        $rent_label=array();
        foreach($list as $key => $value){
            $rent_label[$key]=DB::table('rent_label')->where('rent_id','=',"$value[rent_id]")->get();
            $list[$key]['label_name']=array();
        }
        $rent_label=json_encode($rent_label);
        $rent_label=json_decode($rent_label,true);
        foreach($rent_label as $key =>$value) {
            foreach ($value as $k => $v) {
                $label[$k] = DB::table('label')->where('label_id', '=', $v['label_id'])->select('label_name')->get();
                $label=json_encode($label);
                $label=json_decode($label,true);
                $list[$key]['label_name'][$k] = $label[$k][0]['label_name'];
            }
        }
        $data['list']=$list;
        return view("static_wx/rentlist",$data,['arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3]);
    }

    //房屋详情
    public function housedetail($id,Request $Request)
    {

        $userid = $Request->session()->get('userid');

        $data['userid'] = $userid;
        $data['fid'] = $id;
        $rent_label=DB::table('rent_label')->where('rent_id','=',$id)->get();
        foreach($rent_label as $key =>$val){
            $list[$key]=DB::table('label')->where('label_id','=',$val->label_id)->select('label_name')->get();
            $list=json_encode($list);
            $list=json_decode($list,true);
        }
        $label_name=array();
        foreach($list as $key =>$value){
            $label_name[$key]=$value[0]['label_name'];
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $result = History::where(array('ip'=>$ip,'rent_id'=>$id))->get()->toArray();

        $listData = DB::table('rent_house')->where('rent_id',$id)->first();  //房屋详情数据
        $fw_id = $listData->img_id;  //房屋id

        $fw_img = DB::table('fd_image')->where('fw_id',$fw_id)->get();  //房屋关联图片


        $data['fw_img'] = $fw_img;

        // dd($result);
        if(is_array($result) && !empty($result))
        {
            //存在数据
            $data['list'] = $listData;
            $data['fd_info'] = DB::table('renter')->where('r_id',$data['list']->landlord_id)->select('r_tel','r_name')->first();
        }
        else
        {
            //新增历史
            $history = new History;
            $history->ip = $ip;
            $history->rent_id = $id;
            $history->save();
            //调取数据
            $data['list'] = $listData;
            $data['fd_info'] = DB::table('renter')->where('r_id',$data['list']->landlord_id)->select('r_tel','r_name')->first();
        }

        //浏览过本房子的客户还浏览过哪些房子
        $lishi = DB::select("select * from rent_house where rent_id in(select rent_id from history where ip in (select ip from history where rent_id = '$id')) order by rent_id desc limit 0,3");

        //关注状态
        $where = array('userid'=>$userid,'fid'=>$id);

        $followstatic = DB::table('follow')->where($where)->first();

        if($followstatic){
            $data['followstatic'] = '1';
        }else{
            $data['followstatic'] = '2';
        }

        $data['lishi'] = $lishi;
        $data['label_name'] = $label_name;
    	return view('static_wx/housedetail',$data);

    }


    /**
     * 房屋评论查询
     * @return [type] [description]
     */
    public function commlist($id,Request $Request)
    {   
        $data['id'] = $id;
        /* 查询房子所有评论 */
        $list= DB::select("select * from comment  where rent_id = ".$data['id']."  ORDER BY comm_time desc");
        $list = json_decode(json_encode($list),true);

        /* 循环查询用户名 */
        foreach ($list as $key => $value) {
            $a = DB::table('user')->where("user_id",'=',$value['user_id'])->first();
            $a = json_decode(json_encode($a),true);
            $list[$key]['username'] = $a['username'];
        }

        foreach ($list as $key => $value) {
            $res = DB::table('reply')->where('reply_user_id','=',$value['user_id'])->get();
            $res = json_decode(json_encode($res),true);
            foreach ($res as $k => $val) {
                $a = DB::table('user')->where("user_id",'=',$val['user_id'])->first();
                $a = json_decode(json_encode($a),true);
                $res[$k]['username'] = $a['username'];
            }
            $list[$key]['reply'] = $res;      
        }
        $data['list'] = $list;
        return view('static_wx/comment',$data);
    }

    /**
     * 评论添加
     * @return [type] [description]
     */
    public function commadd(Request $Request)
    {
        /* 检测是否登陆 */
        $userid = $Request->session()->get('userid');
        if(!isset($userid))
        {
            $result['errCode'] = 0;
            $result['msg'] = '请先登录！';
            echo json_encode($result);
            exit;
        }

        /* 接值 */
        $data = $Request->input();
        $rent_id = $data['id'];
        $content = $data['content'];
        $time = time();

        $arr = [ 'rent_id'=>$rent_id,
                 'content'=>$content,
                 'user_id'=>$userid,
                 'comm_time'=>$time,
                ];

        $res = DB::table('comment')->insert($arr);
        if($res)
        {
            $result['errCode'] = 1;
            $result['msg'] = '评论成功！';
            echo json_encode($result);
        }
        else
        {
            $result['errCode'] = 2;
            $result['msg'] = '评论失败！';
            echo json_encode($result);
        }
    }

    /* 回复 */
    public function replyadd(Request $Request)
    {

        /* 检测是否登陆 */
        $userid = $Request->session()->get('userid');
        if(!isset($userid))
        {
            $result['errCode'] = 0;
            $result['msg'] = '请先登录！';
            echo json_encode($result);
            exit;
        }

        $data = $Request->input();

        $arr = [ 'rent_id'=>$data['rent_id'],
                 'reply_user_id'=>$data['reply_user_id'],
                 'content'=>$data['reply'],
                 'user_id'=>$userid,
                 'reply_time'=>time(),
                ];
        $res = DB::table('reply')->insert($arr);
        if($res)
        {
            return redirect('comment/'.$data['rent_id'].'.html');
        }
        else
        {
            return redirect('comment/'.$data['rent_id'].'.html');
        }
    }


    public function map(Request $Request){

       $address = $Request->input('address');

       $data['address'] =  $address;

    	return view('static_wx/map',$data);
    }

    //房东个人页面
    public function fd_personal(Request $Request){

        //判断房东是否登录
        $fd_username = $Request->session()->get('fd_username');
        $r_toux = $Request->session()->get('r_toux');
        



        if($fd_username){

            $data['username'] = $fd_username;
            $data['f_toux'] = $r_toux;

            return view('static_wx/fd_personal',$data);
        }else{
            return redirect('fd_login');
        }


    }

    //房东发布房源
    public function add_housing(Request $request){

        $fd_id = $request->session()->get('fd_id');



        $data['fd_id'] = $fd_id;
        if($request->isMethod('post')){

            $data = $request->input();
            unset($data['_token']);
            $data['img_id'] = $request->session()->get('img_id');
            $res = DB::table('rent_house')->insert($data);

            if($res){
                echo "发布成功！";
            }else{
                echo "发布失败！";
            }

        }else{

            //生成图片关联标识
            $imgId = uniqid();
            $request->session()->put('img_id',$imgId);
            return view('static_wx/add_housing',$data);
        }

    }

    //房东房源列表
    public function agent_list(Request $request){

        $fd_id = $request->session()->get('fd_id');  //房东id
        $list = DB::table('rent_house')->where('landlord_id',$fd_id)->get();

        //房东信息
        $fd_info = DB::table('renter')->where('r_id',$fd_id)->first();


        $data['list'] = $list;
        $data['fd_info'] = $fd_info;
        return view('static_wx/agentdetail',$data);
    }

    //租客列表
    public function tenants(){

        return view('static_wx/agent');
    }

    //房东列表
    public function landlord(){

        return view('static_wx/landlord');
    }

    //租户个人中心
    public function zf_personal(Request $Request){

       




        $username =  $Request->session()->get('username');
        $openid =  $Request->session()->get('openid');

      


        if(!empty($username)){


//            $qqdata = DB::table('networklogin')->where('openid',$openid)->first();

            $data['userinfo'] = $username;
            $data['touxiang'] = url('static_wx/img/member.png');

            return view('static_wx/zf_personal',$data);

        }else if(!empty($openid)){


            $qqdata = DB::table('networklogin')->where('openid',$openid)->first();

            $data['userinfo'] = $qqdata->nickname;
            $data['touxiang'] = $qqdata->figureurl_qq_2;

            return view('static_wx/zf_personal',$data);
        }else{

            return redirect('zf');
        }


    }

    //房东修改密码
    public function update_pass(){

        return view('static_wx/update_pass');
    }

    //租户修改密码
    public function zf_update_pass(){

        return view('static_wx/zf_update_pass');
    }

    //房东个人信息
    public function personal_info(Request $request){
        $fd_id =  $request->session()->get('fd_id');

        if(empty($fd_id)){

            return redirect("fd_login");
            die;
        }

        if($request->isMethod('post')){

           $data = $request->input();
            unset($data['_token']);


           $res = DB::table('renter')
                ->where('r_id', $fd_id)
                ->update($data);

            if($res){
                echo "修改成功！";
            }else{
                echo "修改失败!";
            }

        }else{


            $fd_info = DB::table('renter')->where('r_id',$fd_id)->first();

            $data['fd_info'] = $fd_info;
            return view('static_wx/personal_info',$data);
        }

    }


    //租户个人信息
    // [user_id] => 24
    // [username] => fengmos1
    // [password] => 25f9e794323b453885f5181f1b624d0b
    // [mobile_phone] => 18101265136
    // [add_time] => 2017-02-22 20:34:40
    // [email] => 1193756410@qq.com
    // [u_sex] => 男
    // [u_age] => 18
    public function zf_personal_info(Request $Request){

        $userid = $Request->session()->get('userid');
        
        
        $userinfo = DB::table('user')
        ->select('username','mobile_phone','add_time','email','u_sex','u_age')
        ->where('user_id',$userid)->first();
        $data['userinfo'] = $userinfo;
        
        return view('static_wx/zf_personal_info',$data);
    }

    //我关注的房东
    public function My_landlord(){


        return view('static_wx/My_landlord');
    }

    //房东图片上传
    public function fileUpload(Request $Request){
        header('Content-type: text/plain; charset=utf-8');

        $userid = $Request->session()->get('fd_id');  //房东id

        $currentPath =  $_SERVER['PHP_SELF'];  //当前路径

        $newPath = dirname($currentPath);  //文件上传路径

        $uploadPath = rtrim($_SERVER['DOCUMENT_ROOT'],'/').$newPath.'/uploadfile/upload';

      




        //$uploadaddress = rtrim($_SERVER['DOCUMENT_ROOT'],'/').'/'.'awjw/group6/wxcms/public/uploadfile/upload';

        $uploadaddress = $uploadPath;
        
        $files = $_FILES['theFile'];
        $fileName = iconv('utf-8', 'gbk', $_REQUEST['fileName']);
        $totalSize = $_REQUEST['totalSize'];
        $isLastChunk = $_REQUEST['isLastChunk'];
        $isFirstUpload = $_REQUEST['isFirstUpload'];

        if ($_FILES['theFile']['error'] > 0) {
            $status = 500;
        } else {
            // 此处为一般的文件上传操作
            // if (!move_uploaded_file($_FILES['theFile']['tmp_name'], 'upload/'. $_FILES['theFile']['name'])) {
            //     $status = 501;
            // } else {
            //     $status = 200;
            // }

            // 以下部分为文件断点续传操作
            // 如果第一次上传的时候，该文件已经存在，则删除文件重新上传
            if ($isFirstUpload == '1' && file_exists("$uploadaddress/". $fileName) && filesize("$uploadaddress/". $fileName) == $totalSize) {
                unlink("$uploadaddress/". $fileName);
            }

            // 否则继续追加文件数据
            if (!file_put_contents("$uploadaddress/". $fileName, file_get_contents($_FILES['theFile']['tmp_name']), FILE_APPEND)) {
                $status = 501;
            } else {
                // 在上传的最后片段时，检测文件是否完整（大小是否一致）
                if ($isLastChunk === '1') {
                    if (filesize("$uploadaddress/". $fileName) == $totalSize) {

                        $data['imgadd'] = $fileName;
                        $data['fd_id'] = $userid;

                        //房屋图片id
                        $data['fw_id'] = $Request->session()->get('img_id');

                        $res = DB::table('fd_image')->insert($data);

                        $status = 200;
                    } else {
                        $status = 502;
                    }
                } else {
                    $status = 200;
                }
            }
        }

        echo json_encode(array(
            'status' => $status,
            'totalSize' => filesize("$uploadaddress/". $fileName),
            'isLastChunk' => $isLastChunk
        ));



    }


        public function rentlists()
        {
            $r_adress=\Request::Input('r_adress');
            $list=DB::select("SELECT * FROM rent_house where r_adress like '%$r_adress%'");
            //发送不重复的区域`
            $arr1=DB::select("SELECT DISTINCT(r_district) FROM rent_house");
            //发送不重复的价格
            $arr2=DB::select("SELECT DISTINCT(r_price) FROM rent_house");
            //发送不重复的的类型
            $arr3=DB::select("SELECT DISTINCT(r_type) FROM rent_house");
            $ym="http://www.back.com/";
            $data['ym']=$ym;
            $data['list']=$list;
            return view("static_wx/rentlist",$data,['arr1'=>$arr1,'arr2'=>$arr2,'arr3'=>$arr3]);
        }


}
