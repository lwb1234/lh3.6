<?php
//888
/**
 * ECSHOP 秒杀商品前台文件
 * ============================================================================
 * 版权所有 2005-2010 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: sxc_shop $
 * $Id: seckill_buy.php 17167 2010-05-28 06:10:40Z sxc_shop $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
// 路径写错了 改  by lee start
require(dirname(__FILE__) . '/themes/meilele/init.php');
// 路径写错了 改  by lee end
if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

/*------------------------------------------------------ */
//-- act 操作项的初始化
/*------------------------------------------------------ */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'list';
}

/*------------------------------------------------------ */
//-- 秒杀商品 --> 秒杀活动商品列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{
    /* 取得秒杀活动总数 */
    $count = seckill_buy_count();
    if ($count > 0)
    {
        /* 取得每页记录数 */
        $size = isset($_CFG['page_size']) && intval($_CFG['page_size']) > 0 ? intval($_CFG['page_size']) : 10;

        /* 计算总页数 */
        $page_count = ceil($count / $size);

        /* 取得当前页 */
        $page = isset($_REQUEST['page']) && intval($_REQUEST['page']) > 0 ? intval($_REQUEST['page']) : 1;
        $page = $page > $page_count ? $page_count : $page;

        /* 缓存id：语言 - 每页记录数 - 当前页 */
        $cache_id = $_CFG['lang'] . '-' . $size . '-' . $page;
        $cache_id = sprintf('%X', crc32($cache_id));
    }
    else
    {
        /* 缓存id：语言 */
        $cache_id = $_CFG['lang'];
        $cache_id = sprintf('%X', crc32($cache_id));
    }

    /* 如果没有缓存，生成缓存 */
    if (!$smarty->is_cached('seckill_buy_list.dwt', $cache_id))
    {
        if ($count > 0)
        {
			$gb_list = seckill_buy_list($size, $page);
            $smarty->assign('gb_list',  $gb_list);
			$gb_list_hot = seckill_buy_list_hot();
            $smarty->assign('gb_list_hot',  $gb_list_hot);

            /* 设置分页链接 */
            $pager = get_pager('seckill_buy.php', array('act' => 'list'), $count, $page, $size);
            $smarty->assign('pager', $pager);
        }

        /* 模板赋值 */
        $smarty->assign('cfg', $_CFG);
        assign_template();
        $position = assign_ur_here();
        $smarty->assign('page_title', $position['title']);    // 页面标题
        $smarty->assign('ur_here',    $position['ur_here']);  // 当前位置
        $smarty->assign('categories', get_categories_tree()); // 分类树
        $smarty->assign('helps',      get_shop_help());       // 网店帮助
        $smarty->assign('top_goods',  get_top10());           // 销售排行
        $smarty->assign('promotion_info', get_promotion_info());
        $smarty->assign('feed_url',         ($_CFG['rewrite'] == 1) ? "feed-typeseckill_buy.xml" : 'feed.php?type=seckill_buy'); // RSS URL
	    $smarty->assign('act', 'list');
		
        //获取制定活动的动态内容 这里改了参数但为处理
        assign_dynamic('seckill_buy_list');
    }

    /* 显示模板 */
    $smarty->display('seckill_buy_list.dwt', $cache_id);
}

