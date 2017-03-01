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
            <h3>自定义导航栏</h3>
            <script type="text/javascript">
            </script>
            <ul class="tab">
                <li><a href="#nav_add">添加站内导航</a></li>
            </ul>
            <div class="items">
                <div id="nav_add">
                    <form action="classify_ads"  method="post"  onsubmit="return checksubmit()" enctype="multipart/form-data">
                        <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableBasic">
                            <tr>
                                <td width="80" height="35" align="right">导航名称</td>
                                <td>
                                    <input type="text" id="n_name" name="n_name" value="" size="40" class="inpMain" /><span class="nav_names"></span>
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">链接地址</td>
                                <td>
                                    <input type="text" name="n_link" size="20" class="inpMain" id="n_link" /><span class="n_link"></span>
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">导航照片</td>
                                <td>
                                    <input type="file" name="n_img" size="20" class="inpMain" />
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">是否显示</td>
                                <td><input type="radio" value="1" name="n_status">是
                                    <input type="radio" value="0" name="n_status">否
                                </td>
                            </tr>
                            <tr>
                                <td height="35" align="right">排序</td>
                                <td>
                                    <input type="text" name="n_order" size="5" class="inpMain" /><span class="sorts"></span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="hidden" name="token" value="30fa081a" />
                                    <input name="submit" class="btn" type="submit" value="提交" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
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
<script src="./js.js"></script>
<script>
    $(function(){
        //验证导航名称
        $(document).on('blur','#n_name',function(){
            var n_name=$(this).val().length;
            if(n_name==0)
            {
                $('.nav_names').html("导航名称不能为空");
                return false;
            }else{
                $('.nav_names').html(" ");
                return true;
            }
        });
        //验证导航链接地址以及链接格式
        $(document).on('blur','#n_link',function(){
            var n_link=$(this).val();
            if(n_link.length==0)
            {
                $('.n_link').html('链接地址不能为空');
                return false;
            }else{
                reg=/^http:\/\/[a-zA-Z0-9]+\.[a-zA-Z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/;
                if(!reg.test(n_link)){
                    $(".n_link").html("请输入正确的inernet地址");
                }else{
                    $(".n_link").html("");
                }
            }
        });
    });
    //非空是阻止提交
    //导航名称
    function checksubmit()
    {
        if ($("#n_name").val().length==0)
        {
            alert("导航名称为空");
            return false;
        }
        //导航地址
        if($('#n_link').val().length==0)
        {
            alert("导航地址为空");
            return false;
        }
        //导航个事
        if($('.n_link').html()=="请输入正确的inernet地址")
        {
            alert("导航地址不正确");
            return false;
        }
        //导航状态
        if($("input[name='n_status']:checked").val()==null)
        {
            alert("导航状态不能为空");
            return false;
        }
        return true;
    }
</script>