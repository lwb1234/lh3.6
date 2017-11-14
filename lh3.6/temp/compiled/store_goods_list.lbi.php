<a name="goods_list"></a>
<div class="sort clearfix mt10" style="margin-bottom: 0;z-index:5;">
     <div class="Left"> <span class="box">商店商品：</span>

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
          <p><span class="red bold yen f16"><span class="JS_show_price_ajax" data-goods_id=""><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></span></span>&nbsp;<span class="yen gray"><del><?php echo $this->_var['goods']['market_price']; ?></del>&nbsp;|&nbsp;</span><span class="price red">销量：<span class="JS_sale_num_ajax"><?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php echo $this->_var['goods_data']['total_sells']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span></span></p>
        </div>

        <div class="goods_button" >
          <?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><p class="com gray l">评价：<a target="_blank" class="orange"><?php echo $this->_var['goods_data']['total_comments']; ?></a>&emsp;人气：<?php echo $this->_var['goods_data']['click_count']; ?></p><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <div class="buttons"> <a href="javascript:;" onclick="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="icon shoping_cat">放入购物车</a> <a href="javascript:;" onclick="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="icon collect">收藏</a> </div>
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