<?php
/**
 * Created by PhpStorm.
 * User:  lee
 * Date: 2017/10/08
 * Time: 10:45
 *  需求直接搭载mysql的进行秒杀模块
 */

//秒杀先不做验证 同一个人多次秒杀
//接收用户的秒杀产品数量就能抢一个，将改成多穿产品秒杀，
$seckill_num  =  isset($_POST['num'])  ?   $_POST['num'] : '1';

define('IN_ECS', true);
// 路径写错了 改  by lee start
require(dirname(__FILE__) . '/themes/meilele/init.php');
// 路径写错了 改  by lee end
require(dirname(__FILE__) . '/includes/init.php');
/*------------------------------------------------------ */
//-- act 操作项的初始化
/*------------------------------------------------------ */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'list';
}
/* 查询：检查秒杀活动是否是进行中 */
if ($seckill_buy['status'] != SBS_UNDER_WAY)
{
    show_message($_LANG['gb_error_status'], '', '', 'error');
}
//****************************************************************************
      $user = array(
            'user_id' => $_SESSION['user_id'],
            'user_name' => $_SESSION['user_name']
        );
          $res = $db->autoExecute($ecs->table('seckill_users'),$user,'INSERT');
if(!$res){
    show_message('您已经秒杀过了哦！', '', '', 'info',$auto_redirect = true);
}

/* 查询：取得秒杀商品信息 */
$goods = goods_info($group_buy['goods_id']);
if (empty($goods))
{
    ecs_header("Location: ./\n");
    exit;
}

/* 查询：判断数量是否足够 */
if (($group_buy['restrict_amount'] > 0 && $seckill_num > ($group_buy['restrict_amount'] - $group_buy['valid_goods'])) || $seckill_num > $goods['goods_number'])
{
    show_message('很抱歉，您秒杀失败，谢谢您的参与！', '', '', 'info',$auto_redirect = true);

}


/* 查询：如果商品有规格则取规格商品信息 配件除外 */
/* 查询：取得规格 */
$specs = '';
foreach ($_POST as $key => $value)
{
    if (strpos($key, 'spec_') !== false)
    {
        $specs .= ',' . intval($value);
    }
}
$specs = trim($specs, ',');
if ($specs)
{
    $_specs = explode(',', $specs);
    $product_info = get_products_info($goods['goods_id'], $_specs);
}

empty($product_info) ? $product_info = array('product_number' => 0, 'product_id' => 0) : '';

/* 查询：判断指定规格的货品数量是否足够 */
if ($specs && $seckill_num > $product_info['product_number'])
{
    show_message($_LANG['gb_error_goods_lacking'], '', '', 'error');
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
            'goods_number'   => $seckill_num,
            'goods_attr'     => addslashes($goods['goods_attr']),
            'goods_attr_id'  => $specs,
            'is_real'        => $goods['is_real'],
            'extension_code' => addslashes($goods['extension_code']),
            'parent_id'      => 0,
            'rec_type'       => CART_SECKILL_BUY_GOODS,
            'is_gift'        => 0
        );
       $res = $db->autoExecute($ecs->table('cart'), $cart, 'INSERT');
 if($res) {
    /* 更新：记录购物流程类型：秒杀 */
    $_SESSION['flow_type'] = CART_SECKILL_BUY_GOODS;
    $_SESSION['extension_code'] = 'seckill_buy';
    $_SESSION['extension_id'] = $seckill_buy;
    ecs_header("Location: ./flow.php?step=checkout\n");
 }

else{
    show_message('秒杀活动已结束，感谢您的参与！', '', '', 'info',$auto_redirect = true);
}
