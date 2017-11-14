<table width="100%"  cellpadding="0" cellspacing="0" >
			<?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');$this->_foreach['shipping_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping_list']['total'] > 0):
    foreach ($_from AS $this->_var['shipping']):
        $this->_foreach['shipping_list']['iteration']++;
?>
			<tr><td width="30%" height=25  valign=top>
			<input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>"  supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" /> <?php echo $this->_var['shipping']['shipping_name']; ?> 
			[<?php echo $this->_var['shipping']['format_shipping_fee']; ?>]
			</td>
			<td width="70%" valign=top>
			<?php echo $this->_var['shipping']['shipping_desc']; ?>
			</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</table>