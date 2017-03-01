<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="{{asset('admin/style/css/shop.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('admin/style/css/Sellerber.css')}}" type="text/css"  rel="stylesheet" />
    <link href="{{asset('admin/style/css/bkg_ui.css')}}" type="text/css"  rel="stylesheet" />
    <link href="{{asset('admin/style/font/css/font-awesome.min.css')}}"  rel="stylesheet" type="text/css" />

</head>
<body>
<center>
    <div class="margin advertising" id="page_style">
        <div class="sort_list">
    <table class="table table_list table_striped table-bordered" id="sample-table">
        <tr>
            <th>表名</th>
            <th>表类型</th>
            <th>引擎</th>
            <th>数据量</th>
            <th>编码</th>
            <th>版本</th>
            <th>大小</th>
            <th>索引大小</th>
            <th>碎片</th>
            <th>操作</th>
        </tr>
        @foreach($tables as $v)
            <tr>
                <td>{{$v['table_name']}}</td>
                <td>{{$v['table_type']}}</td>
                <td>{{$v['engine']}}</td>
                <td>{{$v['table_rows']}}</td>
                <td>{{$v['TABLE_COLLATION']}}</td>
                <td>{{$v['VERSION']}}</td>
                <td>{{$v['data_size']}}</td>
                <td>{{$v['index_length']}}</td>
                <td>{{$v['data_free']}}</td>
                <td>
                    <div class="button-group">
                        <a type="button" class="button border-main" href="#"><span class="icon-edit"></span>修改</a>
                        <a class="button border-red" href="javascript:void(0)" onclick="return del(17)"><span class="icon-trash-o"></span> 删除</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</div>
</center>

</body>
</html>