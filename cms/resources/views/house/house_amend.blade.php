<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 添加房屋 </title>
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
        <div id="urHere">DouPHP 管理中心<b>></b><strong>新增房屋</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="{{url('house_list')}}" class="actionBtn">房屋列表</a>新增房屋</h3>
            <form action="house_updatepro" method="post" enctype="multipart/form-data">

                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    @foreach($data as $v)
                        <input type="hidden" name="rent_id"value="{{$v->rent_id}}">

                        {{--<tr>--}}
                        {{--<td align="right">房东名字</td>--}}
                        {{--<td>--}}
                        {{--<input type="text" name="r_name" value="{{$v->r_name}}" size="50" class="inpMain" />--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td width="90" align="right">房源地址</td>
                            <td>
                                <input type="text" name="r_adress" value="{{$v->r_adress}}" size="80" class="inpMain" />
                            </td>
                        </tr>
                        <tr>
                            <td width="90" align="right">房源价格</td>
                            <td>
                                <input type="text" name="r_price" value="{{$v->r_price}}" size="80" class="inpMain" />
                            </td>
                        </tr>
                        <tr>
                            <td width="90" align="right">位置(楼层高度)</td>
                            <td>
                                <input type="text" name="r_floor" value="{{$v->r_area}}" size="80" class="inpMain" />
                            </td>
                        </tr>
                        <tr>
                            <td width="90" align="right">面积</td>
                            <td>
                                <input type="text" name="r_area" value="{{$v->r_floor}}" size="80" class="inpMain" />
                            </td>
                        </tr>
                        <tr>
                            <td width="90" align="right">房源类型（几室几厅）</td>
                            <td>
                                <input type="text" name="r_type" value="{{$v->r_type}}" size="80" class="inpMain" />
                            </td>
                        </tr>
                        <tr>
                            <td width="90" align="right">装修</td>
                            <td>
                                <input type="text" name="r_fixture" value="{{$v->r_fixture}}" size="80" class="inpMain" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">房屋类型</td>
                            <td>
                                <select name="r_form">
                                    <option value="0">请选择分类</option>
                                    <option value="公寓"> 公寓</option>
                                    <option value="别墅"> 别墅</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">租赁方式</td>
                            <td>
                                <select name="r_way">
                                    <option value="0">请选择方式</option>
                                    <option value="合租"> 合租</option>
                                    <option value="整租"> 整租</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">房屋照片</td>
                            <td>
                                <input type="file" name="image" size="38" class="inpFlie" />
                                <img src="images/icon_no.png"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="token" value="7e4a88fb" />
                                <input type="hidden" name="image" value="">
                                <input type="hidden" name="id" value="">
                                <input name="submit" class="btn" type="submit" value="修改" />
                            </td>
                        </tr>
                    @endforeach
                </table>
            </form>
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
<!--<script type="text/javascript">

    onload = function()
    {
        document.forms['action'].reset();
    }

    function douAction()
    {
        var frm = document.forms['action'];

        frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
    }

</script>-->
</body>
</html>