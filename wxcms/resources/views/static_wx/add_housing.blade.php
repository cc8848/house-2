<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>房源发布系统</title>
    <link type="text/css" rel="stylesheet" href="{{url('static_wx/css/add_housing.css')}}">
    <script type="text/javascript" src="http://kjschoolttt.oss-cn-beijing.aliyuncs.com/jquery-1.8.3.min.js"></script>
</head>
<style>
    table th {
        font-family: "Microsoft YaHei";
        font-size: 2rem;
    }
</style>
<body>
<header>
    房源发布系统
</header>

<footer>

            <div class="content">

                <table>
                    <tr>
                        <td align="right">房屋标题:</td>
                        <td align="left"><input type="text" name="" class="text3" id="r_title"></td>
                    </tr>

                    <tr>
                        <td align="right">地区:</td>
                        <td align="left"><input type="text" name="" class="text3" id="r_district"></td>
                    </tr>

                    <tr>
                        <td align="right"><input type="hidden" value="{{$fd_id}}" id="fd_id">房源地址:</td>
                        <td align="left"><input type="text" name="" class="text" id="r_address"></td>
                    </tr>
                    <tr>
                        <td align="right">房源价格:</td>
                        <td align="left"><input type="text" name="" class="text3" id="r_price"></td>
                    </tr>
                    <tr>
                        <td align="right">类型:</td>
                        <td align="left">
                            <input type="text" class="text3" id="r_type">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">租赁方式:</td>
                        <td align="left"><input type="text" class="text3" id="r_way"></td>
                    </tr>

                    <tr>
                        <td align="right">装修:</td>
                        <td align="left" >
                            <select name="" id="r_fixture" class="text4">
                                <option value="是">是</option>
                                <option value="否">否</option>
                                <option value="精装修">精装修</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">面积:</td>
                        <td align="left">
                            <input type="text" class="text3" id="r_area">

                        </td>
                    </tr>
                    <tr>
                        <td align="right">房型:</td>
                        <td align="left">
                            <input type="text" class="text4" id="r_form">

                        </td>
                    </tr>
                    <tr>
                        <td align="right">楼层:</td>
                        <td align="left">
                            <input type="text" class="text4" id="r_floor">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">特点</td>
                        <td style="background: lightgrey">
                            @foreach($label as $value)
                                <span style="display: block; float: left; width: 33%"><input id="label_id" class="label_id" type="checkbox" value="{{$value->label_id}}" name="label_id[]" >{{$value->label_name}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td align="right">房源视频:</td>
                        <td align="left">
                            <div onclick="F_Open_dialog()" class="upimg">
                                <img src="images/xg_getHome1_18.png" style="margin-top: 10px;margin-right: 10px;" alt="">
                                <span>点击选择视频</span>
                            </div>
                            <input type="button" class="chong" style="display: none;" onclick="F_Open_dialog()" value="重新选择视频">
                            <input type="hidden" class="video_val" >
                            <form id="submit_form" method="post" action="/upVideo" target="exec_target" enctype="multipart/form-data">
                                <input type="file" style="display: none;" name="r_video" class="text4" id="r_video">  <!-- 添加上传文件 -->
                            </form>
                            <iframe id="exec_target" style="display: none;" name="exec_target"></iframe>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">房源照片:</td>
                        <td align="center">
                            <input type="file" id="myFile" multiple class="text5">

                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">

                            <!-- 上传的表单 -->
                            <form method="post" id="myForm" action="{{url('/fileUpload')}}" enctype="multipart/form-data">
                                {{--<input type="file" id="myFile" multiple class="text5">--}}
                                <!-- 上传的文件列表 -->
                                <table id="upload-list">
                                    <thead>
                                    <tr>
                                        <th width="35%">文件名</th>

                                        <th width="20%">上传进度</th>
                                        <th width="15%">
                                            <input type="button" id="upload-all-btn" value="全部上传" class="text5">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </form>


                        </td>
                    </tr>

                    <tr>
                        <td align="center" colspan="2" height="245px">
                            <button class="submit" id="send">发布房源</button>
                            <a href="{{url('fd_personal')}}"><button class="submit">返回</button></a>
                        </td>

                    </tr>

                </table>


            </div>


</footer>
<div class="shade">
    <p>正在上传，请稍后……</p>
</div>

</body>

<!-- 上传文件列表中每个文件的信息模版 -->
<script type="text/template" id="file-upload-tpl">
    <tr>
        <td align="center" class="imagename">--fileName--</td>
        <td class="upload-progress" align="center">--progress--</td>
        <td align="center">
            <input type="button" class="text5" value="取消">
            <input type="button" class="upload-item-btn"  data-name="--fileName--" data-size="--totalSize--" data-state="default" value="--uploadVal--" style="display: none">
        </td>
    </tr>
</script>

<script>

    /*视频*/
    function F_Open_dialog()
    {
        document.getElementById("r_video").click();
    }

    $(document).ready(function(){
        //选择文件成功则提交表单
        $("#r_video").change(function(){
            $('.shade').show();
//            document.body.style.overflow='hidden';
//            document.body.style.height='100%';
            if($("#r_video").val() != '') $("#submit_form").submit();
        });
        //iframe加载响应，初始页面时也有一次，此时data为null。
        $("#exec_target").load(function(){
            $('.shade').show();
            var data = $(window.frames['exec_target'].document.body).find("textarea").html();
            console.log(data);
            $("#info").html(data)
            if(data != null){
                //若iframe携带返回数据，则显示在feedback中
                var dataObj = JSON.parse(data);
                if(dataObj.code == 1){
                    $('.upimg').html('<video src="'+dataObj.path+'" width="320" height="240" controls="controls">您的浏览器不支持视频播放</video>');
                    $('.video_val').val(dataObj.path);
                    $('.upimg').removeAttr('onclick');
                    $('.chong').show();
                }else{
                    alert(dataObj.error);
                }
                $("#info").html(data.replace(/&lt;/g,'<').replace(/&gt;/g,'>'));
                $("#upload_file").val('');
                $('.shade').hide();
            }else{
                $('.shade').hide();
            }
        });
    });
    

    $('#send').click(function(){
        var token = "{{csrf_token()}}";
        var r_title = $("#r_title").val();  //房屋标题
        var r_district = $("#r_district").val(); //地区
        var fd_id = $("#fd_id").val();  //id
        var r_address = $("#r_address").val();  //地址
        var r_price = $("#r_price").val();  //价格
        var r_type = $("#r_type").val();  //类型
        var r_way = $("#r_way").val();  //租赁方式
        var r_area = $("#r_area").val(); //面积
        var r_form = $("#r_form").val();  //房型
        var r_floor = $("#r_floor").val(); //楼层
        var r_fixture = $("#r_fixture").val(); //是否装修
        var r_img = $(".imagename").html();
        var r_video = $('.video_val').val();  //视频路径
        var label_id=$(".label_id");
        var ids= "";
        for(var i=0; i<label_id.length; i++ ){
            if(label_id[i].checked==true){
                ids+= ","+label_id[i].value;
            }
        }
        ids=ids.substr(1);
        $.ajax({
            type: "POST",
            url: "{{url('add_housing')}}",
            data: {_token:token,r_title:r_title,r_district:r_district,landlord_id:fd_id
            ,r_adress:r_address,r_price:r_price,r_type:r_type,r_way:r_way,r_area:r_area
            ,r_form:r_form,r_floor:r_floor,r_fixture:r_fixture,r_img:r_img,r_video:r_video,label_id:ids},
            success: function(msg){
                alert(msg);
                window.location.href='fd_personal';
            }
        });



    })


</script>

<script type="text/javascript">
    // 全部上传操作
    $(document).on('click', '#upload-all-btn', function() {
        // 未选择文件
        if (!$('#myFile').val()) {
            $('#myFile').focus();
        }
        // 模拟点击其他可上传的文件
        else {
            $('#upload-list .upload-item-btn').each(function() {
                $(this).click();
            });
        }
    });

    // 选择文件-显示文件信息
    $('#myFile').change(function(e) {
        var file,
                uploadItem = [],
                uploadItemTpl = $('#file-upload-tpl').html(),
                size,
                percent,
                progress = '0%',
                uploadVal = '';

        for (var i = 0, j = this.files.length; i < j; ++i) {
            file = this.files[i];

            percent = undefined;
            progress = '0%';
            uploadVal = '';

            // 计算文件大小
            size = file.size > 1024
                    ? file.size / 1024  > 1024
                    ? file.size / (1024 * 1024) > 1024
                    ? (file.size / (1024 * 1024 * 1024)).toFixed(2) + 'GB'
                    : (file.size / (1024 * 1024)).toFixed(2) + 'MB'
                    : (file.size / 1024).toFixed(2) + 'KB'
                    : (file.size).toFixed(2) + 'B';

            // 初始通过本地记录，判断该文件是否曾经上传过
            percent = window.localStorage.getItem(file.name + '_p');

            if (percent && percent !== '100.0') {
                progress = '已上传 ' + percent + '%';
                uploadVal = '继续上传';
            }

            // 更新文件信息列表
            uploadItem.push(uploadItemTpl
                            .replace(/--fileName--/g, file.name)
                            .replace('--progress--', progress)
                            .replace('--totalSize--', file.size)
                            .replace('--uploadVal--', uploadVal)
            );
        }

        $('#upload-list').children('tbody').html(uploadItem.join(''))
                .end().show();
    });

    /**
     * 上传文件时，提取相应匹配的文件项
     * @param  {String} fileName   需要匹配的文件名
     * @return {FileList}          匹配的文件项目
     */
    function findTheFile(fileName) {
        var files = $('#myFile')[0].files,
                theFile;

        for (var i = 0, j = files.length; i < j; ++i) {
            if (files[i].name === fileName) {
                theFile = files[i];
                break;
            }
        }

        return theFile ? theFile : [];
    }

    // 上传文件
    $(document).on('click', '.upload-item-btn', function() {
        var $this = $(this),
                state = $this.attr('data-state'),
                msg = {
                    done: 'OK',
                    failed: 'error1003',
                    in: '...',
                    paused: '暂停中...'
                },
                fileName = $this.attr('data-name'),
                $progress = $this.closest('tr').find('.upload-progress'),
                eachSize = 1024,
                totalSize = $this.attr('data-size'),
                chunks = Math.ceil(totalSize / eachSize),
                percent,
                chunk,
        // 暂停上传操作
                isPaused = 0;

        // 进行暂停上传操作
        // 未实现，这里通过动态的设置isPaused值并不能阻止下方ajax请求的调用
        if (state === 'uploading') {
            $this.val('继续上传').attr('data-state', 'paused');
            $progress.text(msg['paused'] + percent + '%');
            isPaused = 1;
            console.log('暂停：', isPaused);
        }
        // 进行开始/继续上传操作
        else if (state === 'paused' || state === 'default') {
            $this.val('暂停上传').attr('data-state', 'uploading');
            isPaused = 0;
        }

        // 第一次点击上传
        startUpload('first');

        // 上传操作 times: 第几次
        function startUpload(times) {
            // 上传之前查询是否以及上传过分片
            chunk = window.localStorage.getItem(fileName + '_chunk') || 0;
            chunk = parseInt(chunk, 10);
            // 判断是否为末分片
            var    isLastChunk = (chunk == (chunks - 1) ? 1 : 0);

            // 如果第一次上传就为末分片，即文件已经上传完成，则重新覆盖上传
            if (times === 'first' && isLastChunk === 1) {
                window.localStorage.setItem(fileName + '_chunk', 0);
                chunk = 0;
                isLastChunk = 0;
            }

            // 设置分片的开始结尾
            var    blobFrom = chunk * eachSize, // 分段开始
                    blobTo = (chunk + 1) * eachSize > totalSize ? totalSize : (chunk + 1) * eachSize, // 分段结尾
                    percent = (100 * blobTo / totalSize).toFixed(1), // 已上传的百分比
                    timeout = 5000, // 超时时间
                    fd = new FormData($('#myForm')[0]);

            fd.append('theFile', findTheFile(fileName).slice(blobFrom, blobTo)); // 分好段的文件
            fd.append('fileName', fileName); // 文件名
            fd.append('totalSize', totalSize); // 文件总大小
            fd.append('isLastChunk', isLastChunk); // 是否为末段
            fd.append('isFirstUpload', times === 'first' ? 1 : 0); // 是否是第一段（第一次上传）

            // 上传
            $.ajax({
                type: 'post',
                url: "{{url('/fileUpload')}}",
                data: fd,
                processData: false,
                contentType: false,
                timeout: timeout,
                success: function(rs) {
                    rs = JSON.parse(rs);

                    // 上传成功
                    if (rs.status === 200) {
                        // 记录已经上传的百分比
                        window.localStorage.setItem(fileName + '_p', percent);

                        // 已经上传完毕
                        if (chunk === (chunks - 1)) {
                            $progress.text(msg['done']);
                            $this.val('已经上传').prop('disabled', true).css('cursor', 'not-allowed');
                            if (!$('#upload-list').find('.upload-item-btn:not(:disabled)').length) {
                                $('#upload-all-btn').val('已经上传').prop('disabled', true).css('cursor', 'not-allowed');
                            }
                        } else {
                            // 记录已经上传的分片
                            window.localStorage.setItem(fileName + '_chunk', ++chunk);

                            $progress.text(msg['in'] + percent + '%');
                            // 这样设置可以暂停，但点击后动态的设置就暂停不了..
                            // if (chunk == 10) {
                            //     isPaused = 1;
                            // }
                            console.log(isPaused);
                            if (!isPaused) {
                                startUpload();
                            }

                        }
                    }
                    // 上传失败，上传失败分很多种情况，具体按实际来设置
                    else if (rs.status === 500) {
                        $progress.text(msg['failed']);
                    }
                },
                error: function() {
                    $progress.text(msg['failed']);
                }
            });
        }
    });

</script>



</html>