<!DOCTYPE HTML>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<link rel="stylesheet" href="themes/meilele/css/tuango.min.css?1030" type="text/css" media="screen" title="no title" charset="utf-8"/>
<script src="themes/meilele/js/jq.js"></script>
<script src="themes/meilele/js/common.min.js?0905"></script>
<script src="themes/meilele/js/jquery.timer.js"></script>
</head>
<body style="overflow-x:hidden">
<script type="text/javascript">
			window.ISSCREENWIDTH = false;
			(function() {
				//return;
				var screenWidth = window.screen.width;
				if (screenWidth >= 1280) {
					document.body.className = "root_body";
					window.ISSCREENWIDTH = true;
				}
			})()
		</script>

<?php echo $this->fetch('library/page_header.lbi'); ?> 


<div id="tuan_container" class="w">
  <div class="tg_pos"> <?php echo $this->fetch('library/ur_here.lbi'); ?>  </div>
  <?php $_from = get_advlist_by_id(7); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
  <div class="tuan_ad"> <a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" style="max-height: 168px" /></a> </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <div class="tuan_serch">
    <div class="tuan_serch_t">
      <h3 class="Left">商品列表</h3>
      <div class="totalbox Right"> <span class="total">共计<b><?php echo $this->_var['pager']['record_count']; ?></b>件商品</span><span class="page"><span class="pg"><i><?php echo $this->_var['pager']['page']; ?></i>/<?php echo $this->_var['pager']['page_count']; ?></span> <?php if ($this->_var['pager']['page_prev']): ?><a class="next" href="<?php echo $this->_var['pager']['page_prev']; ?>" title="上一页">上一页</a><?php endif; ?><?php if ($this->_var['pager']['page_next']): ?><a class="next" href="<?php echo $this->_var['pager']['page_next']; ?>" title="下一页">下一页</a><?php endif; ?> </span>
       
      </div> </div>
    
    
  </div>
  <div id="tuan_list" class="tuan_list_container clearfix">
  <?php $_from = $this->_var['gb_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'group_buy');$this->_foreach['groupname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupname']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['group_buy']):
        $this->_foreach['groupname']['iteration']++;
?>
    <div class="tg_list">
      <div class="tg_goods" onMouseOver="this.className='tg_goods active';" onMouseOut="this.className='tg_goods';">
        <p class="name"> <a title="<?php if ($this->_var['group_buy']['group_title']): ?><?php echo $this->_var['group_buy']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy']['act_name']; ?><?php endif; ?>" target="_blank" href="<?php echo $this->_var['group_buy']['url']; ?>"><?php if ($this->_var['group_buy']['group_title']): ?><?php echo $this->_var['group_buy']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy']['act_name']; ?><?php endif; ?></a> </p>
        <p class="tg_pic"> <a title="<?php if ($this->_var['group_buy']['group_title']): ?><?php echo $this->_var['group_buy']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy']['act_name']; ?><?php endif; ?>" target="_blank" href="<?php echo $this->_var['group_buy']['url']; ?>"><img width="266" height="176" alt="<?php if ($this->_var['group_buy']['group_title']): ?><?php echo $this->_var['group_buy']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy']['act_name']; ?><?php endif; ?>" src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['group_buy']['group_img']; ?>"></a> <span class="tg_info"><span class="Left" id="over_time_<?php echo $this->_foreach['groupname']['iteration']; ?>" d='<?php echo $this->_var['group_buy']['gmt_time']; ?>'>0天0时0分0秒</span><span class="Right">已团购：<b id="JS_already_number_25544"><?php if ($this->_var['group_buy']['isg_rs'] == 1): ?><?php echo $this->_var['group_buy']['group_rs']; ?><?php else: ?><?php echo $this->_var['group_buy']['cur_amount']; ?><?php endif; ?></b>个</span></span> </p>
        <a title="<?php if ($this->_var['group_buy']['group_title']): ?><?php echo $this->_var['group_buy']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy']['act_name']; ?><?php endif; ?>" target="_blank" href="<?php echo $this->_var['group_buy']['url']; ?>" class="delstl gogo" id="JS_state_25544"><strong class="yen"><small>&yen;</small><?php $_from = $this->_var['group_buy']['price_ladder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['foo']['iteration']++;
?><?php if (($this->_foreach['foo']['iteration'] == $this->_foreach['foo']['total'])): ?><?php echo $this->_var['item']['price']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></strong><span><b><?php echo $this->_var['group_buy']['t_discount']; ?></b>折 <br />
        <i><?php echo $this->_var['group_buy']['market_price']; ?>元</i></span></a> </div>
      <p class="foot"></p>
      <p class="icon"></p>
    </div>
	<script language="javascript">
	$(function() {
		                $('#over_time_<?php echo $this->_foreach['groupname']['iteration']; ?>').everyTime(1000, function() {
						    
							var now = new Date();
							var goodslist = <?php echo empty($this->_var['group_buy']['end_date']) ? '0' : $this->_var['group_buy']['end_date']; ?>;
							today=new Date();
							timeold=goodslist*1000 - today.getTime();
							sectimeold=timeold/1000;
							secondsold=Math.floor(sectimeold);
							msPerDay=24*60*60*1000;
							e_daysold=timeold/msPerDay;
							daysold=Math.round(e_daysold);
							e_hrsold=(e_daysold-daysold)*24;
							hrsold=Math.floor(e_hrsold);
							e_minsold=(e_hrsold-hrsold)*60;
							minsold=Math.floor((e_hrsold-hrsold)*60);
							seconds=Math.floor((e_minsold-minsold)*60);
							var str = '';
							if (daysold<0) {
							str="逾期,倒计时已经失效";
							}else {
								if (daysold<1) {
str="<strong>0</strong>天<strong>"+hrsold+"</strong>"+"小时"+"<strong>"+minsold+"</strong>"+"分"+seconds+"秒";
								}else {
str="<strong>"+daysold+"</strong>"+"天"+"<strong>"+hrsold+"</strong>"+"小时"+"<strong>"+minsold+"</strong>"+"分"+seconds+"秒";
							    }
							
							}
							
							$(this).html(str);
						
					

		                });
	 });
	
	</script>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   
  </div>
  <?php echo $this->fetch('library/pages2.lbi'); ?>
  
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

<script src="themes/meilele/js/back_to_top.min.js?1127"></script>

<script type="text/javascript" charset="utf-8">

			//图片缓加载
			var len = document.images.length, src;
			for (var i = 0; i < len; i++) {
				img = document.images[i];
				src = img.getAttribute("data-src");
				if (src) {
					img.src = src;
					img.removeAttribute("data-src");
				}
			}	
			
			
			
				
		
		</script>

</body>
</html>
<!--
GERMANY:2013-10-30 18:59:59
-->
