<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1205" />
<link href="themes/meilele/css/category_wide.min_1.css" rel="stylesheet" type="text/css"/> 

<!-- <link href="themes/meilele/css/new_products.min.css?0719b" rel="stylesheet" type="text/css"/>  -->


<script src="themes/meilele/js/common.min.js?0905"></script>
<script src="themes/meilele/js/jq.js?1119"></script>
<script src="themes/meilele/js/jquery.json.min.js"></script>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<?php $_from = get_advlist_by_id(17); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
<div class="w mt10 mb10 top_banner" style="height: 60px; overflow: hidden;" id="JS_banner"><div id="JS_banner_in"><a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" style="display:block;height:60px;background:url(<?php echo $this->_var['ad']['image']; ?>) center 0 no-repeat;"><img src="themes/meilele/images/blank.gif" style="background:none" height="60" width="100%"></a></div></div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

<div class="w clearfix mt10">
  <div class="position"><?php echo $this->fetch('library/ur_here.lbi'); ?> </div>
  <div class="cat_r">
	    <div id="JS_slide" class="slide">
	      <div class="in">
		 <div class="smar Left">

		       <div id="JS_slide_stage" class=" slide_stage"> 
			  <?php $_from = get_advlist_by_id(19); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
			  <a id="JS_slide_stage_<?php echo ($this->_foreach['index_image']['iteration'] - 1); ?>" href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img id="JS_slide_img_<?php echo $this->_foreach['index_image']['iteration']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" left="0" width="600" height="348" src="<?php echo $this->_var['ad']['image']; ?>"/></a> 
			  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		  </div>

		  <div id="JS_slide_nav" class="Right slide_nav"> 
			<?php $_from = get_advlist_by_id(19); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
			<a id="JS_slide_nav_<?php echo $this->_foreach['index_image']['iteration']; ?>" <?php if ($this->_foreach['index_image']['iteration'] == 1): ?>class="current"<?php endif; ?> href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="<?php echo $this->_var['ad']['image']; ?>" width="120" height="70" alt="<?php echo $this->_var['ad']['name']; ?>"></a> 
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		  </div>
	      </div>
	    </div>
