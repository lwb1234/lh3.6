
<ul class="ad_list clearfix" id="best_goods_list">
	<?php $_from = get_cat_best_goods_3($GLOBALS[smarty]->_var[top_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item');$this->_foreach['hot_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item']):
        $this->_foreach['hot_goods']['iteration']++;
?>
      <li class="clearfix <?php if ($this->_foreach['hot_goods']['iteration'] == 3): ?>SCREEN_SHOW<?php endif; ?>">
        <div class="img Left"> <a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods_item']['thumb']; ?>" width="185" height="124" alt="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" /></a> </div>
        <div class="info Right"> <a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank" class="ad_goods_name">
          <p class="orange"><?php echo htmlspecialchars($this->_var['goods_item']['short_name']); ?></p>
          </a>
          <!-- <p class="red">本站价：<span class="yen"><strong class="f16 JS_show_price_ajax"><?php if ($this->_var['goods_item']['promote_price'] != ""): ?><?php echo $this->_var['goods_item']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item']['shop_price']; ?><?php endif; ?></strong></span></p> -->
          <a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank" class="buy_now c">去看看</a> </div>
      </li>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </ul>
	<script language="javascript">
$("#best_goods_list").each(
	function(i){
		var l = $(this).html();
		if ($.trim(l) == ''){
			$(this).hide();
		}
	}
);

</script>
