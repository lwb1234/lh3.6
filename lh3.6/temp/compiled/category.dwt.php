<?php if ($this->_var['p_id'] > 0): ?>

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
	<?php if ($this->_var['brands']['1'] || $this->_var['price_grade']['1'] || $this->_var['filter_attr_list']): ?>
    <div class="filter">
      <script type="text/javascript">
				var _fliterShowNum = 3;
				var _fliterShowCount = 4;
			</script>
      <table class="filter_table" id="JS_fliterTable">
	  <?php if ($this->_var['brands']['1']): ?>
        <tr class="list">
          <td class="lable"><?php echo $this->_var['lang']['brand']; ?>：</td>
          <td class="value">
		  <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
		  <a href='<?php echo $this->_var['brand']['url']; ?>' class="<?php if ($this->_var['brand']['selected']): ?>current<?php endif; ?>"><?php echo $this->_var['brand']['brand_name']; ?><span></span></a> 
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		  </td>
        </tr>
      <?php endif; ?>  
	  <?php if ($this->_var['price_grade']['1']): ?>
        <tr class="list">
          <td class="lable"><?php echo $this->_var['lang']['price']; ?>：</td>
          <td class="value">
		  <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
		  <a href='<?php echo $this->_var['grade']['url']; ?>' class="<?php if ($this->_var['grade']['selected']): ?>current<?php endif; ?>"><?php echo $this->_var['grade']['price_range']; ?><span></span></a> 
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		  </td>
        </tr>
      <?php endif; ?>
	  <?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_87376200_1509774028');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_87376200_1509774028']):
