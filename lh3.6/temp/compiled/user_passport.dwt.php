<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v3.6.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<link rel="stylesheet" href="themes/meilele/css/user3.min.css?1145" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
</head>
<body>
<div id="" class="user_all w" style="position:relative;">
  <div id="" class="user_header clearfix" style="padding:15px 0px;">
    <div class="logo Left" style="background: url(themes/meilele/images/logo_user.png) 0 0 no-repeat;width:146px;height:53px"><a href="/" title="返回黎华首页"><img style="background:none" src="themes/meilele/images/blank.gif" width="146" height="53" border="0" alt="黎华家具装饰材料城"></a></div>
  </div>
  <?php if ($this->_var['action'] == 'login'): ?>
  <div id="" class="user_content clearfix type_login">
    <h1 class="yahei" style="position: absolute;top: 40px;left: 160px; font-size: 24px; padding: 0;">用户登录</h1>
    <div id="" class="user_login Right user_login_new">
      <form  id="JS_login_form" class="username_box" name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
        <div class="clearfix user_type_user">
          <h3 class="user_type Left">用户名</h3>
        </div>
        <p>
          <input value="" type="text" name="username" class="users_input" id="login_uname" tabindex="1">
        </p>
        <div id="login_uname_a" class="error"></div>
        <div class="clearfix user_type_user">
          <h3 class="user_type Left">密码</h3>
        </div>
        <p>
          <input type="password" name="password" class="users_input" id="login_uname_p" tabindex="2">
        </p>
        <div id="login_uname_p_a" class="error"></div>
        <?php if ($this->_var['enabled_captcha']): ?>
        <div id="JS_login_captcha_1">
          <h3 class="user_type">验证码</h3>
          <p>
            <input type="text" name="captcha" class="register_input verify_input" id="login_uname_c" tabindex="3">
            <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" class="fkcaptcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </p>
          <div class="gray error">请输入图片中的字符，不区分大小写！</div>
        </div>
        <?php endif; ?>
        <div class="clearfix">
          <p class="Left">
            <label>
            <input type="checkbox" id="JS_rember_username" name="remember" style="vertical-align:middle;" tabindex="5">
            自动登录</label>
          </p>
          <a href="user.php?act=get_password" class="forget Right user_type_user" tabindex="6">忘记密码？</a> </div>
        <div id="login_submit0" class="operate">
          <input type="submit" name="submit" value="登录" class="users_submit white f16 yahei" />
        </div>
        <div id="login_submit1" class="operate none"> <a class="users_submit white f16 yahei" id="">正在验证</a> </div>
        <input type="hidden" name="act" value="act_login" />
        <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
      </form>
      <div class="r" style="margin-top:30px;border-top: 1px solid #eee; padding: 10px 0;"><a class="red bold" href="user.php?act=register">立即注册>></a></div>
      <div class="none"></div>
    </div>
    <div id="" class="user_register Left" style="padding-top:20px;color:#555;width:436px;">
       <img src="themes/meilele/images/login_logo.png" width="436" height="310" class="mt10" style="background:#fff" /> </div>
  </div>
  <?php endif; ?>
  <?php if ($this->_var['action'] == 'register'): ?>
  <div id="" class="user_content clearfix type_register">
    <div id="" class="user_login Left">
      <h1 class="yahei" style="padding-left:10px;">注册新用户</h1>
      <form  id="JS_register_form" action="user.php" method="post" name="formUser" onsubmit="return register();">
        <div id="" class="register_box">
          <p>
            <label class="tips">帐户名：</label>
            <input type="text" name="username" class="register_input" id="register_username" onblur="is_registered(this.value);" autocomplete="off" tabindex="1">
          </p>
          <div id="username_notice" class="error error2" style=" border:1px solid #FFFFFF; background-color:#FFFFFF;visibility: visible;"> *</div>
          <p>
            <label class="tips"><?php echo $this->_var['lang']['label_email']; ?>：</label>
            <input type="text" name="email" class="register_input" id="email"  onblur="checkEmail(this.value);"  autocomplete="off" tabindex="2">
          </p>
          <div id="email_notice" class="error error2" style=" border:1px solid #FFFFFF; background-color:#FFFFFF;visibility: visible;"> *</div>
          <p>
            <label class="tips">设置密码：</label>
            <input type="password" name="password" class="register_input" onblur="check_password(this.value);" id="password1" tabindex="3">
            <span id="register_pw_s" class="success" style="display:none;"></span></p>
          <div id="password_notice" class="error error2" style=" border:1px solid #FFFFFF; background-color:#FFFFFF;visibility: visible;"> *</div>
          <p>
            <label class="tips">确认密码：</label>
            <input type="password" name="confirm_password" class="register_input" onblur="check_conform_password(this.value);" id="conform_password" tabindex="4">
            <span id="register_rpw_s" class="success" style="display:none;"></span></p>
          <div id="conform_password_notice" class="error error2" style=" border:1px solid #FFFFFF; background-color:#FFFFFF;visibility: visible;"> *</div>
          <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
          <?php if ($this->_var['field']['id'] == 6): ?>
          <?php else: ?>
          <p style="margin-bottom:25px">
            <label class="tips"><font 
            <?php if ($this->_var['field']['is_need']): ?>
            id="extend_field<?php echo $this->_var['field']['id']; ?>i"
            <?php endif; ?>
            ><?php echo $this->_var['field']['reg_field_name']; ?></font>：</label>
            <input type="text" name="extend_field<?php echo $this->_var['field']['id']; ?>" class="register_input"  autocomplete="off" tabindex="10">
            <?php if ($this->_var['field']['is_need']): ?>
            <span class="red" style="padding-left:5px"> *</span>
            <?php endif; ?>
          </p>
          <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php if ($this->_var['enabled_captcha']): ?>
          <p id="register_captcha_e">
            <label class="tips">验证码：</label>
            <input type="text" name="captcha" class="register_input verify_input" id="register_captcha" tabindex="14">
            <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </p>
          <?php endif; ?>
          <p class="readed gray">
            <label>
            <input name="agreement" type="checkbox" value="1" checked="checked" />
            <?php echo $this->_var['lang']['agreement']; ?></label>
          </p>
          <div id="register_submit0" class="operate" style="padding-left:100px;">
            <input name="Submit" type="submit" value="注 册" class="users_submit white f16 yahei">
          </div>
          <input name="act" type="hidden" value="act_register" >
          <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
        </div>
      </form>
    </div>
    <div id="" class="user_register Right" style="color:#555;padding-top:40px;"> 已经有帐号？请直接登录 <a href="user.php" class="logintoreg users_submit users_submit2 white f16 yahei" style="color:#666!important;">登&emsp;录</a> </div>
  </div>
  <?php endif; ?>
  <?php if ($this->_var['action'] == 'get_password'): ?>
  <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
  <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
  <div id="" class="findpwd_content">
    <h1 class="yahei">找回密码</h1>
    <div id="" class="find_box">
      <ul class="find_trg clearfix" id="find_trg">
      </ul>
      <div id="" class="find_form">
        <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
          <div id="form_email" class="form_uname">
            <p class="input" style="margin-bottom:15px">
              <label><?php echo $this->_var['lang']['username']; ?>：</label>
              <input type="text" name="user_name" class="find_input" id="user_name">
            </p>
            <p class="input">
              <label>邮箱：</label>
              <input type="text" name="email" class="find_input" id="email">
            </p>
            <div id="" class="find_sbox">
              <input type="hidden" name="act" value="send_pwd_email" />
              <input type="submit"  name="submit" class="find_button" value="<?php echo $this->_var['lang']['submit']; ?>" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
  <?php endif; ?>
  <?php if ($this->_var['action'] == 'reset_password'): ?>
  <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
	<div id="" class="findpwd_content">
    <h1 class="yahei">重置密码</h1>
    <div id="" class="find_box">
      <ul class="find_trg clearfix" id="find_trg">
      </ul>
      <div id="" class="find_form">
        <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
          <div id="form_email" class="form_uname">
            <p class="input" style="margin-bottom:15px">
              <label><?php echo $this->_var['lang']['new_password']; ?>：</label>
              <input name="new_password" type="password" size="25" class="find_input" />
            </p>
            <p class="input">
              <label><?php echo $this->_var['lang']['confirm_password']; ?>：</label>
              <input name="confirm_password" type="password" size="25"  class="find_input"/>
            </p>
            <div id="" class="find_sbox">
              <input type="hidden" name="act" value="act_edit_password" />
            <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
            <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>"  class="find_button"/>
     
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>
<div class="footer-box">
  <div class="w footer-copy">
    <?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
    <a href="<?php echo $this->_var['nav']['url']; ?>"  
    
    <?php if ($this->_var['nav']['opennew'] == 1): ?>
    target="_blank"
    <?php endif; ?>
    ><?php echo $this->_var['nav']['name']; ?></a>
    <?php if (! ($this->_foreach['nav_bottom_list']['iteration'] == $this->_foreach['nav_bottom_list']['total'])): ?>
    |
    <?php endif; ?>
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
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <br />
    <?php if ($this->_var['icp_number']): ?>
    <?php echo $this->_var['lang']['icp_number']; ?>:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $this->_var['icp_number']; ?></a><br />
    <?php endif; ?>
  </div>
</div>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</body>
</html>
<!--
GERMANY:2013-11-28 15:26:03
-->
