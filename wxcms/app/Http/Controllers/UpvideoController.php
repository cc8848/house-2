<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\rent_house;
use DB;
use App\History;
use Input;
class UpvideoController extends Controller
{
    public function upVideo(Request $request){

        $result = ['code'=>0,'error'=>''];

        $file = $request->file('r_video');
        if($file->isValid()){
            $clientName = $file->getClientOriginalName();    //客户端文件名称..
            $tmpName = $file->getFileName();   //缓存在tmp文件夹中的文件名例如php8933.tmp 这种类型的.
            $realPath = $file->getRealPath();     //这个表示的是缓存在tmp文件夹下的文件的绝对路径
            $entension = $file->getClientOriginalExtension();   //上传文件的后缀.
            $file_size = $file->getClientSize();
            $mimeTye = $file->getMimeType();    //也就是该资源的媒体类型
            $newName =  $clientName;    //定义上传文件的新名称
            $file_type = ['mp4','rmvb','MOV','wmv','avi'];
            if($file_size < 50*1024*1024){

                if(in_array($entension,$file_type)){
                    $path = $file->move('video', $newName);

                    $result['code'] = 1;
                    $result['error'] = 'ok';
                    $result['path'] = 'video/'.$newName;
                }else{
                    $result['error'] = '视频格式不支持';
                }

            }else{
                $result['error'] = '视频最大不得超过50M';
            }

        }else{
            $result['error'] = '上传失败';
        }
        $result = json_encode($result);
        echo "<textarea>$result</textarea>";
    }

    public function uptest(){
        return view('static_wx/uptest');
    }
}