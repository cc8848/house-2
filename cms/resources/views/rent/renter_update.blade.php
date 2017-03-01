
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
        <div id="urHere">DouPHP 管理中心<b>></b><strong>租户管理</strong> </div>   <div class="mainBox imgModule">
            <h3>租户管理</h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th>租户管理</th>
                </tr>
                <tr>
                    <td width="350" valign="top">
                        <form action="renter_updatepro" method="post" enctype="multipart/form-data">
                            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                                <input type="hidden" name="user_id"value="{{$data->user_id}}">

                                <tr>
                                    <td><b>用户名称：</b>
                                        <input type="text" name="username" value="{{$data->username}}" size="20" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>用户密码</b>
                                        <input type="password" name="password" value="{{$data->password}}" class="inpFlie" />          </td>
                                </tr>
                                <tr>
                                    <td><b>电话号码</b>
                                        <input type="text" name="mobile_phone" value="{{$data->mobile_phone}}" size="40" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>电子邮箱</b>
                                        <input type="text" name="email" value="{{$data->email}}" size="20" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="hidden" name="token" value="79db104d" />
                                        <input name="submit" class="btn" type="submit" value="修改" />
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