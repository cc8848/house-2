
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
        <div id="urHere">DouPHP 管理中心<b>></b><strong>图片管理</strong> </div>   <div class="mainBox imgModule">
            <h3>图片管理</h3>
            <h3><a href="picture_add" class="actionBtn">新增图片</a></h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th>图片列表</th>
                </tr>
                <tr align="center">

                    <td valign="top">
                        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                            <tr>
                                <td width="100">ID</td>
                                <td width="100">图片</td>
                                <td width="100" align="center">房主</td>
                                <td width="100" align="center">操作</td>
                            </tr>

                            @foreach($data as $v)
                                <tr>
                                    <td width="80">{{$v->p_id}}</td>
                                    <td><img src="{{$v->myfile}}" alt="" width="150" height="80"></td>
                                    <td width="100" align="center">{{$v->r_name}}</td>
                                    <td width="100" align="center"><a href="picture_del?id={{$v->p_id}}">删除</a></td>
                                </tr>
                            @endforeach

                        </table> 
                        <div class="pager" style="margin-right:450px;"> 
                           {{$data->render()}}
                        </div>           </div>


    </div>
    </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>