/*------------------------------------------------------ */
//-- 秒杀商品 --> 商品详情
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'view')
{
    /* 取得参数：秒杀活动id */
    $seckill_buy_id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    if ($seckill_buy_id <= 0)
    {
        ecs_header("Location: ./\n");
        exit;
    }

    /* 取得秒杀活动信息 这里也是获取商品的折扣价，后的参数 */
    $seckill_buy = seckill_buy_info($seckill_buy_id);
    if (empty($seckill_buy))
    {
        ecs_header("Location: ./\n");
        exit;
    }
//    elseif ($seckill_buy['is_on_sale'] == 0 || $seckill_buy['is_alone_sale'] == 0)
//    {
//        header("Location: ./\n");
//        exit;
//    }

    /* 缓存id：语言，秒杀活动id，状态，（如果是进行中）当前数量和是否登录 */
    $cache_id = $_CFG['lang'] . '-' . $seckill_buy_id . '-' . $seckill_buy['status'];
    if ($seckill_buy['status'] == SBS_UNDER_WAY)
    {
        $cache_id = $cache_id . '-' . $seckill_buy['valid_goods'] . '-' . intval($_SESSION['user_id'] > 0);
    }
    $cache_id = sprintf('%X', crc32($cache_id));
    /* 如果没有缓存，生成缓存 */
    if (!$smarty->is_cached('seckill_buy_goods.dwt', $cache_id))
    {

        $seckill_buy['gmt_end_date'] = $seckill_buy['end_date'];
        $smarty->assign('seckill_buy', $seckill_buy);

        /* 取得秒杀商品信息 */
        $goods_id = $seckill_buy['goods_id'];
        $goods = goods_info($goods_id);
        if (empty($goods))
        {
            ecs_header("Location: ./\n");
            exit;
        }
        $goods['url'] = build_uri('goods', array('gid' => $goods_id), $goods['goods_name']);
        $smarty->assign('gb_goods', $goods);
		$smarty->assign('id',$goods_id);
		$smarty->assign('comment_type',0);

        /* 取得商品的规格 */
        $properties = get_goods_properties($goods_id);
        $smarty->assign('specification', $properties['spe']); // 商品规格

        //模板赋值
        $smarty->assign('cfg', $_CFG);
        assign_template();

        $position = assign_ur_here(0, $goods['goods_name']);
        $smarty->assign('page_title', $position['title']);    // 页面标题
        $smarty->assign('ur_here',    $position['ur_here']);  // 当前位置

        $smarty->assign('categories', get_categories_tree()); // 分类树
        $smarty->assign('helps',      get_shop_help());       // 网店帮助
        $smarty->assign('top_goods',  get_top10());           // 销售排行
        $smarty->assign('promotion_info', get_promotion_info());  //获取促销信息

		//获取秒杀商品的折扣，   秒杀倒计时。。。
		$gb_list_hot = seckill_buy_list_hot();
        $smarty->assign('gb_list_hot',  $gb_list_hot);

        assign_dynamic('seckill_buy_goods'); // 获取指定页面的动态内容
    }
    //更新商品点击次数
    $sql = 'UPDATE ' . $ecs->table('goods') . ' SET click_count = click_count + 1 '.
           "WHERE goods_id = '" . $seckill_buy['goods_id'] . "'";
    $db->query($sql);
    $smarty->assign('now_time',  gmtime());
    // 当前系统时间
    $smarty->display('seckill_buy_goods.dwt', $cache_id);
}

