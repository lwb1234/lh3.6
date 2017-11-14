<?php
/**
 * 前台秒杀处理代码 链接redis 数据库
 * mywatchkey  -- 用于存储抢购的数量
 * mywatchlist -- 用户存储抢购列表
 * Created by PhpStorm.
 * User:  lee
 * Date: 2017/9/22
 * Time: 9:45
 *
 */

//秒杀先不做验证 同一个人多次秒杀
//接收用户的秒杀产品数量，默认就为一，
//$seckill_num  =  isset($_POST['num'])  ?   $_POST['num'] : '1';

/* 查询：检查秒杀活动是否是进行中 */
if ($seckill_buy['status'] != SBS_UNDER_WAY)
{
    show_message($_LANG['gb_error_status'], '', '', 'error');
}
//****************************************************************************
$redis = new redis();
$result = $redis->connect('127.0.0.1', 6379);
//设置秒杀产品数量的值 在这里先设置为只能抢一件商品  即 $number = 1
$redis->set('mywatchkey',$number);
//获得产品数量值
$mywatchkey = $redis->get("mywatchkey");
$total = 1 ;
$sec_total = $redis->set('total',$total); // 在这里设置下，总共产品数量

//如果当前秒杀产品的数量小于秒杀剩余的产品数量则可以秒杀
if($mywatchkey <= $sec_total){
    //监听产品数量
    $redis->watch("mywatchkey");
    $redis->multi(); //事物开始标记

    //设置延迟，方便测试效果
    sleep(5);
    //插入抢购数据
    $redis->hSet("mywatchlist",$_SESSION['user_id'],time()); //设置hash表字段，用户ID用时间戳
    //开始执行
    $rob_result = $redis->exec();

    if($rob_result){
        //存储抢购成功用户
        $mywatchlist = $redis->hGetAll("mywatchlist");

        $attr_list = array();
        $sql = "SELECT user_id ,user_name " .
            "FROM " . $ecs->table('seckill_users');

        $res = $db->query($sql);
        while ($row = $db->fetchRow($res))
        {
            $attr_list[] = $row['user_id'] ;
        }

        if(in_array($_SESSION['user_id'],$attr_list)){
            show_message('您已经秒杀过了哦！', '', '', 'info',$auto_redirect = true);
        }
        $redis->set('total',$total--);

        /*
       * 将产品数量在数据库减少一个
       */

//        $restrict_amount = array(
//           'ext_info' => $seckill_buy['restrict_amount']--
//        );
//        $res = $db->autoExecute($ecs->table('seckill_users'),$restrict_amount,'INSERT');
//       var_dump($sql);
//        $res = $db->query($sql);
//        if($res){
//            show_message('很抱歉，您秒杀失败，谢谢您的参与！', '', '', 'info',$auto_redirect = true);
//        }

        $user = array(
            'user_id' => $_SESSION['user_id'],
            'user_name' => $_SESSION['user_name']
        );
          $res = $db->autoExecute($ecs->table('seckill_users'),$user,'INSERT');
        if(!$res){
            show_message('您已经秒杀过了哦！', '', '', 'info',$auto_redirect = true);
        }
        /* 更新：清空购物车中所有秒杀商品 */
        include_once(ROOT_PATH . 'includes/lib_order.php');

        clear_cart(CART_SECKILL_BUY_GOODS);//就是清空数据表

        /* 更新：加入购物车 */
        $goods_price = $seckill_buy['deposit'] > 0 ? $seckill_buy['deposit'] : $seckill_buy['cur_price'];
        $cart = array(
            'user_id'        => $_SESSION['user_id'],
            'session_id'     => SESS_ID,
            'goods_id'       => $seckill_buy['goods_id'],
            'product_id'     => $product_info['product_id'],
            'goods_sn'       => addslashes($goods['goods_sn']),
            'goods_name'     => addslashes($goods['goods_name']),
            'market_price'   => $goods['market_price'],
            'goods_price'    => $goods_price,
            'goods_number'   => $number,
            'goods_attr'     => addslashes($goods_attr),
            'goods_attr_id'  => $specs,
            'is_real'        => $goods['is_real'],
            'extension_code' => addslashes($goods['extension_code']),
            'parent_id'      => 0,
            'rec_type'       => CART_SECKILL_BUY_GOODS,
            'is_gift'        => 0
        );
        $db->autoExecute($ecs->table('cart'), $cart, 'INSERT');

        /* 更新：记录购物流程类型：秒杀 */
        $_SESSION['flow_type'] = CART_SECKILL_BUY_GOODS;
        $_SESSION['extension_code'] = 'seckill_buy';
        $_SESSION['extension_id'] = $seckill_buy;
        ecs_header("Location: ./flow.php?step=checkout\n");//888
//        //将秒杀活动的开关关掉
//        define (SBS_UNDER_WAY , 0) ;

        //先写在这
//        seckill_success();
//        echo "抢购成功！<br/>";
//        echo "是否支付？支付，否就放弃！";
//        echo "剩余数量：".($rob_total-$mywatchkey-1)."<br/>";
//        echo "用户列表：<pre>";
//        var_dump($mywatchlist);  //打印抢购成功用户
    }else{
         //秒杀失败
        show_message('很抱歉，您秒杀失败，谢谢您的参与！', '', '', 'info',$auto_redirect = true);
    }
}else{
    show_message('秒杀活动已结束，感谢您的参与！', '', '', 'info',$auto_redirect = true);
}
