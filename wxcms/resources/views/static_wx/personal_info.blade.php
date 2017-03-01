<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <title>个人信息</title>
    <script src="http://kjschoolttt.oss-cn-beijing.aliyuncs.com/jquery-1.8.3.min.js"></script>
    <script src="http://kjschoolttt.oss-cn-beijing.aliyuncs.com/ajaxfileupload.js" type="text/javascript"></script>
    <link href="{{url('static_wx/css/personal_info.css')}}" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
    //下面用于图片上传预览功能
    function setImagePreview(avalue) {



        var docObj=document.getElementById("doc");

        var imgObjPreview=document.getElementById("preview");
        if(docObj.files &&docObj.files[0])
        {
//火狐下，直接设img属性
            imgObjPreview.style.display = 'block';
//imgObjPreview.src = docObj.files[0].getAsDataURL();

//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        }
        else
        {
//IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
//必须设置初始大小
            localImagId.style.width = "150px";
            localImagId.style.height = "180px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;

            }
            catch(e)
            {
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
        }
        ajaxFileUpload();  //上传图片
        return true;

    }

</script>

<body>

<header>
    房东个人信息
</header>

<table width="100%">
    <tr>

        <td colspan="2" align="center" height="55;">
            <label>

                <img id="preview" style="border-radius: 100%;" src="{{url('uploadfile/upload')}}/{{$fd_info->r_toux}}">

            <input type="file" name="touxiang" id="doc" style="display:none" onchange="javascript:setImagePreview();">
            </label>

        </td>
    </tr>
    <tr>
        <td align="right">用户名:</td>
        <td align="left">
            <input type="" value="{{$fd_info->r_name}}" id="user">

        </td>
    </tr>
    <tr>
        <td align="right">电话:</td>
        <td align="left"><input type="text" value="{{$fd_info->r_tel}}" id="tel"></td>
    </tr>
    <tr>
        <td align="right">邮箱:</td>
        <td align="left"><input type="text" value="{{$fd_info->r_email}}" id="email"></td>
    </tr>
    <tr>
        <td align="right">注册时间:</td>
        <td align="left"><?php echo date('Y-m-d H:i:s',$fd_info->r_time)?></td>
    </tr>
    <tr>
        <td align="right">性别:</td>
        <td align="left">

            <select name="" id="sex">

                    <option value="1"  @if ($fd_info->r_sex==1) selected  @else @endif>男</option>

                    <option value="2" @if ($fd_info->r_sex==2) selected  @else @endif>女</option>



            </select>




        </td>
    </tr>
    <tr>
        <td align="right">年龄:</td>
        <td align="left"><input type="text" value="{{$fd_info->r_age}}" id="age"></td>
    </tr>

    <tr class="acss_1">
        <td align="center" colspan="2">
            <a id="acss_left">修  改</a>

            <a href="{{url('fd_personal')}}">返  回</a>
        </td>
    </tr>

</table>

</body>

<script>
    $("#acss_left").click(function(){
        var token = "{{csrf_token()}}";
        var r_name = $("#user").val(); //用户名
        var r_tel = $("#tel").val();  //电话
        var r_email = $("#email").val();  //邮箱
        var r_sex = $("#sex").val();  //年龄 1.男 2.女


        $.ajax({
            type: "POST",
            url: "{{url('personal_info')}}",
            data: {_token:token,r_name:r_name,r_tel:r_tel,r_email:r_email,r_sex:r_sex},
            success: function(msg){
                alert( msg );
            }
        });

    })
</script>


<script type="text/javascript">



    function ajaxFileUpload() {


        $.ajaxFileUpload
        (
                {
                    url: "{{url('toux')}}", //用于文件上传的服务器端请求地址
                    secureuri: false, //是否需要安全协议，一般设置为false
                    fileElementId: 'doc', //文件上传域的ID
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data, status)  //服务器成功响应处理函数
                    {
                        $("#img1").attr("src", data.imgurl);
                        if (typeof (data.error) != 'undefined') {
                            if (data.error != '') {
                                alert(data.error);
                            } else {
                                alert(data.msg);
                            }
                        }
                    },
                    error: function (data, status, e)//服务器响应失败处理函数
                    {
                        alert(e);
                    }
                }
        )
        return false;
    }
</script>


</html>