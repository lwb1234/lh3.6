<!-- $Id: agency_list.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<div class="form-div">
  <form action="javascript:searchUser()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    &nbsp;店铺名称 &nbsp;<input type="text" name="keywords" /> <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" />
  </form>
</div>
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
<?php endif; ?>

  <table cellpadding="3" cellspacing="1">
    <tr>
      <th>店铺名称</th>
      <th>商家会员名称</th>
      <th>入驻日期</th>
      <th>邮箱</th>
      <th>客服电话</th>
      <th><a href="javascript:listTable.sort('sh.status'); ">开启</a><?php echo $this->_var['sort_status']; ?></th>
      <th><a href="javascript:listTable.sort('sh.apply'); ">已申请加入店铺街</a><?php echo $this->_var['sort_apply']; ?></th>
      <th><a href="javascript:listTable.sort('sh.is_street'); ">显示在店铺街</a><?php echo $this->_var['sort_is_street']; ?></th>
      <th>店铺地址</th>
      <th>操作</th>
    </tr>
    <?php $_from = $this->_var['seller_store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
    <tr>
      <td align="center"><a href="../seller_store.php?sid=<?php echo $this->_var['store']['id']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['store']['shop_name']); ?></a></td>
      <td align="center"><a href="user_sellers.php?act=s_info&uid=<?php echo $this->_var['store']['user_id']; ?>&id=<?php echo $this->_var['store']['seller_id']; ?>" ><?php echo $this->_var['store']['user_name']; ?></a></td>
      <td align="center"><?php echo $this->_var['store']['add_time']; ?></td>
      <td align="center"><?php echo $this->_var['store']['email']; ?></td>
      <td align="center"><?php echo $this->_var['store']['kf_tel']; ?></td>
      <td align="center"><img src="images/<?php if ($this->_var['store']['status'] == 1): ?>yes<?php else: ?>no<?php endif; ?>.gif" onclick="listTable.toggle(this, 'status', <?php echo $this->_var['store']['id']; ?>)" style="cursor:pointer;"/></td>
      <td align="center"><img src="images/<?php if ($this->_var['store']['apply'] == 1): ?>yes<?php else: ?>no<?php endif; ?>.gif"/></td>
      <td align="center"><img src="images/<?php if ($this->_var['store']['is_street'] == 1): ?>yes<?php else: ?>no<?php endif; ?>.gif" onclick="listTable.toggle(this, 'is_street', <?php echo $this->_var['store']['id']; ?>)" style="cursor:pointer;"/></td>
      <td align="center"><?php echo $this->_var['store']['address']; ?></td>
      <td align="center"><a href="?act=edit&id=<?php echo $this->_var['store']['id']; ?>"><?php echo $this->_var['lang']['edit']; ?></a></td>
    <?php endforeach; else: ?>
    <tr><td class="no-records" colspan="4"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
<table id="page-table" cellspacing="0">
  <tr>
    <td></td>
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
		listTable.filter['page'] = 1;
		listTable.loadList();
	}
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>