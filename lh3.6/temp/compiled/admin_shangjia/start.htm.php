<!-- $Id: start.htm 17216 2011-01-19 06:03:12Z liubo $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<!-- start personal message -->
<?php if ($this->_var['admin_msg']): ?>
<div class="list-div">
  <table cellspacing='1' cellpadding='3'>
    <tr>
      <th><?php echo $this->_var['lang']['pm_title']; ?></th>
      <th><?php echo $this->_var['lang']['pm_username']; ?></th>
      <th><?php echo $this->_var['lang']['pm_time']; ?></th>
    </tr>
    <?php $_from = $this->_var['admin_msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'msg');if (count($_from)):
    foreach ($_from AS $this->_var['msg']):
?>
      <tr align="center">
        <td align="left"><a href="message.php?act=view&id=<?php echo $this->_var['msg']['message_id']; ?>"><?php echo sub_str($this->_var['msg']['title'],60); ?></a></td>
        <td><?php echo $this->_var['msg']['user_name']; ?></td>
        <td><?php echo $this->_var['msg']['sent_time']; ?></td>
      </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
</div>
<br/>
<?php endif; ?>
<!-- end personal message -->
<!-- start order statistics -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title"><?php echo $this->_var['lang']['order_stat']; ?></th>
  </tr>
  <tr>
    <td width="20%"><a href="order.php?act=list&composite_status=<?php echo $this->_var['status']['await_ship']; ?>"><?php echo $this->_var['lang']['await_ship']; ?></a></td>
    <td width="30%"><strong style="color: red"><?php echo $this->_var['order']['await_ship']; ?></strong></td>
    <td width="20%"><a href="order.php?act=list&composite_status=<?php echo $this->_var['status']['unconfirmed']; ?>"><?php echo $this->_var['lang']['unconfirmed']; ?></a></td>
    <td width="30%"><strong><?php echo $this->_var['order']['unconfirmed']; ?></strong></td>
  </tr>
  <tr>
    <td><a href="order.php?act=list&composite_status=<?php echo $this->_var['status']['await_pay']; ?>"><?php echo $this->_var['lang']['await_pay']; ?></a></td>
    <td><strong><?php echo $this->_var['order']['await_pay']; ?></strong></td>
    <td><a href="order.php?act=list&composite_status=<?php echo $this->_var['status']['finished']; ?>"><?php echo $this->_var['lang']['finished']; ?></a></td>
    <td><strong><?php echo $this->_var['order']['finished']; ?></strong></td>
  </tr>
  <tr>
    <td><a href="goods_booking.php?act=list_all"><?php echo $this->_var['lang']['new_booking']; ?></a></td>
    <td><strong><?php echo $this->_var['booking_goods']; ?></strong></td>
    <td><a href="order.php?act=list&composite_status=<?php echo $this->_var['status']['shipped_part']; ?>"><?php echo $this->_var['lang']['shipped_part']; ?></a></td>
    <td><strong><?php echo $this->_var['order']['shipped_part']; ?></strong></td>
  </tr>
</table>
</div>
<!-- end order statistics -->
<br />
<!-- start goods statistics -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title"><?php echo $this->_var['lang']['goods_stat']; ?></th>
  </tr>
  <tr>
    <td width="20%"><?php echo $this->_var['lang']['goods_count']; ?></td>
    <td width="30%"><strong><?php echo $this->_var['goods']['total']; ?></strong></td>
    <td width="20%"><a href="goods.php?act=list&stock_warning=1"><?php echo $this->_var['lang']['warn_goods']; ?></a></td>
    <td width="30%"><strong style="color: red"><?php echo $this->_var['goods']['warn']; ?></strong></td>
  </tr>
  <!--<tr>
    <td><a href="goods.php?act=list&amp;intro_type=is_new"><?php echo $this->_var['lang']['new_goods']; ?></a></td>
    <td><strong><?php echo $this->_var['goods']['new']; ?></strong></td>
    <td><a href="goods.php?act=list&amp;intro_type=is_best"><?php echo $this->_var['lang']['recommed_goods']; ?></a></td>
    <td><strong><?php echo $this->_var['goods']['best']; ?></strong></td>
  </tr>
  <tr>
    <td><a href="goods.php?act=list&amp;intro_type=is_hot"><?php echo $this->_var['lang']['hot_goods']; ?></a></td>
    <td><strong><?php echo $this->_var['goods']['hot']; ?></strong></td>
    <td><a href="goods.php?act=list&amp;intro_type=is_promote"><?php echo $this->_var['lang']['sales_count']; ?></a></td>
    <td><strong><?php echo $this->_var['goods']['promote']; ?></strong></td>
  </tr>-->
</table>
</div>

<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js')); ?>
<script type="Text/Javascript" language="JavaScript">
<!--
onload = function()
{
  /* 检查订单 */
  startCheckOrder();
}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>
