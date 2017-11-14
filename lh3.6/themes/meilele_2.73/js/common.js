(function() {
	var a = [];
	a.push(".addToCart_LB{}");
	a.push(".addToCart_LB .btns{text-align:right;}");
	a.push(".addToCart_LB .in{width:420px;}");
	a.push(".addToCart_LB .btns a{height:18px;line-height:18px;border-radius:0;background:#f3f3f3;background:linear-gradient(#fcfcfc,#f3f3f3) ;color:#666;border:1px solid #ccc;box-shadow:1px 1px 0px #f3f3f3;}");
	a.push(".addToCart_LB .btns a:hover{background:#fff;color:#444!important;}");
	a.push(".addToCart_LB .btns a.lightbox_btnsi_2{background:#ea6401;background:linear-gradient(#ffaf00,#ea6401) ;border-color:#fa8f05;box-shadow:1px 1px 0px #984706;color:#fff;}");
	a.push(".addToCart_LB .btns a.lightbox_btnsi_2:hover{background:#ffa904;background:linear-gradient(#ea6401,#ffaf00);color:#fff!important;}");
	$.insertStyle(a.join(""));
})();

$.addToCart = function(n, p) {
	if ($.addToCart.lightBoxId) {
		$.addToCart.removeUI();
	}
	
	$.showMask();
	
	var k = '<div class="clearfix title"><div class="Left"><i style="display:inline-block;"></i><span id="JS_addtocart_lb_title">商品成功放入购物车</span></div><a href="javascript:;" class="Right" onclick="$.closeLightBox( \'{=id}\' ,  $.addToCart.removeUI );">&times;</a></div><div class="content"><table style="width:100%"><tr><td class="icons_td"><span id="JS_addtocart_lb_icon" class="icons icons_ok"></span></td><td class="content_td" id="JS_addtocart_lb_content">购物车共有 <span class="red">'+n+'</span> 件商品，商品总金额合计：<span class="yen f14 bold red">&yen;' + p + "</span></td></tr></table></div>";
	$.addToCart.dom = $.lightBox(k, {
					"继续购物": function() {
						$.addToCart.removeUI();
						
					},
					"查看购物车": function() {
						location.href = "flow.php";
					}
	},
	null, null, null, false, "MALERT MCONFIRM addToCart_LB");
	$.addToCart.dom = $($.addToCart.dom);
	$.addToCart.lightBoxId = $.lightBoxId;

			
};

