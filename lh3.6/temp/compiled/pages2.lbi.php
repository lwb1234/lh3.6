<?php if ($this->_var['pager']['page_count'] > 1): ?>
<form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_38170000_1510213683');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_38170000_1510213683']):
?>
      <?php if ($this->_var['key'] == 'keywords'): ?>
          <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo urldecode($this->_var['item_0_38170000_1510213683']); ?>" />
        <?php else: ?>
          <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_38170000_1510213683']; ?>" />
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div class="page R pageC"> 
<?php if ($this->_var['pager']['page_prev']): ?><a href="<?php echo $this->_var['pager']['page_prev']; ?>"><span class="left_arrow"></span> 上一页</a><?php endif; ?>
<span class="pager">
<?php if ($this->_var['pager']['page_count'] != 1): ?>
    <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_38184900_1510213683');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_38184900_1510213683']):
?> 
<a <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>class="current"<?php endif; ?> href="<?php echo $this->_var['item_0_38184900_1510213683']; ?>"><?php echo $this->_var['key']; ?></a> 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php endif; ?>
</span>
<?php if ($this->_var['pager']['page_next']): ?><a href="<?php echo $this->_var['pager']['page_next']; ?>">下一页 <span class="right_arrow"></span></a> <?php endif; ?>
&ensp;共<?php echo $this->_var['pager']['page_count']; ?>页&ensp;
   <!-- 到第 <input id="JS_jump_input" name="page"  onkeydown="if(event.keyCode==13)selectPage(this)" class="number" value="1" />
      &ensp;<a class="go" title="跳转" href="javascript:;" onclick="selectPage()"> 确 定 </a>  -->

</div>
</form>
<?php endif; ?>
<script type="Text/Javascript" language="JavaScript">

function selectPage()
{
  selectPageForm.submit();
}


</script>
