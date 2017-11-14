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
<link href="themes/meilele/store_css/street.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className='root_body';window.isWideScreen = true;window.LOAD = true;}else{window.LOAD = false;}})()</script>

<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="w clearfix mt10">
  <div class="cat_r">
    <div class="position">
      <?php echo $this->fetch('library/ur_here.lbi'); ?> </div>

	<div class="filter" style="padding-left:0px; padding-right:0px">

        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#fff">
        <tr>
          <td bgcolor="#ffffff" width="200" align="center" valign="middle">
          <div style="width:200px; overflow:hidden;">
          <?php if ($this->_var['store']['shop_logo']): ?>
            <img src="<?php echo $this->_var['store']['shop_logo']; ?>" style="width:200px;"/>
            <?php endif; ?>
          </div>
          </td>
          <td bgcolor="#ffffff">
       <!--   <?php echo nl2br($this->_var['brand']['brand_desc']); ?><br />
            <?php if ($this->_var['brand']['site_url']): ?>
            <?php echo $this->_var['lang']['official_site']; ?> <a href="<?php echo $this->_var['brand']['site_url']; ?>" target="_blank" class="f6"><?php echo $this->_var['brand']['site_url']; ?></a><br />
            <?php endif; ?>
        -->
         </td>
        </tr>
      </table>

      <table class="filter_table" style=" border-top:1px solid #CCCCCC; margin-top:8px" width="100%">

        <tr class="list">
             <td class="lable"><?php echo $this->_var['lang']['brand_category']; ?></td>
              <td class="value">
            <?php $_from = $this->_var['brand_cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
                 <a href='<?php echo $this->_var['cat']['url']; ?>'><?php echo htmlspecialchars($this->_var['cat']['cat_name']); ?> <?php if ($this->_var['cat']['goods_count']): ?>(<?php echo $this->_var['cat']['goods_count']; ?>)<?php endif; ?><span></span></a>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </td>
        </tr>
       </table>

    </div>

    <?php echo $this->fetch('library/store_goods_list.lbi'); ?>
    <?php echo $this->fetch('library/pages2.lbi'); ?>
  </div>
  <div class="cat_l">

    <?php echo $this->fetch('library/category_tree.lbi'); ?>


	<div class="ranking mt10">
  <div class="title_1"><span class="icon"></span><span class="zh">本月热卖排行榜</span></div>
  <div class="rankbody">
  <?php $_from = get_cat_hot_goods_5(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item']):
        $this->_foreach['best_goods']['iteration']++;
?>
    <div id="JS_left_rank_<?php echo ($this->_foreach['best_goods']['iteration'] - 1); ?>" class="list <?php if ($this->_foreach['best_goods']['iteration'] == 1): ?>first<?php endif; ?> <?php if (($this->_foreach['best_goods']['iteration'] == $this->_foreach['best_goods']['total'])): ?>current<?php endif; ?>" onmouseover="setRankCurrent(<?php echo ($this->_foreach['best_goods']['iteration'] - 1); ?>);">
      <div class="titles"><span class="icon icon1"><?php echo $this->_foreach['best_goods']['iteration']; ?></span><span style="width: auto;" class="name"><a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank"><?php echo sub_str($this->_var['goods_item']['short_name'],12); ?></a></span></div>
      <div class="extra">
        <div class="img c"><a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank"><img data-src="<?php echo $this->_var['goods_item']['thumb']; ?>" src="<?php echo $this->_var['goods_item']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" height="106" width="160"></a></div>
        <!-- <div class="info c"> 本站价：<span class="red yen"><?php if ($this->_var['goods_item']['promote_price'] != ""): ?><?php echo $this->_var['goods_item']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item']['shop_price']; ?><?php endif; ?></span> <span class="gray">销量：</span><span class="orange"><?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods_item][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php echo $this->_var['goods_data']['total_sells']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span> </div> -->
      </div>
    </div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  </div>
</div>
<script>
var _currentRankId = 0;
function setRankCurrent(j) {
	if (!j) {
		j = 0;
	}
	if (j == _currentRankId) {
		return;
	}
	var h = $("#JS_left_rank_" + j);
	var i = $("#JS_left_rank_" + _currentRankId);
	if (h && i) {
		var c = h.find("span").eq(1);
		var g = i.find("span").eq(1);
		if (c && g) {
			var b = c.find("a").eq(0);
			var e = g.find("a").eq(0);
			if (b && e) {

			}
		}
		h.addClass("current");
		i.removeClass("current");
		_currentRankId = j;
	}
}
</script>


    <div class="comment mt10">
      <div class="title_1"><span class="icon"></span><span class="zh">本月新品</span></div>
      <?php $_from = get_cat_new_goods_10(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item']):
        $this->_foreach['best_goods']['iteration']++;
?>
      <div class="list clearfix <?php if ($this->_foreach['best_goods']['iteration'] == 1): ?>first<?php endif; ?><?php if (($this->_foreach['best_goods']['iteration'] == $this->_foreach['best_goods']['total'])): ?>last<?php endif; ?>">
        <div class="Left"><a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank"><img width="96" height="64" src="<?php echo $this->_var['goods_item']['thumb']; ?>"  alt="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" /></a></div>
        <div class="Right"> <a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods_item']['short_name']); ?></a>
        <!--  <p class="gray">本站价：<span class="red yen"></span><span class="red JS_show_price_ajax" data-goods_id=""><?php if ($this->_var['goods_item']['promote_price'] != ""): ?><?php echo $this->_var['goods_item']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item']['shop_price']; ?><?php endif; ?></span></p> -->
        </div>
      </div>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <div class="mt10" id="JS_adimg_rand"></div>
  </div>
</div>


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