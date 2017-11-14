<?php

/**
 * ECSHOP 商户管理程序
 * ============================================================================
 * by lee
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . '/' . ADMIN_PATH . '/includes/lib_goodHs.php');
include_once(ROOT_PATH . '/includes/cls_image.php');
$image = new cls_image($_CFG['bgcolor']);
//更换成已经存在的商户表   by lee  goodHs --- seller_shopinfo
$exc = new exchange($ecs->table('seller_shopinfo'), $db, 'id', 'shop_name');
//end
/*------------------------------------------------------ */
//-- 商户列表，商户回收站
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'list' || $_REQUEST['act'] == 'trash')
{
    admin_priv('goodHs_manage');

    $cat_id = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
    $code   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
    //$suppliers_id = isset($_REQUEST['suppliers_id']) ? (empty($_REQUEST['suppliers_id']) ? '' : trim($_REQUEST['suppliers_id'])) : '';
    $is_on_sale = isset($_REQUEST['is_on_sale']) ? ((empty($_REQUEST['is_on_sale']) && $_REQUEST['is_on_sale'] === 0) ? '' : trim($_REQUEST['is_on_sale'])) : '';

//    $handler_list = array();
//    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=card', 'title'=>$_LANG['card'], 'img'=>'icon_send_bonus.gif');
//    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=replenish', 'title'=>$_LANG['replenish'], 'img'=>'icon_add.gif');
//    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=batch_card_add', 'title'=>$_LANG['batch_card_add'], 'img'=>'icon_output.gif');
       //var_dump($is_on_sale) ; exit;  result *** (length=0)
//    if ($_REQUEST['act'] == 'list' && isset($handler_list[$code]))
//    {
//        $smarty->assign('add_handler',      $handler_list[$code]);
//    }

    /* 供货商名  **********/
//    $suppliers_list_name = suppliers_list_name();
//    $suppliers_exists = 1;
//    if (empty($suppliers_list_name))
//    {
//        $suppliers_exists = 0;
//    }
//    $smarty->assign('is_on_sale', $is_on_sale);
//    $smarty->assign('suppliers_id', $suppliers_id);
//    $smarty->assign('suppliers_exists', $suppliers_exists);
//    $smarty->assign('suppliers_list_name', $suppliers_list_name);
//    unset($suppliers_list_name, $suppliers_exists);

    /* 模板赋值 */
    $goodHs_ur = array('' => $_LANG['01_goodHs_list'], 'virtual_card'=>$_LANG['50_virtual_card_list']);
    $ur_here = ($_REQUEST['act'] == 'list') ? $goodHs_ur[$code] : $_LANG['11_goodHs_trash'];
    $smarty->assign('ur_here', $ur_here);
//     var_dump(1);exit;
    $action_link = ($_REQUEST['act'] == 'list') ? add_link($code) : array('href' => 'goodHs.php?act=list', 'text' => $_LANG['01_goodHs_list']);
//    $smarty->assign('action_link',  $action_link);
//    $smarty->assign('code',     $code);
  $smarty->assign('cat_list',     cat_list(0, $cat_id));
    $smarty->assign('brand_list',   get_brand_list());
//    $smarty->assign('intro_list',   get_intro_list());
  $smarty->assign('lang',         $_LANG);
   $smarty->assign('list_type',    $_REQUEST['act'] == 'list' ? 'goodHs' : 'trash');
//    $smarty->assign('use_storage',  empty($_CFG['use_storage']) ? 0 : 1);
//   var_dump(1);exit;
  //  $suppliers_list = suppliers_list_info(' is_check = 1 ');
   // $suppliers_list_count = count($suppliers_list);
   // $smarty->assign('suppliers_list', ($suppliers_list_count == 0 ? 0 : $suppliers_list)); // 取供货商列表
    // var_dump(1);exit;
    //查询数据库
   $goodHs_list = goodHs_list($_REQUEST['act'] == 'list' ? 0 : 1, ($_REQUEST['act'] == 'list') ? (($code == '') ? 1 : 0) : -1);

    $smarty->assign('goodHs_list',   $goodHs_list['goodHs']);
    $smarty->assign('filter',       $goodHs_list['filter']);
    $smarty->assign('record_count', $goodHs_list['record_count']);
    $smarty->assign('page_count',   $goodHs_list['page_count']);
    $smarty->assign('full_page',    1);

    /* 排序标记 */
    $sort_flag  = sort_flag($goodHs_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    /* 获取商户类型存在规格的类型 */
    $specifications = get_goodHs_type_specifications();
    $smarty->assign('specifications', $specifications);

    /* 显示商户列表页面 */
    assign_query_info();
    $htm_file = ($_REQUEST['act'] == 'list') ?
        'goodHs_list.htm' : (($_REQUEST['act'] == 'trash') ? 'goodHs_trash.htm' : 'group_list.htm');
    $smarty->assign('pageHtml',$htm_file);
    $smarty->display($htm_file);
}

/*------------------------------------------------------ */
//-- 添加新商户 编辑商户
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit' || $_REQUEST['act'] == 'copy')
{
    include_once(ROOT_PATH . 'includes/fckeditor/fckeditor.php'); // 包含 html editor 类文件

    $is_add = $_REQUEST['act'] == 'add'; // 添加还是编辑的标识
    $is_copy = $_REQUEST['act'] == 'copy'; //是否复制
    $code = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
    $code=$code=='virual_card' ? 'virual_card': '';
    if ($code == 'virual_card')
    {
        admin_priv('virualcard'); // 检查权限
    }
    else
    {
        admin_priv('goodHs_manage'); // 检查权限
    }
//    echo'<pre>';
//    var_dump($code);exit;

//    /* 供货商名 */
//    $suppliers_list_name = suppliers_list_name();
//    $suppliers_exists = 1;
//    if (empty($suppliers_list_name))
//    {
//        $suppliers_exists = 0;
//    }
//    $smarty->assign('suppliers_exists', $suppliers_exists);
//    $smarty->assign('suppliers_list_name', $suppliers_list_name);
//    unset($suppliers_list_name, $suppliers_exists);

    /* 如果是安全模式，检查目录是否存在 */
    if (ini_get('safe_mode') == 1 && (!file_exists('../' . IMAGE_DIR . '/'.date('Ym')) || !is_dir('../' . IMAGE_DIR . '/'.date('Ym'))))
    {
        if (@!mkdir('../' . IMAGE_DIR . '/'.date('Ym'), 0777))
        {
            $warning = sprintf($_LANG['safe_mode_warning'], '../' . IMAGE_DIR . '/'.date('Ym'));
            $smarty->assign('warning', $warning);
        }
    }

    /* 如果目录存在但不可写，提示用户 */
    elseif (file_exists('../' . IMAGE_DIR . '/'.date('Ym')) && file_mode_info('../' . IMAGE_DIR . '/'.date('Ym')) < 2)
    {
        $warning = sprintf($_LANG['not_writable_warning'], '../' . IMAGE_DIR . '/'.date('Ym'));
        $smarty->assign('warning', $warning);
    }
//   var_dump($is_add);
    /* 取得商户信息 */
    if ($is_add)
    {

        /* 默认值 */
        $last_choose = array(0, 0);
        if (!empty($_COOKIE['ECSCP']['last_choose']))
        {
            $last_choose = explode('|', $_COOKIE['ECSCP']['last_choose']);
        }
        // 将商户列表里的字段改过来
//        $goodHs = array(
////            'seller_id'      => 0,
////            'shop_name'    => '',
////            'shop_title'    => '',
////            'cat_id'        => $last_choose[0],
////            'brand_id'      => $last_choose[1],
////            'is_on_sale'    => '1',
//////            'is_alone_sale' => '1',
//////            'is_shipping' => '0',
////            'other_cat'     => array(), // 扩展分类
//////            'goodHs_type'    => 0,       // 商户类型
//////            'shop_price'    => 0,
//////            'promote_price' => 0,
//////            'market_price'  => 0,
//////            'virtual_sales'  => 0,
//////            'integral'      => 0,
//////            'goodHs_number'  => $_CFG['default_storage'],
//////            'warn_number'   => 1,
////            'promote_start_date' => local_date('Y-m-d'),
////            'promote_end_date'   => local_date('Y-m-d', local_strtotime('+1 month')),
//////            'goodHs_weight'  => 0,
//////            'give_integral' => -1,
//////            'rank_integral' => -1
//        );
//        初始化
        $goodHs = array(
            'seller_id'      => 0,
            'shop_name'    => '',
            'shop_title'    => '',
            'shop_keyword'    => '',
            'country'    => '',
            'province'    => '',
            'city'    => '',
            'shop_title'    => '',
            'shop_style'    => '',
            'shop_desc'  =>''
        );

        if ($code != '')
        {
            $goodHs['goodHs_number'] = 0;
        }

//        /* 关联商户 */  ***************如果需求需要在进行更改，现在先注释掉
//        $link_goodHs_list = array();
//        $sql = "DELETE FROM " . $ecs->table('link_goodHs') .
//                " WHERE (goodHs_id = 0 OR link_goodHs_id = 0)" .
//                " AND admin_id = '$_SESSION[admin_id]'";
//        $db->query($sql);

//        /* 组合商户 */ *********************需求再改
//        $group_goodHs_list = array();
//        $sql = "DELETE FROM " . $ecs->table('group_goodHs') .
//                " WHERE parent_id = 0 AND admin_id = '$_SESSION[admin_id]'";
//        $db->query($sql);
//
//        /* 关联文章 */
//        $goodHs_article_list = array();
//        $sql = "DELETE FROM " . $ecs->table('goodHs_article') .
//                " WHERE goodHs_id = 0 AND admin_id = '$_SESSION[admin_id]'";
//        $db->query($sql);
//
//        /* 属性 */
//        $sql = "DELETE FROM " . $ecs->table('goodHs_attr') . " WHERE goodHs_id = 0";
//        $db->query($sql);

        /* 图片列表 */
        $img_list = array();
    }
    else
    {
        /* 商户信息 */
//        这里已经有了商户表，所以用原来的商户表   by lee
        $sql = "SELECT * FROM " . $ecs->table('seller_shopinfo') . " WHERE seller_id = "
        .$goodHs['goodHs_id'];
        $goodHs = $db->getRow($sql);
var_dump($goodHs);exit;
        /* 虚拟卡商户复制时, 将其库存置为0*/
//        if ($is_copy && $code != '')
//        {
//            $goodHs['goodHs_number'] = 0;
//        }

        if (empty($goodHs) === true)
        {
            /* 默认值 */
            $goodHs = array(
                'goodHs_id'      => 0,
                'goodHs_desc'    => '',
                'cat_id'        => 0,
                'is_on_sale'    => '1',
                'is_alone_sale' => '1',
                'is_shipping' => '0',
                'other_cat'     => array(), // 扩展分类
                'goodHs_type'    => 0,       // 商户类型
                'shop_price'    => 0,
                'promote_price' => 0,
                'market_price'  => 0,
                'virtual_sales'  => 0,
                'integral'      => 0,
                'goodHs_number'  => 1,
                'warn_number'   => 1,
//                'promote_start_date' => local_date('Y-m-d'),
//                'promote_end_date'   => local_date('Y-m-d', gmstr2tome('+1 month')),
                'goodHs_weight'  => 0,
                'give_integral' => -1,
                'rank_integral' => -1
            );
        }

        /* 获取商户类型存在规格的类型 */
        $specifications = get_goodHs_type_specifications();
        $goodHs['specifications_id'] = $specifications[$goodHs['goodHs_type']];
        $_attribute = get_goodHs_specifications_list($goodHs['goodHs_id']);
        $goodHs['_attribute'] = empty($_attribute) ? '' : 1;


        if (!empty($goodHs['goodHs_brief']))
        {
            //$goodHs['goodHs_brief'] = trim_right($goodHs['goodHs_brief']);
            $goodHs['goodHs_brief'] = $goodHs['goodHs_brief'];
        }
        if (!empty($goodHs['keywords']))
        {
            //$goodHs['keywords']    = trim_right($goodHs['keywords']);
            $goodHs['keywords']    = $goodHs['keywords'];
        }

        /* 如果不是促销，处理促销日期 */
//        if (isset($goodHs['is_promote']) && $goodHs['is_promote'] == '0')
//        {
//            unset($goodHs['promote_start_date']);
//            unset($goodHs['promote_end_date']);
//        }
//        else
//        {
//            $goodHs['promote_start_date'] = local_date('Y-m-d', $goodHs['promote_start_date']);
//            $goodHs['promote_end_date'] = local_date('Y-m-d', $goodHs['promote_end_date']);
//        }

        /* 如果是复制商户，处理 */
        if ($_REQUEST['act'] == 'copy')
        {
            // 商户信息
            $goodHs['goodHs_id'] = 0;
            $goodHs['goodHs_sn'] = '';
            $goodHs['goodHs_name'] = '';
            $goodHs['goodHs_img'] = '';
            $goodHs['goodHs_thumb'] = '';
            $goodHs['original_img'] = '';

            // 扩展分类不变

            // 关联商户
            $sql = "DELETE FROM " . $ecs->table('link_goodHs') .
                    " WHERE (goodHs_id = 0 OR link_goodHs_id = 0)" .
                    " AND admin_id = '$_SESSION[admin_id]'";
            $db->query($sql);

            $sql = "SELECT '0' AS goodHs_id, link_goodHs_id, is_double, '$_SESSION[admin_id]' AS admin_id" .
                    " FROM " . $ecs->table('link_goodHs') .
                    " WHERE goodHs_id = '$_REQUEST[goodHs_id]' ";
            $res = $db->query($sql);
            while ($row = $db->fetchRow($res))
            {
                $db->autoExecute($ecs->table('link_goodHs'), $row, 'INSERT');
            }

            $sql = "SELECT goodHs_id, '0' AS link_goodHs_id, is_double, '$_SESSION[admin_id]' AS admin_id" .
                    " FROM " . $ecs->table('link_goodHs') .
                    " WHERE link_goodHs_id = '$_REQUEST[goodHs_id]' ";
            $res = $db->query($sql);
            while ($row = $db->fetchRow($res))
            {
                $db->autoExecute($ecs->table('link_goodHs'), $row, 'INSERT');
            }

            // 配件
            $sql = "DELETE FROM " . $ecs->table('group_goodHs') .
                    " WHERE parent_id = 0 AND admin_id = '$_SESSION[admin_id]'";
            $db->query($sql);

            $sql = "SELECT 0 AS parent_id, goodHs_id, goodHs_price, '$_SESSION[admin_id]' AS admin_id " .
                    "FROM " . $ecs->table('group_goodHs') .
                    " WHERE parent_id = '$_REQUEST[goodHs_id]' ";
            $res = $db->query($sql);
            while ($row = $db->fetchRow($res))
            {
                $db->autoExecute($ecs->table('group_goodHs'), $row, 'INSERT');
            }

            // 关联文章
            $sql = "DELETE FROM " . $ecs->table('goodHs_article') .
                    " WHERE goodHs_id = 0 AND admin_id = '$_SESSION[admin_id]'";
            $db->query($sql);

            $sql = "SELECT 0 AS goodHs_id, article_id, '$_SESSION[admin_id]' AS admin_id " .
                    "FROM " . $ecs->table('goodHs_article') .
                    " WHERE goodHs_id = '$_REQUEST[goodHs_id]' ";
            $res = $db->query($sql);
            while ($row = $db->fetchRow($res))
            {
                $db->autoExecute($ecs->table('goodHs_article'), $row, 'INSERT');
            }

            // 图片不变

            // 商户属性
            $sql = "DELETE FROM " . $ecs->table('goodHs_attr') . " WHERE goodHs_id = 0";
            $db->query($sql);

            $sql = "SELECT 0 AS goodHs_id, attr_id, attr_value, attr_price " .
                    "FROM " . $ecs->table('goodHs_attr') .
                    " WHERE goodHs_id = '$_REQUEST[goodHs_id]' ";
            $res = $db->query($sql);
            while ($row = $db->fetchRow($res))
            {
                $db->autoExecute($ecs->table('goodHs_attr'), addslashes_deep($row), 'INSERT');
            }
        }

        // 扩展分类
        $other_cat_list = array();
        $sql = "SELECT cat_id FROM " . $ecs->table('goodHs_cat') . " WHERE goodHs_id = '$_REQUEST[goodHs_id]'";
        $goodHs['other_cat'] = $db->getCol($sql);
        foreach ($goodHs['other_cat'] AS $cat_id)
        {
            $other_cat_list[$cat_id] = cat_list(0, $cat_id);
        }
        $smarty->assign('other_cat_list', $other_cat_list);

        $link_goodHs_list    = get_linked_goodHs($goodHs['goodHs_id']); // 关联商户
        $group_goodHs_list   = get_group_goodHs($goodHs['goodHs_id']); // 配件
        $goodHs_article_list = get_goodHs_articles($goodHs['goodHs_id']);   // 关联文章

        /* 商户图片路径 */
        if (isset($GLOBALS['shop_id']) && ($GLOBALS['shop_id'] > 10) && !empty($goodHs['original_img']))
        {
            $goodHs['goodHs_img'] = get_image_path($_REQUEST['goodHs_id'], $goodHs['goodHs_img']);
            $goodHs['goodHs_thumb'] = get_image_path($_REQUEST['goodHs_id'], $goodHs['goodHs_thumb'], true);
        }

        /* 图片列表 */
        $sql = "SELECT * FROM " . $ecs->table('goodHs_gallery') . " WHERE goodHs_id = '$goodHs[goodHs_id]'";
        $img_list = $db->getAll($sql);

        /* 格式化相册图片路径 */
        if (isset($GLOBALS['shop_id']) && ($GLOBALS['shop_id'] > 0))
        {
            foreach ($img_list as $key => $gallery_img)
            {
                $gallery_img[$key]['img_url'] = get_image_path($gallery_img['goodHs_id'], $gallery_img['img_original'], false, 'gallery');
                $gallery_img[$key]['thumb_url'] = get_image_path($gallery_img['goodHs_id'], $gallery_img['img_original'], true, 'gallery');
            }
        }
        else
        {
            foreach ($img_list as $key => $gallery_img)
            {
                $gallery_img[$key]['thumb_url'] = '../' . (empty($gallery_img['thumb_url']) ? $gallery_img['img_url'] : $gallery_img['thumb_url']);
            }
        }
    }

    /* 拆分商户名称样式 */
    $goodHs_name_style = explode('+', empty($goodHs['goodHs_name_style']) ? '+' : $goodHs['goodHs_name_style']);
    /* 创建 html editor */
    create_html_editor('goodHs_desc', $goodHs['seller_desc']);

    /* 模板赋值 */
    $smarty->assign('code',    $code);
    $smarty->assign('ur_here', $is_add ? (empty($code) ? $_LANG['02_goodHs_add'] : $_LANG['51_virtual_card_add']) : ($_REQUEST['act'] == 'edit' ? $_LANG['edit_goodHs'] : $_LANG['copy_goodHs']));
    $smarty->assign('action_link', list_link($is_add, $code));
    $smarty->assign('goodHs', $goodHs);
//    $smarty->assign('goodHs_name_color', $goodHs_name_style[0]);
//    $smarty->assign('goodHs_name_style', $goodHs_name_style[1]);
    $smarty->assign('cat_list', cat_list(0, $goodHs['cat_id']));
    $smarty->assign('brand_list', get_brand_list());

//    $smarty->assign('unit_list', get_unit_list());
//    $smarty->assign('user_rank_list', get_user_rank_list());
//    $smarty->assign('weight_unit', $is_add ? '1' : ($goodHs['goodHs_weight'] >= 1 ? '1' : '0.001'));
    $smarty->assign('cfg', $_CFG);
    $smarty->assign('form_act', $is_add ? 'insert' : ($_REQUEST['act'] == 'edit' ? 'update' : 'insert'));
    if ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')
    {
        $smarty->assign('is_add', true);
    }
//   var_dump($goodHs);exit;
    if(!$is_add)
    {
        $smarty->assign('member_price_list', get_member_price_list($_REQUEST['goodHs_id']));
    }
//    $smarty->assign('link_goodHs_list', $link_goodHs_list);
//    $smarty->assign('group_goodHs_list', $group_goodHs_list);
//    $smarty->assign('goodHs_article_list', $goodHs_article_list);
    $smarty->assign('img_list', $img_list);
    //获取商户类型的列表
//    $smarty->assign('goodHs_type_list', goodHs_type_list($goodHs['goodHs_type']));
    $smarty->assign('gd', gd_version());
    $smarty->assign('thumb_width', $_CFG['thumb_width']);
    $smarty->assign('thumb_height', $_CFG['thumb_height']);

    $smarty->assign('goodHs_attr_html', build_attr_html($goodHs['goodHs_type'], $goodHs['goodHs_id']));
    $volume_price_list = '';

    //获取商户的优惠价格
//    if(isset($_REQUEST['goodHs_id']))
//    {
////    $volume_price_list = get_volume_price_list($_REQUEST['goodHs_id']);
//    }
    if (empty($volume_price_list))
    {
        $volume_price_list = array('0'=>array('number'=>'','price'=>''));
    }
    $smarty->assign('volume_price_list', $volume_price_list);
    /* 显示商户信息页面 */
    assign_query_info();
//    echo'<pre>';
//  var_dump($goodHs);exit;
    $smarty->display('goodHs_info.htm');
}

/*------------------------------------------------------ */
//-- 插入商户 更新商户
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'insert' || $_REQUEST['act'] == 'update')
{
    $code = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);

    /* 是否处理缩略图 */
    $proc_thumb = (isset($GLOBALS['shop_id']) && $GLOBALS['shop_id'] > 0)? false : true;
    if ($code == 'virtual_card')
    {
        admin_priv('virualcard'); // 检查权限
    }
    else
    {
        admin_priv('goodHs_manage'); // 检查权限
    }

    /* 检查货号是否重复 */
    if ($_POST['goodHs_sn'])
    {
        $sql = "SELECT COUNT(*) FROM " . $ecs->table('goodHs') .
                " WHERE goodHs_sn = '$_POST[goodHs_sn]' AND is_delete = 0 AND goodHs_id <> '$_POST[goodHs_id]'";
        if ($db->getOne($sql) > 0)
        {
            sys_msg($_LANG['goodHs_sn_exists'], 1, array(), false);
        }
    }

    /* 检查图片：如果有错误，检查尺寸是否超过最大值；否则，检查文件类型 */
    if (isset($_FILES['goodHs_img']['error'])) // php 4.2 版本才支持 error
    {
        // 最大上传文件大小
        $php_maxsize = ini_get('upload_max_filesize');
        $htm_maxsize = '2M';

        // 商户图片
        if ($_FILES['goodHs_img']['error'] == 0)
        {
            if (!$image->check_img_type($_FILES['goodHs_img']['type']))
            {
                sys_msg($_LANG['invalid_goodHs_img'], 1, array(), false);
            }
        }
        elseif ($_FILES['goodHs_img']['error'] == 1)
        {
            sys_msg(sprintf($_LANG['goodHs_img_too_big'], $php_maxsize), 1, array(), false);
        }
        elseif ($_FILES['goodHs_img']['error'] == 2)
        {
            sys_msg(sprintf($_LANG['goodHs_img_too_big'], $htm_maxsize), 1, array(), false);
        }

        // 商户缩略图
        if (isset($_FILES['goodHs_thumb']))
        {
            if ($_FILES['goodHs_thumb']['error'] == 0)
            {
                if (!$image->check_img_type($_FILES['goodHs_thumb']['type']))
                {
                    sys_msg($_LANG['invalid_goodHs_thumb'], 1, array(), false);
                }
            }
            elseif ($_FILES['goodHs_thumb']['error'] == 1)
            {
                sys_msg(sprintf($_LANG['goodHs_thumb_too_big'], $php_maxsize), 1, array(), false);
            }
            elseif ($_FILES['goodHs_thumb']['error'] == 2)
            {
                sys_msg(sprintf($_LANG['goodHs_thumb_too_big'], $htm_maxsize), 1, array(), false);
            }
        }

        // 相册图片
        foreach ($_FILES['img_url']['error'] AS $key => $value)
        {
            if ($value == 0)
            {
                if (!$image->check_img_type($_FILES['img_url']['type'][$key]))
                {
                    sys_msg(sprintf($_LANG['invalid_img_url'], $key + 1), 1, array(), false);
                }
            }
            elseif ($value == 1)
            {
                sys_msg(sprintf($_LANG['img_url_too_big'], $key + 1, $php_maxsize), 1, array(), false);
            }
            elseif ($_FILES['img_url']['error'] == 2)
            {
                sys_msg(sprintf($_LANG['img_url_too_big'], $key + 1, $htm_maxsize), 1, array(), false);
            }
        }
    }
    /* 4.1版本 */
    else
    {
        // 商户图片
        if ($_FILES['goodHs_img']['tmp_name'] != 'none')
        {
            if (!$image->check_img_type($_FILES['goodHs_img']['type']))
            {

                sys_msg($_LANG['invalid_goodHs_img'], 1, array(), false);
            }
        }

        // 商户缩略图
        if (isset($_FILES['goodHs_thumb']))
        {
            if ($_FILES['goodHs_thumb']['tmp_name'] != 'none')
            {
                if (!$image->check_img_type($_FILES['goodHs_thumb']['type']))
                {
                    sys_msg($_LANG['invalid_goodHs_thumb'], 1, array(), false);
                }
            }
        }

        // 相册图片
        foreach ($_FILES['img_url']['tmp_name'] AS $key => $value)
        {
            if ($value != 'none')
            {
                if (!$image->check_img_type($_FILES['img_url']['type'][$key]))
                {
                    sys_msg(sprintf($_LANG['invalid_img_url'], $key + 1), 1, array(), false);
                }
            }
        }
    }

    /* 插入还是更新的标识 */
    $is_insert = $_REQUEST['act'] == 'insert';

    /* 处理商户图片 */
    $goodHs_img        = '';  // 初始化商户图片
    $goodHs_thumb      = '';  // 初始化商户缩略图
    $original_img     = '';  // 初始化原始图片
    $old_original_img = '';  // 初始化原始图片旧图

    // 如果上传了商户图片，相应处理
    if (($_FILES['goodHs_img']['tmp_name'] != '' && $_FILES['goodHs_img']['tmp_name'] != 'none') or (($_POST['goodHs_img_url'] != $_LANG['lab_picture_url'] && $_POST['goodHs_img_url'] != 'http://') && $is_url_goodHs_img = 1))
    {
        if ($_REQUEST['goodHs_id'] > 0)
        {
            /* 删除原来的图片文件 */
            $sql = "SELECT goodHs_thumb, goodHs_img, original_img " .
                    " FROM " . $ecs->table('goodHs') .
                    " WHERE goodHs_id = '$_REQUEST[goodHs_id]'";
            $row = $db->getRow($sql);
            if ($row['goodHs_thumb'] != '' && is_file('../' . $row['goodHs_thumb']))
            {
                @unlink('../' . $row['goodHs_thumb']);
            }
            if ($row['goodHs_img'] != '' && is_file('../' . $row['goodHs_img']))
            {
                @unlink('../' . $row['goodHs_img']);
            }
            if ($row['original_img'] != '' && is_file('../' . $row['original_img']))
            {
                /* 先不处理，以防止程序中途出错停止 */
                //$old_original_img = $row['original_img']; //记录旧图路径
            }
            /* 清除原来商户图片 */
            if ($proc_thumb === false)
            {
                get_image_path($_REQUEST[goodHs_id], $row['goodHs_img'], false, 'goodHs', true);
                get_image_path($_REQUEST[goodHs_id], $row['goodHs_thumb'], true, 'goodHs', true);
            }
        }

        if (empty($is_url_goodHs_img))
        {
            $original_img   = $image->upload_image($_FILES['goodHs_img']); // 原始图片
        }
        elseif ($_POST['goodHs_img_url'])
        {
            
            if(preg_match('/(.jpg|.png|.gif|.jpeg)$/',$_POST['goodHs_img_url']) && copy(trim($_POST['goodHs_img_url']), ROOT_PATH . 'temp/' . basename($_POST['goodHs_img_url'])))
            {
                  $original_img = 'temp/' . basename($_POST['goodHs_img_url']);
            }
            
        }

        if ($original_img === false)
        {
            sys_msg($image->error_msg(), 1, array(), false);
        }
        $goodHs_img      = $original_img;   // 商户图片

        /* 复制一份相册图片 */
        /* 添加判断是否自动生成相册图片 */
        if ($_CFG['auto_generate_gallery'])
        {
            $img        = $original_img;   // 相册图片
            $pos        = strpos(basename($img), '.');
            $newname    = dirname($img) . '/' . $image->random_filename() . substr(basename($img), $pos);
            if (!copy('../' . $img, '../' . $newname))
            {
                sys_msg('fail to copy file: ' . realpath('../' . $img), 1, array(), false);
            }
            $img        = $newname;

            $gallery_img    = $img;
            $gallery_thumb  = $img;
        }

        // 如果系统支持GD，缩放商户图片，且给商户图片和相册图片加水印
        if ($proc_thumb && $image->gd_version() > 0 && $image->check_img_function($_FILES['goodHs_img']['type']) || $is_url_goodHs_img)
        {

            if (empty($is_url_goodHs_img))
            {
                // 如果设置大小不为0，缩放图片
                if ($_CFG['image_width'] != 0 || $_CFG['image_height'] != 0)
                {
                    $goodHs_img = $image->make_thumb('../'. $goodHs_img , $GLOBALS['_CFG']['image_width'],  $GLOBALS['_CFG']['image_height']);
                    if ($goodHs_img === false)
                    {
                        sys_msg($image->error_msg(), 1, array(), false);
                    }
                }

                /* 添加判断是否自动生成相册图片 */
                if ($_CFG['auto_generate_gallery'])
                {
                    $newname    = dirname($img) . '/' . $image->random_filename() . substr(basename($img), $pos);
                    if (!copy('../' . $img, '../' . $newname))
                    {
                        sys_msg('fail to copy file: ' . realpath('../' . $img), 1, array(), false);
                    }
                    $gallery_img        = $newname;
                }

                // 加水印
                if (intval($_CFG['watermark_place']) > 0 && !empty($GLOBALS['_CFG']['watermark']))
                {
                    if ($image->add_watermark('../'.$goodHs_img,'',$GLOBALS['_CFG']['watermark'], $GLOBALS['_CFG']['watermark_place'], $GLOBALS['_CFG']['watermark_alpha']) === false)
                    {
                        sys_msg($image->error_msg(), 1, array(), false);
                    }
                    /* 添加判断是否自动生成相册图片 */
                    if ($_CFG['auto_generate_gallery'])
                    {
                        if ($image->add_watermark('../'. $gallery_img,'',$GLOBALS['_CFG']['watermark'], $GLOBALS['_CFG']['watermark_place'], $GLOBALS['_CFG']['watermark_alpha']) === false)
                        {
                            sys_msg($image->error_msg(), 1, array(), false);
                        }
                    }
                }
            }

            // 相册缩略图
            /* 添加判断是否自动生成相册图片 */
            if ($_CFG['auto_generate_gallery'])
            {
                if ($_CFG['thumb_width'] != 0 || $_CFG['thumb_height'] != 0)
                {
                    $gallery_thumb = $image->make_thumb('../' . $img, $GLOBALS['_CFG']['thumb_width'],  $GLOBALS['_CFG']['thumb_height']);
                    if ($gallery_thumb === false)
                    {
                        sys_msg($image->error_msg(), 1, array(), false);
                    }
                }
            }
        }
        /* 取消该原图复制流程 */
        // else
        // {
        //     /* 复制一份原图 */
        //     $pos        = strpos(basename($img), '.');
        //     $gallery_img = dirname($img) . '/' . $image->random_filename() . // substr(basename($img), $pos);
        //     if (!copy('../' . $img, '../' . $gallery_img))
        //     {
        //         sys_msg('fail to copy file: ' . realpath('../' . $img), 1, array(), false);
        //     }
        //     $gallery_thumb = '';
        // }
    }


    // 是否上传商户缩略图
    if (isset($_FILES['goodHs_thumb']) && $_FILES['goodHs_thumb']['tmp_name'] != '' &&
        isset($_FILES['goodHs_thumb']['tmp_name']) &&$_FILES['goodHs_thumb']['tmp_name'] != 'none')
    {
        // 上传了，直接使用，原始大小
        $goodHs_thumb = $image->upload_image($_FILES['goodHs_thumb']);
        if ($goodHs_thumb === false)
        {
            sys_msg($image->error_msg(), 1, array(), false);
        }
    }
    else
    {
        // 未上传，如果自动选择生成，且上传了商户图片，生成所略图
        if ($proc_thumb && isset($_POST['auto_thumb']) && !empty($original_img))
        {
            // 如果设置缩略图大小不为0，生成缩略图
            if ($_CFG['thumb_width'] != 0 || $_CFG['thumb_height'] != 0)
            {
                $goodHs_thumb = $image->make_thumb('../' . $original_img, $GLOBALS['_CFG']['thumb_width'],  $GLOBALS['_CFG']['thumb_height']);
                if ($goodHs_thumb === false)
                {
                    sys_msg($image->error_msg(), 1, array(), false);
                }
            }
            else
            {
                $goodHs_thumb = $original_img;
            }
        }
    }


    /* 删除下载的外链原图 */
    if (!empty($is_url_goodHs_img))
    {
        unlink(ROOT_PATH . $original_img);
        empty($newname) || unlink(ROOT_PATH . $newname);
        $url_goodHs_img = $goodHs_img = $original_img = htmlspecialchars(trim($_POST['goodHs_img_url']));
    }


    /* 如果没有输入商户货号则自动生成一个商户货号 */
    if (empty($_POST['goodHs_sn']))
    {
        $max_id     = $is_insert ? $db->getOne("SELECT MAX(id) + 1 FROM ".$ecs->table('seller_shopinfo')) : $_REQUEST['goodHs_id'];
        $goodHs_sn   = generate_goodHs_sn($max_id);
    }
    else
    {
        $goodHs_sn   = $_POST['goodHs_sn'];
    }

    /* 处理商户数据 */
    $shop_price = !empty($_POST['shop_price']) ? $_POST['shop_price'] : 0;
    $market_price = !empty($_POST['market_price']) ? $_POST['market_price'] : 0;
    $virtual_sales = !empty($_POST['virtual_sales']) ? $_POST['virtual_sales'] : 0;
    $promote_price = !empty($_POST['promote_price']) ? floatval($_POST['promote_price'] ) : 0;
    $is_promote = empty($promote_price) ? 0 : 1;
    $promote_start_date = ($is_promote && !empty($_POST['promote_start_date'])) ? local_strtotime($_POST['promote_start_date']) : 0;
    $promote_end_date = ($is_promote && !empty($_POST['promote_end_date'])) ? local_strtotime($_POST['promote_end_date']) : 0;
    $goodHs_weight = !empty($_POST['goodHs_weight']) ? $_POST['goodHs_weight'] * $_POST['weight_unit'] : 0;
    $is_best = isset($_POST['is_best']) ? 1 : 0;
    $is_new = isset($_POST['is_new']) ? 1 : 0;
    $is_hot = isset($_POST['is_hot']) ? 1 : 0;
    $is_on_sale = isset($_POST['is_on_sale']) ? 1 : 0;
    $is_alone_sale = isset($_POST['is_alone_sale']) ? 1 : 0;
    $is_shipping = isset($_POST['is_shipping']) ? 1 : 0;
    $goodHs_number = isset($_POST['goodHs_number']) ? $_POST['goodHs_number'] : 0;
    $warn_number = isset($_POST['warn_number']) ? $_POST['warn_number'] : 0;
    $goodHs_type = isset($_POST['goodHs_type']) ? $_POST['goodHs_type'] : 0;
    $give_integral = isset($_POST['give_integral']) ? intval($_POST['give_integral']) : '-1';
    $rank_integral = isset($_POST['rank_integral']) ? intval($_POST['rank_integral']) : '-1';
    $suppliers_id = isset($_POST['suppliers_id']) ? intval($_POST['suppliers_id']) : '0';

    $goodHs_name_style = $_POST['goodHs_name_color'] . '+' . $_POST['goodHs_name_style'];

    $catgory_id = empty($_POST['cat_id']) ? '' : intval($_POST['cat_id']);
    $brand_id = empty($_POST['brand_id']) ? '' : intval($_POST['brand_id']);

    $goodHs_thumb = (empty($goodHs_thumb) && !empty($_POST['goodHs_thumb_url']) && goodHs_parse_url($_POST['goodHs_thumb_url'])) ? htmlspecialchars(trim($_POST['goodHs_thumb_url'])) : $goodHs_thumb;
    $goodHs_thumb = (empty($goodHs_thumb) && isset($_POST['auto_thumb']))? $goodHs_img : $goodHs_thumb;

    /* 入库 */
    //如果需要增加添加商户模块需要设计字段这里改了一部分
    if ($is_insert)
    {
        if ($code == '')
        {
            $sql = "INSERT INTO " . $ecs->table('seller_shopinfo') . "()" .
                "VALUES ('$_POST[goodHs_name]', '$goodHs_name_style', '$goodHs_sn', '$catgory_id', " .
                "'$brand_id', '$shop_price', '$market_price', '$virtual_sales', '$is_promote','$promote_price', ".
                    "'$promote_start_date', '$promote_end_date', '$goodHs_img', '$goodHs_thumb', '$original_img', ".
                    "'$_POST[keywords]', '$_POST[goodHs_brief]', '$_POST[seller_note]', '$goodHs_weight', '$goodHs_number',".
                    " '$warn_number', '$_POST[integral]', '$give_integral', '$is_best', '$is_new', '$is_hot', '$is_on_sale', '$is_alone_sale', $is_shipping, ".
                    " '$_POST[goodHs_desc]', '" . gmtime() . "', '". gmtime() ."', '$goodHs_type', '$rank_integral', '$suppliers_id')";
        }
        else
        {
            $sql = "INSERT INTO " . $ecs->table('seller_shopinfo') . " (id,seller_id,shop_name,)".
            "VALUES ('$_POST[goodHs_name]', '$goodHs_name_style', '$goodHs_sn', '$catgory_id', " ;
        }
    }
    else
    {
        /* 如果有上传图片，删除原来的商户图 */
        $sql = "SELECT goodHs_thumb, goodHs_img, original_img " .
                    " FROM " . $ecs->table('goodHs') .
                    " WHERE goodHs_id = '$_REQUEST[goodHs_id]'";
        $row = $db->getRow($sql);
        if ($proc_thumb && $goodHs_img && $row['goodHs_img'] && !goodHs_parse_url($row['goodHs_img']))
        {
            @unlink(ROOT_PATH . $row['goodHs_img']);
            @unlink(ROOT_PATH . $row['original_img']);
        }

        if ($proc_thumb && $goodHs_thumb && $row['goodHs_thumb'] && !goodHs_parse_url($row['goodHs_thumb']))
        {
            @unlink(ROOT_PATH . $row['goodHs_thumb']);
        }

        $sql = "UPDATE " . $ecs->table('goodHs') . " SET " .
                "goodHs_name = '$_POST[goodHs_name]', " .
                "goodHs_name_style = '$goodHs_name_style', " .
                "goodHs_sn = '$goodHs_sn', " .
                "cat_id = '$catgory_id', " .
                "brand_id = '$brand_id', " .
                "shop_price = '$shop_price', " .
                "market_price = '$market_price', " .
                "virtual_sales = '$virtual_sales', " .
                "is_promote = '$is_promote', " .
                "promote_price = '$promote_price', " .
                "promote_start_date = '$promote_start_date', " .
                "suppliers_id = '$suppliers_id', " .
                "promote_end_date = '$promote_end_date', ";

        /* 如果有上传图片，需要更新数据库 */
        if ($goodHs_img)
        {
            $sql .= "goodHs_img = '$goodHs_img', original_img = '$original_img', ";
        }
        if ($goodHs_thumb)
        {
            $sql .= "goodHs_thumb = '$goodHs_thumb', ";
        }
        if ($code != '')
        {
            $sql .= "is_real=0, extension_code='$code', ";
        }
        $sql .= "keywords = '$_POST[keywords]', " .
                "goodHs_brief = '$_POST[goodHs_brief]', " .
                "seller_note = '$_POST[seller_note]', " .
                "goodHs_weight = '$goodHs_weight'," .
                "goodHs_number = '$goodHs_number', " .
                "warn_number = '$warn_number', " .
                "integral = '$_POST[integral]', " .
                "give_integral = '$give_integral', " .
                "rank_integral = '$rank_integral', " .
                "is_best = '$is_best', " .
                "is_new = '$is_new', " .
                "is_hot = '$is_hot', " .
                "is_on_sale = '$is_on_sale', " .
                "is_alone_sale = '$is_alone_sale', " .
                "is_shipping = '$is_shipping', " .
                "goodHs_desc = '$_POST[goodHs_desc]', " .
                "last_update = '". gmtime() ."', ".
                "goodHs_type = '$goodHs_type' " .
                "WHERE goodHs_id = '$_REQUEST[goodHs_id]' LIMIT 1";
    }
    $db->query($sql);

    /* 商户编号 */
    $goodHs_id = $is_insert ? $db->insert_id() : $_REQUEST['goodHs_id'];

    /* 记录日志 */
    if ($is_insert)
    {
        admin_log($_POST['goodHs_name'], 'add', 'goodHs');
    }
    else
    {
        admin_log($_POST['goodHs_name'], 'edit', 'goodHs');
    }

