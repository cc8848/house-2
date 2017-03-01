<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心</title>
    <meta name="Copyright" content="Douco Design." />
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<div id="dcWrap"> <div id="dcHead">
        {{--顶部公共页面--}}
        @include('common/top')
    </div>
    <!-- dcHead 结束 --> <div id="dcLeft">
        {{--左侧公共页面--}}
        @include('common/nav_left')




    </div>

    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>自定义导航栏</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="nav_add" class="actionBtn">添加导航</a>自定义导航栏</h3>
            <div class="navList">
                <ul class="tab">
                    {{-- <li><a href="nav.php" class="selected">主导航</a></li>--}}
                    <!--   <li><a href="nav.php?type=top">顶部</a></li>
                       <li><a href="nav.php?type=bottom">底部</a></li>-->
                </ul>
                <center>
                    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                        <tr>
                            <th>自定义导航列表</th>
                        </tr>
                        <tr>

                            <td valign="top">
                                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                                    <tr>
                                        <td width="60">导航名称</td>
                                        <td width="60">导航地址</td>
                                        <td width="60">导航状态</td>
                                        <td width="60">导航照片</td>
                                        <td width="60" align="center">排序</td>
                                        <td width="60" align="center">操作</td>
                                    </tr>
                                    @foreach ($arr as $k=>$v)
                                        <tr n_id="{{$v->n_id}}">
                                            <td align="center">{{$v->n_name}}</td>
                                            <td>{{$v->n_link}}</td>
                                            <td>
                                                @if ($v->n_status==1)
                                                    <span class="dian">开启</span>
                                                @else
                                                    <span class="dian">弃用</span>
                                                @endif
                                            </td>
                                            <td><img src="{{$v->n_img}}" alt="" width="50" height="50"></td>
                                            <td align="center">{{$v->n_order}}</td>
                                            <td align="center"><a href="del?id={{$v->n_id}}">删除</a></td>
                                        </tr>
                                    @endforeach
                                    <tr><td></td><td>
                                            {!! $arr->render() !!}
                                        </td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 1501phpA6组，并保留所有权利。
            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>
<script src="./js.js"></script>
<script>
    $(function(){
        $(document).on('click','.dian',function(){
            var zhi=$(this).html();
            var n_id=$(this).parents('tr').attr("n_id");
            if(zhi=="弃用")
            {
                var zstatus=1;
            }else if(zhi=="开启")
            {
                var zstatus=0;
            }
            $.ajax({
                type:"post",
                url:"classify_up",
                data:{
                    zstatus:zstatus,
                    n_id:n_id
                },
                success:function(data) {
                    if(data==1){
                        location.href='nav_list';
                    }
                }
            });

        });
    });
</script>