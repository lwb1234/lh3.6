<div class="footer-box">
  <div class="footer-table" id="footer_table">
    <div class="w clearfix">
      <div class="someInfo Left">
        <div class="phone">
          <h4>商城服务热线</h4>
          <p>400-6455-999</p>
        </div>
	<li class="count">客服中心:86102266/2277</li>
	<li class="count">松北分店:87165611</li>
        <li class="count">黎华家具装饰材料城，百姓首选的家具建材商场，永不落幕的家具建材展会，永不间断的售后保障。</li>
        		
     </div>
      <table cellspacing="0" cellpadding="0" class="dtab Left clearfix">
        <tr>
		<td><div class="line"></div></td>
		<?php $_from = get_shop_help(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['shop_help'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shop_help']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['shop_help']['iteration']++;
?>
          <td><dl class="dl">
              <dt class="dt"><?php echo $this->_var['help_cat']['cat_name']; ?></dt>
              <dd class="dd"> 
			  <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
              <a href="<?php echo $this->_var['item']['url']; ?>" target="_blank"><?php echo $this->_var['item']['short_title']; ?></a>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
			  
			  </dd>
            </dl></td>
		<td><div class="line"></div></td>	
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
          
        </tr>
      </table>
      <div class="weixin Right" style="width:140px;">
        <h2 class="title">黎华微信公众号</h2>
        <div class="img"><a target="_blank"><img src="themes/meilele/images/blank.gif" width="100" height="100" /></a></div>
        <p>随手扫一扫,优惠全知晓!</p>
      </div>
    </div>
  </div>

  <?php if ($this->_var['txt_links']): ?>
  <div id="JS_ship_link" class="w footer-link"><strong>友情链接：</strong>
  <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
  <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  <?php endif; ?>
  <div class="w footer-copy"> 
  <?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
  <a href="<?php echo $this->_var['nav']['url']; ?>"  <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a><?php if (! ($this->_foreach['nav_bottom_list']['iteration'] == $this->_foreach['nav_bottom_list']['total'])): ?> | <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
  <br />
    <?php echo $this->_var['copyright']; ?><br />
	<?php echo $this->_var['shop_address']; ?> <?php echo $this->_var['shop_postcode']; ?>
 <?php if ($this->_var['service_phone']): ?>
      Tel: <?php echo $this->_var['service_phone']; ?>
 <?php endif; ?>
 <?php if ($this->_var['service_email']): ?>
      E-mail: <?php echo $this->_var['service_email']; ?><br />
 <?php endif; ?>
 <?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $this->_var['im']; ?>&amp;Site=<?php echo $this->_var['shop_name']; ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo $this->_var['im']; ?>:4" height="16" border="0" alt="QQ" /> <?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['ym']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $this->_var['im']; ?>n&.src=pg" target="_blank"><img src="themes/meilele/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['msn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <img src="themes/meilele/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> <a href="msnim:chat?contact=<?php echo $this->_var['im']; ?>"><?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['skype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <img src="http://mystatus.skype.com/smallclassic/<?php echo urlencode($this->_var['im']); ?>" alt="Skype" /><a href="skype:<?php echo urlencode($this->_var['im']); ?>?call"><?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><br />
    <?php if ($this->_var['icp_number']): ?>
  <?php echo $this->_var['lang']['icp_number']; ?>:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $this->_var['icp_number']; ?></a><br />
  <?php endif; ?>
  
	</div>
</div>
<script id="JS_city_data" type="text/html">{
	<?php 
$k = array (
  'name' => 'area_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
}</script>
<textarea id="JS_choose_city_source" style="display:none">
	<div class="hideMap">
		<div class="showPanel clearfix">
			<div class="Left mycity">
				<div id="JS_current_city_box">
					当前城市：<strong id="JS_city_current_city"></strong>
					
				</div>
				<div id="JS_default_city_delete" style="dsiplay:none"></div>
			</div>
			
		</div>
		<div class="showPanel showPanel2 clearfix">
			<div class="hot_city" id="JS_header_city_hot"></div>
			<div class="mt10">
				<div id="JS_search_city_tip_header" class="search_city_tip"  style="display:none;">抱歉，该城市暂无体验馆！</div>
				<input id="JS_search_city_input_header" class="search_city_input" value="输入城市名" /><input type="button" id="JS_search_city_submit_header" class="search_city_submit" value="搜索">
			</div>
			<div class="city_words mt10" id="JS_header_city_char"></div>
		</div>
		<div class="scrollBody">
			<div class="cityMap clearfix">
				<table id="JS_header_city_list" class="city_list"></table>
			</div>

			<div class="scrollBar"><span id="JS_header_city_bar"></span></div>
		</div>
	</div>
</textarea>
<script>window.M = window.M || {};if($.addToCart)M.addToCart = $.addToCart</script>
<script>
$.__IMG = '' || '';


</script>
<script type="text/javascript">
(function(c, b) {
	
	
})(document, jQuery);
function _INIT_HEAD_SEARCH(data) {
	var json;
	try {
		json = eval(data.html_content);
	} catch(e) {}
	if (json && json.length) {
		var url = location.pathname;
		var wordIndex = -1;
		var tmpFilter;
		window.__HEAD_SEARCH_WORDS_ARR = [];
		window.__HEAD_SEARCH_WORDS_OBJ = {};
		if (/\/jiaju\//.test(url)) {
			wordIndex = 0;
		} else {
			if (/\/jiancai\//.test(url)) {
				wordIndex = 1;
			} else {
				if (/\/shipin\//.test(url)) {
					wordIndex = 2;
				}
			}
		}
		for (var k = 0,
		kk = json.length; k < kk; k++) {
			tmpFilter = json[k].type.split("");
			if (wordIndex == -1 || tmpFilter[wordIndex] == 1) {
				__HEAD_SEARCH_WORDS_ARR.push(json[k]);
				__HEAD_SEARCH_WORDS_OBJ[json[k].text] = json[k];
			}
		}
		var inpt = $("#JS_MLL_search_header_input")[0];
		if (__HEAD_SEARCH_WORDS_ARR.length && inpt && inpt.value == "") {
			inpt.value = MLL_Header_search_words();
			inpt.onfocus = function() {
				this.value = "";
				this.onfocus = function() {};
			};
			inpt.onblur = function() {
				if (this.value == "") {
					this.value = MLL_Header_search_words();
					this.onfocus = function() {
						this.value = "";
						this.onfocus = function() {};
					};
				}
			};
		}
	}
}
function MLL_Header_search_words() {
	var b = __HEAD_SEARCH_WORDS_ARR,
	a = Math.floor(Math.random() * b.length);
	return b[a].text;
}
function MLL_header_search_submit() {
	var a = $("#JS_MLL_search_header_input")[0];
	var b = $("#JS_search_form")[0];
	var c = a.value + "";
	c = c.replace(/\s/g, "");
	if (!c) {
		return false;
	}
	if (window.__HEAD_SEARCH_WORDS_OBJ && __HEAD_SEARCH_WORDS_OBJ[c]) {
		location.href = __HEAD_SEARCH_WORDS_OBJ[c].href;
		return false;
	} else {
		a.value = c;
		$.cookie("MLL_AD", c, {
			expires: 15,
			domain: "meilele.com"
		});
		return true;
	}
}
function _show_(j, d) {
	if (!j) {
		return;
	}
	if (d && d.source && d.target) {
		var b = typeof d.source === "string" ? $("#" + d.source) : $(d.source);
		var l = typeof d.target === "string" ? $("#" + d.target) : $(d.target);
		var f = typeof d.data === "string" ? $("#" + d.data) : $(d.data);
		if (b.length && l.length && !l.isDone) {
			var h = $(b.val() || sourse.html());
			if (f.length && typeof d.templateFunction == "function") {
				var i = f.val() || f.html();
				i = $.parseJSON(i);
				h = d.templateFunction(h, i);
				f.remove();
			}
			l.empty().append(h);
			b.remove();
			if (typeof d.callback == "function") {
				d.callback();
			}
			l.isDone = true;
		}
	}
	
	$(j).addClass("hover");
	if (d && d.isLazyLoad && j.isDone) {
		var g = j.find("img");
		for (var e = 0,
		c = g.length; e < c; e++) {
			var a = g[e].getAttribute("data-src_index_menu");
			if (a) {
				g[e].setAttribute("src", a);
				g[e].removeAttribute("data-src_index_menu");
			}
		}
		j.isDone = true;
	}
}
function _hide_(b) {
	if (!b) {
		return;
	}
	var a = $(b);
	if (a.hasClass("hover")) {
		a.removeClass("hover");
	}
}
function shoucang() {
	var b = window.location.href;
	var a = document.title;
	try {
		window.external.addFavorite(b, a);
	} catch(c) {
		try {
			window.sidebar.addPanel(a, b, "");
		} catch(c) {
			alert("加入收藏失败，请使用Ctrl+D进行添加");
		}
	}
}
var car_number = 0;
function DY_cart_detail_nav_cb(b) {
	
}

var Cart = {};
Cart.handdler = $("#JS_header_cart_handler");
Cart.Dom = $("#JS_header_cart_list");
Cart.show = function() {
	
	Cart.handdler.addClass("hover");
};
Cart.hide = function() {
	Cart.handdler.removeClass("hover");
};
Cart.del = function(g) {
	
	
};
Cart.formatData = function(e) {
	
};
Cart.goPreCheckOut = function() {
	
};
function exprCallBackNum(json) {
	
	
}
$("#JS_header_cart_handler").hover(Cart.show, Cart.hide);
/*GH:2013-11-18 18:25:14*/</script>
<script>var City = {};
City.init = function() {
	if (City.ready && City.currentCity == $("#DY_site_name").html().replace("站", "")) {
		return;
	}
	City.currentCity = $("#DY_site_name").html().replace("站", "");
	City.handdler = $("JS_header_city_char");
	City.chars = $("#JS_header_city_char a");
	City.stage = $("#JS_header_city_list");
	City.lists = $("#JS_header_city_list tr");
	City.setDefaultDom = $("#JS_set_default_city_header");
	City.deleteDefaultCityDom = $("#JS_default_city_delete");
	City.nearDom = $("#JS_my_near_expr");
	City.currentBox = $("#JS_current_city_box");
	var c = City.stage.find("a");
	City.cityData = {};
	for (var a = 0,
	d = c.length; a < d; a++) {
		var f = c[a];
		var g = f.getAttribute("data-region_id");
		var b = f.getAttribute("data-pinyin");
		var e = f.innerHTML;
		City.cityData[e] = City.cityData[b] = City.cityData[g] = {
			regionId: g,
			pinyin: b,
			regionName: e
		};
	}
	c = null;
	City.defaultCity = {};
	if ($.cookie("default_rgn_id")) {
		City.defaultCity = City.cityData[$.cookie("default_rgn_id")] || {};
	}
	$("#JS_city_current_city").html(City.currentCity);
	City.currentCityData = City.cityData[City.currentCity];
	City.refreshDefaultCityDom();
	City.inputDom = $("#JS_search_city_input_header");
	City.tip = $("#JS_search_city_tip_header");
	City.inputDom.keyup(function(h) {
		City.tip.hide();
		if (h.keyCode == 13) {
			City.goSearch();
		}
	});
	City.inputDom.focus(function() {
		if (this.value == "输入城市名") {
			this.value = "";
		}
		City.tip.hide();
	});
	$("#JS_search_city_submit_header").click(City.goSearch);
	City.bar = $("#JS_header_city_bar");
	City.barBox = $("#JS_header_city_bar_box");
	City.size = City.chars.length;
	City.allHeight = City.stage.height();
	City.rate = (City.allHeight - 170) / (180 - 36);
	City.to = 0;
	City.to2 = 0;
	City.nowH = 0;
	City.mouseDown = false;
	City.selectByChar();
	City.scrollBar();
	City.scrollByWheel();
	City.ready = true;
};
City.refreshDefaultCityDom = function() {
	if (City.currentCity != "全国" && City.currentCityData.regionId != City.defaultCity.regionId) {
		City.setDefaultDom.show();
		City.setDefaultDom.attr("href", "javascript:City.setDefaultCity('" + City.currentCityData.regionId + "')");
	} else {
		City.setDefaultDom.hide();
		City.nearDom.hide();
	}
	if (City.currentCity != "全国" && City.currentCityData) {
		City.nearDom.attr("href", "/" + City.currentCityData.pinyin + "/area.html");
		City.nearDom.show();
		City.currentBox.show();
	} else {
		City.nearDom.hide();
		City.currentBox.hide();
	}
	if (City.defaultCity.regionId) {
		City.deleteDefaultCityDom.html('您默认的城市是：<a href="javascript:;" onclick="M.goExpr(City.defaultCity.pinyin,City.defaultCity.regionId,\'<?php echo $this->_var['goExprUrlType']; ?>\',City.defaultCity.regionName);return false;" class="red">' + City.defaultCity.regionName + '</a> <a href="javascript:City.delDefaultCity();" class="red">[删除]</a>');
		City.deleteDefaultCityDom.show();
	} else {
		City.deleteDefaultCityDom.hide();
	}
};
City.setDefaultCity = function(a) {
	if (a && City.cityData[a]) {
		City.defaultCity = City.cityData[a];
		$.cookie("default_rgn_id", City.cityData[a].regionId, {
			expires: 365
		});
		City.refreshDefaultCityDom();
	}
};
City.delDefaultCity = function() {
	City.defaultCity = {};
	$.cookie("default_rgn_id", "", {
		expires: -1
	});
	City.refreshDefaultCityDom();
};
City.goSearch = function() {
	var b = (City.inputDom.val() + "").replace(/[\s\d]/g, "");
	var a = City.cityData[b];
	if (a) {
		City.tip.hide();
		$.goExpr(a.pinyin, a.regionId, "<?php echo $this->_var['goExprUrlType']; ?>", a.regionName);
	} else {
		City.tip.show();
	}
};
City.selectByChar = function() {
	var b = 0;
	for (var a = 0; a < City.size; a++) {
		City.chars[a]._h = b;
		City.chars[a].onmouseover = function() {
			City.move(this._h);
			City.to2 = City.to;
		};
		b += City.lists.eq(a).height();
	}
};
City.move = function(b, a) {
	if (b < 0) {
		b = 0;
	}
	b = b >= (City.allHeight - 170) ? (City.allHeight - 170) : b;
	var c = parseInt(b / City.rate);
	if (a) {
		City.stage.css("margin-top", (0 - b) + "px");
		City.bar.css("margin-top", c + "px");
	} else {
		City.stage.stop(true, false).animate({
			marginTop: (0 - b) + "px"
		});
		City.bar.stop(true, false).animate({
			marginTop: c + "px"
		});
	}
	City.to = c;
	City.nowH = b;
};
City.scrollBar = function() {
	City.bar.on("mousedown",
	function(a) {
		a = a || window.event;
		City.mouseDown = true;
		City.nowHeight = a.pageY || a.clientY;
		a.returnValue = false;
		return false;
	});
	City.bar.on("dragstart",
	function(a) {
		a = a || window.event;
		a.returnValue = false;
	});
	$("body").on("mouseup",
	function(a) {
		a = a || window.event;
		City.mouseDown = false;
		City.to2 = City.to;
		a.returnValue = false;
		return false;
	});
	City.barBox.on("mousemove",
	function(a) {
		if (!City.mouseDown) {
			return;
		}
		a = a || window.event;
		var b = a.pageY || a.clientY;
		City.move((b - City.nowHeight + City.to2) * City.rate, true);
		a.returnValue = false;
		return false;
	});
};
City.scrollByWheel = function(a) {
	City.addScrollListener(City.barBox[0],
	function(c) {
		c = c || window.event;
		var b;
		if (c.wheelDelta) {
			b = (0 - c.wheelDelta) / Math.abs(c.wheelDelta);
		} else {
			b = c.detail / Math.abs(c.detail);
		}
		City.move(City.nowH + b * 50);
		City.to2 = City.to;
		if (navigator.userAgent.toLowerCase().indexOf("msie") >= 0) {
			event.returnValue = false;
		} else {
			c.preventDefault();
		}
	});
};
City.addScrollListener = function(e, d) {
	if (typeof e != "object") {
		return;
	}
	if (typeof d != "function") {
		return;
	}
	if (typeof arguments.callee.browser == "undefined") {
		var c = navigator.userAgent;
		var a = {};
		a.opera = c.indexOf("Opera") > -1 && typeof window.opera == "object";
		a.khtml = (c.indexOf("KHTML") > -1 || c.indexOf("AppleWebKit") > -1 || c.indexOf("Konqueror") > -1) && !a.opera;
		a.ie = c.indexOf("MSIE") > -1 && !a.opera;
		a.gecko = c.indexOf("Gecko") > -1 && !a.khtml;
		arguments.callee.browser = a;
	}
	if (e == window) {
		e = document;
	}
	if (arguments.callee.browser.ie) {
		e.attachEvent("onmousewheel", d);
	} else {
		e.addEventListener(arguments.callee.browser.gecko ? "DOMMouseScroll": "mousewheel", d, false);
	}
};
City.exed = true;
/*LDZ:2013-10-14 09:49:11*/</script>
<script type="text/javascript">
(function($){
	if( $("#JS_ship_link a").length > 26 ){
		$("#JS_more_link").hide();
		var openArrow = $("#JS_open_more");
		openArrow.css('display','inline-block').click(function(){
			$("#JS_ship_link a").each(function(){
				$(this).show();
			})
			$(this).hide();
		});
	}
})(jQuery);
//期刊订阅
function subscribe(){
	var em = $("#JS_subscribe").val();
	var reg = em.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
	if(reg == -1){
		$.alert("您输入的邮箱地址不合法！");
		return;
	}
	
	$.ajax({
					type:"GET",
					url:'user.php?act=email_list&job=add&email=' + em,
					cache:false,
					dataType:'TEXT',     //接受数据格式
					data:'',
					success:rep_add_email_list
				});
	
	
}

function rep_add_email_list(text)
{
  $.alert(text);
}
</script>