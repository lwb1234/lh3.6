<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>未授权</title>
	<style type="text/css">
	body {
		font-size:14px;
		font-family: 'microsoft YaHei';
		background: #fff;
	}
	body,ul,li,dl,dt,dd,h2,p,a {
		margin:0;
		padding:0;
	}
	ul,li,dl,dt,dd {
		list-style-type:none;
	}
	a {
		cursor:pointer;
		text-decoration: none;
	}
	h2 {
		font-weight: normal;
	}
	.accredit {
		width:935px;
		margin:100px auto;
		overflow: hidden;
	}
	.accredit-header>img {
    display: table-cell;
		width:166px;
		height: 120px;
		margin:0 auto;
	}
	.accredit-header>p {
		font-size:24px;
		color:#3a3a3a;
		text-align: center;
	}
	.accredit-split {
		position:relative;
		height:25px;
		margin-top: 80px;
	}
	.accredit-split .accredit-line {
		height:1px;
		background: #ddd;
		margin-top:12px;
	}
	.accredit-split .accredit-reason {
		position: absolute;
		top:-12px;
		left:50%;
		z-index: 2;
		width:242px;
		line-height:25px;	
		margin-left: -121px;
		background: #fff;
		font-size:16px;
		color:#757575;
		text-align: center;
	}
	.accredit-ul {
		width:970px;
		margin:25px auto;
		overflow: hidden;
	}
	.accredit-ul>li {
		float: left;
		width:450px;
		margin-right: 35px;
	}
	.accredit-dl {
		height: 124px;
		overflow: hidden;
	}
	.accredit-dl>dt {
		float:left;
		width:102px;
		height: 124px;
		margin-right:10px;
	}
	.accredit-dl>dd {
		float:left;
		width:338px;
		height: 124px;
	}
	.accredit-dl>dd>h2 {
		line-height: 30px;
		margin-bottom:10px;
		font-size:18px;
		color:#3a3a3a;
	}
	.accredit-dl>dd>p {
		line-height: 26px;
		font-size:14px;
		color:#757575;
	}
	.accredit-buy {
		display: block;
		width:160px;
		line-height: 40px;
		margin:50px auto 0;
		border-radius: 5px;
		background: #ff6633;
		font-size:15px;
		color:#fff;
		text-align: center;
	}
	</style>
</head>
<body>
<section class="accredit">
	<section class="accredit-header">
		<img src="images/accredit.png" alt="loading..." />
		<p>您尚未获取旗舰版商业授权！</p>
	</section>
	<section class="accredit-split">
		<section class="accredit-line"></section>
		<header class="accredit-reason">获取旗舰版商业授权的理由：</header>
	</section>
	<ul class="accredit-ul">
		<li>
			<dl class="accredit-dl">
				<dt><img src="images/weixin-login.png" alt="loading..."></dt>
				<dd>
					<h2>绑定微信公众号（免登）</h2>
					<p>客户通过公众号免登进入商城购物，好友/朋友圈打开你的微商城，随时随地购买</p>
				</dd>
			</dl>
		</li>
		<li>
			<dl class="accredit-dl">
				<dt><img src="images/weixin-payment.png" alt="loading..."></dt>
				<dd>
					<h2>绑定微信公众号支付</h2>
					<p>客户可以通过微商城完成选购、支付，商家可以把商品页生成二维码，张贴在线下，用户扫描后可打开商品详情页在微信中直接进行下单购买</p>
				</dd>
			</dl>
		</li>
	</ul>
	<a class="accredit-buy" href="<?php echo $this->_var['url']; ?>" target="_blank">立即购买</a>
</section>
</body>
</html>