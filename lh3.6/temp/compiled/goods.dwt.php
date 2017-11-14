<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<script src="themes/meilele/js/jq.js"></script>
<script src="themes/meilele/js/jquery.json.min.js"></script>

<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<link href="themes/meilele/css/goods_wide.min.css?1112fv" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,utils.js')); ?>
<script src="themes/meilele/js/common.js"></script>
<link href="themes/meilele/css/magiczoom.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="themes/meilele/js//mzp-packed-me.js"></script>
</head>
<body>
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className="root_body";window.LOAD=true;}else{window.LOAD=false;}})()</script>

<?php echo $this->fetch('library/page_header.lbi'); ?> 
<?php $_from = get_advlist_by_id(15); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
<div class="w mt10 mb10 top_banner" style="height:60px;overflow:hidden;" id="JS_banner">
  <div id="JS_banner_in">
  <a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" style="display:block;height:60px;background:url(<?php echo $this->_var['ad']['image']; ?>) center 0 no-repeat;"><img src="themes/meilele/images/blank.gif" style="background:none" height="60" width="100%"></a>
  </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div id="JS_nav_guide" class="nav_guide w"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>

<div class="goods_title w" id="JS_goods_title_34742">
  <h1 class="goods_name"><span id="JS_attr_title_name"><?php echo $this->_var['goods']['goods_style_name']; ?></span> <span class="goods_sn" id="JS_attr_title_sn">编号：<?php echo $this->_var['goods']['goods_sn']; ?></span> <strong id="JS_attr_title_event" class="red f14"></strong> </span> </h1>
  <h2 class="goods_sub_title red" id="JS_attr_sub_title"> <?php echo $this->_var['goods']['goods_brief']; ?> </h2>
</div>
<div class="w clearfix">
  <div class="big_img Left">
    <div id="JS_view_current_big_img">
      <div class="img">
        <div id="JS_attr_limit_buy" class="img_tags limit_buy" style="display:none"></div>
       
        <a id="Zoomer" class="MagicZoomPlus" rel="" title="点击查看<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>图片"  href="<?php echo $this->_var['pictures']['0']['img_url']; ?>" onclick="window.open('gallery.php?id=<?php echo $this->_var['goods']['goods_id']; ?>'); return false;"> <img src="<?php echo $this->_var['pictures']['0']['img_url']; ?>" width="565" height="374" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /> </a></div>
      <a class="float_view" href="javascript:;" onclick="window.open('gallery.php?id=<?php echo $this->_var['goods']['goods_id']; ?>'); return false;" title="点击查看<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>图片"></a> </div>
	  <script language="javascript">
	  var screenWidth=window.screen.width;
	  if(screenWidth>=1280){
	  		$('#Zoomer').attr('rel', 'selectors-effect:false;zoom-fade:true;background-opacity:70;zoom-width:620;zoom-height:372;caption-source:img:title;thumb-change:mouseover');
		}else{
			$('#Zoomer').attr('rel', 'selectors-effect:false;zoom-fade:true;background-opacity:70;zoom-width:410;zoom-height:372;caption-source:img:title;thumb-change:mouseover');
		}
	  
	  </script>
	  <?php echo $this->fetch('library/goods_gallery.lbi'); ?>
  </div>
  <div id="JS_panel_34742" class="panel Right current">
    <div class="sale_price">
      
      <p id="JS_panel_row_price_34742" class="gray"><span id="JS_panel_shop_price_34742" class="">市场价：<span class="yen"><del><?php echo $this->_var['goods']['market_price']; ?></del></span>&emsp;</span></p>
      <div class="p_left"><span class="red" id="JS_panel_price_type_34742">本站价：</span><span id="JS_panel_show_price_34742" class="red f24 yen bold" <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>style="font-size:12px; text-decoration:line-through"<?php endif; ?>><?php echo $this->_var['goods']['shop_price_formated']; ?></span>&emsp;&emsp;
        
      </div>
	  <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
	  <div class="p_left"><span class="red" id="JS_panel_price_type_34742">促销价：</span><span id="JS_panel_show_price_34742" class="red f24 yen bold"><?php echo $this->_var['goods']['promote_price']; ?></span>&emsp;&emsp;
        
      </div>
	  <?php endif; ?>
    </div>

    <div class="infos clearfix">
      <ul>
	  <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
	  <?php echo $this->smarty_insert_scripts(array('files'=>'lefttime.js')); ?>
        <li class="gray" style="" id="JS_panel_activity_21994">活&emsp;&emsp;动：<span class="active"><span id="JS_panel_active_type_21994" class="active_type">限时促销进店选购</span><span class="time none" id="JS_panel_time_21994">剩余时间：<font class="f4" id="leftTime"><?php echo $this->_var['lang']['please_waiting']; ?></font></span></span></li>
	  <?php endif; ?>	

	  
        <li class="gray">品&emsp;&emsp;牌：<a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>" ><?php echo $this->_var['goods']['goods_brand']; ?></a></li>
	<li class="gray" height="67" line-height="67" text-align="center">品牌标志：<a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>" target="_blank" title="<?php echo $this->_var['goods']['goods_brand']; ?>"><img src="data/brandlogo/<?php echo $this->_var['goods']['brand_logo']; ?>" title="<?php echo $this->_var['goods']['goods_brand']; ?>" alt="<?php echo $this->_var['goods']['goods_brand']; ?>" vertical-align='middle' height="67" width="100"></a></li>
