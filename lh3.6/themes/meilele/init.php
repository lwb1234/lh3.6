<?php

function get_advlist_by_id($id)
{
	switch($id)
	{
		case 1:
		return get_advlist('首页-顶部通栏广告', 1);
		break;
		case 2:
		return get_advlist('首页-网站公告顶部广告', 1);
		break;
		case 3:
		return get_advlist('首页-团购广告', 1);
		break;
		case 4:
		return get_advlist('首页-新品广告', 8);
		break;
		case 5:
		return get_advlist('首页-精品广告', 8);
		break;
		case 6:
		return get_advlist('首页-热门品牌', 14);
		break;
		case 7:
		return get_advlist('团购页-通栏广告', 1);
		break;
		case 8:
		return get_advlist('文章页-通栏广告', 1);
		break;
		case 9:
		return get_advlist('文章页-右侧广告', 1);
		case 10:
		return get_advlist('秀家-左侧广告', 1);
		break;
		case 11:
		return get_advlist('秀家-本月奖品', 4);
		break;
		case 12:
		return get_advlist('特惠套装页-顶部广告1', 1);
		break;
		case 13:
		return get_advlist('特惠套装页-顶部广告2', 1);
		break;
		case 14:
		return get_advlist('首页-顶部促销广告', 1);
		break;
		case 15:
		return get_advlist('商品页-顶部通栏广告', 1);
		break;
		case 16:
		return get_advlist('体验馆-顶部通栏广告', 1);
		break;
		case 17:
		return get_advlist('搜索页-通栏广告', 1);
		break;
		case 18:
		return get_advlist('搜索页-左侧广告', 1);
		break;
		case 19:
		return get_advlist('搜索页-flash广告', 4);
		break;
		case 20:
		return get_advlist('专题页-活动广告', 4);
		break;
		case 21:
		return get_advlist('专题页-宣传广告', 16);
		break;

	}
	
}
function get_songbei_advlist_by_id($id)
{
	switch($id)
	{
		case 1:
		return get_advlist('松北分店-新品广告', 8);
		break;
		case 2:
		return get_advlist('松北分店-精品广告', 8);
		break;
	}
}
function get_flashad_by_index($id)
{
	return get_advlist('首页-flash-右侧广告' . $id, 3);
}

function get_hot_cat_navad()
{
	return get_advlist('首页-导航菜单-热门推荐-热门标签', 40);
}

function get_navad_by_cat_id($id)
{
	return get_advlist('首页-导航菜单-促销活动', 4);
}

function get_nav_brand_by_cat_id($id)
{
	return get_advlist('首页-导航菜单-分类ID' . $id . '-推荐品牌', 4);
}

function get_advlist_by_suppliers_id($id)
{
	return get_advlist('体验馆-ID' . $id . '-flash广告', 4);
}



function get_left_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-左侧广告', 1);
}

function get_mid_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-中间广告', 3);
}

function get_right_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-右侧广告', 1);
}

function get_bottom_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-底部广告', 5);
}

function get_brand_advlist_by_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-品牌广告', 10);
}

function get_channel_nav_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-导航促销广告', 4);
}

function get_top_cat_nav_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-导航促销广告', 4);
}

function get_channel_flash_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-轮播广告', 5);
}
function get_top_cat_flash_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-轮播广告', 5);
}
function get_top_cat_brand_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-品牌广告', 5);
}
function get_channel_right_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-右侧广告', 2);
}

function get_channel_best_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-精选广告', 6);
}
function get_top_cat_new_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-新品广告', 5);
}
function get_top_cat_hot_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-热卖排行', 5);
}
//1楼
function get_channel_floor_left_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-楼层左侧广告', 2);
}

function get_top_cat_floor_left_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-楼层左侧广告', 3);
}

function get_top_cat_floor_right_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-楼层右侧广告', 1);
}

function get_channel_floor_bottom_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-楼层底部广告', 4);
}

function get_channel_new_img_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-最新促销活动-图片', 1);
}

function get_top_cat_new_img_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-最新促销活动-图片', 1);
}

function get_channel_new_txt_advlist_by_cat_id($id)
{
	return get_advlist('分类频道页-分类ID' . $id . '-最新促销活动-文字', 5);
}

function get_top_cat_new_txt_advlist_by_cat_id($id)
{
	return get_advlist('顶级分类页-分类ID' . $id . '-最新促销活动-文字', 5);
}

function get_channel_flash_advlist_songbei()
{
	return get_advlist('分类频道页-松北分店-轮播广告', 6);
}



function get_article_cat_5($id)
{
	return get_article_cat($id, 5);
}

function get_cat_arts_2($id)
{
	return get_cat_arts($id, 2);
}

function get_cat_arts_3($id)
{
	return get_cat_arts($id, 3);
}

function get_cat_arts_4($id)
{
	return get_cat_arts($id, 4);
}

function get_cat_arts_5($id)
{
	return get_cat_arts($id, 5);
}

function get_cat_arts_6($id)
{
	return get_cat_arts($id, 6);
}

function get_cat_arts_7($id)
{
	return get_cat_arts($id, 7);
}

function get_cat_arts_8($id)
{
	return get_cat_arts($id, 8);
}

function get_cat_arts_9($id)
{
	return get_cat_arts($id, 9);
}

function get_cat_arts_10($id)
{
	return get_cat_arts($id, 10);
}

function get_cat_arts_12($id)
{
	return get_cat_arts($id, 12);
}

function get_cat_arts_20($id)
{
	return get_cat_arts($id, 20);
}

function get_cat_top_arts_1($id)
{
	return get_cat_top_arts($id, 1);
}

function get_cat_new_goods($id)
{
	return get_cat_recommend_goods('new', $id, 4);
}

function get_cat_new_goods_4($id)
{
	return get_cat_recommend_goods('new', $id, 4);
}

function get_cat_new_goods_5($id)
{
	return get_cat_recommend_goods('new', $id, 5);
}

function get_cat_new_goods_10($id)
{
	return get_cat_recommend_goods('new', $id, 10);
}

function get_cat_new_goods_20($id)
{
	return get_cat_recommend_goods('new', $id, 20);
}

function get_cat_new_goods_8($id)
{
	return get_cat_recommend_goods('new', $id, 8);
}

function get_cat_promote_goods_3($id)
{
	return get_cat_recommend_goods('promote', $id, 3);
}

function get_cat_promote_goods_12($id)
{
	return get_cat_recommend_goods('promote', $id, 12);
}

function get_cat_promote_goods_2($id)
{
	return get_cat_recommend_goods('promote', $id, 2);
}

function get_cat_promote_goods_100($id)
{
	return get_cat_recommend_goods('promote', $id, 100);
}

function get_cat_best_goods($id)
{
	return get_cat_recommend_goods('best', $id, 18);
}

function get_cat_best_goods_3($id)
{
	return get_cat_recommend_goods('best', $id, 3);
}

function get_cat_best_goods_4($id)
{
	return get_cat_recommend_goods('best', $id, 4);
}

function get_cat_best_goods_5($id)
{
	return get_cat_recommend_goods('best', $id, 5);
}

function get_cat_best_goods_8($id)
{
	return get_cat_recommend_goods('best', $id, 8);
}

function get_cat_best_goods_10($id)
{
	return get_cat_recommend_goods('best', $id, 10);
}

function get_cat_best_goods_12($id)
{
	return get_cat_recommend_goods('best', $id, 12);
}

function get_cat_hot_goods($id)
{
	return get_cat_recommend_goods('hot', $id, 5);
}

function get_cat_hot_goods_1($id)
{
	return get_cat_recommend_goods('hot', $id, 1);
}

function get_cat_hot_goods_3($id)
{
	return get_cat_recommend_goods('hot', $id, 3);
}

function get_cat_hot_goods_4($id)
{
	return get_cat_recommend_goods('hot', $id, 4);
}

function get_cat_hot_goods_5($id)
{
	return get_cat_recommend_goods('hot', $id, 5);
}

function get_cat_hot_goods_6($id)
{
	return get_cat_recommend_goods('hot', $id, 6);
}

function get_cat_hot_goods_8($id)
{
	return get_cat_recommend_goods('hot', $id, 8);
}

function get_cat_hot_goods_9($id)
{
	return get_cat_recommend_goods('hot', $id, 9);
}

function get_cat_hot_goods_10($id)
{
	return get_cat_recommend_goods('hot', $id, 10);
}

function get_new_comment_30($type)
{
	return get_new_comment($type, 30);
}

function get_rand_comment_9($type)
{
	return get_rand_comment($type, 9);
}

function insert_article_content_23()
{
	return insert_article_content(23);
}

function insert_article_content_24()
{
	return insert_article_content(24);
}

function insert_area_name()
{
    $region_name = '全国站';
	if ($_SESSION['region_id'])
    {
		$region_name = $_SESSION['region_name'];
    }
	return $region_name;
}

