<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/meilele/store_css/street.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />


<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body class="street_tianmao">
<?php echo $this->fetch('library/page_header.lbi'); ?> 
<div id="content">
	<div class="mian">
        <div class="street_title">
            <strong>店铺搜索</strong>
            <b></b>
        </div>
        <div class="street_wrap">
        <?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
            <div class="street_item">
            	<a href="seller_store.php?sid=<?php echo $this->_var['store']['id']; ?>" target="_blank">
                	<img src="<?php echo $this->_var['store']['street_spjpg']; ?>" width="220" hidden="220" />
                    <p class="street_logo"><img src="<?php echo $this->_var['store']['street_logo']; ?>" width="90" height="45" /></p>
                    <h4 class="str_title"><?php echo $this->_var['store']['shop_name']; ?></h4>
                    <p class="str_desc"><?php echo $this->_var['store']['shop_title']; ?></p>
                    <b class="ui_banner">
                    	<i></i>
                        <span>进入</span>
                    </b>
                    <p class="box_num"><em></em></p>
                </a>
            </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
        <div class="street_page">
        	<div class="str_page">
            	<div class="str_page_num">
                	<?php if ($this->_var['pager']['page_prev']): ?>
                	<a class="str_prev" href="<?php echo $this->_var['pager']['page_prev']; ?>">&lt;</a>
                    <?php else: ?>
                    <b class="str_prev">&lt;</b>
                    <?php endif; ?>
                    <?php if ($this->_var['pager']['page_count'] != 1): ?> 
                    <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?> 
                    <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
                    <b class="str_page_cur"><?php echo $this->_var['key']; ?></b>
                    <?php else: ?> 
                    <a href="<?php echo $this->_var['item']; ?>"><?php echo $this->_var['key']; ?></a> 
                    <?php endif; ?> 
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                    <?php endif; ?>
                    <?php if ($this->_var['pager']['page_next']): ?>
                    <a href="<?php echo $this->_var['pager']['page_next']; ?>" class="str_next">&gt;</a>
                    <?php else: ?>
                    <b class="str_prev">&gt;</b>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
