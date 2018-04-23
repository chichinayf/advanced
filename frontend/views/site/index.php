<?php
use yii\helpers\Url;
use yii\bootstrap\Carousel;
?>
<style type="text/css" id="MEIQIA-ICON-STYLE">
.MEIQIA-ICON {
	background-size: 40px auto !important;
	background-repeat: no-repeat !important;
	background-image:
		url("https://static.meiqia.com/dist/images/icon-mq.png?v=slktr2n1k4l8r529")
		!important;
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) , only screen and
		(min--moz-device-pixel-ratio: 2) , only screen and
		(-o-min-device-pixel-ratio: 2/1) , only screen and
	(min-device-pixel-ratio: 2) {
	.MEIQIA-ICON {
		background-image:
			url("https://static.meiqia.com/dist/images/icon-mq@2x.png?v=slktr2n1k4l8r529")
			!important;
	}
}

.MEIQIA-ICON-CHAT1 {
	background-position: 0 0 !important;
}

.MEIQIA-ICON-CHAT2 {
	background-position: 0 -20px !important;
}

.MEIQIA-ICON-CHAT3 {
	background-position: 0 -40px !important;
}

.MEIQIA-ICON-CHAT4 {
	background-position: 0 -60px !important;
}

.MEIQIA-ICON-CHAT5 {
	background-position: 0 -80px !important;
}

.MEIQIA-ICON-CHAT6 {
	background-position: 0 -100px !important;
}

.MEIQIA-ICON-CHAT7 {
	background-position: 0 -120px !important;
}

.MEIQIA-ICON-CHAT8 {
	background-position: 0 -140px !important;
}

.MEIQIA-ICON-CHAT9 {
	background-position: 0 -160px !important;
}

.MEIQIA-ICON-CHAT10 {
	background-position: 0 -180px !important;
}

.MEIQIA-ICON-CHAT11 {
	background-position: 0 -200px !important;
}

.MEIQIA-ICON-CHAT12 {
	background-position: 0 -220px !important;
}

.MEIQIA-ICON-TICKET1 {
	background-position: -20px 0 !important;
}

.MEIQIA-ICON-TICKET2 {
	background-position: -20px -20px !important;
}

.MEIQIA-ICON-TICKET3 {
	background-position: -20px -40px !important;
}

.MEIQIA-ICON-TICKET4 {
	background-position: -20px -60px !important;
}

.MEIQIA-ICON-TICKET5 {
	background-position: -20px -80px !important;
}

.MEIQIA-ICON-TICKET6 {
	background-position: -20px -100px !important;
}

.MEIQIA-ICON-TICKET7 {
	background-position: -20px -120px !important;
}

.MEIQIA-ICON-TICKET8 {
	background-position: -20px -140px !important;
}

.MEIQIA-ICON-TICKET9 {
	background-position: -20px -160px !important;
}

.MEIQIA-ICON-TICKET10 {
	background-position: -20px -180px !important;
}

.MEIQIA-ICON-TICKET11 {
	background-position: -20px -200px !important;
}

.MEIQIA-ICON-TICKET12 {
	background-position: -20px -220px !important;
}
</style>
<style type="text/css" id="MEIQIA-PANEL-STYLE">
#MEIQIA-PANEL-HOLDER {
	position: fixed;
	bottom: 0;
	right: 60px;
	z-index: -1;
	width: 320px;
	height: 480px;
	padding: 0;
	margin: 0;
	overflow: hidden;
	visibility: hidden;
	background-color: transparent;
	box-shadow: 0 0 20px 0 rgba(0, 0, 0, .15);
	border: 1px solid #eee\0;
	*border: 1px solid #eee;
}

#MEIQIA-IFRAME {
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	display: none;
	width: 100% !important;
	height: 100% !important;
	border: 0;
	padding: 0;
	margin: 0;
	float: none;
	background: none;
}
</style>
<style type="text/css" id="MEIQIA-BTN-STYLE">
#MEIQIA-BTN-HOLDER {
	display: none;
	position: fixed;
	bottom: 0;
	right: 65px;
	z-index: 2147483647;
	width: auto;
	height: auto;
	padding: 0;
	margin: 0;
	border: 0;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Hiragino Sans GB',
		'Microsoft YaHei', sans-serif;
	background-color: transparent;
}