function get_suppliers()
{
    if (!$_SESSION['region_id']) return;
	
	$region_id = intval($_SESSION['region_id']);
	$sql = 'select * from ' . $GLOBALS['ecs']->table('suppliers') . ' where city = ' . $region_id;		
	$regions = $GLOBALS['db']->getall($sql);
	return $regions;

}

function insert_area_info()
{
	
	$sql = 'select * from ' . $GLOBALS['ecs']->table('region') . ' where is_show = 1 order by pin_yin asc';		
	
	$region_array = $GLOBALS['db']->getall($sql);
	
	$region_list = array();
	
	for($i=0;$i<count($region_array);$i++)
	{
	   $l = get_first_char($region_array[$i]['pin_yin']);
	   if ($l == null || $l == '') continue;
	   $region_list[$l][$region_array[$i]['region_id']] = $region_array[$i]['region_id']."-".$region_array[$i]['region_name']."-".$region_array[$i]['pin_yin'];
	}
	
	$html ='"city_list": {';
	$temp = '';
	foreach ($region_list AS $row=>$idx)
	{

		$temp .='"'.$row.'": ['; 		
			   
			  $str = '';
			  foreach($idx AS $row2=>$idx2)
			  {
			  		$idx2 = explode('-',$idx2);
			  		$str .='{
						"region_name": "'.$idx2[1].'",
						"region_id": "'.$idx2[0].'",
						"pinyin": "'.$idx2[2].'"
					},';
			  }
			  if (strlen($str) > 0)
			  	$str = substr($str, 0, strlen($str) - 1);
			  
			  $temp .= $str;
			  
		$temp .='],';			  
	 
	}
	
	if (strlen($temp) > 0)
		$temp = substr($temp, 0, strlen($temp) - 1);
		
	$html .= $temp;	
	
	$html .='},';
	
	$sql = 'select * from ' . $GLOBALS['ecs']->table('region') . ' where is_top = 1 and is_show = 1 order by pin_yin asc';		
	
	$region_array = $GLOBALS['db']->getall($sql);
	
	$region_list = array();
	
	$html .= '"host_city_list": [';
	
	$str = '';
	for($i=0;$i<count($region_array);$i++)
	{
	   $str .='{
			"region_name": "'.$region_array[$i]['region_name'].'",
			"region_id": "'.$region_array[$i]['region_id'].'",
			"pinyin": "'.$region_array[$i]['pin_yin'].'"
		},';
	}
	
	if (strlen($str) > 0)
		$str = substr($str, 0, strlen($str) - 1);
	$html .= $str;
	$html .= ']';
	
	return $html;
}

function get_package_list($key)
{
    $now = gmtime();
    $sql = "SELECT pg.goods_id, ga.act_id, ga.act_name, ga.act_desc, ga.goods_name, ga.start_time,
                   ga.end_time, ga.is_finished, ga.ext_info
            FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS ga, " . $GLOBALS['ecs']->table('package_goods') . " AS pg
            WHERE pg.package_id = ga.act_id
            AND ga.start_time <= '" . $now . "'
            AND ga.end_time >= '" . $now . "'
            AND ga.act_name LIKE '".$key."%'
            GROUP BY ga.act_id
            ORDER BY ga.act_id ";
    $res = $GLOBALS['db']->getAll($sql);

    foreach ($res as $tempkey => $value)
    {
        $subtotal = 0;
        $row = unserialize($value['ext_info']);
        unset($value['ext_info']);
        if ($row)
        {
            foreach ($row as $key=>$val)
            {
                $res[$tempkey][$key] = $val;
            }
        }

        $sql = "SELECT pg.package_id, pg.goods_id, pg.goods_number, pg.admin_id, p.goods_attr, g.goods_sn, g.goods_name, g.market_price, g.goods_thumb, IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS rank_price
                FROM " . $GLOBALS['ecs']->table('package_goods') . " AS pg
                    LEFT JOIN ". $GLOBALS['ecs']->table('goods') . " AS g
                        ON g.goods_id = pg.goods_id
                    LEFT JOIN ". $GLOBALS['ecs']->table('products') . " AS p
                        ON p.product_id = pg.product_id
                    LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp
                        ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]'
                WHERE pg.package_id = " . $value['act_id']. "
                ORDER BY pg.package_id, pg.goods_id";

        $goods_res = $GLOBALS['db']->getAll($sql);

        $goods_count = 0;
        foreach($goods_res as $key => $val)
        {
            $goods_id_array[] = $val['goods_id'];
            $goods_res[$key]['goods_thumb']  = get_image_path($val['goods_id'], $val['goods_thumb'], true);
            $goods_res[$key]['market_price'] = price_format($val['market_price']);
            $goods_res[$key]['rank_price']   = price_format($val['rank_price']);
            $subtotal += $val['rank_price'] * $val['goods_number'];
			
			$goods_count = $goods_count + 1;
        }

        /* 取商品属性 */
        $sql = "SELECT ga.goods_attr_id, ga.attr_value
                FROM " .$GLOBALS['ecs']->table('goods_attr'). " AS ga, " .$GLOBALS['ecs']->table('attribute'). " AS a
                WHERE a.attr_id = ga.attr_id
                AND a.attr_type = 1
                AND " . db_create_in($goods_id_array, 'goods_id');
        $result_goods_attr = $GLOBALS['db']->getAll($sql);

        $_goods_attr = array();
        foreach ($result_goods_attr as $value)
        {
            $_goods_attr[$value['goods_attr_id']] = $value['attr_value'];
        }

        /* 处理货品 */
        $format = '[%s]';
        foreach($goods_res as $key => $val)
        {
            if ($val['goods_attr'] != '')
            {
                $goods_attr_array = explode('|', $val['goods_attr']);

                $goods_attr = array();
                foreach ($goods_attr_array as $_attr)
                {
                    $goods_attr[] = $_goods_attr[$_attr];
                }

                $goods_res[$key]['goods_attr_str'] = sprintf($format, implode('，', $goods_attr));
            }
        }
		
		$res[$tempkey]['goods_count'] = $goods_count;

        $res[$tempkey]['goods_list']    = $goods_res;
        $res[$tempkey]['subtotal']      = price_format($subtotal);
        $res[$tempkey]['saving']        = price_format(($subtotal - $res[$tempkey]['package_price']));
        $res[$tempkey]['package_price'] = price_format($res[$tempkey]['package_price']);
    }

    return $res;
}

