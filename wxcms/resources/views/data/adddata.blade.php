<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('admin/style/css/shop.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('admin/style/css/Sellerber.css')}}" type="text/css"  rel="stylesheet" />
    <link href="{{asset('admin/style/css/bkg_ui.css')}}" type="text/css"  rel="stylesheet" />
    <link href="{{asset('admin/style/font/css/font-awesome.min.css')}}"  rel="stylesheet" type="text/css" />
    <script src="{{asset('admin/style/js/jquery-1.9.1.min.js')}}" type="text/javascript" ></script>
    <script type="text/javascript" src="{{asset('admin/style/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('admin/style/js/shopFrame.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/style/js/Sellerber.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/style/js/layer/layer.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/style/js/laydate/laydate.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/style/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/style/js/jquery.dataTables.bootstrap.js')}}"></script>
    <title>广告分类</title>
</head>
<!--[if lt IE 9]>
<script src="{{asset('admin/style/js/html5shiv.js')}}"></script>
<script src="{{asset('admin/style/js/respond.min.js')}}"></script>
<script src="{{asset('admin/style/js/css3-mediaqueries.js')}}"  type="text/javascript"></script>
<![endif]-->
<body>
<div class="margin advertising" id="page_style">
    <form action="" method="post">
        <div class="operation clearfix">
            <!--<span class="submenu"><a href="javascript:void(0)" name="" onclick="add_AD_sort()" class="btn button_btn bg-deep-blue" title="添加分类"><i class="fa  fa-edit"></i>&nbsp;添加分类</a></span>-->
            @if(session('msg'))
                <p style="color:red">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{session('msg')}}
                </p>
            @endif

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
        {{csrf_field()}}
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
</body>
</html>
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
