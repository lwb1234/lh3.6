
<div class="ranking mt10">
  <div class="title_1"><span class="icon"></span><span class="zh">本月热卖排行榜</span></div>
  <div class="rankbody">
  <?php $_from = get_cat_hot_goods_5(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item_0_83739600_1509599219');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item_0_83739600_1509599219']):
        $this->_foreach['best_goods']['iteration']++;
?>
    <div id="JS_left_rank_<?php echo ($this->_foreach['best_goods']['iteration'] - 1); ?>" class="list <?php if ($this->_foreach['best_goods']['iteration'] == 1): ?>first<?php endif; ?> <?php if (($this->_foreach['best_goods']['iteration'] == $this->_foreach['best_goods']['total'])): ?>current<?php endif; ?>" onmouseover="setRankCurrent(<?php echo ($this->_foreach['best_goods']['iteration'] - 1); ?>);">
      <div class="titles"><span class="icon icon1"><?php echo $this->_foreach['best_goods']['iteration']; ?></span><span style="width: auto;" class="name"><a href="<?php echo $this->_var['goods_item_0_83739600_1509599219']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item_0_83739600_1509599219']['name']); ?>" target="_blank"><?php echo sub_str($this->_var['goods_item_0_83739600_1509599219']['short_name'],12); ?></a></span></div>
      <div class="extra">
        <div class="img c"><a href="<?php echo $this->_var['goods_item_0_83739600_1509599219']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item_0_83739600_1509599219']['name']); ?>" target="_blank"><img data-src="<?php echo $this->_var['goods_item_0_83739600_1509599219']['thumb']; ?>" src="<?php echo $this->_var['goods_item_0_83739600_1509599219']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_item_0_83739600_1509599219']['name']); ?>" height="106" width="160"></a></div>
        <!-- <div class="info c"> 本站价：<span class="red yen"><?php if ($this->_var['goods_item_0_83739600_1509599219']['promote_price'] != ""): ?><?php echo $this->_var['goods_item_0_83739600_1509599219']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item_0_83739600_1509599219']['shop_price']; ?><?php endif; ?></span> <span class="gray">销量：</span><span class="orange"><?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods_item][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data_0_83839600_1509599219');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data_0_83839600_1509599219']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php echo $this->_var['goods_data_0_83839600_1509599219']['total_sells']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span> </div> -->
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