function index_get_group_buyex()
{
    $time = gmtime();
    $limit = get_library_number('group_buy', 'index');

    $group_buy_list = array();
    if ($limit > 0)
    {
        $sql = 'SELECT gb.act_id AS group_buy_id, gb.goods_id, gb.ext_info, gb.goods_name,gb.end_time, g.goods_thumb,g.market_price, g.goods_img ' .
                'FROM ' . $GLOBALS['ecs']->table('goods_activity') . ' AS gb, ' .
                    $GLOBALS['ecs']->table('goods') . ' AS g ' .
                "WHERE gb.act_type = '" . GAT_GROUP_BUY . "' " .
                "AND g.goods_id = gb.goods_id " .
                "AND gb.start_time <= '" . $time . "' " .
                "AND gb.end_time >= '" . $time . "' " .
                "AND g.is_delete = 0 " .
                "ORDER BY gb.act_id DESC " .
                "LIMIT $limit" ;
        $res = $GLOBALS['db']->query($sql);

        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            /* 如果缩略图为空，使用默认图片 */
            $row['goods_img'] = get_image_path($row['goods_id'], $row['goods_img']);
            $row['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);

            /* 根据价格阶梯，计算最低价 */
            $ext_info = unserialize($row['ext_info']);
			$row = array_merge($row, $ext_info);
            $price_ladder = $ext_info['price_ladder'];
            if (!is_array($price_ladder) || empty($price_ladder))
            {
                $row['last_price'] = price_format(0);
            }
            else
            {
                foreach ($price_ladder AS $amount_price)
                {
                    $price_ladder[$amount_price['amount']] = $amount_price['price'];
                }
            }
            ksort($price_ladder);
            $row['last_price'] = price_format(end($price_ladder));
			
			
			$stat = group_buy_stat($row['group_buy_id'], $row['deposit']);
			$row['valid_order'] = $stat['valid_order'];
			
			
            $row['url'] = build_uri('group_buy', array('gbid' => $row['group_buy_id']));
            $row['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                           sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
            $row['short_style_name']   = add_style($row['short_name'],'');
			$row['market_price']   = price_format($row['market_price']);
			$row['end_time']   = $row['end_time'];
            $group_buy_list[] = $row;
        }
    }

    return $group_buy_list;
}

function insert_comments_rank($arr)
{

    /* 取得评论列表 */

    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('comment') .
            " WHERE id_value = ".$arr['id']." AND comment_type = 0 AND status = 1 AND parent_id = 0".
            ' ORDER BY comment_id DESC';
    $res = $GLOBALS['db']->getAll($sql);

    $count5 = 0;
	$count4 = 0;
	$count3 = 0;
	$count2 = 0;
	$count1 = 0;
	if (!empty($res))
    {

        foreach($res as $row)
        {
            $rank = $row['comment_rank'];
			switch($rank)
			{
				case 5:
				$count5 ++;
				break;
				case 4:
				$count4 ++;
				break;
				case 3:
				$count3 ++;
				break;
				case 2:
				$count2 ++;
				break;
				case 1:
				$count1 ++;
				break;
			}
        }
        
    }


    $str = $count5.'-'.$count4.'-'.$count3.'-'.$count2.'-'.$count1;
    return $str;
}

function get_cat_rec_1()
{
    $cat_rec = array();
	$sql = "SELECT c.cat_id, c.cat_name, cr.recommend_type FROM " . $GLOBALS['ecs']->table("cat_recommend") . " AS cr INNER JOIN " . $GLOBALS['ecs']->table("category") . " AS c ON cr.cat_id=c.cat_id";
	$cat_recommend_res = $GLOBALS['db']->getAll($sql);
    if (!empty($cat_recommend_res))
    {
        $cat_rec_array = array();
        foreach($cat_recommend_res as $cat_recommend_data)
        {
            $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
        }
        return $cat_rec[1];
    }

}

function get_cat_rec_2()
{
    $cat_rec = array();
	$sql = "SELECT c.cat_id, c.cat_name, cr.recommend_type FROM " . $GLOBALS['ecs']->table("cat_recommend") . " AS cr INNER JOIN " . $GLOBALS['ecs']->table("category") . " AS c ON cr.cat_id=c.cat_id";
	$cat_recommend_res = $GLOBALS['db']->getAll($sql);
    if (!empty($cat_recommend_res))
    {
        $cat_rec_array = array();
        foreach($cat_recommend_res as $cat_recommend_data)
        {
            $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
        }
        return $cat_rec[2];
    }

}

function group_buy_list_ex($size, $page=1)
{
    /* 取得团购活动 */
    $gb_list = array();
    $now = gmtime();
    $sql = "SELECT b.*, IFNULL(g.goods_thumb, '') AS goods_thumb,g.goods_name, g.market_price, g.shop_price, b.act_id AS group_buy_id, ".
                "b.start_time AS start_date, b.end_time AS end_date " .
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS b " .
                "LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ON b.goods_id = g.goods_id " .
            "WHERE b.act_type = '" . GAT_GROUP_BUY . "' " .
            "AND b.start_time <= '$now' AND b.is_finished < 3 ORDER BY b.act_id DESC";
    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);
    while ($group_buy = $GLOBALS['db']->fetchRow($res))
    {
        $ext_info = unserialize($group_buy['ext_info']);
        $group_buy = array_merge($group_buy, $ext_info);

        /* 格式化时间 */
        $group_buy['formated_start_date']   = local_date($GLOBALS['_CFG']['time_format'], $group_buy['start_date']);
        $group_buy['formated_end_date']     = local_date($GLOBALS['_CFG']['time_format'], $group_buy['end_date']);

        /* 格式化保证金 */
        $group_buy['formated_deposit'] = price_format($group_buy['deposit'], false);

        /* 处理价格阶梯 */
        $price_ladder = $group_buy['price_ladder'];
        if (!is_array($price_ladder) || empty($price_ladder))
        {
            $price_ladder = array(array('amount' => 0, 'price' => 0));
        }
        else
        {
            foreach ($price_ladder as $key => $amount_price)
            {
                $price_ladder[$key]['formated_price'] = price_format($amount_price['price']);
            }
        }
        $group_buy['price_ladder'] = $price_ladder;

        /* 处理图片 */
        if (empty($group_buy['goods_thumb']))
        {
            $group_buy['goods_thumb'] = get_image_path($group_buy['goods_id'], $group_buy['goods_thumb'], true);
        }
        /* 处理链接 */
        $group_buy['url'] = build_uri('group_buy', array('gbid'=>$group_buy['group_buy_id']));
		
		
		/* 统计信息 */
		$stat = group_buy_stat($group_buy['group_buy_id'], $group_buy['deposit']);
		$group_buy = array_merge($group_buy, $stat);
	
		/* 计算当前价 */
		$cur_price  = $price_ladder[0]['price']; // 初始化
		$cur_amount = $stat['valid_goods']; // 当前数量
		foreach ($price_ladder as $amount_price)
		{
			if ($cur_amount >= $amount_price['amount'])
			{
				$cur_price = $amount_price['price'];
			}
			else
			{
				break;
			}
		}
		$group_buy['cur_price'] = price_format($cur_price);
		$group_buy['cur_amount'] = $cur_amount+$group_buy['product_id'];
		
		
		$market_price = $group_buy['market_price'];
		
		$group_buy['saving']       = $market_price - $cur_price;
	    $group_buy['save_rate'] = $market_price ? round(($cur_price/ $market_price), 2)*10 : 0;
		
		$group_buy['market_price'] = price_format($group_buy['market_price']);
		
        /* 加入数组 */
        $gb_list[] = $group_buy;
    }

    return $gb_list;
}

function get_catid_byurl($url)
{
	$rs = strpos($url,"category");
	$cat_id = 0;
	if($rs!==false)
	{
		preg_match("/\d+/i",$url,$matches);
		$cat_id = $matches[0];
	}
	return $cat_id;
}

function get_subcate_byurl($url)
{
	$rs = strpos($url,"category");
	if($rs!==false)
	{
		preg_match("/\d+/i",$url,$matches);
		$cid = $matches[0];
		$cat_arr = array();
		$sql = "select * from ".$GLOBALS['ecs']->table('category')." where parent_id=".$cid." and is_show=1 order by sort_order asc, cat_id asc";
		$res = $GLOBALS['db']->getAll($sql);
		
		foreach($res as $idx => $row)
		{
			$cat_arr[$idx]['id']   = $row['cat_id'];
            $cat_arr[$idx]['name'] = $row['cat_name'];
            $cat_arr[$idx]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
			$cat_arr[$idx]['children'] = get_clild_list($row['cat_id']);
		}

		return $cat_arr;
	}
	else 
	{
		return false;
	}
}

function get_clild_list($pid)
{
   //开始获取子分类
    $sql_sub = "select * from ".$GLOBALS['ecs']->table('category')." where parent_id=".$pid." and is_show=1 order by sort_order asc, cat_id asc";

	$subres = $GLOBALS['db']->getAll($sql_sub);
	if($subres)
	{
		foreach ($subres as $sidx => $subrow)
		{
			$children[$sidx]['id']=$subrow['cat_id'];
			$children[$sidx]['name']=$subrow['cat_name'];
			$children[$sidx]['url']=build_uri('category', array('cid' => $subrow['cat_id']), $subrow['cat_name']);
			$children[$sidx]['children'] = get_clild_list($subrow['cat_id']);
		}
	}
	else 
	{
		$children = null;
	}
			
	return $children;
}

function insert_article_content($article_id)
{
    /* 获得文章的信息 */
    $sql = "SELECT a.*, IFNULL(AVG(r.comment_rank), 0) AS comment_rank ".
            "FROM " .$GLOBALS['ecs']->table('article'). " AS a ".
            "LEFT JOIN " .$GLOBALS['ecs']->table('comment'). " AS r ON r.id_value = a.article_id AND comment_type = 1 ".
            "WHERE a.is_open = 1 AND a.article_id = '$article_id' GROUP BY a.article_id";
    $row = $GLOBALS['db']->getRow($sql);

    return $row['content'];
}

function get_child_cat($tree_id = 0)
{
    $three_arr = array();
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$tree_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $tree_id == 0)
    {
        $child_sql = 'SELECT cat_id, cat_name, parent_id, is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$tree_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
        $res = $GLOBALS['db']->getAll($child_sql);
        foreach ($res AS $row)
        {
            if ($row['is_show'])
             {
               $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
               $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
			   $three_arr[$row['cat_id']]['name2'] = mb_substr($row['cat_name'], 0, 2, 'utf-8');
               $three_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);


            }
        }
    }
    return $three_arr;
}

function insert_cart_count()
{
    $sql = 'SELECT SUM(goods_number) AS number, SUM(goods_price * goods_number) AS amount' .
           ' FROM ' . $GLOBALS['ecs']->table('cart') .
           " WHERE session_id = '" . SESS_ID . "' AND rec_type = '" . CART_GENERAL_GOODS . "'";
    $row = $GLOBALS['db']->GetRow($sql);

    if ($row)
    {
        $number = intval($row['number']);
        $amount = floatval($row['amount']);
    }
    else
    {
        $number = 0;
        $amount = 0;
    }

    return $number;
}

