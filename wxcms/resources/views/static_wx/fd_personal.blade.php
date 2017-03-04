<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-rim-auto-match" content="none"/>
    <meta name="HandheldFriendly" content="true"/>
    <link type="text/css" rel="stylesheet" href="{{url('static_wx/css/style.css')}}">
    <script src="{{url('static_wx/js/jquery-1.8.2.min.js')}}"></script>
    <script src="{{url('static_wx/js/comment.js')}}"></script>
    <script src="{{url('static_wx/js/house.js')}}"></script>
</head>
<body>
	<header class="main1">
		<a href="{{url('wx')}}"><img src="{{url('static_wx/img')}}/logo.png" class="logo"></a>
		<div class="top">
				<div class="city" style="background: none; text-indent: 0; top: 0;">
					<span>房东中心
					</span>
				</div>

			</div>
		<a href="" class="me"><img src="{{url('static_wx/img')}}/me.png" width="20" height="30"></a>
	</header>
    <div class="member">
    	<a href="{{url('personal_info')}}" class="touxiang"><img src='{{asset("/public/uploadfile/upload/$f_toux")}}' width="54" height="54"></a>
    	<a class="member-btn">{{$username}}，欢迎登录</a>
    </div>
    <ul class="decript-list">



        	
        	<li>
        		<a href="{{url('add_housing')}}">发布新房源</a>
        	</li>

        	
        	<li>
        		<a href="{{url('agent')}}">我发布的房源</a>
        	</li>
        	
        	<li>
        		<a href="{{url('tenants')}}">我的租客</a>
        	</li>

            <li>
                <a href="{{url('personal_info')}}">个人信息</a>
            </li>
            <li>
                <a href="{{url('update_pass')}}">修改密码</a>
            </li>

            <li>
                <a href="{{url('outlogin')}}">退出登录</a>
            </li>
        	
        </ul>
</body>
</html>