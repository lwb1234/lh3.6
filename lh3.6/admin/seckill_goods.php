<?php
/**
 *ECSHOP 管理中心拍卖活动管理     自定义插件
 * Created by PhpStorm.
 * User: lee
 * Date: 2017/9/21
 * Time: 11:07
 */

 define('IN_ECS', true);
 require(dirname(__FILE__) . '/includes/init.php');
 require(ROOT_PATH . 'includes/lib_goods.php');
 require_once(ROOT_PATH . 'includes/lib_order.php');

 $exc = new exchange($ecs->table('goods_activity'), $db, 'act_id', 'act_name');

 /*------------------------------------------------------ */
 //-- 活动列表页
 /*------------------------------------------------------ */

 if ($_REQUEST['act'] == 'list')
 {
     /* 检查权限 */
     admin_priv('seckill');

     /* 模板赋值 */
     $smarty->assign('full_page',   1);
     $smarty->assign('ur_here',     $_LANG['seckill_list']);
     //在这里要被分配到headerpage.htm里面
     $smarty->assign('action_link', array('href' => 'seckill_goods.php?act=add', 'text' => $_LANG['add_seckill']));

     $list = seckill_list();

     $smarty->assign('seckill', $list['item']);
     $smarty->assign('filter',       $list['filter']);
     $smarty->assign('record_count', $list['record_count']);
     $smarty->assign('page_count',   $list['page_count']);
     $smarty->assign('form_action','add');
     $sort_flag  = sort_flag($list['filter']);
     $smarty->assign($sort_flag['tag'], $sort_flag['img']);

     /* 显示商品列表页面 */
     assign_query_info();
     $smarty->display('seckill_list.htm');

 }

 /*------------------------------------------------------ */
 //-- 分页、排序、查询
 /*------------------------------------------------------ */

 elseif ($_REQUEST['act'] == 'query')
 {
    // 获取参加秒杀活动的商品
     $list = seckill_list();
    var_dump();exit;
     $smarty->assign('seckill_list', $list['item']);
     $smarty->assign('filter',       $list['filter']);
     $smarty->assign('record_count', $list['record_count']);
     $smarty->assign('page_count',   $list['page_count']);

     $sort_flag  = sort_flag($list['filter']);
     $smarty->assign($sort_flag['tag'], $sort_flag['img']);

     make_json_result($smarty->fetch('seckill_list.htm'), '',
         array('filter' => $list['filter'], 'page_count' => $list['page_count']));
 }

 /*------------------------------------------------------ */
 //-- 删除
 /*------------------------------------------------------ */
 elseif ($_REQUEST['act'] == 'remove')
 {
     check_authz_json('seckill');

     $id = intval($_GET['id']);
     $name = $auction['act_name'];
     $exc->drop($id);

     /* 记日志 */
     admin_log($name, 'remove', 'seckill');

     /* 清除缓存 */
     clear_cache_files();

     $url = 'seckill_goods.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

     ecs_header("Location: $url\n");
     exit;
 }

 /*------------------------------------------------------ */
 //-- 批量操作
 /*------------------------------------------------------ */
 elseif ($_REQUEST['act'] == 'batch')
 {
     /* 取得要操作的记录编号 */
     if (empty($_POST['checkboxes']))
     {
         sys_msg($_LANG['no_record_selected']);
     }
     else
     {
         /* 检查权限 */
         admin_priv('auction');

         $ids = $_POST['checkboxes'];

                 /* 删除记录 */
                 $sql = "DELETE FROM " . $ecs->table('goods_activity') .
                         " WHERE act_id " . db_create_in($ids) .
                         " AND act_type = '" . GAT_SECKILL . "'";
                 $db->query($sql);
              var_dump();exit;
                 /* 记日志 */
                 admin_log('', 'batch_remove', 'seckill');

                 /* 清除缓存 */
                 clear_cache_files();
             $links[] = array('text' => $_LANG['back_seckill_list'], 'href' => 'seckill_goods.php?act=list&' . list_link_postfix());
             sys_msg($_LANG['batch_drop_ok'], 0, $links);
         }
     }




 /*------------------------------------------------------ */
 //-- 添加、编辑
 /*------------------------------------------------------ */

 elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
 {
     /* 检查权限 */
     admin_priv('seckill');

     /* 是否添加 */
     $is_add = $_REQUEST['act'] == 'add';
     $smarty->assign('form_action', $is_add ? 'insert' : 'update');

     /* 初始化、取得拍卖活动信息 */
     if ($is_add)
     {
         $seckill_buy = array(
             'act_id'        => 0,
             'act_name'      => '',
             'act_desc'      => '',
             'goods_id'      => 0,
             'product_id'    => 0,
             'goods_name'    => $_LANG['pls_search_goods'],
             'start_time'    => date('Y-m-d', time() + 86400),
             'end_time'      => date('Y-m-d', time() + 4 * 86400),
             'price_ladder'  => array(array('amount' => 0, 'price' => 0))
         );
     }

     else
     {
         $seckill_buy_id = intval($_GET['id']);
         if (empty($_GET['id']))
         {
             sys_msg('invalid param');
         }

      /* $auction = auction_info($id, true);
         if (empty($auction))
         {
             sys_msg($_LANG['auction_not_exist']);
         }
         $auction['status'] = $_LANG['auction_status'][$auction['status_no']];
         $smarty->assign('bid_user_count', sprintf($_LANG['bid_user_count'], $auction['bid_user_count']));
        */
           $seckill_buy= seckill_buy_info($seckill_buy_id);
     }

     $smarty->assign('seckill', $seckill_buy);

     /* 赋值时间控件的语言 */
     $smarty->assign('cfg_lang', $_CFG['lang']);

     /* 商品货品表 */
     $smarty->assign('good_products_select', get_good_products_select($seckill['goods_id']));

     /* 显示模板 */
     if ($is_add)
     {
          /* 模板赋值 */
             $smarty->assign('ur_here', $_LANG['add_seckill_buy']);
             $smarty->assign('action_link', list_link($_REQUEST['act'] == 'add'));
             $smarty->assign('cat_list', cat_list());
             $smarty->assign('brand_list', get_brand_list());
         $smarty->assign('ur_here', $_LANG['add_seckill']);
     }
    /* $smarty->assign('action_link', list_link($is_add)); */
     assign_query_info();
     $smarty->display('seckill_buy_info.htm');
 }

 /*------------------------------------------------------ */
 //-- 添加、编辑后提交
 /*------------------------------------------------------ */

 elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update')
 {
     /* 检查权限 */
     admin_priv('seckill');

     /* 是否添加 */
     $is_add = $_REQUEST['act'] == 'insert';

     /* 检查是否选择了商品 */
     $goods_id = intval($_POST['goods_id']);
     if ($goods_id <= 0)
     {
         sys_msg($_LANG['pls_select_goods']);
     }
     $sql = "SELECT goods_name FROM " . $ecs->table('goods') . " WHERE goods_id = '$goods_id'";
     $row = $db->getRow($sql);
     if (empty($row))
     {
         sys_msg($_LANG['goods_not_exist']);
     }
     $goods_name = $row['goods_name'];

     /* 提交值 */
     $seckill = array(
         'act_id'        => intval($_POST['id']),
         'act_name'      => empty($_POST['act_name']) ? $goods_name : sub_str($_POST['act_name'], 255, false),
         'act_desc'      => $_POST['act_desc'],
         'act_type'      => GAT_SECKILL,
         'goods_id'      => $goods_id,
         'product_id'    => empty($_POST['product_id']) ? 0 : $_POST['product_id'],
         'goods_name'    => $goods_name,
         'start_time'    => local_strtotime($_POST['start_time']),
         'end_time'      => local_strtotime($_POST['end_time']),
         'ext_info'      => serialize(array(
                     'start_price'   => round(floatval($_POST['start_price']), 2),
                     'seckill_num'     => round(floatval($_POST['seckill_num']), 2)
                 ))
     );

     /* 保存数据 */
     if ($is_add)
     {
         $seckill['is_finished'] = 0;
         $db->autoExecute($ecs->table('goods_activity'), $seckill, 'INSERT');
         $seckill['act_id'] = $db->insert_id();
     }
     else
     {
         $db->autoExecute($ecs->table('goods_activity'), $seckill, 'UPDATE', "act_id = '$seckill[act_id]'");
     }

     /* 记日志 */
     if ($is_add)
     {
         admin_log($auction['act_name'], 'add', 'seckill');
     }
     else
     {
         admin_log($auction['act_name'], 'edit', 'seckill');
     }

     /* 清除缓存 */
     clear_cache_files();

     /* 提示信息 */
     if ($is_add)
     {
         $links = array(
             array('href' => 'seckill_goods.php?act=add', 'text' => $_LANG['continue_add_seckill']),
             array('href' => 'seckill_goods.php?act=list', 'text' => $_LANG['back_seckill_list'])
         );
         sys_msg($_LANG['add_seckill_ok'], 0, $links);
     }
     else
     {
         $links = array(
             array('href' => 'seckill_goods.php?act=list&' . list_link_postfix(), 'text' => $_LANG['back_seckill_list'])
         );
         sys_msg($_LANG['edit_seckill_ok'], 0, $links);
     }
 }

 /*------------------------------------------------------ */
 //-- 处理冻结资金
 /*------------------------------------------------------ */

 elseif ($_REQUEST['act'] == 'settle_money')
 {
     /* 检查权限 */
     admin_priv('auction');

     /* 检查参数 */
     if (empty($_POST['id']))
     {
         sys_msg('invalid param');
     }
     $id = intval($_POST['id']);
     $auction = auction_info($id);
     if (empty($auction))
     {
         sys_msg($_LANG['auction_not_exist']);
     }
     if ($auction['status_no'] != FINISHED)
     {
         sys_msg($_LANG['invalid_status']);
     }
     if ($auction['deposit'] <= 0)
     {
         sys_msg($_LANG['no_deposit']);
     }

     /* 处理保证金 */
     $exc->edit("is_finished = 2", $id); // 修改状态
     if (isset($_POST['unfreeze']))
     {
         /* 解冻 */
         log_account_change($auction['last_bid']['bid_user'], $auction['deposit'],
             (-1) * $auction['deposit'], 0, 0, sprintf($_LANG['unfreeze_auction_deposit'], $auction['act_name']));
     }
     else
     {
         /* 扣除 */
         log_account_change($auction['last_bid']['bid_user'], 0,
             (-1) * $auction['deposit'], 0, 0, sprintf($_LANG['deduct_auction_deposit'], $auction['act_name']));
     }

     /* 记日志 */
     admin_log($auction['act_name'], 'edit', 'auction');

     /* 清除缓存 */
     clear_cache_files();

     /* 提示信息 */
     sys_msg($_LANG['settle_deposit_ok']);
 }

 /*------------------------------------------------------ */
 //-- 搜索商品
 /*------------------------------------------------------ */

 elseif ($_REQUEST['act'] == 'search_goods')
 {
     check_authz_json('auction');

     include_once(ROOT_PATH . 'includes/cls_json.php');

     $json   = new JSON;
     $filter = $json->decode($_GET['JSON']);
     $arr['goods']    = get_goods_list($filter);

     if (!empty($arr['goods'][0]['goods_id']))
     {
         $arr['products'] = get_good_products($arr['goods'][0]['goods_id']);
     }

     make_json_result($arr);
 }

 /*------------------------------------------------------ */
 //-- 搜索货品
 /*------------------------------------------------------ */

 elseif ($_REQUEST['act'] == 'search_products')
 {
     include_once(ROOT_PATH . 'includes/cls_json.php');
     $json = new JSON;

     $filters = $json->decode($_GET['JSON']);

     if (!empty($filters->goods_id))
     {
         $arr['products'] = get_good_products($filters->goods_id);
     }

     make_json_result($arr);
 }
 
