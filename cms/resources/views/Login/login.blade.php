<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public1/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
    <link rel="stylesheet" type="text/css" href="public1/css/b_login.css">
	<title>后台登录页面</title>
</head>
<body>
<div class="login">
	<div class="loginmain">
		<h2>登录管理系统</h2>
		<!--	<form action="#" class="form-horizontal">-->
                <form action="check_login" method="post" onsubmit="return checksubmit()" name="form1" class="form-horizontal">
		           <!-- 让表单在一行中显示form-horizontal -->
		          <div class="form-group">
		              <label for="username" class="col-lg-1 control-label">用户名</label>
		              <div class="col-lg-4">
		                <input type="text" name="u_name" id="username" class="form-control">  <span name="u_names"></span>
		              </div>              
		          </div>
				  <div class="form-group"></div>
				  <div class="form-group"></div>

		          <div class="form-group">
		              <label for="password" class="col-lg-1 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
		              <div class="col-lg-4">
		                <input type="password" name="u_pwd" id="password" class="form-control"> <span name="u_pwds"></span>
		              </div>              
		          </div>
                   <div class="form-group"></div>
                   <!-- <div class="form-group"></div> -->

		        <!--  <div class="form-group">
		            <div class="col-lg-11 col-lg-offset-1">              
		                <span class="checkbox ">
		                    <label><input type="checkbox" name="" class="checkbox-inline">记住我</label> 
		                </span>           
		            </div>
		          </div>-->

		          <div class="form-group">
		            <div class="col-lg-4 col-lg-offset-1">
		                <input type="submit"  value="登录" class="btn btn-danger btn-lg">
		                <span class="text"></span>              
		            </div>

		          </div>

		    </form>
	</div>
	<div class="rightpic">
		<div id="container">
			<!-- <img src="picture/1.jpg" alt="" width="500px" height="330px"> -->
		</div>
	</div>
</div>

<script src="public1/public/js/jquery-3.1.1.min.js"></script>
<script src="public1/bootstrap/js/bootstrap.min.js"></script>
<script src="public1/public/js/delaunay.js"></script>
<script src="public1/public/js/TweenMax.js"></script>
<script src="public1/js/effect.js"></script>

<script src="public1/js/b_login.js"></script>
</body>
</html>
{{--<script language="javascript">--}}
    {{--//--->--}}
    {{--function checksubmit()--}}
    {{--{--}}
        {{--if (document.form1.u_name.value=="")--}}
        {{--{--}}
            {{--alert("请输入用户名！");--}}
            {{--document.form1.u_name.focus();--}}
            {{--return false;--}}
        {{--}else if(document.form1.u_pwd.value=="")--}}
        {{--{--}}
            {{--alert("请输入密码！");--}}
            {{--document.form1.u_pwd.focus();--}}
            {{--return false;--}}
        {{--}--}}
        {{--return true;--}}
    {{--}--}}
    {{--//--->--}}
{{--</script>--}}
{{--<script src="js.js"></script>--}}
{{--<script>--}}
    {{--$(function(){--}}
        {{--//验证用户名--}}
        {{--$("input[name='u_name']").blur(function(){--}}
            {{--var len=$(this).val();--}}
            {{--if(len.length=='')--}}
            {{--{--}}
                {{--alert('请填写用户名');--}}
            {{--}--}}
        {{--});--}}
        {{--//验证密码--}}
        {{--$("input[name='u_pwd']").blur(function(){--}}
            {{--var len=$(this).val();--}}
            {{--if(len.length=='')--}}
            {{--{--}}
                {{--alert('请填写密码');--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