<?php if ($this->_var['store']): ?>
        <li class="gray">店&emsp;&emsp;铺：<a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>"/* "seller_store.php?sid=<?php echo $this->_var['store']['id']; ?>" target="_blank"*/ ><?php echo $this->_var['store']['shop_name']; ?></a></li>

	<li class="gray " height="67"  line-height="67">店铺标志：<a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>" target="_blank" title="<?php echo $this->_var['store']['shop_name']; ?>"><img src="<?php echo $this->_var['store']['shop_logo']; ?>" title="<?php echo $this->_var['store']['shop_name']; ?>" alt="<?php echo $this->_var['store']['shop_name']; ?>" height="67" width="100"></a></li>
	
	<!--<li class="gray">联 系 人：<?php echo $this->_var['store']['address']; ?></li>-->
	<li class="gray">电&emsp;&emsp;话：<?php echo $this->_var['store']['kf_tel']; ?></li>
	<li class="gray">所在地址：<?php echo $this->_var['store']['shop_address']; ?></li>
<?php endif; ?>
        <li class="gray">服&emsp;&emsp;务：由 <span class="red">黎华家具装饰材料城</span> 提供售后服务。</li>
<!--
        <li id="JS_panel_gift_34742" class="gray none"><?php echo $this->_var['store']['shop_logo']; ?></li>
        <li class="tips" id="JS_panel_tips_nav_34742">
          <div class="tips_i_box">
	  <a class="tip_i" target="_blank">45天退换</a>
	  <span class="line">|</span>
	  <a class="tip_i" target="_blank">质保一年</a>
	  <span class="line">|</span>
	  <a class="tip_i" target="_blank">价格保护</a>
	  </div>
          <a href="javascript:void(0);" class="goods_kefu"></a>
	</li>
 -->
 
  <li class="padd">
                    <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/meilele/images/bnt_cat.gif" /></a>
                    <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/meilele/images/bnt_colles.gif" /></a>
                    <?php if ($this->_var['affiliate']['on']): ?>
                    <a href="user.php?act=affiliate&goodsid=<?php echo $this->_var['goods']['goods_id']; ?>" ><img src="themes/meilele/images/tuijian.gif" /></a>
                    <?php endif; ?>
           </li>
      </ul>
    </div>
	<script language="javascript">
	  function changeAtt(t) {
		var obj = document.getElementById('spec_value_'+t.getAttribute("name"));
		if (obj){
			obj.checked='checked';
		}
		
		for (var i = 0; i<t.parentNode.childNodes.length;i++) {
				if (t.parentNode.childNodes[i].className == 'current') {
					t.parentNode.childNodes[i].className = '';
				}
			}
		t.className = "current";
		changePrice();
		}
	  </script>
	
    
  </div>
</div>

<div class="w clearfix mt10">
  <div class="main_left Left">
    <h2 class="group_title">大家还买了</h2>
    <ul class="tab_body">
	<?php $_from = $this->_var['bought_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bought_goods_data');$this->_foreach['bought_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bought_goods']['total'] > 0):
    foreach ($_from AS $this->_var['bought_goods_data']):
        $this->_foreach['bought_goods']['iteration']++;
