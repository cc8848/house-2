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
    <script>
    	$(function(){
			$(".me").click(function(){
				$(".search-none").fadeIn();
			})
			$("#return").click(function(){
				$(".search-none").fadeOut();
			})
	});
    </script>
	</head>
	<body>
		<header class="main2">
			<a href="{{url('zf_personal')}}" class="return"><img src="{{url('static_wx/img')}}/nav.png" width="24" height="24"></a>
            
            <span>我关注的房东</span>
            <a href="javascript:;" class="me" style="float: right;"><img src="{{url('static_wx/img')}}/sousuo.png" width="24" height="24"></a>
		</header>
		<!--搜索-->
<div class="search-none" style="display:none;">
	<div class="search-top">
	  <a href="javascript:;" class="table-cell" id="return"><img src="{{url('static_wx/img')}}/return1.png"></a>
	  <div class="table-cell" style="width: 100%;">
	     <input class="none-input" type="text" placeholder="搜索租客姓名" />
	  </div>
	  <a href="" class="table-cell"><img src="{{url('static_wx/img')}}/search1.png" style="margin-left: 4px;"></a>
	</div>
</div><!--搜索-->
	
			<a class="btn-select" id="btn_select"> 
               <span class="cur-select">请选择</span> 
               <select> 
               <option>东湖</option> 
               <option>西湖</option> 
               <option>红谷滩</option> 
               <option>青山湖</option> 
               <option>湾里</option> 
               <option>其他</option> 
               </select> 
            </a> 
	
		<ul class="agent-list">
			<li>
			  <a href="">
			  <img class="agent-pic" src="{{url('static_wx/img')}}/pic_home_slider_3.jpg"/>
			  <div class="agent-introduct">
			    <p class="agent-name">王翠花</p>
			    <p>联系电话：13879139393</p>
                <p>所属门店：三眼井</p>
                <p class="agent-title">经纪人推荐</p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
              </div>
              <div class="agent-shopping"><a href=""><img src="{{url('static_wx/img')}}/shopping.png" width="105" height="33"/></a></div>
              <div class="agent-weixin"><img src="{{url('static_wx/img')}}/test2.png" width="55" height="55"/></div>
			  </a>
			</li>
			<li>
			  <a href="">
			  <img class="agent-pic" src="{{url('static_wx/img')}}/pic_home_slider_3.jpg"/>
			  <div class="agent-introduct">
			    <p class="agent-name">王菜花</p>
			    <p>联系电话：13879139393</p>
                <p>所属门店：三眼井</p>
                <p class="agent-title">经纪人推荐</p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
              </div>
              <div class="agent-shopping"><a href=""><img src="{{url('static_wx/img')}}/shopping.png" width="105" height="33"/></a></div>
              <div class="agent-weixin"><img src="{{url('static_wx/img')}}/test2.png" width="55" height="55"/></div>
			  </a>
			</li>
			<li>
			  <a href="">
			  <img class="agent-pic" src="{{url('static_wx/img')}}/pic_home_slider_3.jpg"/>
			  <div class="agent-introduct">
			    <p class="agent-name">王菜花</p>
			    <p>联系电话：13879139393</p>
                <p>所属门店：三眼井</p>
                <p class="agent-title">经纪人推荐</p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
              </div>
              <div class="agent-shopping"><a href=""><img src="{{url('static_wx/img')}}/shopping.png" width="105" height="33"/></a></div>
              <div class="agent-weixin"><img src="{{url('static_wx/img')}}/test2.png" width="55" height="55"/></div>
			  </a>
			</li>
			<li>
			  <a href="">
			  <img class="agent-pic" src="{{url('static_wx/img')}}/pic_home_slider_3.jpg"/>
			  <div class="agent-introduct">
			    <p class="agent-name">王菜花</p>
			    <p>联系电话：13879139393</p>
                <p>所属门店：三眼井</p>
                <p class="agent-title">经纪人推荐</p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
              </div>
              <div class="agent-shopping"><a href=""><img src="{{url('static_wx/img')}}/shopping.png" width="105" height="33"/></a></div>
              <div class="agent-weixin"><img src="{{url('static_wx/img')}}/test2.png" width="55" height="55"/></div>
			  </a>
			</li>
			<li>
			  <a href="">
			  <img class="agent-pic" src="{{url('static_wx/img')}}/pic_home_slider_3.jpg"/>
			  <div class="agent-introduct">
			    <p class="agent-name">王菜花</p>
			    <p>联系电话：13879139393</p>
                <p>所属门店：三眼井</p>
                <p class="agent-title">经纪人推荐</p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
                <p><a href="" class="agent-tuijian">房东降价急售-站前西路邮电小区精装两房 中间楼层 单价9000  </a></p>
              </div>
              <div class="agent-shopping"><a href=""><img src="{{url('static_wx/img')}}/shopping.png" width="105" height="33"/></a></div>
              <div class="agent-weixin"><img src="{{url('static_wx/img')}}/test2.png" width="55" height="55"/></div>
			  </a>
			</li>
		</ul>
	</body>
</html>