//    /* 处理属性 */
//    if ((isset($_POST['attr_id_list']) && isset($_POST['attr_value_list'])) || (empty($_POST['attr_id_list']) && empty($_POST['attr_value_list'])))
//    {
//        // 取得原有的属性值
//        $goodHs_attr_list = array();
//
//        $keywords_arr = explode(" ", $_POST['keywords']);
//
//        $keywords_arr = array_flip($keywords_arr);
//        if (isset($keywords_arr['']))
//        {
//            unset($keywords_arr['']);
//        }
//
//        $sql = "SELECT attr_id, attr_index FROM " . $ecs->table('attribute') . " WHERE cat_id = '$goodHs_type'";
//
//        $attr_res = $db->query($sql);
//
//        $attr_list = array();
//
//        while ($row = $db->fetchRow($attr_res))
//        {
//            $attr_list[$row['attr_id']] = $row['attr_index'];
//        }
//
//        $sql = "SELECT g.*, a.attr_type
//                FROM " . $ecs->table('goodHs_attr') . " AS g
//                    LEFT JOIN " . $ecs->table('attribute') . " AS a
//                        ON a.attr_id = g.attr_id
//                WHERE g.goodHs_id = '$goodHs_id'";
//
//        $res = $db->query($sql);
//
//        while ($row = $db->fetchRow($res))
//        {
//            $goodHs_attr_list[$row['attr_id']][$row['attr_value']] = array('sign' => 'delete', 'goodHs_attr_id' => $row['goodHs_attr_id']);
//        }
//        // 循环现有的，根据原有的做相应处理
//        if(isset($_POST['attr_id_list']))
//        {
//            foreach ($_POST['attr_id_list'] AS $key => $attr_id)
//            {
//                $attr_value = $_POST['attr_value_list'][$key];
//                $attr_price = $_POST['attr_price_list'][$key];
//                if (!empty($attr_value))
//                {
//                    if (isset($goodHs_attr_list[$attr_id][$attr_value]))
//                    {
//                        // 如果原来有，标记为更新
//                        $goodHs_attr_list[$attr_id][$attr_value]['sign'] = 'update';
//                        $goodHs_attr_list[$attr_id][$attr_value]['attr_price'] = $attr_price;
//                    }
//                    else
//                    {
//                        // 如果原来没有，标记为新增
//                        $goodHs_attr_list[$attr_id][$attr_value]['sign'] = 'insert';
//                        $goodHs_attr_list[$attr_id][$attr_value]['attr_price'] = $attr_price;
//                    }
//                    $val_arr = explode(' ', $attr_value);
//                    foreach ($val_arr AS $k => $v)
//                    {
//                        if (!isset($keywords_arr[$v]) && $attr_list[$attr_id] == "1")
//                        {
//                            $keywords_arr[$v] = $v;
//                        }
//                    }
//                }
//            }
//        }
//        $keywords = join(' ', array_flip($keywords_arr));
//
//        $sql = "UPDATE " .$ecs->table('goodHs'). " SET keywords = '$keywords' WHERE goodHs_id = '$goodHs_id' LIMIT 1";
//
//        $db->query($sql);
//
//        /* 插入、更新、删除数据 */
//        foreach ($goodHs_attr_list as $attr_id => $attr_value_list)
//        {
//            foreach ($attr_value_list as $attr_value => $info)
//            {
//                if ($info['sign'] == 'insert')
//                {
//                    $sql = "INSERT INTO " .$ecs->table('goodHs_attr'). " (attr_id, goodHs_id, attr_value, attr_price)".
//                            "VALUES ('$attr_id', '$goodHs_id', '$attr_value', '$info[attr_price]')";
//                }
//                elseif ($info['sign'] == 'update')
//                {
//                    $sql = "UPDATE " .$ecs->table('goodHs_attr'). " SET attr_price = '$info[attr_price]' WHERE goodHs_attr_id = '$info[goodHs_attr_id]' LIMIT 1";
//                }
//                else
//                {
//                    $sql = "DELETE FROM " .$ecs->table('goodHs_attr'). " WHERE goodHs_attr_id = '$info[goodHs_attr_id]' LIMIT 1";
//                }
//                $db->query($sql);
//            }
//        }
//    }
//
//    /* 处理会员价格 */
//    if (isset($_POST['user_rank']) && isset($_POST['user_price']))
//    {
//        handle_member_price($goodHs_id, $_POST['user_rank'], $_POST['user_price']);
//    }
//
//    /* 处理优惠价格 */
//    if (isset($_POST['volume_number']) && isset($_POST['volume_price']))
//    {
//        $temp_num = array_count_values($_POST['volume_number']);
//        foreach($temp_num as $v)
//        {
//            if ($v > 1)
//            {
//                sys_msg($_LANG['volume_number_continuous'], 1, array(), false);
//                break;
//            }
//        }
//        handle_volume_price($goodHs_id, $_POST['volume_number'], $_POST['volume_price']);
//    }
//
//    /* 处理扩展分类 */
//    if (isset($_POST['other_cat']))
//    {
//        handle_other_cat($goodHs_id, array_unique($_POST['other_cat']));
//    }

    if ($is_insert)
    {
        /* 处理关联商户 */
        handle_link_goodHs($goodHs_id);

        /* 处理组合商户 */
        handle_group_goodHs($goodHs_id);

        /* 处理关联文章 */
        handle_goodHs_article($goodHs_id);
    }

    /* 重新格式化图片名称 */
    $original_img = reformat_image_name('goodHs', $goodHs_id, $original_img, 'source');
    $goodHs_img = reformat_image_name('goodHs', $goodHs_id, $goodHs_img, 'goodHs');
    $goodHs_thumb = reformat_image_name('goodHs_thumb', $goodHs_id, $goodHs_thumb, 'thumb');
    if ($goodHs_img !== false)
    {
        $db->query("UPDATE " . $ecs->table('goodHs') . " SET goodHs_img = '$goodHs_img' WHERE goodHs_id='$goodHs_id'");
    }

    if ($original_img !== false)
    {
        $db->query("UPDATE " . $ecs->table('goodHs') . " SET original_img = '$original_img' WHERE goodHs_id='$goodHs_id'");
    }

    if ($goodHs_thumb !== false)
    {
        $db->query("UPDATE " . $ecs->table('goodHs') . " SET goodHs_thumb = '$goodHs_thumb' WHERE goodHs_id='$goodHs_id'");
    }

    /* 如果有图片，把商户图片加入图片相册 */
    if (isset($img))
    {
        /* 重新格式化图片名称 */
        if (empty($is_url_goodHs_img))
        {
            $img = reformat_image_name('gallery', $goodHs_id, $img, 'source');
            $gallery_img = reformat_image_name('gallery', $goodHs_id, $gallery_img, 'goodHs');
        }
        else
        {
            $img = $url_goodHs_img;
            $gallery_img = $url_goodHs_img;
        }

        $gallery_thumb = reformat_image_name('gallery_thumb', $goodHs_id, $gallery_thumb, 'thumb');
        $sql = "INSERT INTO " . $ecs->table('goodHs_gallery') . " (goodHs_id, img_url, img_desc, thumb_url, img_original) " .
                "VALUES ('$goodHs_id', '$gallery_img', '', '$gallery_thumb', '$img')";
        $db->query($sql);
    }

    /* 处理相册图片 */
    handle_gallery_image($goodHs_id, $_FILES['img_url'], $_POST['img_desc'], $_POST['img_file']);

    /* 编辑时处理相册图片描述 */
    if (!$is_insert && isset($_POST['old_img_desc']))
    {
        foreach ($_POST['old_img_desc'] AS $img_id => $img_desc)
        {
            $sql = "UPDATE " . $ecs->table('goodHs_gallery') . " SET img_desc = '$img_desc' WHERE img_id = '$img_id' LIMIT 1";
            $db->query($sql);
        }
    }

    /* 不保留商户原图的时候删除原图 */
    if ($proc_thumb && !$_CFG['retain_original_img'] && !empty($original_img))
    {
        $db->query("UPDATE " . $ecs->table('goodHs') . " SET original_img='' WHERE `goodHs_id`='{$goodHs_id}'");
        $db->query("UPDATE " . $ecs->table('goodHs_gallery') . " SET img_original='' WHERE `goodHs_id`='{$goodHs_id}'");
        @unlink('../' . $original_img);
        @unlink('../' . $img);
    }

    /* 记录上一次选择的分类和户牌 */
    setcookie('ECSCP[last_choose]', $catgory_id . '|' . $brand_id, gmtime() + 86400);
    /* 清空缓存 */
    clear_cache_files();

    /* 是否有货户 */
    $specifications_list = get_goodHs_specifications_list($goodHs_id);
    $product_list_url = $GLOBALS['ecs']->url()."admin/goodHs.php?act=product_list&goodHs_id=".$goodHs_id;
    if($specifications_list){
        echo '<script type="text/javascript">window.location.href="'.$product_list_url.'";</script>';exit;
    }
    /* 提示页面 */
    $link = array();
    if (check_goodHs_specifications_exist($goodHs_id) && $specifications_list)
    {
        $link[0] = array('href' => 'goodHs.php?act=product_list&goodHs_id=' . $goodHs_id, 'text' => $_LANG['product']);
    }
    if ($code == 'virtual_card')
    {
        $link[1] = array('href' => 'virtual_card.php?act=replenish&goodHs_id=' . $goodHs_id, 'text' => $_LANG['add_replenish']);
    }
    if ($is_insert)
    {
        $link[2] = add_link($code);
    }
    $link[3] = list_link($is_insert, $code);


    //$key_array = array_keys($link);
    for($i=0;$i<count($link);$i++)
    {
       $key_array[]=$i;
    }
    krsort($link);
    $link = array_combine($key_array, $link);


    sys_msg($is_insert ? $_LANG['add_goodHs_ok'] : $_LANG['edit_goodHs_ok'], 0, $link);
}