?>
				<?php if ($this->_foreach['bought_goods']['iteration'] < 5): ?>
      <li <?php if ($this->_foreach['bought_goods']['iteration'] == 1): ?>class="first"<?php endif; ?>>
        <div class="img"> <a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>" target="_blank"> <img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['bought_goods_data']['goods_thumb']; ?>" width="178" height="116" alt="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>" /> </a> </div>
        <div class="info c"> <a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>" target="_blank"><?php echo $this->_var['bought_goods_data']['short_name']; ?></a>
         <!-- <p><span>本站价：</span><span class="yen red"><?php if ($this->_var['bought_goods_data']['promote_price'] != 0): ?><?php echo $this->_var['bought_goods_data']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['bought_goods_data']['shop_price']; ?><?php endif; ?></span></p>  -->
        </div>
      </li>
	  <?php endif; ?>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
    </ul>
    <h2 class="group_title mt10">大家还浏览了</h2>
    <ul class="tab_body">
	<?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['releated_goods_data']):
?>
      <li class="first">
        <div class="img"> <a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" target="_blank"> <img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" width="178" height="116" alt="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" /> </a> </div>
        <div class="info c"> <a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" target="_blank"><?php echo $this->_var['releated_goods_data']['short_name']; ?></a>
         <!-- <p><span>本站价：</span><span class="yen red"><?php if ($this->_var['releated_goods_data']['promote_price'] != 0): ?><?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['releated_goods_data']['shop_price']; ?><?php endif; ?></span></p>  -->
        </div>
      </li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </ul>
  </div>
  <div class="main_right Right">
    <div class="navs">
      <div style="height:0px;position:absolute;" id="JS_float_navs_position"></div>
      <div class="float_navs" id="JS_float_navs">
      <a class="current first" href="javascript:;" id="JS_Tab_nav_xinxi">商品详情</a>
      <a href="javascript:;" id="JS_Tab_nav_guige" style="display:none">规格参数</a>
      <a href="javascript:;" id="JS_Tab_nav_expr" style="display:none;">体验馆<span id="JS_count_expr" class="gray"></span></a>
      <a href="javascript:;" id="JS_Tab_nav_pingjia" style="display:none">客户评价<span id="JS_count_pingjia" class="gray JS_comment_num"></span></a>
      <a href="javascript:;" id="JS_Tab_nav_sheji" style="display:none">设计搭配</a>
      <a href="javascript:;" id="JS_Tab_nav_jilu" style="display:none">购买记录<span id="JS_count_jilu" class="gray"><?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php echo $this->_var['goods_data']['total_sells']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span></a>
      <a href="javascript:;" id="JS_Tab_nav_zixun" style="display:none;">商品咨询<span id="JS_count_zixun" class="gray"></span></a>
      <a href="javascript:;" id="JS_Tab_nav_shouhou">售后服务</a>
      <a href="javascript:;" id="JS_Tab_nav_wenti" style="display:none">常见问题</a>
      <a href="javascript:;" id="JS_Tab_nav_xuzhi" style="display:none;">购买须知</a>
      <!-- <span href="javascript:void(0);" id="JS_quickly_buy" class="quickly_buy" onClick="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"></span> -->
      </div>
    </div>
    <div class="xinxi clearfix mt10" id="JS_Tab_body_xinxi">
      
      <div class="tupian mt10">
        <?php echo $this->_var['goods']['goods_desc']; ?>
        
      </div>
    </div>
    <div class="guige mt10" id="JS_Tab_body_guige"> </div>
    <div class="expr mt10" id="JS_Tab_body_expr"> </div>
    <div class="sheji mt10 heihei" id="JS_Tab_body_sheji"> </div>
    <div class="jilu mt10" id="JS_Tab_body_jilu"> </div>
    <div class="shouhou mt10" id="JS_Tab_body_shouhou" style="display:none">
      <div class="tab_title"> <span class="icon"></span>
        <h2>售后服务</h2>
      </div>
      <div class="tab_body">
        <div class="list clearfix"> <span class="icon Left"></span>
          <p class="Right"> <strong>退货和流程：</strong><br/>
            <a class="red" target="_blank"><u>45 天无理由退货</u></a>，因质量问题退换，商家承担邮费；非质量问题退换，仅限正价商品，买家承担邮费。影响二次销售的产品不能退换货。定制类产品非质量问题不能退换货。已明确注明“不予退换”的商品不能退换货。</p>
        </div>
        <div class="list list2 clearfix"> <span class="icon Left"></span>
          <p class="Right"> <strong>商品保修：</strong><br/>
            家具类商品的保修期限为<span class="red">三年</span>，建材类商品保修期限为<span class="red">一年</span>。在我们网站购买商品的客户均将自动成为我们的VIP客户，我们承诺为您的家具提供终身维护。 </p>
        </div>
        <div class="list list3 clearfix"> <span class="icon Left"></span>
          <p class="Right"> <strong>施工指导：</strong><br/>
            客户拿到我们的装修方案后，我们有专人可以提供方案的施工指导服务（电话或网络）。 </p>
        </div>
      </div>
    </div>
    <div class="xuzhi mt10" id="JS_Tab_body_xuzhi"> </div>
    <a name="pj"></a>
    <div class="pingjia mt10" id="JS_Tab_body_pingjia"> </div>
    <div class="zixun mt10" id="JS_Tab_body_zixun" style="display:none">
      <div class="tab_title"> <span class="icon"></span>
        <h2>商品咨询</h2>
      </div>
      <div class="tab_body"> <div class="c gray">暂无咨询。</div></div>
    </div>
    <div class="wenti mt10" id="JS_Tab_body_wenti" style="display:none"> </div>
  </div>
