<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-rim-auto-match" content="none"/>
    <meta name="HandheldFriendly" content="true"/>
    <link type="text/css" rel="stylesheet" href="{{url('static_wx/css/style.css')}}">
    <script src="{{url('static_wx/js/jquery-1.8.2.min.js')}}"></script>
    <script src="{{url('static_wx/js/comment.js')}}"></script>
    <script src="{{url('static_wx/js/jquery.flexslider-min.js')}}"></script>
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=6LgOMCDWb7FOHEtg9YKDQldEhP1kYS9N"></script>
	</head>
	<body>
		<header class="main1">
		<a href="{{url('wx')}}"><img src="{{url('static_wx/img')}}/logo.png" class="logo"></a>
		<div class="top">
				<div class="city" style="background: none; text-indent: 0; top: 0;">
					<span>北京
					<i><img src="{{url('static_wx/img')}}/xiala.png"></i></span>
				</div>
				<div class="select_city" style="display: none;">
					<!--<span class="ui-dropmenu-arrow" style="left: 25%; right: auto;"></span>-->
					<div class="select-return">
						<a href="javascript:;" class="return-btn">返回</a>选择城市
					</div>
					<h6>当前定位的城市</h6>
					<span class="fail">定位为：其他市,{{url('static_wx/img')}}/暂不支持~</span>
					<h6>所有城市</h6>
					<ul class="city-list">
					<li><a href="">长沙</a></li>
					<li><a href="">九江</a></li>
					<li><a href="">宜春</a></li>
					<li><a href="">乌鲁木齐</a></li>
					<li><a href="">太原</a></li>
					<li><a href="">保定</a></li>
					</ul>
				</div>
			</div>
		<a href="" class="me"><img src="{{url('static_wx/img')}}/me.png" width="20" height="30"></a>
	</header>
	<nav class="nav1">
		<a href="" class="home" style="margin-left: 0.938rem;">爱屋网</a>
		<a href=""  class="home">租房</a>
		<a href="">北京租房</a>
	</nav>
	<!--图片轮换-->
	<div class="block_home_slider">
                        	<div id="home_slider" class="flexslider">
                            	<ul class="slides">
                                @foreach($fw_img as $k=>$v)
                                	<li>
                                    	<div class="slide">
                                            <img src="{{url('uploadfile/upload')}}/{{$v->imgadd}}" alt="" />

                                        </div>
                                    </li>
                                    @endforeach


                                </ul>
                            </div>
                            <!-- <div class="num-pic">1/5</div> -->
                            <script type="text/javascript">
								$(function () {
									$('#home_slider').flexslider({
										animation : 'slide',
										controlNav : true,
										directionNav : true,
										animationLoop : true,
										slideshow : false,
										useCSS : false
									});

								});
							</script>
                        </div>
                       <!--图片轮换-->
        <div class="house-detai">
        	<a href="" class="detail-title">如果要观望,我建议你看完这个房子后再观望,一定不会让您失望！</a>
        	<a  class="detai-attention" style="background:url('http://kjschoolttt.oss-cn-beijing.aliyuncs.com/attention.png') center center no-repeat">
        		<i class="attention-ico"></i>
        		<p id="guanzhu">关注</p>
        	</a>
        </div>
        <div class="detail-list">
        	<div class="detai-price">
        		<p>售价</p>
        		<p><span>{{$list->r_price}}</span></p>
        	</div>
        	<div class="detai-price">
        		<p>户型</p>
        		<p><span>{{$list->r_type}}</span></p>
        	</div>
        	<div class="detai-price">
        		<p>面积</p>
        		<p><span>{{$list->r_area}}</span></p>
        	</div>
        </div>
        <ul class="decript-list">
        	<li>
        		<span class="color" style="float: left;">特点：</span>
        		<div class="house-tag1" style=" ">
					@foreach($label_name as $key=>$value)
						<i class="label_<?php echo rand(1,4)?>">{{$value}}</i>
					@endforeach
        		</div>
        	</li>
        	<li>
        		<span class="color">单价：</span>{{$list->r_price}}
        	</li>
        	<li>
        		<span class="sy"><span class="color">类型</span>：{{$list->r_form}}</span>
        		<span class="sy"><span class="color">面积：</span>{{$list->r_area}}</span>
        	</li>
        	<li>
        		<span class="sy"><span class="color">楼层：</span>18</span>
        		<span class="sy"><span class="color">朝向：</span>西</span>
        	</li>
        	<li>
        		<span class="color">装修：</span>{{$list->r_fixture}}
        	</li>
        	<li>
        		<span class="color">地址：</span>{{$list->r_district}}
        	</li>
        </ul>
        <ul class="detail-agent">
        	<li>
        	  <a class="detail-agent-title">经纪人房评</a>
        	  <div class="detail-commetent">
        	  	欢迎点击我的房源，我在地产工作8年以上，对每个小区户型了如指掌，能给您介绍更好房源和性价比更高房源，节省您看房时间，尽快帮您找到温馨的家，谢谢来电话。...
        	  </div>
        	</li>
        	<li>

        	  <a href="{{url('comment')}}/{{$fid}}.html" class="detail-agent-title">更多房评<i class="link"></i></a>
        	</li>
        	<li>
        	  <a href="" class="detail-agent-title">位置及周边<i class="link"></i></a>
        	  <div class="detail-commetent">
        	  	<p>地址:{{$list->r_adress}}</p>
        	  	<iframe style="width: 100%; height: 160px; border: 0; " src="{{url('map')}}?address={{$list->r_adress}}"></iframe>
        	  </div>
        	</li>
        	<li>
                </ul>
        	  <a href="" class="detail-agent-title">看过此房的客户还看过<i class="link"></i></a>
        	  <ul class="see-house">

                  @foreach($lishi as $K=>$v)
        	  	<li>
        	  		<a href="{{url('housedetail')}}/{{$v->rent_id}}.html">
        	  		  <img class="house-pic" src="{{url('static_wx/img')}}/2.jpg" />
        	  		  <p class="house-title">{{$v->r_title}}</p>
        		      <p class="house-address"><a href="">世纪中央城-丰和中大道</a></p>
        		      <p class="house-type" style="color: #343434;">{{$v->r_area}} 105平米 </p>
        		      <p><img src="{{url('static_wx/img')}}/jingpin.png" width="35" height="17"/>
        		      	<!--<img src="{{url('static_wx/img')}}/dujia.png" width="35" height="17"/>-->
        		      	<img src="{{url('static_wx/img')}}/suishi.png" width="55" height="17"/>
        		      <span style="color: #ff5a60; font-size: 12px;">126<span style="font-size: 10px;">万</span></span>
        		      </p>
        	  		</a>
        	  		<div class="salse"></div>
        	  	</li>
                      @endforeach

        </ul>
        <div style=" height: 5.5rem; "></div>
        <div class="agent-foot">
        	<img class="agent-photo" src="{{url('static_wx/img')}}/test1.jpg"/>
        	<p class="name">{{$fd_info->r_name}}</p>
        	<p class="tele">{{$fd_info->r_tel}}</p>
        	<div class="shop">
                <a href="tel:{{$fd_info->r_tel}}">
        			<span><img src="{{url('static_wx/img')}}/tele.png" width="18" height="20"/></span>
        			<P>致电</P>
        		</a>
                <a href="sms:{{$fd_info->r_tel}}">
        			<span><img src="{{url('static_wx/img')}}/duanxin.png" width="25" height="20"/></span>
        			<P>短信</P>
        		</a>
        		<a href="http://www.aikf.com/ask/h5/awjw.htm">
        			<span><img src="{{url('static_wx/img')}}/sho1p.png" width="78" height="34"/></span>
        		</a>
        	</div>
        </div>
	</body>


    <script>

        var stat = "{{$followstatic}}"; //关注状态

        var guanzhu = $("#guanzhu");
        var userid = "{{$userid}}";   //用户id
        var fid = "{{$fid}}";


        $(".detai-attention").click(function(){
            if(stat == 1){
                ajaxFollow(userid,fid,stat);
            }else{
                ajaxFollow(userid,fid,stat);
            }
        })

        $(function(){
            if(stat ==1){
                qg();
            }else{
                gz();
            }
        })

        //关注图标
        function gz(){

            stat = '1';
            $(".detai-attention").attr('style',"background:url('http://kjschoolttt.oss-cn-beijing.aliyuncs.com/attention.png') center center no-repeat");
            guanzhu.html("关注");
        }

        //取消关注图标
        function qg(){

            stat = '2';
            guanzhu.html("取消关注");
            $(".detai-attention").attr('style',"background:url('http://kjschoolttt.oss-cn-beijing.aliyuncs.com/attenti.png') center center no-repeat");

        }

        //ajax 传送关注状态
        function ajaxFollow(userid,fid,stat){

            var token = "{{csrf_token()}}";

            $.ajax({
                type: "POST",
                url: "{{url('follow')}}",
                data: {_token:token,userid:userid,fid:fid,stat:stat},
                dataType:'json',
                success: function(msg){

                    if(msg.static=='10003'){
                        alert(msg.msg);
                        window.location.href="{{url('zf')}}";
                    }else if(msg=='10001'){

                        qg();
                    }else if(msg=='10002'){
                        gz();
                    }

                }
            });
        }



    </script>


</html>
