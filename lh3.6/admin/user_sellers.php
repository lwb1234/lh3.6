<?php

/**
 * ECSHOP 管理中心供货商管理
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: wanglei $
 * $Id: suppliers.php 15013 2009-05-13 09:31:42Z wanglei $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

define('SUPPLIERS_ACTION_LIST', 'delivery_view,back_view');
/*------------------------------------------------------ */
//-- 供货商列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{
    /* 检查权限 */
    admin_priv('seller_list');

    /* 查询 */
    $result = user_seller_list();

    /* 模板赋值 */
    $smarty->assign('ur_here', '申请商家入驻的会员列表'); // 当前导航

    $smarty->assign('full_page', 1); // 翻页参数

    $smarty->assign('user_seller_list',    $result['result']);
    $smarty->assign('filter',       $result['filter']);
    $smarty->assign('record_count', $result['record_count']);
    $smarty->assign('page_count',   $result['page_count']);
	$smarty->assign('sort_id', '<img src="images/sort_desc.gif">');
	$smarty->assign('sort_use_fee', '<img src="images/sort_desc.gif">');
	$smarty->assign('sort_deposit', '<img src="images/sort_desc.gif">');
	$smarty->assign('sort_fencheng', '<img src="images/sort_desc.gif">');

    /* 显示模板 */
    assign_query_info();
    $smarty->display('user_seller_list.htm');
}
elseif($_REQUEST['act'] == 's_info')
{
	/* 检查权限 */
    admin_priv('seller_list');
	$u_id=!empty($_GET['uid'])?intval($_GET['uid']):0;
	$id=!empty($_GET['id'])?intval($_GET['id']):0;
	 /* 取出注册扩展字段 */
    $sf_sql = 'SELECT * FROM ' . $ecs->table('seller_fields') . ' WHERE display = 1 ORDER BY dis_order';
    $seller_fields_list = $db->getAll($sf_sql);
	
	//取出会员注册的信息
	$se_sql='SELECT reg_field_id,content FROM ' . $ecs->table('seller_extend_info') . " WHERE user_id = '".$u_id."'";
	$seller_extend_info=$db->getAll($se_sql);
	foreach($seller_fields_list as $key=>$val)
	{
		if(!empty($val['select_options'])&&$val['type']=='select')
		{
			$arr=explode("\n",$val['select_options']);
			
			foreach($arr as $key2=>$val2){
			  if(!$val2)
			  {
				  unset($arr[$key2]);
			  }
			  $arr[$key2]=trim($val2);
			}
		
			$seller_fields_list[$key]['select_options']=$arr;
		}
		
		if($seller_extend_info)
		{
			foreach($seller_extend_info as $val3)
			{
				if($val['id']==$val3['reg_field_id'])
				{
					$seller_fields_list[$key]['content']=trim($val3['content']);
				}		
			}
		}
	}
	$sql="select * from ".$ecs->table('user_seller')." where user_id='$u_id' and id='$id'";
	$user_seller_info=$db->getRow($sql);

	$smarty->assign('user_seller_info',$user_seller_info);
	$smarty->assign('seller_fields_list', $seller_fields_list);
	$smarty->display('sellers_info.htm');
}
elseif($_REQUEST['act']=='u_s_update')
{
	
	/* 检查权限 */
    admin_priv('seller_list');
	$u_id=!empty($_POST['uid'])?intval($_POST['uid']):0;
	$id=!empty($_POST['id'])?intval($_POST['id']):0;
	$is_check=!empty($_POST['is_check'])?intval($_POST['is_check']):0;
	$checkout_type=!empty($_POST['checkout_type'])?intval($_POST['checkout_type']):0;
	$use_fee=!empty($_POST['use_fee'])?floatval($_POST['use_fee']):0;
	$deposit=!empty($_POST['deposit'])?floatval($_POST['deposit']):0;
	$fencheng=!empty($_POST['fencheng'])?floatval($_POST['fencheng']):0;
	$remark=!empty($_POST['remark'])?$_POST['remark']:'';
	if($id)
	{
		$sql="update ".$ecs->table('user_seller')." set is_check='$is_check',checkout_type='$checkout_type',use_fee='$use_fee',deposit='$deposit',fencheng='$fencheng',remark='$remark' where user_id='$u_id' and id='$id'";
		
		if($db->query($sql))
		{
			//入驻商家成为管理员
			admin_seller($id);
			//将商家列入佣金表
			insert_commission($id);
			$lnk[] = array('text' => '返回列表',    'href'=>'user_sellers.php?act=list');
			sys_msg('编辑商家信息成功', 0, $lnk);	
		}	
	}
	else
	{
			$lnk[] = array('text' => '返回列表',    'href'=>'user_sellers.php?act=list');
			sys_msg('没有对应信息', 0, $lnk);	
	}

}
/*------------------------------------------------------ */
//-- 排序、分页、查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    /* 检查权限 */
    admin_priv('seller_list');

    $result = user_seller_list();

    $smarty->assign('user_seller_list',    $result['result']);
    $smarty->assign('filter',       $result['filter']);
    $smarty->assign('record_count', $result['record_count']);
    $smarty->assign('page_count',   $result['page_count']);

    /* 排序标记 */
    $sort_flag  = sort_flag($result['filter']);

    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('user_seller_list.htm'), '',
        array('filter' => $result['filter'], 'page_count' => $result['page_count']));
}

