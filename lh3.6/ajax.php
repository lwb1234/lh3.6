<?php

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

/*
$prize_arr = array(
    '0' => array('id' => 1, 'min' => 1, 'max' => 29, 'prize' => '一等奖', 'v' => 1),
    '1' => array('id' => 2, 'min' => 302, 'max' => 328, 'prize' => '二等奖', 'v' => 2),
    '2' => array('id' => 3, 'min' => 242, 'max' => 268, 'prize' => '三等奖', 'v' => 5),
    '3' => array('id' => 4, 'min' => 182, 'max' => 208, 'prize' => '四等奖', 'v' => 7),
    '4' => array('id' => 5, 'min' => 122, 'max' => 148, 'prize' => '五等奖', 'v' => 10),
    '5' => array('id' => 6, 'min' => 62, 'max' => 88, 'prize' => '六等奖', 'v' => 25),
    '6' => array('id' => 7, 'min' => array(32, 92, 152, 212, 272, 332),
        'max' => array(58, 118, 178, 238, 298, 358), 'prize' => '七等奖', 'v' => 50)
    //min数组表示每个个奖项对应的最小角度 max表示最大角度
    //prize表示奖项内容，v表示中奖几率(若数组中七个奖项的v的总和为100，如果v的值为1，则代表中奖几率为1%，依此类推)
 );
 */

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