/*------------------------------------------------------ */
//-- 秒杀商品 --> 购买
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'buy')
{
    /* 查询：判断是否登录 */
    if ($_SESSION['user_id'] <= 0)
    {
        show_message($_LANG['gb_error_login'], '', '', 'error');
    }

    /* 查询：取得参数：秒杀活动id */
    $seckill_buy_id = isset($_POST['seckill_buy_id']) ? intval($_POST['seckill_buy_id']) : 0;
  //    var_dump($seckill_buy_id);exit;
    if ($seckill_buy_id <= 0)
    {
        ecs_header("Location: ./\n");
        exit;
    }

    /* 查询：取得数量 */
    $number = isset($_POST['number']) ? intval($_POST['number']) : 1;

    /* 查询：取得秒杀活动信息 */
    $seckill_buy = seckill_buy_info($seckill_buy_id, $number);

    if (empty($seckill_buy))
    {
        ecs_header("Location: ./\n");
        exit;
    }

    /* 查询：检查秒杀活动是否是进行中 */
    if ($seckill_buy['status'] != SBS_UNDER_WAY)
    {
        show_message($_LANG['gb_error_status'], '', '', 'error');
    }

    /* 查询：取得秒杀商品信息 */
    $goods = goods_info($seckill_buy['goods_id']);
    if (empty($goods))
    {
        ecs_header("Location: ./\n");
        exit;
    }

    /* 查询：判断数量是否足够 */
    //限制商品数量是否 复合规格

    if (( $number >($seckill_buy['price_ladder'][0]['amount'] - $seckill_buy['valid_goods'])) || $number > $goods['goods_number'])
    {

        show_message($_LANG['gb_error_goods_lacking'], '', '', 'error');
    }
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

    //先设定，规定的秒杀商品是参数固定的  不用查询产品的属性匹配
//    /* 查询：如果商品有规格则取规格商品信息 配件除外 */
//    if ($specs)
//    {
//        $_specs = explode(',', $specs);
//        $product_info = get_products_info($goods['goods_id'], $_specs);
//        var_dump($product_info);
//    }
//
//    empty($product_info) ? $product_info = array('product_number' => 0, 'product_id' => 0) : '';
//
//    /* 查询：判断指定规格的货品数量是否足够 */
//    if ($specs && $number > $product_info['product_number'])
//    {
//        show_message($_LANG['gb_error_goods_lacking'], '', '', 'error');
//    }

    /* 查询：查询规格名称和值，不考虑价格 */
    $attr_list = array();
    $sql = "SELECT a.attr_name, g.attr_value " .
            "FROM " . $ecs->table('goods_attr') . " AS g, " .
                $ecs->table('attribute') . " AS a " .
            "WHERE g.attr_id = a.attr_id " .
            "AND g.goods_attr_id " . db_create_in($specs);
    $res = $db->query($sql);
    while ($row = $db->fetchRow($res))
    {
        $attr_list[] = $row['attr_name'] . ': ' . $row['attr_value'];
    }
    $goods_attr = join(chr(13) . chr(10), $attr_list);


    //将商品的数量减少一
    $sql = "SELECT ext_info FROM " . $ecs->table('goods_activity') .
        " WHERE goods_id = '$seckill_buy_id' AND act_type = '" . GAT_SECKILL. "'";
    $ext_info = unserialize($db->getOne($sql));

    if(! $ext_info['price_ladder'][0]['amount'] == 0) {
        $ext_info['price_ladder'][0]['amount']--;
    }
    $sql = "UPDATE " . $ecs->table('goods_activity') .
        " SET ext_info = '" . serialize($ext_info) . "'" .
        " WHERE goods_id = '$seckill_buy_id'";
    $db->query($sql);



//    //加载redis 数据库进行秒杀处理   by lee start
//    require(dirname(__FILE__) . '/seckill_redis.php');
    //加载redis 数据库进行秒杀处理   by lee end
   /* 更新：清空购物车中所有秒杀商品 */
    include_once(ROOT_PATH . 'includes/lib_order.php');
    clear_cart(CART_SECKILL_BUY_GOODS);//就是清空数据表

   /* 更新：加入购物车 */
//    $goods_price = $seckill_buy['deposit'] > 0 ? $seckill_buy['deposit'] : $seckill_buy['cur_price'];
    //  by  lee  这里不加冻结保证金，即去掉 deposit
    $goods_price = $seckill_buy['cur_price'];
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

    /* 进入收货人页面 */
   ecs_header("Location: ./flow.php?step=checkout\n");//888

    exit;
}

//获取秒杀活动总数   by lee  start   函数体是没有改变的 有待优化
function seckill_buy_count()
{
    $now = gmtime();
    $sql = "SELECT COUNT(*) " .
        "FROM " . $GLOBALS['ecs']->table('goods_activity') .
        "WHERE act_type = '" . GAT_SECKILL . "' " .
        "AND start_time <= '$now' AND is_finished < 3";

    return $GLOBALS['db']->getOne($sql);
}
//获取秒杀活动总数   by lee  end

/**
 * 取得某页的所有秒杀活动
 * @param   int     $size   每页记录数
 * @param   int     $page   当前页
 * @return  array
 */
