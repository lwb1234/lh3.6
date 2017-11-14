<?php

/**
 * ECSHOP 管理中心商户1相关函数
 * ============================================================================
 * by lee  ************* 先注释掉某种功能以后需要在添加
 */

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

/**
 * 取得推荐类型列表   ***************推荐类型
 * @return  array   推荐类型列表
 */
//function get_intro_list()
//{
//    return array(
//        'is_best'    => $GLOBALS['_LANG']['is_best'],
//        'is_new'     => $GLOBALS['_LANG']['is_new'],
//        'is_hot'     => $GLOBALS['_LANG']['is_hot'],
//        'is_promote' => $GLOBALS['_LANG']['is_promote'],
//        'all_type' => $GLOBALS['_LANG']['all_type'],
//    );
//}

/**
 * 取得重量单位列表    ***************得重量单位列表
 * @return  array   重量单位列表
 */
//function get_unit_list()
//{
//    return array(
//        '1'     => $GLOBALS['_LANG']['unit_kg'],
//        '0.001' => $GLOBALS['_LANG']['unit_g'],
//    );
//}

/**
 * 取得会员等级列表
 * @return  array   会员等级列表
 */
//function get_user_rank_list()
//{
//    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('user_rank') .
//           " ORDER BY min_points";
//
//    return $GLOBALS['db']->getAll($sql);
//}

/**
 * 取得某商户的会员价格列表       **********  取得某商户的会员价格列表
 * @param   int     $goodHs_id   商户编号
 * @return  array   会员价格列表 user_rank => user_price
 */
//function get_member_price_list($goodHs_id)
//{
//    /* 取得会员价格 */
//    $price_list = array();
//    $sql = "SELECT user_rank, user_price FROM " .
//           $GLOBALS['ecs']->table('member_price') .
//           " WHERE goodHs_id = '$goodHs_id'";
//    $res = $GLOBALS['db']->query($sql);
//    while ($row = $GLOBALS['db']->fetchRow($res))
//    {
//        $price_list[$row['user_rank']] = $row['user_price'];
//    }
//
//    return $price_list;
//}

/**
 * 插入或更新商户属性
 *
 * @param   int     $goodHs_id           商户编号
 * @param   array   $id_list            属性编号数组
 * @param   array   $is_spec_list       是否规格数组 'true' | 'false'
 * @param   array   $value_price_list   属性值数组
 * @return  array                       返回受到影响的goodHs_attr_id数组
 */
function handle_goodHs_attr($goodHs_id, $id_list, $is_spec_list, $value_price_list)
{
    $goodHs_attr_id = array();

    /* 循环处理每个属性 */
    foreach ($id_list AS $key => $id)
    {
        $is_spec = $is_spec_list[$key];
        if ($is_spec == 'false')
        {
            $value = $value_price_list[$key];
            $price = '';
        }
        else
        {
            $value_list = array();
            $price_list = array();
            if ($value_price_list[$key])
            {
                $vp_list = explode(chr(13), $value_price_list[$key]);
                foreach ($vp_list AS $v_p)
                {
                    $arr = explode(chr(9), $v_p);
                    $value_list[] = $arr[0];
                    $price_list[] = $arr[1];
                }
            }
            $value = join(chr(13), $value_list);
            $price = join(chr(13), $price_list);
        }

        // 插入或更新记录
        $sql = "SELECT goodHs_attr_id FROM " . $GLOBALS['ecs']->table('goodHs_attr') . " WHERE goodHs_id = '$goodHs_id' AND attr_id = '$id' AND attr_value = '$value' LIMIT 0, 1";
        $result_id = $GLOBALS['db']->getOne($sql);
        if (!empty($result_id))
        {
            $sql = "UPDATE " . $GLOBALS['ecs']->table('goodHs_attr') . "
                    SET attr_value = '$value'
                    WHERE goodHs_id = '$goodHs_id'
                    AND attr_id = '$id'
                    AND goodHs_attr_id = '$result_id'";

            $goodHs_attr_id[$id] = $result_id;
        }
        else
        {
            $sql = "INSERT INTO " . $GLOBALS['ecs']->table('goodHs_attr') . " (goodHs_id, attr_id, attr_value, attr_price) " .
                    "VALUES ('$goodHs_id', '$id', '$value', '$price')";
        }

        $GLOBALS['db']->query($sql);

        if ($goodHs_attr_id[$id] == '')
        {
            $goodHs_attr_id[$id] = $GLOBALS['db']->insert_id();
        }
    }

    return $goodHs_attr_id;
}


/**
 * 保存某商户的会员价格          **********************
 * @param   int     $goodHs_id   商户编号
 * @param   array   $rank_list  等级列表
 * @param   array   $price_list 价格列表
 * @return  void
 */