function insert_cart_data()
{
	$cart = get_cart_data();
	
	$list = $cart['goods_list'];
	
	$total = $cart_goods['total'];
	
	$str = '';
	if ($list)
	{
		$total_price = 0;
		
		$str .= '<ul id="JS_header_cart" class="cartUL">';
		
		foreach ($list as $item)
		{
		
		      if ($item['extension_code'] == 'package_buy')
			  {
			    $index = 1;
			  	foreach($item['package_goods_list'] as $packitem)
				{
					if ($index == 1)
					{
			  			$img_src = get_goods_thumb($packitem['goods_id']);
					}
					$index = $index + 1;
				}
			  }
			  else
			  {
			  	$img_src = ($item['goods_thumb'] == '' ? 'themes/meilele/images/blank.gif' : $item['goods_thumb']);
			  }

			 $str .= '<li id="JS_cart_list_index_0">
              <div class="tImg"><a href="goods.php?id='.$item['goods_id'].'" target="_blank" title="'.$item['short_name'].'"><img src="'.$img_src.'" alt="'.$item['short_name'].'" height="57" width="86"></a></div>
              <div class="gInfo">
                <p class="gn"><a href="goods.php?id='.$item['goods_id'].'" target="_blank" title="'.$item['short_name'].'">'.$item['short_name'].'</a></p>
                <p class="gt"><strong class="Left"><span class="cl yen"><span id="JS_danjia0">'.$item['goods_price'].'</span></span>×'.$item['goods_number'].'</strong><a class="Right" href="javascript:drop_cart_goods(\''.$item['rec_id'].'\');" data-index="0" data-recid="9136371" data-num="1">删除</a></p>

              </div>
            </li>';			
					
			$total_price = $total_price + $item['total_price'];	
		}
		
		$total_price = price_format($total_price, false);
	  

	  $str .= '</ul>
				<div class="cartDiv clearfix">
            <p class="totaoFee">共<strong class="red f14" id="JS_num">'.insert_cart_count().'</strong>件商品，共计<strong class="yen red num"><span id="JS_total">'.$total_price.'</span></strong></p>
            <div class="clearfix"><a class="toPay" href="flow.php">立刻购买</a></div>
          </div>';			
		
	}else{
		$str = '<div class="loadLay" style="color:#626262;">您的购物车中还没有商品，先去选购吧！</div>';
	}		
     
	return $str; 
}

function get_cart_data()
{
    /* 初始化 */
    $goods_list = array();
    $total = array(
        'goods_price'  => 0, // 本店售价合计（有格式）
        'market_price' => 0, // 市场售价合计（有格式）
        'saving'       => 0, // 节省金额（有格式）
        'save_rate'    => 0, // 节省百分比
        'goods_amount' => 0, // 本店售价合计（无格式）
    );

    /* 循环、统计 */
    $sql = "SELECT *, IF(parent_id, parent_id, goods_id) AS pid " .
            " FROM " . $GLOBALS['ecs']->table('cart') . " " .
            " WHERE session_id = '" . SESS_ID . "' AND rec_type = '" . CART_GENERAL_GOODS . "'" .
            " ORDER BY pid, parent_id";
    $res = $GLOBALS['db']->query($sql);

    /* 用于统计购物车中实体商品和虚拟商品的个数 */
    $virtual_goods_count = 0;
    $real_goods_count    = 0;

    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $total['goods_price']  += $row['goods_price'] * $row['goods_number'];
        $total['market_price'] += $row['market_price'] * $row['goods_number'];
		
		$row['total_price']  += $row['goods_price'] * $row['goods_number'];

        $row['subtotal']     = price_format($row['goods_price'] * $row['goods_number'], false);
        $row['goods_price']  = price_format($row['goods_price'], false);
        $row['market_price'] = price_format($row['market_price'], false);

        /* 统计实体商品和虚拟商品的个数 */
        if ($row['is_real'])
        {
            $real_goods_count++;
        }
        else
        {
            $virtual_goods_count++;
        }
		
		$row['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
            sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];

        /* 查询规格 */
        if (trim($row['goods_attr']) != '')
        {
            $sql = "SELECT attr_value FROM " . $GLOBALS['ecs']->table('goods_attr') . " WHERE goods_attr_id " .
            db_create_in($row['goods_attr']);
            $attr_list = $GLOBALS['db']->getCol($sql);
            foreach ($attr_list AS $attr)
            {
                $row['goods_name'] .= ' [' . $attr . '] ';
            }
        }
        /* 增加是否在购物车里显示商品图 */
        if (($GLOBALS['_CFG']['show_goods_in_cart'] == "2" || $GLOBALS['_CFG']['show_goods_in_cart'] == "3") && $row['extension_code'] != 'package_buy')
        {
            $goods_thumb = $GLOBALS['db']->getOne("SELECT `goods_thumb` FROM " . $GLOBALS['ecs']->table('goods') . " WHERE `goods_id`='{$row['goods_id']}'");
            $row['goods_thumb'] = get_image_path($row['goods_id'], $goods_thumb, true);
        }
        if ($row['extension_code'] == 'package_buy')
        {
            $row['package_goods_list'] = get_package_goods($row['goods_id']);
        }
		$row['extension_code'] = $row['extension_code'];
        $goods_list[] = $row;
    }
    $total['goods_amount'] = $total['goods_price'];
    $total['saving']       = price_format($total['market_price'] - $total['goods_price'], false);
    if ($total['market_price'] > 0)
    {
        $total['save_rate'] = $total['market_price'] ? round(($total['market_price'] - $total['goods_price']) *
        100 / $total['market_price']).'%' : 0;
    }
    $total['goods_price']  = price_format($total['goods_price'], false);
    $total['market_price'] = price_format($total['market_price'], false);
    $total['real_goods_count']    = $real_goods_count;
    $total['virtual_goods_count'] = $virtual_goods_count;

    return array('goods_list' => $goods_list, 'total' => $total);
}

function get_cat_info_ex($cat_id)
{
	$row = $GLOBALS['db']->getRow('SELECT cat_name, keywords, cat_desc, style, grade, filter_attr, parent_id FROM ' . $GLOBALS['ecs']->table('category') .
        " WHERE cat_id = '$cat_id'");
	$cat_name = $row["cat_name"];	

	
	$arr = array();
	$arr[$cat_id]['cat_name'] = $cat_name;

	
	return $arr;
}

function get_goods_thumb($goods_id)
{
	$sql = 'select goods_id,goods_thumb from ' . $GLOBALS['ecs']->table('goods') . ' where goods_id = '.$goods_id;
	$row = $GLOBALS['db']->GetRow($sql);
    $goods_thumb = get_image_path($row['goods_id'], $row['goods_thumb'], true);
	return $goods_thumb;
}

function get_user_rank($user_name)
{
	$sql = 'select user_rank from ' . $GLOBALS['ecs']->table('users') . ' where user_name = "'.$user_name.'"';
	$row = $GLOBALS['db']->GetRow($sql);
	echo $row['user_rank'];
}

function get_goods_ex($goods_id)
{
    $sql = 'select IFNULL(sum(og.goods_number), 0) as total_sells from ' . $GLOBALS['ecs']->table('order_goods') . ' as og where og.goods_id = '.$goods_id;
    $row = $GLOBALS['db']->GetRow($sql);
	$total_sells = $row["total_sells"];
	
	$sql = 'select count(*) as total_comments from ' . $GLOBALS['ecs']->table('comment') . ' as r where r.id_value = '.$goods_id.' AND r.comment_type = 0 AND r.parent_id = 0 AND r.status = 1';
    $row = $GLOBALS['db']->GetRow($sql);
	$total_comments = $row["total_comments"];
	
	$sql = 'select goods_id,goods_brief, brand_id,is_best,is_new,is_hot,is_promote, promote_start_date, promote_end_date, promote_price, shop_price, market_price, click_count,goods_thumb from ' . $GLOBALS['ecs']->table('goods') . ' where goods_id = '.$goods_id;
    $row = $GLOBALS['db']->GetRow($sql);
	$goods_brief = $row["goods_brief"];
	$click_count = $row["click_count"];
	$is_promote = $row["is_promote"];
	$is_best = $row["is_best"];
	$is_new = $row["is_new"];
	$is_hot = $row["is_hot"];
	$promote_price = $row["shop_price"] - $row["promote_price"];
	$promote_end_date = $row["promote_end_date"] - $row["promote_start_date"];
	$shop_price = intval($row["promote_price"]) > 0 ? $row["promote_price"] : $row["shop_price"];
	$market_price = $row["market_price"];
	$goods_brief = $row["goods_brief"];
	$brand_id = $row["brand_id"];
	$goods_thumb = get_image_path($row['goods_id'], $row['goods_thumb'], true);
	
	$sql = 'select brand_name from ' . $GLOBALS['ecs']->table('brand') . ' where brand_id = '.$brand_id;
    $row = $GLOBALS['db']->GetRow($sql);
	$brand_name = $row["brand_name"];
	
	$arr = array();
	$arr[$goods_id]['total_sells'] = $total_sells;
	$arr[$goods_id]['total_comments'] = $total_comments;
	$arr[$goods_id]['click_count'] = $click_count;
	$arr[$goods_id]['goods_brief'] = $goods_brief;
	$arr[$goods_id]['promote_price'] = $promote_price;
	$arr[$goods_id]['promote_end_date'] = $promote_end_date;
	$arr[$goods_id]['brand_id'] = $brand_id;
	$arr[$goods_id]['shop_price'] = $shop_price;
	$arr[$goods_id]['market_price'] = $market_price;
	$arr[$goods_id]['brand_name'] = $brand_name;
	$arr[$goods_id]['goods_thumb'] = $goods_thumb;
	
	    $goods_flag = '';

        if ($is_promote == 1)
        {
            $goods_flag = "promote";
        }
        elseif ($is_new == 1)
        {
            $goods_flag = "new";
        }
        elseif ($is_best == 1)
        {
            $goods_flag = "best";
        }
        elseif ($is_hot == 1)
        {
            $goods_flag = 'hot';
        }

        $arr[$goods_id]['goods_flag'] = $goods_flag;
	
	$arr[$goods_id]['saving']    = $market_price - $promote_price;
	$arr[$goods_id]['save_rate'] = $market_price ? round(($promote_price/ $market_price), 2)*10 : 0;
	$arr[$goods_id]['save_rate2'] = $market_price ? round(($shop_price/ $market_price), 2)*10 : 0;
	
	return $arr;
}

