
<div id="JS_viewHistory" class="mt10" style="display:none">
<div class="cs_icon" style=""></div>
  <div class="title"><span class="f14">根据您的浏览记录 我们为您推荐</span></div>
  <div class="clearfix body">
    <div class="history">
      <div class="text" title="您最近的浏览记录"></div>
      <div id="JS_history" class="clearfix">
	  <?php $_from = get_history(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item_0_02540600_1509599220');$this->_foreach['historys'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['historys']['total'] > 0):
    foreach ($_from AS $this->_var['item_0_02540600_1509599220']):
        $this->_foreach['historys']['iteration']++;
?>
	  <?php if ($this->_foreach['historys']['iteration'] < 4): ?>
        <div class="list clearfix">
          <div class="Left"><a href="<?php echo $this->_var['item_0_02540600_1509599220']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['item_0_02540600_1509599220']['goods_thumb']; ?>" data-src-vh="<?php echo $this->_var['item_0_02540600_1509599220']['goods_thumb']; ?>" data="images/blank.gif" alt="<?php echo $this->_var['item_0_02540600_1509599220']['short_name']; ?>" height="57" width="91"></a></div>
          <div class="Right"><a href="<?php echo $this->_var['item_0_02540600_1509599220']['url']; ?>" title="<?php echo $this->_var['item_0_02540600_1509599220']['short_name']; ?>" target="_blank"><?php echo sub_str($this->_var['item_0_02540600_1509599220']['short_name'],16); ?></a><br>
           <!-- <span class="red bold yen"><?php echo $this->_var['item_0_02540600_1509599220']['shop_price']; ?></span> -->
	   </div>
        </div>
		<?php endif; ?>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
    </div>
    <div class="scroll" id="JS_scroll">
      <div class="text">为您推荐以下商品：</div>
      <div style="height:206px;overflow:hidden;margin-bottom:20px;">
        <div class="box" style="overflow-x:scroll;height:260px;" id="JS_scroll_box">
          <table style="margin-left: 0px;" id="JS_scroll_table">
            <tbody>
              <tr>
			  <?php $_from = get_cat_promote_goods_12($GLOBALS[smarty]->_var[top_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item_0_02640600_1509599220');$this->_foreach['get_cat_best_goods_12'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_best_goods_12']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item_0_02640600_1509599220']):
        $this->_foreach['get_cat_best_goods_12']['iteration']++;
?>
                <td><div><a target="_blank" href="<?php echo $this->_var['goods_item_0_02640600_1509599220']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item_0_02640600_1509599220']['name']); ?>"><img src="<?php echo $this->_var['goods_item_0_02640600_1509599220']['thumb']; ?>" data-src-vh="<?php echo $this->_var['goods_item_0_02640600_1509599220']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_item_0_02640600_1509599220']['name']); ?>" height="106" width="160"></a></div>
                  <div class="bd"><a target="_blank" href="<?php echo $this->_var['goods_item_0_02640600_1509599220']['url']; ?>"><?php echo htmlspecialchars($this->_var['goods_item_0_02640600_1509599220']['short_name']); ?></a><br>
                  <!--  <span class="gray">本站价：</span><span class="red bold yen"><?php if ($this->_var['goods_item_0_02640600_1509599220']['promote_price'] != ""): ?><?php echo $this->_var['goods_item_0_02640600_1509599220']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item_0_02640600_1509599220']['shop_price']; ?><?php endif; ?></span> -->
		  </div></td>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	  
				
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <a class="btn enabled btn_left" id="JS_scroll_left"></a><a class="btn enabled btn_right" id="JS_scroll_right"></a>
      <div class="bar">
        <button id="JS_scroll_btn" style="margin-left: 0px; border: 0px none;"></button>
      </div>
    </div>
  </div>
</div>