#MEIQIA-BTN, #MEIQIA-BTN span, #MEIQIA-BTN div, #MEIQIA-BTN img {
	float: none;
	width: auto;
	height: auto;
	padding: 0;
	margin: 0;
	border: 0;
	background: none;
}

#MEIQIA-BTN {
	display: block;
	height: 40px;
	font-size: 16px;
	color: #fff;
	text-align: center;
	border-left: 1px solid rgba(0, 0, 0, .1);
	border-top: 1px solid rgba(0, 0, 0, .1);
	border-right: 1px solid rgba(0, 0, 0, .1);
	box-shadow: 0 0 14px 0 rgba(0, 0, 0, .16);
	cursor: pointer;
	text-decoration: none;
	background-color: #007aff;
}

#MEIQIA-BTN #MEIQIA-BTN-ICON {
	display: block;
	float: left;
	width: 20px;
	height: 20px;
	margin: 10px 10px 0;
}

#MEIQIA-BTN #MEIQIA-BTN-LINE {
	display: block;
	float: left;
	width: 1px;
	height: 100%;
	background-color: rgba(0, 0, 0, .08);
	background-color: #000\9;
	opacity: .1\9;
	filter: alpha(opacity = 10) \9;
	vertical-align: middle;
}

#MEIQIA-BTN #MEIQIA-BTN-TEXT {
	display: block;
	float: left;
	height: 40px;
	margin: 0 10px;
	line-height: 40px;
	overflow-y: hidden;
	font-size: 16px;
	color: #fff;
}

#MEIQIA-BTN #MEIQIA-CIRCLE {
	position: absolute;
	top: -13px;
	left: -13px;
	display: none;
	width: 26px;
	height: 26px;
	text-align: center;
	line-height: 26px;
	font-size: 14px;
	color: #fff;
	border-radius: 15px;
	background-color: #ff3b30;
}

#MEIQIA-BTN #MEIQIA-BUBBLE {
	position: absolute;
	bottom: 64px;
	display: none;
	width: 260px;
	border: 1px solid #f7f7f7;
	border-radius: 4px;
	color: #000;
	text-align: left;
	box-shadow: 0 0 14px 0 rgba(0, 0, 0, .16);
	line-height: 1.428571429;
	background-color: #fff;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-ARROW1 {
	position: absolute;
	z-index: 2;
	font-size: 0;
	line-height: 0;
	border-width: 8px 7px 0px;
	border-color: #fff transparent;
	border-style: solid dashed dashed;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-ARROW2 {
	position: absolute;
	z-index: 1;
	font-size: 0;
	line-height: 0;
	border-width: 10px 8px 0px;
	border-color: #f7f7f7 transparent;
	border-style: solid dashed dashed;
}

#MEIQIA-BTN #MEIQIA-BUBBLE {
	right: 0;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-ARROW1 {
	right: 12px;
	bottom: -8px;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-ARROW2 {
	right: 11px;
	bottom: -10px;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-CLOSE {
	position: absolute;
	display: none;
	top: 12px;
	right: 12px;
	width: 10px;
	height: 10px;
	background-position: -5px -245px;
	cursor: pointer;
}

#MEIQIA-BTN #MEIQIA-BUBBLE:hover #MEIQIA-BUBBLE-CLOSE {
	display: block;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-INSIDE {
	margin: 12px 18px;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-AVATAR {
	width: 26px;
	height: 26px;
	border-radius: 13px;
	margin-right: 6px;
	vertical-align: top;
	box-shadow: 0 0 8px 0 rgba(0, 0, 0, .15);
}

#MEIQIA-BTN #MEIQIA-BUBBLE-NAME {
	display: inline-block;
	margin-top: 3px;
	font-size: 16px;
	color: #000;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-MSG {
	*height: 40px;
	max-height: 40px;
	margin-top: 5px;
	font-size: 14px;
	overflow: hidden;
	color: #000;
}

#MEIQIA-BTN #MEIQIA-BUBBLE-MSG img {
	width: 16px;
	height: 16px;
}
</style>
<style type="text/css" id="MEIQIA-INVITE-STYLE">
#MEIQIA-INVITE, #MEIQIA-INVITE div, #MEIQIA-INVITE span {
	float: none;
	width: auto;
	height: auto;
	padding: 0;
	margin: 0;
	border: 0;
	background: none;
}