function get_link_goods($goods_id)
{
    $sql = 'SELECT g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                'g.market_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
            'FROM ' . $GLOBALS['ecs']->table('link_goods') . ' lg ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('goods') . ' AS g ON g.goods_id = lg.link_goods_id ' .
            "LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
            "WHERE lg.goods_id = '$goods_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "LIMIT " . $GLOBALS['_CFG']['related_goods_number'];
    $res = $GLOBALS['db']->query($sql);

    $arr = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $arr[$row['goods_id']]['goods_id']     = $row['goods_id'];
		$arr[$row['goods_id']]['properties']     = get_goods_properties($row['goods_id']);
        $arr[$row['goods_id']]['goods_name']   = $row['goods_name'];
        $arr[$row['goods_id']]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
            sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $arr[$row['goods_id']]['goods_thumb']  = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $arr[$row['goods_id']]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $arr[$row['goods_id']]['market_price'] = price_format($row['market_price']);
        $arr[$row['goods_id']]['shop_price']   = price_format($row['shop_price']);
        $arr[$row['goods_id']]['url']          = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);

        if ($row['promote_price'] > 0)
        {
            $arr[$row['goods_id']]['promote_price'] = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
            $arr[$row['goods_id']]['formated_promote_price'] = price_format($arr[$row['goods_id']]['promote_price']);
        }
        else
        {
            $arr[$row['goods_id']]['promote_price'] = 0;
        }
    }

    return $arr;
}

function get_activity_by_id($id)
{


    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('topic') . " WHERE topic_id = '$topic_id'";
    $res = $GLOBALS['db']->query($sql);

    while ($row = $GLOBALS['db']->fetchRow($res))
    {
	    $row['formated_start_time'] = local_date('Y年m月d日', $row['start_time']);
		$row['formated_end_time'] = local_date('Y年m月d日', $row['end_time']);
        $arr[] = $row;
    }

    return $arr;
}

function get_activity()
{


    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('topic');
    $res = $GLOBALS['db']->query($sql);

    while ($row = $GLOBALS['db']->fetchRow($res))
    {
	    $row['formated_start_time'] = local_date('Y年m月d日', $row['start_time']);
		$row['formated_end_time'] = local_date('Y年m月d日', $row['end_time']);
        $arr[] = $row;
    }

    return $arr;
}

function group_buy_goods_info($group_buy_id, $current_num = 0)
{
    /* 取得团购活动信息 */
    $group_buy_id = intval($group_buy_id);
    $sql = "SELECT b.*, b.act_id AS group_buy_id, b.act_desc AS group_buy_desc, b.start_time AS start_date, g.market_price, g.shop_price,  b.end_time AS end_date " .
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS b " .
			"LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ON b.goods_id = g.goods_id " .
            "WHERE b.act_id = '$group_buy_id' " .
            "AND b.act_type = '" . GAT_GROUP_BUY . "'";
    $group_buy = $GLOBALS['db']->getRow($sql);

    /* 如果为空，返回空数组 */
    if (empty($group_buy))
    {
        return array();
    }

    $ext_info = unserialize($group_buy['ext_info']);
    $group_buy = array_merge($group_buy, $ext_info);

    /* 格式化时间 */
    $group_buy['formated_start_date'] = local_date('Y-m-d H:i', $group_buy['start_time']);
    $group_buy['formated_end_date'] = local_date('Y-m-d H:i', $group_buy['end_time']);

    /* 格式化保证金 */
    $group_buy['formated_deposit'] = price_format($group_buy['deposit'], false);

    /* 处理价格阶梯 */
    $price_ladder = $group_buy['price_ladder'];
    if (!is_array($price_ladder) || empty($price_ladder))
    {
        $price_ladder = array(array('amount' => 0, 'price' => 0));
    }
    else
    {
        foreach ($price_ladder as $key => $amount_price)
        {
            $price_ladder[$key]['formated_price'] = price_format($amount_price['price'], false);
        }
    }
    $group_buy['price_ladder'] = $price_ladder;

    /* 统计信息 */
    $stat = group_buy_stat($group_buy_id, $group_buy['deposit']);
    $group_buy = array_merge($group_buy, $stat);

    /* 计算当前价 */
    $cur_price  = $price_ladder[0]['price']; // 初始化
    $cur_amount = $stat['valid_goods'] + $current_num; // 当前数量
    foreach ($price_ladder as $amount_price)
    {
        if ($cur_amount >= $amount_price['amount'])
        {
            $cur_price = $amount_price['price'];
        }
        else
        {
            break;
        }
    }
    $group_buy['cur_price'] = $cur_price;
	$group_buy['cur_amount'] = $cur_amount+$group_buy['product_id'];;
    $group_buy['formated_cur_price'] = price_format($cur_price, false);

    /* 最终价 */
    $group_buy['trans_price'] = $group_buy['cur_price'];
    $group_buy['formated_trans_price'] = $group_buy['formated_cur_price'];
    $group_buy['trans_amount'] = $group_buy['valid_goods'];

    /* 状态 */
    $group_buy['status'] = group_buy_status($group_buy);
    if (isset($GLOBALS['_LANG']['gbs'][$group_buy['status']]))
    {
        $group_buy['status_desc'] = $GLOBALS['_LANG']['gbs'][$group_buy['status']];
    }

    $group_buy['start_time'] = $group_buy['formated_start_date'];
    $group_buy['end_time'] = $group_buy['formated_end_date'];
	
	$market_price = $group_buy['market_price'];
		
	$group_buy['saving']       = $market_price - $cur_price;
	$group_buy['save_rate'] = $market_price ? round(($cur_price/ $market_price), 2)*10 : 0;

    return $group_buy;
}

function group_buy_list_goods($size=100, $page=1)
{
    /* 取得团购活动 */
    $gb_list = array();
    $now = gmtime();
    $sql = "SELECT b.*, IFNULL(g.goods_thumb, '') AS goods_thumb, g.market_price, g.shop_price, b.act_id AS group_buy_id, ".
                "b.start_time AS start_date, b.end_time AS end_date " .
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS b " .
                "LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ON b.goods_id = g.goods_id " .
            "WHERE b.act_type = '" . GAT_GROUP_BUY . "' " .
            "AND b.start_time <= '$now' AND b.is_finished < 3 ORDER BY b.act_id DESC";
    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);
    while ($group_buy = $GLOBALS['db']->fetchRow($res))
    {
        $ext_info = unserialize($group_buy['ext_info']);
        $group_buy = array_merge($group_buy, $ext_info);

        /* 格式化时间 */
        $group_buy['formated_start_date']   = local_date($GLOBALS['_CFG']['time_format'], $group_buy['start_date']);
        $group_buy['formated_end_date']     = local_date($GLOBALS['_CFG']['time_format'], $group_buy['end_date']);

        /* 格式化保证金 */
        $group_buy['formated_deposit'] = price_format($group_buy['deposit'], false);

        /* 处理价格阶梯 */
        $price_ladder = $group_buy['price_ladder'];
        if (!is_array($price_ladder) || empty($price_ladder))
        {
            $price_ladder = array(array('amount' => 0, 'price' => 0));
        }
        else
        {
            foreach ($price_ladder as $key => $amount_price)
            {
                $price_ladder[$key]['formated_price'] = price_format($amount_price['price']);
            }
        }
        $group_buy['price_ladder'] = $price_ladder;

        /* 处理图片 */
        if (empty($group_buy['goods_thumb']))
        {
            $group_buy['goods_thumb'] = get_image_path($group_buy['goods_id'], $group_buy['goods_thumb'], true);
        }
        /* 处理链接 */
        $group_buy['url'] = build_uri('group_buy', array('gbid'=>$group_buy['group_buy_id']));
		
		
		/* 统计信息 */
		$stat = group_buy_stat($group_buy['group_buy_id'], $group_buy['deposit']);
		$group_buy = array_merge($group_buy, $stat);
	
		/* 计算当前价 */
		$cur_price  = $price_ladder[0]['price']; // 初始化
		$cur_amount = $stat['valid_goods']; // 当前数量
		foreach ($price_ladder as $amount_price)
		{
			if ($cur_amount >= $amount_price['amount'])
			{
				$cur_price = $amount_price['price'];
			}
			else
			{
				break;
			}
		}
		$group_buy['cur_price'] = $cur_price;
		$group_buy['cur_amount'] = $cur_amount+$group_buy['product_id'];
		
		
		$market_price = $group_buy['market_price'];
		
		$group_buy['saving']       = $market_price - $cur_price;
	    $group_buy['save_rate'] = $market_price ? round(($cur_price/ $market_price), 2)*10 : 0;
		
		
		
        /* 加入数组 */
        $gb_list[] = $group_buy;
    }

    return $gb_list;
}

