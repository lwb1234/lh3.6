<!DOCTYPE HTML>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/meilele/css/flow.min.css" rel="stylesheet" type="text/css"/>
<?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,common.js,user.js,utils.js')); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'shopping_flow.js')); ?>
</head>
<body>
<div class="page-header fl_page-header">
  <div class="w clearfix">
    <div class="Right">
      <table class="topMenu">
        <tr>
		<?php if ($_SESSION['user_id'] > 0): ?>
		<td id="JS_head_login" class="login"><a href="user.php" target="_blank" class="red" style="display:inline-block;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:40px;"><?php echo $_SESSION['user_name']; ?></a> <span id="JS_head_sita_name_haier">欢迎光临！</span> <a href="user.php?act=logout" class="red" id="JS_login_out">[退出]</a></td>
		<td><em class="line"></em></td>
		
		<?php else: ?>
		<td id="JS_head_login" class="login"><span>您好，欢迎光临！</span><em class="line"></em><a href="user.php" title="登录">登录</a><em class="line"></em><a href="user.php?act=register" title="免费注册帐号">注册</a></td>
		<td><em class="line"></em></td>
		<?php endif; ?>
          <td><a href="user.php?act=order_list" target="_blank" title="我的订单">我的订单</a></td>
		<td><em class="line"></em></td>
          <td><a href="#" target="_blank" title="帮助">帮助中心</a></td>
          <td><em class="line"></em></td>
          <td style="width:150px;"><div id="JS_head_scoll_phone_527" style="width:150px;height:24px;overflow:hidden;position:relative"><span>服务热线：</span><span class="hotLine">400 0098666</span></div></td>
          <td><a href="#" target="_blank" title="官方微博" class="sinaLink"></a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="block">
  <?php if ($this->_var['step'] == "cart"): ?>
  
  
  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?>
  <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>
  <div class="w fl_header clearfix"> <a class="Left" href="/"><img class="fl_logo" src="themes/meilele/images/blank.gif" /></a>
    <div class="Right fl_step fl_step_cart"></div>
  </div>
  <div class="flow_h2 w mt20 clearfix">
    <div class="Left text">我的购物车</div>
  </div>
  <table class="w mt20 cart_table" id="JS_list_table_cb">
    <tr>
      <th class="first" style="" colspan="2">商品</th>
      <th style="width:16%"><?php echo $this->_var['lang']['goods_attr']; ?></th>
      <th style="width:8%">单价</th>
      <th style="width:15%">数量</th>
      <th style="width:8%">金额</th>
      <th style="width:10%">操作</th>
    </tr>
    <form id="formCart" name="formCart" method="post" action="flow.php">
      <?php if ($this->_var['goods_list']): ?>
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
      <tr  id="tr_goods_<?php echo $this->_var['goods']['rec_id']; ?>">
        <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
        <td style="width:110px;"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img class="img" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="90" height="58" title="查看商品" /></a> </td>
        <td class="l" style="line-height:1.5"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a> </td>
        <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
        <td style="width:110px;">
		<?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');$this->_foreach['package_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['package_goods_list']):
        $this->_foreach['package_goods_list']['iteration']++;
?>
		<?php if ($this->_foreach['package_goods_list']['iteration'] == 1): ?>
		<a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank"><img class="img" src="<?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php echo $this->_var['goods_data']['goods_thumb']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>" width="90" height="58" title="查看商品" /></a>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</td>
        <td class="l" style="line-height:1.5"><a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
          <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
            <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
            <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div></td>
        <?php endif; ?>
        <td class="yen"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
        <td class="yen"><?php echo $this->_var['goods']['goods_price']; ?></td>
        <td><div class="clearfix number"> <a href="javascript:;" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,-1);return false;" class="Left sub" title="减少数量"></a>
            <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="4" class="Left num" style="text-align:center " onBlur="change_goods_number(<?php echo $this->_var['goods']['rec_id']; ?>,this.value)"/>
            <a class="Left add" href="javascript:;" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,1);return false;" title="增加数量"></a><span class="Left unit"></span> </div></td>
        <td class="yen"><div class="goods_subtotal yen" id="goods_subtotal_<?php echo $this->_var['goods']['rec_id']; ?>"><?php echo $this->_var['goods']['subtotal']; ?></div></td>
        <td><a class="orange" href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; "><?php echo $this->_var['lang']['drop']; ?></a>
          <?php if ($_SESSION['user_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
          <a class="orange" href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; "><?php echo $this->_var['lang']['drop_to_collect']; ?></a>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php else: ?>
      <tr>
        <td colspan="7" bgcolor="#ffffff" height="50px" align="center" style=" font-weight:bold">您的购物车中没有任何商品!</td>
      </tr>
      <?php endif; ?>
      <input type="hidden" name="step" value="update_cart" />
    </form>
  </table>
  <div class="w cart_extra clearfix">
    <div class="Left"> <a href="javascript:;" onClick="javascript:if (confirm('确定<?php echo $this->_var['lang']['clear_cart']; ?>?')) location.href='flow.php?step=clear'; " class="delete_cart_goods" title="<?php echo $this->_var['lang']['clear_cart']; ?>"><?php echo $this->_var['lang']['clear_cart']; ?></a> </div>
    <div class="Right r"> <span class="f14 bt"><b>商品总价</b>(不含运费)：<span class="red yen total_price"><span id="total_desc"><?php echo $this->_var['total']['goods_price']; ?></span></span></span> </div>
  </div>
  <div class="cart_button w r mt20"> <a href="/" class="back" title="继续购物"></a>&ensp;<a title="去结算" href="flow.php?step=checkout" class="check"></a> </div>
  <script language="javascript">


function changenum(rec_id, diff)
            {
                var goods_number =Number(document.getElementById('goods_number_' + rec_id).value) + Number(diff);             
                change_goods_number(rec_id,goods_number);
            }
            function change_goods_number(rec_id, goods_number)
            {     
               Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&goods_number=' + goods_number, change_goods_number_response, 'POST','JSON');                
            }
            function change_goods_number_response(result)
            {               
                if (result.error == 0)
                {
                    var rec_id = result.rec_id;
                    document.getElementById('goods_number_' +rec_id).value = result.goods_number;//更新数量
                    document.getElementById('goods_subtotal_' +rec_id).innerHTML = result.goods_subtotal;//更新小计
                    if (result.goods_number <= 0)
                    {// 数量为零则隐藏所在行
                        document.getElementById('tr_goods_' +rec_id).style.display = 'none';
                        document.getElementById('tr_goods_' +rec_id).innerHTML = '';
                    }
                    document.getElementById('total_desc').innerHTML =result.total_price;//更新合计
                    if (document.getElementById('ECS_CARTINFO'))
                    {//更新购物车数量
                       document.getElementById('ECS_CARTINFO').innerHTML = result.cart_info;
                    }
                }
                else if (result.message != '')
                {
                    alert(result.message);
                }                
            }



</script>
  <?php endif; ?>
  <?php if ($this->_var['step'] == "consignee"): ?>
  
  <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
  <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
  <div class="w fl_header clearfix"> <a class="Left" href="/"><img class="fl_logo" src="themes/meilele/images/blank.gif"></a>
    <div class="Right fl_step fl_step_pre_checkout"></div>
  </div>
  
  <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee_0_71030600_1510563605');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee_0_71030600_1510563605']):
