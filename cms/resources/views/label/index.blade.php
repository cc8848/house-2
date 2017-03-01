<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 标签列表 </title>
    <meta name="Copyright" content="Douco Design." />
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
    <script type="text/javascript" src="js/jquery.autotextarea.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcHead">
        {{--顶部公共页面--}}
        @include('common/top')
    </div>
    <!-- dcHead 结束 --> <div id="dcLeft">
        {{--左侧公共页面--}}
        @include('common/nav_left')</div>
       <div id="dcMain">
            <!-- 当前位置 -->
            <div id="urHere">DouPHP 管理中心<b>></b><strong>标签列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
                <h3><a href="label_add" class="actionBtn add">新增标签</a>标签列表</h3>
                <div id="list">
                    <form name="action" method="post" action="article.php?rec=action">
                        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                            <tr>
                                <th width="40" align="center">编号</th>
                                <th align="center">标签名称</th>
                                <th width="80" align="center">状态</th>
                                <th width="80" align="center">操作</th>
                            </tr>
                            @foreach($res as $val)
                            <tr n_id="{{$val->label_id}}">
                                <td align="center">{{$val->label_id}}</td>
                                <td align="center">{{$val->label_name}}</td>
                                <td align="center">
                                    @if($val->status ==1 )
                                        <span class="status">启用</span>
                                    @else
                                        <span class="status">弃用</span>
                                    @endif
                                </td>
                                <td align="center">
                                    <a href="label_del?label_id={{$val->label_id}}">删除</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </form>
                </div>
                <div class="clear"></div>
                {{--{!! $data->render() !!}--}}
               <div class="pager" style="margin-right:450px;">
                   {{$res->render()}}
               </div>
           </div>
        </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 1501phpA6组，并保留所有权利。            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
<script src="./js.js"></script>
<script type="text/javascript">
    $(function(){
        $(document).on('click','.status',function(){
            var use=$(this);
            var zhi=$(this).html();
            var n_id=$(this).parents('tr').attr("n_id");
            if(zhi=="弃用")
            {
                var zstatus=1;
            }else if(zhi=="启用")
            {
                var zstatus=0;
            }
            $.get("label_update_status",{status:zstatus,label_id:n_id },function(msg){
                if(msg==0){
                    alert("修改失败");
                }else if(msg==1){
                    use.html("弃用");
                }else if(msg==2){
                    use.html("启用");
                }
            })
        });
    });

</script>
</body>
</html>