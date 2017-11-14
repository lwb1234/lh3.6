       <script   type="text/javascript">
        var Tday = new Array();
        var daysms = 24 * 60 * 60 * 1000
        var hoursms = 60 * 60 * 1000
        var Secondms = 60 * 1000
        var microsecond = 1000
        var DifferHour = -1
        var DifferMinute = -1
        var DifferSecond = -1

        function clock(key)
        {
           //声明变量
            var time = new Date()
            var hour = time.getHours()
            var minute = time.getMinutes()
            var second = time.getSeconds()
            var timevalue = ""+((hour > 12) ? hour-12:hour)
            timevalue +=((minute < 10) ? ":0":":")+minute
            timevalue +=((second < 10) ? ":0":":")+second
            timevalue +=((hour >12 ) ? " PM":" AM")
            var convertHour = DifferHour
            var convertMinute = DifferMinute
            var convertSecond = DifferSecond
            var Diffms = Tday[key].getTime() - time.getTime()
            DifferHour = Math.floor(Diffms / daysms)
            Diffms -= DifferHour * daysms
            DifferMinute = Math.floor(Diffms / hoursms)
            Diffms -= DifferMinute * hoursms
            DifferSecond = Math.floor(Diffms / Secondms)
            Diffms -= DifferSecond * Secondms
            var dSecs = Math.floor(Diffms / microsecond)

            if(convertHour != DifferHour) a="<font color=#000>"+DifferHour+"</font>天";
            if(convertMinute != DifferMinute) b="<font color=#000>"+DifferMinute+"</font>时";
            if(convertSecond != DifferSecond) c="<font color=#000>"+DifferSecond+"</font>分" ;
            d="<font color=#000>"+dSecs+"</font>秒" ;
            if (DifferHour>0) {a=a}
            else {a=''}
            document.getElementById("leftTime"+key).innerHTML = a + b + c + d; //显示倒计时信息

        }
    </script>
    <link href="themes/meilele/css/seckill_style.css" rel="stylesheet"/>
   <!-- <script src="themes/meilele/js/plugin/seckill_javascript.js"></script> -->
    <script type="text/javascript" src="themes/meilele/js/plugin/seckill_jquery.SuperSlide.js"></script>
<div id="mshd">
    <div class="msdjs">
        <div class="mssz"></div>
        <h2>黎华秒杀</h2>
        <span class="a1"><b>总有你想不到的低价</b></span>
        <?php $_from = $this->_var['seckill_buy_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods_0_56089700_1509583845');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods_0_56089700_1509583845']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>

       <?php if ($this->_foreach['promotion_foreach']['iteration'] == 1): ?>
        <div class="djstx">
       <span>当前场次</span>
       <font class="f1"><?php echo $this->_var['goods_0_56089700_1509583845']['promote_price']; ?></font><br><font class="f4" id="leftTime<?php echo $this->_var['key']; ?>"></font>
        <div class= 'seckill_end'>后结束抢购</div>
         </div>
       <script>
            Tday[<?php echo $this->_var['key']; ?>] = new Date("<?php echo $this->_var['goods_0_56089700_1509583845']['end_time']; ?>");
            window.setInterval(function()
            {clock(<?php echo $this->_var['key']; ?>);}, 1000);
        </script>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <div class="clr"></div>
    <div class="mshd2">
        <div class="scrollBox">
            <div class="ohbox">
                <div class="tempWrap" style="overflow:hidden; position:relative; width:1200px"; float:left;>
                    <ul class="piclist" style="width:1000px; position: relative; overflow: hidden; margin:0 auto;">
                        <?php $_from = $this->_var['seckill_buy_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods_0_56189700_1509583845');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods_0_56189700_1509583845']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>
                        <?php if (($this->_foreach['promotion_foreach']['iteration'] - 1) <= 3): ?>
                        <li style="width:300px;">
                            <a href="<?php echo $this->_var['goods_0_56189700_1509583845']['url']; ?>" target="_blank">
                            <img src="themes/meilele/images/1.jpg"><span><?php echo htmlspecialchars($this->_var['goods_0_56189700_1509583845']['short_name']); ?></span>
                            <div class="jg">
                                <div class="msj"><?php echo $this->_var['goods_0_56189700_1509583845']['last_price']; ?>
                                </div>
                                <div class="yj">
                                    <del>￥<?php echo $this->_var['goods_0_56189700_1509583845']['market_price']; ?></del>
                                </div>
                            </div>
                            </a>
                        </li>
                        <?php endif; ?>
                  <!--      <script>
                            Tday[<?php echo $this->_var['key']; ?>] = new Date("<?php echo $this->_var['goods_0_56189700_1509583845']['end_time']; ?>");
                            window.setInterval(function()
                            {clock(<?php echo $this->_var['key']; ?>);}, 1000);
                        </script>
                    -->
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
            <div class="pageBtn"><span class="prev">&lt;</span><span class="next">&gt;</span>
                <ul class="list">
                    <li class="on">0</li>
                    <li>1</li>

                </ul>
            </div>
        </div>
        <script type="text/javascript">jQuery(".scrollBox").slide({
            titCell: ".list li",
            mainCell: ".piclist",
            effect: "left",
            vis: 4,
            scroll:4,
            delayTime: 800,
            trigger: "click",
            easing: "easeOutCirc"
        });</script>
     <!--  <div class="mshd1"><img src="themes/meilele/images/59c4a4c3Nc608d3d0.jpg"></div> -->
    </div>
</div>