function openSpeDiv(message, goods_id, parent) 
{
  var newDiv = document.createElement("div");	
	//生成层内内容
  newDiv.innerHTML = '<div class="clearfix title"><div class="Left"><i style="display:inline-block;"></i><span id="JS_addtocart_lb_title">请选择商品属性</span></div></div>';

  for (var spec = 0; spec < message.length; spec++)
  {
      newDiv.innerHTML += '<hr style="color: #EBEBED; height:1px;"><h6 style="text-align:left; background:#ffffff; margin-left:15px;">' +  message[spec]['name'] + '</h6>';

      if (message[spec]['attr_type'] == 1)
      {
        for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
        {
          if (val_arr == 0)
          {
            newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' checked /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
          }
          else
          {
            newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
          }
        } 
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
      else
      {
        for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
        {
          newDiv.innerHTML += "<input style='margin-left:15px;' type='checkbox' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + ' [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';     
        }
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
  }

  
  if (openSpeDiv.lightBoxId) {
		openSpeDiv.removeUI();
	}
  $.showMask();	
  var k = newDiv.innerHTML;
	openSpeDiv.dom = $.lightBox(k, {
					"取消": function() {
						openSpeDiv.removeUI();
						
					},
					"购买": function() {
						submit_div(goods_id, parent);
					}
	},
	null, null, null, false, "MALERT MCONFIRM addToCart_LB");
	
	openSpeDiv.dom = $(openSpeDiv.dom);
	openSpeDiv.lightBoxId = $.lightBoxId;
  
}

function submit_div(goods_id, parentId) 
{
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var input_arr      = document.getElementsByTagName('input'); 
  var quick		   = 1;

  var spec_arr = new Array();
  var j = 0;

  for (i = 0; i < input_arr.length; i ++ )
  {
    var prefix = input_arr[i].name.substr(0, 5);

    if (prefix == 'spec_' && (
      ((input_arr[i].type == 'radio' || input_arr[i].type == 'checkbox') && input_arr[i].checked)))
    {
      spec_arr[j] = input_arr[i].value;
      j++ ;
    }
  }

  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goods_id;
  goods.number   = number;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  
  $.ajax({
					type:"POST",
					url:"flow.php?step=add_to_cart",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'goods=' + $.toJSON(goods),
					success:addToCartResponse
				});


   openSpeDiv.removeUI();


}

openSpeDiv.removeUI = function() {
	$.hideMask();
	$.closeLightBox($.addToCart.lightBoxId, $.addToCart.afterhandle);
	openSpeDiv.lightBoxId = false;
	openSpeDiv.dom = null;
	//location.href = location.href;

};

$.addToCart.removeUI = function() {
	$.hideMask();
	$.closeLightBox($.addToCart.lightBoxId, $.addToCart.afterhandle);
	$.addToCart.lightBoxId = false;
	$.addToCart.dom = null;
	//location.href = location.href;

};

var g_gid = 0;
function addToCart(goodsId, parentId)
{
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var formBuy      = document.forms['ECS_FORMBUY'];
  var quick		   = 0;

  // 检查是否有商品规格 
  if (formBuy)
  {
    spec_arr = getSelectedAttributes(formBuy);

    if (formBuy.elements['number'])
    {
      number = formBuy.elements['number'].value;
    }

	quick = 1;
  }
  g_gid = goodsId;
  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goodsId;
  goods.number   = number;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);

  $.ajax({
					type:"POST",
					url:"flow.php?step=add_to_cart",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'goods=' + $.toJSON(goods),
					success:addToCartResponse
				});
}
function addToCartResponse(result)
{
  if (result.error > 0)
  {
    // 如果需要缺货登记，跳转
    if (result.error == 2)
    {
      if (confirm(result.message))
      {
        location.href = 'user.php?act=add_booking&id=' + result.goods_id + '&spec=' + result.product_spec;
      }
    }
    // 没选规格，弹出属性选择框
    else if (result.error == 6)
    {
      openSpeDiv(result.message, result.goods_id, result.parent);
    }
    else
    {
      //alert(result.message);
    }
  }
  else
  {
		$.addToCart(result.goods_number, result.goods_price);
		$('#cartInfo_number').html(result.goods_number);
		
		$.ajax({
					type:"POST",
					url:"flow.php?step=get_cart_list",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'',
					success:function(result){
						$('#JS_header_cart_list').html(result.message);
					}
				});
  }
}

function collect(goodsId)
{
  $.ajax({
					type:"GET",
					url:"user.php?act=collect",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'id=' + goodsId,
					success:collectResponse
				});

}

function collectResponse(result)
{
  $.alert(result.message);
}

	/* *
	 * 添加礼包到购物车
	 */
	function addPackageToCart(packageId)
	{
	  var package_info = new Object();
	  var number       = 1;
	
	  package_info.package_id = packageId
	  package_info.number     = number;
	  
	  $.ajax({
					type:"POST",
					url:"flow.php?step=add_package_to_cart",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'package_info=' + $.toJSON(package_info),
					success:addPackageToCartResponse
				});
	
	  
	}
	
	/* *
	 * 处理添加礼包到购物车的反馈信息
	 */
	function addPackageToCartResponse(result)
	{
	  if (result.error > 0)
	  {
		if (result.error == 2)
		{
		  if (confirm(result.message))
		  {
			location.href = 'user.php?act=add_booking&id=' + result.goods_id;
		  }
		}
		else
		{
		  $.alert(result.message);    
		}
	  }
	  else
	  {	
		if (result.one_step_buy == '1')
		{
		  location.href = cart_url;
		}
		else
		{
		  $.alert('套装成功加入购物车！'); 
		  $('#cartInfo_number').html(result.goods_number);
		  $.ajax({
					type:"POST",
					url:"flow.php?step=get_cart_list",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'',
					success:function(result){
						$('#JS_header_cart_list').html(result.message);
					}
				});
		}
	  }
	}