//function handle_member_price($goodHs_id, $rank_list, $price_list)
//{
//    /* 循环处理每个会员等级 */
//    foreach ($rank_list AS $key => $rank)
//    {
//        /* 会员等级对应的价格 */
//        $price = $price_list[$key];
//
//        // 插入或更新记录
//        $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('member_price') .
//               " WHERE goodHs_id = '$goodHs_id' AND user_rank = '$rank'";
//        if ($GLOBALS['db']->getOne($sql) > 0)
//        {
//            /* 如果会员价格是小于0则删除原来价格，不是则更新为新的价格 */
//            if ($price < 0)
//            {
//                $sql = "DELETE FROM " . $GLOBALS['ecs']->table('member_price') .
//                       " WHERE goodHs_id = '$goodHs_id' AND user_rank = '$rank' LIMIT 1";
//            }
//            else
//            {
//                $sql = "UPDATE " . $GLOBALS['ecs']->table('member_price') .
//                       " SET user_price = '$price' " .
//                       "WHERE goodHs_id = '$goodHs_id' " .
//                       "AND user_rank = '$rank' LIMIT 1";
//            }
//        }
//        else
//        {
//            if ($price == -1)
//            {
//                $sql = '';
//            }
//            else
//            {
//                $sql = "INSERT INTO " . $GLOBALS['ecs']->table('member_price') . " (goodHs_id, user_rank, user_price) " .
//                       "VALUES ('$goodHs_id', '$rank', '$price')";
//            }
//        }
//
//        if ($sql)
//        {
//            $GLOBALS['db']->query($sql);
//        }
//    }
//}

/**
 * 保存某商户的扩展分类           *****************
 * @param   int     $goodHs_id   商户编号
 * @param   array   $cat_list   分类编号数组
 * @return  void
 */
//function handle_other_cat($goodHs_id, $cat_list)
//{
//    /* 查询现有的扩展分类 */
//    $sql = "SELECT cat_id FROM " . $GLOBALS['ecs']->table('goodHs_cat') .
//            " WHERE goodHs_id = '$goodHs_id'";
//    $exist_list = $GLOBALS['db']->getCol($sql);
//
//    /* 删除不再有的分类 */
//    $delete_list = array_diff($exist_list, $cat_list);
//    if ($delete_list)
//    {
//        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodHs_cat') .
//                " WHERE goodHs_id = '$goodHs_id' " .
//                "AND cat_id " . db_create_in($delete_list);
//        $GLOBALS['db']->query($sql);
//    }
//
//    /* 添加新加的分类 */
//    $add_list = array_diff($cat_list, $exist_list, array(0));
//    foreach ($add_list AS $cat_id)
//    {
//        // 插入记录
//        $sql = "INSERT INTO " . $GLOBALS['ecs']->table('goodHs_cat') .
//                " (goodHs_id, cat_id) " .
//                "VALUES ('$goodHs_id', '$cat_id')";
//        $GLOBALS['db']->query($sql);
//    }
//}

/**
 * 保存某商户的关联商户 ***********
 * @param   int     $goodHs_id
 * @return  void
 */
//function handle_link_goodHs($goodHs_id)
//{
//    $sql = "UPDATE " . $GLOBALS['ecs']->table('link_goodHs') . " SET " .
//            " goodHs_id = '$goodHs_id' " .
//            " WHERE goodHs_id = '0'" .
//            " AND admin_id = '$_SESSION[admin_id]'";
//    $GLOBALS['db']->query($sql);
//
//    $sql = "UPDATE " . $GLOBALS['ecs']->table('link_goodHs') . " SET " .
//            " link_goodHs_id = '$goodHs_id' " .
//            " WHERE link_goodHs_id = '0'" .
//            " AND admin_id = '$_SESSION[admin_id]'";
//    $GLOBALS['db']->query($sql);
//}

/**
 * 保存某商户的配件           ***********
 * @param   int     $goodHs_id
 * @return  void
 */
//function handle_group_goodHs($goodHs_id)
//{
//    $sql = "UPDATE " . $GLOBALS['ecs']->table('group_goodHs') . " SET " .
//            " parent_id = '$goodHs_id' " .
//            " WHERE parent_id = '0'" .
//            " AND admin_id = '$_SESSION[admin_id]'";
//    $GLOBALS['db']->query($sql);
//}

/**
 * 保存某商户的关联文章  *************
 * @param   int     $goodHs_id
 * @return  void
 */
//function handle_goodHs_article($goodHs_id)
//{
//    $sql = "UPDATE " . $GLOBALS['ecs']->table('goodHs_article') . " SET " .
//            " goodHs_id = '$goodHs_id' " .
//            " WHERE goodHs_id = '0'" .
//            " AND admin_id = '$_SESSION[admin_id]'";
//    $GLOBALS['db']->query($sql);
//}

/**
 * 保存某商户的相册图片
 * @param   int     $goodHs_id
 * @param   array   $image_files
 * @param   array   $image_descs
 * @return  void
 */
