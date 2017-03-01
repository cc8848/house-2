<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,intical-scale=1.0,minimum-scale=1.0,user-scalable=no">
<title>房源评价</title>
<link href="css/css.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/js.js"></script>
</head>

<body>

 <form action="#" method="get" class="tjpl-form">
  <input type="hidden" name="id"  value="<?php echo $id ?>" />
  <textarea id='content' ></textarea>
   <div class="tjpl">
    <input type="submit" value="提交评论" id="btn" /> <span></span>
   </div><!--tjpl/-->
 </form>
 <table class="pinghuifu">
<?php foreach ($list as $key => $val): ?>
  <tr>
   <td valign="top" align="left" width="100">
    <div class="pl-touxang" style=" background:url(http://www.17sucai.com/preview/1/2014-12-29/jqthumb/images/2.jpg)"></div>
   </td>
   <td valign="top">
    <h5><?php echo $val['username'] ?>　　　<?php echo date('Y-m-d H:i:s',$val['comm_time']) ?></h5>
    <div class="phPar">
          评论内容：<?php echo $val['content'] ?>
    </div><!--phPar/-->
    <div class="huifu-s">
     <span class="re-show">[回复]</span>
     <span class="re-hide">[收起回复]</span>
    </div><!--huifu-s/-->
    <div class="reply">
     <form action="_reply" method="get">
      <input type="hidden" name="reply_user_id" value="<?php echo $val['user_id'] ?>" /> 
      <input type="hidden" name="rent_id" value="<?php echo $id ?>" /> 
      <textarea name="reply"></textarea>
      <div class="re-tijiao">
       <input type="submit" value="提交回复" id="sub" />
      </div><!--re-tijiao/-->
     </form>
    </div><!--reply/-->

    <?php if(isset($val['reply'])){ foreach ($val['reply'] as $key => $v){ ?>
      <div style='height:70px;'>
        <hr />
        <h4><?php echo $v['username'] ?>　回复　<?php echo $val['username'] ?><span style='margin-left:20px;'><?php echo date('Y-m-d H:i:s',$v['reply_time']) ?></span></h4>
        <div>
            回复内容：<?php echo $v['content'] ?>
        </div>
      </div>
    <?php } } ?>
   </td>
  </tr>  
<?php endforeach ?>
 </table>
</body>

<script>

  /* 评论 */
  $('#btn').click(function(){
    id = $("input[name='id']").val();
    content = $.trim($('#content').val());
    if(content=='')
    {
      alert('评论内容呢?  让你造了?');
      return;
    }

    url='_add';
    $.get(url,{id:id,content:content},function(msg){
      if(msg.errCode == 1 )
      {
        alert(msg.msg);
        location.reload();
      }
      else
      {
        alert(msg.msg);
      }
    },'json')
  })
</script>

</html>
