<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<form method="post" action="" name="listForm">
<!-- start reg_fiedls list -->
<div class="list-div" id="listDiv">
<?php endif; ?>

<table cellspacing='1' id="list-table">
  <tr>
    <th>注册项名称</th>
    <th>类型</th>
    <th>排序</th>
    <th>是否显示</th>
    <th>是否必填</th>
    <th>宽度</th>
    <th>高度</th>
    <th>操作</th>
  </tr>
  <?php $_from = $this->_var['reg_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
  <tr>
    <td class="first-cell" ><span onclick="listTable.edit(this,'edit_name', <?php echo $this->_var['field']['id']; ?>)"><?php echo $this->_var['field']['reg_field_name']; ?></span></td>
    <td class="first-cell" ><?php echo $this->_var['field']['type']; ?></td>
    <td align="center"><span onclick="listTable.edit(this,'edit_order', <?php echo $this->_var['field']['id']; ?>)"><?php echo $this->_var['field']['dis_order']; ?></span></td>
    <td align="center"><img src="images/<?php if ($this->_var['field']['display']): ?>yes<?php else: ?>no<?php endif; ?>.gif" onclick="listTable.toggle(this, 'toggle_dis', <?php echo $this->_var['field']['id']; ?>)" /></td>
    <td align="center"><img src="images/<?php if ($this->_var['field']['is_need']): ?>yes<?php else: ?>no<?php endif; ?>.gif" onclick="listTable.toggle(this, 'toggle_need', <?php echo $this->_var['field']['id']; ?>)" /></td>
    <td align="center"><span onclick="listTable.edit(this,'edit_width', <?php echo $this->_var['field']['id']; ?>)"><?php echo $this->_var['field']['width']; ?></span></td>
    <td align="center"><span onclick="listTable.edit(this,'edit_height', <?php echo $this->_var['field']['id']; ?>)"><?php echo $this->_var['field']['height']; ?></span></td>
    <td align="right"><a href="?act=edit&id=<?php echo $this->_var['field']['id']; ?>"><?php echo $this->_var['lang']['edit']; ?></a><?php if ($this->_var['field']['type'] == 0): ?> | <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['field']['id']; ?>, '删除此项将删除所有商家的该项信息')" title="<?php echo $this->_var['lang']['remove']; ?>"><?php echo $this->_var['lang']['remove']; ?></a><?php endif; ?></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>

<?php if ($this->_var['full_page']): ?>
</div>
<!-- end reg_fiedls list -->
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>