/*------------------------------------------------------ */
//-- 添加/编辑团购活动的提交
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] =='insert_update')
{
    /* 取得团购活动id */
    $seckill_buy_id = intval($_POST['act_id']);
    if (isset($_POST['finish']) || isset($_POST['succeed']) || isset($_POST['fail']) || isset($_POST['mail']))
    {
        if ($seckill_buy_id <= 0)
        {
            sys_msg($_LANG['error_seckill_buy'], 1);
        }
        $seckill_buy = seckill_buy_info($seckill_buy_id);
        if (empty($seckill_buy))
        {
            sys_msg($_LANG['error_seckill_buy'], 1);
        }
    }

    if (isset($_POST['finish']))
    {
        /* 判断订单状态 */
        if ($seckill_buy['status'] != GBS_UNDER_WAY)
        {
            sys_msg($_LANG['error_status'], 1);
        }

        /* 结束团购活动，修改结束时间为当前时间 */
        $sql = "UPDATE " . $ecs->table('goods_activity') .
                " SET end_time = '" . gmtime() . "' " .
                "WHERE act_id = '$seckill_buy_id' LIMIT 1";
        $db->query($sql);

        /* 清除缓存 */
        clear_cache_files();

        /* 提示信息 */
        $links = array(
            array('href' => 'seckill_buy.php?act=list', 'text' => $_LANG['back_list'])
        );
        sys_msg($_LANG['edit_success'], 0, $links);
    }
    elseif (isset($_POST['succeed']))
    {
        /* 设置活动成功 */

        /* 判断订单状态 */
        if ($seckill_buy['status'] != GBS_FINISHED)
        {
            sys_msg($_LANG['error_status'], 1);
        }

        /* 如果有订单，更新订单信息 */
        if ($seckill_buy['total_order'] > 0)
        {
            /* 查找该团购活动的已确认或未确认订单（已取消的就不管了） */
            $sql = "SELECT order_id " .
                    "FROM " . $ecs->table('order_info') .
                    " WHERE extension_code = 'seckill_buy' " .
                    "AND extension_id = '$seckill_buy_id' " .
                    "AND (order_status = '" . OS_CONFIRMED . "' or order_status = '" . OS_UNCONFIRMED . "')";
            $order_id_list = $db->getCol($sql);

            /* 更新订单商品价 */
            $final_price = $seckill_buy['trans_price'];
            $sql = "UPDATE " . $ecs->table('order_goods') .
                    " SET goods_price = '$final_price' " .
                    "WHERE order_id " . db_create_in($order_id_list);
            $db->query($sql);

            /* 查询订单商品总额 */
            $sql = "SELECT order_id, SUM(goods_number * goods_price) AS goods_amount " .
                    "FROM " . $ecs->table('order_goods') .
                    " WHERE order_id " . db_create_in($order_id_list) .
                    " GROUP BY order_id";
            $res = $db->query($sql);
            while ($row = $db->fetchRow($res))
            {
                $order_id = $row['order_id'];
                $goods_amount = floatval($row['goods_amount']);

                /* 取得订单信息 */
                $order = order_info($order_id);

                /* 判断订单是否有效：余额支付金额 + 已付款金额 >= 保证金 */
                if ($order['surplus'] + $order['money_paid'] >= $seckill_buy['deposit'])
                {
                    /* 有效，设为已确认，更新订单 */

                    // 更新商品总额
                    $order['goods_amount'] = $goods_amount;

                    // 如果保价，重新计算保价费用
                    if ($order['insure_fee'] > 0)
                    {
                        $shipping = shipping_info($order['shipping_id']);
                        $order['insure_fee'] = shipping_insure_fee($shipping['shipping_code'], $goods_amount, $shipping['insure']);
                    }

                    // 重算支付费用
                    $order['order_amount'] = $order['goods_amount'] + $order['shipping_fee']
                        + $order['insure_fee'] + $order['pack_fee'] + $order['card_fee']
                        - $order['money_paid'] - $order['surplus'];
                    if ($order['order_amount'] > 0)
                    {
                        $order['pay_fee'] = pay_fee($order['pay_id'], $order['order_amount']);
                    }
                    else
                    {
                        $order['pay_fee'] = 0;
                    }

                    // 计算应付款金额
                    $order['order_amount'] += $order['pay_fee'];

                    // 计算付款状态
                    if ($order['order_amount'] > 0)
                    {
                        $order['pay_status'] = PS_UNPAYED;
                        $order['pay_time'] = 0;
                    }
                    else
                    {
                        $order['pay_status'] = PS_PAYED;
                        $order['pay_time'] = gmtime();
                    }

                    // 如果需要退款，退到帐户余额
                    if ($order['order_amount'] < 0)
                    {
                        // todo （现在手工退款）
                    }

                    // 订单状态
                    $order['order_status'] = OS_CONFIRMED;
                    $order['confirm_time'] = gmtime();

                    // 更新订单
                    $order = addslashes_deep($order);
                    update_order($order_id, $order);
                }
                else
                {
                    /* 无效，取消订单，退回已付款 */

                    // 修改订单状态为已取消，付款状态为未付款
                    $order['order_status'] = OS_CANCELED;
                    $order['to_buyer'] = $_LANG['cancel_order_reason'];
                    $order['pay_status'] = PS_UNPAYED;
                    $order['pay_time'] = 0;

                    /* 如果使用余额或有已付款金额，退回帐户余额 */
                    $money = $order['surplus'] + $order['money_paid'];
                    if ($money > 0)
                    {
                        $order['surplus'] = 0;
                        $order['money_paid'] = 0;
                        $order['order_amount'] = $money;

                        // 退款到帐户余额
                        order_refund($order, 1, $_LANG['cancel_order_reason'] . ':' . $order['order_sn']);
                    }

                    /* 更新订单 */
                    $order = addslashes_deep($order);
                    update_order($order['order_id'], $order);
                }
            }
        }

        /* 修改团购活动状态为成功 */
        $sql = "UPDATE " . $ecs->table('goods_activity') .
                " SET is_finished = '" . GBS_SUCCEED . "' " .
                "WHERE act_id = '$seckill_buy_id' LIMIT 1";
        $db->query($sql);

        /* 清除缓存 */
        clear_cache_files();

        /* 提示信息 */
        $links = array(
            array('href' => 'seckill_buy.php?act=list', 'text' => $_LANG['back_list'])
        );
        sys_msg($_LANG['edit_success'], 0, $links);
    }
    elseif (isset($_POST['fail']))
    {
        /* 设置活动失败 */

        /* 判断订单状态 */
        if ($seckill_buy['status'] != GBS_FINISHED)
        {
            sys_msg($_LANG['error_status'], 1);
        }

        /* 如果有有效订单，取消订单 */
        if ($seckill_buy['valid_order'] > 0)
        {
            /* 查找未确认或已确认的订单 */
            $sql = "SELECT * " .
                    "FROM " . $ecs->table('order_info') .
                    " WHERE extension_code = 'seckill_buy' " .
                    "AND extension_id = '$seckill_buy_id' " .
                    "AND (order_status = '" . OS_CONFIRMED . "' OR order_status = '" . OS_UNCONFIRMED . "') ";
            $res = $db->query($sql);
            while ($order = $db->fetchRow($res))
            {
                // 修改订单状态为已取消，付款状态为未付款
                $order['order_status'] = OS_CANCELED;
                $order['to_buyer'] = $_LANG['cancel_order_reason'];
                $order['pay_status'] = PS_UNPAYED;
                $order['pay_time'] = 0;

                /* 如果使用余额或有已付款金额，退回帐户余额 */
                $money = $order['surplus'] + $order['money_paid'];
                if ($money > 0)
                {
                    $order['surplus'] = 0;
                    $order['money_paid'] = 0;
                    $order['order_amount'] = $money;

                    // 退款到帐户余额
                    order_refund($order, 1, $_LANG['cancel_order_reason'] . ':' . $order['order_sn'], $money);
                }

                /* 更新订单 */
                $order = addslashes_deep($order);
                update_order($order['order_id'], $order);
            }
        }

        /* 修改团购活动状态为失败，记录失败原因（活动说明） */
        $sql = "UPDATE " . $ecs->table('goods_activity') .
                " SET is_finished = '" . GBS_FAIL . "', " .
                    "act_desc = '$_POST[act_desc]' " .
                "WHERE act_id = '$seckill_buy_id' LIMIT 1";
        $db->query($sql);

        /* 清除缓存 */
        clear_cache_files();

        /* 提示信息 */
        $links = array(
            array('href' => 'seckill_buy.php?act=list', 'text' => $_LANG['back_list'])
        );
        sys_msg($_LANG['edit_success'], 0, $links);
    }
    elseif (isset($_POST['mail']))
    {
        /* 发送通知邮件 */

        /* 判断订单状态 */
        if ($seckill_buy['status'] != GBS_SUCCEED)
        {
            sys_msg($_LANG['error_status'], 1);
        }

        /* 取得邮件模板 */
        $tpl = get_mail_template('seckill_buy');

        /* 初始化订单数和成功发送邮件数 */
        $count = 0;
        $send_count = 0;

        /* 取得有效订单 */
        $sql = "SELECT o.consignee, o.add_time, g.goods_number, o.order_sn, " .
                    "o.order_amount, o.order_id, o.email " .
                "FROM " . $ecs->table('order_info') . " AS o, " .
                    $ecs->table('order_goods') . " AS g " .
                "WHERE o.order_id = g.order_id " .
                "AND o.extension_code = 'seckill_buy' " .
                "AND o.extension_id = '$seckill_buy_id' " .
                "AND o.order_status = '" . OS_CONFIRMED . "'";
        $res = $db->query($sql);
        while ($order = $db->fetchRow($res))
        {
            /* 邮件模板赋值 */
            $smarty->assign('consignee',    $order['consignee']);
            $smarty->assign('add_time',     local_date($_CFG['time_format'], $order['add_time']));
            $smarty->assign('goods_name',   $seckill_buy['goods_name']);
            $smarty->assign('goods_number', $order['goods_number']);
            $smarty->assign('order_sn',     $order['order_sn']);
            $smarty->assign('order_amount', price_format($order['order_amount']));
            $smarty->assign('shop_url',     $ecs->url() . 'user.php?act=order_detail&order_id='.$order['order_id']);
            $smarty->assign('shop_name',    $_CFG['shop_name']);
            $smarty->assign('send_date',    local_date($_CFG['date_format']));

            /* 取得模板内容，发邮件 */
            $content = $smarty->fetch('str:' . $tpl['template_content']);
            if (send_mail($order['consignee'], $order['email'], $tpl['template_subject'], $content, $tpl['is_html']))
            {
                $send_count++;
            }
            $count++;
        }

        /* 提示信息 */
        sys_msg(sprintf($_LANG['mail_result'], $count, $send_count));
    }
    else
    {
        /* 保存团购信息 */
        $goods_id = intval($_POST['goods_id']);
        if ($goods_id <= 0)
        {
            sys_msg($_LANG['error_goods_null']);
        }
        $info = goods_seckill_buy($goods_id);
        if ($info && $info['act_id'] != $seckill_buy_id)
        {
            sys_msg($_LANG['error_goods_exist']);
        }

        $goods_name = $db->getOne("SELECT goods_name FROM " . $ecs->table('goods') . " WHERE goods_id = '$goods_id'");

        $act_name = empty($_POST['act_name']) ? $goods_name : sub_str($_POST['act_name'], 0, 255, false);

        $deposit = floatval($_POST['deposit']);
        if ($deposit < 0)
        {
            $deposit = 0;
        }

        $restrict_amount = intval($_POST['restrict_amount']);
        if ($restrict_amount < 0)
        {
            $restrict_amount = 0;
        }

        $gift_integral = intval($_POST['gift_integral']);
        if ($gift_integral < 0)
        {
            $gift_integral = 0;
        }

        $price_ladder = array();
        $count = count($_POST['ladder_amount']);
        for ($i = $count - 1; $i >= 0; $i--)
        {
            /* 如果数量小于等于0，不要 */
            $amount = intval($_POST['ladder_amount'][$i]);
            if ($amount <= 0)
            {
                continue;
            }

            /* 如果价格小于等于0，不要 */
            $price = round(floatval($_POST['ladder_price'][$i]), 2);
            if ($price <= 0)
            {
                continue;
            }

            /* 加入价格阶梯 */
            $price_ladder[$amount] = array('amount' => $amount, 'price' => $price);
        }
        if (count($price_ladder) < 1)
        {
            sys_msg($_LANG['error_price_ladder']);
        }

        /* 限购数量不能小于价格阶梯中的最大数量 */
        $amount_list = array_keys($price_ladder);
        if ($restrict_amount > 0 && max($amount_list) > $restrict_amount)
        {
            sys_msg($_LANG['error_restrict_amount']);
        }

        ksort($price_ladder);
        $price_ladder = array_values($price_ladder);

        /* 检查开始时间和结束时间是否合理 */
        $start_time = local_strtotime($_POST['start_time']);
        $end_time = local_strtotime($_POST['end_time']);
        if ($start_time >= $end_time)
        {
            sys_msg($_LANG['invalid_time']);
        }

        $seckill_buy = array(
            'act_name'   => $act_name,
            'act_desc'   => $_POST['act_desc'],
            'act_type'   => GAT_GROUP_BUY,
            'goods_id'   => $goods_id,
            'goods_name' => $goods_name,
            'start_time'    => $start_time,
            'end_time'      => $end_time,
            'ext_info'   => serialize(array(
                    'price_ladder'      => $price_ladder,
                    'restrict_amount'   => $restrict_amount,
                    'gift_integral'     => $gift_integral,
                    'deposit'           => $deposit
                    ))
        );

        /* 清除缓存 */
        clear_cache_files();

        /* 保存数据 */
        if ($seckill_buy_id > 0)
        {
            /* update */
            $db->autoExecute($ecs->table('goods_activity'), $seckill_buy, 'UPDATE', "act_id = '$seckill_buy_id'");

            /* log */
            admin_log(addslashes($goods_name) . '[' . $seckill_buy_id . ']', 'edit', 'seckill_buy');

            /* todo 更新活动表 */

            /* 提示信息 */
            $links = array(
                array('href' => 'seckill_buy.php?act=list&' . list_link_postfix(), 'text' => $_LANG['back_list'])
            );
            sys_msg($_LANG['edit_success'], 0, $links);
        }
        else
        {
            /* insert */
            $db->autoExecute($ecs->table('goods_activity'), $seckill_buy, 'INSERT');

            /* log */
            admin_log(addslashes($goods_name), 'add', 'seckill_buy');

            /* 提示信息 */
            $links = array(
                array('href' => 'seckill_buy.php?act=add', 'text' => $_LANG['continue_add']),
                array('href' => 'seckill_buy.php?act=list', 'text' => $_LANG['back_list'])
            );
            sys_msg($_LANG['add_success'], 0, $links);
        }
    }
}
 /*
  * 取得秒杀活动列表
  * @return   array
  */
 function seckill_list()
 {
     $result = get_filter();
     if ($result === false)
     {
         /* 过滤条件 */
         $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
         if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
         {
             $filter['keyword'] = json_str_iconv($filter['keyword']);
         }
         $filter['is_going']   = empty($_REQUEST['is_going']) ? 0 : 1;
         $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'act_id' : trim($_REQUEST['sort_by']);
         $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

         $where = "";
         if (!empty($filter['keyword']))
         {
             $where .= " AND goods_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
         }
         if ($filter['is_going'])
         {
             $now = gmtime();
             $where .= " AND is_finished = 0 AND start_time <= '$now' AND end_time >= '$now' ";
         }

         $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('goods_activity') .
                 " WHERE act_type = '" . GAT_SECKILL . "' $where";
         $filter['record_count'] = $GLOBALS['db']->getOne($sql);

         /* 分页大小 */
         $filter = page_and_size($filter);

         /* 查询 */
         $sql = "SELECT * ".
                 "FROM " . $GLOBALS['ecs']->table('goods_activity') .
                 " WHERE act_type = '" . GAT_SECKILL . "' $where ".
                 " ORDER BY $filter[sort_by] $filter[sort_order] ".
                 " LIMIT ". $filter['start'] .", $filter[page_size]";

         $filter['keyword'] = stripslashes($filter['keyword']);
         set_filter($filter, $sql);
     }
     else
     {
         $sql    = $result['sql'];
         $filter = $result['filter'];
     }
     $res = $GLOBALS['db']->query($sql);

     $list = array();
     while ($row = $GLOBALS['db']->fetchRow($res))
     {
         $ext_info = unserialize($row['ext_info']);
         $arr = array_merge($row, $ext_info);

         $arr['start_time']  = local_date('Y-m-d H:i', $arr['start_time']);
         $arr['end_time']    = local_date('Y-m-d H:i', $arr['end_time']);

         $list[] = $arr;
     }
     $arr = array('item' => $list, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

     return $arr;
 }

 /**
  * 列表链接
  * @param   bool    $is_add     是否添加（插入）
  * @param   string  $text       文字
  * @return  array('href' => $href, 'text' => $text)
  */
 function list_link($is_add = true, $text = '')
 {
     $href = 'seckill_goods.php?act=list';
     if (!$is_add)
     {
         $href .= '&' . list_link_postfix();
     }
     if ($text == '')
     {
         $text = $GLOBALS['_LANG']['seckill_list'];
     }

     return array('href' => $href, 'text' => $text);
 }

 ?>