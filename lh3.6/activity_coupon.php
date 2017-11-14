<?php

/**
 * ECSHOP 会员中心
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: user.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
// 路径写错了 改  by lee start
require(dirname(__FILE__) . '/themes/meilele/init.php');
// 路径写错了 改  by lee end
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');


require_once(ROOT_PATH . 'includes/lib_sms.php');
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/sms.php');

$mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';//手机号
$verifycode = isset($_POST['verifycode']) ? trim($_POST['verifycode']) : '';//验证码
$user_id = $_SESSION['user_id'];
$action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';

if($action == 'default')
{
	assign_template();

    $position = assign_ur_here();
    $smarty->assign('page_title',      $position['title']);    // 页面标题
    $smarty->assign('ur_here',         $position['ur_here']);  // 当前位置

    /* meta information */
    $smarty->assign('keywords',        htmlspecialchars($_CFG['shop_keywords']));
    $smarty->assign('description',     htmlspecialchars($_CFG['shop_desc']));
	$smarty->display('activity_coupon.dwt');
}
/* 绑定手机页面 */
if ($action == 'check_user')
{
 $prize_arr = array(
    '0' => array('id' => 1, 'min' => array(1,62,122,182,242,302), 'max' => array(29,88,148,208,268,328), 'prize' => '100元优惠券', 'v' => 70),
    '1' => array('id' => 2, 'min' => array(32,152,272), 'max' => array(58,178,298), 'prize' => '200元优惠券', 'v' => 25),
    '2' => array('id' => 3, 'min' => array(92,212,332), 'max' => array(118,238,358), 'prize' => '800元优惠券', 'v' => 5)
 );
foreach ($prize_arr as $v) {
    $arr[$v['id']] = $v['v'];
}

$prize_id = getRand($arr); //根据概率获取奖项id 

$res = $prize_arr[$prize_id - 1]; //中奖项 
$min = $res['min'];
$max = $res['max'];
if ($res['id'] == 1) { //一等奖 
    $i = mt_rand(0, 5);
    $data['angle'] = mt_rand($min[$i], $max[$i]);
} else {
	$i = mt_rand(0, 2);
    $data['angle'] = mt_rand($min[$i], $max[$i]); //随机生成一个角度 
}
$data['prize'] = $res['prize'];
if($user_id){
	$data['result'] = true;
}
else{
	$data['result'] = false;
}
echo json_encode($data);
  
}

/* 绑定手机页面 */
elseif ($action == 'act_bindmobile')
{
	require_once(ROOT_PATH . 'includes/lib_sms.php');
	require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/sms.php');

    $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';//手机号
	$verifycode = isset($_POST['verifycode']) ? trim($_POST['verifycode']) : '';//验证码

	if ($_CFG['ihuyi_sms_mobile_bind'] == '1')
	{
		/* 提交的手机号是否正确 */
		if(!ismobile($mobile)) {
			show_message($_LANG['invalid_mobile_phone']);
		}

		/* 提交的验证码不能为空 */
		if(empty($verifycode)) {
			show_message($_LANG['verifycode_empty']);
		}

		/* 提交的验证码是否正确 */
		if(empty($mobile)) {
			show_message($_LANG['invalid_verify_code']);
		}

		/* 提交的手机号是否已经绑定帐号 */
		$sql = "SELECT COUNT(user_id) FROM " . $ecs->table('users') . " WHERE mobile_phone = '$mobile'";

		if ($db->getOne($sql) > 0)
		{
			show_message($_LANG['mobile_phone_binded']);
		}

		/* 验证手机号验证码和IP */
		$sql = "SELECT COUNT(id) FROM " . $ecs->table('verify_code') ." WHERE mobile='$mobile' AND verifycode='$verifycode' AND getip='" . real_ip() . "' AND status=4 AND dateline>'" . gmtime() ."'-86400";//验证码一天内有效

		if ($db->getOne($sql) == 0)
		{
			//手机号与验证码不匹配
			show_message($_LANG['verifycode_mobile_phone_notmatch']);
		}

		/* 更新验证码表更新用户手机字段 */
		$sql = "UPDATE " . $ecs->table('verify_code') . " SET reguid=" . $_SESSION['user_id'] . ",regdateline='" . gmtime() ."',status=5 WHERE mobile='$mobile' AND verifycode='$verifycode' AND getip='" . real_ip() . "' AND status=4 AND dateline>'" . gmtime() ."'-86400";
		$db->query($sql);
		$sql = "UPDATE " . $ecs->table('users') . " SET mobile_phone='" . $mobile ."' WHERE user_id=" . $_SESSION['user_id'] . "";
		$db->query($sql);

		show_message($_LANG['bind_mobile_success'], $_LANG['back_page_up'], 'user.php?act=profile', 'info');
	}
	else
	{
		//手机绑定未开启
        show_message($_LANG['ihuyi_sms_mobile_bind_closed'], $_LANG['back_page_up'], '', 'info');
	}
}

function getRand($proArr) {

    $data = '';
    $proSum = array_sum($proArr); //概率数组的总概率精度 
     
    foreach ($proArr as $k => $v) { //概率数组循环
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $v) {
            $data = $k;
            break;
        } else {
            $proSum -= $v;
        }
    }
    unset($proArr);

    return $data;
}
