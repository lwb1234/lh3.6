<?php if ($this->_var['top_art_cat_id'] != 1): ?>
<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css" />
<script src="themes/meilele/js/jq.js?1119"></script>
<link href="themes/meilele/css/article.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<?php $_from = get_advlist_by_id(8); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>

  <div class="w mt10 mb10 top_banner" style="height: 60px; overflow: hidden;" id="JS_banner"><div id="JS_banner_in"><a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" style="display:block;height:60px;background:url(<?php echo $this->_var['ad']['image']; ?>) center 0 no-repeat;"><img style="background:none" height="60" width="100%"></a></div></div>

<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div id="subpage_nav" class="w">
  <div class="position"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>
</div>
<div class="w mt10 clearfix">
  <div class="sub_main clearfix">
    <div id="art_content" class="main">
      <h1 class="title"><?php echo htmlspecialchars($this->_var['article']['title']); ?> </h1>
      <div class="bd_share_and_time clearfix">
        <div class="note Left">来源：<?php echo htmlspecialchars($this->_var['article']['author']); ?>&nbsp;&nbsp;  时间：<?php echo $this->_var['article']['add_time']; ?>&nbsp;&nbsp;</div>
        <div class="share Right">
          <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="shareCount"></a> </div>
        </div>
      </div>
      <div class="summary"> <span class="daodu_ico"></span>
        <div><?php echo htmlspecialchars($this->_var['article']['description']); ?></div>
        <p>关键字: <?php echo htmlspecialchars($this->_var['article']['keywords']); ?></p>
      </div>
      <div class="content"> 
	  
	  <?php if ($this->_var['article']['content']): ?>
          <?php echo $this->_var['article']['content']; ?>
         <?php endif; ?>
      </div>
    </div>
    
    <ul class="art_page">
	<?php if ($this->_var['prev_article']): ?>
      <li><span>上一篇：</span><span><a href="<?php echo $this->_var['prev_article']['url']; ?>" class="f6"><?php echo $this->_var['prev_article']['title']; ?></a></span></li>
	 <?php endif; ?> 
	 <?php if ($this->_var['next_article']): ?> 
      <li><span>下一篇：</span><span><a href="<?php echo $this->_var['next_article']['url']; ?>" class="f6"><?php echo $this->_var['next_article']['title']; ?></a></span></li>
	  <?php endif; ?>
    </ul>
    
    <div class="art_relative">
      <div class="aTitle">最新文章</div>
      
      <ul class="clearfix clear">
	  <?php $_from = get_cat_arts_12(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_0_34477800_1510015670');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article_0_34477800_1510015670']):
        $this->_foreach['artciles_list']['iteration']++;
?>
        <li><i>&bull;</i><span><a href="<?php echo $this->_var['article_0_34477800_1510015670']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article_0_34477800_1510015670']['title']); ?>"><?php echo $this->_var['article_0_34477800_1510015670']['short_title']; ?></a></span></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
    </div>
    <div class="comment_info clear" style="display:none">
      <div class="aTitle"><span>网友评论：</span>
        <!--<span class="count">(共<em id="JS_total_page">0</em>条记录)</span>-->
      </div>
      <div class="body">
        <div id="JS_comment_list"> 暂无评论 </div>
        <div id="JS_comment_pager" data-id="9993" data-page="1" class="pager"></div>
      </div>
    </div>
    <div class="comment" style="display:none">
      <h3>我要发表评论：</h3>
      <textarea id="JS_art_content"></textarea>
      <div class="txtInfo"><strong>提示：</strong>你还可以输入<strong id="Js_txtInfo"></strong>个字！</div>
      <p> <span class="Left" id="JS_art_login_status"><a class="red" href="javascript:;" onClick="userLogin();" title="登录">登录</a> | <a href="/user/?act=register" title="注册">注册</a></span><span class="Left"> | 匿名评论请填写邮箱：
        <input id="JS_art_email" type="text">
        ( 邮箱信息不会公开 )</span> <span class="Right"><a class="submit" href="javascript:;" onClick="postComment(this);" data-id="9993"></a></span> </p>
    </div>
  </div>
  <div class="sub_aside">
  <?php $_from = get_advlist_by_id(9); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
  <div id="ad" class="zxFocus current"><a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="undefined"><img src="<?php echo $this->_var['ad']['image']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" height="250" width="300"></a></div>

  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
    <div class="sideMod">
      <div class="header noTab">相关文章</div>
      <ul class="ul body current ">
	  <?php $_from = get_cat_arts_10(11); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_0_34489000_1510015670');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article_0_34489000_1510015670']):
        $this->_foreach['artciles_list']['iteration']++;