?>
  <form action="flow.php" method="post" name="theForm" id="theForm" onSubmit="return checkConsignee(this)">
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['consignee_info']; ?></span></h6>
      <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,transport.js')); ?>
      <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if ($this->_var['real_goods_count'] > 0): ?>
        
        <tr>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['country_province']; ?>:</td>
          <td colspan="3" bgcolor="#ffffff"><select name="country" id="selCountries_<?php echo $this->_var['sn']; ?>" onchange="region.changed(this, 1, 'selProvinces_<?php echo $this->_var['sn']; ?>')" style="border:1px solid #ccc; height:22px">
              <option value="1">中国</option>
              <!-- Lee 将区域固定为中国
              <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></option>
              <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
              <option value="<?php echo $this->_var['country']['region_id']; ?>" <?php if ($this->_var['consignee_0_71030600_1510563605']['country'] == $this->_var['country']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['country']['region_name']; ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              -->
            </select>
            <select name="province" id="selProvinces_<?php echo $this->_var['sn']; ?>" onchange="region.changed(this, 2, 'selCities_<?php echo $this->_var['sn']; ?>')" style="border:1px solid #ccc;height:22px">

              <option value="12" selected = selected>黑龙江省</option>

              {* 将区域固定为黑龙江省  by lee
                 <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
              <?php $_from = $this->_var['province_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
              <option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['consignee_0_71030600_1510563605']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    by lee  end
              *}
            </select>
            <select name="city" id="selCities_<?php echo $this->_var['sn']; ?>" onchange="region.changed(this, 3, 'selDistricts_<?php echo $this->_var['sn']; ?>')" style="border:1px solid #ccc;height:22px">
              <option value="167">哈尔滨</option>
              <!--
                by lee start 固定哈尔滨市内送货
              <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
              <?php $_from = $this->_var['city_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
              <option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['consignee_0_71030600_1510563605']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              end
              -->
            </select>
            <select name="district" id="selDistricts_<?php echo $this->_var['sn']; ?>" <?php if (! $this->_var['district_list'][$this->_var['sn']]): ?><?php endif; ?> style="border:1px solid #ccc;height:22px">
              <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
              <?php $_from = $this->_var['district_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
              <option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['consignee_0_71030600_1510563605']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
            <?php echo $this->_var['lang']['require_field']; ?> </td>
        </tr>
        <?php endif; ?>
        <tr>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['consignee_name']; ?>:</td>
          <td bgcolor="#ffffff"><input name="consignee" type="text" class="inputBg" id="consignee_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['consignee']); ?>" />
            <?php echo $this->_var['lang']['require_field']; ?> </td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['email_address']; ?>:</td>
          <td bgcolor="#ffffff"><input name="email" type="text" class="inputBg"  id="email_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['email']); ?>" />
            <?php echo $this->_var['lang']['require_field']; ?></td>
        </tr>
        <?php if ($this->_var['real_goods_count'] > 0): ?>
        
        <tr>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['detailed_address']; ?>:</td>
          <td bgcolor="#ffffff"><input name="address" type="text" class="inputBg"  id="address_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['address']); ?>" />
            <?php echo $this->_var['lang']['require_field']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['postalcode']; ?>:</td>
          <td bgcolor="#ffffff"><input name="zipcode" type="text" class="inputBg"  id="zipcode_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['zipcode']); ?>" /></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['phone']; ?>:</td>
          <td bgcolor="#ffffff"><input name="tel" type="text" class="inputBg"  id="tel_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['tel']); ?>" />
            <?php echo $this->_var['lang']['require_field']; ?></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['backup_phone']; ?>:</td>
          <td bgcolor="#ffffff"><input name="mobile" type="text" class="inputBg"  id="mobile_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['mobile']); ?>" /></td>
        </tr>
        <?php if ($this->_var['real_goods_count'] > 0): ?>
        
        <tr>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['sign_building']; ?>:</td>
          <td bgcolor="#ffffff"><input name="sign_building" type="text" class="inputBg"  id="sign_building_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['sign_building']); ?>" /></td>
          <td bgcolor="#ffffff"><?php echo $this->_var['lang']['deliver_goods_time']; ?>:</td>
          <td bgcolor="#ffffff"><input name="best_time" type="text"  class="inputBg" id="best_time_<?php echo $this->_var['sn']; ?>" value="<?php echo htmlspecialchars($this->_var['consignee_0_71030600_1510563605']['best_time']); ?>" /></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td colspan="4" align="center" bgcolor="#ffffff"><input type="submit" name="Submit" class="bnt_blue_2" value="<?php echo $this->_var['lang']['shipping_address']; ?>" />
            <?php if ($_SESSION['user_id'] > 0 && $this->_var['consignee_0_71030600_1510563605']['address_id'] > 0): ?>
            
            <input name="button" type="button" onclick="if (confirm('<?php echo $this->_var['lang']['drop_consignee_confirm']; ?>')) location.href='flow.php?step=drop_consignee&amp;id=<?php echo $this->_var['consignee_0_71030600_1510563605']['address_id']; ?>'"  class="bnt_blue" value="<?php echo $this->_var['lang']['drop']; ?>" />
            <?php endif; ?>
            <input type="hidden" name="step" value="consignee" />
            <input type="hidden" name="act" value="checkout" />
            <input name="address_id" type="hidden" value="<?php echo $this->_var['consignee_0_71030600_1510563605']['address_id']; ?>" />
          </td>
        </tr>
      </table>
    </div>
  </form>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php endif; ?>
  <?php if ($this->_var['step'] == "checkout"): ?>
  
  <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
<script type="text/javascript">
region.isAdmin = false;
<?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		  
function shippingBox_change(frm)
{
	var con_country = frm.elements['country'].value;
	var con_province = frm.elements['province'].value;
	var con_city = frm.elements['city'].value;
	var con_district = frm.elements['district'].value;
	document.getElementById("shippingBox").innerHTML='<font color="#ff3300">&nbsp;&nbsp;&nbsp;正在重新导入配送区域，请稍候...</font>';
	Ajax.call('flow.php?step=shipping_change', 'country=' +con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district , shippingBoxchangeResponse , 'GET', 'JSON'); 
}
		
function shippingBoxchangeResponse(result)
{
	document.getElementById("shippingBox_msg").innerHTML= '配送区域已经变化，请重新选择物流';
	document.getElementById("shippingBox").innerHTML= result.content;
}
/* *
 * 改变配送方式
 */
function selectShipping(obj)
{

	/* start by jianhualiucheng */
  var theForm = obj.form;
  var con_country = theForm.elements['country'].value;
  var con_province = theForm.elements['province'].value;
  var con_city = theForm.elements['city'].value;
  var con_district = theForm.elements['district'].value;
  if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请选择完整的配送区域（省市县）！');
	  obj.checked= false;
	  return ;
  }
  else
	{
	document.getElementById('shippingBox_msg').innerHTML='';
  }
  /* end by jianhualiucheng */

  if (selectedShipping == obj)
  {
    return;
  }
  else
  {
    selectedShipping = obj;
  }

  var supportCod = obj.attributes['supportCod'].value + 0;
  var theForm = obj.form;

  for (i = 0; i < theForm.elements.length; i ++ )
  {
    if (theForm.elements[i].name == 'payment' && theForm.elements[i].attributes['isCod'].value == '1')
    {
      if (supportCod == 0)
      {
        theForm.elements[i].checked = false;
        theForm.elements[i].disabled = true;
      }
      else
      {
        theForm.elements[i].disabled = false;
      }
    }
  }

  


  if (obj.attributes['insure'].value + 0 == 0)
  {
    document.getElementById('ECS_NEEDINSURE').checked = false;
    document.getElementById('ECS_NEEDINSURE').disabled = true;
  }
  else
  {
    document.getElementById('ECS_NEEDINSURE').checked = false;
    document.getElementById('ECS_NEEDINSURE').disabled = false;
  }

  var now = new Date();
  Ajax.call('flow.php?step=select_shipping', 'shipping=' + obj.value+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, orderShippingSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}
		  
		  
		  /* *
 * 改变支付方式
 */
function selectPayment(obj)
{

 /* start by jianhualiucheng */
	var theForm = obj.form;
	var con_country = theForm.elements['country'].value;
	var con_province = theForm.elements['province'].value;
	var con_city = theForm.elements['city'].value;
	var con_district = theForm.elements['district'].value;
	 if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请选择完整的配送区域（省市县）！');
	  obj.checked= false;
	  return ;
  }
  /* end by jianhualiucheng */

  if (selectedPayment == obj)
  {
    return;
  }
  else
  {
    selectedPayment = obj;
  }  

  Ajax.call('flow.php?step=select_payment', 'payment=' + obj.value+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}
/* *
 * 改变商品包装
 */
function selectPack(obj)
{

/* start by jianhualiucheng */
  var theForm = obj.form;
  var con_country = theForm.elements['country'].value;
  var con_province = theForm.elements['province'].value;
  var con_city = theForm.elements['city'].value;
  var con_district = theForm.elements['district'].value;
  if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请选择完整的配送区域（省市县）！');
	  obj.checked= false;
	  return ;
  }
  /* end by jianhualiucheng */

  if (selectedPack == obj)
  {
    return;
  }
  else
  {
    selectedPack = obj;
  }

  Ajax.call('flow.php?step=select_pack', 'pack=' + obj.value+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}
/* *
 * 改变祝福贺卡
 */
function selectCard(obj)
{
  if (selectedCard == obj)
  {
    return;
  }
  else
  {
    selectedCard = obj;
  }

  Ajax.call('flow.php?step=select_card', 'card=' + obj.value, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

/* *
 * 选定了配送保价
 */
function selectInsure(needInsure)
{
  needInsure = needInsure ? 1 : 0;

  Ajax.call('flow.php?step=select_insure', 'insure=' + needInsure, orderSelectedResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

/**
 * 验证红包序列号
 * @param string bonusSn 红包序列号
 */
function validateBonus(bonusSn)
{
/* start by jianhualiucheng */
  var theForm = document.getElementById("theForm");
  var con_country = theForm.elements['country'].value;
  var con_province = theForm.elements['province'].value;
  var con_city = theForm.elements['city'].value;
  var con_district = theForm.elements['district'].value;
  if ( con_country=='0' || con_province == '0' || con_city == '0' || con_district == '0')
  {
	  alert('请选择完整的配送区域（省市县）！');

	  return ;
  }
  /* end by jianhualiucheng */
  Ajax.call('flow.php?step=validate_bonus', 'bonus_sn=' + bonusSn+'&country='+con_country+'&province='+con_province+'&city='+con_city+'&district='+con_district, validateBonusResponse, 'GET', 'JSON'); //修改 by jianhualiucheng
}

/* *
 * 检查提交的订单表单
 */
function checkOrderForm(frm)
{
  var paymentSelected = false;
  var shippingSelected = false;

//增加_start By jianhualiucheng
  var telinput=false;
  var consigneeSelected1=false;
  var consigneeSelected2=false;
  var consigneeSelected3=false;
  var addressinput=false;
  //增加_end By jianhualiucheng

  // 检查是否选择了支付配送方式
  for (i = 0; i < frm.elements.length; i ++ )
  {
    if (frm.elements[i].name == 'shipping' && frm.elements[i].checked)
    {
      shippingSelected = true;
    }

	//增加_start By jianhualiucheng
	if (frm.elements[i].name == 'tel' && frm.elements[i].value)
    {
      telinput = true;
    }
	 if (frm.elements[i].name == 'address' && frm.elements[i].value)
    {
      addressinput = true;
    }
	 if (frm.elements[i].name == 'province' && frm.elements[i].value!='0')
    {		
		consigneeSelected1 = true;	   
    }
	 if (frm.elements[i].name == 'city' && frm.elements[i].value!='0')
    {		
		consigneeSelected2 = true;	   
    }
	 if (frm.elements[i].name == 'district' && frm.elements[i].value!='0')
    {		
		consigneeSelected3 = true;	   
    }
	//增加_end By jianhualiucheng


    if (frm.elements[i].name == 'payment' && frm.elements[i].checked)
    {
      paymentSelected = true;
    }
  }


//增加_start By jianhualiucheng
  if ( ! telinput)
  {
    alert("收货人电话没有填写！！");
    return false;
  }
  if ( ! addressinput)
  {
    alert("收货地址没有填写！！");
    return false;
  }
  if ( ! consigneeSelected1 || ! consigneeSelected2 || ! consigneeSelected3)
  {
    alert("配送区域没有选择！！");
    return false;
  }
  //增加_end By jianhualiucheng

  if ( ! shippingSelected)
  {
    alert(flow_no_shipping);
    return false;
  }

  if ( ! paymentSelected)
  {
    alert(flow_no_payment);
    return false;
  }

  // 检查用户输入的余额
  if (document.getElementById("ECS_SURPLUS"))
  {
    var surplus = document.getElementById("ECS_SURPLUS").value;
    var error   = Utils.trim(Ajax.call('flow.php?step=check_surplus', 'surplus=' + surplus, null, 'GET', 'TEXT', false));

    if (error)
    {
      try
      {
        document.getElementById("ECS_SURPLUS_NOTICE").innerHTML = error;
      }
      catch (ex)
      {
      }
      return false;
    }
  }

  // 检查用户输入的积分
  if (document.getElementById("ECS_INTEGRAL"))
  {
    var integral = document.getElementById("ECS_INTEGRAL").value;
    var error    = Utils.trim(Ajax.call('flow.php?step=check_integral', 'integral=' + integral, null, 'GET', 'TEXT', false));

    if (error)
    {
      return false;
      try
      {
        document.getElementById("ECS_INTEGRAL_NOTICE").innerHTML = error;
      }
      catch (ex)
      {
      }
    }
  }
  frm.action = frm.action + '?step=done';
  return true;
}

        </script>
  <div class="w fl_header clearfix"> <a class="Left" href="/"><img class="fl_logo" src="themes/meilele/images/blank.gif"></a>
    <div class="Right fl_step fl_step_pre_checkout"></div>
  </div>
  <form action="flow.php" method="post" name="theForm" id="theForm" onSubmit="return checkOrderForm(this)">
    <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
        </script>
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['goods_list']; ?></span>
        <?php if ($this->_var['allow_edit_cart']): ?>
        <a href="flow.php" class="f6"><?php echo $this->_var['lang']['modify']; ?></a>
        <?php endif; ?>
      </h6>
      <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
          <th bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_name']; ?></th>
          <th bgcolor="#ffffff"><?php echo $this->_var['lang']['goods_attr']; ?></th>
          <?php if ($this->_var['show_marketprice']): ?>
          <th bgcolor="#ffffff"><?php echo $this->_var['lang']['market_prices']; ?></th>
          <?php endif; ?>
          <th bgcolor="#ffffff"><?php if ($this->_var['gb_deposit']): ?><?php echo $this->_var['lang']['deposit']; ?><?php else: ?><?php echo $this->_var['lang']['shop_prices']; ?><?php endif; ?></th>
          <th bgcolor="#ffffff"><?php echo $this->_var['lang']['number']; ?></th>
          <th bgcolor="#ffffff"><?php echo $this->_var['lang']['subtotal']; ?></th>
        </tr>
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <tr>
          <td bgcolor="#ffffff"><?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
            <a href="javascript:void(0)" onClick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
            <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
              <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
              <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
            <?php else: ?>
            <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a>
            <?php if ($this->_var['goods']['parent_id'] > 0): ?>
            <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
            <?php elseif ($this->_var['goods']['is_gift']): ?>
            <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
            <?php endif; ?>
            <?php endif; ?>
            <?php if ($this->_var['goods']['is_shipping']): ?>
            (<span style="color:#FF0000"><?php echo $this->_var['lang']['free_goods']; ?></span>)
            <?php endif; ?>
          </td>
          <td bgcolor="#ffffff"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
          <?php if ($this->_var['show_marketprice']): ?>
          <td align="center" bgcolor="#ffffff"><?php echo $this->_var['goods']['formated_market_price']; ?></td>
          <?php endif; ?>
          <td bgcolor="#ffffff" align="center"><?php echo $this->_var['goods']['formated_goods_price']; ?></td>
          <td bgcolor="#ffffff" align="center"><?php echo $this->_var['goods']['goods_number']; ?></td>
          <td bgcolor="#ffffff" align="center"><?php echo $this->_var['goods']['formated_subtotal份']; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php if (! $this->_var['gb_deposit']): ?>
        <tr>
          <td bgcolor="#ffffff" colspan="7" style="color:#A10101; font-size:14px; font-weight:bold"><?php if ($this->_var['discount'] > 0): ?>
            <?php echo $this->_var['your_discount']; ?><br />
            <?php endif; ?>
            <?php echo $this->_var['shopping_money']; ?>
            <?php if ($this->_var['show_marketprice']): ?>
            ，<?php echo $this->_var['shopping_money']; ?>
            <?php endif; ?>
          </td>
        </tr>
        <?php endif; ?>
      </table>
    </div>
    <div class="blank"></div>
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['consignee_info']; ?></span></h6>
      <div style="border:1px solid #eee;margin-top:5px;">
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF">
          <tr >
            <td width="10%" height="30" align=right style="padding-top:10px;"><?php echo $this->_var['lang']['consignee_name']; ?>：</td>
            <td width="90%" height="30" style="padding-top:10px;"><input type="text" name="consignee" value="<?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?>" size=15>
              &nbsp;&nbsp;<?php if ($_SESSION['user_id'] > 0): ?><?php else: ?><b>【<a href="user.php?act=register"><font color=#ff3300>注册</font></a>会员可以累积折扣积分，会员点此<a href="user.php" ><font color=#ff3300>登录</font></a>】</b><?php endif; ?> </td>
          </tr>
          <tr>
            <td align=right height="30">电话(手机)：</td>
            <td height="30"><input type="text" name="tel" value="<?php echo $this->_var['consignee']['tel']; ?>" size=15>
              <font color=#ff3300>(必填) </font> 请填写有效联系电话或手机</td>
          </tr>
          <tr>
            <td height="30" align=right>配送区域：</td>
            <td style="padding-left:7px">
              <select name="country" id="selCountries_0" onchange="region.changed(this, 1, 'selProvinces_0')" style="border:1px solid #ccc;">
                <option value="0">请选择国家</option>
                <option value="1" selected>中国</option>
              </select>
              <select name="province" id="selProvinces_0" onchange="region.changed(this, 2, 'selCities_0')" onblur="shippingBox_change(document.forms['theForm'])" style="border:1px solid #ccc;">
                <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
                <?php $_from = $this->_var['shop_province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
                <option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['consignee']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <select name="city" id="selCities_0" onchange="region.changed(this, 3, 'selDistricts_0')"  style="border:1px solid #ccc;">
                <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
                <?php $_from = $this->_var['shop_city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
                <option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['consignee']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <select name="district" id="selDistricts_0"  <?php if (! $this->_var['shop_district_list']): ?>style="display:none"<?php endif; ?> style="border:1px solid #ccc;">
                <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
                <?php $_from = $this->_var['shop_district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
                <option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['consignee']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select><input type="hidden" name="consignee_post" value="1">
              <input name="address_id" type="hidden" value="<?php echo $this->_var['consignee']['address_id']; ?>" />
              <font color=#ff3300>(必填) </font> </td>
          </tr>
          <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
          <tr>
            <td height="30" align=right>收货地址：</td>
            <td height="30"><input type="text" name="address" value="<?php echo htmlspecialchars($this->_var['consignee']['address']); ?>" size=45>
              <font color=#ff3300>(必填) </font> 请详细填写收货地址，便于及时、准确的收发货</td>
          </tr>
          <?php endif; ?>
          <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
          <tr>
            <td align=right valign=top>订单附言：</td>
            <td style="padding-left:7px"><textarea name="postscript" rows=3 cols=70></textarea>
            </td>
          </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>
    <div class="blank"></div>
    <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['shipping_method']; ?><font id="shippingBox_msg" style="font-weight:normal;color:#00c; margin-left:30px">注：请先选择配送区域（省市县），再选择配送方式</font></span></h6>
      <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#fff" id="shippingTable" style="border:1px solid #eee;background-color:#FFFFFF">
        <tr>
          <td colspan="6" bgcolor="#ffffff" align="left" style="background-color:#FFFFFF">
		  <div  id="shippingBox">
              <table width="100%"  cellpadding="0" cellspacing="0"  style="border:1px solid #FFFFFF">
                <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');$this->_foreach['shipping_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping_list']['total'] > 0):
    foreach ($_from AS $this->_var['shipping']):
        $this->_foreach['shipping_list']['iteration']++;
?>
                <tr>
                  <td width="30%" height=25  valign=top><input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>"  supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" />
                    <?php echo $this->_var['shipping']['shipping_name']; ?> 
                    [<?php echo $this->_var['shipping']['format_shipping_fee']; ?>] </td>
                  <td width="70%" valign=top> <?php echo $this->_var['shipping']['shipping_desc']; ?> </td>
                </tr>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </table>
            </div>
			</td>
        </tr>
        <tr style="display:none;">
          <td colspan="6" bgcolor="#ffffff" align="right"><label for="ECS_NEEDINSURE">
            <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
            <?php echo $this->_var['lang']['need_insure']; ?> </label></td>
        </tr>
      </table>
    </div>
    <div class="blank"></div>
    <?php else: ?>
    <input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>
    <?php endif; ?>
    <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['payment_method']; ?></span></h6>
      <div style="border:1px solid #eee;margin-top:5px;">
        <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#fff" id="paymentTable" style="border:0px solid #eee;background-color:#FFFFFF">
          <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
          
          <tr style="border-bottom:1px solid #CCCCCC">
            <td valign="top" height=25 width="20%" bgcolor="#ffffff"><input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>"  isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/>
              <?php echo $this->_var['payment']['pay_name']; ?></td>
            <td valign="top"  bgcolor="#ffffff"><?php echo $this->_var['payment']['pay_desc']; ?></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
      </div>
    </div>
    <?php else: ?>
    <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
    <?php endif; ?>
    <div class="blank"></div>
    <?php if ($this->_var['pack_list']): ?>
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['goods_package']; ?></span></h6>
      <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="packTable">
        <tr>
          <th width="5%" scope="col" bgcolor="#ffffff">&nbsp;</th>
          <th width="35%" scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['name']; ?></th>
          <th width="22%" scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['price']; ?></th>
          <th width="22%" scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['free_money']; ?></th>
          <th scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['img']; ?></th>
        </tr>
        <tr>
          <td valign="top" bgcolor="#ffffff"><input type="radio" name="pack" value="0" <?php if ($this->_var['order']['pack_id'] == 0): ?>checked="true"<?php endif; ?> onClick="selectPack(this)" /></td>
          <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['no_pack']; ?></strong></td>
          <td valign="top" bgcolor="#ffffff">&nbsp;</td>
          <td valign="top" bgcolor="#ffffff">&nbsp;</td>
          <td valign="top" bgcolor="#ffffff">&nbsp;</td>
        </tr>
        <?php $_from = $this->_var['pack_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pack');if (count($_from)):
    foreach ($_from AS $this->_var['pack']):
?>
        <tr>
          <td valign="top" bgcolor="#ffffff"><input type="radio" name="pack" value="<?php echo $this->_var['pack']['pack_id']; ?>" <?php if ($this->_var['order']['pack_id'] == $this->_var['pack']['pack_id']): ?>checked="true"<?php endif; ?> onClick="selectPack(this)" />
          </td>
          <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['pack']['pack_name']; ?></strong></td>
          <td valign="top" bgcolor="#ffffff" align="right"><?php echo $this->_var['pack']['format_pack_fee']; ?></td>
          <td valign="top" bgcolor="#ffffff" align="right"><?php echo $this->_var['pack']['format_free_money']; ?></td>
          <td valign="top" bgcolor="#ffffff" align="center"><?php if ($this->_var['pack']['pack_img']): ?>
            <a href="data/packimages/img/<?php echo $this->_var['pack']['pack_img']; ?>" target="_blank" class="f6"><?php echo $this->_var['lang']['view']; ?></a>
            <?php else: ?>
            <?php echo $this->_var['lang']['no']; ?>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table>
    </div>
    <div class="blank"></div>
    <?php endif; ?>
    <?php if ($this->_var['card_list']): ?>
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['goods_card']; ?></span></h6>
      <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd" id="cardTable">
        <tr>
          <th bgcolor="#ffffff" width="5%" scope="col">&nbsp;</th>
          <th bgcolor="#ffffff" width="35%" scope="col"><?php echo $this->_var['lang']['name']; ?></th>
          <th bgcolor="#ffffff" width="22%" scope="col"><?php echo $this->_var['lang']['price']; ?></th>
          <th bgcolor="#ffffff" width="22%" scope="col"><?php echo $this->_var['lang']['free_money']; ?></th>
          <th bgcolor="#ffffff" scope="col"><?php echo $this->_var['lang']['img']; ?></th>
        </tr>
        <tr>
          <td bgcolor="#ffffff" valign="top"><input type="radio" name="card" value="0" <?php if ($this->_var['order']['card_id'] == 0): ?>checked="true"<?php endif; ?> onClick="selectCard(this)" /></td>
          <td bgcolor="#ffffff" valign="top"><strong><?php echo $this->_var['lang']['no_card']; ?></strong></td>
          <td bgcolor="#ffffff" valign="top">&nbsp;</td>
          <td bgcolor="#ffffff" valign="top">&nbsp;</td>
          <td bgcolor="#ffffff" valign="top">&nbsp;</td>
        </tr>
        <?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
        <tr>
          <td valign="top" bgcolor="#ffffff"><input type="radio" name="card" value="<?php echo $this->_var['card']['card_id']; ?>" <?php if ($this->_var['order']['card_id'] == $this->_var['card']['card_id']): ?>checked="true"<?php endif; ?> onClick="selectCard(this)"  />
          </td>
          <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['card']['card_name']; ?></strong></td>
          <td valign="top" align="right" bgcolor="#ffffff"><?php echo $this->_var['card']['format_card_fee']; ?></td>
          <td valign="top" align="right" bgcolor="#ffffff"><?php echo $this->_var['card']['format_free_money']; ?></td>
          <td valign="top" align="center" bgcolor="#ffffff"><?php if ($this->_var['card']['card_img']): ?>
            <a href="data/cardimages/img/<?php echo $this->_var['card']['card_img']; ?>" target="_blank" class="f6"><?php echo $this->_var['lang']['view']; ?></a>
            <?php else: ?>
            <?php echo $this->_var['lang']['no']; ?>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <tr>
          <td bgcolor="#ffffff"></td>
          <td bgcolor="#ffffff" valign="top"><strong><?php echo $this->_var['lang']['bless_note']; ?>:</strong></td>
          <td bgcolor="#ffffff" colspan="3"><textarea name="card_message" cols="60" rows="3" style="width:auto; border:1px solid #ccc;"><?php echo htmlspecialchars($this->_var['order']['card_message']); ?></textarea></td>
        </tr>
      </table>
    </div>
    <div class="blank"></div>
    <?php endif; ?>
    <div class="flowBox" style="display:none">
      <h6><span><?php echo $this->_var['lang']['other_info']; ?></span></h6>
      <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <?php if ($this->_var['allow_use_surplus']): ?>
        <tr>
          <td width="20%" bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['use_surplus']; ?>: </strong></td>
          <td bgcolor="#ffffff"><input name="surplus" type="text" class="inputBg" id="ECS_SURPLUS" size="10" value="<?php echo empty($this->_var['order']['surplus']) ? '0' : $this->_var['order']['surplus']; ?>" onBlur="changeSurplus(this.value)" <?php if ($this->_var['disable_surplus']): ?>disabled="disabled"<?php endif; ?> />
            <?php echo $this->_var['lang']['your_surplus']; ?><?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?> <span id="ECS_SURPLUS_NOTICE" class="notice"></span></td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_var['allow_use_integral']): ?>
        <tr>
          <td bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['use_integral']; ?></strong></td>
          <td bgcolor="#ffffff"><input name="integral" type="text" class="input" id="ECS_INTEGRAL" onBlur="changeIntegral(this.value)" value="<?php echo empty($this->_var['order']['integral']) ? '0' : $this->_var['order']['integral']; ?>" size="10" />
            <?php echo $this->_var['lang']['can_use_integral']; ?>:<?php echo empty($this->_var['your_integral']) ? '0' : $this->_var['your_integral']; ?> <?php echo $this->_var['points_name']; ?>，<?php echo $this->_var['lang']['noworder_can_integral']; ?><?php echo $this->_var['order_max_integral']; ?>  <?php echo $this->_var['points_name']; ?>. <span id="ECS_INTEGRAL_NOTICE" class="notice"></span></td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_var['allow_use_bonus']): ?>
        <tr>
          <td bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['use_bonus']; ?>:</strong></td>
          <td bgcolor="#ffffff"> <?php echo $this->_var['lang']['select_bonus']; ?>
            <select name="bonus" onChange="changeBonus(this.value)" id="ECS_BONUS" style="border:1px solid #ccc; height:22px">
              <option value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['please_select']; ?></option>
              <?php $_from = $this->_var['bonus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
              <option value="<?php echo $this->_var['bonus']['bonus_id']; ?>" <?php if ($this->_var['order']['bonus_id'] == $this->_var['bonus']['bonus_id']): ?>selected<?php endif; ?>><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
            <?php echo $this->_var['lang']['input_bonus_no']; ?>
            <input name="bonus_sn" type="text" class="inputBg" size="15" value="<?php echo $this->_var['order']['bonus_sn']; ?>" style="height:18px" />
            <input name="validate_bonus" type="button" class="bnt_blue_1" value="<?php echo $this->_var['lang']['validate_bonus']; ?>" onClick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)" style="vertical-align:middle;" />
          </td>
        </tr>
        <?php endif; ?>
        <?php if ($this->_var['inv_content_list']): ?>
        <tr>
          <td bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['invoice']; ?>:</strong>
            <input name="need_inv" type="checkbox"  class="input" id="ECS_NEEDINV" onClick="changeNeedInv()" value="1" <?php if ($this->_var['order']['need_inv']): ?>checked="true"<?php endif; ?> />
          </td>
          <td bgcolor="#ffffff"><?php if ($this->_var['inv_type_list']): ?>
            <?php echo $this->_var['lang']['invoice_type']; ?>
            <select name="inv_type" id="ECS_INVTYPE" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?> onChange="changeNeedInv()" style="border:1px solid #ccc;">
              
                <?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?>
            </select>
            <?php endif; ?>
            <?php echo $this->_var['lang']['invoice_title']; ?>
            <input name="inv_payee" type="text"  class="input" id="ECS_INVPAYEE" size="20" <?php if (! $this->_var['order']['need_inv']): ?>disabled="true"<?php endif; ?> value="<?php echo $this->_var['order']['inv_payee']; ?>" onBlur="changeNeedInv()" />
            <?php echo $this->_var['lang']['invoice_content']; ?>
            <select name="inv_content" id="ECS_INVCONTENT" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?>  onchange="changeNeedInv()" style="border:1px solid #ccc;">
              

                <?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>

                
            </select></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['order_postscript']; ?>:</strong></td>
          <td bgcolor="#ffffff"><textarea name="postscript" cols="80" rows="3" id="postscript" style="border:1px solid #ccc;"><?php echo htmlspecialchars($this->_var['order']['postscript']); ?></textarea></td>
        </tr>
        <?php if ($this->_var['how_oos_list']): ?>
        <tr>
          <td bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['booking_process']; ?>:</strong></td>
          <td bgcolor="#ffffff"><?php $_from = $this->_var['how_oos_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('how_oos_id', 'how_oos_name');if (count($_from)):
    foreach ($_from AS $this->_var['how_oos_id'] => $this->_var['how_oos_name']):
?>
            <label>
            <input name="how_oos" type="radio" value="<?php echo $this->_var['how_oos_id']; ?>" <?php if ($this->_var['order']['how_oos'] == $this->_var['how_oos_id']): ?>checked<?php endif; ?> onClick="changeOOS(this)" />
            <?php echo $this->_var['how_oos_name']; ?></label>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </td>
        </tr>
        <?php endif; ?>
      </table>
    </div>
    <div class="blank"></div>
    <div class="flowBox">
      <h6><span><?php echo $this->_var['lang']['fee_total']; ?></span></h6>
      <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#fffbe0" style="border:1px solid #d5d5d5;">
        <tr>
          <td align=left style="padding:10px 0 10px 20px"><?php if ($this->_var['allow_use_bonus']): ?>
		  <?php echo $this->_var['lang']['select_bonus']; ?>
                <select name="bonus" onchange="changeBonus(this.value)" id="ECS_BONUS" style="border:1px solid #ccc;">
                  <option value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['please_select']; ?></option>
                  <?php $_from = $this->_var['bonus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
                  <option value="<?php echo $this->_var['bonus']['bonus_id']; ?>" <?php if ($this->_var['order']['bonus_id'] == $this->_var['bonus']['bonus_id']): ?>selected<?php endif; ?>><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </select>
            <?php echo $this->_var['lang']['input_bonus_no']; ?>
            <input name="bonus_sn" type="text" class="inputBg" size="15" value="<?php echo $this->_var['order']['bonus_sn']; ?>"/>
            <input name="validate_bonus" type="button" style="cursor:pointer;" value="使用红包" onclick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)" />
            <?php endif; ?></td>
        </tr>
      </table>
      <?php echo $this->fetch('library/flow_order_total.lbi'); ?>
      <div align="center" style="margin:8px auto; text-align:center">
        <input type="submit" name="submit" value="" class="pre_submit" style="cursor:pointer"  />
        <input type="hidden" name="step" value="done" />
      </div>
    </div>
  </form>
  <?php endif; ?>
  <?php if ($this->_var['step'] == "done"): ?>
  <script language="javascript">
function get_order_amount()
{
  Ajax.call('flow.php?step=get_order_amount', 'order_id=' + <?php echo $this->_var['order']['order_id']; ?>, orderAmountResponse, 'GET', 'JSON');
}

function orderAmountResponse(result)
{
	document.getElementById("sp_order_amount").innerHTML = result.formated_order_amount;
	document.getElementById("sp_pay_online").innerHTML = result.pay_online;
}
  </script>
  
  <div class="w fl_header clearfix"> <a class="Left" href="/"><img class="fl_logo" src="themes/meilele/images/blank.gif" /></a>
    <div class="Right fl_step fl_step_done"></div>
  </div>
  
  <div class="flowBox">
    <h6 style="text-align:center; height:30px; line-height:30px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></h6>
    <table width="100%" align="center" border="0" cellpadding="15" cellspacing="0" bgcolor="#fff" style="border:1px solid #ddd; margin:20px auto;" >
      <tr>
        <td align="center" bgcolor="#FFFFFF">
		<table>
		<?php if ($this->_var['order']['shipping_name']): ?>
		<tr><td align="left"> <?php echo $this->_var['lang']['select_shipping']; ?>: <strong><?php echo $this->_var['order']['shipping_name']; ?></strong></td></tr>
		<?php endif; ?>
		<tr><td align="left"><?php echo $this->_var['lang']['select_payment']; ?>: <strong><?php echo $this->_var['order']['pay_name']; ?></strong></td></tr>
		<tr><td align="left"><?php echo $this->_var['lang']['order_amount']; ?>: <strong style="color:#FF0000; font-size:18px" id="sp_order_amount"><?php echo $this->_var['total']['amount_formated']; ?></strong>
		<?php if ($this->_var['pay_online']): ?>
		<input type="button" name="submit" value="更新订单总额" style="cursor:pointer; margin-left:15px"  onClick="get_order_amount()"  /> 
		<?php endif; ?>
		</td></tr>
		</table>

		  
		   </td>
      </tr>
	  <tr>
        <td align="center"><div style="height:1px; background-color:#CCCCCC; overflow:hidden; width:100%"></div></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><?php echo $this->_var['order']['pay_desc']; ?></td>
      </tr>
      <?php if ($this->_var['pay_online']): ?>
      
      <tr>
        <td align="center" bgcolor="#FFFFFF" id="sp_pay_online"><?php echo $this->_var['pay_online']; ?></td>
      </tr>
      <?php endif; ?>
    </table>
    <?php if ($this->_var['virtual_card']): ?>
    <div style="text-align:center;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
      <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
      <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
      <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
      <ul style="list-style:none;padding:0;margin:0;clear:both">
        <?php if ($this->_var['card']['card_sn']): ?>
        <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span> </li>
        <?php endif; ?>
        <?php if ($this->_var['card']['card_password']): ?>
        <li style="margin-right:50px;float:left;"> <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span> </li>
        <?php endif; ?>
        <?php if ($this->_var['card']['end_date']): ?>
        <li style="float:left;"> <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?> </li>
        <?php endif; ?>
      </ul>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <?php endif; ?>
    <p style="text-align:center; margin-bottom:20px;"><?php echo $this->_var['order_submit_back']; ?></p>
  </div>
  <?php endif; ?>
  <?php if ($this->_var['step'] == "login"): ?>
  <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,user.js')); ?>
  <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        
        </script>
  
  <div class="w fl_header clearfix"> <a class="Left" href="/"><img class="fl_logo" src="themes/meilele/images/blank.gif"></a>
    <div class="Right fl_step fl_step_pre_checkout"></div>
  </div>
  <div class="flowBox">
    <table width="100%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
      <tr>
        <td width="50%" valign="top" bgcolor="#ffffff" style="padding-top:5px; vertical-align:text-top"><h6 style="margin-top:0px; padding-top:0px; width:96%"><span>用户登录：</span></h6>
          <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onSubmit="return checkLoginForm(this)">
            <table width="90%" border="0" cellpadding="8" cellspacing="1">
              <tr style="height:50px">
                <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['username']; ?></strong></div></td>
                <td bgcolor="#ffffff"><input name="username" type="text" class="inputBg" id="username" /></td>
              </tr>
              <tr>
                <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></div></td>
                <td bgcolor="#ffffff"><input name="password" class="inputBg" type="password" style="width:149px" />
                  <a href="user.php?act=get_password" class="f6">忘记密码？</a> </td>
              </tr>
              <?php if ($this->_var['enabled_login_captcha']): ?>
              <tr>
                <td bgcolor="#ffffff"><div align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></div></td>
                <td bgcolor="#ffffff" style="padding-left:0px"><table align="left">
                    <tr>
                      <td style="padding-left:0px"><input type="text" size="8" name="captcha" class="inputBg"  style="width:45px; margin-left:0px" /></td>
                      <td><img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()"  /></td>
                    </tr>
                  </table></td>
              </tr>
              <?php endif; ?>
              <tr>
                <td bgcolor="#ffffff"></td>
                <td bgcolor="#ffffff"><input type="checkbox" value="1" name="remember" id="remember" />
                  <label for="remember"><?php echo $this->_var['lang']['remember']; ?></label></td>
              </tr>
              <tr>
                <td bgcolor="#ffffff"></td>
                <td bgcolor="#ffffff"><input type="submit" class="bnt_blue_1" name="login" value=" <?php echo $this->_var['lang']['forthwith_login']; ?> " />
                  <?php if ($this->_var['anonymous_buy'] == 1): ?>
                  <input type="button" class="bnt_blue_2" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" onClick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                  <?php endif; ?>
                  <input name="act" type="hidden" value="signin" />
                </td>
              </tr>
            </table>
          </form></td>
        <td valign="top" bgcolor="#ffffff"><h6 style="margin-top:0px; padding-top:0px; width:96%"><span>用户注册：</span></h6>
          <form action="flow.php?step=login" method="post" name="formUser" id="registerForm" onSubmit="return checkSignupForm(this)">
            <table width="98%" border="0" cellpadding="8" cellspacing="1" class="table" style="margin-top:15px">
              <tr>
                <td bgcolor="#ffffff" align="right" width="25%"><strong><?php echo $this->_var['lang']['username']; ?></strong></td>
                <td bgcolor="#ffffff"><input name="username" type="text" class="inputBg" id="username" onBlur="is_registered(this.value);" />
                  <br />
                  <div id="username_notice" style="color:#FF0000; padding-top:10px"></div></td>
              </tr>
              <tr>
                <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['email_address']; ?></strong></td>
                <td bgcolor="#ffffff"><input name="email" type="text" class="inputBg" id="email" onBlur="checkEmail(this.value);" />
                  <br />
                  <div id="email_notice" style="color:#FF0000; padding-top:10px"></div></td>
              </tr>
              <tr>
                <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></td>
                <td bgcolor="#ffffff"><input name="password" class="inputBg" type="password" id="password1" onBlur="check_password(this.value);" onKeyUp="checkIntensity(this.value)"  style="width:149px"/>
                  <br />
                  <div style="color:#FF0000; padding-top:10px" id="password_notice"></div></td>
              </tr>
              <tr>
                <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['confirm_password']; ?></strong></td>
                <td bgcolor="#ffffff"><input name="confirm_password" class="inputBg" type="password" id="confirm_password" onBlur="check_conform_password(this.value);"  style="width:149px"/>
                  <br />
                  <div style="color:#FF0000; padding-top:10px" id="conform_password_notice"></div></td>
              </tr>
              <?php if ($this->_var['enabled_register_captcha']): ?>
              <tr>
                <td bgcolor="#ffffff" align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></td>
                <td bgcolor="#ffffff"><input type="text" size="8" name="captcha" class="inputBg"  style="width:45px"/>
                  <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </td>
              </tr>
              <?php endif; ?>
              <tr>
                <td bgcolor="#ffffff" align="right"></td>
                <td bgcolor="#ffffff"><input type="submit" name="Submit" class="bnt_blue_1" value="<?php echo $this->_var['lang']['forthwith_register']; ?>" />
                  <input name="act" type="hidden" value="signup" /></td>
              </tr>
            </table>
          </form></td>
      </tr>
      <?php if ($this->_var['need_rechoose_gift']): ?>
      <tr>
        <td colspan="2" align="center" style="border-top:1px #ccc solid; padding:5px; color:red;"><?php echo $this->_var['lang']['gift_remainder']; ?></td>
      </tr>
      <?php endif; ?>
    </table>
  </div>
  
  <?php endif; ?>
</div>
<div class="blank5"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
</html>
