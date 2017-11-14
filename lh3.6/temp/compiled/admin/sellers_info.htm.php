<!-- $Id: agency_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'validator.js,../js/transport.js,../js/region.js')); ?>
<div class="main-div">
		<table align="center">
  		<?php $_from = $this->_var['seller_fields_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
		  <?php if ($this->_var['field']['display']): ?>
          <?php if ($this->_var['field']['type'] == 'file'): ?>
          <tr>
          <td class="label"><?php echo $this->_var['field']['reg_field_name']; ?>：</td>
          <td><a href="../<?php echo $this->_var['field']['content']; ?>" target="_blank"><img src="../<?php echo $this->_var['field']['content']; ?>" style="width:90px; height: 90px;"></a></td>
          <tr>
          <?php elseif ($this->_var['field']['type'] == 'text'): ?>
          <tr>
            <td class="label"><?php echo $this->_var['field']['reg_field_name']; ?>：</td>
            <td><span style="color:#F00; font-weight:bold;"><?php echo $this->_var['field']['content']; ?></span></td>
          </tr>
          <?php elseif ($this->_var['field']['type'] == 'textarea'): ?>
          <tr>
            <td class="label"><?php echo $this->_var['field']['reg_field_name']; ?>：</td>
            <td><span style="color:#F00; font-weight:bold;"><?php echo $this->_var['field']['content']; ?></span></td>
          </tr>
          <?php elseif ($this->_var['field']['type'] == 'select'): ?>
          <tr>
            <td class="label"><?php echo $this->_var['field']['reg_field_name']; ?>：</td>
            <td><span style="color:#F00; font-weight:bold;"><?php echo $this->_var['field']['content']; ?></span></td>
          </tr>
         <?php endif; ?>
          <?php endif; ?>
  	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>

<form method="post" action="user_sellers.php" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
<table align="center">
  <tr>
    <td class="label">结算类型：</td>
    <td>
    <select name="checkout_type">
    <option value="0" <?php if ($this->_var['user_seller_info']['checkout_type'] == 0): ?> selected="true" <?php endif; ?>>周</option>
    <option value="1" <?php if ($this->_var['user_seller_info']['checkout_type'] == 1): ?> selected="true" <?php endif; ?>>月</option>
    <option value="2" <?php if ($this->_var['user_seller_info']['checkout_type'] == 2): ?> selected="true" <?php endif; ?>>季度</option>
    <option value="3" <?php if ($this->_var['user_seller_info']['checkout_type'] == 3): ?> selected="true" <?php endif; ?>>年</option>
    </select>
    </td>
  </tr>
  <tr>
    <td class="label">平台使用费：</td>
    <td><input type="text" name="use_fee" value="<?php echo $this->_var['user_seller_info']['use_fee']; ?>" /></td>
  </tr>
  <tr>
    <td class="label">商家保证金：</td>
    <td><input type="text" name="deposit" value="<?php echo $this->_var['user_seller_info']['deposit']; ?>" /></td>
  </tr>
  <tr>
    <td class="label">分成百分比：</td>
    <td><input type="text" name="fencheng" value="<?php echo $this->_var['user_seller_info']['fencheng']; ?>" />%</td>
  </tr>
  <tr>
    <td class="label">商家备注：</td>
    <td><textarea  name="remark" style="max-width:200px; min-width:200px; max-height:130px; min-height:130px;" ><?php echo $this->_var['user_seller_info']['remark']; ?></textarea></td>
  </tr>
  <tr>
    <td class="label">审核状态：</td>
    <td>
    <select name="is_check">
    <option value="0" <?php if ($this->_var['user_seller_info']['is_check'] == 0): ?> selected="true" <?php endif; ?>>未审核</option>
    <option value="1" <?php if ($this->_var['user_seller_info']['is_check'] == 1): ?> selected="true" <?php endif; ?>>审核通过</option>
    <option value="2" <?php if ($this->_var['user_seller_info']['is_check'] == 2): ?> selected="true" <?php endif; ?>>审核不通过</option>
    </select>
    </td>
  </tr>
  <tr>
  	<td class="label"></td>
    <td><input type="submit" class="button" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
      <input type="reset" class="button" value="<?php echo $this->_var['lang']['button_reset']; ?>" />
      <input type="hidden" name="act" value="u_s_update" />
      <input type="hidden" name="id" value="<?php echo $this->_var['user_seller_info']['id']; ?>" />
      <input type="hidden" name="uid" value="<?php echo $this->_var['user_seller_info']['user_id']; ?>" />
      </td>
  </tr>
</table>
</form>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>

<script language="JavaScript">
/**
 * 检查表单输入的数据
 */
//function validate()
//{
//    validator = new Validator("theForm");
//    validator.required("suppliers_name",  no_suppliers_name);
//    return validator.passed();
//}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>