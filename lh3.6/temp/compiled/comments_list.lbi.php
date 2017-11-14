<?php if ($this->_var['comment_type'] == 1): ?>
<div id="reply_box" class="reply_box cont_mid">
  <p class="f14 red bold reply_num"><code>评论<span id="reply_count">(<?php echo $this->_var['pager']['record_count']; ?>)</span></code></p>
  <div id="reply_list">
    <?php $_from = $this->_var['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
    <div class="first_c clearfix first" data-id="13650">
      <div class="Left f_l"><img src="themes/meilele/images/xpace_user.jpg" height="38" width="38"></div>
      <div class="Right f_r">
        <p class="author red clearfix"><a class="F4446A">
          <?php if ($this->_var['comment']['username']): ?>
          <?php echo htmlspecialchars($this->_var['comment']['username']); ?>
          <?php else: ?>
          <?php echo $this->_var['lang']['anonymous']; ?>
          <?php endif; ?>
          </a>
          <time class="time gray yahei"><?php echo $this->_var['comment']['add_time']; ?></time>
        </p>
        <p class="desc"><span class="JS_reply_content_dwt"><?php echo $this->_var['comment']['content']; ?></span></p>
      </div>
    </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  <div class="page_list_box clearfix">
    <div id="JS_reply_page" class="Right clearfix">
      <form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <?php if ($this->_var['pager']['styleid'] == 0): ?>
        <div id="pager"> <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager']['page_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager']['page_first']; ?>"><?php echo $this->_var['lang']['page_first']; ?></a> <a href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a> <a href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> <a href="<?php echo $this->_var['pager']['page_last']; ?>"><?php echo $this->_var['lang']['page_last']; ?></a> </span>
          <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41453800_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41453800_1510625253']):
?>
          <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_41453800_1510625253']; ?>" />
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
        <?php else: ?>
        
        <div id="pager" class="pagebar"> <span class="f_l f6" style="margin-right:10px;"><?php echo $this->_var['lang']['total']; ?> <b><?php echo $this->_var['pager']['record_count']; ?></b> <?php echo $this->_var['lang']['user_comment_num']; ?></span>
          <?php if ($this->_var['pager']['page_first']): ?>
          <a href="<?php echo $this->_var['pager']['page_first']; ?>">1 ...</a>
          <?php endif; ?>
          <?php if ($this->_var['pager']['page_prev']): ?>
          <a class="prev" href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a>
          <?php endif; ?>
          <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41478100_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41478100_1510625253']):
?>
          <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
          <span class="page_now"><?php echo $this->_var['key']; ?></span>
          <?php else: ?>
          <a href="<?php echo $this->_var['item_0_41478100_1510625253']; ?>">[<?php echo $this->_var['key']; ?>]</a>
          <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php if ($this->_var['pager']['page_next']): ?>
          <a class="next" href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a>
          <?php endif; ?>
          <?php if ($this->_var['pager']['page_last']): ?>
          <a class="last" href="<?php echo $this->_var['pager']['page_last']; ?>">...<?php echo $this->_var['pager']['page_count']; ?></a>
          <?php endif; ?>
          <?php if ($this->_var['pager']['page_kbd']): ?>
          <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41500000_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41500000_1510625253']):
?>
          <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_41500000_1510625253']; ?>" />
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;">
          <input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" />
          </kbd>
          <?php endif; ?>
        </div>
        
        <?php endif; ?>
      </form>
      <script type="Text/Javascript" language="JavaScript">
        <!--
        
        function selectPage(sel)
        {
          sel.form.submit();
        }
        
        //-->
        </script>
    </div>
  </div>
</div>
<div class="first_c cont_mid clearfix" style="border-bottom:none">
  <div class="Left f_l"> <img src="themes/meilele/images/xpace_user.jpg" height="38" width="38"> </div>
  <div class="Right f_r">
    <form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
      <div class="reply_thread_box JS_reply_box" style="">
        <table width="300px" border="0" cellspacing="5" cellpadding="8" class="table_comment">
          <tr>
            <td><textarea class="reply_textarea JS_edit_reply" maxlength="140" id="reply_thread_textarea" rows="1" style="height: 32px; width:540px; font-size:12px" name="content"></textarea></td>
          </tr>
          <tr>
            <td><div style="text-align:left; float:left;">
                <input type="text" name="captcha"  class="inputBorder" style="width:50px;"/>
                <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" onClick="this.src='captcha.php?'+Math.random()" class="captcha"></div></td>
          </tr>
          <tr>
            <td><input name="" type="submit"  value="提交评论" style="cursor:pointer; border:1px solid #CCCCCC; "></td>
          </tr>
        </table>
      </div>
	  <input type="hidden" name="email" value="admin@qq.com" />
	  <input type="hidden" name="comment_rank" value="5" />
      <input type="hidden" name="cmt_type" value="<?php echo $this->_var['comment_type']; ?>" />
      <input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
    </form>
  </div>
</div>

<script type="text/javascript">
//<![CDATA[
<?php $_from = $this->_var['lang']['cmt_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41507900_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41507900_1510625253']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item_0_41507900_1510625253']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

/**
 * 提交评论信息
*/
	  
function submitComment(frm)
{
  var cmt = new Object;

  //cmt.username        = frm.elements['username'].value;
  cmt.email           = frm.elements['email'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = 5;



  if (cmt.email.length > 0)
  {
     if (!(Utils.isEmail(cmt.email)))
     {
        alert(cmt_error_email);
        return false;
      }
   }
   else
   {
        alert(cmt_empty_email);
        return false;
   }

   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }
   
   $.ajax({
					type:"POST",
					url:"comment.php",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'cmt=' + $.toJSON(cmt),
					success:commentResponse
				});

   return false;
}


/**
 * 处理提交评论的反馈信息
*/
  function commentResponse(result)
  {
    if (result.message)
    {
      alert(result.message);
    }

    if (result.error == 0)
    {
      var layer = document.getElementById('ECS_COMMENT');

      if (layer)
      {
        layer.innerHTML = result.content;
      }
    }
  }
 function gotoPage(page, id, type)
 {
	  $.ajax({
						type:"GET",
						url:"comment.php?act=gotopage",
						cache:false,
						dataType:'json',     //接受数据格式
						data:'page=' + page + '&id=' + id + '&type=' + type,
						success:gotoPageResponse
					});
 } 
function gotoPageResponse(result)
{
  document.getElementById("ECS_COMMENT").innerHTML = result.content;
}

//]]>
</script>

<?php else: ?>
<div class="tab_body">
    <table class="pj_tb">
      <tbody>
        <tr>
          <td class="t1"><strong id="comment_sum">100%</strong><br>
            <span>满意度</span></td>
          <td class="t2"><div class="bar_box"> 满意<span class="bar"><span class="in" id="comment_width_1" style="width:100%"></span></span><font id="comment_1">100%</font></div>
            <div class="bar_box"> 一般<span class="bar"><span class="in" id="comment_width_2" style="width:0%"></span></span><font id="comment_2">0%</font></div>
            <div class="bar_box">不满意<span class="bar"><span class="in" id="comment_width_3" style="width:0%"></span></span><font id="comment_3">0%</font></div>
			
			</td>
          <td class="td3" align="center"><img src="" id="comment_goods_img" width="148" height="96" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" />
		  <script language="javascript">
		  $('#comment_goods_img').attr('src', $('#Zoomer img').attr('src'));
		  </script>
		  </td>
          <td class="td4" align="center">我购买过此商品<br>
            <a href="#form" class="g2_btn2">我要评价</a></td>
        </tr>
      </tbody>
    </table>
  </div>
<div class="in_title"><a href="javascript:;" class="allpingjia red">全部评价(<?php echo $this->_var['pager']['record_count']; ?>)</a></div> 
<div class="tab_body p5">
    <table class="cm_list" cellspacing="15">
      <tbody>
        <?php $_from = $this->_var['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
        <tr>
          <td class="td1"><div class="img" style="padding-left:20px"><a class="red" target="_blank"><img src="themes/meilele/images/noavatar_middle<?php $_from = get_user_rank($GLOBALS[smarty]->_var[comment][username]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user_rank');if (count($_from)):
    foreach ($_from AS $this->_var['user_rank']):
?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>.gif"></a></div>
            <div class="info c"><a class="red" target="_blank"><?php if ($this->_var['comment']['username']): ?><?php echo htmlspecialchars($this->_var['comment']['username']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></a></div></td>
          <td class="td2"><div class="arrow"></div>
            <div class="clearfix in_t">
              <div class="Left"><span></span> <span class="cm_star cm_star_<?php echo $this->_var['comment']['rank']; ?>"></span></div>
              <div class="Right gray"><?php echo $this->_var['comment']['add_time']; ?></div>
            </div>
            <div class="content">
			<?php if ($this->_var['comment']['art_id']): ?>
			<div class="img_area" art_id="<?php echo $this->_var['comment']['art_id']; ?>">
			<div style="display:none" class="img_content" id="img_content_<?php echo $this->_var['comment']['art_id']; ?>"><?php echo $this->_var['comment']['art_content']; ?></div>
			<div class="img" id="img_<?php echo $this->_var['comment']['art_id']; ?>">
			</div>
			<a href="xspace_show-<?php echo $this->_var['comment']['art_id']; ?>.html" target="_blank" class="red vb">查看秀家大图&gt;&gt;</a>
			</div>
			
			<?php endif; ?>
			
			<?php echo $this->_var['comment']['content']; ?>
			</div>
			<?php if ($this->_var['comment']['re_content']): ?>
			<div class="re_content"><strong class="gray">管理员回复：</strong><?php echo $this->_var['comment']['re_content']; ?></div>
			<?php endif; ?>
			</td>
        </tr>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		<script language="javascript">
		function get_comment_img(){
			$('.img_area').each(
				function(i){
					var goods_comment_img = '';
					var art_id = $(this).attr('art_id');
					if (art_id){
						$('.img_area #img_content_'+art_id+' img').each(
						function(i){
							if (i < 2){
					var src = $(this).attr('src');
					var temp = '<a href="xspace_show-'+art_id+'.html" target="_blank"><img src="'+src+'" height="96"></a>&nbsp;';
					goods_comment_img += temp;
								}
							}
						  );
						$('.img_area #img_'+art_id).html(goods_comment_img);
					}
				}
			);
			
			$('#comment_goods_img').attr('src', $('#Zoomer img').attr('src'));
		}	
		
		get_comment_img();
			
			</script>
      </tbody>
    </table><a name="form"></a>
    <div class="mt20 r page">
	
	<form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <?php if ($this->_var['pager']['styleid'] == 0): ?>
        <div id="pager">
          <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager']['page_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager']['page_first']; ?>"><?php echo $this->_var['lang']['page_first']; ?></a> <a href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a> <a href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> <a href="<?php echo $this->_var['pager']['page_last']; ?>"><?php echo $this->_var['lang']['page_last']; ?></a> </span>
            <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41560200_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41560200_1510625253']):
?>
            <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_41560200_1510625253']; ?>" />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
        <?php else: ?>

        
         <div id="pager" class="pagebar">
          <span class="f_l f6" style="margin-right:10px;"><?php echo $this->_var['lang']['total']; ?> <b><?php echo $this->_var['pager']['record_count']; ?></b> <?php echo $this->_var['lang']['user_comment_num']; ?></span>
          <?php if ($this->_var['pager']['page_first']): ?><a href="<?php echo $this->_var['pager']['page_first']; ?>">1 ...</a><?php endif; ?>
          <?php if ($this->_var['pager']['page_prev']): ?><a class="prev" href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a><?php endif; ?>
          <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41573700_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41573700_1510625253']):
?>
                <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
                <span class="page_now"><?php echo $this->_var['key']; ?></span>
                <?php else: ?>
                <a href="<?php echo $this->_var['item_0_41573700_1510625253']; ?>">[<?php echo $this->_var['key']; ?>]</a>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          <?php if ($this->_var['pager']['page_next']): ?><a class="next" href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a><?php endif; ?>
          <?php if ($this->_var['pager']['page_last']): ?><a class="last" href="<?php echo $this->_var['pager']['page_last']; ?>">...<?php echo $this->_var['pager']['page_count']; ?></a><?php endif; ?>
          <?php if ($this->_var['pager']['page_kbd']): ?>
            <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41588300_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41588300_1510625253']):
?>
            <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_41588300_1510625253']; ?>" />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;"><input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" /></kbd>
            <?php endif; ?>
        </div>
        

        <?php endif; ?>
        </form>
    <script type="Text/Javascript" language="JavaScript">
        <!--
        
        function selectPage(sel)
        {
          sel.form.submit();
        }
        
        //-->
        </script>
	</div>
  </div>
<div class="in_title"><a href="javascript:;" class="allpingjia red">我要评价</a></div> 
<div class="tab_body p5">
   <style>
 .inputBorder{border:1px solid #ddd}
 .table_comment tr td{padding:2px 3px;};
 </style>
 <a name="cform"></a>

<form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
                    <table width="765px" border="0" cellspacing="5" cellpadding="8" class="table_comment">
                      <tr>
                        <td width="10%" align="right">用户名：</td>
                        <td width="90%"><?php if ($_SESSION['user_name']): ?><?php echo $_SESSION['user_name']; ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></td>
                      </tr>
                      <tr>
                        <td align="right">E-mail：</td>
                        <td><input type="text" name="email" id="email"  maxlength="100" value="" class="inputBorder"/></td>
                      </tr>
                      <tr>
                        <td align="right">评价等级：</td>
                        <td>
						  <input name="comment_rank" type="radio" value="1" id="comment_rank1" /><img src="themes/meilele/images/stars1.gif"/>
                          <input name="comment_rank" type="radio" value="2" id="comment_rank2" /><img src="themes/meilele/images/stars2.gif" />
                          <input name="comment_rank" type="radio" value="3" id="comment_rank3" /><img src="themes/meilele/images/stars3.gif" />
                          <input name="comment_rank" type="radio" value="4" id="comment_rank4" /><img src="themes/meilele/images/stars4.gif" />
                          <input name="comment_rank" type="radio" value="5" checked="checked" id="comment_rank5" /><img src="themes/meilele/images/stars5.gif" /></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top">评论内容：</td>
                        <td><textarea name="content" class="inputBorder" style="height:80px; width:500px; font-size:12px;"></textarea>
                          </td>
                      </tr>
					  <?php if ($this->_var['enabled_captcha']): ?>
                      <tr>
                        <td align="right" valign="top">验证码：</td>
                        <td colspan="2"><div style="text-align:left; float:left;">
                            <input type="text" name="captcha"  class="inputBorder" style="width:50px;"/>
                            <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" onClick="this.src='captcha.php?'+Math.random()" class="captcha"></div></td>
                      </tr>
					  <?php endif; ?>
                      <tr>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
						<input type="hidden" name="cmt_type" value="<?php echo $this->_var['comment_type']; ?>" />
          <input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
                            <input name="" type="submit"  value="提交评论" style="cursor:pointer; border:1px solid #CCCCCC; ">
                          </td>
                      </tr>
                    </table>
                  </form>

			

<script type="text/javascript">
//<![CDATA[
<?php $_from = $this->_var['lang']['cmt_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_41601900_1510625253');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_41601900_1510625253']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item_0_41601900_1510625253']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

/**
 * 提交评论信息
*/



function set_comment_rank()
{
	rank_arr = comment_rank.split('-');
	var rank_sum = 0;
	var rank_5 = 0;
	var rank_4 = 0;
	var rank_3 = 0;
	var rank_2 = 0;
	var rank_1 = 0;
	var comment_1 = 0;
	var comment_2 = 0;
	var comment_3 = 0;

	for (var i = 0; i < rank_arr.length; i ++){
		rank_sum += rank_arr[i]*1;
	}
	if (rank_sum == 0) return;
	rank_5 = rank_arr[0];
	rank_4 = rank_arr[1];
	rank_3 = rank_arr[2];
	rank_2 = rank_arr[3];
	rank_1 = rank_arr[4];
	
	comment_1 = parseInt((rank_5/rank_sum)*100);
	comment_2 = parseInt(((rank_4*1+rank_3*1+rank_2*1)/rank_sum)*100);
	comment_3 = parseInt((rank_1/rank_sum)*100);
	
	$('#comment_sum').html(comment_1+"%");
	
	$('#comment_1').html(comment_1+"%");
	$('#comment_2').html(comment_2+"%");
	$('#comment_3').html(comment_3+"%");
	
	$('#comment_width_1').attr('style', "width:"+comment_1+"%");
	$('#comment_width_2').attr('style', "width:"+comment_2+"%");
	$('#comment_width_3').attr('style', "width:"+comment_3+"%");

	
}

set_comment_rank();

$('.JS_comment_num').html(<?php echo $this->_var['pager']['record_count']; ?>);
	  
function submitComment(frm)
{
  var cmt = new Object;

  //cmt.username        = frm.elements['username'].value;
  cmt.email           = frm.elements['email'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = 0;

  for (i = 0; i < frm.elements['comment_rank'].length; i++)
  {
    if (frm.elements['comment_rank'][i].checked)
    {
       cmt.rank = frm.elements['comment_rank'][i].value;
     }
  }

//  if (cmt.username.length == 0)
//  {
//     alert(cmt_empty_username);
//     return false;
//  }

  if (cmt.email.length > 0)
  {
     if (!(Utils.isEmail(cmt.email)))
     {
        alert(cmt_error_email);
        return false;
      }
   }
   else
   {
        alert(cmt_empty_email);
        return false;
   }

   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }
   
   $.ajax({
					type:"POST",
					url:"comment.php",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'cmt=' + $.toJSON(cmt),
					success:commentResponse
				});

   return false;
}


/**
 * 处理提交评论的反馈信息
*/
  function commentResponse(result)
  {
    if (result.message)
    {
      alert(result.message);
    }

    if (result.error == 0)
    {
      var layer = document.getElementById('ECS_COMMENT');

      if (layer)
      {
        layer.innerHTML = result.content;
		get_comment_img();
      }
    }
  }
 function gotoPage(page, id, type)
 {
	  $.ajax({
						type:"GET",
						url:"comment.php?act=gotopage",
						cache:false,
						dataType:'json',     //接受数据格式
						data:'page=' + page + '&id=' + id + '&type=' + type,
						success:gotoPageResponse
					});
 } 
function gotoPageResponse(result)
{
  document.getElementById("ECS_COMMENT").innerHTML = result.content;
  get_comment_img();
}

//]]>
</script>
  </div>
  
<?php endif; ?>