<script language="javascript">
function search_order(sort){
	listform.sort.value = sort;
	listform.order.value = <?php if ($this->_var['pager']['search']['order'] == 'ASC'): ?>'DESC'<?php else: ?>'ASC'<?php endif; ?>;
	listform.submit();
}
</script>
        <form action="search_list.php" method="post" class="sort" name="listform" id="form" style="display:none">
         
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
    <div id="JS_fix_r">
      <div class="sort clearfix sort1" style="border:1px solid #e2e2e2">
        <div class="Left"> <span class="box">排序：</span>
	  <a href="javascript:search_order('sell_number');" class="box arrow <?php if ($this->_var['pager']['search']['sort'] == 'sell_number'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">销量</a>
	  <a href="javascript:search_order('click_count');" class="box arrow aup <?php if ($this->_var['pager']['search']['sort'] == 'click_count'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">人气</a> 
	  <a href="javascript:search_order('shop_price');" class="box arrow aup <?php if ($this->_var['pager']['search']['sort'] == 'shop_price'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">价格</a>
	  <a href="javascript:search_order('goods_id');" class="box arrow <?php if ($this->_var['pager']['search']['sort'] == 'goods_id'): ?>current<?php endif; ?> <?php if ($this->_var['pager']['order'] == 'DESC'): ?>down<?php else: ?>up<?php endif; ?>">最新</a>
	  
	  </div>

		
		<div class="Right page_box"> <span class="red stat_num">共<strong><?php echo $this->_var['pager']['record_count']; ?></strong>件商品</span><span class="page_num"><strong class="red"><?php echo $this->_var['pager']['page']; ?></strong>/<?php echo $this->_var['pager']['page_count']; ?></span> 
	  <?php if ($this->_var['pager']['page_prev']): ?>
	  <a href="<?php echo $this->_var['pager']['page_prev']; ?>" class="btn"><i class="icon_triangle triangle_prev"></i>上一页</a>
	  <?php else: ?>
	  <a href="javascript:;" class="btn disabled"><i class="icon_triangle triangle_prev"></i>上一页</a>&ensp;
	  <?php endif; ?>
	  <?php if ($this->_var['pager']['page_next']): ?>
	  <a href="<?php echo $this->_var['pager']['page_next']; ?>" class="btn">下一页<i class="icon_triangle triangle_next"></i></a> 
	  <?php else: ?>
	  <a href="javascript:;" class="btn disabled">下一页<i class="icon_triangle triangle_next"></i></a>
	  <?php endif; ?>
	  </div>
      </div>
      
    </div>
    <div class="goods clearfix">
	<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
    <?php if ($this->_var['goods']['goods_id']): ?>
      <div class="list  <?php if ($this->_foreach['goods_list']['iteration'] % 3 == 1): ?>first<?php endif; ?>">
		<?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php if ($this->_var['goods_data']['goods_flag'] != ''): ?><div class="float_bg"><span class="text1"><?php if ($this->_var['goods_data']['goods_flag'] == 'promote'): ?>抢购<?php endif; ?><?php if ($this->_var['goods_data']['goods_flag'] == 'new'): ?>新品<?php endif; ?><?php if ($this->_var['goods_data']['goods_flag'] == 'best'): ?>特价<?php endif; ?><?php if ($this->_var['goods_data']['goods_flag'] == 'hot'): ?>热销<?php endif; ?></span></div><?php endif; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <div class="img"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" width="235" height="156"/></a></div>

        <div class="info">
          <p class="goods_name"><a class="name" href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo $this->_var['goods']['goods_name']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></p>
          
        </div>
      </div>
	  <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
      
      
      
    </div>
    <div class="page R pageC"><?php echo $this->fetch('library/pages2.lbi'); ?></div>
  </div>
  <div class="cat_l">
 <?php echo $this->fetch('library/category_tree.lbi'); ?>
 <?php echo $this->fetch('library/goods_new.lbi'); ?>
  </div>
</div>
<div id="JS_viewHistory" class="mt10"> </div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script src="themes/meilele/js/back_to_top.min.js?1127"></script>
<script type="text/javascript">
var SLIDE = function (stage, nav, stageId, navId, height, count, name, timer, hoverDom) {
	var that = this;
	if (!stage )
		return false;
	this.name = name;
	this.now = 1;
	this.lock = 0;
	this.stage = stage;
	this.nav = nav;
	this.stageId = stageId;
	this.navId = navId;
	this.height = height;
	this.count = count;
	if (!count)
		return;
	this.hoverDom = hoverDom;
	for (var k = 0; k < this.hoverDom.length; k++) {
		this.hoverDom[k].onmouseover = function () {
			that.lock = 1;
		}
		this.hoverDom[k].onmouseout = function () {
			that.lock = 0;
		}
	}
	if (this.nav) {
		this.li = M.$("a", this.nav);
		for (var k = 0; k < this.li.length; k++) {
			this.li[k]._Id = k;
			this.li[k].onmouseover = function () {
				that.scrol(this._Id + 1);
				that.lock = 1;
			}
		};
	}
	setInterval(function () {
		if (!that.lock)
			that.scrol();
	}, timer);
}
SLIDE.prototype.scrol = function (to) {
	var that = this;
	to = to || (that.now) % that.count + 1;
	if (to == that.now)
		return;
	var img=M.$("#JS_slide_img_"+to);
	var src=img.getAttribute("data-src");
	if(src){
		img.src=src;
		img.removeAttribute("data-src");
	}
	if (this.nav) {
		var navObj = M.$("#" + that.navId + to);
		for (var k = 0; k < that.li.length; k++) {
			M.removeClass(that.li[k], "current");
		}
		M.addClass(navObj, "current");
	}
	M.Animate(that.stage,{marginTop : ((1 - to) * that.height) + "px"},200);
	that.now = to;
}
window.myfocus = new SLIDE(M.$("#JS_slide_stage"), M.$("#JS_slide_nav"), "JS_slide_stage_", "JS_slide_nav_", 348, M.$("a", M.$("#JS_slide_nav")).length, "myfocus", 3000, M.$("a","#JS_slide_nav"));