?>
        <li class="clearfix"> <i class="<?php if ($this->_foreach['artciles_list']['iteration'] < 4): ?>i1<?php else: ?>i2<?php endif; ?>"> <?php echo $this->_foreach['artciles_list']['iteration']; ?></i> <span><a href="<?php echo $this->_var['article_0_34489000_1510015670']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article_0_34489000_1510015670']['title']); ?>"><?php echo $this->_var['article_0_34489000_1510015670']['short_title']; ?></a></span> </li>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
      
       
	   
      </ul>
    </div>
    <div id="salePromote" class="sideMod">
      <div class="header noTab">相关商品</div>
      <div class="body clearfix" id="JS_tab_body_4">
        <ul id="JS_li_toggle_1" class="ul current clearfix">
		<?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['releated_goods_data']):
?>
          <li class="Left clearfix">
            <div class="list Left">
              <div><a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" target="_blank" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>"> <img src="<?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" width="130" height="86" alt="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" /></a> </div>
              <p><a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" target="_blank" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>"><?php echo sub_str($this->_var['releated_goods_data']['short_name'],10); ?></a><br />
                本站价：<b class="red yen"><?php if ($this->_var['releated_goods_data']['promote_price'] != 0): ?><?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['releated_goods_data']['shop_price']; ?><?php endif; ?></b> </p>
            </div>
          </li>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
		  
        </ul>
        
      </div>
    </div>
    <div class="sideMod">
      <div id="JS_tab_nav_1" class="header noTab clearfix"> <span class="tabNum2 Left">新品特惠</span> <a class="Right more" href="search.php?intro=new" target="_blank" title="更多">更多&raquo;</a> </div>
      <div id="JS_tab_body_1" class="body toggle clearfix">
        <ul id="JS_li_toggle_4" class="ul current">
		<?php $_from = get_cat_new_goods_10(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_new_goods_5'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_new_goods_5']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_new_goods_5']['iteration']++;
?>
          <li class="<?php if ($this->_foreach['get_cat_new_goods_5']['iteration'] < 4): ?>first current<?php endif; ?> clearfix">
            <p class="normal"> <i class="<?php if ($this->_foreach['get_cat_new_goods_5']['iteration'] < 4): ?>i1<?php else: ?>i2<?php endif; ?>"><?php echo $this->_foreach['get_cat_new_goods_5']['iteration']; ?></i><span><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a></span> </p>
            <div class="hover"> <i class="<?php if ($this->_foreach['get_cat_new_goods_5']['iteration'] < 4): ?>i1<?php else: ?>i2<?php endif; ?>"><?php echo $this->_foreach['get_cat_new_goods_5']['iteration']; ?></i> <span><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" width="88" height="56" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a></span>
              <dl>
                <dt><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo sub_str($this->_var['goods']['short_name'],12); ?></a></dt>
                <dd>市场价：<del class="yen"><?php echo $this->_var['goods']['market_price']; ?></del> <br>
                  本站价:<b class="yen red"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></b> </dd>
              </dl>
            </div>
          </li>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
        </ul>
      </div>
    </div>
    
  </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script language="javascript">
document.getElementById('footer_table').style.display = 'none';
</script>
<script type="text/javascript" id="bdshare_js" data="type=tools"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
</body>
</html>
<?php else: ?>

