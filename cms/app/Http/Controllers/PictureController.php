<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Picture;
class PictureController extends CommonController
{
    public function picture_list()
    {
        $data = DB::table('picture')
            ->join('renter', 'renter.r_id', '=', 'picture.name')
            ->paginate(3);

        return view('picture.picture_list',['data'=>$data]);
    }

    /*
     * 新增图片
     */
    public function picture_add()
    {
        $data=DB::table('renter')->get();

        return view('picture.picture_add',['data'=>$data]);

    }

    /*
     * 添加图片
     */
    public function picture_add_pro(Request $request)
    {
        $data = $request::all();
        //dd($data);
        $file = $data['myfile'];
        //dd($file);
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();    //客户端文件名称..
            $tmpName = $file->getFileName();   //缓存在tmp文件夹中的文件名例如php8933.tmp 这种类型的.
            $realPath = $file->getRealPath();     //这个表示的是缓存在tmp文件夹下的文件的绝对路径
            //$entension = $file->getClientOriginalExtension();   //上传文件的后缀.
            $mimeTye = $file->getMimeType();    //也就是该资源的媒体类型
            $newName = $clientName ;    //定义上传文件的新名称. "." . $entension
            $path = $file->move('IMG', $newName);
            //$new_path = str_replace('\','/',$path);
            $data['myfile']=$path;

            $res=DB::table('picture')->insert(
                array('myfile' =>$data['myfile'],
                    'name'=>$data['name'],
                )
            );
            if($res){
                //$data = DB::select('select * from picture INNER JOIN renter on picture.name=renter.r_id');
                echo $this->picture_list();
                //return view('picture.picture_list',['data'=>$data]);
            }
        }
    }
    public function picture_del(Request $request)
    {
        $id = $_GET['id'];
        //echo $id;die;
        $res = DB::table('picture')->where('p_id', '=', $id)->delete();
        if ($res) {
           echo $this->picture_list();
        } else {
            die("失败");
        }
    }
}
?>