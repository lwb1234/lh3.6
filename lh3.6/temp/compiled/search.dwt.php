<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css" />
<link href="themes/meilele/css/category_wide.min.css?1128" rel="stylesheet" type="text/css"/>
<script src="themes/meilele/js/jq.js?1119"></script>
<script src="themes/meilele/js/jquery.json.min.js"></script>
</head>
<body>
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className='root_body';window.isWideScreen = true;window.LOAD = true;}else{window.LOAD = false;}})()</script>

<?php echo $this->fetch('library/page_header.lbi'); ?> 

<div class="w clearfix mt10">
  <div class="cat_r">
    <div class="position">
      <?php echo $this->fetch('library/ur_here.lbi'); ?> </div>
    <?php echo $this->fetch('library/goods_hot.lbi'); ?>
	
	<script language="javascript">
function search_order(sort){
	listform.sort.value = sort;
	listform.order.value = <?php if ($this->_var['pager']['search']['order'] == 'ASC'): ?>'DESC'<?php else: ?>'ASC'<?php endif; ?>;
	listform.submit();
}

</script>
        <form action="search.php" method="post" class="sort" name="listform" id="form" style="display:none">
         
              <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
              <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
              <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>

                <?php if ($this->_var['key'] == 'keywords'): ?>
                  <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo urldecode($this->_var['item']); ?>" />
                <?php else: ?>
                  <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
                <?php endif; ?>

              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </form>
    <div class="sort clearfix mt10" style="margin-bottom: 0;z-index:5;">
      <div class="Left"> <span class="box">排序：</span>
	  <a href="javascript:search_order('sell_number');" class="box arrow <?php if ($this->_var['pager']['search']['sort'] == 'sell_number'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">销量</a>
	  <a href="javascript:search_order('click_count');" class="box arrow aup <?php if ($this->_var['pager']['search']['sort'] == 'click_count'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">人气</a> 
	  <a href="javascript:search_order('shop_price');" class="box arrow aup <?php if ($this->_var['pager']['search']['sort'] == 'shop_price'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">价格</a>
	  <a href="javascript:search_order('goods_id');" class="box arrow <?php if ($this->_var['pager']['search']['sort'] == 'goods_id'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">最新</a>
	  
	  </div>
      
      <div class="Right page_box"> <span class="red stat_num">共<strong><?php echo $this->_var['pager']['record_count']; ?></strong>件商品</span><span class="page_num"><strong class="red"><?php echo $this->_var['pager']['page']; ?></strong>/<?php echo $this->_var['pager']['page_count']; ?></span> 
	  <?php if ($this->_var['pager']['page_prev']): ?>
	  <a href="<?php echo $this->_var['pager']['page_prev']; ?>" class="btn"><i class="icon_triangle triangle_prev"></i></a>
	  <?php else: ?>
	  <a href="javascript:;" class="btn disabled"><i class="icon_triangle triangle_prev"></i></a>&ensp;
	  <?php endif; ?>
	  <?php if ($this->_var['pager']['page_next']): ?>
	  <a href="<?php echo $this->_var['pager']['page_next']; ?>" class="btn"><i class="icon_triangle triangle_next"></i></a> 
	  <?php else: ?>
	  <a href="javascript:;" class="btn disabled"><i class="icon_triangle triangle_next"></i></a>
	  <?php endif; ?>
	  </div>
    </div>
 
 <?php if (! $this->_var['goods_list']): ?>
<div class="analysis_info" style="margin-top:5px">
  <div class="analysis_text">
    <table>
      <tbody>
        <tr>
          <td><i></i></td>
          <td>抱歉，没有找到与相关的商品。</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
 <?php endif; ?>
 
<div id="JS_goods_list" class="goods clearfix">
<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
    <?php if ($this->_var['goods']['goods_id']): ?>
     <a name="g<?php echo $this->_var['goods']['goods_id']; ?>"></a>
      <div class="list <?php if ($this->_foreach['goods_list']['iteration'] % 3 == 1): ?>first<?php endif; ?>">
        <?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php if ($this->_var['goods_data']['goods_flag'] != ''): ?><div class="float_bg"><span class="text3"><?php if ($this->_var['goods_data']['goods_flag'] == 'promote'): ?>抢购<?php endif; ?><?php if ($this->_var['goods_data']['goods_flag'] == 'new'): ?>新品<?php endif; ?><?php if ($this->_var['goods_data']['goods_flag'] == 'best'): ?>特价<?php endif; ?><?php if ($this->_var['goods_data']['goods_flag'] == 'hot'): ?>热销<?php endif; ?></span></div><?php endif; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo $this->_var['goods']['goods_name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['goods_thumb']; ?>" data-wide-src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" width="235" height="156"/></a></div>
        <div class="info">
          <p class="goods_name f14"> <a class="name f14" href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo $this->_var['goods']['goods_name']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></p>
        </div>

      </div>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
	  
      
    </div>
<script src="themes/meilele/js/jquery.json.min.js"></script>	
<script src="themes/meilele/js/common.js"></script>
	<script type="Text/Javascript" language="JavaScript">
<!--

function selectPage(sel)
{
  sel.form.submit();
}

//-->
</script>
<script type="text/javascript">

window.onload = function()
{
  
}
<?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
<?php if ($this->_var['key'] != 'button_compare'): ?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php else: ?>
var button_compare = '';
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
    <?php echo $this->fetch('library/pages2.lbi'); ?>
  </div>
  <div class="cat_l">

    <?php echo $this->fetch('library/category_tree.lbi'); ?>
    
    <?php echo $this->fetch('library/goods_best.lbi'); ?>
	
	<?php echo $this->fetch('library/goods_new.lbi'); ?>
    
    <div class="mt10" id="JS_adimg_rand"></div>
  </div>
</div>
<?php echo $this->fetch('library/goods_history.lbi'); ?>

<script type="text/javascript">
var _fixture_url = [];

var _fixture_bbs=[];
</script>
<?php echo $this->fetch('library/page_footer.lbi'); ?>




<script src="themes/meilele/js/back_to_top.min.js?1127"></script>
<script src="themes/meilele/js/category_wide_b.min.js?1127"></script>
<script type="text/javascript">

var CG = CG || {};
	CG.priceUrl = '';
	var _basic_url = '';

	CG.cat_id = 268;
	new TabMouseover('JS_fixture_tag','fixture_show',0);

</script>
<script type="text/javascript">
(function(){
	$('#JS_more_link_g_new').click(function(){
		var item =$(this),span=$('#JS_more'),arrow=$('#JS_more_arrow'),show_div=$('#JS_show_more');
		if( item.data('link') == 'more'){
			item.data('link','reduce');
			span.html('收起');
			arrow[0].className="arrow_up";
			show_div.show();
		}else{
			item.data('link','more');
			span.html('更多');
			arrow[0].className="arrow_down";
			show_div.hide();
		}
	});

var select_div=$('#JS_new_pro_select');
	$('#JS_new_select').mouseenter(function(){
		select_div.show();
	}).mouseleave(function(){
		select_div.hide();
	});
})();

</script>
<script type="text/javascript" src="themes/meilele/js/viewHistory.min.js?0917"></script>



</body>
</html>