<?php if ($this->_var['article']['cat_id'] == 4): ?>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<style type="text/css">
section,figure,aside{padding:0;margin:0;border:none;}
/*---common----*/
.mt20{margin-top:20px;}
.mt30{margin-top:30px;}
.mb20{margin-bottom:20px;}
/*---banner---*/
figure.art_banner{width:976px;height:auto;padding:1px;border:solid 1px #d5d5d5;margin:10px auto 0;}
figure img{display:block;}
/*---main---*/
section.art_main{height:auto;margin-top:10px;}
/*aside nav*/
.art_nav{width:240px;height:auto;border:solid 1px #e8e8e8;background:#f9f9f9;border-radius: 4px 4px 0 0;}
.art_nav figure{height:57px;overflow:hidden;}
.art_nav_menu{height:auto;padding:10px 15px 20px 15px;}
.art_nav_menu .art_box_title,.art_nav_menu .art_box_title:hover,.cat_name{display:inline-block;padding:0 40px 0px 35px;width:138px;height:44px;line-height:44px;background:url(themes/meilele/images/article_830_left_nav_bg.jpg);text-decoration:none;text-align:left;font-size:14px;font-family:微软雅黑,黑体;margin-bottom: 10px;}
.art_nav_menu .art_box_title,.cat_name{background-position:0px 0px;}
.art_nav_menu .current,body .art_nav_menu .current:hover{background-position:0px -43px;color:#ffffff!important;}
.art_nav_menu .art_box_title:hover,.cat_name:hover{background-position:0px -86px;color: #333!important;}
.art_nav_menu .art_box_title span{font-size:12px;color:#848383;text-transform:uppercase;padding-left:5px;font-family: 'Tunga';}
.art_nav_menu .current span{color:#fff!important;}
.art_nav_menu .art_box_title:hover span{}
.art_box .art_box_list{text-align:center;padding-bottom:12px;display:none;}
.art_box .art_box_list a{color:#333333 !important; font-family:"微软雅黑"; font-size:14px; line-height:23px;}
.cat_name{cursor:pointer;}
/*aside content*/
article.art_content{padding:15px 20px;width:680px;height:auto;border:1px solid #ebebeb;}
.art_title{color:#c00;font:18px/18px "微软雅黑","黑体";padding-bottom:15px;}
.art_title span{display:inline-block;height:24px;line-height:24px;padding-left:10px;background:url(themes/meilele/images/dot20111227.gif) left center no-repeat;}
.post_content,.article_content{padding:10px;font-size:14px;color:#454545;}
.post_content p{text-indent:2em;line-height:1.8;margin-bottom:20px;}
.article_content{width:676px;margin-left:auto; margin-right:auto; border-top:1px solid #cccccc;}
.article_content p{text-indent:2em;line-height:1.8;}
.article_content div{margin-bottom:5px;}
</style>

<style type="text/css">
.FCHATBG{background:url(themes/meilele/images/b_1372310424.png) 0  0  no-repeat;_background:url(themes/meilele/images/b_1372310423.gif) 0  0  no-repeat;}#Fchat1,#Fchat2,#FchatMsg{font-size:12px;z-index:1500;}#Fchat1{width:85px;position:fixed; right:5px; top:190px;_position:absolute;_top:expressiondocument.documentElement.scrollTop+190));}#Fchat1 .FC_close{margin-top:14px;margin-left:68px;height:19px;width:17px;cursor:pointer;}#Fchat1 .FC_flash{width:34px;height:8px;overflow:hidden;background:url(themes/meilele/images/bf.gif) 0 0 no-repeat;margin-left:20px;}#Fchat1 .FC_box{width:73px;border:2px solid #f8aac4;border-top:none;}#Fchat1 .FC_click{cursor:pointer;height:80px;margin-bottom:5px;}#Fchat2{width:37px;height:119px;position:fixed; right:5px; top:190px;cursor:pointer;display:none;background-position:-85px 0;_position:absolute;_top:expressiondocument.documentElement.scrollTop+190));}#FchatMsg{background-position:-85px -119px;width:100px; height:48px;padding:30px 35px 17px 20px;color:#e5134e;line-height:16px;position:fixed; right:70px; top:110px;_position:absolute;_top:expressiondocument.documentElement.scrollTop+110));overflow:hidden;display:none;opacity:0.9;}#FchatMsg a{color:#e5134e}
</style>
<style type="text/css">
.back_to_top{display:none;width:61px;overflow:hidden;right:40px;position:fixed;z-index:100;bottom:50px;_position:absolute;_top:expressiondocument.documentElement.scrollTop+document.documentElement.clientHeight-134));}.back_to_top a{display:inline-block;width:61px;height:47px;overflow:hidden;background:url(themes/meilele/images/a_1382424829.gif) 0px -99px no-repeat;}.back_to_top a:hover{background-position:-65px -99px}.back_to_top a.back_to_top_lottery{background-position:0 0;margin-bottom:4px;}.back_to_top a.back_to_top_lottery:hover{background-position:-65px 0;}.back_to_top a.back_to_top_quiz{background-position:0 -50px;margin-bottom:4px;}.back_to_top a.back_to_top_quiz:hover{background-position:-65px -50px;}
</style>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<script src="themes/meilele/js/jq.js?1119"></script>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<figure class="art_banner"> <img src="themes/meilele/images/mll_article_banner.jpg" alt="筑就一个梦，眷恋一个家"> </figure>
<section class="art_main w clearfix">
  <aside class="art_nav clearfix Left">
    <figure><img src="themes/meilele/images/article_830_logo.jpg" alt=""></figure>
    <ul id="JS_silde_menu" class="art_nav_menu">
	<?php $_from = get_cat_arts_20(2); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_0_34564400_1510015670');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article_0_34564400_1510015670']):
        $this->_foreach['artciles_list']['iteration']++;
?>
      <li class="art_box"> <a href="<?php echo $this->_var['article_0_34564400_1510015670']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article_0_34564400_1510015670']['title']); ?>" name="JS_art_title" class="art_box_title <?php if ($this->_var['article_0_34564400_1510015670']['id'] == $this->_var['id']): ?>current<?php endif; ?>" id="JS_art_1"><?php echo htmlspecialchars($this->_var['article_0_34564400_1510015670']['title']); ?><span>COMPANY</span></a> </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
	 
      
    </ul>
  </aside>
  <article class="art_content clearfix Right">
    <p>
      <style type="text/css">


.art_content p{color:#777; font-size:14px;line-height:1.8;text-indent:2em;}
</style>
    </p>
    <h1 class="art_title"><span><?php echo htmlspecialchars($this->_var['article']['title']); ?></span></h1>
   
   <?php echo $this->_var['article']['content']; ?>
  </article>
</section>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
<?php else: ?>
<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<script src="themes/meilele/js/jq.js?1119"></script>
<style type="text/css">
section,figure,aside{padding:0;margin:0;border:none;}
/*---common---*/
.art_box{border:solid 1px #dddddd;}
.art_title{height:30px;line-height:30px;padding:0 10px;border-bottom:solid 1px #dddddd;background:url(themes/meilele/images/art_new20120417_1336631930.png) 0px 0px repeat-x;font-size:12px;}
/*---main---*/
section.art_main{height:auto;margin-top:10px;}
/*aside nav*/
aside.art_nav{width:198px;height:auto;}
aside h2{color:#c5c5c5;}
span.aside_txt{font-size:15px;color:#000000;}
aside section{height:auto;padding:10px;}
aside section dl{padding-bottom:10px;}
aside section dl dt,aside section dl dd{padding:0 10px;overflow:hidden;}
aside section dl dt{height:20px;padding:5px 10px;border-bottom:dotted 1px #d7d7d7;}
span.dt_ico,span.dt_txt{display:inline-block;float:left;}
span.dt_ico{width:16px;height:16px;margin:2px 0;overflow:hidden;background:url(themes/meilele/images/art_new20120417_1336631930.png) no-repeat;}
span.dt_txt{line-height:20px;padding-left:10px;font-size:14px;font-weight:bold;color:#444444;}
.art_ico1{background-position:0px -93px!important;}
.art_ico2{background-position:-16px -93px!important;}
.art_ico3{background-position:-32px -93px!important;}
.art_ico4{background-position:-48px -93px!important;}
aside section dl dd{height:20px;line-height:20px;margin-top:5px;}
aside section dl dd a,aside section dl dd a:hover{display:block;height:20px;line-height:20px;padding-left:18px;background:url(themes/meilele/images/art_new20120417_1336631930.png);text-decoration:none;overflow:hidden;}
aside section dl dd a{background-position:0px -30px;color:#666666;}
aside section dl dd a:hover{background-position:0px -50px;color:#ffffff!important;}
aside section dl dd .current{color:#a10000!important;}
/*aside content*/
.art_content{width:760px;height:auto;line-height:24px;border:1px solid #ebebeb;}
.art_content h2,.art_content h2 a{color:#777777;}
.art_content article{padding:20px;}
.art_header{height:23px;padding:5px 0 10px;border-bottom:dotted 1px #d5d5d5;margin-bottom:15px;}
.art_header span{display:inline-block;float:left;}
span.header_box{height:23px;}
span.header_txt,span.header_space{height:22px;line-height:22px;padding-bottom:1px;background:url(themes/meilele/images/art_new20120417_1338361551.png) repeat-x;}
span.header_txt{background-position:0px -70px;padding-left:15px;font-size:15px;font-weight:bold;color:#ffffff;}
span.header_space{background-position:right -93px;width:15px;}
</style>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<section class="art_main w clearfix">
  <aside class="art_nav art_box clearfix Left">
    <h2 class="art_title"><span class="aside_txt">客服中心</span> SERVICE</h2>
    <section id="JS_silde_menu">
	<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['helps'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['helps']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['helps']['iteration']++;
?>
      <dl>
        <dt><span class="dt_ico art_ico<?php echo $this->_foreach['helps']['iteration']; ?>"></span><span class="dt_txt"><?php echo $this->_var['help_cat']['cat_name']; ?></span></dt>
		<?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        <dd><a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"><?php echo $this->_var['item']['short_title']; ?></a></dd>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </dl>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
    </section>
  </aside>
  <section class="art_content clearfix Right">
    <h2 class="art_title"><header class="art_header"> <span class="header_box"> <span class="header_txt"><?php echo htmlspecialchars($this->_var['article']['title']); ?></span> <span class="header_space"></span> </span> </header></h2>
    <article>
      
      <span ><?php echo $this->_var['article']['content']; ?></span>
      
    </article>
  </section>
</section>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script language="javascript">
document.getElementById('footer_table').style.display = 'none';
</script>
</body>
</html>
<?php endif; ?>

<?php endif; ?>