function handle_gallery_image($goodHs_id, $image_files, $image_descs, $image_urls)
{
    /* 是否处理缩略图 */
    $proc_thumb = (isset($GLOBALS['shop_id']) && $GLOBALS['shop_id'] > 0)? false : true;
    foreach ($image_descs AS $key => $img_desc)
    {
        /* 是否成功上传 */
        $flag = false;
        if (isset($image_files['error']))
        {
            if ($image_files['error'][$key] == 0)
            {
                $flag = true;
            }
        }
        else
        {
            if ($image_files['tmp_name'][$key] != 'none')
            {
                $flag = true;
            }
        }

        if ($flag)
        {
            // 生成缩略图
            if ($proc_thumb)
            {
                $thumb_url = $GLOBALS['image']->make_thumb($image_files['tmp_name'][$key], $GLOBALS['_CFG']['thumb_width'],  $GLOBALS['_CFG']['thumb_height']);
                $thumb_url = is_string($thumb_url) ? $thumb_url : '';
            }

            $upload = array(
                'name' => $image_files['name'][$key],
                'type' => $image_files['type'][$key],
                'tmp_name' => $image_files['tmp_name'][$key],
                'size' => $image_files['size'][$key],
            );
            if (isset($image_files['error']))
            {
                $upload['error'] = $image_files['error'][$key];
            }
            $img_original = $GLOBALS['image']->upload_image($upload);
            if ($img_original === false)
            {
                sys_msg($GLOBALS['image']->error_msg(), 1, array(), false);
            }
            $img_url = $img_original;

            if (!$proc_thumb)
            {
                $thumb_url = $img_original;
            }
            // 如果服务器支持GD 则添加水印
            if ($proc_thumb && gd_version() > 0)
            {
                $pos        = strpos(basename($img_original), '.');
                $newname    = dirname($img_original) . '/' . $GLOBALS['image']->random_filename() . substr(basename($img_original), $pos);
                copy('../' . $img_original, '../' . $newname);
                $img_url    = $newname;

                $GLOBALS['image']->add_watermark('../'.$img_url,'',$GLOBALS['_CFG']['watermark'], $GLOBALS['_CFG']['watermark_place'], $GLOBALS['_CFG']['watermark_alpha']);
            }

            /* 重新格式化图片名称 */
            $img_original = reformat_image_name('gallery', $goodHs_id, $img_original, 'source');
            $img_url = reformat_image_name('gallery', $goodHs_id, $img_url, 'goodHs');
            $thumb_url = reformat_image_name('gallery_thumb', $goodHs_id, $thumb_url, 'thumb');
            $sql = "INSERT INTO " . $GLOBALS['ecs']->table('goodHs_gallery') . " (goodHs_id, img_url, img_desc, thumb_url, img_original) " .
                    "VALUES ('$goodHs_id', '$img_url', '$img_desc', '$thumb_url', '$img_original')";
            $GLOBALS['db']->query($sql);
            /* 不保留商户原图的时候删除原图 */
            if ($proc_thumb && !$GLOBALS['_CFG']['retain_original_img'] && !empty($img_original))
            {
                $GLOBALS['db']->query("UPDATE " . $GLOBALS['ecs']->table('goodHs_gallery') . " SET img_original='' WHERE `goodHs_id`='{$goodHs_id}'");
                @unlink('../' . $img_original);
            }
        }
        elseif (!empty($image_urls[$key]) && ($image_urls[$key] != $GLOBALS['_LANG']['img_file']) && ($image_urls[$key] != 'http://') && copy(trim($image_urls[$key]), ROOT_PATH . 'temp/' . basename($image_urls[$key])))
        {
            $image_url = trim($image_urls[$key]);

            //定义原图路径
            $down_img = ROOT_PATH . 'temp/' . basename($image_url);

            // 生成缩略图
            if ($proc_thumb)
            {
                $thumb_url = $GLOBALS['image']->make_thumb($down_img, $GLOBALS['_CFG']['thumb_width'],  $GLOBALS['_CFG']['thumb_height']);
                $thumb_url = is_string($thumb_url) ? $thumb_url : '';
                $thumb_url = reformat_image_name('gallery_thumb', $goodHs_id, $thumb_url, 'thumb');
            }

            if (!$proc_thumb)
            {
                $thumb_url = htmlspecialchars($image_url);
            }

            /* 重新格式化图片名称 */
            $img_url = $img_original = htmlspecialchars($image_url);
            $sql = "INSERT INTO " . $GLOBALS['ecs']->table('goodHs_gallery') . " (goodHs_id, img_url, img_desc, thumb_url, img_original) " .
                    "VALUES ('$goodHs_id', '$img_url', '$img_desc', '$thumb_url', '$img_original')";
            $GLOBALS['db']->query($sql);

            @unlink($down_img);
        }
    }
}

/**
 * 修改商户某字段值
 * @param   string  $goodHs_id   商户编号，可以为多个，用 ',' 隔开
 * @param   string  $field      字段名
 * @param   string  $value      字段值
 * @return  bool
 */
function update_goodHs($goodHs_id, $field, $value)
{
    if ($goodHs_id)
    {
        /* 清除缓存 */
        clear_cache_files();

        $sql = "UPDATE " . $GLOBALS['ecs']->table('goodHs') .
                " SET $field = '$value' , last_update = '". gmtime() ."' " .
                "WHERE goodHs_id " . db_create_in($goodHs_id);
        return $GLOBALS['db']->query($sql);
    }
    else
    {
        return false;
    }
}

/**
 * 从回收站删除多个商户
 * @param   mix     $goodHsH_id   商户id列表：可以逗号格开，也可以是数组
 * @return  void
 */
