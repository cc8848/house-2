
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 数据备份 </title>
    <meta name="Copyright" content="Douco Design." />
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcHead">
        <div id="head">
            <div class="logo"><a href="index.html"><img src="images/dclogo.gif" alt="logo"></a></div>
            <div class="nav">
                <ul>
                    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
                        <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a href="article.php?rec=add">文章</a> <a href="nav.php?rec=add">自定义导航</a> <a href="show.html">首页幻灯</a> <a href="page.php?rec=add">单页面</a> <a href="manager.php?rec=add">管理员</a> <a href="link.html"></a> </div>
                    </li>
                    <li><a href="../index.php" target="_blank">查看站点</a></li>
                    <li><a href="index.php?rec=clear_cache">清除缓存</a></li>
                    <li><a href="http://help.douco.com" target="_blank">帮助</a></li>
                    <li class="noRight"><a href="module.html">DouPHP+</a></li>
                </ul>
                <ul class="navRight">
                    <li class="M noLeft"><a href="JavaScript:void(0);">您好，admin</a>
                        <div class="drop mUser">
                            <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
                            <a href="manager.php?rec=cloud_account">设置云账户</a>
                        </div>
                    </li>
                    <li class="noRight"><a href="login.php?rec=logout">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
            <ul class="top">
                <li><a href="index"><i class="home"></i><em>管理首页</em></a></li>
            </ul>
            <ul>
                <!--  <li><a href="system.html"><i class="system"></i><em>系统设置</em></a></li>-->
                <li><a href="nav_show"><i class="nav"></i><em>自定义导航栏</em></a></li>
                <li><a href="slide_show"><i class="show"></i><em>首页幻灯广告</em></a></li>
                <!--   <li><a href="page.html"><i class="page"></i><em>单页面管理</em></a></li>-->
            </ul>
            <!--  <ul>
                  <li><a href="product_category.html"><i class="productCat"></i><em>商品分类</em></a></li>
                  <li><a href="product.html"><i class="product"></i><em>商品列表</em></a></li>
              </ul>-->
            <ul>
                <li><a href="classify_list"><i class="articleCat"></i><em>文章分类</em></a></li>
                <li><a href="article_list"><i class="article"></i><em>文章列表</em></a></li>
            </ul>
            <ul class="bot">
                <li><a href="backup_list"><i class="backup"></i><em>数据备份</em></a></li>
                <li><a href="gather_list"><i class="backup"></i><em>采集列表</em></a></li>
                <!-- <li><a href="mobile.html"><i class="mobile"></i><em>手机版</em></a></li>
                 <li><a href="theme.html"><i class="theme"></i><em>设置模板</em></a></li>
                 <li><a href="manager.html"><i class="manager"></i><em>网站管理员</em></a></li>
                 <li><a href="manager.php?rec=manager_log"><i class="managerLog"></i><em>操作记录</em></a></li>-->
            </ul>
        </div></div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>数据备份</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
           <!--  <form action="">
                 <table>
                     <tr>
                         <td>表名</td>
                         <td><input type="text" name="b_name"></td>
                     </tr>
                     <tr class="zz">
                         <td>字段名</td>
                         <td><input type="text" name="z_name"></td>
                         <td>类型</td>
                         <td><select name="types">
                                 <option value="int">int</option>
                                 <option value="char">char</option>
                                 <option value="varchar">varchar</option>
                                 <option value="data">data</option>
                                 <option value="time">time</option>
                             </select></td>
                         <td>长度</td>
                         <td><input type="text" name="lengthh"></td>
                         <td>小数点</td>
                         <td><input type="text" name=" point"></td>
                         <td>不是null</td>
                         <td><input type="text" name="b_null" placeholder="NOT NULL"></td>
                         <td>是否自动递增</td>
                         <td><input type="text" name="degrees" placeholder="AUTO_INCREMENT"></td>
                         <td><input type="button" name="cz" value="创建字段"></td>
                     </tr>
                 </table>
             </form>-->
            <form action="" method="post">
                <div class="operation clearfix">
                    <!--<span class="submenu"><a href="javascript:void(0)" name="" onclick="add_AD_sort()" class="btn button_btn bg-deep-blue" title="添加分类"><i class="fa  fa-edit"></i>&nbsp;添加分类</a></span>-->
                   <?php  if(session('msg')){ ?>
                    <p style="color:red">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <?php echo session('msg')?>
                    </p>
                   <?php
                   }
                   ?>

                    <div class="search  clearfix" style="float: left;width: 1000px;">
                        <span class="btn button_btn bg-deep-blue " style="float: left" onclick=""  type="button">&nbsp;表名</span>
                        <input name="table_name" type="text"  class="form-control col-xs-6" style="width: 200px"/>

                        <select name="engine" class="input" style="width:150px; line-height:17px;" onchange="changesearch()">
                            <option value="MyISAM">MyISAM</option>
                            <option value="InnoDB">InnoDB</option>
                            <option value="archive">archive</option>
                        </select>

                        <input type="radio"  value="utf8" checked name="set"/>UTF-8
                        <input type="radio"  value="ASCII" name="set"/>ASCII
                        <input type="radio"  value="LATIN1" name="set"/>LATIN1
                        <input type="radio" value="GBK" name="set"/>GBK
                        <input type="radio"  value="Unicode" name="set"/>Unicode

                    </div>
                </div>
                <!--分类管理-->
               <?php echo csrf_field()?>
                <div class="sort_list">
                    <table class="table table_list table_striped table-bordered" id="sample-table">
                        <thead>
                        <tr>
                            <th width="100px">
                                <span class="btn button_btn bg-deep-blue " id="tianhang">添加字段</span>
                                字段
                            </th>
                            <th width="50px">类型</th>
                            <th width="100px">长度</th>
                            <th width="100px">注释</th>
                            <th width="100px">不是null</th>
                            <th width="100px">是否主键</th>
                            <th width="100px">是否自增</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody id="qqq">
                        <tr>
                            <td><input type="text" name="name[]"></td>
                            <td>
                                <select name="table_type[]" id="">
                                    <option value="int">int</option>
                                    <option value="varchar">varchar</option>
                                </select>
                            </td>
                            <td><input type="text" name='length[]'></td>
                            <td><input type="text" name='notes[]'></td>
                            <td><input type="checkbox" name='null[]'></td>
                            <td><input type="radio" name='primary_key'></td>
                            <td><input type="radio" name="increment" value="1" /></td>
                            <td><span class="shanchu">删除</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn button_btn bg-deep-blue"  type="submit">&nbsp;创表</button>
            </form>
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
<script src="js/js.js"></script>
<!--<script>
    $(function(){
      $(document).on('click',"input[name='cz']",function(){
          $(".zz").after('<tr> <td>字段名</td> <td><input type="text" name="z_name"></td><td>类型</td> <td><select name="types"> <option value="int">int</option>   <option value="char">char</option>   <option value="varchar">varchar</option>  <option value="data">data</option><option value="time">time</option></select></td>  <td>长度</td>  <td><input type="text" name="lengthh"></td>  <td>小数点</td>  <td><input type="text" name=" point"></td>    <td>不是null</td> <td><input type="text" name="b_null" placeholder="NOT NULL"></td> <td>是否自动递增</td><td><input type="text" name="degrees" placeholder="AUTO_INCREMENT"></td> <td><input type="button" name="cz" value="创建字段"></td>+</tr>');
      });
    });