?>
        <tr class="list">
          <td class="lable"><?php echo htmlspecialchars($this->_var['filter_attr_0_87376200_1509774028']['filter_attr_name']); ?>：</td>
          <td class="value">
		  <?php $_from = $this->_var['filter_attr_0_87376200_1509774028']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
		  <a href='<?php echo $this->_var['attr']['url']; ?>' class="<?php if ($this->_var['attr']['selected']): ?>current<?php endif; ?>"><?php echo $this->_var['attr']['attr_value']; ?><span></span></a> 
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		  </td>
        </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

      </table>
    </div>
	<?php endif; ?>
	<?php if ($this->_var['goods_list']): ?>
    <div class="toggle">
      <div class="bar"></div>
      <div class="c">
        <div id="JS_exp_fliter" class="nav_box clearfix">
          <div class="nav nav_left Left"></div>
          <div class="nav nav_content Left" id="JS_exp_fliter_text" data-show-text="更多选项<span class='nav_more_opt'></span>">更多选项<span class="nav_more_opt"></span></div>
          <div class="nav nav_right Left"></div>
        </div>
      </div>
    </div>
	<?php endif; ?>
    <?php echo $this->fetch('library/goods_list.lbi'); ?>
    <?php echo $this->fetch('library/pages2.lbi'); ?>
  </div>
  <div class="cat_l">
    <script type="text/javascript">
			var _currentCat = '0';
		</script>
    <div class="category">
      <div class="cate_title">所有分类</div>
	  <?php $_from = get_categories_tree(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['cat_tree'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_tree']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['cat_tree']['iteration']++;
?>
      <div class="category_title" onclick="toggleCatgory1(<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>);return false;"><a class="" href="<?php echo $this->_var['cat']['url']; ?>" id="JS_category_title_<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>" onclick="return false;"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a><span class="icon2" id="JS_category_icon2_<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>"><?php if ($this->_var['cat']['id'] == $this->_var['top_id']): ?>-<?php else: ?>+<?php endif; ?></span></div>
      <div id="JS_category_body_<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>" class="category_body <?php if ($this->_var['cat']['id'] != $this->_var['top_id']): ?>none<?php endif; ?>">
	  <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['cat_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['cat_cat_id']['iteration']++;
?>	
        <dl class="wofang <?php if ($this->_foreach['cat_cat_id']['iteration'] == 1): ?>first<?php endif; ?>">
          <dt><b class="<?php if ($this->_var['child']['id'] == $this->_var['p_id'] || $this->_var['child']['id'] == $this->_var['category']): ?>current<?php endif; ?>" onclick="toggleCatgory2(this);return false;"><?php if ($this->_var['child']['id'] == $this->_var['p_id'] || $this->_var['child']['id'] == $this->_var['category']): ?>−<?php else: ?>+<?php endif; ?></b><a href="<?php echo $this->_var['child']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['child']['name']); ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></dt>
          <dd class="<?php if ($this->_var['child']['id'] == $this->_var['p_id'] || $this->_var['child']['id'] == $this->_var['category']): ?><?php else: ?>none<?php endif; ?>"> <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?><span><a <?php if ($this->_var['childer']['id'] == $this->_var['category']): ?>class="current"<?php endif; ?> href="<?php if ($this->_var['childer']['id'] == $this->_var['category']): ?><?php echo $this->_var['child']['url']; ?><?php else: ?><?php echo $this->_var['childer']['url']; ?><?php endif; ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a></span><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </dd>
        </dl>
	   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
        
      </div>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
    </div>
    
    
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
         <!-- <p class="gray">本站价：<span class="red yen"></span><span class="red JS_show_price_ajax" data-goods_id=""><?php if ($this->_var['goods_item']['promote_price'] != ""): ?><?php echo $this->_var['goods_item']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item']['shop_price']; ?><?php endif; ?></span></p> -->
        </div>
      </div>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
	
	
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


<?php else: ?>

<?php if ($this->_var['category'] == 1): ?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta charset="utf-8">
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1203v" />
<style type="text/css">
.firstScreen{height:410px}.allJJClass{width:205px;height:506px;margin-right:5px}.allJJClass .in{width:203px;height:506px;border:solid 1px #ddd;background:#fff}
.allJJClass .fixedLay{position:fixed;top:0;z-index:10;_position:absolute;_top:expression(offsetParent.scrollTop);_right:expression(this.offsetRight)}.allJJClass .head{height:39px;line-height:39px;text-align:center;border-bottom:solid 1px #ddd;background:#f2f2f2;font-size:18px;font-family:微软雅黑}
.allJJClass .body{height:466px}.allJJClass .catItem{position:relative}.allJJClass .catItem.cat_bg{background:#f7f1f1}.allJJClass .catItem .item_show{position:absolute;z-index:2;padding:8px 10px}
.allJJClass .catItem .item_show .dt{height:24px;line-height:24px}.allJJClass .catItem .item_show .dt .t{display:inline-block;font-weight:bold;font-size:14px;font-family:微软雅黑;float:left}
.allJJClass .catItem .item_show .dt .t img{margin-right:10px;vertical-align:middle;background:0;border:0}.allJJClass .catItem .item_show .dt .arrow{color:#b0b0b0;float:right}
.allJJClass .catItem .item_show .dd{margin-top:4px;overflow:hidden}.allJJClass .catItem.h80{height:80px}.allJJClass .catItem.h80 .item_show{height:64px}
.allJJClass .catItem.h80 .item_show .dd{height:36px;line-height:18px}.allJJClass .catItem.h66{height:66px}.allJJClass .catItem.h66 .item_show{height:50px}
.allJJClass .catItem.h66 .item_show .dd{height:22px;line-height:22px}.allJJClass .catItem .item_hide{width:770px;border:solid 1px #bcbcbc;box-shadow:1px 1px 8px #999;background:#fff;position:absolute;z-index:1;left:203px;top:0;display:none}
.allJJClass .catItem .item_hide .topMap .subCat{width:490px;float:left}.allJJClass .catItem .item_hide .topMap .subCat .col{width:245px;float:left}.allJJClass .catItem .item_hide .topMap .subCat .item{width:220px;padding:20px 0 0 25px;float:left}
.allJJClass .catItem .item_hide .topMap .subCat .item .dt{padding-bottom:3px;border-bottom:solid 2px #333;font-weight:bold;font-size:14px;font-family:微软雅黑}
.allJJClass .catItem .item_hide .topMap .subCat .item .dd{margin-top:10px;line-height:20px;color:#e4e4e4;overflow:hidden}.allJJClass .catItem .item_hide .topMap .subCat .item .dd a{color:#656565}
.allJJClass .catItem .item_hide .topMap .ad{width:250px;height:370px;margin:20px 0;padding-left:10px;border-left:dotted 1px #e3e3e3;overflow:hidden;float:right}
.allJJClass .catItem .item_hide .bottomMap{height:88px;background:#f9f9f9;border-top:solid 1px #f2f2f2}.allJJClass .catItem .item_hide .bottomMap .brand{height:72px;padding:8px 0}
.allJJClass .catItem .item_hide .bottomMap .brand .li{width:85px;height:72px;padding:0 21px;border-left:dashed 1px #e8e8e8;text-align:center;float:left}
.allJJClass .catItem .item_hide .bottomMap .brand .li.first{border-left:none}.allJJClass .catItem .item_hide .bottomMap .brand a{display:block}.allJJClass .catItem .item_hide .bottomMap .brand .img{height:50px;overflow:hidden}
.allJJClass .catItem .item_hide .bottomMap .brand .name{height:22px;line-height:22px;font-size:14px;font-family:微软雅黑;color:#848482;font-weight:bold}.allJJClass .catItem .item_hide.hide1{top:-41px}
.allJJClass .catItem .item_hide.hide2{top:-121px}.allJJClass .catItem .item_hide.hide3{top:-201px}.allJJClass .catItem .item_hide.hide4{top:-281px}.allJJClass .catItem .item_hide.hide5{top:-314px}
.allJJClass .catItem .item_hide.hide6{top:-395px}.allJJClass .catItem.hover .item_show{width:180px;padding:7px 10px;background:#fff;border-left:solid 4px #d52a50;border-top:solid 1px #bcbcbc;border-bottom:solid 1px #bcbcbc;z-index:3}
.allJJClass .catItem.hover .item_show .dt .t2{background-position:0 -57px}.allJJClass .catItem.hover .item_show .dt .t4{background-position:0 -105px}.allJJClass .catItem.hover .item_show .dt .t6{background-position:0 -153px}
.allJJClass .catItem.hover .item_show .t{color:#d52a50}.allJJClass .catItem.hover .item_show .arrow{display:none}.allJJClass .catItem.hover .item_hide{display:block}
.ftsMain{width:770px;height:410px}.ftsMain .slide,.ftsMain .slide .stage{width:770px;height:410px;overflow:hidden}.ftsMain .slide .slideNav{width:770px;height:30px;overflow:hidden;position:absolute;margin-top:-30px}
.ftsMain .slide .slideNav a{display:inline-block;width:153px;height:30px;line-height:30px;overflow:hidden;vertical-align:top;margin-left:1px;background:#071c28;color:#fff;text-decoration:none;text-align:center;opacity:.9;filter:alpha(opacity=90)}
.ftsMain .slide .slideNav a:hover,.ftsMain .slide .slideNav .current{background:#a93a64;color:#fff!important}.ftsMain .slide .slideNav a.first{margin-left:0;width:154px}
.ftsMain .brand{height:81px;border:solid 1px #e7e7e7;margin-top:15px}.ftsMain .brand .list{width:127px;height:76px;padding-top:5px;overflow:hidden;float:left;text-align:center;border-left:solid 1px #e7e7e7}
.ftsMain .brand .list.first{border-left:none}.ftsMain .brand .list .blogo{height:50px;overflow:hidden}.ftsMain .brand .list .blogo a{display:block;width:100%;height:100%;background-position:0 0}
.ftsMain .brand .list .blogo a:hover{background-position:0 -50px}.ftsMain .brand .list .desc{margin-top:5px}.ftsMain .brand .list .desc a{color:#666}.ftsMain .brand .list.hover .desc a{color:#343434}
.ftsMain .brand .more{width:75px;height:45px;padding:18px 26px 18px;border-left:solid 1px #e7e7e7;float:right}.ftSlde{width:205px;height:410px;overflow:hidden;float:right;display:none}
.ftSlde .ttPrice{height:203px;border:solid 1px #ddd}.ftSlde .ttPrice .head{height:20px;padding:15px 17px 0}.ftSlde .ttPrice .head .name{display:inline-block;line-height:20px;font-size:16px;font-family:微软雅黑;color:#da2b52;float:left}
.ftSlde .ttPrice .head .slideNav{height:8px;margin-top:10px;float:right}.ftSlde .ttPrice .head .slideNav a{display:inline-block;width:8px;height:8px;overflow:hidden;border-radius:8px;background:#afafaf;vertical-align:top;margin-left:5px}
.ftSlde .ttPrice .head .slideNav .current{background:#da2b52}.ftSlde .ttPrice .slide{height:180px;margin-top:13px}.ftSlde .ttPrice .slide .stage{width:171px;height:180px;overflow:hidden}
.ftSlde .ttPrice .slide .stage .list{height:269px}.ftSlde .ttPrice .slide .stage .list .img{height:114px;overflow:hidden}.ftSlde .ttPrice .slide .stage .list p{overflow:hidden}
.ftSlde .ttPrice .slide .stage .list .price{padding-top:14px;padding-bottom:5px;color:#999}.ftSlde .ttPrice .slide .stage .list .price .b{font-size:18px;color:#c90d11;font-family:Arial}
.ftSlde .ttPrice .slide .arrow{display:inline-block;width:16px;height:24px;overflow:hidden;background:url(themes/meilele/images/bg.png) no-repeat;margin-top:48px}
.ftSlde .ttPrice .slide .arrowPrev{background-position:0 -176px;float:left}.ftSlde .ttPrice .slide .arrowPrev:hover{background-position:-16px -176px}.ftSlde .ttPrice .slide .arrowNext{background-position:-32px -176px;float:right}
.ftSlde .ttPrice .slide .arrowNext:hover{background-position:-48px -176px}.ftSlde .groupBuy{width:180px;height:266px;padding:0 11px 0 12px;border:solid 1px #ddd;overflow:hidden;margin-top:10px}
.ftSlde .groupBuy .head{height:22px;line-height:22px;padding:10px 0}.ftSlde .groupBuy .head .name{font-size:16px;font-family:微软雅黑;float:left}.ftSlde .groupBuy .head .more{color:#666;float:right}
.ftSlde .groupBuy .img{height:120px;overflow:hidden}.ftSlde .groupBuy .tit{height:20px;line-height:20px;margin-top:5px}.ftSlde .groupBuy .gbg{height:23px;line-height:23px;padding:5px 7px 5px 10px;overflow:hidden;background:url(themes/meilele/images/bg.png) 0 0 no-repeat;margin-top:5px}
.ftSlde .groupBuy .gbg .pr{font-size:18px;color:#fff;font-family:Arial;float:left}.ftSlde .groupBuy .gbg .go{display:inline-block;width:57px;height:23px;text-align:center;color:#000;float:right;font-size:14px;line-height:23px}
.ftSlde .groupBuy .price{margin-top:5px;color:#787878}.ftSlde .groupBuy .price .num{font-size:18px;color:#c90d11;font-family:Arial}.sameMoudle{margin-top:30px}
.sameMoudle .sHead{height:24px}.sameMoudle .sHead .cn,.sameMoudle .sHead .en{display:inline-block;float:left}.sameMoudle .sHead .cn{line-height:24px;font-size:20px;color:#333;font-family:微软雅黑}
.sameMoudle .sHead .en{font-family:Arial;color:#c90d11;padding-left:5px;margin-top:8px}.sameMoudle .sHead .key{height:18px;line-height:18px;float:left;padding-left:35px;margin-top:6px;color:#999}
.sameMoudle .sHead .key a{color:#545454}.sameMoudle .sHead .more{display:inline-block;line-height:24px;padding-right:20px;background:url(themes/meilele/images/bg.png) right -177px no-repeat;color:#666;float:right}
.sameMoudle .sLine{height:2px;background:#333;margin-top:5px;overflow:hidden}.sameMoudle .sBody{margin-top:5px}.goodsOffer .sBody{height:360px;overflow:hidden}
.goodsOffer .cell1{width:280px;height:360px;overflow:hidden}.goodsOffer .cell1 .td{height:180px;overflow:hidden}.goodsOffer .cell2{width:420px;height:360px;overflow:hidden}
.hotSaleRank .sBody{height:340px;border:solid 1px #ddd;overflow:hidden}.hotSaleRank .stage{width:690px;height:332px;padding:4px;float:left}.hotSaleRank .stage .in{height:332px;overflow:hidden}
.hotSaleRank .stage .t{display:inline-block;height:40px;line-height:40px;padding:0 15px;border-bottom-right-radius:6px;background:#c90d11;color:#fff;font-size:20px;font-family:Arial;position:absolute;margin:-5px 0 0 -5px}
.hotSaleRank .stage .list{height:332px;overflow:hidden}.hotSaleRank .thumbMap{width:280px;height:340px;float:right}.hotSaleRank .thumbMap .list{width:110px;height:138px;padding:20px 15px 12px 14px;border-left:solid 1px #ddd;float:left}
.hotSaleRank .thumbMap .list .t{display:inline-block;height:16px;line-height:16px;padding:0 8px;border-bottom-right-radius:4px;background:#c90d11;color:#fff;font-size:10px;position:absolute;margin-top:-21px;margin-left:-14px;font-family:微软雅黑}
.hotSaleRank .thumbMap .list .img{height:73px;overflow:hidden}.hotSaleRank .thumbMap .list .price{color:#c90d11;font-size:14px;margin-top:8px}.hotSaleRank .thumbMap .list .yen{font-family:微软雅黑}
.hotSaleRank .thumbMap .list .num{font-family:Arial}.hotSaleRank .thumbMap .list .desc{height:36px;line-height:18px;margin-top:2px;overflow:hidden}.hotSaleRank .thumbMap .list .desc a{color:#545454}
.hotSaleRank .thumbMap .list.bt{height:137px;border-top:solid 1px #ddd}.styleRepeat .sBody{height:594px;overflow:hidden}.styleRepeat .sLine{border-left:solid 170px #c90d11}
.styleRepeat .map1{height:342px;overflow:hidden}.styleRepeat .map1 .slide,.styleRepeat .map1 .slide .stage{width:700px;height:342px;overflow:hidden}.styleRepeat .map1 .slide .nav{width:680px;height:16px;text-align:right;position:absolute;margin-top:-30px;overflow:hidden}
.styleRepeat .map1 .slide .nav a{display:inline-block;width:16px;height:16px;line-height:16px;border-radius:16px;text-align:center;background:#fff;text-decoration:none;margin-left:5px}
.styleRepeat .map1 .slide .nav .current{background:#c90d11;color:#fff!important}.styleRepeat .map1 .sideAd{width:279px;height:342px;overflow:hidden}.styleRepeat .map2{height:240px;margin-top:12px}
.styleRepeat .map2 .list{width:230px;height:240px;padding-left:20px;float:left}.styleRepeat .map2 .list.first{padding-left:0}.styleRepeat .map2 .list .img{height:153px;overflow:hidden}
.styleRepeat .map2 .list .pr{font-size:16px;color:#c90d11;font-family:Arial;margin-top:10px;font-weight:bold}.styleRepeat .map2 .list .tt{height:20px;line-height:20px;margin-top:8px;overflow:hidden}
.styleRepeat .map2 .list .tj{color:#999;margin-top:5px}.screen-root .ftSlde{display:block}.screen-root .sameMoudle{width:980px;float:right}
/*czc:2013-09-24 15:12:45*/
</style>
<style type="text/css">
/*v0410-leihao*/.comMap{width:978px;border:solid 1px #ddd}.comMap .mapItem{border-left:solid 1px #ddd;overflow:hidden}.comMap .mapItem .title{height:34px;padding:0 15px;border-bottom:solid 1px #ddd;background:#f9f9f9}.comMap .mapItem .title strong,.comMap .mapItem .title span,.comMap .mapItem .title a{display:inline-block;line-height:34px}.comMap .mapItem .title strong{font-size:15px;font-family:"微软雅黑";color:#333}.comMap .mapItem .title span{padding-left:5px;color:#787878}.comMap .mapItem .title a{color:#999;cursor:pointer}.comMap .mapItem .body{padding:20px 18px}.comMap .first{border-left:none}.comMap .cuxiao{width:324px;height:344px}.comMap .cuxiao .ad{height:132px;padding-bottom:15px;border-bottom:dashed 1px #dadada;overflow:hidden}.comMap .cuxiao ul{height:auto;margin-top:6px}.comMap .cuxiao ul li{width:288px;height:23px;line-height:23px;color:#999;overflow:hidden;white-space:nowrap;-o-text-overflow:ellipsis;text-overflow:ellipsis}.comMap .cuxiao ul li a{color:#666}.comMap .moveLay{height:344px}.comMap .moveLay .body{padding:12px 18px}.comMap .moveLay .outBox{height:285px;overflow:hidden}.comMap .moveLay .list{height:79px;padding:8px 0;overflow:hidden}.comMap .moveLay .list .img{width:119px;overflow:hidden;float:left;margin-right:12px}.comMap .reping{width:332px}.comMap .reping .list p{height:54px;line-height:18px;overflow:hidden;color:#666}.comMap .reping .list p a{color:#666}.comMap .reping .list .star{height:9px}.comMap .reping .list .star .bg{width:55px;height:9px;overflow:hidden;background:url(themes/meilele/images/weibo_bg.png) -124px 0 no-repeat}.comMap .reping .list .star span{display:inline-block;height:9px;overflow:hidden;vertical-align:top;background:url(themes/meilele/images/weibo_bg.png) -124px -9px no-repeat}.comMap .reping .list .star .w1{width:11px}.comMap .reping .list .star .w2{width:22px}.comMap .reping .list .star .w3{width:33px}.comMap .reping .list .star .w4{width:44px}.comMap .reping .list .star .w5{width:55px}.comMap .reping .list .uname{height:16px;line-height:16px;color:#f0670d}.comMap .chengjiao{width:320px}.comMap .chengjiao .list p{height:18px;line-height:18px;overflow:hidden}.comMap .chengjiao .list .name a{color:#666}.comMap .chengjiao .list .price{color:#c20000}.comMap .chengjiao .list .uname{color:#f0670d;margin-top:6px}.comMap .chengjiao .list .time{color:#999}.comMap .loading{height:16px;text-align:center;margin-top:100px}.comMap .mapLeft{width:324px}.comMap .chuangyi{overflow:hidden}.comMap .chuangyi .body{padding:20px 18px 18px}.comMap .chuangyi .notes{height:83px;overflow:hidden}.comMap .chuangyi .notes .img{width:124px;height:83px;overflow:hidden;float:left;margin-right:15px}.comMap .chuangyi .notes h4{height:20px;line-height:20px;font-size:12px;color:#666;overflow:hidden}.comMap .chuangyi .notes h4 a{color:#666}.comMap .chuangyi .notes p{height:54px;line-height:18px;color:#787878;text-indent:2em;margin-top:5px;overflow:hidden}.comMap .chuangyi ul{padding-top:6px}.comMap .chuangyi ul li{width:288px;height:18px;line-height:18px;margin-top:8px;color:#666;overflow:hidden;overflow:hidden;white-space:nowrap;-o-text-overflow:ellipsis;text-overflow:ellipsis}.comMap .chuangyi ul li a{color:#666}.comMap .xiujia{width:653px}.comMap .xiujia .tNav{height:12px;margin-top:11px;float:right}.comMap .xiujia .tNav a{display:inline-block;width:10px;height:10px;overflow:hidden;background:#d9d9d9;border-radius:10px;vertical-align:top;margin-right:5px}.comMap .xiujia .tNav a:hover,.comMap .xiujia .tNav .current{background:#ea7070}.comMap .xiujia .body{height:270px;padding:20px 19px}.comMap .xiujia .stage{width:615px;height:272px;overflow:hidden}.comMap .xiujia .list{width:167px;height:256px;padding:8px;background:url(themes/meilele/images/xspace_bg.jpg) top center no-repeat;margin-left:33px}.comMap .xiujia .list.first{margin-left:0}.comMap .xiujia .list .img{height:200px;overflow:hidden}.comMap .xiujia .list .txt{height:36px;line-height:18px;padding-top:10px;overflow:hidden;color:#666}.comMap .xiujia .list .txt a{color:#666}.screen-root .comMap{float:right}
</style>
<script src="themes/meilele/js/jq.js"></script>
<script src="themes/meilele/js/common.min.js?0905"></script>

<script type="text/javascript">var show_type=0</script>
</head>
<body id="root_body">
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className="screen-root root_body";window.ISFIXED=true;}})()</script>

<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="w firstScreen clearfix">
	<?php echo $this->fetch('library/cat_menu.lbi'); ?>
	<div class="ftsMain Left">
	  <div class="slide" id="JS_focus_locker">
	    <div class="stage">
	      <table id="JS_focus_table">
		<tr>
			<?php $_from = get_top_cat_flash_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
		  <td><a title="<?php echo $this->_var['ad']['name']; ?>" href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" class="first current"><img src="<?php echo $this->_var['ad']['image']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" width="770" height="410" /></a></td>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</tr>
	      </table>
	    </div>
	    <div class="slideNav" id="JS_focus_nav"><?php $_from = get_top_cat_flash_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?><a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" class="<?php if ($this->_foreach['index_image']['iteration'] == 1): ?>first current<?php endif; ?>"><?php echo $this->_var['ad']['name']; ?><br />
	      <strong>&emsp;</strong></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
	  </div>

	</div>
	<div class="ftSlde">
	  <div class="ttPrice">
	    <div class="head"><span class="name">今日推荐</span>
	      <div id="JS_side_tejia_nav" class="slideNav"><?php $_from = get_cat_promote_goods_2($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_promote_goods_2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_promote_goods_2']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_promote_goods_2']['iteration']++;
?><a href="javascript:;" <?php if ($this->_foreach['get_cat_promote_goods_2']['iteration'] == 1): ?>class="current"<?php endif; ?>></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
	    </div>
	    <div class="slide"> <a id="JS_slide_prev" href="javascript:void(0);" class="arrow arrowPrev"></a>
	      <div class="stage Left">
		<table id="JS_side_tejia_stage">
		  <tr>
			  <?php $_from = get_cat_promote_goods_2($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_promote_goods_2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_promote_goods_2']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_promote_goods_2']['iteration']++;
?>
		    <td><div class="list">
			<div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" width="171" height="114" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></div>
			<!-- <p class="price">特价：<strong class="b"><?php echo $this->_var['goods']['promote_price']; ?></strong></p> -->
			<p><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo sub_str($this->_var['goods']['short_name'],12); ?></a></p>
		      </div></td>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
		  </tr>
		</table>
	      </div>
	      <a id="JS_slide_next" href="javascript:void(0);" class="arrow arrowNext"></a> </div>
	  </div>
	 <div class="ttPrice">
	    <div class="head"><span class="name">今日推荐</span>
	      <div id="JS_side_tejia_nav" class="slideNav"><?php $_from = get_cat_promote_goods_2($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_promote_goods_2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_promote_goods_2']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_promote_goods_2']['iteration']++;
?><a href="javascript:;" <?php if ($this->_foreach['get_cat_promote_goods_2']['iteration'] == 1): ?>class="current"<?php endif; ?>></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
	    </div>
	    <div class="slide"> <a id="JS_slide_prev" href="javascript:void(0);" class="arrow arrowPrev"></a>
	      <div class="stage Left">
		<table id="JS_side_tejia_stage">
		  <tr>
			  <?php $_from = get_cat_promote_goods_2($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_promote_goods_2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_promote_goods_2']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_promote_goods_2']['iteration']++;
?>
		    <td><div class="list">
			<div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" width="171" height="114" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></div>
			<!-- <p class="price">特价：<strong class="b"><?php echo $this->_var['goods']['promote_price']; ?></strong></p> -->
			<p><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo sub_str($this->_var['goods']['short_name'],12); ?></a></p>
		      </div></td>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
		  </tr>
		</table>
	      </div>
	      <a id="JS_slide_next" href="javascript:void(0);" class="arrow arrowNext"></a> </div>
	  </div>
	</div>
</div>
<div class="w clearfix">
  <div class="sameMoudle goodsOffer">
    <div class="sHead"> <strong class="cn">新品推荐</strong> <strong class="en">NEW</strong> <a href="search_list_new.html" target="_blank" title="更多新品" class="more">更多新品</a> </div>
    <div class="sLine"></div>
    <div class="sBody">
      <div class="cell1 Left">
	  <?php $_from = get_top_cat_new_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
	  <?php if ($this->_foreach['index_image']['iteration'] < 3): ?>
        <div class="td"><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" width="280" height="180" alt="<?php echo $this->_var['ad']['name']; ?>" /></a></div>
	  <?php endif; ?>		
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
        
      </div>
	  <?php $_from = get_top_cat_new_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
	  <?php if ($this->_foreach['index_image']['iteration'] == 3): ?>
      <div class="cell2 Left"><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" width="420" height="360" alt="<?php echo $this->_var['ad']['name']; ?>" /></a></div>
	  <?php endif; ?>		
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <div class="cell1 Right">
        <?php $_from = get_top_cat_new_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
	  <?php if ($this->_foreach['index_image']['iteration'] > 3): ?>
        <div class="td"><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" width="280" height="180" alt="<?php echo $this->_var['ad']['name']; ?>" /></a></div>
	  <?php endif; ?>		
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
    </div>
  </div>
</div>
<div class="w clearfix">
  <div class="sameMoudle hotSaleRank">
    <div class="sHead"> <strong class="cn">热卖排行</strong> <strong class="en">HOT</strong> <a href="search_list_hot.html" target="_blank" title="分类热卖排行榜" class="more">分类热卖排行榜</a> </div>
    <div class="sLine"></div>
    <div class="sBody">
      <div class="stage">
        <div class="in"> <strong id="JS_slide_hot_sale_num" class="t">TOP1</strong>
          <table id="JS_slide_hot_sale_stage">
		  <?php $_from = get_top_cat_hot_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
            <tr>
              <td><div class="list"><a title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" href="<?php echo $this->_var['ad']['url']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" width="690" height="332" /></a></div></td>
            </tr>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
           
          </table>
        </div>
      </div>
      <ul id="JS_slide_hot_sale_thumb" class="thumbMap">
	  <?php $_from = get_cat_hot_goods_4($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['hot_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['hot_goods']['iteration']++;
?>
        <li class="list <?php if ($this->_foreach['hot_goods']['iteration'] > 2): ?>bt<?php endif; ?>"> <span class="t">TOP<?php echo $this->_foreach['hot_goods']['iteration']; ?></span>
          <div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['thumb']; ?>" width="110" height="73" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></div>
          <!-- <p class="price"><strong class="yen"></strong><span class="num"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></span></p> -->
          <p class="desc"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo sub_str($this->_var['goods']['short_name'],12); ?></a></p>
        </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 		
       
      </ul>
    </div>
  </div>
</div>
<?php $_from = get_child_cat($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['child_cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['child_cat']['iteration']++;
?>
<div class="w clearfix cat_floor">
  <div class="sameMoudle styleRepeat">
    <div class="sHead"> <strong class="cn"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></strong> <strong class="en">American</strong>
      <div class="key"><?php $_from = get_child_cat($GLOBALS[smarty]->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat2');$this->_foreach['child_cat2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat2']['total'] > 0):
    foreach ($_from AS $this->_var['cat2']):
        $this->_foreach['child_cat2']['iteration']++;
?><a href="<?php echo $this->_var['cat2']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['cat2']['name']); ?>"><?php echo htmlspecialchars($this->_var['cat2']['name']); ?></a><?php if (! ($this->_foreach['child_cat2']['iteration'] == $this->_foreach['child_cat2']['total'])): ?>&ensp;|&ensp;<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
      <a href="<?php echo $this->_var['cat']['url']; ?>" target="_blank" title="更多<?php echo htmlspecialchars($this->_var['cat']['name']); ?>" class="more">更多<?php echo htmlspecialchars($this->_var['cat']['name']); ?></a> </div>
    <div class="sLine"></div>
    <div class="sBody">
      <div class="map1">
        <div class="slide Left">
          <div class="stage">
            <table id="JS_side_style_stage_<?php echo $this->_var['cat']['id']; ?>">
              <tr>
			  <?php $_from = get_top_cat_floor_left_advlist_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
                <td><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" width="700" height="342" alt="<?php echo $this->_var['ad']['name']; ?>" /></a></td>
			  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 	
              </tr>
            </table>
          </div>
          <div id="JS_side_style_nav_<?php echo $this->_var['cat']['id']; ?>" class="nav"><?php $_from = get_top_cat_floor_left_advlist_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?><a href="javascript:;" <?php if ($this->_foreach['index_image']['iteration'] == 1): ?>class="current"<?php endif; ?>><?php echo $this->_foreach['index_image']['iteration']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
        </div>
		<?php $_from = get_top_cat_floor_right_advlist_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
        <div class="sideAd Right"><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" width="279" height="342" alt="<?php echo $this->_var['ad']['name']; ?>" /></a></div>
		 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
      <div class="map2">
	<?php $_from = get_cat_new_goods_4($GLOBALS[smarty]->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['cat_new'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_new']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['cat_new']['iteration']++;
?>
        <div class="list <?php if ($this->_foreach['cat_new']['iteration'] == 1): ?>first<?php endif; ?>">
          <div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['thumb']; ?>" width="230" height="153" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></div>
          <!-- <p class="pr"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></p> -->
          <p class="tt"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a></p>
          <!-- <p class="tj">市场价：<del class="yen"><?php echo $this->_var['goods']['market_price']; ?></del> | 销量：<span class="black"><?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php echo $this->_var['goods_data']['total_sells']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>&nbsp;</span>件</p> -->
        </div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
<script language="javascript">
$(".cat_floor").each(
	function(i){
		var l = $(this).find('.map2').html();
		if ($.trim(l) == ''){
			$(this).hide();
		}
	}
);

</script>
<!--
<div class="w mt15 clearfix">
  <div class="comMap clearfix">
    <div class="mapItem cuxiao first Left">
      <div class="title"><strong class="Left">最新促销活动</strong></div>
      <div class="body">
		<?php $_from = get_top_cat_new_img_advlist_by_cat_id($this->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
          <div class="ad"><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" width="292" height="132" alt="<?php echo $this->_var['ad']['name']; ?>" /></a></div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
          <ul>
		  <?php $_from = get_top_cat_new_txt_advlist_by_cat_id($this->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
            <li>&bull;&ensp;<a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><?php echo $this->_var['ad']['name']; ?></a></li>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
          
          </ul>
        </div>
    </div>
    <div class="mapItem moveLay reping Left">
      <div class="title"><strong class="Left">最新热评</strong></div>
      <div class="body">
        <div class="outBox">
          <div id="JS_comment_list_stage">
			<?php $_from = get_rand_comment_9(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'msg');$this->_foreach['message_lists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['message_lists']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['msg']):
        $this->_foreach['message_lists']['iteration']++;
?>
              <div class="list">
                <div class="img"><a href="goods-<?php echo $this->_var['msg']['goods_id']; ?>.html" target="_blank" title="<?php echo $this->_var['msg']['goods_name']; ?>"><img src="<?php echo $this->_var['msg']['goods_thumb']; ?>" width="119" height="79" alt="<?php echo $this->_var['msg']['goods_name']; ?>" /></a></div>
                <p><a href="goods-<?php echo $this->_var['msg']['goods_id']; ?>.html" target="_blank" title="<?php echo $this->_var['msg']['content']; ?>"><?php echo sub_str($this->_var['msg']['content'],30); ?></a></p>
                <div class="star">
                  <div class="bg"><span class="w5" data-rank="5"></span></div>
                </div>
                <div class="uname"><a class="orange"><?php echo $this->_var['msg']['user_name']; ?></a></div>
              </div>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
			  
            </div>
        </div>
      </div>
    </div>
    <div id="JS_newdeal" class="mapItem moveLay chengjiao Left">
      <div class="title"><strong class="Left">最新成交</strong></div>
      <div class="body">
        <div class="outBox">
          <div id="INDEX_LeiHao_XXXXX">
	  
	  <?php $_from = get_bought_notes(30); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'msg');$this->_foreach['message_lists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['message_lists']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['msg']):
        $this->_foreach['message_lists']['iteration']++;
?>
        <div class="list">
          <div class="img"><a href="<?php echo $this->_var['msg']['url']; ?>" target="_blank" title="<?php echo $this->_var['msg']['goods_name']; ?>"><img src="<?php echo $this->_var['msg']['goods_thumb']; ?>" alt="<?php echo $this->_var['msg']['goods_name']; ?>" height="79" width="119"></a></div>
          <p class="name"><a href="<?php echo $this->_var['msg']['url']; ?>" target="_blank" title="<?php echo $this->_var['msg']['goods_name']; ?>"><?php echo $this->_var['msg']['goods_name']; ?></a></p>
          <p class="price yen">¥<?php echo $this->_var['msg']['shop_price']; ?></p>
          <p class="uname"><a><?php echo $this->_var['msg']['user_name']; ?></a></p>
          <p class="time"><?php echo $this->_var['msg']['add_time']; ?>&nbsp;购买了此商品</p>
        </div>
	   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>
-->
<script type="text/javascript">
function getNewDealRecord() {
	
}
function setTimer() {
	var b = new Scroll(M.$("#INDEX_LeiHao_XXXXX"));
	var a = new Scroll(M.$("#JS_comment_list_stage"));
	b.cloneDom();
	a.cloneDom();
	setInterval(function() {
		b.autoRun();
		a.autoRun()
	},
	5000)
}
setTimeout(function() {
				setTimer()
			},
			2000);
function Scroll(a) {
	this.dom = a;
	if (!this.dom) {
		return
	}
	this.size = M.$(".list", this.dom).length;
	this.index = 0;
	this.lock = false
}
Scroll.prototype.cloneDom = function() {
	var b = this;
	if (b.size > 3) {
		b.dom.onmouseover = function() {
			b.dom.lock = true
		};
		b.dom.onmouseout = function() {
			b.dom.lock = false
		};
		var a = b.dom.innerHTML;
		b.dom.innerHTML += a
	}
};
Scroll.prototype.autoRun = function() {
	var a = this;
	var b = a.index * 95;
	if (a.index >= a.size) {
		a.dom.style.marginTop = "0px";
		b = 0;
		a.index = 0
	}
	M.Animate(a.dom, {
		marginTop: (0 - b) + "px"
	},
	200, "linear");
	a.index++
};
function formatTime(i) {
	if (!i) {
		return "刚刚"
	}
	var b = parseInt((new Date()).getTime() / 1000);
	var f = b - i;
	if (f < 0) {
		f = 0
	}
	var e = f % 60;
	var a = parseInt(f % 3600 / 60);
	var c = parseInt(f % (3600 * 24) / 3600);
	var g = parseInt(f / (3600 * 24));
	if (g) {
		return g + "天前"
	} else {
		if (c) {
			return c + "小时前"
		} else {
			if (a) {
				return a + "分钟前"
			} else {
				if (e) {
					return e + "秒前"
				} else {
					return "刚刚"
				}
			}
		}
	}
}
function slideOfShowMyHome() {
	var g = M.$("#JS_focus_xspace_body"),
	d = M.$("img", g),
	k = M.$("#JS_focus_xspace_nav"),
	b = M.$("a", k),
	f = b[0],
	l = b.length,
	e = 0,
	h = 615;
	for (var c = 0; c < l; c++) {
		b[c]._key = c;
		b[c].onmouseover = function() {
			e = this._key;
			clearInterval(j);
			a()
		};
		b[c].onmouseout = function() {
			j = setInterval(function() {
				a()
			},
			5000)
		}
	}
	var a = function() {
		M.removeClass(f, "current");
		M.addClass(b[e], "current");
		M.Animate(g, {
			marginLeft: (0 - h * e) + "px"
		},
		200);
		f = b[e];
		e = (e >= l - 1) ? 0 : parseInt(e) + 1
	};
	var j = setInterval(function() {
		a()
	},
	5000)
}

M.addHandler(window, "load",
function() {
	getNewDealRecord();
	slideOfShowMyHome()
});
var help = {
	author: "leihao",
	createTime: "2013-04-01",
	description: "家具城、建材城、家饰城底部公用js"
};
</script>
<?php echo $this->fetch('library/page_footer.lbi'); ?>


<script src="themes/meilele/js/back_to_top.min.js?1127"></script>
<script type="text/javascript">
M.lazyImg.start("both", {});
function Slide(b) {
	if (!b.stage) {
		return;
	}
	this.stage = b.stage;
	this.imgs = this.stage.getElementsByTagName("img");
	this.indexDom = b.indexDom;
	this.indexList = b.indexList;
	if (b.prevBtn) {
		this.prevBtn = b.prevBtn;
	}
	if (b.nextBtn) {
		this.nextBtn = b.nextBtn;
	}
	this.step = b.step;
	this.delay = b.delay;
	this.count = this.indexList.length || 0;
	this.lock = false;
	for (var a = 0; a < this.count; a++) {
		this.indexList[a].key = a;
	}
	this.current = this.indexList[0];
	this.start();
	var c = this;
	if (b.prevBtn) {
		this.prevBtn.onclick = function(d) {
			c.prev(d);
		};
	}
	if (b.nextBtn) {
		this.nextBtn.onclick = function(d) {
			c.next(d);
		};
	}
	this.stage.onmouseover = this.stage.onmousemove = function() {
		c.lock = true;
	};
	this.stage.onmouseout = function() {
		c.lock = false;
		c.start();
	};
	this.indexDom.onmouseover = this.indexDom.onclick = function(d) {
		c.indexToMove(d);
	};
}
Slide.prototype = {
	start: function() {
		var b = this,
		a = new Date();
		b.stage.timeStamp = a.valueOf();
		window.setTimeout(function() {
			b.move(null, a.valueOf());
		},
		b.delay);
	},
	move: function(b, a) {
		var c = this;
		if (a && (c.lock || a != c.stage.timeStamp)) {
			return;
		}
		if (typeof(b) != "number") {
			b = c.current.key - ( - 1);
			if (b >= c.count || b < 0) {
				b = 0;
			}
		}
		M.removeClass(c.current, "current");
		c.current = c.indexList[b];
		c.lazyImg(b);
		M.Animate(c.stage, {
			marginLeft: c.step * (0 - b) + "px"
		},
		200);
		M.addClass(c.current, "current");
		if (c.lock) {
			return;
		}
		c.start();
	},
	lazyImg: function(b) {
		var c = this,
		a = c.imgs[b];
		if (a && a.getAttribute("lazy-src")) {
			a.src = a.getAttribute("lazy-src");
			a.removeAttribute("lazy-src");
		}
	},
	prev: function(c) {
		var d = this;
		c = c || window.event;
		var b = c.target || c.srcElement;
		var a = d.current.key;
		a--;
		if (a >= d.count || a < 0) {
			a = d.count - 1;
		}
		b.blur();
		d.move(a);
		return false;
	},
	next: function(c) {
		var d = this;
		c = c || window.event;
		var b = c.target || c.srcElement;
		var a = d.current.key;
		a++;
		if (a >= d.count || a < 0) {
			a = 0;
		}
		b.blur();
		d.move(a);
		return false;
	},
	indexToMove: function(b) {
		var c = this;
		b = b || window.event;
		var a = b.target || b.srcElement;
		while (a && a != c.indexDom) {
			if (a.tagName.toLowerCase() == "a") {
				a.blur();
				c.move(a.key);
			}
			a = a.parentNode;
		}
	}
};
function hotSale() {
	var f = M.$("#JS_slide_hot_sale_stage"),
	c = M.$("img", f),
	h = M.$("#JS_slide_hot_sale_thumb"),
	a = M.$("li", h),
	d = M.$("#JS_slide_hot_sale_num"),
	e = a[0],
	j = a.length,
	g = 332;
	for (var b = 0; b < j; b++) {
		a[b]._key = b;
		a[b].onmouseover = function() {
			var i = this._key;
			M.removeClass(e, "current");
			M.addClass(this, "current");
			d.innerHTML = "TOP" + (i + 1);
			if (c[i] && c[i].getAttribute("lazy-src")) {
				c[i].src = c[i].getAttribute("lazy-src");
				c[i].removeAttribute("lazy-src");
			}
			M.Animate(f, {
				marginTop: (0 - g) * i + "px"
			},
			200);
			e = this;
		};
		a[b].onmouseout = function() {
			var i = this._key;
			M.removeClass(this, "current");
			e = this;
		};
	}
}
function GetPageScroll() {
	var b, a;
	if (window.pageYOffset) {
		a = window.pageYOffset;
		b = window.pageXOffset;
	} else {
		if (document.documentElement && document.documentElement.scrollTop) {
			a = document.documentElement.scrollTop;
			b = document.documentElement.scrollLeft;
		} else {
			if (document.body) {
				a = document.body.scrollTop;
				b = document.body.scrollLeft;
			}
		}
	}
	return {
		x: b,
		y: a
	};
}
function pageScroll() {
	var a = M.$("#JS_fixed_goods_cat");
	if (GetPageScroll().y > 181) {
		M.addClass(a, "fixedLay");
	} else {
		M.removeClass(a, "fixedLay");
	}
}
M.addHandler(window, "load",
function() {
	new Slide({
		stage: M.$("#JS_focus_table"),
		indexDom: M.$("#JS_focus_nav"),
		indexList: M.$("a", "#JS_focus_nav"),
		step: 770,
		delay: 5000
	});
	new Slide({
		stage: M.$("#JS_side_tejia_stage"),
		indexDom: M.$("#JS_side_tejia_nav"),
		indexList: M.$("a", "#JS_side_tejia_nav"),
		prevBtn: M.$("#JS_slide_prev"),
		nextBtn: M.$("#JS_slide_next"),
		step: 171,
		delay: 4000
	});
	for (var a = 1; a < 9; a++) {
		new Slide({
			stage: M.$("#JS_side_style_stage_" + a),
			indexDom: M.$("#JS_side_style_nav_" + a),
			indexList: M.$("a", "#JS_side_style_nav_" + a),
			step: 700,
			delay: 5000
		});
	}
	hotSale();
	if (window.ISFIXED) {
		window.onscroll = function() {
			pageScroll();
		};
	}
});
var help = {
	author: "leihao",
	createTime: "2013/04/03",
	description: "家具城js"
};
</script>

</body>
</html>

<?php else: ?>

<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta charset="utf-8">
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<script src="themes/meilele/js/jq.js"></script>
<script src="themes/meilele/js/common.min.js?0905"></script>
<style type="text/css">
@charset "utf-8";.jred{color:#d70000}.color_999{color:#999}.yehei{font-family:'微软雅黑'}.Arial{font-family:Arial}
.color_price{color:#d70000;font-family:'微软雅黑'}.f13{font-size:13px}.mt10{margin-top:10px}.JC_com_map{margin-top:15px}.JC_com_map .side_map{width:200px;margin-right:10px}
.JC_com_map .main_map{width:770px}.first_map{height:401px}.second_map{height:265px}.JC_category{border-bottom:solid 1px #fff}.JC_category .cat_header{height:30px;line-height:30px;padding:0 10px;background:#e63434;color:#fff;font-family:"微软雅黑"}
.JC_category .cat_header .name_cn{font-size:15px;font-family:'微软雅黑'}.JC_category .cat_body{border-top:0;background-color:white;border:solid 1px #ddd;border-top:0;height:369px}
.JC_category .cat_body .cat_list{padding:5px 8px;border-top:solid 1px #ddd}.JC_category .cat_body .cat_list dt{height:20px;line-height:20px;font-weight:bold}
.JC_category .cat_body .cat_list dt a{color:#333}.JC_category .cat_body .cat_list dt a img{background:0;border:0;vertical-align:middle;width:20px;height:20px;margin-right:5px}
.JC_category .cat_body .cat_list dd{line-height:20px}.JC_category .cat_body .cat_list dd a{color:#787878}.JC_category .cat_body .cat_list.first{border-top:0}
.JC_category .cat_body .cat_list dt .icon_sprite{width:19px;height:20px;line-height:20px;float:left}.JC_category .cat_body .cat_list dt .icon_1{background-position:0 -130px}
.JC_category .cat_body .cat_list dt .icon_2{background-position:-18px -129px}.JC_category .cat_body .cat_list dt .icon_3{background-position:-143px -0px}
.JC_category .cat_body .cat_list dt .icon_4{background-position:-58px -130px}.JC_category .cat_body .cat_list dt .icon_5{background-position:-164px -0px}
.JC_category .cat_body .cat_list dt .icon_6{background-position:-37px -129px}.JC_focus{height:400px}.JC_focus .stage{width:770px;height:370px;overflow:hidden}
.JC_focus .nav{height:30px}.JC_focus .nav a{display:inline-block;width:153px;height:30px;line-height:30px;text-align:center;color:#fff;margin-left:1px;background-color:#3a3a3a;overflow:hidden}
.JC_focus .nav a strong{color:#d10101}.JC_focus .nav a:hover,.JC_focus .nav a.current{color:#fff!important;text-decoration:none;background-color:#b74f6f}
.JC_focus .nav a:hover strong,.JC_focus .nav a.current strong{color:#fec600}.JC_focus .nav a.first{margin-left:0;width:154px}.JC_group_buy{height:263px;border:solid 1px #dedede}
.JC_group_buy .gb_header{height:32px;line-height:32px;background:#f1f1f1;padding:0 10px}.JC_group_buy .gb_header .name{font-size:15px;font-family:"微软雅黑";float:left}
.JC_group_buy .gb_header .more{color:#999;float:right}.JC_group_buy .gd_goods{height:132px;padding:10px 0 0 0;overflow:hidden}.JC_group_buy .gd_goods_name{text-align:center;margin-top:5px}
.JC_group_buy .gd_tag{height:36px;background:#e63434;width:185px;margin:0 auto;margin-top:5px}.JC_group_buy .gd_tag .arrow{width:0;height:0;overflow:hidden;border-top:solid 18px #fff;border-right:solid 18px #e63434;border-bottom:solid 18px #fff;border-left:solid 1px #fff;float:left}
.JC_group_buy .gd_tag .icon_point{background-position:-38px -50px;width:10px;height:9px;float:left;position:relative;left:-5px;top:14px}.JC_group_buy .gd_tag .price_box{margin-left:5px;height:33px;line-height:33px}
.JC_group_buy .gd_tag .txt{height:26px;line-height:26px;padding:5px;float:right}.JC_group_buy .gd_tag .p{font-size:20px;color:#fff;margin-left:2px;vertical-align:-1px}
.JC_group_buy .gd_tag .go{display:inline-block;width:66px;height:26px;overflow:hidden;background:url(themes/meilele/images/jiancai_bg.png) 0 -87px no-repeat}
.JC_group_buy .gd_price{text-align:center;margin-top:5px;color:#999}.JC_tab_map{height:265px}.JC_tab_map .tab_header{height:32px}.JC_tab_map .tab_header .tab_nav{height:32px}
.JC_tab_map .tab_header .absolute_tab{height:32px;position:absolute;border-right:solid 1px #dedede}.JC_tab_map .tab_header .tab_nav a{display:inline-block;vertical-align:top;height:31px;line-height:31px;background:#eee;padding:0 15px;border-left:solid 1px #dedede;border-top:solid 1px #dedede;text-decoration:none;font-size:14px;font-family:"微软雅黑"}
.JC_tab_map .tab_header .tab_nav .name_cn{font-family:'微软雅黑';font-size:15px;font-weight:normal}.JC_tab_map .tab_header .tab_nav .name_en{color:#707070;font-size:12px;font-family:arial}
.JC_tab_map .tab_header .tab_nav a:hover,.JC_tab_map .tab_header .tab_nav .current{background:#fff;color:#d70000!important;border-bottom:solid 1px #fff}
.JC_tab_map .tab_header .tab_nav a:hover .name_cn,.JC_tab_map .tab_header .tab_nav .current .name_cn,.JC_tab_map .tab_header .tab_nav a:hover .name_en,.JC_tab_map .tab_header .tab_nav .current .name_en{color:#d70000}
.JC_tab_map .tab_header .more{height:30px;float:right}.JC_tab_map .tab_header .tab_nav .current .name_cn{font-weight:700}.JC_tab_map .tab_header .more a{display:inline-block;width:48px;height:20px;line-height:20px;margin-top:5px;padding-right:20px;background:url(themes/meilele/images/bg2.png) right -35px no-repeat;overflow:hidden;display:none}.JC_tab_map .tab_header .more a.current{display:inline-block}.JC_tab_map .tab_body{height:201px;padding:15px 0;border:solid 1px #dedede}
.JC_tab_map .tab_body .body_item{height:201px;overflow:hidden;display:none}.JC_tab_map .tab_body .body_item .list{width:180px;height:171px;padding:30px 6px 0;overflow:hidden;float:left}
.JC_tab_map .body_item .float_count{width:66px;height:19px;line-height:19px;padding-bottom:4px;overflow:hidden;text-align:center;background:url(themes/meilele/images/bg2.png) 0 -62px no-repeat;color:#fff;position:absolute;margin:-25px 0 0 115px}.JC_tab_map .body_item .img{width:180px;height:120px;overflow:hidden}
.JC_tab_map .body_item .info{height:40px;line-height:20px;text-align:center;margin-top:10px}.JC_tab_map .body_item .info .price{font-size:16px;font-family:'微软雅黑'}
.JC_tab_map .tab_body .body_item.current{display:block}.JC_floor{overflow:hidden;margin-top:20px}.JC_floor .floor_header{height:32px;line-height:32px;border-bottom:solid 2px transparent}
.JC_floor .floor_header .name,.JC_floor .floor_header .offer,.JC_floor .floor_header .more{display:inline-block}.JC_floor .floor_header .name{width:200px;font-size:22px;font-family:"微软雅黑";height:28px;line-height:28px}
.JC_floor .floor_header .offer,.JC_floor .floor_header .offer a{color:#787878}.JC_floor .floor_header .offer{height:20px;line-height:20px;margin-top:8px}
.JC_floor .floor_header .more{color:#787878;width:26px;height:20px;line-height:20px;overflow:hidden;padding-right:20px;background:url(themes/meilele/images/bg2.png) right -54px no-repeat;margin-top:8px}
.JC_floor .floor_body{height:302px;overflow:hidden}.JC_floor .side_focus,.JC_floor .side_focus .stage{width:200px;height:302px;overflow:hidden}.JC_floor .side_focus .nav{width:180px;height:10px;text-align:right;position:absolute;margin:280px 0 0 10px}
.JC_floor .side_focus .nav a{display:inline-block;width:10px;height:10px;overflow:hidden;border-radius:10px;background:#fff;opacity:.5;filter:alpha(opacity=50);vertical-align:top;margin-left:5px}
.JC_floor .side_focus .nav a:hover,.JC_floor .side_focus .nav .current{background:#fff;opacity:1;filter:alpha(opacity=100)}.JC_floor .side_focus .item{width:200px;height:302px;overflow:hidden}
.JC_floor .img_map{width:560px;height:302px;overflow:hidden}.JC_floor .img_map .map_list{width:279px;height:150px;overflow:hidden;border-left:solid 1px #e9e9e9;border-bottom:solid 1px #e9e9e9;float:left}
.JC_floor .img_map .map_list .img{width:150px;height:150px;overflow:hidden;float:left;margin-right:10px}.JC_floor .img_map .map_list .info{padding-top:25px;line-height:22px}
.JC_floor .img_map .map_list .f14,.JC_floor .img_map .map_list .red{font-family:"微软雅黑"}.JC_floor .img_map .map_list .f16{font-family:'微软雅黑'}
.JC_floor .img_map .map_list.first{width:280px;border-left:none}.JC_floor .jrank{width:218px;height:302px;overflow:hidden;border-left:solid 1px #e9e9e9;border-right:solid 1px #e9e9e9}
.JC_floor .jrank .rtitle{height:33px;line-height:33px;padding:0 10px;font-size:15px;font-family:'微软雅黑'}.JC_floor .jrank .rank_list{height:270px;overflow:hidden}
.JC_floor .jrank .rank_list .list{height:36px;overflow:hidden;border-top:dotted 1px #d9d9d9;-webkit-transition:height .2s ease-in;-moz-transition:height .2s ease-in;-o-transition:height .2s ease-in;transition:height .2s ease-in}
.JC_floor .jrank .show_item{height:18px;line-height:18px;padding:9px;cursor:pointer}.JC_floor .jrank .show_item .index,.JC_floor .jrank .show_item .link,.JC_floor .jrank .show_item .price{display:inline-block;vertical-align:top}
.JC_floor .jrank .show_item .index{width:14px;height:14px;line-height:14px;text-align:center;color:#fff;margin-top:2px;float:left;font-family:arial}.JC_floor .jrank .show_item .link{padding-left:5px;float:left;color:#666}
.JC_floor .jrank .show_item .price{color:#d70000;font-family:'微软雅黑'}.JC_floor .jrank .show_item .yen{color:#d70000}.JC_floor .jrank .hide_map{height:80px;padding:0 9px;margin-top:5px;display:none}
.JC_floor .jrank .hide_map .img{width:96px;height:65px;overflow:hidden;float:left;margin-right:5px}.JC_floor .jrank .hide_map .info{height:69px;line-height:22px;overflow:hidden;color:#787878}
.JC_floor .jrank .hide_map .del{color:#9b9b9b}.JC_floor .jrank .hide_map .jred{font-family:Arial,Helvetica,sans-serif}.JC_floor .jrank .rank_list .list.first{border-top:0}
.JC_floor .jrank .rank_list .list.open{height:122px;-webkit-transition:height .2s ease-in;-moz-transition:height .2s ease-in;-o-transition:height .2s ease-in;transition:height .2s ease-in}
.JC_floor .jrank .rank_list .list.open .index{background:#e00000}.JC_floor .jrank .rank_list .list.open .price_hide{display:none}.JC_floor .jrank .rank_list .list.open .hide_map{display:block}
.JC_floor .jrank .rank_list .list.open .link{color:#333}.floor1 .floor_header{border-bottom-color:#ba823d}.floor1 .floor_header .name{color:#b77320}.floor1 .jrank .rtitle{color:#b27224;background:#f5eee2}
.floor1 .jrank .rank_list .list.open{background:#fdfbef}.floor1 .jrank .show_item .index{background:#bc884a}.floor3 .floor_header{border-bottom-color:#4299e2}
.floor3 .floor_header .name{color:#2c84cf}.floor3 .jrank .rtitle{color:#3e8ccd;background:#e9f5ff}.floor3 .jrank .rank_list .list.open{background:#eef8fc}
.floor3 .jrank .show_item .index{background:#30a0d3}.floor2 .floor_header{border-bottom-color:#6e9f1d}.floor2 .floor_header .name{color:#64990d}.floor2 .jrank .rtitle{color:#64990d;background:#eef8e4}
.floor2 .jrank .rank_list .list.open{background:#f7fcf2}.floor2 .jrank .show_item .index{background:#64990d}.floor4 .floor_header{border-bottom-color:#008ea3}
.floor4 .floor_header .name{color:#008ea3}.floor4 .jrank .rtitle{color:#3f8391;background:#e7f8fa}.floor4 .jrank .rank_list .list.open{background:#f3fafc}
.floor4 .jrank .show_item .index{background:#3f8391}.floor5 .floor_header{border-bottom-color:#a35100}.floor5 .floor_header .name{color:#a35100}.floor5 .jrank .rtitle{color:#af6d48;background:#faf0e7}
.floor5 .jrank .rank_list .list.open{background:#fcf8f3}.floor5 .jrank .show_item .index{background:#a35100}.floor6 .floor_header{border-bottom-color:#a38200}
.floor6 .floor_header .name{color:#a38200}.floor6 .jrank .rtitle{color:#b19549;background:#faf6e7}.floor6 .jrank .rank_list .list.open{background:#fcfbf3}
.floor6 .jrank .show_item .index{background:#a38200}.floor7 .floor_header{border-bottom-color:#ba6a39}.floor7 .floor_header .name{color:#bc5a1e}.floor7 .jrank .rtitle{color:#bc5a1e;background:#f8efe3}
.floor7 .jrank .rank_list .list.open{background:#fefaf2}.floor7 .jrank .show_item .index{background:#ba6a39}.floor8 .floor_header{border-bottom-color:#2a84ae}
.floor8 .floor_header .name{color:#006fa3}.floor8 .jrank .rtitle{color:#006fa3;background:#e7f3fa}.floor8 .jrank .rank_list .list.open{background:#f3f9fc}
.floor8 .jrank .show_item .index{background:#2a84ae}.floor9 .floor_header{border-bottom-color:#00a392}.floor9 .floor_header .name{color:#00a392}.floor9 .jrank .rtitle{color:#00a392;background:#e7faf8}
.floor9 .jrank .rank_list .list.open{background:#f3fcfc}.floor9 .jrank .show_item .index{background:#00a392}.fast_href{width:90px;border-bottom:solid 1px #e7e7e7;position:fixed;_position:absolute;z-index:999;top:250px;left:10px;_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-400))}
.fast_href .h_header{height:20px;background:#f44a4a;border-top-left-radius:4px;border-top-right-radius:4px}.fast_href .h_header .close{display:inline-block;width:20px;height:20px;line-height:20px;text-align:center;color:#fff;text-decoration:none;font-weight:bold;font-size:16px;float:right}
.fast_href .h_header .close:hover{color:#fff!important}.fast_href .href_list{background:#fff;border-left:solid 1px #e7e7e7;border-right:solid 1px #e7e7e7;border-bottom:solid 1px #cbcbcb}
.fast_href .href_list .list{display:block;padding:6px 5px;height:18px;border-top:solid 1px #e7e7e7}.fast_href .href_list .list .icon,.fast_href .href_list .list .txt{display:inline-block;height:18px;overflow:hidden;line-height:18px;vertical-align:top;float:left;text-decoration:none;cursor:pointer}
.fast_href .href_list .list:hover{text-decoration:none}.fast_href .href_list .list .icon{width:18px;background:url(themes/meilele/images/bg.png) no-repeat}
.fast_href .href_list .list .txt{color:#838383;font-family:"微软雅黑";padding-left:2px}.fast_href .href_list .list:hover .txt{color:#e63434}
.fast_href .href_list .list.first{border-top:0}.fast_href .href_list .list .icon1{background-position:0 0}.fast_href .href_list .list:hover .icon1{background-position:0 -18px}
.fast_href .href_list .list .icon2{background-position:-18px 0}.fast_href .href_list .list:hover .icon2{background-position:-18px -18px}.fast_href .href_list .list .icon3{background-position:-36px 0}
.fast_href .href_list .list:hover .icon3{background-position:-36px -18px}.fast_href .href_list .list .icon4{background-position:-54px 0}.fast_href .href_list .list:hover .icon4{background-position:-54px -18px}
.fast_href .href_list .list .icon5{background-position:-72px 0}.fast_href .href_list .list:hover .icon5{background-position:-72px -18px}.fast_href .href_list .list .icon6{background-position:-90px 0}
.fast_href .href_list .list:hover .icon6{background-position:-90px -18px}.fast_href .href_list .list .icon7{background-position:-108px 0}.fast_href .href_list .list:hover .icon7{background-position:-108px -18px}
.fast_href .href_list .list .icon8{background-position:-126px 0}.fast_href .href_list .list:hover .icon8{background-position:-126px -18px}.icon_sprite{background:url(themes/meilele/images/jiancai_bg.png) no-repeat;display:inline-block;overflow:hidden}.reds{color:#d00000;font-size:13px}.lh20{line-height:20px}.time_else{width:14px;height:15px;text-align:center;background:#d93434;display:inline-block;color:#fff;line-height:15px;font-family:Arial,Helvetica,sans-serif}
.newProduct .list .txt a{color:#5e5e5e;font-weight:bold}.newProduct .first{border-top:0}.root_body .own_w_box{float:right;width:980px}.root_body .fixedLay{position:fixed;top:0;z-index:5;_position:absolute;_top:expression(eval(document.documentElement.scrollTop));width:200px}
.newProduct{width:200px;float:right;height:398px;display:none;border:solid 1px #ddd}.root_body .newProduct{display:block}.newProduct .title{height:39px;padding:0 10px}
.newProduct .title span,.newProduct .title strong{display:inline-block;vertical-align:top}.newProduct .title span{width:3px;height:13px;background:#b30003;margin-top:14px;overflow:hidden}
.newProduct .title strong{height:38px;line-height:38px;font-size:14px;color:#4e4e50;font-family:"微软雅黑";padding-left:5px}
.newProduct .body{height:352px;padding:1px 0;text-align:center}.newProduct .list{height:152px;padding:10px 5px;border-top:solid 1px #e6e6e6}.newProduct .list .img{height:97px;overflow:hidden}
.newProduct .list .txt{margin-top:10px;text-align:center;color:#999}.else .txt{margin-top:5px!important}.newProduct .first{border-top:0}.sideWidth .title{background:#f1f1f1;padding:0 10px;height:30px}
.sideWidth .title span{height:21px;width:19px;margin-top:5px;background:url(themes/meilele/images/jiancai_bg.png) no-repeat 0 -40px;display:inline-block;overflow:hidden}
.sideWidth .title strong{color:#333;display:inline-block;font-family:"微软雅黑";font-size:15px;height:30px;line-height:30px;padding-left:5px;vertical-align:top}
.floor_choose .tips{width:15px;padding:30px 7px;height:120px}.floor_choose .tips .tips_txt{font-family:微软雅黑;font-size:15px;font-weight:700;line-height:17px}
.floor_choose .tips_1{background-color:#d2ab7c;color:#faf7f3}.floor_choose .tips_2{background-color:#adce78;color:#fafcf8}.floor_choose .tips_3{background-color:#78c9ed;color:#f4f8fa}
.floor_choose .tips_4{background-color:#72cbd8;color:#f5f9fa}.floor_choose .tips_5{background-color:#deb48c;color:#faf7f3;padding:20px 7px 40px 7px}.floor_choose .tips_6{background-color:#d8c272;color:#fbf9f1}
.floor_choose .tips_7{background-color:#d9ae94;color:#f0f7f5;padding:20px 7px 40px 7px}.floor_choose .tips_8{background-color:#72b7d8;color:#eaf4f9}.floor_choose .tips_9{background-color:#7fdbd0;color:#f2fbfa}
.floor_choose .icon_expan_more{width:17px;height:18px;margin-top:2px}.floor_choose .icon_expan_more_1{background-position:-1px -113px;_background-position:0 -113px}
.floor_choose .icon_expan_more_2{background-position:-18px -113px}.floor_choose .icon_expan_more_3{background-position:-36px -113px}.floor_choose .icon_expan_more_4{background-position:-54px -113px}
.floor_choose .icon_expan_more_5{background-position:-124px -113px}.floor_choose .icon_expan_more_6{background-position:-143px -114px}.floor_choose .icon_expan_more_7{background-position:-90px -113px}
.floor_choose .icon_expan_more_8{background-position:-107px -113px}.floor_choose .icon_expan_more_9{background-position:-160px -114px}.floor_choose .art_list_box{width:171px;_width:169px;background-color:#f6f6f6;height:150px;padding:15px 0;overflow:hidden}
.floor_choose .art_list_box li{height:25px;line-height:25px;padding:0 10px}.floor_choose .art_list_box li a{color:#666;display:inline-block;width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.floor_choose .art_point{background-position:-22px -38px;width:10px;height:21px;overflow:hidden}
/*YQ:2013-11-11 09:49:59*/
</style>
<style type="text/css">
/*v1101-leihao*/.comMap{width:978px;border:solid 1px #ddd;margin:11px auto 0}.comMap .mapItem{border-left:solid 1px #ddd;overflow:hidden}.comMap .mapItem .title{height:34px;padding:0 15px;border-bottom:solid 1px #ddd;background:#f9f9f9}.comMap .mapItem .title strong,.comMap .mapItem .title span,.comMap .mapItem .title a{display:inline-block;line-height:34px}.comMap .mapItem .title strong{font-size:15px;font-family:"微软雅黑";color:#333}.comMap .mapItem .title span{padding-left:5px;color:#787878}.comMap .mapItem .title a{color:#999;cursor:pointer}.comMap .mapItem .body{padding:20px 18px}.comMap .first{border-left:none}.comMap .cuxiao{width:324px;height:344px}.comMap .cuxiao .ad{height:132px;padding-bottom:15px;border-bottom:dashed 1px #dadada;overflow:hidden}.comMap .cuxiao ul{height:auto;margin-top:6px}.comMap .cuxiao ul li{width:288px;height:23px;line-height:23px;color:#999;overflow:hidden;white-space:nowrap;-o-text-overflow:ellipsis;text-overflow:ellipsis}.comMap .cuxiao ul li a{color:#666}.comMap .moveLay{height:344px}.comMap .moveLay .body{padding:12px 18px}.comMap .moveLay .outBox{height:285px;overflow:hidden}.comMap .moveLay .list{height:79px;padding:8px 0;overflow:hidden}.comMap .moveLay .list .img{width:119px;overflow:hidden;float:left;margin-right:12px}.comMap .reping{width:332px}.comMap .reping .list p{height:54px;line-height:18px;overflow:hidden;color:#666}.comMap .reping .list p a{color:#666}.comMap .reping .list .star{height:9px}.comMap .reping .list .star .bg{width:55px;height:9px;overflow:hidden;background:url(themes/meilele/images/weibo_bg.png) -124px 0 no-repeat}.comMap .reping .list .star span{display:inline-block;height:9px;overflow:hidden;vertical-align:top;background:url(themes/meilele/images/weibo_bg.png) -124px -9px no-repeat}.comMap .reping .list .star .w1{width:11px}.comMap .reping .list .star .w2{width:22px}.comMap .reping .list .star .w3{width:33px}.comMap .reping .list .star .w4{width:44px}.comMap .reping .list .star .w5{width:55px}.comMap .reping .list .uname{height:16px;line-height:16px;color:#f0670d}.comMap .chengjiao{width:320px}.comMap .chengjiao .list p{height:18px;line-height:18px;overflow:hidden}.comMap .chengjiao .list .name a{color:#666}.comMap .chengjiao .list .price{color:#c20000}.comMap .chengjiao .list .uname{color:#f0670d;margin-top:6px}.comMap .chengjiao .list .time{color:#999}.comMap .loading{height:16px;text-align:center;margin-top:100px}.comMap .mapLeft{width:324px}.comMap .chuangyi{height:206px;overflow:hidden}.comMap .chuangyi .body{padding:20px 18px 18px}.comMap .chuangyi .notes{height:83px;overflow:hidden}.comMap .chuangyi .notes .img{width:124px;height:83px;overflow:hidden;float:left;margin-right:15px}.comMap .chuangyi .notes h4{height:20px;line-height:20px;font-size:12px;color:#666;overflow:hidden}.comMap .chuangyi .notes h4 a{color:#666}.comMap .chuangyi .notes p{height:54px;line-height:18px;color:#787878;text-indent:2em;margin-top:5px;overflow:hidden}.comMap .chuangyi ul{padding-top:6px}.comMap .chuangyi ul li{width:288px;margin-top:9px;color:#666;overflow:hidden;overflow:hidden;white-space:nowrap;-o-text-overflow:ellipsis;text-overflow:ellipsis}.comMap .chuangyi ul li a{color:#666}.comMap .weibo{height:104px;border-top:solid 1px #ddd}.comMap .weibo .title strong,.comMap .weibo .title span{cursor:pointer}.comMap .weibo .title .gz{color:#333}.comMap .weibo .title i{display:inline-block;float:left;width:20px;height:18px;overflow:hidden;background:url(themes/meilele/images/weibo_bg.png) no-repeat;margin-top:7px}.comMap .weibo .title .ico1{background-position:-5px -5px;margin-left:5px}.comMap .weibo .title .ico2{background-position:-101px -4px}.comMap .weibo .body{height:29px}.comMap .weibo .body .input{width:207px;height:19px;line-height:19px;padding:4px 5px;border:solid 1px #ddd;border-right:0;border-top-left-radius:5px;border-bottom-left-radius:5px;color:#999;float:left}.comMap .weibo .body .submit{display:inline-block;width:70px;height:29px;line-height:29px;overflow:hidden;text-decoration:none;color:#fff;text-align:center;background:url(themes/meilele/images/weibo_bg.png) -29px 0 no-repeat;float:left}.comMap .weibo .body .submit:hover{color:#fff!important}.comMap .xiujia{width:653px}.comMap .xiujia .title a{color:#f0670d}.comMap .xiujia .body{height:236px;padding:20px 19px}.comMap .xiujia .map1{width:141px;height:233px;overflow:hidden}.comMap .xiujia .map1 .td{height:115px;overflow:hidden}.comMap .xiujia .map2{width:327px;height:233px;overflow:hidden;padding-left:3px}.comMap .xiujia .mt3{margin-top:3px}
</style>
<script type="text/javascript">var show_type=1</script>
</head>
<body>
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className="root_body";window.LOAD=true;window.ISFIXED=true;}else{window.LOAD=false;window.ISFIXED=false;}})()</script>

<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="w JC_com_map first_map" style="margin-top:0px">
<?php echo $this->fetch('library/cat_menu.lbi'); ?>
<div class="Left main_map JC_focus" id="JS_focus_locker">
  <div class="stage">
    <table id="JS_focus_table">
      <tr>
	  <?php $_from = get_channel_flash_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
        <td><a title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" href="<?php echo $this->_var['ad']['url']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" width="770" height="370" /></a></td>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	

      </tr>
    </table>
  </div>
  <div class="nav clearfix" id="JS_focus_nav"><?php $_from = get_channel_flash_advlist_by_cat_id($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?><a title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" href="<?php echo $this->_var['ad']['url']; ?>" class="Left <?php if ($this->_foreach['index_image']['iteration'] == 1): ?>first current<?php endif; ?>"><?php echo $this->_var['ad']['name']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
</div>
<div class="sideWidth newProduct">
  <div class="title"><span class="icon_sprite"></span><strong>本周推荐</strong></div>
  <div class="body" >
  <?php $_from = get_cat_promote_goods_2($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_promote_goods_2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_promote_goods_2']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_promote_goods_2']['iteration']++;
?>
    <div class="list <?php if ($this->_foreach['get_cat_promote_goods_2']['iteration'] == 1): ?>first<?php else: ?>mt10<?php endif; ?> else">
      <div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['thumb']; ?>" width="146" height="97" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></div>
      <div class="txt"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo sub_str($this->_var['goods']['short_name'],12); ?></a><br />
        </div>
    </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
   
  </div>
</div>
</div>

<?php $_from = get_child_cat($GLOBALS[smarty]->_var[category]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['child_cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['child_cat']['iteration']++;
?>
<div id="go_floor_<?php echo $this->_foreach['child_cat']['iteration']; ?>" class="w clearfix JC_floor floor<?php echo $this->_foreach['child_cat']['iteration']; ?>">
  <div class="own_w_box">
    <div class="floor_header"> <span class="name Left"><?php echo $this->_foreach['child_cat']['iteration']; ?>F <?php echo htmlspecialchars($this->_var['cat']['name']); ?></span> <span class="offer Left">热门推荐：<?php $_from = get_child_cat($GLOBALS[smarty]->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat2');$this->_foreach['child_cat2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat2']['total'] > 0):
    foreach ($_from AS $this->_var['cat2']):
        $this->_foreach['child_cat2']['iteration']++;
?><a href="<?php echo $this->_var['cat2']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['cat2']['name']); ?>"><?php echo htmlspecialchars($this->_var['cat2']['name']); ?></a><?php if (! ($this->_foreach['child_cat2']['iteration'] == $this->_foreach['child_cat2']['total'])): ?><span style="color: #ddd;"> | </span><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span><a href="<?php echo $this->_var['cat']['url']; ?>" target="_blank" title="更多" class="more Right">更多</a> </div>
    <div class="floor_body">
      <div class="side_focus Left">
        <div id="JS_floor_focus_nav_<?php echo $this->_foreach['child_cat']['iteration']; ?>" class="nav"><a href="javascript:;" class="current"></a><a href="javascript:;" class="current"></a></div>
        <div class="stage">
          <table id="JS_floor_focus_stage_<?php echo $this->_foreach['child_cat']['iteration']; ?>" cellpadding="0" cellspacing="0">
            <tr>
			<?php $_from = get_channel_floor_left_advlist_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
              <td class="item"><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" width="200" height="302" alt="<?php echo $this->_var['ad']['name']; ?>" /></a></td>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </tr>
          </table>
        </div>
      </div>
      <div class="img_map Left">
	  <?php $_from = get_cat_new_goods_4($GLOBALS[smarty]->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['cat_new'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_new']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['cat_new']['iteration']++;
?>
        <div class="map_list <?php if ($this->_foreach['cat_new']['iteration'] % 2 == 1): ?>first<?php endif; ?>" style="<?php if ($this->_foreach['cat_new']['iteration'] == 3): ?>border-bottom:0;<?php endif; ?><?php if ($this->_foreach['cat_new']['iteration'] == 4): ?>border-bottom:0;padding-top:1px;<?php endif; ?>">
          <div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['thumb']; ?>" width="150" height="120" style="margin-top:15px" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></div>
          <div class="info"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="f14"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a><br />
            </div>
        </div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
      </div>
      <div class="jrank Right">
        <h2 class="rtitle">销量排行榜</h2>
        <ul id="JS_floor_toggle_<?php echo $this->_foreach['child_cat']['iteration']; ?>" class="rank_list">
		<?php $_from = get_cat_hot_goods_5($GLOBALS[smarty]->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['cat_new'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_new']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['cat_new']['iteration']++;
?>
          <li class="list <?php if ($this->_foreach['cat_new']['iteration'] == 1): ?>first open<?php endif; ?>">
            <div class="show_item"><span class="index"><?php echo $this->_foreach['cat_new']['iteration']; ?></span><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="link"><?php echo sub_str($this->_var['goods']['short_name'],12); ?></a>
             
            </div>
            <div class="hide_map">
              <div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['thumb']; ?>" width="96" height="65" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></div>
      
            </div>
          </li>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
        </ul>
      </div>
    </div>
    <div class="floor_choose clearfix">
      <div class="Left clearfix"><?php $_from = get_channel_floor_bottom_advlist_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?><?php if ($this->_foreach['index_image']['iteration'] == 1): ?><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" title="<?php echo $this->_var['ad']['name']; ?> " alt="<?php echo $this->_var['ad']['name']; ?> " height="180" width="200"/></a><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
      <div class="Left"><?php $_from = get_channel_floor_bottom_advlist_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?><?php if ($this->_foreach['index_image']['iteration'] > 1): ?><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['ad']['image']; ?>" title="<?php echo $this->_var['ad']['name']; ?> " alt="<?php echo $this->_var['ad']['name']; ?> " height="180" <?php if (! ($this->_foreach['index_image']['iteration'] == $this->_foreach['index_image']['total'])): ?>width="280"<?php else: ?>width="220"<?php endif; ?>/></a><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
    </div>
  </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 

<script language="javascript">
$(".JC_floor").each(
	function(i){
		var l = $(this).find('.img_map').html();
		if ($.trim(l) == ''){
			$(this).hide();
		}
	}
);

</script>

<div class="w clearfix">
  <div class="own_w_box">
    <div class="comMap clearfix">

      
  
    </div>
    
    <script type="text/javascript">function Tab(e, a, b, d, c) {
	if (e.length <= 0 || !b) {
		return
	}
	this.nav = e;
	this.body = a;
	this.len = e.length;
	this.more = d;
	this.eventType = c || "mouseover";
	this.execute()
}
Tab.prototype.execute = function() {
	var b = this;
	for (var a = 0; a < b.len; a++) {
		b.nav[a].setAttribute("key", a);
		M.addHandler(b.nav[a], b.eventType,
		function() {
			var d = this.getAttribute("key");
			for (var c = 0; c < b.len; c++) {
				if ((b.nav[c]).className.indexOf("current") > -1) {
					M.removeClass(b.nav[c], "current");
					M.removeClass(b.body[c], "current")
				}
				if (b.more) {
					M.removeClass(b.more[c], "current")
				}
			}
			M.addClass(this, "current");
			M.addClass(b.body[d], "current");
			if (b.more) {
				M.addClass(b.more[d], "current")
			}
		},
		b.nav[a])
	}
};

function setTimer() {
	var b = new Scroll(M.$("#INDEX_LeiHao_XXXXX"));
	var a = new Scroll(M.$("#JS_comment_list_stage"));
	b.cloneDom();
	a.cloneDom();
	setInterval(function() {
		b.autoRun();
		a.autoRun()
	},
	5000)
}
setTimeout(function() {
			setTimer()
		},
		2000);
function Scroll(a) {
	this.dom = a;
	if (!this.dom) {
		return
	}
	this.size = M.$(".list", this.dom).length;
	this.index = 0;
	this.lock = false
}
Scroll.prototype.cloneDom = function() {
	var b = this;
	if (b.size > 3) {
		b.dom.onmouseover = function() {
			b.dom.lock = true
		};
		b.dom.onmouseout = function() {
			b.dom.lock = false
		};
		var a = b.dom.innerHTML;
		b.dom.innerHTML += a
	}
};
Scroll.prototype.autoRun = function() {
	var a = this;
	var b = a.index * 95;
	if (a.index >= a.size) {
		a.dom.style.marginTop = "0px";
		b = 0;
		a.index = 0
	}
	M.Animate(a.dom, {
		marginTop: (0 - b) + "px"
	},
	200, "linear");
	a.index++
};
function formatTime(i) {
	if (!i) {
		return "刚刚"
	}
	var b = parseInt((new Date()).getTime() / 1000);
	var f = b - i;
	if (f < 0) {
		f = 0
	}
	var e = f % 60;
	var a = parseInt(f % 3600 / 60);
	var c = parseInt(f % (3600 * 24) / 3600);
	var g = parseInt(f / (3600 * 24));
	if (g) {
		return g + "天前"
	} else {
		if (c) {
			return c + "小时前"
		} else {
			if (a) {
				return a + "分钟前"
			} else {
				if (e) {
					return e + "秒前"
				} else {
					return "刚刚"
				}
			}
		}
	}
}

</script>
  </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>




<script src="themes/meilele/js/back_to_top.min.js?1127"></script>
<script type="text/javascript">function _COMMON_UNIX_TIME(j) {
	var c = parseInt(new Date().getTime() / 1000);
	var l = document.getElementById("JS_Time_1");
	var k = document.getElementById("JS_Time_2");
	if (!l || !k) {
		return;
	}
	var e = l.getAttribute("data-lefttime");
	var a = k.getAttribute("data-lefttime");
	var h = l.getAttribute("data-format");
	var b = '<span class="time_else">$H</span> 时 <span class="time_else">$M</span> 分 <span  class="time_else">$S</span> 秒';
	var f, d;
	var g;
	f = e - c;
	d = a - c;
	S1 = f % 60;
	M1 = parseInt(f % 3600 / 60);
	H1 = parseInt(f % (3600 * 24) / 3600);
	D1 = parseInt(f / (3600 * 24));
	S2 = d % 60;
	M2 = parseInt(d % 3600 / 60);
	H2 = parseInt(d % (3600 * 24) / 3600);
	D2 = parseInt(d / (3600 * 24));
	setInterval(function() {
		S1 = S1 - 1;
		if (S1 < 0) {
			S1 = 59;
			M1 = M1 - 1;
		}
		if (M1 < 0) {
			M1 = 59;
			H1 = H1 - 1;
		}
		if (H1 < 0) {
			H1 = 23;
			D1 = D1 - 1;
		}
		if (D1 < 0) {
			S1 = 0;
			M1 = 0;
			H1 = 0;
			D1 = 0;
		}
		if (D1 == 0) {
			g = b.replace("$S", S1).replace("$H", H1).replace("$M", M1);
		} else {
			g = h.replace("$D", D1).replace("$H", H1).replace("$M", M1);
		}
		l.innerHTML = g;
		S2 = S2 - 1;
		if (S2 < 0) {
			S2 = 59;
			M2 = M2 - 1;
		}
		if (M2 < 0) {
			M2 = 59;
			H2 = H2 - 1;
		}
		if (H2 < 0) {
			H2 = 23;
			D2 = D2 - 1;
		}
		if (D2 < 0) {
			S2 = 0;
			M2 = 0;
			H2 = 0;
			D2 = 0;
		}
		if (D2 == 0) {
			g = b.replace("$S", S2).replace("$H", H2).replace("$M", M2);
		} else {
			g = h.replace("$D", D2).replace("$H", H2).replace("$M", M2);
		}
		k.innerHTML = g;
	},
	1000);
}
_COMMON_UNIX_TIME();
function Tab(c, a, b) {
	if (c.length <= 1) {
		return;
	}
	this.nav = c;
	this.body = a;
	this.len = c.length;
	this.more = b;
	this.execute();
}
Tab.prototype.execute = function() {
	var b = this;
	for (var a = 0; a < b.len; a++) {
		b.nav[a].setAttribute("key", a);
		M.addHandler(b.nav[a], "mouseover",
		function() {
			var f = this.getAttribute("key");
			for (var e = 0; e < b.len; e++) {
				if ((b.nav[e]).className.indexOf("current") > -1) {
					M.removeClass(b.nav[e], "current");
					M.removeClass(b.body[e], "current");
				}
				if (b.more) {
					M.removeClass(b.more[e], "current");
				}
			}
			M.addClass(this, "current");
			M.addClass(b.body[f], "current");
			var g = b.body[f].getElementsByTagName("img");
			if (g) {
				var d = g.length;
				for (var c = 0; c < d; c++) {
					if (g[c].getAttribute("lazy-src")) {
						g[c].src = g[c].getAttribute("lazy-src");
						g[c].removeAttribute("lazy-src");
					}
				}
			}
			if (b.more) {
				M.addClass(b.more[f], "current");
			}
		},
		b.nav[a]);
	}
};
new Tab(M.$("a", "#JS_top_tab_nav"), M.$(".body_item", "#JS_top_tab_stage"), M.$("a", "#JS_top_tab_more"));
function Focus(b, a, c) {
	if (!a) {
		return;
	}
	this.nav = b;
	this.stage = a;
	this.imgs = M.$("img", this.stage);
	this.step = c;
	this.index = 0;
	this.len = b.length;
	if (this.len <= 0) {
		return;
	}
	this.warp();
}
Focus.prototype = {
	warp: function() {
		var c = this;
		for (var b = 0; b < c.len; b++) {
			c.nav[b]._key = b;
			c.nav[b].onmouseover = function() {
				c.index = this._key;
				clearInterval(d);
				a();
			};
			c.nav[b].onmouseout = function() {
				d = setInterval(function() {
					a();
				},
				5000);
			};
		}
		var a = function() {
			for (var f = 0; f < c.len; f++) { (c.nav[f].className.indexOf("current") > -1) ? M.removeClass(c.nav[f], "current") : (function() {})();
			}
			M.addClass(c.nav[c.index], "current");
			var e = c.imgs[c.index];
			if (e.getAttribute("lazy-src")) {
				e.src = e.getAttribute("lazy-src");
				e.removeAttribute("lazy-src");
			}
			var g = (0 - c.step * c.index) + "px";
			M.Animate(c.stage, {
				marginLeft: g
			},
			200);
			c.index = (c.index >= c.len - 1) ? 0 : parseInt(c.index) + 1;
		};
		var d = setInterval(function() {
			a();
		},
		5000);
	}
};
new Focus(M.$("a", "#JS_focus_nav"), M.$("#JS_focus_table"), 770);
var floorCount = M.$(".side_focus").length;
for (var i = 0; i < floorCount; i++) {
	var x = i + 1;
	new Focus(M.$("a", "#JS_floor_focus_nav_" + x), M.$("#JS_floor_focus_stage_" + x), 200);
}
function Switch(a) {
	this.dom = a;
	this.size = this.dom.length;
	this.toggle();
}
Switch.prototype.toggle = function() {
	var b = this;
	for (var a = 0; a < b.size; a++) {
		M.addHandler(b.dom[a], "mouseover",
		function() {
			for (var d = 0; d < b.size; d++) {
				M.removeClass(b.dom[d].parentNode, "open");
			}
			M.addClass(this.parentNode, "open");
			var c = this.parentNode.getElementsByTagName("img")[0];
			if (c && c.getAttribute("lazy-src")) {
				c.src = c.getAttribute("lazy-src");
				c.removeAttribute("lazy-src");
			}
		},
		b.dom[a]);
	}
};
for (var t = 0; t < floorCount; t++) {
	var tt = t + 1;
	new Switch(M.$(".show_item", "#JS_floor_toggle_" + tt));
}
function GetPageScroll() {
	var b, a;
	if (window.pageYOffset) {
		a = window.pageYOffset;
		b = window.pageXOffset;
	} else {
		if (document.documentElement && document.documentElement.scrollTop) {
			a = document.documentElement.scrollTop;
			b = document.documentElement.scrollLeft;
		} else {
			if (document.body) {
				a = document.body.scrollTop;
				b = document.body.scrollLeft;
			}
		}
	}
	return {
		x: b,
		y: a
	};
}
var $fixed_nav = M.$("#JS_fixed_goods_cat");
function pageScroll() {
	if (GetPageScroll().y > 250) {
		M.addClass($fixed_nav, "fixedLay");
	} else {
		M.removeClass($fixed_nav, "fixedLay");
	}
}
if (window.ISFIXED) {
	M.addHandler(window, "scroll", pageScroll);
} (function(c) {
	var b = document.images,
	a = b.length;
	setTimeout(function() {
		for (var d = 0; d < a; d++) {
			if (b[d].getAttribute("data-src")) {
				b[d].src = b[d].getAttribute("data-src");
				b[d].removeAttribute("data-src");
			}
		}
	},
	0);
})(M);
/*GH:2013-11-20 15:17:50*/</script>


</body>
</html>

<?php endif; ?>
<?php endif; ?>
