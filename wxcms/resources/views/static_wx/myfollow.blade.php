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
    <meta http-equiv="x-rim-austo-match" content="none"/>
    <meta name="HandheldFriendly" content="true"/>
    <link type="text/css" rel="stylesheet" href="{{url('static_wx/css/style.css')}}">
    <script src="{{url('static_wx/js/jquery-1.8.2.min.js')}}"></script>
    <script src="{{url('static_wx/js/popup_layer.js')}}"></script>
    <script src="{{url('static_wx/js/zoom.js')}}"></script>
	</head>
	<body>
	
		<header class="main2">
			<a href="" class="return"><img src="{{url('static_wx/img')}}/back.png" width="14" height="24"></a>
            <span>我关注的房源</span>
            <a href="javascript:;" class="me" style="float: right; width: 24px; height: 24px;"></a>
		</header>

		<div style=" position: absolute; z-index: 1000; padding: 10px; opacity: 1; background-color: white; display: none;" id="blk9">
              <img src="{{url('static_wx/img')}}/test2.png" width="180" height="180">
         </div>
		<div class="agent-title1">我关注的房源<img src="{{url('static_wx/img')}}/house1.png" width="24" height="25"/></div>
		<ul class="house-list1">

            @foreach($list as $k=>$v)
        	<li>
        		<a href="{{url('housedetail')}}/{{$v->rent_id}}.html">
        		<img class="house-pic1" src="http://img.kjschool.net/chenyang/public/uploadfile/upload/{{$v->r_img}}">
        		<p class="house-title">{{$v->r_title}}</p>
        		<p class="house-type"><span class="red">{{$v->r_price}}&nbsp; </span>{{$v->r_area}}</p>
        		<p class="house-address">{{$v->r_adress}} &nbsp; {{$v->r_type}}&nbsp;  {{$v->r_area}}m²</p>
        		<p class="house-tag">
        			<span class="xuequ">随时看房</span>
        		</p>
        		</a>
        	</li>
                @endforeach
        	
        </ul>
		
	</body>
</html>