</script>-->
<script>
    $(document).ready(function(){
        $('#tianhang').click(function(){
            var str="<tr>" +
                "<td><input type='text' name='name[]'></td>" +
                "<td>" +
                "<select name='table_type[]' id=''>" +
                "<option value='int'>int</option>" +
                "<option value='varchar'>varchar</option>" +
                "</select>" +
                "</td>" +
                "<td><input type='text' name='length[]'></td>" +
                "<td><input type='text' name='notes[]'></td>" +
                "<td><input type='checkbox' name='null[]'></td>" +
                "<td><input type='radio' name='primary_key'></td>" +
                "<td><input type='radio' name='increment'></td>" +
                "<td><span class='shanchu'>删除</span></td>" +
                "</tr>";
            $("#qqq").append(str);
        })
        $('.shanchu').on("click",function() {
            //$('.shanchu').click(function(){
            $(this).parents("tr").empty();
        })
    })
    /*产品-删除*/
    function picture_del(obj,id){
        layer.confirm('确认要删除吗？',{icon:0,},function(index){
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }
    /*****添加广告******/
    function Advert_add(obj ,id){
        layer.open({
            type: 1,
            title: '添加广告',
            maxmin: true,
            shadeClose: false, //点击遮罩关闭层
            area : ['800px' , ''],
            content:$('#Advert_add_style'),
            btn:['提交','取消'],
            yes:function(index,layero){
                var num=0;
                var str="";
                $(".add_style input[type$='text']").each(function(n){
                    if($(this).val()=="")
                    {

                        layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                            title: '提示框',
                            icon:0,
                        });
                        num++;
                        return false;
                    }
                });
                if(num>0){  return false;}
                else{
                    layer.alert('添加成功！',{
                        title: '提示框',
                        icon:1,
                    });
                    layer.close(index);
                }
            }
        });
    }
    /***************添加分类***********/
    function add_AD_sort( ){
        layer.open({
            type: 1,
            title: '添加分类',
            maxmin: false,
            shadeClose: false, //点击遮罩关闭层
            area : ['600px' , ''],
            content:$('#ad_sort'),
            btn:['添加','取消'],
            yes:function(index,layero){
                var num=0;
                var str="";
                $(".add_style input[type$='text']").each(function(n){
                    if($(this).val()=="")
                    {

                        layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                            title: '提示框',
                            icon:0,
                        });
                        num++;
                        return false;
                    }
                });
                if(num>0){  return false;}
                else{
                    layer.alert('添加成功！',{
                        title: '提示框',
                        icon:1,
                    });
                    layer.close(index);
                }

            }
        })
    }
    /*checkbox激发事件*/
    $('#checkbox').on('click',function(){
        if($('input[name="checkbox"]').prop("checked")){
            $('.Date_selection ').css('display','block');
        }
        else{

            $('.Date_selection').css('display','none');
        }
    });
    /******时间设置*******/
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };
    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: laydate.now(),
        max: '2099-06-16',
        istime: true,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);
    /*******滚动条*******/
    $("body").niceScroll({
        cursorcolor:"#888888",
        cursoropacitymax:1,
        touchbehavior:false,
        cursorwidth:"5px",
        cursorborder:"0",
        cursorborderradius:"5px"
    });
    function checkLength(which) {
        var maxChars = 200; //
        if(which.value.length > maxChars){
            layer.open({
                icon:2,
                title:'提示框',
                content:'您出入的字数超多限制!',
            });
            // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
            which.value = which.value.substring(0,maxChars);
            return false;
        }else{
            var curr = maxChars - which.value.length; //200 减去 当前输入的
            document.getElementById("sy").innerHTML = curr.toString();
            return true;
        }
    };
</script>
