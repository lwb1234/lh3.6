<?php

/**
* 商家入驻注册项设置
* ecshop by lee
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

//$exc = new exchange($ecs->table("store_goods"), $db, 'id', 'store_name');
//by lee 2017 1014 if 不建立新的商户商品表则使用商品表，但是如果删除就会都删除
$exc = new exchange($ecs->table("goods"), $db, 'goods_id', 'goods_name');
/*------------------------------------------------------ */
//-- 店铺商品列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{
    
	$sql="select * from ".$ecs->table('store_goods')." order by sort_order desc";
	$store_goods=$db->getAll($sql);
	$smarty->assign('store_cate',$store_goods);
    $smarty->assign('ur_here','店铺分类');
    $smarty->assign('action_link',  array('text' => '添加店铺货物', 'href'=>'store_category.php?act=add'));
    $smarty->assign('full_page',    1);
//   var_dump($store_goods);
    /* 获取分类列表 */
    $cat_list = cat_store_goods_list(0, 0, false);

    /* 模板赋值 */
//    $smarty->assign('ur_here',      $_LANG['02_store']);
    $smarty->assign('action_link',  array('href' => 'store_category?act=add', 'text' => $_LANG['04_category_add']));
    $smarty->assign('full_page',    1);

    $smarty->assign('store_cate',     $cat_list);
    /* 列表页面 */
    assign_query_info();
	
    $smarty->display('store_goods.htm');
}


/*------------------------------------------------------ */
//-- 翻页，排序
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $sql="select * from ".$ecs->table('store_category')." order by cate_order desc";
	$store_cate=$db->getAll($sql);
	$smarty->assign('store_cate',$store_cate);
    make_json_result($smarty->fetch('store_category.htm'));
}

/*------------------------------------------------------ */
//-- 添加店铺分类页面
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'add')
{
    admin_priv('store_cate_manage');

    $form_action = 'insert';

 	$store_cate['cate_order'] = 0;
    $store_cate['is_show'] = 0;
    $store_cate['is_recom'] = 0;

    $smarty->assign('store_cate',$store_cate);

    $smarty->assign('ur_here', '添加店铺分类');
    $smarty->assign('action_link', array('text' => '返回店铺分类列表', 'href'=>'store_category.php?act=list'));
    $smarty->assign('form_action', $form_action);

    assign_query_info();
    $smarty->display('store_category_info.htm');
}

/*------------------------------------------------------ */
//-- 增加店铺分类到数据库
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'insert')
{
    admin_priv('store_cate_manage');

    /* 检查是否存在重名的会员注册项 */
    if (!$exc->is_only('cate_name', trim($_POST['cate_name'])))
    {
        sys_msg(sprintf('类名称已存在', trim($_POST['cate_name'])), 1);
    }
	
	$dis_order=!empty($_POST['cate_order'])?intval($_POST['cate_order']):0;
	
    $sql = "INSERT INTO " .$ecs->table('store_category') ."("."cate_name, cate_order, is_show,is_recom".") VALUES ("."'$_POST[cate_name]', '$dis_order', '$_POST[is_show]', '$_POST[is_recom]')";
    $db->query($sql);

    /* 管理员日志 */
    admin_log(trim($_POST['cate_name']), 'add', 'store_category');
    clear_cache_files();

    $lnk[] = array('text' => '返回上一页',    'href'=>'store_category.php?act=list');
    $lnk[] = array('text' => '继续添加', 'href'=>'store_category.php?act=add');
    sys_msg('添加店铺分类成功', 0, $lnk);
}
/*------------------------------------------------------ */
//-- 编辑店铺分类
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit')
{
    admin_priv('store_cate_manage');

    $form_action = 'update';

    $sql = "SELECT * FROM ".$ecs->table('store_category'). " WHERE id='$_REQUEST[id]'";
    $store_cate = $db->GetRow($sql);

    $smarty->assign('store_cate',  $store_cate);

    $smarty->assign('ur_here', '修改店铺分类');
    $smarty->assign('action_link', array('text' => '返回店铺分类列表', 'href'=>'store_category.php?act=list'));
    $smarty->assign('form_action', $form_action);

    assign_query_info();
    $smarty->display('store_category_info.htm');
}
/*------------------------------------------------------ */
//-- 更新店铺分类
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'update')
{
    admin_priv('store_cate_manage');

    /* 检查是否存在重名的会员注册项 */
    if ($_POST['cate_name'] != $_POST['old_cate_name'] && !$exc->is_only('cate_name', trim($_POST['cate_name'])))
    {
        sys_msg(sprintf('类名称已存在', trim($_POST['cate_name'])), 1);
    }
	
	$dis_order=!empty($_POST['cate_order'])?intval($_POST['cate_order']):0;
	
    $sql = "UPDATE " .$ecs->table('store_category') . " SET `cate_name` = '$_POST[cate_name]', `cate_order` = '$dis_order', `is_show` = '$_POST[is_show]', `is_recom` = '$_POST[is_recom]' WHERE `id` = '$_POST[id]'";
    $db->query($sql);

    /* 管理员日志 */
    admin_log(trim($_POST['cate_name']), 'edit', 'store_category');
    clear_cache_files();

    $lnk[] = array('text' => '返回上一页','href'=>'store_category.php?act=list');
    sys_msg('更新店铺分类成功', 0, $lnk);
}

/*------------------------------------------------------ */
//-- 批量操作  by lee   如果需要回收站功能则必须增加商户商品表 否则只能用删除
/*------------------------------------------------------ */