function delete_goodHs($goodHs_id)
{
    if (empty($goodHs_id))
    {
        return;
    }

    /* 取得有效商户id */
    $sql = "SELECT DISTINCT goodHs_id FROM " . $GLOBALS['ecs']->table('goodHs') .
            " WHERE goodHs_id " . db_create_in($goodHs_id) . " AND is_delete = 1";
    $goodHs_id = $GLOBALS['db']->getCol($sql);
    if (empty($goodHs_id))
    {
        return;
    }

    /* 删除商户图片和轮播图片文件 */
    $sql = "SELECT goodHs_thumb, goodHs_img, original_img " .
            "FROM " . $GLOBALS['ecs']->table('goodHs') .
            " WHERE goodHs_id " . db_create_in($goodHs_id);
    $res = $GLOBALS['db']->query($sql);
    while ($goodHs = $GLOBALS['db']->fetchRow($res))
    {
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
    }

    /* 删除商户 */
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodHs') .
            " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);

    /* 删除商户的货户记录 */
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('products') .
            " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);

    /* 删除商户相册的图片文件 */
    $sql = "SELECT img_url, thumb_url, img_original " .
            "FROM " . $GLOBALS['ecs']->table('goodHs_gallery') .
            " WHERE goodHs_id " . db_create_in($goodHs_id);
    $res = $GLOBALS['db']->query($sql);
    while ($row = $GLOBALS['db']->fetchRow($res))
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

    /* 删除商户相册 */
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodHs_gallery') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);

    /* 删除相关表记录 */
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('collect_goodHs') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodHs_article') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodHs_attr') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goodHs_cat') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('member_price') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('group_goodHs') . " WHERE parent_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('group_goodHs') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('link_goodHs') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('link_goodHs') . " WHERE link_goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('tag') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('comment') . " WHERE comment_type = 0 AND id_value " . db_create_in($goodHs_id);
    $GLOBALS['db']->query($sql);

    /* 删除相应虚拟商户记录 */
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('virtual_card') . " WHERE goodHs_id " . db_create_in($goodHs_id);
    if (!$GLOBALS['db']->query($sql, 'SILENT') && $GLOBALS['db']->errno() != 1146)
    {
        die($GLOBALS['db']->error());
    }

    /* 清除缓存 */
    clear_cache_files();
}

/**
 * 为某商户生成唯一的货号 ************
 * @param   int     $goodHs_id   商户编号
 * @return  string  唯一的货号
 */
//function generate_goodHs_sn($goodHs_id)
//{
//    $goodHs_sn = $GLOBALS['_CFG']['sn_prefix'] . str_repeat('0', 6 - strlen($goodHs_id)) . $goodHs_id;
//
//    $sql = "SELECT goodHs_sn FROM " . $GLOBALS['ecs']->table('goodHs') .
//            " WHERE goodHs_sn LIKE '" . mysql_like_quote($goodHs_sn) . "%' AND goodHs_id <> '$goodHs_id' " .
//            " ORDER BY LENGTH(goodHs_sn) DESC";
//    $sn_list = $GLOBALS['db']->getCol($sql);
//    if (in_array($goodHs_sn, $sn_list))
//    {
//        $max = pow(10, strlen($sn_list[0]) - strlen($goodHs_sn) + 1) - 1;
//        $new_sn = $goodHs_sn . mt_rand(0, $max);
//        while (in_array($new_sn, $sn_list))
//        {
//            $new_sn = $goodHs_sn . mt_rand(0, $max);
//        }
//        $goodHs_sn = $new_sn;
//    }
//
//    return $goodHs_sn;
//}

/**
 * 商户货号是否重复
 *
 * @param   string     $goodHs_sn        商户货号；请在传入本参数前对本参数进行SQl脚本过滤
 * @param   int        $goodHs_id        商户id；默认值为：0，没有商户id
 * @return  bool                        true，重复；false，不重复
 */
function check_goodHs_sn_exist($goodHs_sn, $goodHs_id = 0)
{
    $goodHs_sn = trim($goodHs_sn);
    $goodHs_id = intval($goodHs_id);
    if (strlen($goodHs_sn) == 0)
    {
        return true;    //重复
    }

    if (empty($goodHs_id))
    {
        $sql = "SELECT goodHs_id FROM " . $GLOBALS['ecs']->table('goodHs') ."
                WHERE goodHs_sn = '$goodHs_sn'";
    }
    else
    {
        $sql = "SELECT goodHs_id FROM " . $GLOBALS['ecs']->table('goodHs') ."
                WHERE goodHs_sn = '$goodHs_sn'
                AND goodHs_id <> '$goodHs_id'";
    }

    $res = $GLOBALS['db']->getOne($sql);

    if (empty($res))
    {
        return false;    //不重复
    }
    else
    {
        return true;    //重复
    }

}

/**
 * 取得通用属性和某分类的属性，以及某商户的属性值
 * @param   int     $cat_id     分类编号
 * @param   int     $goodHs_id   商户编号
 * @return  array   规格与属性列表
 */
function get_attr_list($cat_id, $goodHs_id = 0)
{
    if (empty($cat_id))
    {
        return array();
    }

    // 查询属性值及商户的属性值
    $sql = "SELECT a.attr_id, a.attr_name, a.attr_input_type, a.attr_type, a.attr_values, v.attr_value, v.attr_price ".
            "FROM " .$GLOBALS['ecs']->table('attribute'). " AS a ".
            "LEFT JOIN " .$GLOBALS['ecs']->table('goodHs_attr'). " AS v ".
            "ON v.attr_id = a.attr_id AND v.goodHs_id = '$goodHs_id' ".
            "WHERE a.cat_id = " . intval($cat_id) ." OR a.cat_id = 0 ".
            "ORDER BY a.sort_order, a.attr_type, a.attr_id, v.attr_price, v.goodHs_attr_id";

    $row = $GLOBALS['db']->GetAll($sql);

    return $row;
}

/**
 * 获取商户类型中包含规格的类型列表
 *
 * @access  public
 * @return  array
 */
function get_goodHs_type_specifications()
{
    // 查询
    $sql = "SELECT DISTINCT cat_id
            FROM " .$GLOBALS['ecs']->table('attribute'). "
            WHERE attr_type = 1";
    $row = $GLOBALS['db']->GetAll($sql);

    $return_arr = array();
    if (!empty($row))
    {
        foreach ($row as $value)
        {
            $return_arr[$value['cat_id']] = $value['cat_id'];
        }
    }
    return $return_arr;
}