/*------------------------------------------------------ */
//-- 批量操作
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'batch')
{
    $code = empty($_REQUEST['extension_code'])? '' : trim($_REQUEST['extension_code']);

    /* 取得要操作的商户编号 */
    $goodHs_id = !empty($_POST['checkboxes']) ? join(',', $_POST['checkboxes']) : 0;

    if (isset($_POST['type']))
    {
        /* 放入回收站 */
        if ($_POST['type'] == 'trash')
        {
            /* 检查权限 */
            admin_priv('remove_back');

            update_goodHs($goodHs_id, 'is_delete', '1');

            /* 记录日志 */
            admin_log('', 'batch_trash', 'goodHs');
        }
        /* 上架 */
        elseif ($_POST['type'] == 'on_sale')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_on_sale', '1');
        }

        /* 下架 */
        elseif ($_POST['type'] == 'not_on_sale')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_on_sale', '0');
        }

        /* 设为精户 */
        elseif ($_POST['type'] == 'best')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_best', '1');
        }

        /* 取消精户 */
        elseif ($_POST['type'] == 'not_best')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_best', '0');
        }

        /* 设为新户 */
        elseif ($_POST['type'] == 'new')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_new', '1');
        }

        /* 取消新户 */
        elseif ($_POST['type'] == 'not_new')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_new', '0');
        }

        /* 设为热销 */
        elseif ($_POST['type'] == 'hot')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_hot', '1');
        }

        /* 取消热销 */
        elseif ($_POST['type'] == 'not_hot')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'is_hot', '0');
        }

        /* 转移到分类 */
        elseif ($_POST['type'] == 'move_to')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'cat_id', $_POST['target_cat']);
        }

        /* 转移到供货商 */
        elseif ($_POST['type'] == 'suppliers_move_to')
        {
            /* 检查权限 */
            admin_priv('goodHs_manage');
            update_goodHs($goodHs_id, 'suppliers_id', $_POST['suppliers_id']);
        }

        /* 还原 */
        elseif ($_POST['type'] == 'restore')
        {
            /* 检查权限 */
            admin_priv('remove_back');

            update_goodHs($goodHs_id, 'is_delete', '0');

            /* 记录日志 */
            admin_log('', 'batch_restore', 'goodHs');
        }
        /* 删除 */
        elseif ($_POST['type'] == 'drop')
        {
            /* 检查权限 */
            admin_priv('remove_back');

            delete_goodHs($goodHs_id);

            /* 记录日志 */
            admin_log('', 'batch_remove', 'goodHs');
        }
    }

    /* 清除缓存 */
    clear_cache_files();

    if ($_POST['type'] == 'drop' || $_POST['type'] == 'restore')
    {
        $link[] = array('href' => 'goodHs.php?act=trash', 'text' => $_LANG['11_goodHs_trash']);
    }
    else
    {
        $link[] = list_link(true, $code);
    }
    sys_msg($_LANG['batch_handle_ok'], 0, $link);
}