//elseif ($_REQUEST['act'] == 'batch')
//{
//    $code = empty($_REQUEST['extension_code'])? '' : trim($_REQUEST['extension_code']);
//
//    /* 取得要操作的商户编号 */
//    $goodHs_id = !empty($_POST['checkboxes']) ? join(',', $_POST['checkboxes']) : 0;
//
//    if (isset($_POST['type']))
//    {
//        /* 放入回收站 */
//        if ($_POST['type'] == 'trash')
//        {
//            /* 检查权限 */
//            admin_priv('remove_back');
//
//            update_goodHs($goodHs_id, 'is_delete', '1');
//
//            /* 记录日志 */
//            admin_log('', 'batch_trash', 'goodHs');
//        }
//        /* 上架 */
//        elseif ($_POST['type'] == 'on_sale')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_on_sale', '1');
//        }
//
//        /* 下架 */
//        elseif ($_POST['type'] == 'not_on_sale')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_on_sale', '0');
//        }
//
//        /* 设为精户 */
//        elseif ($_POST['type'] == 'best')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_best', '1');
//        }
//
//        /* 取消精户 */
//        elseif ($_POST['type'] == 'not_best')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_best', '0');
//        }
//
//        /* 设为新户 */
//        elseif ($_POST['type'] == 'new')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_new', '1');
//        }
//
//        /* 取消新户 */
//        elseif ($_POST['type'] == 'not_new')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_new', '0');
//        }
//
//        /* 设为热销 */
//        elseif ($_POST['type'] == 'hot')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_hot', '1');
//        }
//
//        /* 取消热销 */
//        elseif ($_POST['type'] == 'not_hot')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'is_hot', '0');
//        }
//
//        /* 转移到分类 */
//        elseif ($_POST['type'] == 'move_to')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'cat_id', $_POST['target_cat']);
//        }
//
//        /* 转移到供货商 */
//        elseif ($_POST['type'] == 'suppliers_move_to')
//        {
//            /* 检查权限 */
//            admin_priv('goodHs_manage');
//            update_goodHs($goodHs_id, 'suppliers_id', $_POST['suppliers_id']);
//        }
//
//        /* 还原 */
//        elseif ($_POST['type'] == 'restore')
//        {
//            /* 检查权限 */
//            admin_priv('remove_back');
//
//            update_goodHs($goodHs_id, 'is_delete', '0');
//
//            /* 记录日志 */
//            admin_log('', 'batch_restore', 'goodHs');
//        }
//        /* 删除 */
//        elseif ($_POST['type'] == 'drop')
//        {
//            /* 检查权限 */
//            admin_priv('remove_back');
//
//            delete_goodHs($goodHs_id);
//
//            /* 记录日志 */
//            admin_log('', 'batch_remove', 'goodHs');
//        }
//    }
//
//    /* 清除缓存 */
//    clear_cache_files();
//
//    if ($_POST['type'] == 'drop' || $_POST['type'] == 'restore')
//    {
//        $link[] = array('href' => 'goodHs.php?act=trash', 'text' => $_LANG['11_goodHs_trash']);
//    }
//    else
//    {
//        $link[] = list_link(true, $code);
//    }
//    sys_msg($_LANG['batch_handle_ok'], 0, $link);
//}




/*------------------------------------------------------ */
//-- 删除店铺分类
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove')
{
    check_authz_json('store_cate_manage');

    $id = intval($_GET['id']);
    $cate_name = $exc->get_name($id);

    //删除一条商品数据
    if ($exc->drop($id))
    {
        admin_log(addslashes($cate_name), 'remove', 'store_category');
        clear_cache_files();
    }

    $url = 'store_category.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
    exit;

}

/*
 *  编辑店铺分类名称
 */
elseif ($_REQUEST['act'] == 'edit_name')
{
    $id = intval($_REQUEST['id']);
    $val = empty($_REQUEST['val']) ? '' : json_str_iconv(trim($_REQUEST['val']));
    check_authz_json('store_cate_manage');
    if ($exc->is_only('cate_name', $val, $id))
    {
        if ($exc->edit("cate_name = '$val'", $id))
        {
            /* 管理员日志 */
            admin_log($val, 'edit', 'store_category');
            clear_cache_files();
            make_json_result(stripcslashes($val));
        }
        else
        {
            make_json_error($db->error());
        }
    }
    else
    {
        make_json_error(sprintf('类名称已存在', htmlspecialchars($val)));
    }
}

/*
 *  编辑店铺分类排序
 */
elseif ($_REQUEST['act'] == 'edit_order')
{
    $id = intval($_REQUEST['id']);
    $val = isset($_REQUEST['val']) ? json_str_iconv(trim($_REQUEST['val'])) : '' ;
    check_authz_json('store_cate_manage');
    if (is_numeric($val))
    {
        if ($exc->edit("cate_order = '$val'", $id))
        {
            /* 管理员日志 */
            admin_log($val, 'edit', 'store_category');
            clear_cache_files();
            make_json_result(stripcslashes($val));
        }
        else
        {
            make_json_error($db->error());
        }
    }
    else
    {
        make_json_error($_LANG['order_not_num']);
    }
}

/*------------------------------------------------------ */
//-- 修改店铺分类显示状态
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_dis')
{
    check_authz_json('store_cate_manage');

    $id     = intval($_POST['id']);
    $is_dis = intval($_POST['val']);

    if ($exc->edit("is_show = '$is_dis'", $id))
    {
        clear_cache_files();
        make_json_result($is_dis);
    }
}

/*------------------------------------------------------ */
//-- 修改店铺分类推荐
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_recom')
{
    check_authz_json('store_cate_manage');

    $id     = intval($_POST['id']);
    $is_recom = intval($_POST['val']);

    if ($exc->edit("is_recom = '$is_recom'", $id))
    {
        clear_cache_files();
        make_json_result($is_recom);
    }
}

?>