/**
 * 根据属性数组创建属性的表单
 *
 * @access  public
 * @param   int     $cat_id     分类编号
 * @param   int     $goodHs_id   商户编号
 * @return  string
 */
function build_attr_html($cat_id, $goodHs_id = 0)
{
    $attr = get_attr_list($cat_id, $goodHs_id);
    $html = '<table width="100%" id="attrTable">';
    $spec = 0;

    foreach ($attr AS $key => $val)
    {
        $html .= "<tr><td class='label'>";
        if ($val['attr_type'] == 1 || $val['attr_type'] == 2)
        {
            $html .= ($spec != $val['attr_id']) ?
                "<a href='javascript:;' onclick='addSpec(this)'>[+]</a>" :
                "<a href='javascript:;' onclick='removeSpec(this)'>[-]</a>";
            $spec = $val['attr_id'];
        }

        $html .= "$val[attr_name]</td><td><input type='hidden' name='attr_id_list[]' value='$val[attr_id]' />";

        if ($val['attr_input_type'] == 0)
        {
            $html .= '<input name="attr_value_list[]" type="text" value="' .htmlspecialchars($val['attr_value']). '" size="40" /> ';
        }
        elseif ($val['attr_input_type'] == 2)
        {
            $html .= '<textarea name="attr_value_list[]" rows="3" cols="40">' .htmlspecialchars($val['attr_value']). '</textarea>';
        }
        else
        {
            $html .= '<select name="attr_value_list[]">';
            $html .= '<option value="">' .$GLOBALS['_LANG']['select_please']. '</option>';

            $attr_values = explode("\n", $val['attr_values']);

            foreach ($attr_values AS $opt)
            {
                $opt    = trim(htmlspecialchars($opt));

                $html   .= ($val['attr_value'] != $opt) ?
                    '<option value="' . $opt . '">' . $opt . '</option>' :
                    '<option value="' . $opt . '" selected="selected">' . $opt . '</option>';
            }
            $html .= '</select> ';
        }

        $html .= ($val['attr_type'] == 1 || $val['attr_type'] == 2) ?
            $GLOBALS['_LANG']['spec_price'].' <input type="text" name="attr_price_list[]" value="' . $val['attr_price'] . '" size="5" maxlength="10" />' :
            ' <input type="hidden" name="attr_price_list[]" value="0" />';

        $html .= '</td></tr>';
    }

    $html .= '</table>';

    return $html;
}

/**
 * 获得指定商户相关的商户
 *
 * @access  public
 * @param   integer $goodHs_id
 * @return  array
 */
function get_linked_goodHs($goodHs_id)
{
    $sql = "SELECT lg.link_goodHs_id AS goodHs_id, g.goodHs_name, lg.is_double " .
            "FROM " . $GLOBALS['ecs']->table('link_goodHs') . " AS lg, " .
                $GLOBALS['ecs']->table('goodHs') . " AS g " .
            "WHERE lg.goodHs_id = '$goodHs_id' " .
            "AND lg.link_goodHs_id = g.goodHs_id ";
    if ($goodHs_id == 0)
    {
        $sql .= " AND lg.admin_id = '$_SESSION[admin_id]'";
    }
    $row = $GLOBALS['db']->getAll($sql);

    foreach ($row AS $key => $val)
    {
        $linked_type = $val['is_double'] == 0 ? $GLOBALS['_LANG']['single'] : $GLOBALS['_LANG']['double'];

        $row[$key]['goodHs_name'] = $val['goodHs_name'] . " -- [$linked_type]";

        unset($row[$key]['is_double']);
    }

    return $row;
}

/**
 * 获得指定商户的配件
 *
 * @access  public
 * @param   integer $goodHs_id
 * @return  array
 */
function get_group_goodHs($goodHs_id)
{
    $sql = "SELECT gg.goodHs_id, CONCAT(g.goodHs_name, ' -- [', gg.goodHs_price, ']') AS goodHs_name " .
            "FROM " . $GLOBALS['ecs']->table('group_goodHs') . " AS gg, " .
                $GLOBALS['ecs']->table('goodHs') . " AS g " .
            "WHERE gg.parent_id = '$goodHs_id' " .
            "AND gg.goodHs_id = g.goodHs_id ";
    if ($goodHs_id == 0)
    {
        $sql .= " AND gg.admin_id = '$_SESSION[admin_id]'";
    }
    $row = $GLOBALS['db']->getAll($sql);

    return $row;
}

/**
 * 获得商户的关联文章
 *
 * @access  public
 * @param   integer $goodHs_id
 * @return  array
 */
function get_goodHs_articles($goodHs_id)
{
    $sql = "SELECT g.article_id, a.title " .
            "FROM " .$GLOBALS['ecs']->table('goodHs_article') . " AS g, " .
                $GLOBALS['ecs']->table('article') . " AS a " .
            "WHERE g.goodHs_id = '$goodHs_id' " .
            "AND g.article_id = a.article_id ";
    if ($goodHs_id == 0)
    {
        $sql .= " AND g.admin_id = '$_SESSION[admin_id]'";
    }
    $row = $GLOBALS['db']->getAll($sql);

    return $row;
}

/**
 * 获得商户列表
 *
 * @access  public
 * @params  integer $isdelete
 * @params  integer $real_goodHs
 * @params  integer $conditions
 * @return  array
 */
