<?php if ($this->_var['user_info']): ?>
<a href="user.php" target="_blank" class="red" style="display:inline-block;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;width:40px; padding:0px 3px"><?php echo $this->_var['user_info']['username']; ?></a> <span id="JS_head_sita_name_haier">欢迎光临！</span><em class="line"></em><a href="user.php?act=logout" class="red" id="JS_login_out" >[退出]</a>
<?php else: ?>
<span><?php echo $this->_var['lang']['welcome']; ?>！</span><em class="line"></em><a href="user.php" title="登录">登录</a><em class="line"></em><a href="user.php?act=register" title="免费注册">注册</a>
<?php endif; ?>