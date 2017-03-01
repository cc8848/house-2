<?php

use Illuminate\View\Middleware\ShareErrorsFromSession;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 首页幻灯广告 </title>
    <meta name="Copyright" content="Douco Design." />
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcHead">
        {{--顶部公共页面--}}
    @include('common/top')
    </div>
    <!-- dcHead 结束 --> <div id="dcLeft">
   {{--左侧公共页面--}}
    @include('common/nav_left')
</div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>房东管理</strong> </div>   <div class="mainBox imgModule">
            <h3>房东管理
<a href="landlord_list" class="actionBtn">房东列表</a>
            </h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th>房东管理</th>
                </tr>
                <tr>
                    <td width="350" valign="top">
                        <form action="{{url('landlord_add')}}" method="post" enctype="multipart/form-data">
                            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                                <tr>
                                    <td><b>房东名称：</b>
                                        <input type="text" name="r_name"  size="20" class="inpMain" id="r_name"/>
                                        <span id="r_name_info"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>房东密码</b>
                                        <input type="password" name="r_pwd" class="inpFlie" />          </td>
                                </tr>
                                <tr>
                                    <td><b>电话</b>
                                        <input type="text" name="r_tel"  size="40" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>电子邮箱</b>
                                        <input type="text" name="r_email"  size="20" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>性别</b>
                                        <input type="radio" name="r_sex" value="1" size="20" class="inpMain">男
                                        <input type="radio" name="r_sex" value="2" size="20" class="inpMain">女
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>年龄</b>
                                        <input type="text" name="r_age" size="20" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
        
                                        <input name="submit" class="btn" type="submit" value="提交" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 1501phpA6组，并保留所有权利。              </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>

</body>
</html>
<script src="jquery-1.8.1.min.js"></script>
<script>
    $('#r_name').blur(function(){
        var r_name = $(this).val();
        $.ajax({
            url:"{{url('landlord_add')}}",
            type:'post',
            data:"r_name="+r_name,
            dataType:'json',
            success:function(msg)
            {
                //alert(msg);
                if(strlen(msg.r_name)> 0)
                {
                    $('#r_name_info').html(1111);            
                }
            }
        })

    })


</script>