function goodHs_list($is_delete, $real_goodHs=1, $conditions = '')
{
    /* 过滤条件 */
    $param_str = '-' . $is_delete . '-' . $real_goodHs;
    $result = get_filter($param_str);
    if ($result === false)
    {
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);

        $filter['cat_id']           = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
        //促销的商品类型 商户不存在暂时
        //$filter['intro_type']       = empty($_REQUEST['intro_type']) ? '' : trim($_REQUEST['intro_type']);
        $filter['is_promote']       = empty($_REQUEST['is_promote']) ? 0 : intval($_REQUEST['is_promote']);
       // $filter['stock_warning']    = empty($_REQUEST['stock_warning']) ? 0 : intval($_REQUEST['stock_warning']);
        $filter['brand_id']         = empty($_REQUEST['brand_id']) ? 0 : intval($_REQUEST['brand_id']);
        $filter['keyword']          = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
       // $filter['suppliers_id'] = isset($_REQUEST['suppliers_id']) ? (empty($_REQUEST['suppliers_id']) ? '' : trim($_REQUEST['suppliers_id'])) : '';
        $filter['is_on_sale'] = isset($_REQUEST['is_on_sale']) ? ((empty($_REQUEST['is_on_sale']) && $_REQUEST['is_on_sale'] === 0) ? '' : trim($_REQUEST['is_on_sale'])) : '';
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        //排序的条件
        $filter['sort_by']          = empty($_REQUEST['sort_by']) ? 'goodHs_id' : trim($_REQUEST['sort_by']);
        //排序的方式 默认降序
        $filter['sort_order']       = empty($_REQUEST['sort_order']) ? '' : trim($_REQUEST['sort_order']);
        $filter['extension_code']   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
        $filter['is_delete']        = $is_delete;
       // $filter['real_goodHs']       = $real_goodHs;

        $where = $filter['cat_id'] > 0 ? " AND " . get_children($filter['cat_id']) : '';

        /* 推荐类型 */
        switch ($filter['intro_type'])
        {
            case 'is_best':
                $where .= " AND is_best=1";
                break;
            case 'is_hot':
                $where .= ' AND is_hot=1';
                break;
            case 'is_new':
                $where .= ' AND is_new=1';
                break;
            case 'is_promote':
                $where .= " AND is_promote = 1 AND promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today'";
                break;
            case 'all_type';
                $where .= " AND (is_best=1 OR is_hot=1 OR is_new=1 OR (is_promote = 1 AND promote_price > 0 AND promote_start_date <= '" . $today . "' AND promote_end_date >= '" . $today . "'))";
        }

//        /* 库存警告 */
//        if ($filter['stock_warning'])
//        {
//            $where .= ' AND goodHs_number <= warn_number ';
//        }

        /* 户牌 */
        if ($filter['brand_id'])
        {
            $where .= " AND brand_id='$filter[brand_id]'";
        }

        /* 扩展 */
        if ($filter['extension_code'])
        {
            $where .= " AND extension_code='$filter[extension_code]'";
        }

        /* 关键字 */
        if (!empty($filter['keyword']))
        {
            $where .= " AND (goodHs_sn LIKE '%" . mysql_like_quote($filter['keyword']) . "%' OR goodHs_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%')";
        }

//        if ($real_goodHs > -1)
//        {
//            $where .= " AND is_real='$real_goodHs'";
//        }

//        /* 上架 */
//        if ($filter['is_on_sale'] !== '')
//        {
//            $where .= " AND (is_on_sale = '" . $filter['is_on_sale'] . "')";
//        }
//
//        /* 供货商 */
//        if (!empty($filter['suppliers_id']))
//        {
//            $where .= " AND (suppliers_id = '" . $filter['suppliers_id'] . "')";
//        }

        $where .= $conditions;

        /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('goodHs'). " AS g WHERE is_delete='$is_delete' $where";
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        /* 分页大小 */
        $filter = page_and_size($filter);
         //注意goodHs 的后边的逗号,如果没有会和后边的连在一起解析成函数
        $sql = "SELECT goodHs_id, goodHs_name, cat_id,goodHs_sn,goodHs_desc,click_count,sort_order," .
                    " (promote_price > 0 AND promote_start_date <= '$today' AND promote_end_date >= '$today') AS is_promote ".
                    " FROM " . $GLOBALS['ecs']->table('goodHs') . " AS g WHERE is_delete='$is_delete' $where" .
                    " ORDER BY $filter[sort_by] $filter[sort_order] ".
                    " LIMIT " . $filter['start'] . ",$filter[page_size]";

//       var_dump( $sql);
        $filter['keyword'] = stripslashes($filter['keyword']);
        set_filter($filter, $sql, $param_str);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $row = $GLOBALS['db']->getAll($sql);
//     echo "<pre>";
//     var_dump($row);exit;
    return array('goodHs' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

/**
 * 检测商户是否有货户
 *
 * @access      public
 * @params      integer     $goodHs_id       商户id
 * @params      string      $conditions     sql条件，AND语句开头
 * @return      string number               -1，错误；1，存在；0，不存在
 */
function check_goodHs_product_exist($goodHs_id, $conditions = '')
{
    if (empty($goodHs_id))
    {
        return -1;  //$goodHs_id不能为空
    }

    $sql = "SELECT goodHs_id
            FROM " . $GLOBALS['ecs']->table('products') . "
            WHERE goodHs_id = '$goodHs_id'
            " . $conditions . "
            LIMIT 0, 1";
    $result = $GLOBALS['db']->getRow($sql);

    if (empty($result))
    {
        return 0;
    }

    return 1;
}

/**
 * 获得商户的货户总库存
 *
 * @access      public
 * @params      integer     $goodHs_id       商户id
 * @params      string      $conditions     sql条件，AND语句开头
 * @return      string number
 */
function product_number_count($goodHs_id, $conditions = '')
{
    if (empty($goodHs_id))
    {
        return -1;  //$goodHs_id不能为空
    }

    $sql = "SELECT SUM(product_number)
            FROM " . $GLOBALS['ecs']->table('products') . "
            WHERE goodHs_id = '$goodHs_id'
            " . $conditions;
    $nums = $GLOBALS['db']->getOne($sql);
    $nums = empty($nums) ? 0 : $nums;

    return $nums;
}

/**
 * 获得商户的规格属性值列表
 *
 * @access      public
 * @params      integer         $goodHs_id
 * @return      array
 */
function product_goodHs_attr_list($goodHs_id)
{
    if (empty($goodHs_id))
    {
        return array();  //$goodHs_id不能为空
    }

    $sql = "SELECT goodHs_attr_id, attr_value FROM " . $GLOBALS['ecs']->table('goodHs_attr') . " WHERE goodHs_id = '$goodHs_id'";
    $results = $GLOBALS['db']->getAll($sql);

    $return_arr = array();
    foreach ($results as $value)
    {
        $return_arr[$value['goodHs_attr_id']] = $value['attr_value'];
    }

    return $return_arr;
}

/**
 * 获得商户已添加的规格列表
 *
 * @access      public
 * @params      integer         $goodHs_id
 * @return      array
 */
function get_goodHs_specifications_list($goodHs_id)
{
    if (empty($goodHs_id))
    {
        return array();  //$goodHs_id不能为空
    }

    $sql = "SELECT g.goodHs_attr_id, g.attr_value, g.attr_id, a.attr_name
            FROM " . $GLOBALS['ecs']->table('goodHs_attr') . " AS g
                LEFT JOIN " . $GLOBALS['ecs']->table('attribute') . " AS a
                    ON a.attr_id = g.attr_id
            WHERE goodHs_id = '$goodHs_id'
            AND a.attr_type = 1
            ORDER BY g.attr_id ASC";
    $results = $GLOBALS['db']->getAll($sql);

    return $results;
}

/**
 * 获得商户的货户列表
 *
 * @access  public
 * @params  integer $goodHs_id
 * @params  string  $conditions
 * @return  array
 */
function product_list($goodHs_id, $conditions = '')
{
    /* 过滤条件 */
    $param_str = '-' . $goodHs_id;
    $result = get_filter($param_str);
    if ($result === false)
    {
        $day = getdate();
        $today = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);

        $filter['goodHs_id']         = $goodHs_id;
        $filter['keyword']          = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        $filter['stock_warning']    = empty($_REQUEST['stock_warning']) ? 0 : intval($_REQUEST['stock_warning']);

        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['sort_by']          = empty($_REQUEST['sort_by']) ? 'product_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order']       = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);
        $filter['extension_code']   = empty($_REQUEST['extension_code']) ? '' : trim($_REQUEST['extension_code']);
        $filter['page_count'] = isset($filter['page_count']) ? $filter['page_count'] : 1;

        $where = '';

        /* 库存警告 */
        if ($filter['stock_warning'])
        {
            $where .= ' AND goodHs_number <= warn_number ';
        }

        /* 关键字 */
        if (!empty($filter['keyword']))
        {
            $where .= " AND (product_sn LIKE '%" . $filter['keyword'] . "%')";
        }

        $where .= $conditions;

        /* 记录总数 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('products'). " AS p WHERE goodHs_id = $goodHs_id $where";
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $sql = "SELECT product_id, goodHs_id, goodHs_attr, product_sn, product_number
                FROM " . $GLOBALS['ecs']->table('products') . " AS g
                WHERE goodHs_id = $goodHs_id $where
                ORDER BY $filter[sort_by] $filter[sort_order]";

        $filter['keyword'] = stripslashes($filter['keyword']);
        //set_filter($filter, $sql, $param_str);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $row = $GLOBALS['db']->getAll($sql);

    /* 处理规格属性 */
    $goodHs_attr = product_goodHs_attr_list($goodHs_id);
    foreach ($row as $key => $value)
    {
        $_goodHs_attr_array = explode('|', $value['goodHs_attr']);
        if (is_array($_goodHs_attr_array))
        {
            $_temp = '';
            foreach ($_goodHs_attr_array as $_goodHs_attr_value)
            {
                 $_temp[] = $goodHs_attr[$_goodHs_attr_value];
            }
            $row[$key]['goodHs_attr'] = $_temp;
        }
    }

    return array('product' => $row, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

/**
 * 取货户信息
 *
 * @access  public
 * @param   int         $product_id     货户id
 * @param   int         $filed          字段
 * @return  array
 */
function get_product_info($product_id, $filed = '')
{
    $return_array = array();

    if (empty($product_id))
    {
        return $return_array;
    }

    $filed = trim($filed);
    if (empty($filed))
    {
        $filed = '*';
    }

    $sql = "SELECT $filed FROM  " . $GLOBALS['ecs']->table('products') . " WHERE product_id = '$product_id'";
    $return_array = $GLOBALS['db']->getRow($sql);

    return $return_array;
}

/**
 * 检查单个商户是否存在规格
 *
 * @param   int        $goodHs_id          商户id
 * @return  bool                          true，存在；false，不存在
 */
function check_goodHs_specifications_exist($goodHs_id)
{
    $goodHs_id = intval($goodHs_id);

    $sql = "SELECT COUNT(a.attr_id)
            FROM " .$GLOBALS['ecs']->table('attribute'). " AS a, " .$GLOBALS['ecs']->table('goodHs'). " AS g
            WHERE a.cat_id = g.goodHs_type
            AND g.goodHs_id = '$goodHs_id'";

    $count = $GLOBALS['db']->getOne($sql);

    if ($count > 0)
    {
        return true;    //存在
    }
    else
    {
        return false;    //不存在
    }
}

/**
 * 商户的货户规格是否存在
 *
 * @param   string     $goodHs_attr        商户的货户规格
 * @param   string     $goodHs_id          商户id
 * @param   int        $product_id        商户的货户id；默认值为：0，没有货户id
 * @return  bool                          true，重复；false，不重复
 */
function check_goodHs_attr_exist($goodHs_attr, $goodHs_id, $product_id = 0)
{
    $goodHs_id = intval($goodHs_id);
    if (strlen($goodHs_attr) == 0 || empty($goodHs_id))
    {
        return true;    //重复
    }

    if (empty($product_id))
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ecs']->table('products') ."
                WHERE goodHs_attr = '$goodHs_attr'
                AND goodHs_id = '$goodHs_id'";
    }
    else
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ecs']->table('products') ."
                WHERE goodHs_attr = '$goodHs_attr'
                AND goodHs_id = '$goodHs_id'
                AND product_id <> '$product_id'";
    }

    $res = $GLOBALS['db']->getOne($sql);

    if (empty($res))
    {
        return false;    //不重复
    }
    else
    {
        return true;    //重复
    }
}

