<?php

/**
 * ECSHOP 供应商列表
 * ============================================================================
 * ecshop 模板堂 
 * @author: Leah 
 * @since: 2013/10/12
 */
define('IN_ECS', true);

// 路径写错了 改  by lee start
require(dirname(__FILE__) . '/themes/meilele/init.php');
// 路径写错了 改  by lee end
require(dirname(__FILE__) . '/includes/init.php');
require(dirname(__FILE__) . '/includes/lib_seller_store.php');
$act = !isset($_REQUEST['act']) ? 'info' : $_REQUEST['act'];
assign_template();

/* 获得请求的分类 ID */
if (!empty($_REQUEST['id']))
{
    $brand_id = intval($_REQUEST['id']);
}

/**
 * 商家店铺页面
 */
if($act == 'info') {

    /* 初始化分页信息 */
    $page = !empty($_REQUEST['page'])  && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
    $keyword=!empty($_GET['keyword'])?trim($_GET['keyword']):'';
    //by lee 将商店商品的显示数量设定为9
    $size = 9;
    $cate = !empty($_REQUEST['cat'])   && intval($_REQUEST['cat'])   > 0 ? intval($_REQUEST['cat'])   : 0;
    /* 排序、显示方式以及类型 */
    $count = goods_count_by_brand($store['seller_id'], $cate);

    $sort  = (isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'shop_price', 'last_update'))) ? trim($_REQUEST['sort'])  : $default_sort_order_type;
    $order = (isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC')))                              ? trim($_REQUEST['order']) : $default_sort_order_method;
    $display  = (isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))) ? trim($_REQUEST['display'])  : (isset($_COOKIE['ECS']['display']) ? $_COOKIE['ECS']['display'] : $default_display_type);
    $display  = in_array($display, array('list', 'grid', 'text')) ? $display : 'text';
    setcookie('ECS[display]', $display, gmtime() + 86400 * 7);


    // 增加相关分类   by  lee start
    $smarty->assign('brand_cat_list', brand_related_cat($store['seller_id'])); // 相关分类
    $position = assign_ur_here('', $_LANG['all_brand']);   //商标名代替店铺名
    $smarty->assign('page_title',      $position['title']);    // 页面标题
    $smarty->assign('ur_here',         $position['ur_here']);  // 当前位置
    $smarty->assign('script_name', 'seller_store');

    $goods_tmp =  brand_recommend_goods('', $store['seller_id'],$cat,$page,$size,$count,$keyword,$store_id);
    $smarty->assign('goods_list',  $goods_tmp['result'] );//获取店铺内的所有商品
    $smarty->assign('pager', $goods_tmp['pager']);


   //  by lee end
	$smarty->assign('store',$store);

	$smarty->assign('store_cate',   get_store_cat(0,$store['seller_id'],$store_id));

//    assign_pager('seller_store',    $cate, $count, $size, $sort, $order, $page, '', $store['id'], 0, 0, $display); // 分页
//    assign_dynamic('brand'); // 动态内容


    $smarty->display('seller_store.dwt', $cache_id);
}

//查询店铺里的所有商品
/**
 * 获得指定商店下的推荐和促销商品
 *
 * @access  private
 * @param   string  $type
 * @param   integer $brand
 * @return  array
 */
function brand_recommend_goods($type, $brand, $cat = 0,$page=1,$size = 9,$count,$keyword,$store_id)
{
    //增加分页功能
    $keyword = '';
    if(!empty($keyword))
    {
        $where=" and sh.shop_keyword like '%$keyword%' ";
    }
    $max_page = ($count> 0) ? ceil($count / $size) : 1;

    if ($page > $max_page)
    {
        $page = $max_page;
    }

    static $result = NULL;

    $time = gmtime();

    if ($result === NULL)
    {
        if ($cat > 0)
        {
            $cat_where = "AND " . get_children($cat);
        }
        else
        {
            $cat_where = '';
        }

        $sql = 'SELECT g.goods_id, g.goods_name, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
//            "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
            'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, ' .
            'b.shop_name, g.is_best, g.is_new, g.is_hot, g.is_promote ' .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('seller_shopinfo') . ' AS b  ON b.seller_id = g.seller_id ' .
//            'LEFT JOIN ' . $GLOBALS['ecs']->table('member_price') . ' AS mp '.
//            "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
              "where b.seller_id = g.seller_id AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.seller_id = $brand  " .
//            "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.seller_cat_id = '$brand' AND " .
//            "(g.is_best = 1 OR (g.is_promote = 1 AND promote_start_date <= '$time' AND ".
//            "promote_end_date >= '$time')) $cat_where" .
            ' ORDER BY g.sort_order, g.last_update DESC ';
//        $result = $GLOBALS['db']->getAll($sql);
        $result = $GLOBALS['db']->SelectLimit($sql, $size, ($page-1) * $size);
    }
     $idx = 0;
    while ($row = $GLOBALS['db']->FetchRow($result))
    {
        $goods[$idx]['goods_id']           = $row['goods_id'];
        $goods[$idx]['goods_name']         = $row['goods_name'];
        $goods[$idx]['brief']        = $row['goods_brief'];
        $goods[$idx]['brand_name']   = $row['brand_name'];
        $goods[$idx]['short_style_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        $idx++;
    }

    $pager['search'] = array('keyword'   => $keyword);

   //给url 增加个参数
    $pager = get_pager('seller_store.php?sid='.$store_id, $pager['search'], $count, $page, $size);

    $pager['sid'] =$store_id;

    $goods=array('pager'=>$pager,'result'=>$goods);
    return $goods;
}



/**
* 获得与指定商店相关的分类
*
 * @access  public
 * @param   integer $brand
* @return  array
 */
function brand_related_cat($brand)
{
    $arr[] = array('cat_id' => 0,
        'cat_name' => $GLOBALS['_LANG']['all_category'],
        'url'      => build_uri('brand', array('bid' => $brand), $GLOBALS['_LANG']['all_category']));

    $sql = "SELECT c.cat_id, c.cat_name, COUNT(g.goods_id) AS goods_count FROM ".
        $GLOBALS['ecs']->table('category'). " AS c, ".
        $GLOBALS['ecs']->table('goods') . " AS g " .
        "WHERE g.brand_id = '$brand' AND c.cat_id = g.cat_id ".
        "GROUP BY g.cat_id";
    $res = $GLOBALS['db']->query($sql);

    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $row['url'] = build_uri('brand', array('cid' => $row['cat_id'], 'bid' => $brand), $row['cat_name']);
        $arr[] = $row;
    }

    return $arr;
}


/**
 * 获得指定的商店下的商品总数
 *
 * @access  private
 * @param   integer     $brand_id
 * @param   integer     $cate
 * @return  integer
 */
function goods_count_by_brand($brand_id, $cate = 0)
{
    $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('goods'). ' AS g '.
        "WHERE seller_id = '$brand_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0";

    if ($cate > 0)
    {
        $sql .= " AND " . get_children($cate);
    }
//var_dump($GLOBALS['db']->getOne($sql));exit;
    return $GLOBALS['db']->getOne($sql);
}
?>