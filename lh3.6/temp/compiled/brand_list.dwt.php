<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<style type="text/css">
/*-----banner-----*/
#brandBanner{height:158px;margin-top:20px;overflow:hidden;}
/*-----brand list-----*/
#brandList{height:auto;margin-top:10px;}
#brandList .first{margin-left:0px!important;}
#brandList .list,#brandList .hover{width:260px;height:370px;padding:15px;overflow:hidden;margin:10px 0 10px 10px;background:url(themes/meilele/images/index_bg.png) no-repeat;float:left;}
#brandList .list{background-position:0px 0px;}
#brandList .list h1{height:30px;line-height:30px;text-align:center;font-size:18px;font-family:"微软雅黑";}
#brandList .list .logo{width:168px;height:114px;overflow:hidden;margin:12px auto 0;}
#brandList .list h4{height:24px;line-height:24px;font-size:14px;text-align:center;color:#444444;font-weight:normal;margin-top:15px;}
#brandList .list p,#brandList .list .address{color:#787878;overflow:hidden;}
#brandList .list p{height:66px;line-height:22px;text-indent:2em;margin-top:15px;}
#brandList .list .address{height:30px;line-height:30px;margin-top:10px;}
#brandList .list .look{display:inline-block;width:102px;height:23px;line-height:23px;padding-left:30px;overflow:hidden;color:#ffffff!important;background:url(themes/meilele/images/index_bg.png) 0px -800px no-repeat;text-decoration:none;float:right;margin-top:20px;}
#brandList .list .look:hover{background-position:-132px -800px;}
#brandList .hover{background-position:0px -400px;}
/*-----pager-----*/
.bPage{width:950px;height:20px;line-height:20px;margin:15px auto 0px;padding:0 15px;text-align:right;}
.bPage a,.bPage strong{display:inline-block;height:18px;line-height:18px;padding:0 5px;margin-left:5px;text-decoration:none;border:solid 1px #bebebe;vertical-align:top;}
.bPage a i,.bPage a span{display:inline-block;float:left;}
.bPage a i{width:5px;height:9px;margin-top:5px;overflow:hidden;background:url(themes/meilele/images/index_bg.png) no-repeat;}
.bPage a span{line-height:18px;}
.bPage .prev i{background-position:-264px -800px;margin-right:5px;}
.bPage .prev:hover i{background-position:-269px -800px;}
.bPage .next i{background-position:-274px -800px;margin-left:5px;}
.bPage .next:hover i{background-position:-279px -800px;}
.bPage a:hover,.bPage strong{border:solid 1px #b20000;background:#b20000;color:#ffffff!important;}
</style>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<script src="themes/meilele/js/jq.js"></script>
</head>
<body>
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className='root_body';window.isWideScreen = true;window.LOAD = true;}else{window.LOAD = false;}})()</script>

<?php echo $this->fetch('library/page_header.lbi'); ?>
<div id="brandBanner" class="w"><img src="themes/meilele/images/index_banner_01.jpg" title="店铺品牌" alt="店铺品牌" height="79" width="1190"><img src="themes/meilele/images/index_banner_02.jpg" title="店铺品牌" alt="店铺品牌" height="79" width="1190"></div>
<div id="brandList" class="w clearfix">
<?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand_data');$this->_foreach['brand_list_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_list_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['brand_data']):
        $this->_foreach['brand_list_foreach']['iteration']++;
?>
  <div class="list <?php if ($this->_foreach['brand_list_foreach']['iteration'] % 4 == 1): ?>first<?php endif; ?>">
    <h1><?php echo $this->_var['brand_data']['brand_name']; ?></h1>
    <div class="logo"><a href="<?php echo $this->_var['brand_data']['url']; ?>" target="_blank" title="<?php echo $this->_var['brand_data']['brand_name']; ?>"><img src="data/brandlogo/<?php echo $this->_var['brand_data']['brand_logo']; ?>" title="<?php echo $this->_var['brand_data']['brand_name']; ?>" alt="<?php echo $this->_var['brand_data']['brand_name']; ?>" height="114" width="168"></a></div>
   
    <p><?php echo $this->_var['brand_data']['brand_desc']; ?></p>
    <a class="look" href="<?php echo $this->_var['brand_data']['url']; ?>" target="_blank" title="查看品牌详细介绍">查看品牌详细介绍</a> </div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>		

  
  
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script language="javascript">
document.getElementById('footer_table').style.display = 'none';
</script>
</body>
</html>
