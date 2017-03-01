<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2016/10/9
 * Time: 8:42
 */
class Curl{
    /**
     * 构造方法，初始化成员变量
     */
    public function __construct(){
        $this->curl=curl_init();
    }
    /**
     * @param $url
     * @param null $preg
     * @return int|mixed
     */
    public function get_info($url,$preg=null){
        $params[CURLOPT_URL]=$url;
        $params[CURLOPT_HEADER]=false;
        $params[CURLOPT_RETURNTRANSFER]=true;
        $params[CURLOPT_FOLLOWLOCATION]=true;
        $params[CURLOPT_USERAGENT]='Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1';
        $params[CURLOPT_POSTFIELDS] = '';
        //$this->cookies();
        curl_setopt_array($this->curl, $params);
        $content=curl_exec($this->curl);
        if(!empty($preg)&&isset($preg)){
            preg_match_all($preg,$content,$arr);
            unset($arr[0]);
            return $arr;
        }else{
            return $content;
        }
    }
    /**
     * @param $data 登录所需要的信息
     * @param $url 表单提交的地址
     * @return mixed 返回登录后页面内容
     */
    public function login_get_info($data,$url){
        $params[CURLOPT_URL]=$url;
        $params[CURLOPT_HEADER]=false;
        $params[CURLOPT_RETURNTRANSFER]=true;
        $params[CURLOPT_FOLLOWLOCATION]=true;
        $params[CURLOPT_USERAGENT]='Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1';
        $postfields= '';
        foreach ($data as $key => $value){
            $postfields .= urlencode($key) . '=' . urlencode($value) . '&';
        }
        $params[CURLOPT_POST] = true;
        $params[CURLOPT_POSTFIELDS]=$postfields;
        $this->cookies();
        curl_setopt_array($this->curl, $params);
        return curl_exec($this->curl);
    }

    /**
     * 模拟采集的cookie信息
     */
    private function cookies(){
        $cookie_path = './';
        if(isset($_COOKIE['cookie_jar'])&&($_COOKIE['cookie_jar']||is_file($_COOKIE['cookie_jar']))){
            $params[CURLOPT_COOKIEFILE] = $_COOKIE['cookie_jar'];
        }else{
            $cookie_jar=tempnam($cookie_path, 'cookie');
            $params[CURLOPT_COOKIEJAR] = $cookie_jar;
            setcookie('cookie_jar', $cookie_jar);
        }
    }
    /**
     * 采集远程图片
     * @param $img  图片路径  是一个数组
     * @param $save_path   图片保存在你本地的路径
     * @return bool
     */
    public function get_img($img,$save_path){
        for($i=0;$i<count($img);$i++) {
            $res=@file_get_contents($img[$i]);
            $img_type=substr($img[$i], strrpos($img[$i], "."));
            $path=$save_path.time().rand(1,9999999).mt_rand() .$img_type;
            $img[$i] = $path;
            file_put_contents($path,$res);
        }
        return $img;
    }


}