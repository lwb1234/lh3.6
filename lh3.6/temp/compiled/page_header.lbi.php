

<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,utils.js')); ?>
<script>
//初始空函数，防止页面报错，勿删，函数真身在页脚。
function _show_() {};
function _hide_() {};
var City = {
	init: function() {}
}
window.$ = window.$ || {};
window.M = window.M || {};
$.__IMG = M.__IMG = '' || '';
var M = M || {};
M.getCookie = function(a) {
	var e;
	if (document.cookie && document.cookie !== "") {
		var d = document.cookie.split(";");
		var f = d.length;
		for (var c = 0; c < f; c++) {
			var b = d[c].replace(/(^\s*)|(\s*$)/g, "");
			if (b.substring(0, a.length + 1) == (a + "=")) {
				e = decodeURIComponent(b.substring(a.length + 1));
				break;
			}
		}
	}
	return e;
};</script>
<div id="JS_n_header_top_banner" class="pageAD">
  <div class="closeX" onClick="$('#JS_n_header_top_banner').slideUp();">&times;</div>
  <div style="background:url(themes/meilele/images/topbg.jpg) 0 0 repeat-x">
    <div class="w" style="text-align:center;"> <?php $_from = get_advlist_by_id(1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?> <a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img src="/<?php echo $this->_var['ad']['image']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" width="980" height="50" /></a> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </div>
  </div>
</div>
<div class="page-header" style="padding-bottom:5px">
  <div class="w clearfix">
     
     <div class="logo Left"><a id="JS_Header_Logo_link_home" href="/" title=""><img src="themes/meilele/images/blank.gif" width="150" height="48"  alt="" /></a></div>
     <div class="city Left">
       <img class="en_name" src="themes/meilele/images/blank.gif" width="172" height="35" />
     </div>
      
	  <div class="topAd Left">
	  <?php $_from = get_advlist_by_id(14); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
	    <table>
	      <tr>
		<td><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title=""><img src="<?php echo $this->_var['ad']['image']; ?>" alt="" width="145" height="90" /></a></td>
	      </tr>
	    </table>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	  </div>
  <div class="topArea Right">
    <table class="topMenu">
      <tr>
        <td id="JS_head_login" class="login" align="right"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></td>
	
        <!-- <td><em class="line"></em></td> -->
        <!-- <td><a href="user.php?act=order_list" target="_blank" title="我的订单">我的订单</a></td> -->
        <!-- <td><em class="line"></em></td> -->
        <!-- <td><a href="mobile/index.php" target="_blank" title="手机版">手机版</a></td> -->
        <td><em class="line"></em></td>
        <td><div class="help" id="JS_common_head_help"> <a href="javascript:void(0);" class="link">帮助中心</a>
            <div class="hideMenu">
              <ul>
                <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
                <li><a href="<?php echo $this->_var['nav']['url']; ?>"  
                  <?php if ($this->_var['nav']['opennew'] == 1): ?>
                  target="_blank"
                  <?php endif; ?>
                  ><?php echo $this->_var['nav']['name']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
            </div>
          </div></td>
        <td><em class="line"></em></td>
        <td><a href="javascript:;" onClick="shoucang();">收藏本站</a></td>
      </tr>
    </table>
	<script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            $.alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script>
	
    <div class="btMap" >
      <div class="Left search_box">
        <div class="search">
          <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()">
            <div class="sideShadow"></div>
            <input id="keyword" type="text" name="keywords" class="keyWord" value="" autocomplete="off" />
            <input type="submit" class="submit" value="搜 索" />
            <input type="hidden" name="fl" value="q"/>
          </form>
          <div style="display: none;" id="JS_search_suggest" class="suggest"> </div>
        </div>
        <div style="margin-top:5px;color:#999;width:416px;height:14px;overflow:hidden;"> 热门搜索： 
          <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?> <a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>" style="color:#999;"><?php echo $this->_var['val']; ?></a>&ensp; 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </div>
      </div>
      <div id="JS_header_cart_handler" class="cart Right"> <a href="store_list.php" class="cartLink"><span class="">店铺展示浏览</span></a>

      </div>
      <div class="cart Right mymll"> <a href="user.php" class="cartLink"><span class="">我的中心</span></a> </div>
    </div>
	
	
  </div>
</div>
<script language="javascript">
function drop_cart_goods(id)
{
	$.ajax({
					type:"POST",
					url:"flow.php?step=drop_cart_goods&id=" + id,
					cache:false,
					dataType:'json',     //接受数据格式
					data:'',
					success:function(result){
						$('#JS_header_cart_list').html(result.message);
						$('#cartInfo_number').html(result.goods_num);
					}
				});
}

</script>

<div class="w globa-nav">
 <!-- <div class="shadow" style="display:none"></div> -->
  <div class="w">
    <div class="allGoodsCat Left" id="JS_common_head_menu_812" class="hover"> <a href="javascript:;" class="menuEvent"><strong class="catName">全部商品分类</strong><span class="arrow"></span></a>
      <div class="expandMenu" id="JS_head_expand_menu_target"></div>
    </div>
    <div class="allMenu Left"> <a id="JS_Header_Home_Link" href="/" title="首页" class="index <?php if ($this->_var['navigator_list']['config']['index'] == 1): ?>current<?php endif; ?>">首页</a><?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?><a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?> <?php if ($this->_var['nav']['active'] == 1): ?> class="current"<?php endif; ?> style="position:relative;"><?php echo $this->_var['nav']['name']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </div>
    <!-- <div class="sideMenu2 Right"><a class="menu" href="xspace.html" title="">秀家</a><a class="menu" href="/bbs" target="_blank" title="">装修吧</a></div> -->
 </div>
</div>

<div class="globa-submenu"  id="globa_submenu" >
  <div class="w clearfix">
    <div class="frameLeft"></div>
    <div class="menuBox">
      <div class="Left"> &ensp;
      <a href="search_list_hot.html" class="red" target="_blank" title="热销">热销</a>&ensp;|&ensp; 
      <a href="search_list_best.html" class="red" target="_blank" title="推荐">推荐</a>&ensp;|&ensp; 
      <!-- <a  href="group_buy.html" target="_blank" title="团购">团购</a>&ensp;|&ensp; -->
      <!-- <a href="search_list_promotion.html" target="_blank" title="特价">特价</a>&ensp;|&ensp; -->
      <!-- <a href="activity.html" target="_blank" title="套装">套装</a>&ensp;|&ensp; -->
      <a href="search_list_new.html" target="_blank" title="新品">新品</a>&ensp;|&ensp; 
       </div>
      <div id="JS_temai_n_menu" class="Left none"></div>
    </div>
    <div class="frameRight"></div>
  </div>
</div>
<textarea id="JS_all_head_category_menu"  style="display:none">
	<div class="all_cat">
	<?php $_from = get_categories_tree(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['get_categories_tree'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_categories_tree']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['get_categories_tree']['iteration']++;
?>
    <?php if ($this->_foreach['get_categories_tree']['iteration'] < 4): ?>
			<div class="list JS_catItem">
				<dl class="cat">
					<dt class="catName"><strong class="cat1 Left"><a href="<?php echo $this->_var['cat']['url']; ?>" target="_blank" title=""><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></strong><span class="Right">&gt;</span></dt>
					<dd class="catList"><?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?><a href="<?php echo $this->_var['child']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['child']['name']); ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>&emsp;
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
				</dl>
				<div id="JS_globa_goods_cat_target_1" class="hideMap">
						<div class="topMap clearfix">
							<div class="subCat clearfix">
								<div class="col">
									<?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['cat_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['cat_cat_id']['iteration']++;
?>	
									<dl class="item <?php if ($this->_foreach['cat_cat_id']['iteration'] == 1): ?>no_border<?php endif; ?>">
										<dt class="dt"><a href="<?php echo $this->_var['child']['url']; ?>" class="red"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></dt>
										<dd class="dd">
										<?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
											<span>|&ensp;<a href="<?php echo $this->_var['childer']['url']; ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a>&ensp;</span>
										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>							
										</dd>
									</dl>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</div>
							</div>
							<div class="bottomMap">
								<h1 class="f14 red">推荐品牌</h1>
									<ul class="brand clearfix">
									<?php $_from = get_nav_brand_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
									<?php if ($this->_foreach['index_image']['iteration'] < 5): ?>
									<li class="li <?php if ($this->_foreach['index_image']['iteration'] < 3): ?>addTopBorder<?php endif; ?>"><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>" class="img"><img src="<?php echo $this->_var['ad']['image']; ?>" width="85" heiht="50" alt="<?php echo $this->_var['brandCat']['name']; ?>" /></a><a class="name"><?php echo $this->_var['ad']['title']; ?></a></li>
									<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									
									</ul>
									<h1 class="f14 red mt20">促销活动</h1>
									<ul class="activity">
									<?php $_from = get_navad_by_cat_id($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
									<li><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['ad_code']; ?>">&bull;&ensp;&ensp;<?php echo $this->_var['ad']['ad_code']; ?></a></li>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									
									</ul>
								</div>
						</div>
				</div>
		    </div>
		<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>		
		<div class="hotMenu">
		  <table>
			<tr>
			  <td><strong>热荐</strong> </td>
			  <td> <?php $_from = get_cat_rec_1(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rec_data');$this->_foreach['cat_rec'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_rec']['total'] > 0):
    foreach ($_from AS $this->_var['rec_data']):
        $this->_foreach['cat_rec']['iteration']++;
?> <a href="category.php?id=<?php echo $this->_var['rec_data']['cat_id']; ?>" title="<?php echo $this->_var['rec_data']['cat_name']; ?>" target="_blank"><?php echo $this->_var['rec_data']['cat_name']; ?></a> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </td>
			</tr>
		  </table>
		</div>
		<div class="otherMenu">
		  <dl class="specal_zone">
			<dd> 
			<a href="search_list_hot.html" target="_blank" title="热销" class="light">热销</a> 
			<a href="search_list_best.html" target="_blank" title="推荐" class="light">推荐</a> 
			<!-- <a href="group_buy.html" target="_blank" title="团购" class="light">团购</a> -->
			<!-- <a href="search_list_promotion.html" target="_blank" title="特价">特价</a> -->
			<!-- <a href="activity.html" target="_blank" title="套装" class="light">套装</a> -->
			<a href="search_list_new.html" target="_blank" title="新品">新品<i class="specal_new"></i></a> 
			<!-- <a href="expr.html" target="_blank" title="体验馆">体验馆</a> -->
			</dd>
		  </dl>
		</div>
	</div>
	<div class="cat_shadow"></div>
</textarea>
<script>
window._onReadyList = window._onReadyList || [];
_onReadyList.push( function(){
	$('#JS_hide_city_menu_11').hover(
		function(){
			_show_(this,{source:'JS_choose_city_source',target:'JS_header_city_bar_box',data:'JS_city_data',templateFunction:function(dom,json){
					dom = dom.jquery ? dom : $(dom);
					if(json){
						var out = '';
						var hot = '<a href="china.html" class="site_all Left" onclick="$.goExpr(\'china.html\',\'\',\'\',\'全国\');return !1;"><strong>全国</strong></a>&nbsp;';
						var inner = '';
						var charList = '';
						
						$.each(json.city_list, function(key,item){
							charList += '<a href="javascript:;">'+key+'</a>';
							out += '<tr><th><div>'+key+'</div></th><td>';
							$.each(item,function(index,shi){
								out += '<a href="'+shi.pinyin+'.html" data-region_id="'+shi.region_id+'" data-pinyin="'+shi.pinyin+'" onclick="$.goExpr(\''+shi.pinyin+'\',\''+shi.region_id+'\',\'\',\''+shi.region_name+'\');return !1;">'+shi.region_name+'</a>';
							});
							out += '</td></tr>';
						});

						$.each(json.host_city_list,function(index,shi){
							hot += '<a href="'+shi.pinyin+'.html" data-region_id="'+shi.region_id+'" data-pinyin="'+shi.pinyin+'" onclick="$.goExpr(\''+shi.pinyin+'\',\''+shi.region_id+'\',\'\',\''+shi.region_name+'\');return !1;">'+shi.region_name+'</a>';
						});

						dom.find('#JS_header_city_hot').html( hot );
						dom.find('#JS_header_city_char').html( charList );
						dom.find('#JS_header_city_list').html( out );
						
						return dom;
					}
				}});
			City.init();
		},
		function(){
			_hide_(this);
		}
	);
	$('#JS_common_head_help').hover(
		function(){_show_(this);},function(){_hide_(this);}
	);
		$('#JS_common_head_menu_812').hover(
		function(){
			_show_(this,{source:'JS_all_head_category_menu',target:'JS_head_expand_menu_target'});
		},
		function(){
			_hide_(this);
		}
	);
	$('#JS_head_expand_menu_target').on('mouseenter','div.JS_catItem',function(){
		_show_(this);
	});
	$('#JS_head_expand_menu_target').on('mouseleave','div.JS_catItem',function(){
		_hide_(this);
	});
	
	$('#JS_MLL_search_header_input').focus(function(){
		$.searchKey( 'JS_MLL_search_header_input', 'JS_search_suggest' );
		$('#JS_MLL_search_header_input').unbind('focus');
	});
} )
</script>