/*------------------------------------------------------ */
//-- 显示图片
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'show_image')
{

    if (isset($GLOBALS['shop_id']) && $GLOBALS['shop_id'] > 0)
    {
        $img_url = $_GET['img_url'];
    }
    else
    {
        if (strpos($_GET['img_url'], 'http://') === 0)
        {
            $img_url = $_GET['img_url'];
        }
        else
        {
            $img_url = '../' . $_GET['img_url'];
        }
    }
    $smarty->assign('img_url', $img_url);
    $smarty->display('goodHs_show_image.htm');
}

/*------------------------------------------------------ */
//-- 修改商户名称
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_goodHs_name')
{
    check_authz_json('goodHs_manage');

    $goodHs_id   = intval($_POST['id']);
    $goodHs_name = json_str_iconv(trim($_POST['val']));
    var_dump($_POST['val']);

    if ($exc->edit("goodHs_name = '$goodHs_name', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result(stripslashes($goodHs_name));
    }
}

/*------------------------------------------------------ */
//-- 修改商户货号
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_goodHs_sn')
{
    check_authz_json('goodHs_manage');

    $goodHs_id = intval($_POST['id']);
    $goodHs_sn = json_str_iconv(trim($_POST['val']));

    /* 检查是否重复 */
    if (!$exc->is_only('goodHs_sn', $goodHs_sn, $goodHs_id))
    {
        make_json_error($_LANG['goodHs_sn_exists']);
    }
    $sql="SELECT goodHs_id FROM ". $ecs->table('products')."WHERE product_sn='$goodHs_sn'";

    if($db->getOne($sql))
    {
        make_json_error($_LANG['goodHs_sn_exists']);
    }
    if ($exc->edit("goodHs_sn = '$goodHs_sn', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result(stripslashes($goodHs_sn));
    }
}

elseif ($_REQUEST['act'] == 'check_goodHs_sn')
{
    check_authz_json('goodHs_manage');
//   var_dump($goodHs_id);
    $goodHs_id = intval($_REQUEST['goodHs_id']);
    $goodHs_sn = htmlspecialchars(json_str_iconv(trim($_REQUEST['goodHs_sn'])));

    /* 检查是否重复 */
    if (!$exc->is_only('id', $goodHs_sn, $goodHs_id))
    {
        make_json_error($_LANG['goodHs_sn_exists']);
    }
    if(!empty($goodHs_sn))
    {
        $sql="SELECT id FROM ". $ecs->table('seller_shopinfo')."WHERE seller_id='$goodHs_sn'";
        if($db->getOne($sql))
        {
            make_json_error($_LANG['goodHs_sn_exists']);
        }
    }

// var_dump($db->getOne($sql));exit;
    make_json_result('');
}
elseif ($_REQUEST['act'] == 'check_products_goodHs_sn')
{
    check_authz_json('goodHs_manage');

    $goodHs_id = intval($_REQUEST['goodHs_id']);
    $goodHs_sn = json_str_iconv(trim($_REQUEST['goodHs_sn']));
    $products_sn=explode('||',$goodHs_sn);
    if(!is_array($products_sn))
    {
        make_json_result('');
    }
    else
    {
        foreach ($products_sn as $val)
        {
            if(empty($val))
            {
                 continue;
            }
            if(is_array($int_arry))
            {
                if(in_array($val,$int_arry))
                {
                     make_json_error($val.$_LANG['goodHs_sn_exists']);
                }
            }
            $int_arry[]=$val;
            if (!$exc->is_only('goodHs_sn', $val, '0'))
            {
                make_json_error($val.$_LANG['goodHs_sn_exists']);
            }
            $sql="SELECT goodHs_id FROM ". $ecs->table('products')."WHERE product_sn='$val'";
            if($db->getOne($sql))
            {
                make_json_error($val.$_LANG['goodHs_sn_exists']);
            }
        }
    }
    /* 检查是否重复 */
    make_json_result('');
}

/*------------------------------------------------------ */
//-- 修改商户价格
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_goodHs_price')
{
    check_authz_json('goodHs_manage');

    $goodHs_id       = intval($_POST['id']);
    $goodHs_price    = floatval($_POST['val']);
    $price_rate     = floatval($_CFG['market_price_rate'] * $goodHs_price);

    if ($goodHs_price < 0 || $goodHs_price == 0 && $_POST['val'] != "$goodHs_price")
    {
        make_json_error($_LANG['shop_price_invalid']);
    }
    else
    {
        if ($exc->edit("shop_price = '$goodHs_price', market_price = '$price_rate', last_update=" .gmtime(), $goodHs_id))
        {
            clear_cache_files();
            make_json_result(number_format($goodHs_price, 2, '.', ''));
        }
    }
}

/*------------------------------------------------------ */
//-- 修改商户库存数量
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_goodHs_number')
{
    check_authz_json('goodHs_manage');

    $goodHs_id   = intval($_POST['id']);
    $goodHs_num  = intval($_POST['val']);

    if($goodHs_num < 0 || $goodHs_num == 0 && $_POST['val'] != "$goodHs_num")
    {
        make_json_error($_LANG['goodHs_number_error']);
    }

    if(check_goodHs_product_exist($goodHs_id) == 1)
    {
        make_json_error($_LANG['sys']['wrong'] . $_LANG['cannot_goodHs_number']);
    }

    if ($exc->edit("goodHs_number = '$goodHs_num', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result($goodHs_num);
    }
}

/*------------------------------------------------------ */
//-- 修改上架状态
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_on_sale')
{
    check_authz_json('goodHs_manage');

    $goodHs_id       = intval($_POST['id']);
    $on_sale        = intval($_POST['val']);

    if ($exc->edit("is_on_sale = '$on_sale', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result($on_sale);
    }
}

/*------------------------------------------------------ */
//-- 修改精户推荐状态
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_best')
{
    check_authz_json('goodHs_manage');

    $goodHs_id       = intval($_POST['id']);
    $is_best        = intval($_POST['val']);

    if ($exc->edit("is_best = '$is_best', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result($is_best);
    }
}

/*------------------------------------------------------ */
//-- 修改新户推荐状态
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_new')
{
    check_authz_json('goodHs_manage');

    $goodHs_id       = intval($_POST['id']);
    $is_new         = intval($_POST['val']);

    if ($exc->edit("is_new = '$is_new', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result($is_new);
    }
}

/*------------------------------------------------------ */
//-- 修改热销推荐状态
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_hot')
{
    check_authz_json('goodHs_manage');

    $goodHs_id       = intval($_POST['id']);
    $is_hot         = intval($_POST['val']);

    if ($exc->edit("is_hot = '$is_hot', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result($is_hot);
    }
}

/*------------------------------------------------------ */
//-- 修改商户排序
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_sort_order')
{
    check_authz_json('goodHs_manage');

    $goodHs_id       = intval($_POST['id']);
    $sort_order     = intval($_POST['val']);

    if ($exc->edit("sort_order = '$sort_order', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result($sort_order);
    }
}

/*------------------------------------------------------ */
//-- 排序、分页、查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $is_delete = empty($_REQUEST['is_delete']) ? 0 : intval($_REQUEST['is_delete']);
    $code = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
    $goodHs_list = goodHs_list($is_delete, ($code=='') ? 1 : 0);

    $handler_list = array();
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=card', 'title'=>$_LANG['card'], 'img'=>'icon_send_bonus.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=replenish', 'title'=>$_LANG['replenish'], 'img'=>'icon_add.gif');
    $handler_list['virtual_card'][] = array('url'=>'virtual_card.php?act=batch_card_add', 'title'=>$_LANG['batch_card_add'], 'img'=>'icon_output.gif');

    if (isset($handler_list[$code]))
    {
        $smarty->assign('add_handler',      $handler_list[$code]);
    }
    $smarty->assign('code',         $code);
    $smarty->assign('goodHs_list',   $goodHs_list['goodHs']);
    $smarty->assign('filter',       $goodHs_list['filter']);
    $smarty->assign('record_count', $goodHs_list['record_count']);
    $smarty->assign('page_count',   $goodHs_list['page_count']);
    $smarty->assign('list_type',    $is_delete ? 'trash' : 'goodHs');
    $smarty->assign('use_storage',  empty($_CFG['use_storage']) ? 0 : 1);

    /* 排序标记 */
    $sort_flag  = sort_flag($goodHs_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    /* 获取商户类型存在规格的类型 */
    $specifications = get_goodHs_type_specifications();
    $smarty->assign('specifications', $specifications);

    $tpl = $is_delete ? 'goodHs_trash.htm' : 'goodHs_list.htm';

    make_json_result($smarty->fetch($tpl), '',
        array('filter' => $goodHs_list['filter'], 'page_count' => $goodHs_list['page_count']));
}

/*------------------------------------------------------ */
//-- 放入回收站
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove')
{
    $goodHs_id = intval($_REQUEST['id']);

    /* 检查权限 */
    check_authz_json('remove_back');

    if ($exc->edit("is_delete = 1", $goodHs_id))
    {
        clear_cache_files();
        $goodHs_name = $exc->get_name($goodHs_id);

        admin_log(addslashes($goodHs_name), 'trash', 'goodHs'); // 记录日志

        $url = 'goodHs.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

        ecs_header("Location: $url\n");
        exit;
    }
}

/*------------------------------------------------------ */
//-- 还原回收站中的商户
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'restore_goodHs')
{
    $goodHs_id = intval($_REQUEST['id']);

    check_authz_json('remove_back'); // 检查权限

    $exc->edit("is_delete = 0, add_time = '" . gmtime() . "'", $goodHs_id);
    clear_cache_files();

    $goodHs_name = $exc->get_name($goodHs_id);

    admin_log(addslashes($goodHs_name), 'restore', 'goodHs'); // 记录日志

    $url = 'goodHs.php?act=query&' . str_replace('act=restore_goodHs', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
    exit;
}

/*------------------------------------------------------ */
//-- 彻底删除商户
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'drop_goodHs')
{
    // 检查权限
    check_authz_json('remove_back');

    // 取得参数
    $goodHs_id = intval($_REQUEST['id']);
    if ($goodHs_id <= 0)
    {
        make_json_error('invalid params');
    }

    /* 取得商户信息 */
    $sql = "SELECT goodHs_id, goodHs_name, is_delete, is_real, goodHs_thumb, " .
                "goodHs_img, original_img " .
            "FROM " . $ecs->table('goodHs') .
            " WHERE goodHs_id = '$goodHs_id'";
    $goodHs = $db->getRow($sql);
    if (empty($goodHs))
    {
        make_json_error($_LANG['goodHs_not_exist']);
    }

    if ($goodHs['is_delete'] != 1)
    {
        make_json_error($_LANG['goodHs_not_in_recycle_bin']);
    }

    /* 删除商户图片和轮播图片 */
    if (!empty($goodHs['goodHs_thumb']))
    {
        @unlink('../' . $goodHs['goodHs_thumb']);
    }
    if (!empty($goodHs['goodHs_img']))
    {
        @unlink('../' . $goodHs['goodHs_img']);
    }
    if (!empty($goodHs['original_img']))
    {
        @unlink('../' . $goodHs['original_img']);
    }
    /* 删除商户 */
    $exc->drop($goodHs_id);

    /* 删除商户的货户记录 */
    $sql = "DELETE FROM " . $ecs->table('products') .
            " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);

    /* 记录日志 */
    admin_log(addslashes($goodHs['goodHs_name']), 'remove', 'goodHs');

    /* 删除商户相册 */
    $sql = "SELECT img_url, thumb_url, img_original " .
            "FROM " . $ecs->table('goodHs_gallery') .
            " WHERE goodHs_id = '$goodHs_id'";
    $res = $db->query($sql);
    while ($row = $db->fetchRow($res))
    {
        if (!empty($row['img_url']))
        {
            @unlink('../' . $row['img_url']);
        }
        if (!empty($row['thumb_url']))
        {
            @unlink('../' . $row['thumb_url']);
        }
        if (!empty($row['img_original']))
        {
            @unlink('../' . $row['img_original']);
        }
    }

    $sql = "DELETE FROM " . $ecs->table('goodHs_gallery') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);

    /* 删除相关表记录 */
    $sql = "DELETE FROM " . $ecs->table('collect_goodHs') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('goodHs_article') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('goodHs_attr') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('goodHs_cat') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('member_price') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('group_goodHs') . " WHERE parent_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('group_goodHs') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('link_goodHs') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('link_goodHs') . " WHERE link_goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('tag') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('comment') . " WHERE comment_type = 0 AND id_value = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('collect_goodHs') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('booking_goodHs') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);
    $sql = "DELETE FROM " . $ecs->table('goodHs_activity') . " WHERE goodHs_id = '$goodHs_id'";
    $db->query($sql);

    /* 如果不是实体商户，删除相应虚拟商户记录 */
    if ($goodHs['is_real'] != 1)
    {
        $sql = "DELETE FROM " . $ecs->table('virtual_card') . " WHERE goodHs_id = '$goodHs_id'";
        if (!$db->query($sql, 'SILENT') && $db->errno() != 1146)
        {
            die($db->error());
        }
    }

    clear_cache_files();
    $url = 'goodHs.php?act=query&' . str_replace('act=drop_goodHs', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");

    exit;
}

/*------------------------------------------------------ */
//-- 切换商户类型
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'get_attr')
{
    check_authz_json('goodHs_manage');

    $goodHs_id   = empty($_GET['goodHs_id']) ? 0 : intval($_GET['goodHs_id']);
    $goodHs_type = empty($_GET['goodHs_type']) ? 0 : intval($_GET['goodHs_type']);

    $content    = build_attr_html($goodHs_type, $goodHs_id);

    make_json_result($content);
}

/*------------------------------------------------------ */
//-- 删除图片
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'drop_image')
{
    check_authz_json('goodHs_manage');

    $img_id = empty($_REQUEST['img_id']) ? 0 : intval($_REQUEST['img_id']);

    /* 删除图片文件 */
    $sql = "SELECT img_url, thumb_url, img_original " .
            " FROM " . $GLOBALS['ecs']->table('goodHs_gallery') .
            " WHERE img_id = '$img_id'";
    $row = $GLOBALS['db']->getRow($sql);

    if ($row['img_url'] != '' && is_file('../' . $row['img_url']))
    {
        @unlink('../' . $row['img_url']);
    }
    if ($row['thumb_url'] != '' && is_file('../' . $row['thumb_url']))
    {
        @unlink('../' . $row['thumb_url']);
    }
    if ($row['img_original'] != '' && is_file('../' . $row['img_original']))
    {
        @unlink('../' . $row['img_original']);
    }

    /* 删除数据 */
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodHs_gallery') . " WHERE img_id = '$img_id' LIMIT 1";
    $GLOBALS['db']->query($sql);

    clear_cache_files();
    make_json_result($img_id);
}

/*------------------------------------------------------ */
//-- 搜索商户，仅返回名称及ID
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'get_goodHs_list')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    $filters = $json->decode($_GET['JSON']);

    $arr = get_goodHs_list($filters);
    $opt = array();

    foreach ($arr AS $key => $val)
    {
        $opt[] = array('value' => $val['goodHs_id'],
                        'text' => $val['goodHs_name'],
                        'data' => $val['shop_price']);
    }

    make_json_result($opt);
}

/*------------------------------------------------------ */
//-- 把商户加入关联
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'add_link_goodHs')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('goodHs_manage');

    $linked_array   = $json->decode($_GET['add_ids']);
    $linked_goodHs   = $json->decode($_GET['JSON']);
    $goodHs_id       = $linked_goodHs[0];
    $is_double      = $linked_goodHs[1] == true ? 0 : 1;

    foreach ($linked_array AS $val)
    {
        if ($is_double)
        {
            /* 双向关联 */
            $sql = "INSERT INTO " . $ecs->table('link_goodHs') . " (goodHs_id, link_goodHs_id, is_double, admin_id) " .
                    "VALUES ('$val', '$goodHs_id', '$is_double', '$_SESSION[admin_id]')";
            $db->query($sql, 'SILENT');
        }

        $sql = "INSERT INTO " . $ecs->table('link_goodHs') . " (goodHs_id, link_goodHs_id, is_double, admin_id) " .
                "VALUES ('$goodHs_id', '$val', '$is_double', '$_SESSION[admin_id]')";
        $db->query($sql, 'SILENT');
    }

    $linked_goodHs   = get_linked_goodHs($goodHs_id);
    $options        = array();

    foreach ($linked_goodHs AS $val)
    {
        $options[] = array('value'  => $val['goodHs_id'],
                        'text'      => $val['goodHs_name'],
                        'data'      => '');
    }

    clear_cache_files();
    make_json_result($options);
}

/*------------------------------------------------------ */
//-- 删除关联商户
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'drop_link_goodHs')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('goodHs_manage');

    $drop_goodHs     = $json->decode($_GET['drop_ids']);
    $drop_goodHs_ids = db_create_in($drop_goodHs);
    $linked_goodHs   = $json->decode($_GET['JSON']);
    $goodHs_id       = $linked_goodHs[0];
    $is_signle      = $linked_goodHs[1];

    if (!$is_signle)
    {
        $sql = "DELETE FROM " .$ecs->table('link_goodHs') .
                " WHERE link_goodHs_id = '$goodHs_id' AND goodHs_id " . $drop_goodHs_ids;
    }
    else
    {
        $sql = "UPDATE " .$ecs->table('link_goodHs') . " SET is_double = 0 ".
                " WHERE link_goodHs_id = '$goodHs_id' AND goodHs_id " . $drop_goodHs_ids;
    }
    if ($goodHs_id == 0)
    {
        $sql .= " AND admin_id = '$_SESSION[admin_id]'";
    }
    $db->query($sql);

    $sql = "DELETE FROM " .$ecs->table('link_goodHs') .
            " WHERE goodHs_id = '$goodHs_id' AND link_goodHs_id " . $drop_goodHs_ids;
    if ($goodHs_id == 0)
    {
        $sql .= " AND admin_id = '$_SESSION[admin_id]'";
    }
    $db->query($sql);

    $linked_goodHs = get_linked_goodHs($goodHs_id);
    $options      = array();

    foreach ($linked_goodHs AS $val)
    {
        $options[] = array(
                        'value' => $val['goodHs_id'],
                        'text'  => $val['goodHs_name'],
                        'data'  => '');
    }

    clear_cache_files();
    make_json_result($options);
}