function seckill_buy_list($size, $page)
{
    /* 取得秒杀活动 */
    $gb_list = array();
    $now = gmtime();
	/*新秒杀模板加入*/
    $sql = "SELECT b.*, IFNULL(g.goods_thumb, '') AS goods_thumb, IFNULL(g.goods_img, '') AS goods_img, g.goods_brief, g.market_price, g.shop_price, b.act_id AS seckill_buy, ".
                "b.start_time AS start_date, b.end_time AS end_date " .
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS b " .
                "LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ON b.goods_id = g.goods_id " .
            "WHERE b.act_type = '" . GAT_SECKILL . "' " .
             "AND b.start_time <= '$now' AND b.is_finished < 3 ORDER BY b.isg_new DESC,b.act_id DESC";
    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);
    while ($seckill_buy = $GLOBALS['db']->fetchRow($res))
    {
        $ext_info = unserialize($seckill_buy['ext_info']);
        //获取秒杀统计信息
		$stat =  seckill_buy_stat($seckill_buy['act_id'], $ext_info['deposit']);
        $seckill_buy = array_merge($seckill_buy, $ext_info);
		
		/*新秒杀模板加入 时间倒计时 */
		$seckill_buy['gmt_end_date']     = $seckill_buy['end_date'];
        $time = gmtime();
        if ($time >= $seckill_buy['start_date'] && $time <= $seckill_buy['end_date'])
        {
             $seckill_buy['gmt_end_time']  = local_date('M d, Y H:i:s',$seckill_buy['end_date']);
			 $seckill_buy['gmt_time'] = $seckill_buy['end_date'] - $time;
        }
        else
        {
            $seckill_buy['gmt_end_time'] = 0;
			$seckill_buy['gmt_time'] = 0;
        }
		

        /* 格式化时间 */
        $seckill_buy['formated_start_date']   = local_date($GLOBALS['_CFG']['time_format'], $seckill_buy['start_date']);
        $seckill_buy['formated_end_date']     = local_date($GLOBALS['_CFG']['time_format'], $seckill_buy['end_date']);

        /* 格式化保证金 */
        $seckill_buy['formated_deposit'] = price_format($seckill_buy['deposit'], false);
		
        /*新秒杀模板加入 调用购买人数
        $arrgoods = seckill_buy_stat($seckill_buy['act_id'],$seckill_buy['formated_deposit']);
		foreach($arrgoods as $key=>$arr){
		     $arrgoods[$arr]['valid_goods'] = $arr['valid_goods'];
			 $valid_goods = $arrgoods[$key]['valid_goods'];
		     $seckill_buy['valid_goods'] = $valid_goods;
       }*/
	   
	   // 当前数量
		$seckill_buy['cur_amount'] = $stat['valid_goods'];
		
        /* 处理价格阶梯 */
        $price_ladder = $seckill_buy['price_ladder'];
        if (!is_array($price_ladder) || empty($price_ladder))
        {
            $price_ladder = array(array('amount' => 0, 'price' => 0));
			$last_price = 0;
        }
        else
        {
            foreach ($price_ladder as $key => $amount_price)
            {
                $price_ladder[$key]['formated_price'] = price_format($amount_price['price']);
            }
			$last_price = $amount_price['price'];
        }
		/*新秒杀模板加入 折扣及节省多少*/
		$seckill_buy['formated_rebate_price'] = price_format($seckill_buy['market_price'] - $last_price);
		$seckill_buy['t_discount'] = sprintf ("%01.1f", $last_price/$seckill_buy['market_price']*10);
		$seckill_buy['market_price'] = price_format($seckill_buy['market_price']);
		
        $seckill_buy['price_ladder'] = $price_ladder;
		$seckill_buy['lower_orders']=$seckill_buy['lower_orders'];
		$seckill_buy['goods_brief']=$seckill_buy['goods_brief'];
		$seckill_buy['surplus_day']=floor(($seckill_buy['end_date']-time())/86400);

        /* 处理图片 */
        if (empty($seckill_buy['goods_thumb']))
        {
            $seckill_buy['goods_thumb'] = get_image_path($seckill_buy['goods_id'], $seckill_buy['goods_thumb'], true);
        }
        /* 处理链接 */
        $seckill_buy['url'] = build_uri('seckill_buy', array('gbid'=>$seckill_buy['seckill_buy']));
        /* 加入数组 */
        $gb_list[] = $seckill_buy;
    }

    return $gb_list;
}



