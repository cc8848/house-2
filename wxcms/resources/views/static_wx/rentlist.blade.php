<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
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
    <script src="{{url('static_wx/js/house.js')}}"></script>
    <style>
        button{
            background: transparent;
        }
    </style>
</head>
<body>
    <header class="main1">
        <a href="{{url('wx')}}"><img src="{{url('static_wx/img')}}/logo.png" class="logo"></a>
        <div class="top">
                <div class="city" style="background: none; text-indent: 0; top: 0;">
                    <span>北京市
                    <i><img src="{{url('static_wx/img')}}/xiala.png"></i></span>
                </div>
                <div class="select_city" style="display: none;">
                    <!--<span class="ui-dropmenu-arrow" style="left: 25%; right: auto;"></span>-->
                    <div class="select-return">
                        <a href="javascript:;" class="return-btn">返回</a>选择城市
                    </div>
                    <h6>当前定位的城市</h6>
                    <span class="fail">定位为：其他市,中环暂不支持~</span>
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
        <a href="">租房</a>
    </nav>

<div class="list-search" >
    <input type="text" class="list-input" placeholder="请输入详细地址"  />
    <a href="javascript:;" class="search-btn"><img src="{{url('static_wx/img')}}/list-search.png"/></a>
</div>
<!--二手房搜索-->
    <form action="rentlists" method="post">
<div class="search-none" style="display:none;">
    <div class="search-top">
      <a href="javascript:;" class="table-cell" id="return"><img src="{{url('static_wx/img')}}/return1.png"></a>
      <div class="table-cell" style="width: 100%;">
         <input class="none-input" type="text" name="r_adress"  placeholder="请输入详细地址"/>
      </div>
      <a class="table-cell"><button type="submit"><img src="{{url('static_wx/img')}}/search1.png" style="margin-left: 4px;"></button></a>
    </div>
</div><!--二手房搜索--> </form>


<!-- screening -->
<div class="screening">
    <ul>
        <li class="Regional">区域</li>
        <li class="Brand">价格</li>
        <li class="Sort">房型</li>
       {{-- <li class="more">更多</li>--}}
    </ul>
</div>
<!-- End screening -->
<!-- grade -->
<div class="grade-eject">
    <ul class="grade-w" id="gradew">
        <li onClick="grade1(this)">区域</li>
    </ul>
    <ul class="grade-t" id="gradet" style="left: 33.33%;">
       <li onClick="gradet(this)">不限</li>
     {{--   @foreach($list as $k=>$v)
            <li onClick="Categorytw(this)"><a href="">{{$v->r_district}}</a></li>
        @endforeach--}}
        @foreach($arr1 as $key1=>$val1)
        <li><a href="rentlist?r_district={{$val1->r_district}}">{{$val1->r_district}}</a></li>
        @endforeach
   {{--     <li onClick="gradet(this)">西湖区</li>
        <li onClick="gradet(this)">红谷滩</li>
        <li onClick="gradet(this)">青山湖</li>
        <li onClick="gradet(this)">青云谱</li>--}}
    </ul>
  {{--  <ul class="grade-s" id="grades">
        <li onClick="grades(this)">滨江路</li>
        <li onClick="grades(this)">永外正街</li>
        <li onClick="grades(this)">象山北路</li>
        <li onClick="grades(this)">胜利路</li>
        <li onClick="grades(this)">章江路</li>
        <li onClick="grades(this)">豫章路</li>
        <li onClick="grades(this)">青山路</li>
        <li onClick="grades(this)">阳明</li>
        <li onClick="grades(this)">子固路</li>
        <li onClick="grades(this)">二七北路</li>
        <li onClick="grades(this)">榕门路</li>
    </ul>--}}
</div>
<!-- End grade -->
<!-- Category -->
<div class="Category-eject">
    <ul class="Category-w" id="Categorytw">
        <li onClick="Categorytw(this)"><a href="">不限</a></li>
        @foreach($arr2 as $key2=>$val2)
        <li onClick="Categorytw(this)"><a href="rentlist?r_price={{$val2->r_price}}">{{$val2->r_price}}</a></li>
        @endforeach
      {{--  <li onClick="Categorytw(this)"><a href="">30-50万</a></li>
        <li onClick="Categorytw(this)"><a href="">50-80万</a></li>
        <li onClick="Categorytw(this)"><a href="">80-100万</a></li>
        <li onClick="Categorytw(this)"><a href="">100-150万</a></li>
        <li onClick="Categorytw(this)"><a href="">150-200万</a></li>
        <li onClick="Categorytw(this)"><a href="">200-250万</a></li>
        <li onClick="Categorytw(this)"><a href="">250万以上</a></li>--}}
       {{-- <li class="price">自定义价格：
            <input class="minprice" type="text" placeholder="最小"/>-
            <input class="maxprice" type="text" placeholder="最大"/>
            <a class="price-btn" href="" style="color: #FFF;">确定</a>
        </li>--}}
    </ul>
</div>
<!-- End Category -->
<!-- Category -->
<div class="Sort-eject Sort-height">
    <ul class="Sort-Sort" id="Sort-Sort">

        @foreach($arr3 as $key3=>$val3)
            <li onClick="Sorts(this)"><a href="rentlist?r_type={{$val3->r_type}}">{{$val3->r_type}}</a></li>
        @endforeach
      {{--  <li onClick="Sorts(this)">二室</li>
        <li onClick="Sorts(this)">三室</li>
        <li onClick="Sorts(this)">四室</li>
        <li onClick="Sorts(this)">五室</li>
        <li onClick="Sorts(this)">五室以上</li>--}}
    </ul>
</div>
<!-- End Category -->
<!-- more -->
{{--<div class="more-eject more-height">

    <ul class="more-Sort" id="more-Sort">
        <li onClick="more(this)">排序</li>
        <li onClick="more(this)">朝向</li>
        <li onClick="more(this)">面积</li>
        <li onClick="more(this)">标签</li>
    </ul>
    <ul class="more-t" id="more" style="left:50%; z-index: 999;">
        <li onClick="more1(this)">不限</li>
        <li onClick="more1(this)">南</li>
        <li onClick="more1(this)">南北</li>
        <li onClick="more1(this)">东</li>
        <li onClick="more1(this)">西</li>
        <li onClick="more1(this)">北</li>
    </ul>

    <div style="background: #ff5a60; padding:0.938rem; color:#fff; position:absolute; bottom:0px; text-align:center; z-index:999; width:100%;"><a href="" style="color:#fff">确定</a></div>
 
</div>
<!-- more -->--}}
<ul class="house-list">

    @foreach($list as $k=>$v)

            <li>
                <a href="{{url('housedetail')}}/{{$v['rent_id']}}.html">
                <img class="house-pic" src="{{asset('uploadfile/upload/$v[r_img]')}}" />
                <p class="house-title">{{$v['r_title']}}</p>
                <p class="house-type">{{$v['r_type']}}</p>
                <p class="house-address">{{$v['r_adress']}}</p>
                    <p class="house-tag">
                        @foreach($v['label_name'] as $value)
                            <span class="label_<?php echo rand(1,4)?>">{{$value}}</span>
                        @endforeach
                    </p>
                <span class="h-price" title="93">{{$v['r_price']}}</span>
                </a>
            </li>
        @endforeach
        </ul>
</body>
</html>
