<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="viewport" content="height=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <title></title>
    <link rel="stylesheet" href="{{url('static_wx/css/common.css')}}"/>
    <link rel="stylesheet" href="{{url('static_wx/css/register.css')}}"/>
    <style>
        .message{
            background: none;
            padding-top: 10%;
        }
        .message input {
            width: 83%;
            margin: 0 4%;
        }
        .content form input:not(:nth-child(6)) {
            border: 0;
            margin-bottom: 8%;
        }
        .message .icons b{
            top: 14.5%;
            left: 11%;
        }
        .message .icons b:nth-child(2){
            top: 37%;
            left: 10%;
        }
        .message .icons b:nth-child(3){
            top: 60%;
        }
        .message .icons b:nth-child(4){
            top: 82%;
        }
        .code{
            top: 33.475%;
            right: 7.5%;
            background: #21a9f5;
            color: #ffffff;
            padding: 3.635% 5%;
        }
    </style>
</head>
<body>
    <div class="register">
        <div class="regTop">
            <span>找回密码</span>
            <a class="back" href="{{url('fd_login')}}">&lt;&nbsp;返回</a>
        </div>
        <div class="content">
            <form action="{{url('check_password')}}" method="post">
                <div class="message">
                    <input type="email" name="email" placeholder="邮箱"  required/>
                    <input name="code" type="text"  placeholder="输入验证码" pattern="[0-9]{4}" required/>
                    <input type="password" name="password" placeholder="请输入新密码" pattern="[0-9A-Za-z]{6,25}" required/>
                    <input type="password" name="password1" placeholder="请再次输入密码" pattern="[0-9A-Za-z]{6,25}" required/>
                    <div class="icons">
                        <b><img src="{{url('static_wx/img')}}/email.png" alt=""/></b>
                        <b><img src="{{url('static_wx/img')}}/zc-2.jpg" alt=""/></b>
                        <b><img src="{{url('static_wx/img')}}/zc-3.jpg" alt=""/></b>
                        <b><img src="{{url('static_wx/img')}}/zc-3.jpg" alt=""/></b>
                    </div>
                    <a class="code" href="javascript:void(0)">获取验证码</a>
                </div>
                <button class="submit" type="submit">找回密码</button>
            </form>
        </div>
    </div>
</body>
</html>
<script src="http://kjschoolttt.oss-cn-beijing.aliyuncs.com/jquery-1.8.3.min.js"></script>
<script>
    $('.code').click(function(){
        var email = $("input[name=email]").val();
        $.ajax({
            type:"post",
            data:'email='+email,
            dataType:'json',
            url:"{{url('newPassword')}}",
            success:function(msg){
                alert(msg.msg);
            }
        })    })
</script>
