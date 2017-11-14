<?php

/**
 * ECSHOP 文章分类
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: article_cat.php 17217 2011-01-19 06:29:08Z liubo $
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

/* 清除缓存 */
clear_cache_files();

/*------------------------------------------------------ */
//-- INPUT
/*------------------------------------------------------ */

/* 获得指定的分类ID */
if (!empty($_GET['id']))
{
    $id = intval($_GET['id']);
}

//区域
if (isset($_REQUEST['id']))
{
	    $region_id = intval($_REQUEST['id']);
        $sql = 'SELECT region_id, region_name FROM ' . $ecs->table("region") . ' WHERE region_id = '.$region_id;
        $region = $db->getRow($sql, true);
        $smarty->assign('region_id', $region['region_id']);
		$smarty->assign('region_name', $region['region_name']);
		
		$_SESSION['region_id'] = $region['region_id'];
		$_SESSION['region_name'] = $region['region_name'];

}
else
{
        $_SESSION['region_id'] = 0;
		$_SESSION['region_name'] = '全国站';

}

if (isset($_REQUEST['id']))
{
	    $region_id = intval($_REQUEST['id']);
        $sql = 'SELECT region_id, region_name FROM ' . $ecs->table("region") . ' WHERE region_id = '.$region_id;
        $region = $db->getRow($sql, true);
		
        $smarty->assign('region_id', $region['region_id']);
		$smarty->assign('region_name', $region['region_name']);
		
		$_SESSION['region_id'] = $region['region_id'];
		$_SESSION['region_name'] = $region['region_name'];

}


/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

/* 获得页面的缓存ID */
$cache_id = sprintf('%X', crc32($id . '-expr-' . $_CFG['lang']));

if (!$smarty->is_cached('expr.dwt', $cache_id))
{
    /* 如果页面没有被缓存则重新获得页面的内容 */
	assign_template('a', array($cat_id));

    
    if ($id)
	{
		$sql = 'select * from ' . $GLOBALS['ecs']->table('suppliers') . ' where city = ' . $id;		
	}
	else
	{
		$sql = 'select * from ' . $GLOBALS['ecs']->table('suppliers');	
	}

	$suppliers = $GLOBALS['db']->getall($sql);
	$smarty->assign('suppliers',    $suppliers);
}



$smarty->display('expr.dwt', $cache_id);

?>