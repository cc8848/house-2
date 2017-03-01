<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Renter,App\House;

// use Validator;
// use Illuminate\Routing\Controller as BaseController;
// //use Illuminate\Foundation\Validation\ValidatesRequests;
// //use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Request;
// use DB;
 //use Symfony\Component\HttpFoundation\Session\Session;
/**
 * 房东管理模块
 * @author   chenyang
 */
class LandlordController extends CommonController
{
    /**
     * 房东列表
     * @return [type] [description]
     */
    public function landlord_show()
    {
        //echo 111;die;
        $data['landlord_list'] = Renter::paginate(3);
        //dd($data);
        return view('landlord.landlord_show',$data);
    }

    /**
     * 房东添加/展示页面
     * @return [type] [description]
     */
    public function landlord_add()
    {
        if(\Request::isMethod('post'))
        {
            //dd(\Request::all());
            $validator = Validator::make(\Request::all(),[
            'r_name' => 'required|max:30',
            'r_pwd' => 'between:6,10|required',
            'r_tel'=>'digits:11',
            ]);
             if($validator->fails())
            {
            //存在错误
                $errors = $validator->errors()->toArray();
                //返回错误消息
               
                if(!empty($errors['r_name']) && is_array($errors['r_name']))
                {
                    echo json_encode(array('r_name'=>$errors['r_name']));
                }
            }       
            else
            {
                $new_renter = new Renter;
                $new_renter->r_name = \Request::all()['r_name'];
                $new_renter->r_pwd = md5(\Request::all()['r_pwd']);
                $new_renter->r_tel = \Request::all()['r_tel'];
                $new_renter->r_email = \Request::all()['r_email'];
                $new_renter->r_sex = \Request::all()['r_sex'];
                $new_renter->r_age = \Request::all()['r_age'];
                $new_renter->r_time = time();
                $result = $new_renter->save();
                if($result)
                {
                    echo $this->get_message(1,'5','恭喜您添加房东成功','landlord_list');
                }
                else
                {
                    echo $this->get_message(0,5,'很抱歉失败了','landlord_list');
                }
            }
        }
        else
        {
            return view('landlord.landlord_add');    
        }
    }

    public function landlord_delete()
    {
        $r_id = \Request::all()['r_id'];
        //判断房东名下是否存在房源，如果存在，需要删除全部房源才可以删除该房东
        $house_list = House::where(array('landlord_id'=>$r_id))->get()->toArray();
        if(!empty($house_list) && is_array($house_list))
        {
            //存在房源
            echo $this->get_json_info('2','该用户下存在房源，请删除后执行此操作','','');
        }
        else
        {
            //不存在房源
            $user = Renter::find($r_id);
            $result = $user->delete();
            if($result)
            {
                echo $this->get_json_info('1','删除成功','','');
            }
            else
            {
                echo $this->get_json_info('3','删除失败','','');   
            }
        }   
    }

    public function landlord_update()
    {
        if(\Request::isMethod('post'))
        {
            $landlord_info = Renter::find(\Request::all()['r_id']);
            $landlord_info->r_name = \Request::all()['r_name'];
            $landlord_info->r_pwd = md5(\Request::all()['r_pwd']);
            $landlord_info->r_tel = \Request::all()['r_tel'];
            $landlord_info->r_email = \Request::all()['r_email'];
            $landlord_info->r_sex = \Request::all()['r_sex'];
            $landlord_info->r_age = \Request::all()['r_age'];
            $result = $landlord_info->save();
            if($result)
            {
                echo $this->get_message(1,'5','恭喜您编辑房东成功','landlord_list');
            }
            else
            {
                echo $this->get_message(0,5,'很抱歉失败了','landlord_list');
            }




        }
        else
        {
            $r_id = \Request::all()['r_id'];
            $data['landlord_info'] = Renter::find($r_id)->toArray();
            return view('landlord/update_show',$data);
        }
    }
}