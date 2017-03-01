<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 房屋列表 </title>
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
        <div id="urHere">DouPHP 管理中心<b>></b><strong>房屋列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="house_add" class="actionBtn add">新增房屋</a>房屋列表</h3>
            <div class="filter">
                <form action="house_search" method="post">
                    <select name="cat_id">
                        <option value="0" >—请选择分类—</option>
                        <option value="1"> 大户型</option>
                        <option value="2"> 中小户型</option>
                    </select>
                    <input  name="type" class="inpMain" placeholder="请输入房屋类型" size="20" />
                    <input  name="r_name" class="inpMain" placeholder="请输入房东名称" size="20" />
                    <input name="submit" class="btnGray" type="submit" value="搜索" />
                </form>
    <span>
        <a class="btnGray" href="article.php?rec=sort">开始筛选</a>
        </span>
            </div>
            <div id="list">
                <form name="action" method="post" action="article.php?rec=action">
                    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                        <tr>
                            <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
                            <th width="40" align="center">编号</th>
                            <th align="center">房屋名称</th>
                            <th width="80" align="center">房东</th>
                            <th width="150" align="center">房屋价格</th>
                            <th width="80" align="center">房屋类型</th>
                            <th width="80" align="center">操作</th>
                        </tr>
                        @foreach($data as $v)

                            <tr>
                                <td align="center"><input type="checkbox" name="checkbox[]" value="10" /></td>
                                <td align="center">{{$v->rent_id}}</td>
                                <td align="center"><a href="house_minute?id={{$v->rent_id}}&&name={{$v->r_name}}">{{$v->r_adress}}</a></td>
                                <td><a href="article.php?rec=edit&id=10">{{$v->r_name}}</a></td>
                                <td align="center"><a href="article.php?cat_id=1">{{$v->r_price}}</a></td>
                                <td align="center">{{$v->r_type}}</td>
                                <td align="center">
                                    <a href="house_update?rent_id={{$v->rent_id}}">编辑</a> | <a href="house_del?rent_id={{$v->rent_id}}">删除</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </form>
        </div>
            <div class="clear"></div>
            {{--{!! $data->render() !!}--}}
            <div class="pager" style="float:left;margin-left:400px;"> <a href="house_list?page=1">第一页</a> <a href="house_list?page={{$last}}">上一页 </a> <a href="house_list?page={{$next}}">下一页 </a> <a href="house_list?page={{$number}}">最末页</a></div>           </div>
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
<script type="text/javascript">

    onload = function()
    {
        document.forms['action'].reset();
    }

    function douAction()
    {
        var frm = document.forms['action'];

        frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
    }

</script>
</body>
</html>