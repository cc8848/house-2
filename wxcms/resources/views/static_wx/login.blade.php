<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title></title>
    <link rel="stylesheet" href="{{url('static_wx/css/common.css')}}"/>
    <link rel="stylesheet" href="{{url('static_wx/css/login.css')}}"/>
</head>
<body>
    <div id="login"></div>
    <div class="login_bg">
        <div id="logo">
            <img src="{{url('static_wx/img')}}/logo.png" alt=""/>
        </div>
        <form action="{{url('fd_personal')}}" enctype="multipart/form-data" method="post">
            <div class="userName">
                <lable>用户名：</lable>
                <input type="text" name="name" placeholder="请输入用户名"  required/>
            </div>
            <div class="passWord">
                <lable>密&nbsp;&nbsp;&nbsp;码：</lable>
                <input type="password" name="password" placeholder="请输入密码" pattern="[0-9A-Za-z]{6,50}" required/>
            </div>
            <div class="choose_box">
                <div>
                    <input type="checkbox" checked="checked" name="checkbox"/>
                    <lable>记住密码</lable>
                </div>
                <a href="{{url('register')}}">注册</a>

                <a href="{{url('newPassword')}}">找回密码/</a>
            </div>
            <button class="login_btn" type="submit">登&nbsp;&nbsp;录</button>
        </form>
        
    </div>
</body>

</html>