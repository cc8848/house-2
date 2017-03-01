
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 首页幻灯广告 </title>
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
                <!--   <li><a href="system.html"><i class="system"></i><em>系统设置</em></a></li>-->
                <li><a href="nav_show"><i class="nav"></i><em>商户管理</em></a></li>
                <li><a href="slide_show"><i class="show"></i><em>会员管理</em></a></li>
                <!--   <li><a href="page.html"><i class="page"></i><em>单页面管理</em></a></li>-->
            </ul>
            <!--  <ul>
                  <li><a href="product_category.html"><i class="productCat"></i><em>商品分类</em></a></li>
                  <li><a href="product.html"><i class="product"></i><em>商品列表</em></a></li>
              </ul>-->
            <ul>
                <li><a href="classify_list"><i class="articleCat"></i><em>房屋分类</em></a></li>
                <li><a href="article_list"><i class="article"></i><em>房屋列表</em></a></li>
            </ul>
            <ul class="bot">
                <li><a href="backup_list"><i class="backup"></i><em>数据备份</em></a></li>
                <li><a href="gather_list"><i class="backup"></i><em>回收站</em></a></li>
                <!-- <li><a href="mobile.html"><i class="mobile"></i><em>手机版</em></a></li>
                 <li><a href="theme.html"><i class="theme"></i><em>设置模板</em></a></li>
                 <li><a href="manager.html"><i class="manager"></i><em>网站管理员</em></a></li>
                 <li><a href="manager.php?rec=manager_log"><i class="managerLog"></i><em>操作记录</em></a></li>-->
            </ul>
        </div></div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>新增商户</strong> </div>   <div class="mainBox imgModule">
            <h3>新增商户</h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th>新增商户</th>
                </tr>
                <tr>
                    <td width="350" valign="top">
                        <form action="show.php?rec=insert" method="post" enctype="multipart/form-data">
                            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                                <tr>
                                    <td><b>商户名称：</b>
                                        <input type="text" name="show_name" value="" size="20" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>图片</b>
                                        <input type="file" name="show_img" class="inpFlie" />          </td>
                                </tr>
                                <tr>
                                    <td><b>链接地址</b>
                                        <input type="text" name="show_link" value="" size="40" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>排序</b>
                                        <input type="text" name="sort" value="50" size="20" class="inpMain" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="hidden" name="token" value="79db104d" />
                                        <input name="submit" class="btn" type="submit" value="提交" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 1501phpA6组，并保留所有权利。              </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>