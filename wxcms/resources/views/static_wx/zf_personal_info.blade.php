<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <title>个人信息</title>
    <link href="{{url('static_wx/css/personal_info.css')}}" rel="stylesheet" type="text/css" />
    <script src="http://kjschoolttt.oss-cn-beijing.aliyuncs.com/jquery-1.8.3.min.js"></script>
</head>
<body>

<header>
    我的个人信息
</header>

<table width="100%">
    <tr>

        <td colspan="2" align="center" height="55;"><img src="http://localhost/aiwujiwu/6group/cms/public/static_wx/img/member.png"></td>
    </tr>
    <tr>
        <td align="right">用户名:</td>
        <td align="left"><input type="text" value="{{$userinfo->username}}" id="username"></td>
    </tr>
    <tr>
        <td align="right">电话:</td>
        <td align="left"><input type="text" value="{{$userinfo->mobile_phone}}" id='mobile_phone'></td>
    </tr>
    <tr>
        <td align="right">邮箱:</td>
        <td align="left"><input type="text" value="{{$userinfo->email}}" id='email'></td>
    </tr>
    <tr>
        <td align="right">注册时间:</td>
        <td align="left">{{$userinfo->add_time}}</td>
    </tr>



    <tr class="acss_1">
        <td align="center" colspan="2">
            <a id="acss_left">修  改</a>

            <a href="{{url('zf_personal')}}">返  回</a>
        </td>
    </tr>

</table>

</body>
<script>


$("#acss_left").click(function(){

    var username = $("#username").val();  //用户名
    var mobile_phone = $("#mobile_phone").val();  //手机
    var email = $("#email").val();  //手机
    var token = "{{csrf_token()}}";

    $.ajax({
       type: "POST",
       url: "{{url('personalupd')}}",
       data: {_token:token,username:username,mobile_phone:mobile_phone,email:email},
       success: function(msg){

        alert( msg );
       }
         
    });


})

</script>
</html>