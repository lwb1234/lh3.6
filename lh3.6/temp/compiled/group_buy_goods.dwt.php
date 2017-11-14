<!DOCTYPE HTML>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<link rel="stylesheet" href="themes/meilele/css/tuangou_detail.min.css?1030" type="text/css" media="screen" title="no title" charset="utf-8"/>
<script src="themes/meilele/js/common.min.js?0905"></script>
<script src="themes/meilele/js/jq.js"></script>
<script src="themes/meilele/js/jquery.json.min.js"></script>
</head>
<body>
<script type="text/javascript">
			window.ISSCREENWIDTH = false;
			(function() {
				//return;
				var screenWidth = window.screen.width;
				if (screenWidth >= 1280) {
					document.body.className = "root_body";
					window.ISSCREENWIDTH = true;
				}
			})()
		</script>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="tugouWrap w">
  <div class="tg_pos"> <?php echo $this->fetch('library/ur_here.lbi'); ?> </div>
  <div class="tg_dtl_wrap w clearfix">
    <div class="tg_dtl_Left Left">
      <div class="tg_dtl_main">
        <div class="dtl_main_top clearfix">
          <h1 class="Left"><a target="_blank" title="<?php if ($this->_var['group_buy']['group_title']): ?><?php echo $this->_var['group_buy']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy']['act_name']; ?><?php endif; ?>" href="<?php echo $this->_var['gb_goods']['url']; ?>"><?php if ($this->_var['group_buy']['group_title']): ?><?php echo $this->_var['group_buy']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy']['act_name']; ?><?php endif; ?> </a></h1>
          <p class="Right"> 编号：<?php echo $this->_var['gb_goods']['goods_sn']; ?> </p>
        </div>
        <span id="JS_user_limit" style="display:none">10000</span>
        <p class="dtl_main_tishi mt15"> （<?php echo $this->_var['gb_goods']['goods_brief']; ?>） </p>
        <div class="dtl_main_info clearfix">
          <form action="group_buy.php?act=buy" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
		  <input type="hidden" name="group_buy_id" value="<?php echo $this->_var['group_buy']['group_buy_id']; ?>" />
            <div class="main_infoL Left" id="JS_time" data-starTime="<?php echo $this->_var['group_buy']['start_date']; ?>" data-endTime="<?php echo $this->_var['group_buy']['end_date']; ?>" data-RemainNum="35"> <a title="" href="javascript:ECS_FORMBUY.submit();" class="infobnr" id="JS_bnr_state"><b>&yen;</b><?php echo $this->_var['group_buy']['formated_cur_price']; ?> </a>
			
              <div class="numbox"> <span>我要买：</span><a href="javascript:;" onClick="TG.jianNum();" class="jian"><b></b></a>
                <input type="text" id="JS_buy_num" value="1" class="val" name="number">
                <a href="javascript:;" onClick="TG.addNum();" class="jia"><b></b></a> </div>
				<?php if ($this->_var['specification']): ?>
				<div class="btnbox" style="width:308px;margin:0px auto 0 auto;padding-top:15px;padding-bottom:5px;text-align:center;border-bottom:1px solid #f4e3cb">
			<table width="100%" border="0" cellpadding="5" cellspacing="1" style="background-color:RGB(255,249,239)">
              <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
              <tr>
                <td width="40%"  style="height:25px;background-color:RGB(255,249,239)" align="right"><?php echo $this->_var['spec']['name']; ?></td>
                <td width="60%"  align="left" style="padding-left:10px;background-color:RGB(255,249,239)">

                    <select name="spec_<?php echo $this->_var['spec_key']; ?>" style="border:1px solid #ccc;">
                    <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                    <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> </option>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </select>

                </td>
              </tr>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

            </table>
			</div>
			<?php endif; ?>
              <div class="infoprc"> <span>原价 <br>
                <del><?php echo $this->_var['group_buy']['market_price']; ?></del></span> <span class="line">折扣 <br>
                <b><?php echo $this->_var['group_buy']['t_discount']; ?>折</b></span> <span class="line">节省 <br>
                <b><?php echo $this->_var['group_buy']['formated_rebate_price']; ?></b></span> </div>
              <div class="buyed"> 已团购 <b id="JS_already_number"><?php if ($this->_var['group_buy']['isg_rs'] == 1): ?><?php echo $this->_var['group_buy']['group_rs']; ?><?php else: ?><?php if ($this->_var['group_buy']['isg_rs'] == 1): ?><?php echo $this->_var['group_buy']['group_rs']; ?><?php else: ?><?php echo $this->_var['group_buy']['valid_goods']; ?><?php endif; ?><?php endif; ?></b><span>件</span> <br>
                <span class="" id="JS_only_limit">
                <?php if ($this->_var['group_buy']['status'] == 0): ?>
                <?php echo $this->_var['lang']['gbs_pre_start']; ?>
                <?php elseif ($this->_var['group_buy']['status'] == 1): ?>
                <p id="leftTime" class="timecolor"> </p>
                <?php elseif ($this->_var['group_buy']['status'] == 2): ?>
                <p><?php echo $this->_var['lang']['gbs_finished']; ?> <?php echo $this->_var['lang']['gb_cur_price']; ?> <?php echo $this->_var['group_buy']['formated_cur_price']; ?> <br />
                  <?php echo $this->_var['lang']['gb_valid_goods']; ?> <?php if ($this->_var['group_buy']['isg_rs'] == 1): ?><?php echo $this->_var['group_buy']['group_rs']; ?><?php else: ?><?php echo $this->_var['group_buy']['valid_goods']; ?><?php endif; ?></p>
                <?php elseif ($this->_var['group_buy']['status'] == 3): ?>
                <p><?php echo $this->_var['lang']['gbs_succeed']; ?>
                  <?php echo $this->_var['lang']['gb_final_price']; ?> <?php echo $this->_var['group_buy']['formated_trans_price']; ?><br />
                  <?php echo $this->_var['lang']['gb_final_amount']; ?> <?php echo $this->_var['group_buy']['trans_amount']; ?></p>
                <?php elseif ($this->_var['group_buy']['status'] == 4): ?>
                <p><?php echo $this->_var['lang']['gbs_fail']; ?></p>
                <?php endif; ?>
                </span> </div>
              <div class="timebox"> <i></i><span class="timer" id="JS_tg_timer"><b>0</b>天<b>0</b>时<b>0</b>分<b>0</b>秒</span> </div>
              <div class="btnbox"> <a title="查看商品详情" target="_blank" href="<?php echo $this->_var['gb_goods']['url']; ?>" class="link">查看商品详情</a> </div>
            </div>
          </form>
          <div class="main_infoR Right">
            <p> <a title="<?php echo htmlspecialchars($this->_var['group_buy']['act_name']); ?> " target="_blank" href="<?php echo $this->_var['gb_goods']['url']; ?>"><img width="600" height="400" src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['group_buy']['group_img']; ?>" /></a> </p>
            <div class="infoshare clearfix">
              <div class="Right">
                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <a href="#" title="分享到QQ空间" class="bds_qzone"></a> <a href="#" title="分享到新浪微博" class="bds_tsina"></a> <a href="#" title="分享到腾讯微博" class="bds_tqq"></a> <a href="#" title="分享到人人网" class="bds_renren"></a> <a href="#" title="分享到复制网址" class="bds_copy"></a> <span class="bds_more"></span> </div>
              </div>
              <p class="Right"> 分享到： </p>
            </div>
          </div>
        </div>
      </div>
      <div class="tg_dtl_box" style="width: auto;">
        <div class="title"> <b class="f14">本单详情</b> </div>
        <div class="content infos"> <?php echo $this->_var['group_buy']['group_buy_desc']; ?> </div>
      </div>
      <div id="pos_wrap">
        <div class="tg_dtl_Right Right">
          <div class="tg_dtlR">
            <h2 class="f14">团购商品热销排名</h2>
            <ul class="list">
              <?php $_from = $this->_var['gb_list_hot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group_buy_0_10866500_1509583834');$this->_foreach['hotcun'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hotcun']['total'] > 0):
    foreach ($_from AS $this->_var['group_buy_0_10866500_1509583834']):
        $this->_foreach['hotcun']['iteration']++;
?>
              <li>
                <p> <a href="<?php echo $this->_var['group_buy_0_10866500_1509583834']['url']; ?>" title="<?php if ($this->_var['group_buy_0_10866500_1509583834']['group_title']): ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['act_name']; ?><?php endif; ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['group_buy_0_10866500_1509583834']['group_img']; ?>" width="180" height="118" alt="<?php if ($this->_var['group_buy_0_10866500_1509583834']['group_title']): ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['act_name']; ?><?php endif; ?>"/></a> </p>
                <p class="name"> <a href="<?php echo $this->_var['group_buy_0_10866500_1509583834']['url']; ?>" title="<?php if ($this->_var['group_buy_0_10866500_1509583834']['group_title']): ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['act_name']; ?><?php endif; ?>" target="_blank"><?php if ($this->_var['group_buy_0_10866500_1509583834']['group_title']): ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['group_title']; ?><?php else: ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['act_name']; ?><?php endif; ?></a> </p>
                <p class="tprc"> 团购价:<span class="yen">¥
                  <?php $_from = $this->_var['group_buy_0_10866500_1509583834']['price_ladder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['foo']['iteration']++;
?>
                  <?php if (($this->_foreach['foo']['iteration'] == $this->_foreach['foo']['total'])): ?>
                  <?php echo $this->_var['item']['price']; ?>
                  <?php endif; ?>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </span> </p>
                <p class="prc clearfix"> <span class="Left">原价:<del class="yen"><?php echo $this->_var['group_buy_0_10866500_1509583834']['market_price']; ?></del></span><span class="Right">已团购<b><?php if ($this->_var['group_buy_0_10866500_1509583834']['isg_rs'] == 1): ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['group_rs']; ?><?php else: ?><?php echo $this->_var['group_buy_0_10866500_1509583834']['cur_amount']; ?><?php endif; ?></b>件</span> </p>
              </li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
          </div>
        </div>
        <div class="tg_dtl_box Left">
          <div class="title"> <b class="f14">宝贝评价</b> </div>
          <script language="javascript">
                 var comment_rank = "<?php 
$k = array (
  'name' => 'comments_rank',
  'id' => $this->_var['gb_goods']['goods_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>";
			</script>
      <div class="content pingjia" id="JS_Tab_body_pingjia"><div id="ECS_COMMENT"> <?php 
$k = array (
  'name' => 'comments',
  'type' => '0',
  'id' => $this->_var['gb_goods']['goods_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div></div>
        </div>
        <div class="tg_dtl_brn Left"> <a href="javascript:;" onClick="ECS_FORMBUY.submit();" class="infobnr" id="JS_down_bnr_state"><b>&yen;</b><?php echo $this->_var['group_buy']['formated_cur_price']; ?></a>
          <p class="jiesheng"> 节省<b><?php echo $this->_var['group_buy']['formated_rebate_price']; ?></b>元，数量有限，请抓紧时间下单！ </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script src="themes/meilele/js/back_to_top.min.js?1127"></script>
<script type="text/javascript" src="themes/meilele/js/tuangou_detail.min.js?1030"></script>
<script type="text/javascript">
			var len = document.images.length, src;
			for (var i = 0; i < len; i++) {
				img = document.images[i];
				src = img.getAttribute("data-src");
				if (src) {
					img.src = src;
					img.removeAttribute("data-src");
				}
			}

			
			function changeHeight (){
    			if(window.ISSCREENWIDTH){
    				var rightDom = $(".tg_dtl_Right");

    				rightDom.css({
    					'position': 'absolute',
    					'top': 0,
    					'right': 0
    				});
    				var leftDom = $(".tg_dtl_Left");
    				var leftHeight = leftDom.height();
    				var RightHeight = rightDom.height();
    			    if(RightHeight > leftHeight){
        			    leftDom.height(RightHeight);
        			}
    			}
			}

			changeHeight ();
			c = $('#JS_time').attr('data-starTime');
			a = $('#JS_time').attr('data-endTime');
            TG.showTime(c, a);

		</script>
<script type="text/javascript" id="bdshare_js" data="type=tools"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
		</script>
</body>
</html>
<!--
GERMANY:2013-11-28 16:02:20
-->
