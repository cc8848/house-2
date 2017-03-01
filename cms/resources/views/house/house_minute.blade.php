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
        <div id="urHere">DouPHP 管理中心<b></b><strong>房屋详情</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="house_list" class="actionBtn add">回到列表</a>房主：{{$name}}</h3>
            <div class="filter">

    <span>
        </span>
            </div>
            <div id="list">
                <form name="action" method="post" action="article.php?rec=action">
                    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                        <tr>
                            <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
                            <th width="40" align="center">编号</th>
                            <th align="center">房屋地址</th>
                            <th width="80" align="center">房屋价格</th>
                            <th width="150" align="center">类型</th>
                            <th width="80" align="center">租赁方式</th>
                            <th width="80" align="center">装修</th>
                            <th width="80" align="center">面积</th>
                            <th width="80" align="center">楼层</th>
                            <th width="80" align="center">照片</th>
                            <th width="80" align="center">编辑</th>

                        </tr>
                        @foreach($data as $v)

                            <tr>
                                <td align="center"><input type="checkbox" name="checkbox[]" value="10" /></td>
                                <td align="center">{{$v->rent_id}}</td>
                                <td align="center">{{$v->r_adress}}</td>
                                <td align="center">{{$v->r_price}}</td>
                                <td align="center">{{$v->r_type}}</td>
                                <td align="center">{{$v->r_way}}</td>
                                <td align="center">{{$v->r_fixture}}</td>
                                <td align="center">{{$v->r_area}}</td>
                                <td align="center">{{$v->r_floor}}</td>
                                <td align="center"><img src="{{$v->r_img}}" width="80" height="100"></td>
                                <td align="center"><a href="house_amend?id={{$v->rent_id}}&&name={{$name}}">修改</a></td>

                            </tr>
                            @endforeach

                    </table>
                    <div class="action">
                        <select name="action" onchange="douAction()">
                            <option value="0">请选择...</option>
                            <option value="del_all">删除</option>
                            <option value="category_move">移动分类至</option>
                        </select>
                        <select name="new_cat_id" style="display:none">
                            <option value="0">未分类</option>
                            <option value="1"> 公司动态</option>
                            <option value="2"> 行业新闻</option>
                        </select>
                        <input name="submit" class="btn" type="submit" value="执行" />
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            {{--{!! $data->render() !!}--}}
            <div class="pager">总计 10 个记录，共 1 页，当前第 1 页 | <a href="article.php?page=1">第一页</a> 上一页 下一页 <a href="article.php?page=1">最末页</a></div>           </div>
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



</script>
</body>
</html>