/*------------------------------------------------------ */
//-- 列表页编辑平台使用费
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_use_fee')
{
    /* 检查权限 */
    admin_priv('seller_list');

    $id     = intval($_POST['id']);
    $use_fee  = floatval(trim($_POST['val']));

   /* 保存供货商信息 */
        $sql = "UPDATE " . $ecs->table('user_seller') ." SET use_fee = '$use_fee' WHERE id = '$id'";
        if ($result = $db->query($sql))
        {
            /* 记日志 */
            admin_log($use_fee, 'edit', 'user_seller');

            clear_cache_files();

            make_json_result(stripslashes($use_fee));
        }
        else
        {
            make_json_result(sprintf($_LANG['agency_edit_fail'], $use_fee));
        }
}
/*------------------------------------------------------ */
//-- 列表页编辑商家保证金
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_deposit')
{
    /* 检查权限 */
    admin_priv('seller_list');

    $id     = intval($_POST['id']);
    $deposit  = floatval(trim($_POST['val']));

   /* 保存供货商信息 */
        $sql = "UPDATE " . $ecs->table('user_seller') ." SET deposit = '$deposit' WHERE id = '$id'";
        if ($result = $db->query($sql))
        {
            /* 记日志 */
            admin_log($deposit, 'edit', 'user_seller');

            clear_cache_files();

            make_json_result(stripslashes($deposit));
        }
        else
        {
            make_json_result(sprintf($_LANG['agency_edit_fail'], $deposit));
        }
}
/*------------------------------------------------------ */
//-- 列表页编辑商家保证金
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_fencheng')
{
    /* 检查权限 */
    admin_priv('seller_list');

    $id     = intval($_POST['id']);
    $fencheng  = floatval(trim($_POST['val']));

   /* 保存供货商信息 */
        $sql = "UPDATE " . $ecs->table('user_seller') ." SET fencheng = '$fencheng' WHERE id = '$id'";
        if ($result = $db->query($sql))
        {
            /* 记日志 */
            admin_log($fencheng, 'edit', 'user_seller');

            clear_cache_files();

            make_json_result(stripslashes($fencheng));
        }
        else
        {
            make_json_result(sprintf($_LANG['agency_edit_fail'], $fencheng));
        }
}
/*------------------------------------------------------ */
//-- 修改供货商状态
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'is_check')
{
    /* 检查权限 */
    admin_priv('seller_list');

    $id = intval($_REQUEST['id']);
    $sql = "SELECT id, is_check
            FROM " . $ecs->table('user_seller') . "
            WHERE id = '$id'";
    $seller = $db->getRow($sql, TRUE);

    if ($seller['id'])
    {
        $seller['is_check'] = $seller['is_check']<>1 ? 1 : 2;
        $db->autoExecute($ecs->table('user_seller'),$seller, '', "id = '$id'");
		//入驻商家成为管理员
		admin_seller($id);
		
        clear_cache_files();
        make_json_result($seller['is_check']);
    }

    exit;
}
/*------------------------------------------------------ */
//-- 删除入驻商家
//-- 将这个模块重新开放 删除商家模块
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove')
{
    /* 检查权限 */
    admin_priv('seller_list');

    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM ".$ecs->table('user_seller')." WHERE id = '$id'";
    $seller = $db->getRow($sql, TRUE);

    if ($seller['id'])
    {
        /* 判断入驻商是否存在订单 */
        $sql = "SELECT COUNT(*) FROM " . $ecs->table('order_info') . "AS O, " . $ecs->table('order_goods') . " AS OG, " . $ecs->table('goods') . " AS G
                WHERE O.order_id = OG.order_id
                AND OG.goods_id = G.goods_id
                AND G.seller_id = '$id'";
        $order_exists = $db->getOne($sql, TRUE);
        if ($order_exists > 0)
        {
            $url = 'user_sellers.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
            ecs_header("Location: $url\n");
            exit;
        }

        /* 判断供货商是否存在商品 */
        $sql = "SELECT COUNT(*)
                FROM " . $ecs->table('goods') . "AS G
                WHERE G.seller_id = '$id'";
        $goods_exists = $db->getOne($sql, TRUE);
        if ($goods_exists > 0)
        {
            $url = 'user_sellers.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
            ecs_header("Location: $url\n");
            exit;
        }

        $sql = "DELETE FROM " . $ecs->table('user_seller') . "
            WHERE id = '$id'";
        $db->query($sql);

        /* 删除管理员、发货单关联、退货单关联和订单关联的供货商 */
        $table_array = array('admin_user', 'delivery_order', 'back_order','seller_shopwindow','seller_shopslide','seller_shopinfo','seller_nav','seller_category','back_order','order_return','delivery_order');
        foreach ($table_array as $value)
        {
            $sql = "DELETE FROM " . $ecs->table($value) . " WHERE seller_id = '$id'";
            $db->query($sql, 'SILENT');
        }

        /* 记日志 */
        admin_log('删除入驻商', 'remove', 'sellers');

        /* 清除缓存 */
        clear_cache_files();
    }

    $url = 'user_sellers.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);
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
        admin_priv('suppliers_manage');

        $ids = $_POST['checkboxes'];

        if (isset($_POST['remove']))
        {
            $sql = "SELECT *
                    FROM " . $ecs->table('suppliers') . "
                    WHERE suppliers_id " . db_create_in($ids);
            $suppliers = $db->getAll($sql);

            foreach ($suppliers as $key => $value)
            {
                /* 判断供货商是否存在订单 */
                $sql = "SELECT COUNT(*)
                        FROM " . $ecs->table('order_info') . "AS O, " . $ecs->table('order_goods') . " AS OG, " . $ecs->table('goods') . " AS G
                        WHERE O.order_id = OG.order_id
                        AND OG.goods_id = G.goods_id
                        AND G.suppliers_id = '" . $value['suppliers_id'] . "'";
                $order_exists = $db->getOne($sql, TRUE);
                if ($order_exists > 0)
                {
                    unset($suppliers[$key]);
                }

                /* 判断供货商是否存在商品 */
                $sql = "SELECT COUNT(*)
                        FROM " . $ecs->table('goods') . "AS G
                        WHERE G.suppliers_id = '" . $value['suppliers_id'] . "'";
                $goods_exists = $db->getOne($sql, TRUE);
                if ($goods_exists > 0)
                {
                    unset($suppliers[$key]);
                }
            }
            if (empty($suppliers))
            {
                sys_msg($_LANG['batch_drop_no']);
            }


            $sql = "DELETE FROM " . $ecs->table('suppliers') . "
                WHERE suppliers_id " . db_create_in($ids);
            $db->query($sql);

            /* 更新管理员、发货单关联、退货单关联和订单关联的供货商 */
            $table_array = array('admin_user', 'delivery_order', 'back_order');
            foreach ($table_array as $value)
            {
                $sql = "DELETE FROM " . $ecs->table($value) . " WHERE suppliers_id " . db_create_in($ids) . " ";
                $db->query($sql, 'SILENT');
            }

            /* 记日志 */
            $suppliers_names = '';
            foreach ($suppliers as $value)
            {
                $suppliers_names .= $value['suppliers_name'] . '|';
            }
            admin_log($suppliers_names, 'remove', 'suppliers');

            /* 清除缓存 */
            clear_cache_files();

            sys_msg($_LANG['batch_drop_ok']);
        }
    }
}
/**
 *  获取供应商列表信息
 *
 * @access  public
 * @param
 *
 * @return void
 */