/*------------------------------------------------------ */
//-- 增加一个配件
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'add_group_goodHs')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('goodHs_manage');

    $fittings   = $json->decode($_GET['add_ids']);
    $arguments  = $json->decode($_GET['JSON']);
    $goodHs_id   = $arguments[0];
    $price      = $arguments[1];

    foreach ($fittings AS $val)
    {
        $sql = "INSERT INTO " . $ecs->table('group_goodHs') . " (parent_id, goodHs_id, goodHs_price, admin_id) " .
                "VALUES ('$goodHs_id', '$val', '$price', '$_SESSION[admin_id]')";
        $db->query($sql, 'SILENT');
    }

    $arr = get_group_goodHs($goodHs_id);
    $opt = array();

    foreach ($arr AS $val)
    {
        $opt[] = array('value'      => $val['goodHs_id'],
                        'text'      => $val['goodHs_name'],
                        'data'      => '');
    }

    clear_cache_files();
    make_json_result($opt);
}

/*------------------------------------------------------ */
//-- 删除一个配件
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'drop_group_goodHs')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('goodHs_manage');

    $fittings   = $json->decode($_GET['drop_ids']);
    $arguments  = $json->decode($_GET['JSON']);
    $goodHs_id   = $arguments[0];
    $price      = $arguments[1];

    $sql = "DELETE FROM " .$ecs->table('group_goodHs') .
            " WHERE parent_id='$goodHs_id' AND " .db_create_in($fittings, 'goodHs_id');
    if ($goodHs_id == 0)
    {
        $sql .= " AND admin_id = '$_SESSION[admin_id]'";
    }
    $db->query($sql);

    $arr = get_group_goodHs($goodHs_id);
    $opt = array();

    foreach ($arr AS $val)
    {
        $opt[] = array('value'      => $val['goodHs_id'],
                        'text'      => $val['goodHs_name'],
                        'data'      => '');
    }

    clear_cache_files();
    make_json_result($opt);
}