/**
 * 商户的货户货号是否重复
 *
 * @param   string     $product_sn        商户的货户货号；请在传入本参数前对本参数进行SQl脚本过滤
 * @param   int        $product_id        商户的货户id；默认值为：0，没有货户id
 * @return  bool                          true，重复；false，不重复
 */
function check_product_sn_exist($product_sn, $product_id = 0)
{
    $product_sn = trim($product_sn);
    $product_id = intval($product_id);
    if (strlen($product_sn) == 0)
    {
        return true;    //重复
    }
    $sql="SELECT goodHs_id FROM ". $GLOBALS['ecs']->table('goodHs')."WHERE goodHs_sn='$product_sn'";
    if($GLOBALS['db']->getOne($sql))
    {
        return true;    //重复
    }


    if (empty($product_id))
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ecs']->table('products') ."
                WHERE product_sn = '$product_sn'";
    }
    else
    {
        $sql = "SELECT product_id FROM " . $GLOBALS['ecs']->table('products') ."
                WHERE product_sn = '$product_sn'
                AND product_id <> '$product_id'";
    }

    $res = $GLOBALS['db']->getOne($sql);

    if (empty($res))
    {
        return false;    //不重复
    }
    else
    {
        return true;    //重复
    }
}

/**
 * 格式化商户图片名称（按目录存储）
 *
 */