var _currentCat;
function toggleCatgory(id){
	var b = M.$('#JS_category_body_'+id);
	var t = M.$('#JS_category_icon2_'+id);
	var a = M.$('#JS_category_title_'+id);
	if(typeof _currentCat == 'undefined') {
		var list = M.$('.category_body'),
			i=0,
			len = list.length;
		for(;i<len;i++) {
			if( list[i].className.indexOf(' none') < 0 ) {
				_currentCat = i;
				break;
			}
		}
	}
	var bn = M.$('#JS_category_body_'+_currentCat);
	var tn = M.$('#JS_category_icon2_'+_currentCat);
	var an = M.$('#JS_category_title_'+_currentCat);
	if( b && t){
		if(_currentCat == id){
			tn.innerHTML = '+';
			M.addClass( bn , 'none');
			//M.removeClass(a , 'red');
			_currentCat = -1;
		}else{
			M.removeClass( b , 'none');
			t.innerHTML = '-';
			if(_currentCat != '-1' && bn && tn){
				M.addClass( bn , 'none');
				tn.innerHTML = '+';
			}
			_currentCat = id;
		}
	}
}



(function(doc){
	var $ = function(i){return doc.getElementById(i);}
	var addClass = M.addClass
	var removeClass = M.removeClass
	
	//销售冠军切换
	for(var k =0;k<3;k++){
		if(!$("JS_champion_"+k)) continue;
		var td = $("JS_champion_"+k);
		td._k = k;
		td.onmouseover = function(){
			var k = this._k;
			for(var i=0;i<3;i++){
				if(!$("JS_champion_body_"+i)) continue;
				$("JS_champion_body_"+i).className ="none";
				removeClass($("JS_champion_"+i),"current");
			}
			addClass( this , "current" );
			$("JS_champion_body_"+k).className = '';
		}
	};
	//最新活动图片切换
	if($("JS_picSlider") && $("JS_picSliderNav")){
		var _pic = $("JS_picSlider").getElementsByTagName('a');
		var _picNav = $("JS_picSliderNav").getElementsByTagName('a');
		var _picCurrentId = 0;
		for(var k =0;k<_picNav.length;k++){
			_picNav[k]._k = k;
			_picNav[k].onmouseover = function(){
				var k = this._k;
				if (k == _picCurrentId) return;
				var _picMath = k % _picNav.length;
				for(var i=0;i<_picNav.length;i++){
					removeClass(_picNav[i],"current");
				}
				addClass( this , "current" );
				M.Animate($("JS_picSlider"),{marginTop : -( _picMath * 62) + "px"},300);
				_picCurrentId = k;
			}
		}
	}
})(document);

(function(){
	var left = M.$("#JS_left_z"),
		right = M.$("#JS_fix_r")
	var b_top=M.offsetTop( left );
	var a_top=M.offsetTop( right );
	function findscroll(){
		var gundong=window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
		
		if(gundong>=a_top){ 
			if(right){right.className=" right_fix";}
			}
		else{
			if(right){right.className="";}
			}
		if(gundong>=b_top){
			if(left){left.className="left_fix ch_body category_list";}
			
			}
		else{
			if(left){left.className="ch_body category_list";}
		}
	}
	findscroll();
	window.onscroll=findscroll;
	
	var e_tab=M.$(".t_list","#JS_tabc");
	if(e_tab){
		for(var i=0; i<e_tab.length; i++){
			e_tab[i].onmouseover=function(){
				for(var z=0; z<e_tab.length; z++){
					M.removeClass(e_tab[z], 'hover');
					}
				M.addClass(this, 'hover');
				}
			}
		}
	
	
	})(M);
	
M.addHandler(window,'load',M.lazyImg.start,M.lazyImg);
</script>

</body>
</html>
<!--
GH:2013-10-11 13:43:38
-->