function brand_related_cats($brand)
{


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

function get_extend_user_info()
{
	$sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('reg_fields') . ' WHERE type < 2 AND display = 1 ORDER BY dis_order, id';
    return $GLOBALS['db']->getAll($sql);
}



function insert_all_brand_info()
{
	
	$sql = "SELECT b.brand_id, b.brand_name, b.brand_logo, b.brand_desc, replace(b.site_url, 'http://', '') as site_url, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
            "FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
                $GLOBALS['ecs']->table('goods') . " AS g ".
            "WHERE g.brand_id = b.brand_id $children AND is_show = 1 " .
            " AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY  replace(b.site_url, 'http://', '') ASC";
	
	$brand_array = $GLOBALS['db']->getall($sql);
	
	$brand_list = array();
	
	for($i=0;$i<count($brand_array);$i++)
	{
	   $l = get_first_char($brand_array[$i]['site_url']);
	   $brand_list[$l][$brand_array[$i]['brand_id']] = $brand_array[$i]['brand_id']."-".$brand_array[$i]['brand_name']."-".$brand_array[$i]['site_url']."-".$brand_array[$i]['brand_logo'];
	}
	
	$show = '';
	
	foreach ($brand_list AS $row=>$idx)
	{
				  
		$show .='<dl class="item">
				<dt><a name="'.$row.'">'.$row.'</a></dt>
				<dd>'; 	
			
			  foreach($idx AS $row2=>$idx2)
			  {
			  $idx2 = explode('-',$idx2);

			  $show .='<a href="brand.php?id='.$idx2[0].'">'.$idx2[1].'</a>';
			  }
			  
		$show .='</dd>
      		 </dl>';			  
	 
	}
	
	return $show;
}

function get_first_char($str){     

  $fchar=$str[0];  

  //判断是否为字符串  

  if(ord($fchar)>=ord("A") && ord($fchar)<=ord("z") )  return strtoupper($fchar);  

  $str=iconv("UTF-8","gb2312", $str);     

  $asc=ord($str[0])*256+ord($str[1])-65536;     

  if($asc>=-20319 and $asc<=-20284)return "A";     

  if($asc>=-20283 and $asc<=-19776)return "B";     

  if($asc>=-19775 and $asc<=-19219)return "C";     

  if($asc>=-19218 and $asc<=-18711)return "D";     

  if($asc>=-18710 and $asc<=-18527)return "E";      

  if($asc>=-18526 and $asc<=-18240)return "F";      

  if($asc>=-18239 and $asc<=-17923)return "G";      

  if($asc>=-17922 and $asc<=-17418)return "H";                   

  if($asc>=-17417 and $asc<=-16475)return "I";                   

  if($asc>=-16474 and $asc<=-16213)return "J";                   

  if($asc>=-16212 and $asc<=-15641)return "K";                   

  if($asc>=-15640 and $asc<=-15166)return "L";                   

  if($asc>=-15165 and $asc<=-14923)return "M";                   

  if($asc>=-14922 and $asc<=-14915)return "N";                   

  if($asc>=-14914 and $asc<=-14631)return "P";                   

  if($asc>=-14630 and $asc<=-14150)return "Q";                   

  if($asc>=-14149 and $asc<=-14091)return "R";                   

  if($asc>=-14090 and $asc<=-13319)return "S";                   

  if($asc>=-13318 and $asc<=-12839)return "T";                   

  if($asc>=-12838 and $asc<=-12557)return "W";                   

  if($asc>=-12556 and $asc<=-11848)return "X";                   

  if($asc>=-11847 and $asc<=-11056)return "Y";                   

  if($asc>=-11055 and $asc<=-10247)return "Z";       

  return null;     

 } 


function get_user_name($id)
{
   $sql = "select user_name from ".$GLOBALS['ecs']->table('users')." where user_id = ".$id."";
   return $GLOBALS['db']->getOne($sql);
}

function get_brand_name($id)
{
   $sql = "select brand_name from ".$GLOBALS['ecs']->table('brand')." where brand_id = ".$id."";
   return $GLOBALS['db']->getOne($sql);

}

function get_top_cat_id($nid)
{
   $sql = "select parent_id from ".$GLOBALS['ecs']->table('category')." where cat_id = ".$nid."";
   $temp_id=0;
   $pid=$GLOBALS['db']->getOne($sql);
   if($pid>0)
   {
      $temp_id=get_top_cat_id($pid);
   }
   else
   {
	  $temp_id = $nid;
   }
   return $temp_id;
}

function get_parent_cat_id($nid)
{
   $sql = "select parent_id from ".$GLOBALS['ecs']->table('category')." where cat_id = ".$nid."";
   $pid=$GLOBALS['db']->getOne($sql);
   return $pid;
}

function get_top_art_cat_id($nid)
{
   $sql = "select parent_id from ".$GLOBALS['ecs']->table('article_cat')." where cat_id = ".$nid."";
   $temp_id=0;
   $pid=$GLOBALS['db']->getOne($sql);
   if($pid>0)
   {
      $temp_id=get_top_art_cat_id($pid);
   }
   else
   {
	  $temp_id = $nid;
   }
   return $temp_id;
}

function get_goods_gallerys($goods_id)
{
    $sql = 'SELECT img_id, img_url, thumb_url,img_original, img_desc' .
        ' FROM ' . $GLOBALS['ecs']->table('goods_gallery') .
        " WHERE goods_id = '$goods_id' LIMIT " . $GLOBALS['_CFG']['goods_gallery_number'];
    $row = $GLOBALS['db']->getAll($sql);
    /* 格式化相册图片路径 */
    foreach($row as $key => $gallery_img)
    {
        $row[$key]['img_url'] = get_image_path($goods_id, $gallery_img['img_url'], false, 'gallery');
        $row[$key]['thumb_url'] = get_image_path($goods_id, $gallery_img['thumb_url'], true, 'gallery');
		$row[$key]['original_url'] = get_image_path($goods_id, $gallery_img['img_original'], true, 'gallery');
    }
    return $row;
}

function get_new_comment($type,$count)
{
   $arr=array();
	$sql = "select c.*, g.goods_id, g.goods_thumb, g.goods_name from ".$GLOBALS['ecs']->table('comment')." AS c ".
	" LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ".
    "ON c.id_value = g.goods_id where c.comment_type = ".$type." and c.status=1 order by c.add_time desc limit ".$count;
	$res = $GLOBALS['db']->getAll($sql);
	foreach($res as $idx => $row)
	{
	   $arr[$idx]['id_value']= $row['id_value'];
	   $arr[$idx]['user_name']= get_user_name($row['id_value']);
	   $arr[$idx]['content'] = $row['content'];
	   $arr[$idx]['comment_rank'] = $row['comment_rank'];
	   $arr[$idx]['time']    = local_date("m-d",$row['add_time']);
	   $arr[$idx]['goods_id'] = $row['goods_id'];
	   $arr[$idx]['goods_name'] = $row['goods_name'];
	   $arr[$idx]['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
	   $arr[$idx]['url'] = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
	}
	return $arr;
}

function get_rand_comment($type,$count)
{
   $arr=array();
	$sql = "select c.*, g.goods_id, g.goods_thumb, g.goods_name from ".$GLOBALS['ecs']->table('comment')." AS c ".
	" LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ".
    "ON c.id_value = g.goods_id where c.comment_type = ".$type." and c.status=1 order by RAND() desc limit ".$count;
	$res = $GLOBALS['db']->getAll($sql);
	foreach($res as $idx => $row)
	{
	   $arr[$idx]['id_value']= $row['id_value'];
	   $arr[$idx]['user_name']= get_user_name($row['id_value']);
	   $arr[$idx]['content'] = $row['content'];
	   $arr[$idx]['comment_rank'] = $row['comment_rank'];
	   $arr[$idx]['time']    = local_date("m-d",$row['add_time']);
	   $arr[$idx]['goods_id'] = $row['goods_id'];
	   $arr[$idx]['goods_name'] = $row['goods_name'];
	   $arr[$idx]['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
	   $arr[$idx]['url'] = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
	}
	return $arr;
}

function get_bought_notes($num)
{
   $sql = 'SELECT u.user_name, og.goods_number, g.goods_id, g.goods_thumb, g.goods_name,g.shop_price, oi.add_time, IF(oi.order_status IN (2, 3, 4), 0, 1) AS order_status ' .
           'FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS oi LEFT JOIN ' . $GLOBALS['ecs']->table('users') . ' AS u ON oi.user_id = u.user_id, ' . $GLOBALS['ecs']->table('order_goods') . ' AS og LEFT JOIN ' . $GLOBALS['ecs']->table('goods')  . " AS g ".
		   'ON og.goods_id = g.goods_id '.
           'WHERE oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 ORDER BY oi.add_time DESC LIMIT ' . $num;

   $bought_notes = $GLOBALS['db']->getAll($sql);

   foreach ($bought_notes as $key => $val)
   {
            $bought_notes[$key]['add_time'] = local_date("m-d G:i", $val['add_time']);
			$bought_notes[$key]['goods_thumb'] = get_image_path($val['goods_id'], $val['goods_thumb'], true);
	        $bought_notes[$key]['url'] = build_uri('goods', array('gid' => $val['goods_id']), $val['goods_name']);
   }
   return $bought_notes;
}

function get_flash_xml()
{
    $flashdb = array();
    if (file_exists(ROOT_PATH . DATA_DIR . '/flash_data.xml'))
    {

        // 兼容v2.7.0及以前版本
        if (!preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"\ssort="([^"]*)"/', file_get_contents(ROOT_PATH . DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER))
        {
            preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"/', file_get_contents(ROOT_PATH . DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER);
        }

        if (!empty($t))
        { 
		    $index = 0;
            foreach ($t as $key => $val)
            {
			    $index ++;
                $val[4] = isset($val[4]) ? $val[4] : 0;
                $flashdb[] = array('src'=>$val[1],'url'=>$val[2],'text'=>$val[3],'sort'=>$val[4],'index'=>$index);
            }
        }
    }
    return $flashdb;
}

function get_cat_brands($cat, $app = 'category')
{
    $children = ($cat > 0) ? ' AND ' . get_children($cat) : '';

    $sql = "SELECT b.brand_id, b.brand_name, b.brand_logo, COUNT(g.goods_id) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
            "FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
                $GLOBALS['ecs']->table('goods') . " AS g ".
            "WHERE g.brand_id = b.brand_id $children " .
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY tag DESC, b.sort_order ASC";

	//print_r($cat);

    $row = $GLOBALS['db']->getAll($sql);

    foreach ($row AS $key => $val)
    {
	    $row[$key]['id'] = $val['brand_id'];
	    $row[$key]['name'] = $val['brand_name'];
		$row[$key]['logo'] = $val['brand_logo'];
        $row[$key]['url'] = build_uri($app, array('cid' => $cat, 'bid' => $val['brand_id']), $val['brand_name']);
    }

    return $row;
}

function get_history()
{
    $str = '';
    if (!empty($_COOKIE['ECS']['history']))
    {
        $where = db_create_in($_COOKIE['ECS']['history'], 'goods_id');
        $sql   = 'SELECT goods_id, goods_name, goods_thumb, shop_price FROM ' . $GLOBALS['ecs']->table('goods') .
                " WHERE $where AND is_on_sale = 1 AND is_alone_sale = 1 AND is_delete = 0";
			
        $query = $GLOBALS['db']->query($sql);
        $res = array();
        while ($row = $GLOBALS['db']->fetch_array($query))
        {
            $goods['goods_id'] = $row['goods_id'];
            $goods['goods_name'] = $row['goods_name'];
            $goods['short_name'] = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
            $goods['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods['shop_price'] = price_format($row['shop_price']);
            $goods['url'] = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
            $res[] = $goods;
        }
    }
    return $res;
}

function get_cat_recommend_goods($type = '', $cat_id = 0, $cat_num = 0, $brand = 0, $min =0,  $max = 0, $ext='')
{
    $brand_where = ($brand > 0) ? " AND g.brand_id = '$brand'" : '';

    $price_where = ($min > 0) ? " AND g.shop_price >= $min " : '';
    $price_where .= ($max > 0) ? " AND g.shop_price <= $max " : '';

    $sql =  'SELECT g.goods_id, g.goods_name, g.goods_name_style,g.goods_sn,  g.market_price, g.shop_price AS org_price, g.promote_price,g.seller_note, ' .
        "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
        '(select AVG(r.comment_rank) from ' . $GLOBALS['ecs']->table('comment') . ' as r where r.id_value = g.goods_id AND r.comment_type = 0 AND r.parent_id = 0 AND r.status = 1) AS comment_rank, ' .
					
        '(select IFNULL(sum(og.goods_number), 0) from ' . $GLOBALS['ecs']->table('order_goods') . ' as og where og.goods_id = g.goods_id) AS sell_number, ' .
        'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, b.brand_name,b.brand_id,b.brand_logo ' .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('brand') . ' AS b ON b.brand_id = g.brand_id ' .
            "LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
        "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
            'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ' . $brand_where . $price_where . $ext;
    $num = 0;
    $type2lib = array('best'=>'recommend_best', 'new'=>'recommend_new', 'hot'=>'recommend_hot', 'promote'=>'recommend_promotion');
    if($cat_num==0)
		$num = get_library_number($type2lib[$type]);
	else
		$num = $cat_num;

    switch ($type)
    {
        case 'best':
            $sql .= ' AND is_best = 1';
            break;
        case 'new':
            $sql .= ' AND is_new = 1';
            break;
        case 'hot':
            $sql .= ' AND is_hot = 1';
            break;
        case 'promote':
            $time = gmtime();
            $sql .= " AND is_promote = 1 AND promote_start_date <= '$time' AND promote_end_date >= '$time'";
            break;
    }

    $cats = get_children($cat_id);
    if (!empty($cats))
    {
        $sql .= " AND (" . $cats . " OR " . get_extension_goods($cats) .")";
    }

    $order_type = $GLOBALS['_CFG']['recommend_order'];
    $sql .= ($order_type == 0) ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY RAND()';
    $res = $GLOBALS['db']->selectLimit($sql, $num);

    $idx = 0;
	$index = 1;
    $goods = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        if ($row['promote_price'] > 0)
        {
            $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
            $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
			$goods[$idx]['promote_price2'] = $promote_price;
			$goods[$idx]['saving']   = $row['market_price'] - $promote_price;
        }
        else
        {
            $goods[$idx]['promote_price'] = '';
        }
        $index++;
        $goods[$idx]['i']           = $index;
        $goods[$idx]['id']           = $row['goods_id'];
        $goods[$idx]['name']         = $row['goods_name'];
		$goods[$idx]['goods_sn']         = $row['goods_sn'];
		$goods[$idx]['comment_rank']     = $row['comment_rank'];
		$goods[$idx]['sell_number']      = $row['sell_number'];
		$goods[$idx]['seller_note']      = $row['seller_note'];
		$goods[$idx]['is_new']           = $row['is_new'];
        $goods[$idx]['brief']        = $row['goods_brief'];
        $goods[$idx]['brand_name']   = $row['brand_name'];
		$goods[$idx]['brand_id']   = $row['brand_id'];
		$goods[$idx]['brand_logo']   = $row['brand_logo'];
        $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                       sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
		
		$goods[$idx]['promote_limit_time'] = $row['promote_end_date'] - $row['promote_start_date'];
		$goods[$idx]['promote_end_date']    = local_date('m/d/Y H:i:s', $row['promote_end_date']);
		$goods[$idx]['promote_end_date2']    = $row['promote_end_date'];
		
		$market_price = $row['market_price'];
		$promote_price = $goods[$idx]['promote_price2'];
		$shop_price = $row['shop_price'];
		$goods[$idx]['saving']    = $market_price - $promote_price;
	    $goods[$idx]['save_rate'] = $market_price ? round(($promote_price/ $market_price), 2)*10 : 0;
	    $goods[$idx]['save_rate2'] = $market_price ? round(($shop_price/ $market_price), 2)*10 : 0;

        $goods[$idx]['short_style_name'] = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
        $idx++;
    }

    return $goods;
}

function get_article_cat($tree_id = 0, $num = 0)
{
    $three_arr = array();
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('article_cat') . " WHERE parent_id = '$tree_id'";
	if ($num > 0)
	{
		$where = ' limit '.$num;
	}
    if ($GLOBALS['db']->getOne($sql) || $tree_id == 0)
    {
        $child_sql = 'SELECT * ' .
                'FROM ' . $GLOBALS['ecs']->table('article_cat') .
                "WHERE parent_id = '$tree_id' ORDER BY sort_order ASC, cat_id ASC $where";
        $res = $GLOBALS['db']->getAll($child_sql);
        foreach ($res AS $row)
        {
               $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
               $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
        }
    }
    return $three_arr;
}

function get_cat_top_arts($cat_id, $size = 20)
{
    //取出所有非0的文章
    if ($cat_id == '-1')
    {
        $cat_str = 'cat_id > 0';
    }
    else
    {
        $cat_str = get_article_children($cat_id);
    }
    //增加搜索条件，如果有搜索内容就进行搜索    

        
    $sql = 'SELECT article_id, title, author, add_time, file_url, description, open_type' .
               ' FROM ' .$GLOBALS['ecs']->table('article') .
               ' WHERE is_open = 1 AND article_type = 1 AND ' . $cat_str .
               ' ORDER BY article_type DESC, article_id DESC';
			   

    $res = $GLOBALS['db']->selectLimit($sql, $size);

    $arr = array();
    if ($res)
    {
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $article_id = $row['article_id'];

            $arr[$article_id]['id']          = $article_id;
            $arr[$article_id]['title']       = $row['title'];
			$arr[$article_id]['file_url']    = $row['file_url'];
			$arr[$article_id]['description'] = $row['description'];
            $arr[$article_id]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ? sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
            $arr[$article_id]['author']      = empty($row['author']) || $row['author'] == '_SHOPHELP' ? $GLOBALS['_CFG']['shop_name'] : $row['author'];
            $arr[$article_id]['url']         = build_uri('article', array('aid'=>$article_id), $row['title']);
            $arr[$article_id]['add_time']    = date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        }
    }

    return $arr;
}

function get_cat_arts($cat_id, $size = 20)
{
    //取出所有非0的文章
    if ($cat_id == '-1')
    {
        $cat_str = 'cat_id > 0';
    }
    else
    {
        $cat_str = get_article_children($cat_id);
    }
    //增加搜索条件，如果有搜索内容就进行搜索    

        
    $sql = 'SELECT article_id, title, author, add_time, file_url, description, open_type' .
               ' FROM ' .$GLOBALS['ecs']->table('article') .
               ' WHERE is_open = 1 AND ' . $cat_str .
               ' ORDER BY article_id DESC';
			   

    $res = $GLOBALS['db']->selectLimit($sql, $size);

    $arr = array();
    if ($res)
    {
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $article_id = $row['article_id'];

            $arr[$article_id]['id']          = $article_id;
            $arr[$article_id]['title']       = $row['title'];
			$arr[$article_id]['file_url']    = $row['file_url'];
			$arr[$article_id]['description'] = $row['description'];
            $arr[$article_id]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ? sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
            $arr[$article_id]['author']      = empty($row['author']) || $row['author'] == '_SHOPHELP' ? $GLOBALS['_CFG']['shop_name'] : $row['author'];
            $arr[$article_id]['url']         = build_uri('article', array('aid'=>$article_id), $row['title']);
            $arr[$article_id]['add_time']    = date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        }
    }

    return $arr;
}

function get_linked_arts($goods_id)
{
    $sql = 'SELECT a.article_id, a.title, a.file_url, a.open_type,file_url, description, a.add_time ' .
            'FROM ' . $GLOBALS['ecs']->table('goods_article') . ' AS g, ' .
                $GLOBALS['ecs']->table('article') . ' AS a ' .
            "WHERE g.article_id = a.article_id AND g.goods_id = '$goods_id' AND a.is_open = 1 " .
            'ORDER BY a.add_time DESC';
    $res = $GLOBALS['db']->selectLimit($sql, 4);

    $arr = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $row['url']         = $row['open_type'] != 1 ?
            build_uri('article', array('aid'=>$row['article_id']), $row['title']) : trim($row['file_url']);
		$row['file_url']    = $row['file_url'];
		$row['description'] = $row['description'];	
        $row['add_time']    = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        $row['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ?
            sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];

        $arr[] = $row;
    }

    return $arr;
}

function get_hotcate($num=0, $rtype='')
{
	$sql = "SELECT cat_id,cat_name,parent_id FROM " . $GLOBALS['ecs']->table('category') . " WHERE cat_id in (SELECT DISTINCT cat_id FROM " . $GLOBALS['ecs']->table('cat_recommend') . " WHERE is_show=1 ";
	if($rtype=='best')
	{
		$sql .= "AND recommend_type=1)";
	}
	elseif($rtype=='new')
	{
		$sql .= "AND recommend_type=2)";
	}
	elseif($rtype=='hot')
	{
		$sql .= "AND recommend_type=3)";
	}
	else
	{
		$sql .= "AND recommend_type in (1,2,3))";
	}
	$sql .= " ORDER BY sort_order ASC";
	if($num>0)
	{
		$sql .= " LIMIT " . $num;
	}
	$res = $GLOBALS['db']->getAll($sql);
	foreach($res as $key=>$val)
	{
		$arr[$key]['id']   = $val['cat_id'];
		$arr[$key]['name'] = $val['cat_name'];
		$arr[$key]['url']  = build_uri('category', array('cid' => $val['cat_id']), $val['cat_name']);
	}
	return $arr;
}


function get_advlist($position, $num=0)
{
   $arr=array();
   $limit_string = '';

   if ($num > 0)
   {
   		$limit_string = 'limit '.$num;
   }
   //数据库ecs_ad时间戳过期了改成1509434999
//  $sql = "select ap.ad_width,ap.ad_height,ad.ad_id,ad.ad_name,ad.ad_code,ad.ad_link,ad.ad_id,ad.link_man from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ap.position_name='".$position."' and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1 $limit_string";
  $sql = "select ap.ad_width,ap.ad_height,ad.ad_id,ad.ad_name,ad.ad_code,ad.ad_link,ad.ad_id,ad.link_man from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ap.position_name='".$position."' and ad.enabled=1 $limit_string";


     $res = $GLOBALS['db']->getAll($sql);

//    var_dump($res);exit;
	 foreach($res as $idx => $row)
	 {
	    $arr[$row['ad_id']]['name'] = $row['ad_name'];
		$arr[$row['ad_id']]['title'] = $row['link_man'];
		$arr[$row['ad_id']]['url'] = "affiche.php?ad_id=".$row['ad_id']."&uri=".$row['ad_link'];
		$arr[$row['ad_id']]['image'] = 'data/afficheimg/'.$row['ad_code'];
		$arr[$row['ad_id']]['ad_code'] = $row['ad_code'];
		$arr[$row['ad_id']]['content'] = "<a href='".$arr[$row['ad_id']]['url']."' title='".$row['ad_name']."' target='_blank'><img src='data/afficheimg/".$row['ad_code']."' title='".$row['ad_name']."' alt='".$row['ad_name']."'/></a>";
     }
	 return $arr;
}

function get_advs($position, $num=0)
{
   $arr=array();
   $limit_string = '';
   if ($num > 0)
   {
   		$limit_string = 'limit '.$num;
   }
   $sql = "select ap.ad_width,ap.ad_height,ad.ad_id,ad.ad_name,ad.ad_code,ad.ad_link,ad.ad_id from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ap.position_name='".$position."' and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1 $limit_string";
   
     $res = $GLOBALS['db']->getAll($sql);
	 foreach($res as $idx => $row)
	 {
	    $arr[$row['ad_id']]['name'] = $row['ad_name'];
		$arr[$row['ad_id']]['url'] = $row['ad_link'];
		$arr[$row['ad_id']]['image'] = 'data/afficheimg/'.$row['ad_code'];
		$arr[$row['ad_id']]['ad_code'] = $row['ad_code'];
		$arr[$row['ad_id']]['content'] = "<a href='".$arr[$row['ad_id']]['url']."' target='_blank'><img src='data/afficheimg/".$row['ad_code']."' width='".$row['ad_width']."' height='".$row['ad_height']."' /></a>";
		
	 }
	 return $arr;
}



function get_hotcate_tree($rtype='hot')
{
    $parent_id = 0;

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$parent_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT cat_id,cat_name ,parent_id,is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";

        $res = $GLOBALS['db']->getAll($sql);

        foreach ($res AS $row)
        {
            if ($row['is_show'])
            {
                $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
                if (isset($row['cat_id']) != NULL)
                {
					$hotcat = get_hotcate(0,$rtype);
					if($hotcat)
					{
						foreach($hotcat as $key=>$val)
						{
							$pid = get_top_parentid($val['id'],'index');
							$hpid = $pid['cate_parentid'];
							if($hpid == $cat_arr[$row['cat_id']]['id'] && $val['id'] != $cat_arr[$row['cat_id']]['id'])
							{
								$cat_arr[$row['cat_id']]['cat_id'][$key] = $val;
							}
						}
					}
                }
            }
        }
    }
    if(isset($cat_arr))
    {
        return $cat_arr;
    }
}



function get_top_parentid($id=0, $type='')
{
	if($id>0 && $type!='')
	{
		if($type == 'goods')
		{
			$sql = "SELECT cat_id FROM " . $GLOBALS['ecs']->table('goods') . " WHERE goods_id=" . $id;
			$id = $GLOBALS['db']->getOne($sql);
			$res['goods_parentid'] = $id;
		}
		while($id) 
		{
			$sql = "SELECT	cat_id,parent_id FROM " . $GLOBALS['ecs']->table('category'). " WHERE cat_id=" . $id;
			$cat = $GLOBALS['db']->getRow($sql);
			$id = $cat['parent_id'];
		}
		$res['cate_parentid']  = $cat['cat_id'];
		return $res;
	}
	else
	{
		return false;
	}
}



?>