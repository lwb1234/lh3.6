<style>
.user_menu{float:left;width:195px;font-family:'微软雅黑'!important}
.user_menu .title{height:40px;line-height:1;font-size:14px;font-weight:bold;color:#fff;background:url(themes/meilele/images/user/bg_1126.png) 0 0 no-repeat}.user_menu .title a{text-indent:-999em;height:40px;display:block;overflow:hidden}
.user_menu .navs{border:1px solid #d0d0d0;border-bottom:0}.user_menu .navs h3{line-height:36px;height:36px;background:url(themes/meilele/images/user/bg_1126.png) 0 -40px no-repeat;padding-left:10px;font-weight:bold;font-size:15px;border-bottom:1px solid #d8d8d8;border-top:1px solid #fff}
.user_menu .navs h3 span{vertical-align:middle;float:left;width:20px;height:20px;background:url(themes/meilele/images/user/bg_1126.png) -195px 0 no-repeat;margin:7px 8px 0 0}
.user_menu .navs h3 span.s1{background-position:-60px -198px}.user_menu .navs h3 span.s2{background-position:-40px -198px}.user_menu .navs h3 span.s3{background-position:-20px -198px}
.user_menu .navs h3 span.s4{background-position:0 -198px}.user_menu .navs h3 span.s5{background-position:-80px -198px}.user_menu .navs ul{border-bottom:1px solid #d0d0d0;font-size:13px}
.user_menu .navs ul li{line-height:36px;border-bottom:1px solid #ebebeb;padding-left:20px}.user_menu .navs ul li.last{border-bottom:0}.user_menu .navs ul li a{color:#333;padding-left:20px}
.user_menu .navs ul li a:hover,.user_menu .navs ul li a.red{color:#e52952!important;font-weight:bold;background:url(themes/meilele/images/user/bg_1126.png) 0 -176px no-repeat}
.user_menu .left_ad,.user_menu .left_ad img{width:195px;height:100px}.user_main{float:right;width:770px;font-family:Tahoma}.user_main a{color:#005ea7;text-decoration:none!important}
.user_main a.red,.user_main .red,.insuredPage .red,#JS_userBox .red,.red{color:#e52952!important}.position{display:none}.position2{margin-bottom:10px;font-size:14px;font-family:'微软雅黑'!important}
.position2 .here{float:left;font-size:20px;color:#333;line-height:26px}.position2 .Right{height:16px;line-height:16px;font-size:12px;color:#666;margin-top:10px;background:url(themes/meilele/images/user/bg_1126.png) 0 -131px no-repeat;padding-left:20px}
.position2 .Right a{color:#666!important}.user_main .gray_box{background:#fff;border:1px solid #d0d0d0;border-top:3px solid #e52952}.user_main .white_box{border:1px solid #d0d0d0;padding:20px;border-top:3px solid #e52952;min-height:702px}
.user_main .title,.insuredPage .title{height:35px;background:url(themes/meilele/images/user/bg_1126.png) 0 -480px repeat-x;font-family:'微软雅黑'!important}
.user_main .title .Left,.insuredPage .title .Left{float:left;height:35px;border-left:1px solid #d0d0d0;border-right:1px solid #d0d0d0;padding:0 20px;line-height:32px;text-align:center;font-size:14px;color:#333}
.user_main .title2 .Left,.insuredPage .title2 .Left{border-color:#e52952;color:#333}.user_main .title .current,.insuredPage .title .current{border-top:2px solid #e52952;background:#fff;font-weight:bold;height:33px}
.user_main .gray_banner{background:#eee;font-size:14px;line-height:32px;padding-left:15px;font-weight:bold}
</style>
<div class="user_menu">
    <div class="title"> </div>
    <div class="navs" id="JS_u_navs">
      <ul>
        <li><a <?php if ($this->_var['action'] == 'profile'): ?> class="red"<?php endif; ?> href="user.php?act=profile"><?php echo $this->_var['lang']['label_profile']; ?></a></li>

        <li><a <?php if ($this->_var['action'] == 'address_list'): ?> class="red"<?php endif; ?> href="user.php?act=address_list">我的地址簿</a></li>
        <li class="last"><a <?php if ($this->_var['action'] == 'bonus'): ?> class="red"<?php endif; ?> href="user.php?act=bonus">我的红包</a></li>

      </ul>
       <ul>
        <li><a <?php if ($this->_var['action'] == 'tag_list'): ?> class="red"<?php endif; ?> href="user.php?act=tag_list"><?php echo $this->_var['lang']['label_tag']; ?></a></li>
	<!--
		<li><a <?php if ($this->_var['action'] == 'track_packages'): ?> class="red"<?php endif; ?> href="user.php?act=track_packages"><?php echo $this->_var['lang']['label_track_packages']; ?></a></li>
		 <?php if ($this->_var['show_transform_points']): ?>
        <li><a <?php if ($this->_var['action'] == 'transform_points'): ?> class="red"<?php endif; ?> href="user.php?act=transform_points"><?php echo $this->_var['lang']['label_transform_points']; ?></a></li>
		<?php endif; ?>
        <li><a <?php if ($this->_var['action'] == 'affiliate'): ?> class="red"<?php endif; ?> href="user.php?act=affiliate"><?php echo $this->_var['lang']['label_affiliate']; ?></a></li>
        <li><a <?php if ($this->_var['action'] == 'comment_list'): ?> class="red"<?php endif; ?> href="user.php?act=comment_list"><?php echo $this->_var['lang']['label_comment']; ?></a></li>
        <li><a <?php if ($this->_var['action'] == 'booking_list'): ?> class="red"<?php endif; ?> href="user.php?act=booking_list"><?php echo $this->_var['lang']['label_booking']; ?></a></li>
        <li><a <?php if ($this->_var['action'] == 'account_log'): ?> class="red"<?php endif; ?> href="user.php?act=account_log"><?php echo $this->_var['lang']['label_user_surplus']; ?></a></li>
	-->
	<li><a <?php if ($this->_var['action'] == 'sellers_info'): ?>class="red"<?php endif; ?> href="sellers.php">我的入驻信息</a></li>
        <?php if ($this->_var['seller']['is_check'] == 1): ?>
          <li><a <?php if ($this->_var['action'] == 'sellers_info'): ?>class="red"<?php endif; ?> href="admin_shangjia/" target="_blank">商家后台</a></li>
          <li><a <?php if ($this->_var['action'] == 'sellers_info'): ?>class="red"<?php endif; ?> href="seller_store.php?sid=<?php echo $this->_var['seller']['store_id']; ?>" target="_blank">我的店铺</a></li>
        <?php endif; ?>
        
      </ul>
      <ul>
        <li class="last"><a href="user.php?act=message_list">在线留言</a></li>
	<li class="last"><a href="user.php?act=logout" style="color:#a60201">安全退出</a></li>
      </ul>
    </div>

    
  </div>