/*------------------------------------------------------ */
//-- 搜索文章
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'get_article_list')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    $filters =(array) $json->decode(json_str_iconv($_GET['JSON']));

    $where = " WHERE cat_id > 0 ";
    if (!empty($filters['title']))
    {
        $keyword  = trim($filters['title']);
        $where   .=  " AND title LIKE '%" . mysql_like_quote($keyword) . "%' ";
    }

    $sql        = 'SELECT article_id, title FROM ' .$ecs->table('article'). $where.
                  'ORDER BY article_id DESC LIMIT 50';
    $res        = $db->query($sql);
    $arr        = array();

    while ($row = $db->fetchRow($res))
    {
        $arr[]  = array('value' => $row['article_id'], 'text' => $row['title'], 'data'=>'');
    }

    make_json_result($arr);
}

/*------------------------------------------------------ */
//-- 添加关联文章
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'add_goodHs_article')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('goodHs_manage');

    $articles   = $json->decode($_GET['add_ids']);
    $arguments  = $json->decode($_GET['JSON']);
    $goodHs_id   = $arguments[0];

    foreach ($articles AS $val)
    {
        $sql = "INSERT INTO " . $ecs->table('goodHs_article') . " (goodHs_id, article_id, admin_id) " .
                "VALUES ('$goodHs_id', '$val', '$_SESSION[admin_id]')";
        $db->query($sql);
    }

    $arr = get_goodHs_articles($goodHs_id);
    $opt = array();

    foreach ($arr AS $val)
    {
        $opt[] = array('value'      => $val['article_id'],
                        'text'      => $val['title'],
                        'data'      => '');
    }

    clear_cache_files();
    make_json_result($opt);
}

