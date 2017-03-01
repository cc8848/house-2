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
 * 房源控制器
 * @author  chenyang 
 */
class HouseController extends CommonController
{
    /**
     * 展示房源列表
     * @return [type] [description]
     */
    public function house_list()
    {

        //dd($data);
        //获取当前数据总条数
        $a= DB::select('select count(*) from rent_house');
        $str = (array)$a[0];
        $count=$str['count(*)'];
        //定义每页写的条数
        $length=3;
        //获取总页数
        $number=ceil($count/$length);
        //获取当前页
        $page=isset($_GET['page'])?$_GET['page']:1;
        //计算偏移量
        $limit=($page-1)*$length;
        //下一页
        $next=$page+1>$number?$page:$page+1;
        //上一页
        $last=$page-1<1?1:$page-1;
        $data = DB::select("select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id limit $limit,$length");
        //dd($data);
        return view('house/house_list', ['data' => $data,'number'=>$number,'last'=>$last,'next'=>$next]);
    }
        /*
         * 搜索列表
         */
    public function house_search(Request $request){
        $data=$request::all();
       // dd($data);
        $a= DB::select('select count(*) from rent_house');
        $str = (array)$a[0];
        $count=$str['count(*)'];
        //定义每页写的条数
        $length=3;
        //获取总页数
        $number=ceil($count/$length);
        //获取当前页
        $page=isset($_GET['page'])?$_GET['page']:1;
        //计算偏移量
        $limit=($page-1)*$length;
        //下一页
        $next=$page+1>$number?$page:$page+1;
        //上一页
        $last=$page+1<1?$page+1:1;
       // $data = DB::select("select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id limit $limit,$length");
        //dd($data);
        //return view('house/house_list', ['data' => $data,'number'=>$number,'last'=>$last,'next'=>$next]);
        $type=$data['type'];
        $r_name=$data['r_name'];
        //echo $type;echo $r_name;die;
        //如果只是查询类型
        if(empty($r_name)&& !empty($type)){

            $data = DB::select("select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id where r_type like '%$type%'");
            return view('house/house_list', ['data' => $data,'number'=>$number,'last'=>$last,'next'=>$next]);
        }else if(empty($type)&& !empty($r_name)){
            //如果没有输入类型  只是查询房东名字
            $data = DB::select("select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id where r_name like '%$r_name%'");

            return view('house/house_list', ['data' => $data,'number'=>$number,'last'=>$last,'next'=>$next]);
        }else if(empty($type)&& empty($r_name)){
            $data = DB::select('select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id');
            return view('house/house_list', ['data' => $data]);

        }else{
            $data = DB::select("select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id where r_name like '%$r_name%' and r_type like '%$type%'");
            return view('house/house_list', ['data' => $data,'number'=>$number,'last'=>$last,'next'=>$next]);
        }
    }
    /**
     * 房源添加页面
     * @return [type] [description]
     */
    public function house_add()
    {
            $data=DB::table('renter')->get();
            $res=DB::table('label')->select('label_id','label_name')->where('status','=',1)->get();
        return view('house/house_add',['data'=>$data],['res'=>$res]);
    }
    /*
     * 执行添加房源操作
     */
    public function add_pro(Request $request)
    {
        $data = $request::all();
        $file = Request::file('image');    //获取文件名称
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();    //客户端文件名称..
            $tmpName = $file->getFileName();   //缓存在tmp文件夹中的文件名例如php8933.tmp 这种类型的.
            $realPath = $file->getRealPath();     //这个表示的是缓存在tmp文件夹下的文件的绝对路径
            $entension = $file->getClientOriginalExtension();   //上传文件的后缀.
            $mimeTye = $file->getMimeType();    //也就是该资源的媒体类型
            $newName =  $clientName . "." . $entension;    //定义上传文件的新名称
            $path = $file->move('images', $newName);    //把缓存文件移动到制定文件夹
            $data['r_img']=$path;
            //获取新增房源id
            $rent_id=DB::table('rent_house')->insertGetId(
                array('r_adress' =>$data['r_adress'],
                    'r_price'=>$data['r_price'],
                    'r_floor'=>$data['r_area'],
                    'r_area'=>$data['r_floor'],
                    'r_type'=>$data['r_type'],
                    'r_fixture'=>$data['r_fixture'],
                    'r_form'=>$data['r_form'],
                    'r_way'=>$data['r_way'],
                    'r_img'=>$data['r_img'],
                    'landlord_id'=>$data['landlord_id'],
                ));
            if($rent_id){
                //循环入库  标签 房源关联表
                foreach($data['label_id'] as $key =>$value){
                    $rend_label=DB::table('rent_label')->insert(
                        array('label_id' =>$value,
                            'rent_id'=>$rent_id
                        ));
                }
                echo $this->house_list();

//                return view('house.house_list',['data'=>$data]);
            }else{
               die('失败');
            }

        }

    }
    /*
    * 删除房屋信息通过ID进行数据操作
    */
    public function house_del(Request $request)
    {
        $id = $_GET['rent_id'];
        //echo $id;die;
        $res = DB::table('rent_house')->where('rent_id', '=', $id)->delete();
        if ($res) {
//            $data = DB::select('select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id');
//            return view('house/house_list',['data'=>$data]);
            echo $this->house_list();
        } else {
            die("失败");
        }
    }
    /*
    * 修改数据
    */
    public function house_update(){
        $id=$_GET['rent_id'];
        $data = DB::select("select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id where rent_id='$id'");

       // $data = DB::table('rent_house')->where('rent_id',$id)->first();
        //dd($data);
        return view('house/house_update',['data'=>$data]);

    }
    /*
     * 接受传过来的值进行修改操作
     */
    public function house_updatepro(Request $request){
        $data=$request::all();
        $file = Request::file('image');    //获取文件名称
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();    //客户端文件名称..
            $tmpName = $file->getFileName();   //缓存在tmp文件夹中的文件名例如php8933.tmp 这种类型的.
            $realPath = $file->getRealPath();     //这个表示的是缓存在tmp文件夹下的文件的绝对路径
            $entension = $file->getClientOriginalExtension();   //上传文件的后缀.
            $mimeTye = $file->getMimeType();    //也就是该资源的媒体类型
            $newName = $clientName . "." . $entension;    //定义上传文件的新名称
            $path = $file->move('images', $newName);    //把缓存文件移动到制定文件夹
            $data['r_img'] = $path;
            //echo $data['r_img'];die;
            $res = DB::table('rent_house')
                ->where('rent_id', $data['rent_id'])
                ->update(array('r_adress' => $data['r_adress'],
                        'r_img' => $data['r_img'],
                        'r_price' => $data['r_price'],
                        'r_area' => $data['r_area'],
                        'r_floor' => $data['r_floor'],
                        'r_type' => $data['r_type'],
                        'r_fixture' => $data['r_fixture'],
                        'r_form' => $data['r_form'],
                        'r_way' => $data['r_way'],
                    )
                );
        }
        if($res){
//            $data = DB::select('select * from rent_house INNER JOIN renter on rent_house.landlord_id=renter.r_id');
//            return view('house/house_list',['data'=>$data]);
            echo $this->house_list();
        }else{
            echo "no fail";
        }
    }
    /*
     * 详情页的展示
     */
    public  function house_minute(Request $request){
        $id = $_GET['id'];
        $name=$_GET['name'];
        $data = DB::table('rent_house')->where('rent_id', '=', $id)->get();
        //dd($data);
        return view('house.house_minute',['data'=>$data,'name'=>$name]);
    }
    /*
     * 修改详情页
     */
//   public function house_amend(){
//       $id=$_GET['id'];
//       $name=$_GET['name'];
//       $data = DB::table('rent_house')->where('rent_id', '=', $id)->get();
//       return view('house.house_amend',['data'=>$data,'name'=>$name]);
//   }

}