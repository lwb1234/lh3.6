<?php
    $keywords  = !empty($_REQUEST['keywords'])   ? htmlspecialchars(trim($_REQUEST['keywords']))     : '';
	$sort  = (isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'shop_price', 'sell_number', 'comment_rank', 'click_count'))) ? trim($_REQUEST['sort'])  : $default_sort_order_type;
	$count = get_cat_goods_count($keywords, $children, $brand, $price_min, $price_max, $ext);
    $max_page = ($count> 0) ? ceil($count / $size) : 1;
    if ($page > $max_page)
    {
        $page = $max_page;
    }
    $goodslist = cat_get_goods($keywords, $children, $brand, $price_min, $price_max, $ext, $size, $page, $sort, $order);
    if($display == 'grid')
    {
        if(count($goodslist) % 2 != 0)
        {
            $goodslist[] = array();
        }
    }
    $smarty->assign('goods_list',       $goodslist);
	$smarty->assign('keys',       $keywords);

    assign_pager('category',            $cat_id, $count, $size, $sort, $order, $page, '', $brand, $price_min, $price_max, $display, $filter_attr_str); // 分页
	
	function get_cat_goods_count($keywords, $children, $brand = 0, $min = 0, $max = 0, $ext='')
	{
		$where  = "g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND ($children OR " . get_extension_goods($children) . ')';
		if ($keywords != '')
		{
			$where .=  " AND g.goods_name LIKE '%$keywords%' ";
		}
	
		if ($brand > 0)
		{
			$where .=  " AND g.brand_id = $brand ";
		}
	
		if ($min > 0)
		{
			$where .= " AND g.shop_price >= $min ";
		}
	
		if ($max > 0)
		{
			$where .= " AND g.shop_price <= $max ";
		}
	
		/* 返回商品总数 */
		return $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('goods') . " AS g WHERE $where $ext");
	}
	
	function cat_get_goods($keywords, $children, $brand, $min, $max, $ext, $size, $page, $sort, $order)
	{
		$display = $GLOBALS['display'];
		$where = "g.is_on_sale = 1 AND g.is_alone_sale = 1 AND ".
				"g.is_delete = 0 AND ($children OR " . get_extension_goods($children) . ')';
		
		if ($keywords != '')
		{
			$where .=  " AND g.goods_name LIKE '%$keywords%' ";
		}		
	
		if ($brand > 0)
		{
			$where .=  "AND g.brand_id=$brand ";
		}
	
		if ($min > 0)
		{
			$where .= " AND g.shop_price >= $min ";
		}
	
		if ($max > 0)
		{
			$where .= " AND g.shop_price <= $max ";
		}
	
		/* 获得商品列表 */
		$sql = 'SELECT g.goods_id, g.goods_name, g.goods_sn, g.goods_name_style, g.market_price, g.is_new, g.is_best, g.is_hot, g.shop_price AS org_price, ' .
					"IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, g.promote_price, g.goods_type, " .
					'(select AVG(r.comment_rank) from ' . $GLOBALS['ecs']->table('comment') . ' as r where r.id_value = g.goods_id AND r.comment_type = 0 AND r.parent_id = 0 AND r.status = 1) AS comment_rank, ' .
					
					'(select IFNULL(sum(og.goods_number), 0) from ' . $GLOBALS['ecs']->table('order_goods') . ' as og where og.goods_id = g.goods_id) AS sell_number, ' .
					'g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb , g.goods_img, click_count ' .
				'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
				'LEFT JOIN ' . $GLOBALS['ecs']->table('member_price') . ' AS mp ' .
					"ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
				"WHERE $where $ext ORDER BY $sort $order";
		$res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);
	
		$arr = array();
		while ($row = $GLOBALS['db']->fetchRow($res))
		{
			if ($row['promote_price'] > 0)
			{
				$promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
			}
			else
			{
				$promote_price = 0;
			}
	
			/* 处理商品水印图片 */
			$watermark_img = '';
	
			if ($promote_price != 0)
			{
				$watermark_img = "watermark_promote_small";
			}
			elseif ($row['is_new'] != 0)
			{
				$watermark_img = "watermark_new_small";
			}
			elseif ($row['is_best'] != 0)
			{
				$watermark_img = "watermark_best_small";
			}
			elseif ($row['is_hot'] != 0)
			{
				$watermark_img = 'watermark_hot_small';
			}
	
			if ($watermark_img != '')
			{
				$arr[$row['goods_id']]['watermark_img'] =  $watermark_img;
			}
	
			$arr[$row['goods_id']]['goods_id']         = $row['goods_id'];
			if($display == 'grid')
			{
				$arr[$row['goods_id']]['short_name']       = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
			}
			
			$arr[$row['goods_id']]['goods_name']       = $row['goods_name'];
			$arr[$row['goods_id']]['name']             = $row['goods_name'];
			$arr[$row['goods_id']]['goods_sn']         = $row['goods_sn'];
			$arr[$row['goods_id']]['comment_rank']     = $row['comment_rank'];
			$arr[$row['goods_id']]['sell_number']      = $row['sell_number'];
			$arr[$row['goods_id']]['is_new']           = $row['is_new'];
			$arr[$row['goods_id']]['goods_brief']      = $row['goods_brief'];
			$arr[$row['goods_id']]['goods_style_name'] = add_style($row['goods_name'],$row['goods_name_style']);
			$arr[$row['goods_id']]['market_price']     = price_format($row['market_price']);
			$arr[$row['goods_id']]['shop_price']       = price_format($row['shop_price']);
			$arr[$row['goods_id']]['type']             = $row['goods_type'];
			$arr[$row['goods_id']]['promote_price']    = ($promote_price > 0) ? price_format($promote_price) : '';
			$arr[$row['goods_id']]['goods_thumb']      = get_image_path($row['goods_id'], $row['goods_thumb'], true);
			$arr[$row['goods_id']]['goods_img']        = get_image_path($row['goods_id'], $row['goods_img']);
			$arr[$row['goods_id']]['url']              = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
		}
	
		return $arr;
	}


?>