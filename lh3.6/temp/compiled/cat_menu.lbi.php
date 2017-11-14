<style>
.sideMenu {width: 200px;height: 388px;margin-right: 10px;float: left;}
.sideMenu .in{width: 198px;border: solid 1px #DDD;background: white;}
.sideMenu .head{height: 41px;line-height: 41px;	text-align: center;	border-bottom: solid 1px #DDD;background: #F2F2F2;font-size: 18px;
	font-family: 微软雅黑;}
.sideMenu .catItem{position:relative;height:61px;z-index: 30;}
.sideMenu .catItem.cat_bg{background:#f7f1f1;}
.sideMenu .catItem .item_show{position:absolute;z-index:2;padding:8px 10px;}
.sideMenu .catItem .item_show .dt{height:24px;line-height:24px;display: inline-block;width: 180px;}
.sideMenu .catItem .item_show .dt .t{display:inline-block;font-weight:bold;font-size:14px;font-family:微软雅黑;float:left;}
.sideMenu .catItem .item_show .dt .t img{margin-right: 10px; vertical-align: middle; background: none;border: none;}
.sideMenu .catItem .item_show .dt .arrow{color:#b0b0b0;float:right;}
.sideMenu .catItem .item_show .dd{margin-top:4px;overflow:hidden;}
.sideMenu .body{/*height: 366px;*/}
.sideMenu .hover .item_show{width:180px;padding:7px 10px;background:#fff;border-left:solid 4px #d52a50;border-top:solid 1px #bcbcbc;border-bottom:solid 1px #bcbcbc;z-index:3;}
.sideMenu .hover .item_show .t{color:#d52a50;}
.sideMenu .catItem .coverMenu{width: 480px;height: auto;border: solid 1px #BCBCBC;box-shadow: 1px 1px 8px #999;background: white;position: absolute;z-index: 1;left: 203px;top: 0px;display: none;}
.sideMenu .hover .coverMenu{display: block;}
.sideMenu .catItem .item_show {height: 45px;}
.sideMenu .catItem .item_show .dd {height: 17px;line-height: 17px;}
.sideMenu .coverMenu .allCat,.coverMenu .activity{padding:0 20px;}
.sideMenu .coverMenu .ctitle{color: #C00;line-height: 30px;padding-top: 10px;border-bottom: 1px solid #ECECEC;font-weight: bold;}
.sideMenu .coverMenu .cat{padding-top:0;}
.sideMenu .coverMenu .allCat .link{line-height: 24px;padding-top: 5px;}
.sideMenu .coverMenu .allCat .link span.gray{color: #E4E4E4;white-space: nowrap;word-wrap: break-word;}
.sideMenu .coverMenu .activity ul{padding-top: 10px;}
.sideMenu .coverMenu .activity ul li{float: left;height: 24px;line-height: 24px;width: 170px;padding-right: 10px;overflow: hidden;}
.sideMenu .coverMenu .brand{margin: 10px 0;height: 60px;padding-top: 20px;overflow: hidden;background: #F9F9F9;border-top: 1px solid #F2F2F2;}
.sideMenu .coverMenu .brand a.first{border-left: none;}
.sideMenu .coverMenu .brand a{display: inline-block;width: 119px;text-align: center;height: 50px;border-left: 1px dashed #E8E8E8;}
.sideMenu .d1{}
.sideMenu .d2{margin-top:-60px;}
.sideMenu .d4{margin-top:-60px;}
.sideMenu .d5{margin-top:-120px;}
.sideMenu .d6,.sideMenu .d7,.sideMenu .d8,.sideMenu .d9,.sideMenu .d10,.sideMenu .d11,.sideMenu .d12,.sideMenu .d13,.sideMenu .d14,.sideMenu .d15,.sideMenu .d16,.sideMenu .d17,.sideMenu .d18,.sideMenu .d19,.sideMenu .d20{margin-top:-180px;}
.root_body .sideMenu .fixedLay{position:fixed;top:0px;z-index:10;_position:absolute;_top:expression(offsetParent.scrollTop);_right:expression(this.offsetRight);}
.root_body .sideMenu .in{width: 203px;}
</style>
<div class="sideMenu">
<div id="JS_fixed_goods_cat" class="in">
  <div class="head">所有<?php $_from = get_cat_info_ex($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_99977000_1509774028');$this->_foreach['get_cat_info'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_info']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_99977000_1509774028']):
        $this->_foreach['get_cat_info']['iteration']++;
?><?php echo $this->_var['cat_0_99977000_1509774028']['cat_name']; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>商品分类</div>
  <div class="body">
  <?php $_from = get_categories_tree(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_99977000_1509774028');$this->_foreach['get_categories_tree'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_categories_tree']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_99977000_1509774028']):
        $this->_foreach['get_categories_tree']['iteration']++;
?>
  <?php if ($this->_var['cat_0_99977000_1509774028']['id'] == $this->_var['category']): ?>
  <?php $_from = $this->_var['cat_0_99977000_1509774028']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_99977000_1509774028');$this->_foreach['cat_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['child_0_99977000_1509774028']):
        $this->_foreach['cat_cat_id']['iteration']++;
?>
  <?php if ($this->_foreach['cat_cat_id']['iteration'] < 8): ?>
    <div class="catItem <?php if ($this->_foreach['cat_cat_id']['iteration'] % 2 == 0): ?>cat_bg<?php endif; ?>" id="JS_jiaju_index_cat_menu_<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>">
      <dl class="item_show">
        <dt class="dt"><a href="<?php echo $this->_var['child_0_99977000_1509774028']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['child_0_99977000_1509774028']['name']); ?>" class="t"><?php echo htmlspecialchars($this->_var['child_0_99977000_1509774028']['name']); ?></a><strong class="arrow">&gt;</strong></dt>
        <dd class="dd">
		<?php $_from = $this->_var['child_0_99977000_1509774028']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer_0_00077000_1509774029');$this->_foreach['child_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['childer_0_00077000_1509774029']):
        $this->_foreach['child_cat_id']['iteration']++;
?>
		<?php if ($this->_foreach['child_cat_id']['iteration'] < 4): ?>
		<a href="<?php echo $this->_var['childer_0_00077000_1509774029']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['childer_0_00077000_1509774029']['name']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['childer_0_00077000_1509774029']['name']); ?></a>&emsp;
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</dd>
      </dl>
      <div id="JS_goods_cat_target_<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>" class="coverMenu d1"></div>
    </div>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
  </div>
</div>
<?php $_from = get_categories_tree(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_00177000_1509774029');$this->_foreach['get_categories_tree'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_categories_tree']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_00177000_1509774029']):
        $this->_foreach['get_categories_tree']['iteration']++;
?>
  <?php if ($this->_var['cat_0_00177000_1509774029']['id'] == $this->_var['category']): ?>
  <?php $_from = $this->_var['cat_0_00177000_1509774029']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_00177000_1509774029');$this->_foreach['cat_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['child_0_00177000_1509774029']):
        $this->_foreach['cat_cat_id']['iteration']++;
?>
  <?php if ($this->_foreach['cat_cat_id']['iteration'] < 8): ?>
<textarea id="JS_goods_cat_source_<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>" class="none"><div class="allCat">
			                
			<div class="cat ctitle"><a href="<?php echo $this->_var['child_0_00177000_1509774029']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['child_0_00177000_1509774029']['name']); ?>"><?php echo htmlspecialchars($this->_var['child_0_00177000_1509774029']['name']); ?></a></div>
			<div class="link">
			<?php $_from = $this->_var['child_0_00177000_1509774029']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer_0_00177000_1509774029');$this->_foreach['child_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['childer_0_00177000_1509774029']):
        $this->_foreach['child_cat_id']['iteration']++;
?>
			<span class="gray">|&emsp;<a href="<?php echo $this->_var['childer_0_00177000_1509774029']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['childer_0_00177000_1509774029']['name']); ?>"><?php echo htmlspecialchars($this->_var['childer_0_00177000_1509774029']['name']); ?></a>&emsp;</span>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>					

							</div>                
					</div>
		<div class="activity">
			<div class="ctitle">促销活动</div>
			<ul class="clearfix">
			<?php $_from = get_navad_by_cat_id($this->_var[child][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_00177000_1509774029');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_00177000_1509774029']):
        $this->_foreach['index_image']['iteration']++;
?>
				<li><a href="<?php echo $this->_var['ad_0_00177000_1509774029']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad_0_00177000_1509774029']['ad_code']; ?>">&bull; <?php echo $this->_var['ad_0_00177000_1509774029']['ad_code']; ?></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
			</ul>
		</div>
		<!--
		<div class="brand clearfix" style="height:62px;padding-top:8px;"><?php $_from = get_cat_brands($this->_var[child][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brandCat');$this->_foreach['get_cat_brands'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_brands']['total'] > 0):
    foreach ($_from AS $this->_var['brandCat']):
        $this->_foreach['get_cat_brands']['iteration']++;
?><?php if ($this->_foreach['get_cat_brands']['iteration'] < 5): ?><a title="<?php echo $this->_var['brandCat']['name']; ?>" <?php if ($this->_foreach['get_cat_brands']['iteration'] == 1): ?>class="first"<?php endif; ?> href="<?php echo $this->_var['brandCat']['url']; ?>" target="_blank"><img src="data/brandlogo/<?php echo $this->_var['brandCat']['logo']; ?>" width="100" height="50" alt="<?php echo $this->_var['brandCat']['name']; ?>" /></a><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>
		-->
</textarea>
<script type="text/javascript">
		_onReadyList.push(function(){
			$('#JS_jiaju_index_cat_menu_<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>').hover(function(){
				_show_(this,{source:'JS_goods_cat_source_<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>',target:'JS_goods_cat_target_<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>'});
			},function(){
				_hide_(this);
			})
		});
		</script>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

<script type="text/javascript">
		_onReadyList.push(
			function(){
				var screenWidth_1=window.screen.width;
				if(screenWidth_1<1280)
				{
					$('#JS_fixed_goods_cat .catItem').each(function(index,element){
						if(index>5)
							$(element).hide();
					})
				}
			}
		);
	</script>
</div>