function seckill_buy_list_hot()
{
    /* 取得秒杀活动 */
    $gb_list = array();
    $now = gmtime();
	/*新秒杀模板加入*/
    $sql = "SELECT b.*, IFNULL(g.goods_thumb, '') AS goods_thumb, IFNULL(g.goods_img, '') AS goods_img, g.goods_brief, g.market_price, g.shop_price, b.act_id AS seckill_buy, ".
                "b.start_time AS start_date, b.end_time AS end_date " .
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS b " .
                "LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ON b.goods_id = g.goods_id " .
            "WHERE b.act_type = '" . GAT_SECKILL . "' and b.isg_new=1 " .
             "AND b.start_time <= '$now' AND b.is_finished < 3 ORDER BY b.act_id DESC";
    $res = $GLOBALS['db']->query($sql);

    while ($seckill_buy = $GLOBALS['db']->fetchRow($res))
    {
//        var_dump($seckill_buy);exit;
        $ext_info = unserialize($seckill_buy['ext_info']);
		$stat = seckill_buy_stat($seckill_buy['act_id'], $ext_info['deposit']);
        $seckill_buy = array_merge($seckill_buy, $ext_info);

        //将秒杀价格阶梯和数量组成一个数组  by lee start

        $seckill_buy['price_ladder']['0']['amount']=$seckill_buy['seckill_num'] ;
        $seckill_buy['price_ladder']['0']['price']=  $seckill_buy['start_price'] ;
        //将秒杀价格阶梯和数量组成一个数组  by lee end

		/*新秒杀模板加入 时间倒计时 */
		$seckill_buy['gmt_end_date']     = $seckill_buy['end_date'];
        $time = gmtime();
        if ($time >= $seckill_buy['start_date'] && $time <= $seckill_buy['end_date'])
        {
             $seckill_buy['gmt_end_time']  = local_date('M d, Y H:i:s',$seckill_buy['end_date']);
        }
        else
        {
            $seckill_buy['gmt_end_time'] = 0;
        }
		
        /* 格式化时间 */
        $seckill_buy['formated_start_date']   = local_date($GLOBALS['_CFG']['time_format'], $seckill_buy['start_date']);
        $seckill_buy['formated_end_date']     = local_date($GLOBALS['_CFG']['time_format'], $seckill_buy['end_date']);

        /* 格式化保证金 */
        $seckill_buy['formated_deposit'] = price_format($seckill_buy['deposit'], false);
		
        /*新秒杀模板加入 调用购买人数
        $arrgoods = seckill_buy_stat($seckill_buy['act_id'],$seckill_buy['formated_deposit']);
		foreach($arrgoods as $key=>$arr){
		     $arrgoods[$arr]['valid_goods'] = $arr['valid_goods'];
			 $valid_goods = $arrgoods[$key]['valid_goods'];
		     $seckill_buy['valid_goods'] = $valid_goods;
       }*/
	   
	   // 当前数量
		$seckill_buy['cur_amount'] = $stat['valid_goods'];     
//		 var_dump($seckill_buy) ;
        /* 处理价格阶梯   初始化阶梯价格为999 秒杀价格*/
        $price_ladder = $seckill_buy['price_ladder'];
        if (!is_array($price_ladder) || empty($price_ladder))
        {
            $price_ladder = array(array('amount' => 0, 'price' => 0));
			$last_price = 0;
        }
        else
        {
            foreach ($price_ladder as $key => $amount_price)
            {
                $price_ladder[$key]['formated_price'] = price_format($amount_price['price']);
            }
			$last_price = $amount_price['price'];
        }
		/*新秒杀模板加入 折扣及节省多少*/
		$seckill_buy['formated_rebate_price'] = price_format($seckill_buy['market_price'] - $last_price);
		$seckill_buy['t_discount'] = sprintf ("%01.1f", $last_price/$seckill_buy['market_price']*10);
//		var_dump($last_price);
//		var_dump( $seckill_buy['t_discount'] );exit;
		$seckill_buy['market_price'] = price_format($seckill_buy['market_price']);
        $seckill_buy['price_ladder'] = $price_ladder;
		$seckill_buy['lower_orders']=$seckill_buy['lower_orders'];
		$seckill_buy['goods_brief']=$seckill_buy['goods_brief'];

        /* 处理图片 */
        if (empty($seckill_buy['goods_thumb']))
        {
            $seckill_buy['goods_thumb'] = get_image_path($seckill_buy['goods_id'], $seckill_buy['goods_thumb'], true);
        }
        /* 处理链接 */
        $seckill_buy['url'] = build_uri('seckill_buy', array('gbid'=>$seckill_buy['seckill_buy']));
        /* 加入数组 */
        $gb_list[] = $seckill_buy;
    }

    return $gb_list;
}

?>