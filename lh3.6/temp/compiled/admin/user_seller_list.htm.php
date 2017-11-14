<!-- $Id: agency_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<div class="form-div">
  <form action="javascript:searchUser()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    &nbsp;审核状态 <select name="is_check"><option value="3">选择状态</option><option value="0">未审核</option><option value="1">审核通过</option><option value="2">审核未通过</option></select>
    &nbsp;会员名称 &nbsp;<input type="text" name="keywords" /> <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" />
  </form>
</div>
<form method="post" action="" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
<div class="list-div" id="listDiv">
<?php endif; ?>

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th> <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
          <a href="javascript:listTable.sort('s.id'); ">编号</a><?php echo $this->_var['sort_id']; ?> </th>
      <th>会员名称</th>
      <th>邮箱</th>
      <th>申请日期</th>
      <th><a href="javascript:listTable.sort('s.use_fee'); ">平台使用金</a><?php echo $this->_var['sort_use_fee']; ?></th>
      <th><a href="javascript:listTable.sort('s.deposit'); ">商家保证金</a><?php echo $this->_var['sort_deposit']; ?></th>
      <th><a href="javascript:listTable.sort('s.fencheng'); ">分成利率</a><?php echo $this->_var['sort_fencheng']; ?></th>
      <th>结算类型</th>
      <th>状态</th>
      <th>操作</th>
    </tr>
    <?php $_from = $this->_var['user_seller_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user_seller');if (count($_from)):
    foreach ($_from AS $this->_var['user_seller']):
?>
    <tr>
      <td align="center"><input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['user_seller']['id']; ?>" />
        <?php echo $this->_var['user_seller']['id']; ?></td>
      <td align="center"><?php echo htmlspecialchars($this->_var['user_seller']['user_name']); ?></td>
      <td align="center"><?php echo $this->_var['user_seller']['email']; ?></td>
      <td align="center"><?php echo $this->_var['user_seller']['add_time']; ?></td>
      <td align="center" class="first-cell"><span onclick="javascript:listTable.edit(this, 'edit_use_fee', <?php echo $this->_var['user_seller']['id']; ?>)"><?php echo htmlspecialchars($this->_var['user_seller']['use_fee']); ?></span></td>
      <td align="center" class="first-cell"><span onclick="javascript:listTable.edit(this, 'edit_deposit', <?php echo $this->_var['user_seller']['id']; ?>)"><?php echo htmlspecialchars($this->_var['user_seller']['deposit']); ?></span></td>
      <td align="center" class="first-cell"><span onclick="javascript:listTable.edit(this, 'edit_fencheng', <?php echo $this->_var['user_seller']['id']; ?>)"><?php echo htmlspecialchars($this->_var['user_seller']['fencheng']); ?></span></td>
      <td align="center"><?php if ($this->_var['user_seller']['checkout_type'] == 0): ?>周<?php elseif ($this->_var['user_seller']['checkout_type'] == 1): ?>月<?php elseif ($this->_var['user_seller']['checkout_type'] == 2): ?>季度<?php elseif ($this->_var['user_seller']['checkout_type'] == 3): ?>年<?php endif; ?></td>
      <td align="center"><img src="images/<?php if ($this->_var['user_seller']['is_check'] == 1): ?>yes<?php else: ?>no<?php endif; ?>.gif" onclick="listTable.toggle(this, 'is_check', <?php echo $this->_var['user_seller']['id']; ?>)" style="cursor:pointer;"/></td>
      <td align="center">
        <a href="user_sellers.php?act=s_info&uid=<?php echo $this->_var['user_seller']['user_id']; ?>&id=<?php echo $this->_var['user_seller']['id']; ?>" title="查看商家申请信息">查看</a> |
        <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['user_seller']['id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>"><?php echo $this->_var['lang']['remove']; ?></a></td>
        <!--<a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['goods']['goods_id']; ?>, '<?php echo $this->_var['lang']['trash_goods_confirm']; ?>')" title="<?php echo $this->_var['lang']['trash']; ?>"><img src="images/icon_trash.gif" width="16" height="16" border="0" /></a>-->

    </tr>
    <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="4"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
<table id="page-table" cellspacing="0">
  <tr>
    <td>
      <input name="remove" type="submit" id="btnSubmit" value="<?php echo $this->_var['lang']['drop']; ?>" class="button" disabled="true" />
      <input name="act" type="hidden" value="batch" />
    </td>
    <td align="right" nowrap="true">
    <?php echo $this->fetch('page.htm'); ?>
    </td>
  </tr>
</table>

<?php if ($this->_var['full_page']): ?>
</div>
</form>

<script type="text/javascript" language="javascript">
  <!--
  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	
  //-->
  /**
	* 搜索用户
  */
	function searchUser()
	{
		listTable.filter['keywords'] = Utils.trim(document.forms['searchForm'].elements['keywords'].value);
		listTable.filter['is_check'] = Utils.trim(document.forms['searchForm'].elements['is_check'].value);
		listTable.filter['page'] = 1;
		listTable.loadList();
	}
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>