/*------------------------------------------------------ */
//-- 删除关联文章
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'drop_goodHs_article')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('goodHs_manage');

    $articles   = $json->decode($_GET['drop_ids']);
    $arguments  = $json->decode($_GET['JSON']);
    $goodHs_id   = $arguments[0];

    $sql = "DELETE FROM " .$ecs->table('goodHs_article') . " WHERE " . db_create_in($articles, "article_id") . " AND goodHs_id = '$goodHs_id'";
    $db->query($sql);

    $arr = get_goodHs_articles($goodHs_id);
    $opt = array();

    foreach ($arr AS $val)
    {
        $opt[] = array('value'      => $val['article_id'],
                        'text'      => $val['title'],
                        'data'      => '');
    }

    clear_cache_files();
    make_json_result($opt);
}

/*------------------------------------------------------ */
//-- 商户列表
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'product_list')
{
    admin_priv('goodHs_manage');

    /* 是否存在商户id */
    if (empty($_GET['goodHs_id']))
    {
        $link[] = array('href' => 'goodHs.php?act=list', 'text' => $_LANG['cannot_found_goodHs']);
        sys_msg($_LANG['cannot_found_goodHs'], 1, $link);
    }
    else
    {
        $goodHs_id = intval($_GET['goodHs_id']);
    }

    /* 取出商户信息 */
    $sql = "SELECT goodHs_sn, goodHs_name, goodHs_type, shop_price FROM " . $ecs->table('goodHs') . " WHERE goodHs_id = '$goodHs_id'";
    $goodHs = $db->getRow($sql);
    if (empty($goodHs))
    {
        $link[] = array('href' => 'goodHs.php?act=list', 'text' => $_LANG['01_goodHs_list']);
        sys_msg($_LANG['cannot_found_goodHs'], 1, $link);
    }
    $smarty->assign('sn', sprintf($_LANG['good_goodHs_sn'], $goodHs['goodHs_sn']));
    $smarty->assign('price', sprintf($_LANG['good_shop_price'], $goodHs['shop_price']));
    $smarty->assign('goodHs_name', sprintf($_LANG['products_title'], $goodHs['goodHs_name']));
    $smarty->assign('goodHs_sn', sprintf($_LANG['products_title_2'], $goodHs['goodHs_sn']));


    /* 获取商户规格列表 */
    $attribute = get_goodHs_specifications_list($goodHs_id);

    if (empty($attribute))
    {
        $link[] = array('href' => 'goodHs.php?act=edit&goodHs_id=' . $goodHs_id, 'text' => $_LANG['edit_goodHs']);
        sys_msg($_LANG['not_exist_goodHs_attr'], 1, $link);
    }
    foreach ($attribute as $attribute_value)
    {
        //转换成数组
        $_attribute[$attribute_value['attr_id']]['attr_values'][] = $attribute_value['attr_value'];
        $_attribute[$attribute_value['attr_id']]['attr_id'] = $attribute_value['attr_id'];
        $_attribute[$attribute_value['attr_id']]['attr_name'] = $attribute_value['attr_name'];
    }

    $attribute_count = count($_attribute);

    $smarty->assign('attribute_count',          $attribute_count);
    $smarty->assign('attribute_count_3',        ($attribute_count + 3));
    $smarty->assign('product_sn',               $goodHs['goodHs_sn'] . '_');
    $smarty->assign('product_number',           $_CFG['default_storage']);

    /* 取商户的货户 */
    $product = product_list($goodHs_id, '');

    //保证属性排序正确
    $attr_list = array();
    foreach($product['product'] as  $item){
        foreach($item['goodHs_attr'] as $k => $attr){
            $attr_list[$k][] = $attr;
        }
    }
    $new_attribute = array();
    foreach($attr_list as $v){
        foreach($_attribute as $val){
            $diff = array_diff($v,$val['attr_values']);
            if(empty($diff)){
                $new_attribute[] =  $val;
            }
        }
    }
    if(empty($new_attribute))$new_attribute = $_attribute;

    $smarty->assign('attribute',                $new_attribute);
    $smarty->assign('ur_here',      $_LANG['18_product_list']);
    $smarty->assign('action_link',  array('href' => 'goodHs.php?act=list', 'text' => $_LANG['01_goodHs_list']));
    $smarty->assign('product_list', $product['product']);
    $smarty->assign('product_null', empty($product['product']) ? 0 : 1);
    $smarty->assign('use_storage',  empty($_CFG['use_storage']) ? 0 : 1);
    $smarty->assign('goodHs_id',     $goodHs_id);
    $smarty->assign('filter',       $product['filter']);
    $smarty->assign('full_page',    1);

    /* 显示商户列表页面 */
    assign_query_info();

    $smarty->display('product_info.htm');
}

/*------------------------------------------------------ */
//-- 货户排序、分页、查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'product_query')
{
    /* 是否存在商户id */
    if (empty($_REQUEST['goodHs_id']))
    {
        make_json_error($_LANG['sys']['wrong'] . $_LANG['cannot_found_goodHs']);
    }
    else
    {
        $goodHs_id = intval($_REQUEST['goodHs_id']);
    }

    /* 取出商户信息 */
    $sql = "SELECT goodHs_sn, goodHs_name, goodHs_type, shop_price FROM " . $ecs->table('goodHs') . " WHERE goodHs_id = '$goodHs_id'";
    $goodHs = $db->getRow($sql);
    if (empty($goodHs))
    {
        make_json_error($_LANG['sys']['wrong'] . $_LANG['cannot_found_goodHs']);
    }
    $smarty->assign('sn', sprintf($_LANG['good_goodHs_sn'], $goodHs['goodHs_sn']));
    $smarty->assign('price', sprintf($_LANG['good_shop_price'], $goodHs['shop_price']));
    $smarty->assign('goodHs_name', sprintf($_LANG['products_title'], $goodHs['goodHs_name']));
    $smarty->assign('goodHs_sn', sprintf($_LANG['products_title_2'], $goodHs['goodHs_sn']));


    /* 获取商户规格列表 */
    $attribute = get_goodHs_specifications_list($goodHs_id);
    if (empty($attribute))
    {
        make_json_error($_LANG['sys']['wrong'] . $_LANG['cannot_found_goodHs']);
    }
    foreach ($attribute as $attribute_value)
    {
        //转换成数组
        $_attribute[$attribute_value['attr_id']]['attr_values'][] = $attribute_value['attr_value'];
        $_attribute[$attribute_value['attr_id']]['attr_id'] = $attribute_value['attr_id'];
        $_attribute[$attribute_value['attr_id']]['attr_name'] = $attribute_value['attr_name'];
    }
    $attribute_count = count($_attribute);

    $smarty->assign('attribute_count',          $attribute_count);
    $smarty->assign('attribute',                $_attribute);
    $smarty->assign('attribute_count_3',        ($attribute_count + 3));
    $smarty->assign('product_sn',               $goodHs['goodHs_sn'] . '_');
    $smarty->assign('product_number',           $_CFG['default_storage']);

    /* 取商户的货户 */
    $product = product_list($goodHs_id, '');

    $smarty->assign('ur_here', $_LANG['18_product_list']);
    $smarty->assign('action_link', array('href' => 'goodHs.php?act=list', 'text' => $_LANG['01_goodHs_list']));
    $smarty->assign('product_list',  $product['product']);
    $smarty->assign('use_storage',  empty($_CFG['use_storage']) ? 0 : 1);
    $smarty->assign('goodHs_id',    $goodHs_id);
    $smarty->assign('filter',       $product['filter']);

    /* 排序标记 */
    $sort_flag  = sort_flag($product['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('product_info.htm'), '',
        array('filter' => $product['filter'], 'page_count' => $product['page_count']));
}

/*------------------------------------------------------ */
//-- 货户删除
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'product_remove')
{
    /* 检查权限 */
    check_authz_json('remove_back');

    /* 是否存在商户id */
    if (empty($_REQUEST['id']))
    {
        make_json_error($_LANG['product_id_null']);
    }
    else
    {
        $product_id = intval($_REQUEST['id']);
    }

    /* 货户库存 */
    $product = get_product_info($product_id, 'product_number, goodHs_id');

    /* 删除货户 */
    $sql = "DELETE FROM " . $ecs->table('products') . " WHERE product_id = '$product_id'";
    $result = $db->query($sql);
    if ($result)
    {
        /* 修改商户库存 */
        if (update_goodHs_stock($product['goodHs_id'], $product_number - $product['product_number']))
        {
            //记录日志
            admin_log('', 'update', 'goodHs');
        }

        //记录日志
        admin_log('', 'trash', 'products');

        $url = 'goodHs.php?act=product_query&' . str_replace('act=product_remove', '', $_SERVER['QUERY_STRING']);

        ecs_header("Location: $url\n");
        exit;
    }
}

/*------------------------------------------------------ */
//-- 修改货户价格
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_product_sn')
{
    check_authz_json('goodHs_manage');

    $product_id       = intval($_POST['id']);
    $product_sn       = json_str_iconv(trim($_POST['val']));
    $product_sn       = ($_LANG['n_a'] == $product_sn) ? '' : $product_sn;

    if (check_product_sn_exist($product_sn, $product_id))
    {
        make_json_error($_LANG['sys']['wrong'] . $_LANG['exist_same_product_sn']);
    }

    /* 修改 */
    $sql = "UPDATE " . $ecs->table('products') . " SET product_sn = '$product_sn' WHERE product_id = '$product_id'";
    $result = $db->query($sql);
    if ($result)
    {
        clear_cache_files();
        make_json_result($product_sn);
    }
}

