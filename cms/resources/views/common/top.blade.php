  <?php 

use Symfony\Component\HttpFoundation\Session\Session;
$session = new Session;
$u_name = $session->get('u_name');
  ?>
  <div id="head">
            <div class="logo"><a href="index.html"><img src="images/dclogo.gif" alt="logo"></a></div>
            <div class="nav">
   <!--              <ul>
                    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
                        <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a href="article.php?rec=add">文章</a> <a href="nav.php?rec=add">自定义导航</a> <a href="show.html">首页幻灯</a> <a href="page.php?rec=add">单页面</a> <a href="manager.php?rec=add">管理员</a> <a href="link.html"></a> </div>
                    </li>
                    <li><a href="../index.php" target="_blank">查看站点</a></li>
                    <li><a href="index.php?rec=clear_cache">清除缓存</a></li>
                    <li><a href="http://help.douco.com" target="_blank">帮助</a></li>
                    <li class="noRight"><a href="module.html">DouPHP+</a></li>
                </ul> -->
                <ul class="navRight">
                    <li class="M noLeft"><a href="JavaScript:void(0);">您好，{{$u_name}}</a>
                    </li>
                    <li class="noRight"><a href="{{url('login_out')}}">退出</a></li>
                </ul>
            </div>
        </div>