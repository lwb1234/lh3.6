<script type="text/javascript">
			var _currentCat = '0';
			function toggleCatgory1(c) {
	var g = $("#JS_category_body_" + c);
	var j = $("#JS_category_icon2_" + c);
	var h = $("#JS_category_title_" + c);
	var d = $("#JS_category_body_" + _currentCat);
	var i = $("#JS_category_icon2_" + _currentCat);
	var e = $("#JS_category_title_" + _currentCat);
	if (g && j) {
		if (_currentCat == c) {
			i.html("+");
			d.addClass("none");
			_currentCat = -1;
		} else {
			var f = g.find("b");
			var k = g.find("dd");
			g.removeClass("none");
			j.html("-");
			if (_currentCat != "-1" && d && i) {
				d.addClass("none");
				i.html("+");
			}
			_currentCat = c;
		}
	}
}
function toggleCatgory2(e) {
	e = $(e);
	if (e.length) {
		var a = e;
		var c = e.parent().parent().find("dd").eq(0);
		if (a.prop("nodeName") != "B") {
			a = e.find("b").eq(0);
			c = e.parent().find("dd").eq(0);
		}
	}
	if (a.length) {
		if (a.hasClass("current")) {
			a.html("+");
			a.removeClass("current");
			c.addClass("none");
			return false;
		} else {
			a.html("&minus;");
			a.addClass("current");
			c.removeClass("none");
		}
	}
}
		</script>
<div class="category">
      <div class="cate_title">所有分类</div>
	  <?php $_from = get_categories_tree(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_39955500_1509589921');$this->_foreach['cat_tree'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_tree']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_39955500_1509589921']):
        $this->_foreach['cat_tree']['iteration']++;
?>
      <div class="category_title" onclick="toggleCatgory1(<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>);return false;"><a class="" href="<?php echo $this->_var['cat_0_39955500_1509589921']['url']; ?>" id="JS_category_title_<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>" onclick="return false;"><?php echo htmlspecialchars($this->_var['cat_0_39955500_1509589921']['name']); ?></a><span class="icon2" id="JS_category_icon2_<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>"><?php if (($this->_foreach['cat_tree']['iteration'] - 1) == 0): ?>-<?php else: ?>+<?php endif; ?></span></div>
      <div id="JS_category_body_<?php echo ($this->_foreach['cat_tree']['iteration'] - 1); ?>" class="category_body <?php if (($this->_foreach['cat_tree']['iteration'] - 1) != 0): ?>none<?php endif; ?>">
	  <?php $_from = $this->_var['cat_0_39955500_1509589921']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_40055600_1509589921');$this->_foreach['cat_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['child_0_40055600_1509589921']):
        $this->_foreach['cat_cat_id']['iteration']++;
?>	
        <dl class="wofang <?php if ($this->_foreach['cat_cat_id']['iteration'] == 1): ?>first<?php endif; ?>">
          <dt><b class="<?php if ($this->_var['child_0_40055600_1509589921']['id'] == $this->_var['p_id'] || $this->_var['child_0_40055600_1509589921']['id'] == $this->_var['category']): ?>current<?php endif; ?>" onclick="toggleCatgory2(this);return false;"><?php if ($this->_var['child_0_40055600_1509589921']['id'] == $this->_var['p_id'] || $this->_var['child_0_40055600_1509589921']['id'] == $this->_var['category']): ?>−<?php else: ?>+<?php endif; ?></b><a href="<?php echo $this->_var['child_0_40055600_1509589921']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['child_0_40055600_1509589921']['name']); ?>"><?php echo htmlspecialchars($this->_var['child_0_40055600_1509589921']['name']); ?></a></dt>
          <dd class="<?php if ($this->_var['child_0_40055600_1509589921']['id'] == $this->_var['p_id'] || $this->_var['child_0_40055600_1509589921']['id'] == $this->_var['category']): ?><?php else: ?>none<?php endif; ?>"> <?php $_from = $this->_var['child_0_40055600_1509589921']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer_0_40155600_1509589921');if (count($_from)):
    foreach ($_from AS $this->_var['childer_0_40155600_1509589921']):
?><span><a <?php if ($this->_var['childer_0_40155600_1509589921']['id'] == $this->_var['category']): ?>class="current"<?php endif; ?> href="<?php echo $this->_var['childer_0_40155600_1509589921']['url']; ?>"><?php echo htmlspecialchars($this->_var['childer_0_40155600_1509589921']['name']); ?></a></span><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </dd>
        </dl>
	   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
        
      </div>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
    </div>