#MEIQIA-INVITE {
	position: fixed;
	z-index: 2147483647;
	display: none;
	width: 340px;
	height: 130px;
	margin-bottom: 64px;
	border: 1px solid #f7f7f7;
	border-radius: 4px;
	box-shadow: 0 0 14px 0 rgba(0, 0, 0, .16);
	text-align: left;
	cursor: pointer;
	color: #000;
	line-height: 1.428571429;
	background-color: #fff;
}

#MEIQIA-INVITE #MEIQIA-INVITE-ARROW1, #MEIQIA-INVITE #MEIQIA-INVITE-ARROW2
	{
	position: absolute;
	font-size: 0;
	line-height: 0;
}

#MEIQIA-INVITE #MEIQIA-INVITE-ARROW1 {
	z-index: 2;
}

#MEIQIA-INVITE #MEIQIA-INVITE-ARROW2 {
	z-index: 1;
}

#MEIQIA-INVITE {
	right: 65px;
	bottom: 0;
}

#MEIQIA-INVITE #MEIQIA-INVITE-ARROW1 {
	right: 12px;
	bottom: -8px;
	border-top: 8px solid #fff;
	border-right: 7px solid transparent;
	border-left: 7px solid transparent;
}

#MEIQIA-INVITE #MEIQIA-INVITE-ARROW2 {
	right: 11px;
	bottom: -10px;
	border-top: 9px solid #f7f7f7;
	border-right: 8px solid transparent;
	border-left: 8px solid transparent;
}

#MEIQIA-INVITE #MEIQIA-INVITE-CLOSE {
	position: absolute;
	right: -20px;
	top: -20px;
	width: 40px;
	height: 40px;
	cursor: pointer;
	background-position: 0 -260px;
}

#MEIQIA-INVITE #MEIQIA-INVITE-CLOSE:hover {
	background-position: 0 -300px;
}

