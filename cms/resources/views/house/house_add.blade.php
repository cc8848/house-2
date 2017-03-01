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
            <form action="add_pro" method="post" enctype="multipart/form-data">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <td align="right">房东名字</td>
                        <td>
<!--                             <input type="text" name="r_name" value="" size="50" class="inpMain" />
 -->                            <select name="landlord_id" id="">
                            @foreach($data as $v)
                                <option value="{{$v->r_id}}">{{$v->r_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="90" align="right">房源地址</td>
                        <td>
                            <input type="text" name="r_adress" value="" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td width="90" align="right">房源价格</td>
                        <td>
                            <input type="text" name="r_price" value="" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td width="90" align="right">位置(楼层高度)</td>
                        <td>
                            <input type="text" name="r_floor" value="" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td width="90" align="right">面积</td>
                        <td>
                            <input type="text" name="r_area" value="" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td width="90" align="right">房源类型（几室几厅）</td>
                        <td>
                            <input type="text" name="r_type" value="" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td width="90" align="right">装修</td>
                        <td>
                            <input type="text" name="r_fixture" value="" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">房屋类型</td>
                        <td>
                            <select name="r_form">
                                <option value="0">请选择分类</option>
                                <option value="1"> 公寓</option>
                                <option value="2"> 别墅</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">房屋所属标签</td>
                        <td style="background: lightgrey;">
                            @foreach($res as $val)
                                <div style=" width: 30% ; float:left;">
                                     <span style="display:block"><input type="checkbox" name="label_id[]"  value="{{$val->label_id}}">{{$val->label_name}}</span>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td align="right">租赁方式</td>
                        <td>
                            <select name="r_way">
                                <option value="0">请选择方式</option>
                                <option value="1"> 合租</option>
                                <option value="2"> 整租</option>
                            </select>
                        </td>
                    </tr>
                    {{-- <tr>
                         <td align="right" valign="top">房屋描述</td>
                         <td>
                             <link rel="stylesheet" href="js/kindeditor/themes/default/default.css" />
                            <link rel="stylesheet" href="js/kindeditor/plugins/code/prettify.css" />
                             <script charset="utf-8" src="js/kindeditor/kindeditor.js"></script>
                             <script charset="utf-8" src="js/kindeditor/lang/zh_CN.js"></script>
                             <script charset="utf-8" src="js/kindeditor/plugins/code/prettify.js"></script>
                             <script>
                                 KindEditor.ready(function(K) {
                                     var editor1 = K.create('textarea[name="content"]', {
                                         cssPath : '../plugins/code/prettify.css',
                                         uploadJson : '../php/upload_json.php',
                                         fileManagerJson : '../php/file_manager_json.php',
                                         allowFileManager : true,
                                         afterCreate : function() {
                                             var self = this;
                                             K.ctrl(document, 13, function() {
                                                 self.sync();
                                                 K('form[name=example]')[0].submit();
                                             });
                                             K.ctrl(self.edit.doc, 13, function() {
                                                 self.sync();
                                                 K('form[name=example]')[0].submit();
                                             });
                                         }
                                     });
                                     prettyPrint();
                                 });
                             </script>
                             <textarea id="content" name="content" style="width:780px;height:400px;" class="textArea"></textarea>
                         </td>
                     </tr>--}}
                    <tr>
                        <td align="right">房屋照片</td>
                        <td>
                            <input type="file" name="image" size="38" class="inpFlie" />
                            <img src="images/icon_no.png"></td>
                    </tr>
                    {{--<tr>
                        <td align="right">关键字</td>
                        <td>
                            <input type="text" name="keywords" value="" size="50" class="inpMain" />
                        </td>
                    </tr>--}}
                    {{-- <tr>
                         <td align="right">简单描述</td>
                         <td>
                             <input type="text" name="description" value="" size="50" class="inpMain" />
                         </td>
                     </tr>--}}
                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="token" value="7e4a88fb" />
                            <input type="hidden" name="image" value="">
                            <input type="hidden" name="id" value="">
                            <input name="submit" class="btn" type="submit" value="提交" />
                        </td>
                    </tr>
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