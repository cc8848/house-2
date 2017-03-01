
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
<a href="landlord_add" class="actionBtn">房东添加</a>
            </h3>

            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td style="height:50px;align:center">房东列表</td>
                </tr>
                <tr align="center">

                    <td valign="top">
                        <table width="100%" border="0" cellpadding="8" cellspacing="5" class="tableOnebor" align="center">
                            <tr>
                                <td height="50">ID</td>
                                <td width="80">房东名称</td>
                                <td>性别</td>
                                <td>联系邮箱</td>
                                <td>添加时间</td>
                                <td>联系方式</td>
                                <td>操作</td>
                            </tr>
                            @foreach($landlord_list as $v)
                            <tr>
                                <td height="50">{{$v['r_id']}}</td>
                                <td>{{$v['r_name']}}</td>
                                <td>
                                @if($v['r_sex'] == 1)
                                男
                                @elseif($v['r_sex'] == 2)
                                女
                                @endif



                                </td>
                                <td>{{$v['r_email']}}</td>
                                <td>{{date('Y-m-d H:i:s',$v['r_time'])}}</td>         
                                <td>{{$v['r_tel']}}</td>
                                <td>
                <a class="btnPayment" style="background:green" href="{{url('landlord_update')}}?r_id={{$v['r_id']}}">编辑</a>
                <a class="btnPayment" href="javascript:void(0)" id="renter_del" value="{{$v['r_id']}}"> 删除</a></td>
                              
                            </tr>
                            @endforeach
                        </table>
                        {{$landlord_list->render()}}
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
                版权所有 1501phpA6组，并保留所有权利。            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>
<script src="jquery-1.8.1.min.js"></script>
<script>
    $('.btn-danger').click(function(){
        var r_id = $(this).attr('value');
        var _this = $(this);
        $.ajax({
            type:"get",
            url:"{{url('landlord_delete')}}",
            data:"r_id="+r_id,
            dataType:"json",
            success:function(msg)
            {
               if(msg.status == 1)
               {
                    alert(msg.msg);
                    _this.parent().parent().remove();
               }
               else if(msg.status == 2)
               {
                    alert(msg.msg);
               }
                else if(msg.status == 3)
               {
                    alert(msg.msg);
               }
            }
        })
    })
</script>