function user_seller_list()
{
    $result = get_filter();
    if ($result === false)
    {
        $aiax = isset($_GET['is_ajax']) ? $_GET['is_ajax'] : 0;

        /* 过滤信息 */
		$filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keywords'] = json_str_iconv($filter['keywords']);
        }
        $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 's.id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'ASC' : trim($_REQUEST['sort_order']);

        $where = 'WHERE 1 ';
		
		if(isset($_REQUEST['is_check'])&&intval($_REQUEST['is_check'])<3)
		{
			$is_check=intval($_REQUEST['is_check']);
			$where .=" and s.is_check='$is_check' ";	
		}
		
		if($filter['keywords'])
		{
			$where .="and u.user_name LIKE '%" . mysql_like_quote($filter['keywords']) ."%'";
		}

        /* 分页大小 */
        $filter['page'] = empty($_REQUEST['page']) || (intval($_REQUEST['page']) <= 0) ? 1 : intval($_REQUEST['page']);

        if (isset($_REQUEST['page_size']) && intval($_REQUEST['page_size']) > 0)
        {
            $filter['page_size'] = intval($_REQUEST['page_size']);
        }
        elseif (isset($_COOKIE['ECSCP']['page_size']) && intval($_COOKIE['ECSCP']['page_size']) > 0)
        {
            $filter['page_size'] = intval($_COOKIE['ECSCP']['page_size']);
        }
        else
        {
            $filter['page_size'] = 15;
        }

        /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('user_seller') ." as s left join ".$GLOBALS['ecs']->table("users")." as u on u.user_id=s.user_id ". $where;
        $filter['record_count']   = $GLOBALS['db']->getOne($sql);
        $filter['page_count']     = $filter['record_count'] > 0 ? ceil($filter['record_count'] / $filter['page_size']) : 1;

        /* 查询 */
        $sql = "SELECT s.id,s.is_check,s.use_fee,s.deposit,s.checkout_type,s.fencheng,s.remark,s.add_time,u.user_name,u.email,u.user_id
                FROM " . $GLOBALS['ecs']->table("user_seller") . " as s left join ".$GLOBALS['ecs']->table("users")." as u on u.user_id=s.user_id $where
                ORDER BY " . $filter['sort_by'] . " " . $filter['sort_order']. "
                LIMIT " . ($filter['page'] - 1) * $filter['page_size'] . ", " . $filter['page_size'] . " ";
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }

    $row = $GLOBALS['db']->getAll($sql);
	if($row)
	{
		foreach($row as $key=>$val)
		{
			$row[$key]['add_time']=local_date('Y-m-d H:i',$val['add_time']);	
		}	
	}

    $arr = array('result' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);

    return $arr;
}
//入驻商家成为管理员
function admin_seller($seller_id)
{
	$sql="select seller_id from ".$GLOBALS['ecs']->table("admin_user")." where seller_id='$seller_id'";
	if(!$GLOBALS['db']->getOne($sql))
	{
		$sql="select u.user_name,u.password,u.ec_salt,u.email from ".$GLOBALS['ecs']->table("users")." as u left join ".$GLOBALS['ecs']->table("user_seller")." as s on u.user_id=s.user_id where s.id='$seller_id'";
		$user_info=$GLOBALS['db']->getRow($sql);
		
		if($user_info)
		{
			$admin_info=array(
				'user_name'=>$user_info['user_name'],
				'email'=>$user_info['email'],
				'password'=>$user_info['password'],
				'ec_salt'=>$user_info['ec_salt'],
				'add_time'=>gmtime(),
				'action_list'=>'goods_manage,remove_back,goods_auto,picture_batch,goods_export,goods_batch,order_os_edit,order_ps_edit,order_ss_edit,order_view,order_view_finished,sale_order_stats,booking,delivery_view,back_view,sale_order_stats',
				'nav_list'=>'商品列表|goods.php?act=list,订单列表|order.php?act=list,用户评论|comment_manage.php?act=list',
				'agency_id'=>'0',
				'seller_id'=>$seller_id
			);
			$GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('admin_user'),$admin_info);	
		}
	}
}
//将商家列入佣金表
function insert_commission($id)
{
	$sql="select count(id) from ".$GLOBALS['ecs']->table("commission")." where seller_id='$id'";
	$count=$GLOBALS['db']->getOne($sql);
	if($count<=0)
	{
		$sql="insert into ".$GLOBALS['ecs']->table("commission")." (`seller_id`, `prev_date`) values ('$id',".gmtime().")";
		$GLOBALS['db']->query($sql);
	}
}

?>