
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

    <div width="100%" height="400px" style="background:blue;color:white;z-index:2">
    
    <table style="padding-left:60px;">
      <tr>
        <td width="50" valign="top">
            <?php if($status == 1):?>
            <img src="images/yes.gif" width="32" height="32" border="0" alt="information" />
            <?php elseif($status == 0 ) :?>
          <img src="images/no.gif" width="32" height="32" border="0" alt="information" />
            <?php elseif($status == 2 ) :?>
          <img src="images/warning.gif" width="32" height="32" border="0" alt="warning" />
            <?php elseif($status == 3 ) :?>
          <img src="images/confirm.gif" width="32" height="32" border="0" alt="confirm" />
            <?php endif ;?>
        </td>
        <td style="font-size: 14px; font-weight: bold"><?php echo $message;?></td>
      </tr>
      <tr>
        <td></td>
        <td id="redirectionMsg">
          <span id="wait_time"><?php echo $wait;?> </span>秒之后跳转
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <ul style="margin:0; padding:0 10px" class="msg-link">       
            <li><a href=""></a></li>
          </ul>
        </td>
      </tr>
    </table>
    </div>
    <div style="height:500px"></div>
    <div class="clear"></div>
        <div id="dcFooter">
        <div id="footer" >
            <div class="line"></div>
            <ul>
                版权所有 1501phpA6组，并保留所有权利。              </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>

</body>
</html>
<script>
    var  wait_time = document.getElementById('wait_time').innerHTML;
    setInterval(function(){
        wait_time -= 1;
        if(wait_time > 0)
        {
            document.getElementById('wait_time').innerHTML = wait_time;
        }
        else
        {
            location.href = "{{$url}}";
        }
    },1000)
</script>