/*------------------------------------------------------ */
//-- 修改货户库存
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_product_number')
{
    check_authz_json('goodHs_manage');

    $product_id       = intval($_POST['id']);
    $product_number       = intval($_POST['val']);

    /* 货户库存 */
    $product = get_product_info($product_id, 'product_number, goodHs_id');

    /* 修改货户库存 */
    $sql = "UPDATE " . $ecs->table('products') . " SET product_number = '$product_number' WHERE product_id = '$product_id'";
    $result = $db->query($sql);
    if ($result)
    {
        /* 修改商户库存 */
        if (update_goodHs_stock($product['goodHs_id'], $product_number - $product['product_number']))
        {
            clear_cache_files();
            make_json_result($product_number);
        }
    }
}

/*------------------------------------------------------ */
//-- 货户添加 执行
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'product_add_execute')
{
    admin_priv('goodHs_manage');

    $product['goodHs_id']        = intval($_POST['goodHs_id']);
    $product['attr']            = $_POST['attr'];
    $product['product_sn']      = $_POST['product_sn'];
    $product['product_number']  = $_POST['product_number'];

    /* 是否存在商户id */
    if (empty($product['goodHs_id']))
    {
        sys_msg($_LANG['sys']['wrong'] . $_LANG['cannot_found_goodHs'], 1, array(), false);
    }

    /* 判断是否为初次添加 */
    $insert = true;
    if (product_number_count($product['goodHs_id']) > 0)
    {
        $insert = false;
    }

    /* 取出商户信息 */
    $sql = "SELECT goodHs_sn, goodHs_name, goodHs_type, shop_price FROM " . $ecs->table('goodHs') . " WHERE goodHs_id = '" . $product['goodHs_id'] . "'";
    $goodHs = $db->getRow($sql);
    if (empty($goodHs))
    {
        sys_msg($_LANG['sys']['wrong'] . $_LANG['cannot_found_goodHs'], 1, array(), false);
    }

    /*  */
    foreach($product['product_sn'] as $key => $value)
    {
        //过滤
        $product['product_number'][$key] = empty($product['product_number'][$key]) ? (empty($_CFG['use_storage']) ? 0 : $_CFG['default_storage']) : trim($product['product_number'][$key]); //库存

        //获取规格在商户属性表中的id
        foreach($product['attr'] as $attr_key => $attr_value)
        {
            /* 检测：如果当前所添加的货户规格存在空值或0 */
            if (empty($attr_value[$key]))
            {
                continue 2;
            }

            $is_spec_list[$attr_key] = 'true';

            $value_price_list[$attr_key] = $attr_value[$key] . chr(9) . ''; //$key，当前

            $id_list[$attr_key] = $attr_key;
        }
        $goodHs_attr_id = handle_goodHs_attr($product['goodHs_id'], $id_list, $is_spec_list, $value_price_list);

        /* 是否为重复规格的货户 */
        $goodHs_attr = sort_goodHs_attr_id_array($goodHs_attr_id);
        $goodHs_attr = implode('|', $goodHs_attr['sort']);
        if (check_goodHs_attr_exist($goodHs_attr, $product['goodHs_id']))
        {
            continue;
            //sys_msg($_LANG['sys']['wrong'] . $_LANG['exist_same_goodHs_attr'], 1, array(), false);
        }
        //货户号不为空
        if (!empty($value))
        {
            /* 检测：货户货号是否在商户表和货户表中重复 */
            if (check_goodHs_sn_exist($value))
            {
                continue;
                //sys_msg($_LANG['sys']['wrong'] . $_LANG['exist_same_goodHs_sn'], 1, array(), false);
            }
            if (check_product_sn_exist($value))
            {
                continue;
                //sys_msg($_LANG['sys']['wrong'] . $_LANG['exist_same_product_sn'], 1, array(), false);
            }
        }

        /* 插入货户表 */
        $sql = "INSERT INTO " . $GLOBALS['ecs']->table('products') . " (goodHs_id, goodHs_attr, product_sn, product_number)  VALUES ('" . $product['goodHs_id'] . "', '$goodHs_attr', '$value', '" . $product['product_number'][$key] . "')";
        if (!$GLOBALS['db']->query($sql))
        {
            continue;
            //sys_msg($_LANG['sys']['wrong'] . $_LANG['cannot_add_products'], 1, array(), false);
        }

        //货户号为空 自动补货户号
        if (empty($value))
        {
            $sql = "UPDATE " . $GLOBALS['ecs']->table('products') . "
                    SET product_sn = '" . $goodHs['goodHs_sn'] . "g_p" . $GLOBALS['db']->insert_id() . "'
                    WHERE product_id = '" . $GLOBALS['db']->insert_id() . "'";
            $GLOBALS['db']->query($sql);
        }

        /* 修改商户表库存 */
        $product_count = product_number_count($product['goodHs_id']);
        if (update_goodHs($product['goodHs_id'], 'goodHs_number', $product_count))
        {
            //记录日志
            admin_log($product['goodHs_id'], 'update', 'goodHs');
        }
    }

    clear_cache_files();

    /* 返回 */
    if ($insert)
    {
         $link[] = array('href' => 'goodHs.php?act=add', 'text' => $_LANG['02_goodHs_add']);
         $link[] = array('href' => 'goodHs.php?act=list', 'text' => $_LANG['01_goodHs_list']);
         $link[] = array('href' => 'goodHs.php?act=product_list&goodHs_id=' . $product['goodHs_id'], 'text' => $_LANG['18_product_list']);
    }
    else
    {
         $link[] = array('href' => 'goodHs.php?act=list&uselastfilter=1', 'text' => $_LANG['01_goodHs_list']);
         $link[] = array('href' => 'goodHs.php?act=edit&goodHs_id=' . $product['goodHs_id'], 'text' => $_LANG['edit_goodHs']);
         $link[] = array('href' => 'goodHs.php?act=product_list&goodHs_id=' . $product['goodHs_id'], 'text' => $_LANG['18_product_list']);
    }
    sys_msg($_LANG['save_products'], 0, $link);
}

/*------------------------------------------------------ */
//-- 货户批量操作
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'batch_product')
{
    /* 定义返回 */
    $link[] = array('href' => 'goodHs.php?act=product_list&goodHs_id=' . $_POST['goodHs_id'], 'text' => $_LANG['item_list']);

    /* 批量操作 - 批量删除 */
    if ($_POST['type'] == 'drop')
    {
        //检查权限
        admin_priv('remove_back');

        //取得要操作的商户编号
        $product_id = !empty($_POST['checkboxes']) ? join(',', $_POST['checkboxes']) : 0;
        $product_bound = db_create_in($product_id);

        //取出货户库存总数
        $sum = 0;
        $goodHs_id = 0;
        $sql = "SELECT product_id, goodHs_id, product_number FROM  " . $GLOBALS['ecs']->table('products') . " WHERE product_id $product_bound";
        $product_array = $GLOBALS['db']->getAll($sql);
        if (!empty($product_array))
        {
            foreach ($product_array as $value)
            {
                $sum += $value['product_number'];
            }
            $goodHs_id = $product_array[0]['goodHs_id'];

            /* 删除货户 */
            $sql = "DELETE FROM " . $ecs->table('products') . " WHERE product_id $product_bound";
            if ($db->query($sql))
            {
                //记录日志
                admin_log('', 'delete', 'products');
            }

            /* 修改商户库存 */
            if (update_goodHs_stock($goodHs_id, -$sum))
            {
                //记录日志
                admin_log('', 'update', 'goodHs');
            }

            /* 返回 */
            sys_msg($_LANG['product_batch_del_success'], 0, $link);
        }
        else
        {
            /* 错误 */
            sys_msg($_LANG['cannot_found_products'], 1, $link);
        }
    }

    /* 返回 */
    sys_msg($_LANG['no_operation'], 1, $link);
}
/*------------------------------------------------------ */
//-- 修改商户虚拟数量
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_virtual_sales')
{
    check_authz_json('goodHs_manage');

    $goodHs_id   = intval($_POST['id']);
    $virtual_sales  = intval($_POST['val']);

    if($virtual_sales < 0 || $virtual_sales == 0 && $_POST['val'] != "$virtual_sales")
    {
        make_json_error($_LANG['virtual_sales_error']);
    }

    if(check_goodHs_product_exist($goodHs_id) == 1)
    {
        make_json_error($_LANG['sys']['wrong'] . $_LANG['cannot_goodHs_number']);
    }

    if ($exc->edit("virtual_sales = '$virtual_sales', last_update=" .gmtime(), $goodHs_id))
    {
        clear_cache_files();
        make_json_result($virtual_sales);
    }
}

/**
 * 列表链接
 * @param   bool    $is_add         是否添加（插入）
 * @param   string  $extension_code 虚拟商户扩展代码，实体商户为空
 * @return  array('href' => $href, 'text' => $text)
 */
function list_link($is_add = true, $extension_code = '')
{
    $href = 'goodHs.php?act=list';
    if (!empty($extension_code))
    {
        $href .= '&extension_code=' . $extension_code;
    }
    if (!$is_add)
    {
        $href .= '&' . list_link_postfix();
    }

    if ($extension_code == 'virtual_card')
    {
        $text = $GLOBALS['_LANG']['50_virtual_card_list'];
    }
    else
    {
        $text = $GLOBALS['_LANG']['01_goodHs_list'];
    }

    return array('href' => $href, 'text' => $text);
}

/**
 * 添加链接
 * @param   string  $extension_code 虚拟商户扩展代码，实体商户为空
 * @return  array('href' => $href, 'text' => $text)
 */
function add_link($extension_code = '')
{
    $href = 'goodHs.php?act=add';
    if (!empty($extension_code))
    {
        $href .= '&extension_code=' . $extension_code;
    }

    if ($extension_code == 'virtual_card')
    {
        $text = $GLOBALS['_LANG']['51_virtual_card_add'];
    }
    else
    {
        $text = $GLOBALS['_LANG']['02_goodHs_add'];
    }

    return array('href' => $href, 'text' => $text);
}

/**
 * 检查图片网址是否合法
 *
 * @param string $url 网址
 *
 * @return boolean
 */
function goodHs_parse_url($url)
{
    $parse_url = @parse_url($url);
    return (!empty($parse_url['scheme']) && !empty($parse_url['host']));
}

/**
 * 保存某商户的优惠价格
 * @param   int     $goodHs_id    商户编号
 * @param   array   $number_list 优惠数量列表
 * @param   array   $price_list  价格列表
 * @return  void
 */
function handle_volume_price($goodHs_id, $number_list, $price_list)
{
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('volume_price') .
           " WHERE price_type = '1' AND goodHs_id = '$goodHs_id'";
    $GLOBALS['db']->query($sql);


    /* 循环处理每个优惠价格 */
    foreach ($price_list AS $key => $price)
    {
        /* 价格对应的数量上下限 */
        $volume_number = $number_list[$key];

        if (!empty($price))
        {
            $sql = "INSERT INTO " . $GLOBALS['ecs']->table('volume_price') .
                   " (price_type, goodHs_id, volume_number, volume_price) " .
                   "VALUES ('1', '$goodHs_id', '$volume_number', '$price')";
            $GLOBALS['db']->query($sql);
        }
    }
}

/**
 * 修改商户库存
 * @param   string  $goodHs_id   商户编号，可以为多个，用 ',' 隔开
 * @param   string  $value      字段值
 * @return  bool
 */
function update_goodHs_stock($goodHs_id, $value)
{
    if ($goodHs_id)
    {
        /* $res = $goodHs_number - $old_product_number + $product_number; */
        $sql = "UPDATE " . $GLOBALS['ecs']->table('goodHs') . "
                SET goodHs_number = goodHs_number + $value,
                    last_update = '". gmtime() ."'
                WHERE goodHs_id = '$goodHs_id'";
        $result = $GLOBALS['db']->query($sql);

        /* 清除缓存 */
        clear_cache_files();

        return $result;
    }
    else
    {
        return false;
    }
}
?>