#MEIQIA-INVITE #MEIQIA-INVITE-INSIDE {
	width: 300px;
	height: 44px;
	margin: 46px 20px 0;
	text-align: left;
	font-size: 14px;
	line-height: 22px;
	overflow: hidden;
	color: #000; /*word-break: break-all;*/
}
</style>
<body>
	<div class="container-wrapper">
		<div class="header-box IndexHeader white">
			<div class="header width1200">
				<a href="http://www.ai-yixin.com/index.html"
					class="logo-area block fl"></a>
				<ul class="nav-area">
					<li><a href="http://www.ai-yixin.com/index.html" class="current">首页</a></li>
					<li><a href="http://www.ai-yixin.com/product.html">产品</a></li>
					<li><a href="http://www.ai-yixin.com/case.html">案例</a></li>
					<li><a href="http://www.ai-yixin.com/news.html">资讯</a></li>
					<li><a href="http://www.ai-yixin.com/join.html">加盟</a></li>
					<li><a href="http://www.ai-yixin.com/about-us.html">关于我们</a></li>
					<li class="free"><a href="javascript:;">免费试用</a></li>
				</ul>
				<!--end .nav-area-->
			</div>
			<!--end .header-->
		</div>
		<!--end .header-box-->
		<div class="slides-box banner-box">
			<ul class="slides">
				<li class="two" style="display: list-item;"><img
					src="<?php echo $url_base;?>/statics/images/index-banner02.jpg"
					alt="img"></li>
				<li class="one" style="display: none;"><img
					src="<?php echo $url_base;?>/statics/images/banner.jpg"
					alt="img"> <a href="http://www.ai-yixin.com/product.html"
					class="btn-free">产品介绍 &gt;</a></li>
			</ul>
			<ul class="pagination"
				style="position: absolute; left: 50%; bottom: 20px; margin-left: -31px; z-index: 99;">
				<li><a href="javascript:void(0)" class="active">1</a></li>
				<li><a href="javascript:void(0)">2</a></li>
			</ul>
			<a href="javascript:void(0)" class="prev"></a>
			<a href="javascript:void(0)" class="next"></a>		
			<div class="banner-contact-box left">
				<span class="code-box"> <img
					src="<?php echo Url::home();?>statics/images/code02.png" alt="img">
				</span>
				<div class="txt-area">
					<span class="txt we">微信公众号：晓芯机器人</span> <span class="txt">联系电话：18667009857</span>
				</div>
			</div>
		</div>
		<!--end .banner-box-->
		<div class="advantage-box">
			<div class="main-title">
				<p class="title" data-scroll-reveal="enter from the top over 1s"
					data-scroll-reveal-id="1"
					style="-webkit-transform: translatey(0); transform: translatey(0); opacity: 1; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">产品优势</p>
				<p class="txt-gray-more small"
					data-scroll-reveal="enter bottom but wait 0.8s"
					data-scroll-reveal-id="2"
					style="-webkit-transform: translatey(0); transform: translatey(0); opacity: 1; -webkit-transition: -webkit-transform 0.66s ease-in-out 0.8s, opacity 0.66s ease-in-out 0.8s; transition: transform 0.66s ease-in-out 0.8s, opacity 0.66s ease-in-out 0.8s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">电话机器人——“晓芯”能够做的更好</p>
			</div>
			<!--end .main-title-->
			<div class="advantage-content width1200">
				<div class="col">
					<span class="img-box block"> <i
						class="icons icon-64x64 icon-advone"></i>
					</span>
					<p class="title">提高效率，降低成本</p>
					<p class="info">每日可完成原来5-10个人的工作，大大提高生产效率。</p>
				</div>
				<!--end .col-->
				<div class="col">
					<span class="img-box block"> <i
						class="icons icon-64x64 icon-advtwo"></i>
					</span>
					<p class="title">管理零负担</p>
					<p class="info">智能机器人标准应对话术，没有任何额外管理成本的超级电话员工。</p>
				</div>
				<!--end .col-->
				<div class="col">
					<span class="img-box block"> <i
						class="icons icon-64x64 icon-advthree"></i>
					</span>
					<p class="title">固化优秀员工能力</p>
					<p class="info">固定优秀员工的话术，实现意向客户筛选与快速挖掘。</p>
				</div>
				<!--end .col-->
				<div class="col">
					<span class="img-box block"> <i
						class="icons icon-64x64 icon-advfour"></i>
					</span>
					<p class="title">智能化CRM管理</p>
					<p class="info">帮助企业全面、客观、高效管理客户信息。</p>
				</div>
				<!--end .col-->
			</div>
			<!--end .advantage-content-->
		</div>
		<!--end .advantage-box-->
		<div class="function-box">
			<div class="main-title">
				<p class="title" data-scroll-reveal="enter from the top over 1s"
					data-scroll-reveal-id="3"
					style="-webkit-transform: translatey(-50px); transform: translatey(-50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">功能介绍</p>
				<p class="txt-gray-more small"
					data-scroll-reveal="enter bottom but wait 0.8s"
					data-scroll-reveal-id="4"
					style="-webkit-transform: translatey(50px); transform: translatey(50px); opacity: 0; -webkit-transition: -webkit-transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; transition: transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">怀揣“让人类专注创意”的梦想，落地人工智能语音技术的应用</p>
			</div>
			<!--end .main-title-->
			<div class="function-content width1200">
				<div class="col one">
					<i class="icons icon-64x64 icon-fun01"></i>
					<p class="title">完善的用户管理系统</p>
					<p class="info">全自动管理企业客户的意向等级、通话记录等数据。数据统计全面，客观，高效。</p>
				</div>
				<!--end .col-->
				<div class="col two">
					<i class="icons icon-64x64 icon-fun02"></i>
					<p class="title">智能语音识别对答</p>
					<p class="info">颠覆传统自动外呼只能播放语音的现状，系统支持模拟行业专家与目标客户进行通话，让你拥有复制的精英销售。</p>
				</div>
				<!--end .col-->
				<div class="col three">
					<i class="icons icon-64x64 icon-fun03"></i>
					<p class="title">自动外呼</p>
					<p class="info">直接将客户号码导入，瞬间批量拨打客户电话，过程由呼叫平台自动完成，支持定时呼叫、筛选呼叫等功能。</p>
				</div>
				<!--end .col-->
				<div class="col four">
					<i class="icons icon-64x64 icon-fun04"></i>
					<p class="title">客户资料管理</p>
					<p class="info">系统提供全程详实的通话录音，呼出了多少，哪个客户没有接通，接通时长，邀约是否成功，客户购买意向等数据。</p>
				</div>
				<!--end .col-->
			</div>
			<!--end .function-content-->
		</div>
		<!--end .function-box-->
		<div class="application-box">
			<div class="main-title">
				<p class="title" data-scroll-reveal="enter from the top over 1s"
					data-scroll-reveal-id="5"
					style="-webkit-transform: translatey(-50px); transform: translatey(-50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">应用领域</p>
				<p class="txt-gray-more small"
					data-scroll-reveal="enter bottom but wait 0.8s"
					data-scroll-reveal-id="6"
					style="-webkit-transform: translatey(50px); transform: translatey(50px); opacity: 0; -webkit-transition: -webkit-transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; transition: transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">保险、法务、公关媒体、教育培训、健康领域、互联网行业、企业服务、亲情服务等其他一切有电话环节的行业</p>
			</div>
			<!--end .main-title-->
			<div class="application-content width1200">
				<div class="col-box">
					<div class="col width30">
						<div class="row purple text-right"
							data-scroll-reveal="enter from the left over 1s"
							data-scroll-reveal-id="7"
							style="-webkit-transform: translatex(-50px); transform: translatex(-50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
							data-scroll-reveal-initialized="true">
							<p class="title">电商行业</p>
							<p class="info">重大节日活动促销、通知、推广、电商服务推广、电商培训推广、电商代运营</p>
						</div>
						<!--end .row-->
						<div class="row light-blue text-right"
							data-scroll-reveal="enter from the left over 1s"
							data-scroll-reveal-id="8"
							style="-webkit-transform: translatex(-50px); transform: translatex(-50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
							data-scroll-reveal-initialized="true">
							<p class="title">汽车行业</p>
							<p class="info">车险、新车销售4S店售后回访，厂商客户关怀</p>
						</div>
						<!--end .row-->
					</div>
					<!--end .col-->
					<div class="col text-center width40">
						<div class="circle">
							<p class="title">“晓芯”</p>
							<p class="info">我是电话机器人</p>
						</div>
						<!--end .circle-->
					</div>
					<!--end .col-->
					<div class="col width30">
						<div class="row red"
							data-scroll-reveal="enter from the right over 1s"
							data-scroll-reveal-id="9"
							style="-webkit-transform: translatex(50px); transform: translatex(50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
							data-scroll-reveal-initialized="true">
							<p class="title">房地产行业</p>
							<p class="info">二手房中介房产销售，开发商新房销售</p>
						</div>
						<!--end .row-->
						<div class="row blue"
							data-scroll-reveal="enter from the right over 1s"
							data-scroll-reveal-id="10"
							style="-webkit-transform: translatex(50px); transform: translatex(50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
							data-scroll-reveal-initialized="true">
							<p class="title">金融行业</p>
							<p class="info">贷款业务、保险业务的新客户开拓老客户回访，到期提醒、催促</p>
						</div>
						<!--end .row-->
					</div>
					<!--end .col-->
				</div>
				<!--end .col-box-->
				<div class="col-else pr"
					data-scroll-reveal="enter from the bottom over 1s"
					data-scroll-reveal-id="11"
					style="-webkit-transform: translatey(50px); transform: translatey(50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">
					<p class="title">其他行业</p>
					<p class="info">其他一切有电话环节的行业均适用</p>
				</div>
				<!--end .col-box-->
			</div>
			<!--end .application-content-->
		</div>
		<!--end .application-box-->
		<div class="company-box">
			<div class="main-title">
				<p class="title" data-scroll-reveal="enter from the top over 1s"
					data-scroll-reveal-id="12"
					style="-webkit-transform: translatey(-50px); transform: translatey(-50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">公司实力</p>
				<p class="txt-gray-more small"
					data-scroll-reveal="enter bottom but wait 0.8s"
					data-scroll-reveal-id="13"
					style="-webkit-transform: translatey(50px); transform: translatey(50px); opacity: 0; -webkit-transition: -webkit-transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; transition: transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
					data-scroll-reveal-initialized="true">让人类专注创新，用实力证明一切</p>
			</div>
			<!--end .main-title-->
			<div class="company-content width1200">
				<p class="txt-company">浙江一芯智能科技有限公司总部设在杭州，上海，苏州，南京已设立分支机构，</p>
				<p class="txt-company">市场今年规划布局华东、华北、华南三大市场</p>
				<div class="company-info">
					<span class="img-area block fl enlarge-img"> <img
						src="<?php echo $url_base;?>/statics/images/photo01.png" alt="img">
					</span>
					<div class="main-txt-box">
						<ul>
							<li><span class="img-box block"> <img
									src="<?php echo $url_base;?>/statics/images/company01.png"
									alt="img">
							</span>
								<p class="title">技术实力</p>
								<p class="info">研发团队在人工智能领域, 移动通信, 呼叫中心, 语音技术等相关领域深耕10多年</p></li>
							<li><span class="img-box block"> <img
									src="<?php echo $url_base;?>/statics/images/company02.png"
									alt="img">
							</span>
								<p class="title">公司理念</p>
								<p class="info">让人类专注创意，从重复枯燥的工作中解放出来；帮助企业搭载人工智能，降低成本，提高效益</p></li>
							<li class="bottom0"><span class="img-box block"> <img
									src="<?php echo $url_base;?>/statics/images/company03.png"
									alt="img">
							</span>
								<p class="title">公司愿景</p>
								<p class="info">成为世界一流的AI应用提供商</p></li>
						</ul>
					</div>
					<!--end .main-txt-box-->
				</div>
				<!--end .company-info-->
			</div>
			<!--end .company-content-->
		</div>
		<!--end .company-box-->
		<div class="experience-box hide">
			<p class="title" data-scroll-reveal="enter from the top over 1s"
				data-scroll-reveal-id="14"
				style="-webkit-transform: translatey(-50px); transform: translatey(-50px); opacity: 0; -webkit-transition: -webkit-transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; transition: transform 1s ease-in-out 0s, opacity 1s ease-in-out 0s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
				data-scroll-reveal-initialized="true">马上雇佣”晓芯“，体验事半功倍的效果</p>
			<div class="input-box"
				data-scroll-reveal="enter bottom but wait 0.8s"
				data-scroll-reveal-id="15"
				style="-webkit-transform: translatey(50px); transform: translatey(50px); opacity: 0; -webkit-transition: -webkit-transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; transition: transform 0.66s ease-in-out 0s, opacity 0.66s ease-in-out 0.8s; -webkit-perspective: 1000; -webkit-backface-visibility: hidden;"
				data-scroll-reveal-initialized="true">
				<span class="input-area"> <input placeholder="请输入您的手机号" type="text">
				</span> <span class="btn-trial">免费试用</span>
			</div>
		</div>
		<!--end .experience-box-->
		<div class="footer-wrapper">
			<div class="footer-box">
				<div class="footer width1200">
					<ul>
						<li><i class="icons icon-32x32 icon-weibo"></i>新浪微博：晓芯智能电话机器人</li>
						<li><i class="icons icon-32x32 icon-wechat"></i>微信公众号：晓芯电话机器人</li>
						<li><i class="icons icon-32x32 icon-phone"></i>电话：18667009857</li>
						<li><i class="icons icon-32x32 icon-mail"></i>邮箱：43505228@qq.com</li>
						<li><i class="icons icon-32x32 icon-address"></i>地址：浙江杭州滨江区江二路57号，杭州人工智能产业园一区A幢605室</li>
					</ul>
					<div class="code-box">
						<div class="col fl">
							<span class="img-area block"> <img
								src="<?php echo $url_base;?>/statics/images/code01.png" alt="img">
							</span>
							<div class="txt">
								扫一扫<br>预览移动网站
							</div>
						</div>
						<!--end .col-->
						<div class="col fr">
							<span class="img-area block"> <img
								src="<?php echo $url_base;?>/statics/images/code02.png" alt="img">
							</span>
							<div class="txt">
								关注微信公众号<br>了解更多信息
							</div>
						</div>
						<!--end .col-->
					</div>
					<!--end .code-box-->
				</div>
			</div>
			<!--end .footer-box-->
			<div class="footer-bottom">Copyright © 2017 浙江一芯智能科技有限公司 All Rights
				Reserved 网站管理</div>
		</div>
		<!--end .footer-wrapper-->
	</div>
	<!--end .container-wrapper-->
	<script src="<?php echo $url_base;?>/statics/js/poposlides.js" type="text/javascript"></script>
	<script>
		$(".slides").poposlides();
	</script>

	<ins id="newBridge">
		<!-- target: nodeBoard -->
		<ins
			class="nb-nodeboard-base nb-nodeboard-position-base nb-nodeboard-left-bottom nb-hide"
			id="nb_nodeboard">
			<ins class="nb-nodeboard-contain-base nb-nodeboard-contain">
				<ins class="nb-nodeboard-top nb-nodeboard-top-0">
					<ins class="nb-head-title">请您留言</ins>
					<ins class="nb-nodeboard-close" id="nb_nodeboard_close"
						data-type="min"></ins>
				</ins>
				<form id="nb_nodeboard_form" autocomplete="off"
					class="nb-board-form"
					action="//p.qiao.baidu.com/cps2//bookmanage/saveBook.action?userId=24969784"
					method="post" accept-charset="utf-8">
					<ins id="nb_nodeboard_set" class="nb-nodeboard-set">
						<ins class="nb-nodeboard-content">
							<textarea id="nb-nodeboard-set-content-js" name="content"
								data-ph="请在此输入留言内容，我们会尽快与您联系。（必填）"
								placeholder="请在此输入留言内容，我们会尽快与您联系。（必填）"
								class="nb-nodeboard-set-content"></textarea>
						</ins>
						<ins class="nb-nodeboard-name" style="z-index: 4;">
							<ins class="nb-nodeboard-icon nodeName"></ins>
							<input id="nb_nodeboard_set_name" data-write="0"
								name="visitorName" maxlength="30" class="nb-nodeboard-input"
								data-ph="姓名" placeholder="姓名" type="text">
						</ins>
						<ins class="nb-nodeboard-name" id="nb_nodeboard_phone"
							style="z-index: 3;">
							<ins class="nb-nodeboard-icon nodePhone"></ins>
							<input id="nb_nodeboard_set_phone" name="visitorPhone"
								maxlength="30" class="nb-nodeboard-input" data-write="1"
								data-ph="电话（必填）" placeholder="电话（必填）" type="text">
						</ins>
						<ins class="nb-nodeboard-name" id="nb_nodeboard_mail"
							style="z-index: 2;">
							<ins class="nb-nodeboard-icon nodeMail"></ins>
							<input id="nb_nodeboard_set_email" name="visitorEmail"
								maxlength="50" class="nb-nodeboard-input" data-write="0"
								data-ph="邮箱" placeholder="邮箱" type="text">
						</ins>
						<ins class="nb-nodeboard-name" style="z-index: 1;">
							<ins class="nb-nodeboard-icon nodeAddress"></ins>
							<input id="nb_nodeboard_set_address" name="visitorAddress"
								class="nb-nodeboard-input" maxlength="50" data-write="0"
								data-ph="地址" placeholder="地址" type="text">
						</ins>
					</ins>
				</form>
				<ins class="nb-nodeboard-success" id="nb_nodeboard_success">
					<ins class="nb-success-box">
						<ins class="nb-success-icon"></ins>
						<ins class="nb-success-title" id="nb_node_messagetitle">感谢留言</ins>
						<ins class="nb-success-content" id="nb_node_messagecontent">我们会尽快与您联系</ins>
						<ins id="sucess_close" class="nb-sucess-close">关闭</ins>
					</ins>
				</ins>
				<ins class="nb-nodeboard-send" id="nb_node_contain">
					<ins id="nb_nodeboard_send"
						class="nb-nodeboard-send-btn nb-nodeboard-send-btn-0">发送</ins>
				</ins>
			</ins>
		</ins>
		<!-- end -->
		<!-- target: iconIcon -->
		<ins class="nb-icon-wrap nb-icon-base nb-icon-skin-0 nb-icon-icon"
			id="nb_icon_wrap" style="left: 1201px; top: 450px; width: 144px;">
			<ins class="nb-icon-inner-wrap" style="height: 52px; width: 144px;">
				<ins class="nb-icon-bridge0 nb-icon-bridge-base"
					data-type="iconInvite"></ins>
			</ins>
		</ins>
		<!-- end -->
		<!-- target: invite -->
		<ins
			class="nb-invite-wrap nb-invite-wrap-base nb-position-base nb-middle  "
			id="nb_invite_wrap"
			style="width: 400px; display: block; margin-left: -200px; margin-top: -88px;">
			<ins class="nb-invite-body nb-invite-skin-0" style="height: 175px;">
				<ins class="nb-invite-tool nb-invite-tool-base" id="nb_invite_tool"
					style=""></ins>
				<ins class="nb-invite-text nb-invite-text-base">
					<ins class="nb-invite-welcome nb-invite-welcome-base nb-show"
						id="nb_invite_welcome">
						<p style="color: #fff">欢迎来到本网站，请问有什么可以帮您？</p>
					</ins>
				</ins>
				<ins class="nb-invite-btn-base nb-invte-btns-0">
					<ins class="nb-invite-cancel nb-invite-cancel-base"
						id="nb_invite_cancel">稍后再说</ins>
					<ins class="nb-invite-ok nb-invite-ok-base" id="nb_invite_ok">现在咨询</ins>
				</ins>
			</ins>
		</ins>
		<!-- end -->
	</ins>
	<style>
	
	</style>
	<div id="MEIQIA-PANEL-HOLDER">
		<iframe id="MEIQIA-IFRAME"
			src="<?php echo $url_base;?>/statics/js/desktop-fiesta.htm"
			scrolling="no" allowtransparency="true" frameborder="0"></iframe>
	</div>
	<div id="MEIQIA-BTN-HOLDER" style="display: block;">
		<div id="MEIQIA-BTN">
			<span id="MEIQIA-BTN-ICON" class="MEIQIA-ICON MEIQIA-ICON-TICKET11"></span>
			<span id="MEIQIA-BTN-LINE"></span> <span id="MEIQIA-BTN-TEXT">下班了，给我们留言吧</span>
			<span id="MEIQIA-CIRCLE"></span>
			<div id="MEIQIA-BUBBLE">
				<span id="MEIQIA-BUBBLE-ARROW1"></span> <span
					id="MEIQIA-BUBBLE-ARROW2"></span> <span id="MEIQIA-BUBBLE-CLOSE"
					class="MEIQIA-ICON"></span>
				<div id="MEIQIA-BUBBLE-INSIDE">
					<img id="MEIQIA-BUBBLE-AVATAR"> <span id="MEIQIA-BUBBLE-NAME"></span>
					<div id="MEIQIA-BUBBLE-MSG"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo $url_base;?>/statics/js/clue-api.js"
		type="text/javascript"></script>
	<div id="MEIQIA-INVITE">
		<span id="MEIQIA-INVITE-CLOSE" class="MEIQIA-ICON"></span>
		<div id="MEIQIA-INVITE-INSIDE">您好，当前有专业客服人员在线，让我们来帮助您吧。</div>
		<span id="MEIQIA-INVITE-ARROW1"></span> <span
			id="MEIQIA-INVITE-ARROW2"></span>
	</div>
	<script src="<?php echo $url_base;?>/statics/js/getbid.htm"></script>
</body>