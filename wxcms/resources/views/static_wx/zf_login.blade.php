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
        <form action="{{url('odu')}}" enctype="multipart/form-data" method="post">
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
        <div class="other_login">
            <div class="other"></div>
            <span>其他方式登录</span>
            <div class="other"></div>
        </div>
        <div class="other_choose">
            <a onclick="toLogin()">
                <img src="{{url('static_wx/img')}}/qq.png" alt=""/>
            </a>
            <a href="">
                <img src="{{url('static_wx/img')}}/wx.png" alt=""/>
            </a>
            <a onclick="wbLogin()">
                <img src="{{url('static_wx/img')}}/wb.png" alt=""/>
            </a>
        </div>
    </div>
</body>
<script>
    function toLogin()
    {
        //以下为按钮点击事件的逻辑。注意这里要重新打开窗口
        //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口
//        var A=window.open("https://graph.qq.com/oauth2.0/authorize?response_type=token&client_id=101369412&redirect_uri=http://www.kjschool.net/api.php","TencentLogin",
//                "width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
    window.location.href='https://graph.qq.com/oauth2.0/authorize?response_type=token&client_id=101387158&redirect_uri=http://www.kjschool.net/api.php';

    }
    function wbLogin()
    {
        //以下为按钮点击事件的逻辑。注意这里要重新打开窗口
        //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口
//        var A=window.open("https://graph.qq.com/oauth2.0/authorize?response_type=token&client_id=101369412&redirect_uri=http://www.kjschool.net/api.php","TencentLogin",
//                "width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
    window.location.href='https://api.weibo.com/oauth2/authorize?client_id=2887630111&redirect_uri=http://house.wlf928.cn/wblogin';

    }
</script>
</html>