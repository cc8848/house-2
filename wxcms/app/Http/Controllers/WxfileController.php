<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class WxfileController extends Controller
{
     		// [name] => 03.jpg
       //      [type] => image/jpeg
       //      [tmp_name] => C:\Windows\php1915.tmp
       //      [error] => 0
       //      [size] => 117284

	//头像上传地址
    public function toux(Request $Request){

    	$currentPath =  $_SERVER['PHP_SELF'];  //当前路径

    	$newPath = dirname($currentPath);  //文件上传路径
              

               

    	//echo rtrim($_SERVER['DOCUMENT_ROOT'],'/');die;




    	$files = $_FILES['touxiang'];    

    	$filename = "Tx".time().$files['name'];
    	$file = $files['tmp_name'];

    	$uploadPath = rtrim($_SERVER['DOCUMENT_ROOT'],'/').$newPath.'/uploadfile/upload'; 


    	

    	$res = $fileupload = move_uploaded_file($file,$uploadPath."/".$filename);

    	if($res){
    		$fd_id = $Request->session()->get('fd_id');

    		$res = DB::table('renter')->where('r_id',$fd_id)->update(['r_toux'=>$filename]);
    		if($res){
    			$Request->session()->put('r_toux',$filename);
    		}


    	}




    	
    }



}