function reformat_image_name($type, $goodHs_id, $source_img, $position='')
{
    $rand_name = gmtime() . sprintf("%03d", mt_rand(1,999));
    $img_ext = substr($source_img, strrpos($source_img, '.'));
    $dir = 'images';
    if (defined('IMAGE_DIR'))
    {
        $dir = IMAGE_DIR;
    }
    $sub_dir = date('Ym', gmtime());
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir))
    {
        return false;
    }
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir.'/source_img'))
    {
        return false;
    }
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir.'/goodHs_img'))
    {
        return false;
    }
    if (!make_dir(ROOT_PATH.$dir.'/'.$sub_dir.'/thumb_img'))
    {
        return false;
    }
    switch($type)
    {
        case 'goodHs':
            $img_name = $goodHs_id . '_G_' . $rand_name;
            break;
        case 'goodHs_thumb':
            $img_name = $goodHs_id . '_thumb_G_' . $rand_name;
            break;
        case 'gallery':
            $img_name = $goodHs_id . '_P_' . $rand_name;
            break;
        case 'gallery_thumb':
            $img_name = $goodHs_id . '_thumb_P_' . $rand_name;
            break;
    }
    if ($position == 'source')
    {
        if (move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/source_img/'.$img_name.$img_ext))
        {
            return $dir.'/'.$sub_dir.'/source_img/'.$img_name.$img_ext;
        }
    }
    elseif ($position == 'thumb')
    {
        if (move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/thumb_img/'.$img_name.$img_ext))
        {
            return $dir.'/'.$sub_dir.'/thumb_img/'.$img_name.$img_ext;
        }
    }
    else
    {
        if (move_image_file(ROOT_PATH.$source_img, ROOT_PATH.$dir.'/'.$sub_dir.'/goodHs_img/'.$img_name.$img_ext))
        {
            return $dir.'/'.$sub_dir.'/goodHs_img/'.$img_name.$img_ext;
        }
    }
    return false;
}

function move_image_file($source, $dest)
{
    if (@copy($source, $dest))
    {
        @unlink($source);
        return true;
    }
    return false;
}

?>