</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;

onload = function(){
  changePrice();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
  
  $.ajax({
					type:"GET",
					url:"goods.php",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty,
					success:changePriceResponse
				});

}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
  }
}


</script>


<script type="text/javascript" src="themes/meilele/js/back_to_top.min.js?1121fv"></script>
<script type="text/javascript" src="themes/meilele/js/goods_wide.min.js?1121fv"></script>
<script type="text/javascript">

GL['34742'] = new Good({
	"goods_id": "34742",
	"show_type": "0",
	"goods_thumb_1": "",
	"ship_type": "1",
	"is_logistics": "0",
	"is_delete": "0",
	"is_on_sale": "1",
	"is_parent_goods": "0",
	"calc_type": "1",
	"goods_weight": "0",
	"goods_sn": "",
	"cloth_goods_id": "",
	"goods_volume": "0.1952",
	"stock_volumn": "0.1952",
	"goods_name": "",
	"limit_sale": "0",
	"discount_price": "0.00",
	"goods_thumb": "",
	"style_id": "303",
	"cat_id": "275",
	"brand_id": "213",
	"material_id": "304",
	"goods_attribute": "0",
	"shop_id": "1",
	"shop_name": "",
	"cname": "",
	"style_name": "",
	"brand_name": "",
	"discount_type": "1",
	"red_title": "",
	"clo_goods_id": null,
	"material_name": "",
	"add_time": "1308695210",
	"quotiety": "0.00",
	"img_leftshow_text": "0",
	"goods_list_tag": "0",
	"real_unit_use": "0",
	"change_unit_use": "1",
	"change_unit_ratio": "1.00000",
	"goods_unitname": "",
	"discount_name": "",
	"is_fitment": 0,
	"is_haier": 0,
	"is_redpacket": 0,
	"chandi": "",
	"brand_url": "",
	"style_url": "",
	"material_url": "",
	"price_type": {
		
	},
	"activity_type": "",
	"goods_activity_name": [],
	"favourite_num": 8287,
	"click": 7587,
	"sales_num": "1071",
	"attr_info": {
		"color_list": false,
		"spec_list": {
			
		},
		"sofa_list": false,
		"material_list": false
	},
	"join_list": null,
	"page_title": "",
	"real_unit_use_name": "",
	"change_unit_use_name": "",
	"relate_parent": [],
	"relate_show": [],
	"pinyin": "dianshigui",
	"exchange_limit": null
});
goodsInit();
</script>

<script type="text/javascript" id="bdshare_js" data="type=tools"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>

</body>
</html>
