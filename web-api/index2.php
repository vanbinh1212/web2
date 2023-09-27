<html xmlns="http://www.w3.org/1999/xhtml">
<?php
error_reporting(E_ALL & ~E_NOTICE & ~8192);
#Khoi tao session
session_start();
//session_destroy();
#Khai bao hang
define('Kh4nhHuy3z!99^H2S04','Fuck You',true);
#Include file
include_once "connect.php";
include_once "function.php";
$playgame='choi-game.php';
@$data->query("Update Sys_Users_Detail set Onlinetime=0 Where Onlinetime <0");
$username = $_SESSION['Username'];
	$q = @$data->query("Select UserID,UserName,NickName,Money,Grade from Sys_Users_Detail Where UserName = '$username'");
			if(@$data->query_num($q) == 1) {
				$info = @$data->query_array($q);
				$_SESSION['UserID']   = $info['UserID'];
				$_SESSION['Nickname'] = $info['NickName'];
			}
if($_GET['p']=='doc-tin-tuc')
{
$thutu=$_GET['id'];
$sql = $data->query("SELECT * FROM Bang_tin WHERE ID='$thutu'","mem");
$data->query("Update Bang_tin set xem+='1' WHERE ID='$thutu'","mem");
$result = @$data->query_array($sql);
if($thutu==0)
{
	$result['Type']='HỖ TRỢ';
	$result['TieuDe']='GỬI Ý KIẾN ĐÓNG GÓP,KHUYẾN NẠI';
	$result['NoiDung']='Mọi ý kiến đóng góp,khiếu nại,cần hỗ trợ các bạn vui lòng bình luận xuống bên dưới<br>
	Hàng ngày admin sẽ đọc và giải quyết mọi thắc mắc của các bạn tại mục này.
	';
}
if($thutu=='rao-vat')
{
	$result['Type']='RAO VẶT';
	$result['TieuDe']='NƠI MUA BÁN TRAO ĐỔI ACC,ĐỒ GAME...';
	$result['NoiDung']='Mọi người cần mua bán acc,đồ game ... thì rao tại mục này nhé
	';
}
$title=''.$result['Type'].' - '.$result['TieuDe'].'';
}
//die('Bảo trì ít phút vui lòng quay lại sau');
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php if($title==Null){echo ('Gà Tân Sửu- Đẳng cấp là mãi mãi | Server giải trí đỉnh cao');} else { echo $title;}?></title>
    <meta name="distribution" content="global">
    <meta name="resource-type" content="document">
    <meta name="language" content="vi">
    <meta name="robots" content="noodp,index,follow">
    <meta name="revisit-after" content="1 days">
	<meta property="fb:app_id" content="196250104205266"/>
	<meta property="fb:admins" content="100015549549442"/>
	  <link href="./css-2i-hackcc/styles.css" rel="stylesheet" type="text/css">
    <link href="./css-2i-hackcc/styles_2.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="../..//css-2i-hackcc/index.css" rel="stylesheet" />
    <link href="./css-2i-hackcc/colorbox.css" rel="stylesheet" type="text/css">
    <link href="./css-2i-hackcc/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="./css-2i-hackcc/font-awesome.min.css" media="screen" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="http://img.zing.vn/gn/images/favicon.ico" type="image/x-icon" />
    <link href="./css-2i-hackcc/jselect-theme.css" media="screen" rel="stylesheet" type="text/css">
    <link href="./css-2i-hackcc/style_pay.css" media="screen" rel="stylesheet" type="text/css">
	 <link href="./css-2i-hackcc/showitemvq.css" media="screen" rel="stylesheet" type="text/css">
	  <link href="./css-2i-hackcc/show-acc.css" media="screen" rel="stylesheet" type="text/css">
	  <link href="./css-2i-hackcc/thongtinacc.css" media="screen" rel="stylesheet" type="text/css">
    <link type="text/css" href="./css-2i-hackcc/index.css" rel="stylesheet" />
	 <script type="text/javascript" src="javascr-2i-none/mainsite.js"></script>
    <script src="javascr-2i-none/bootstrap.min.js"></script>
    <script src="javascr-2i-none/bootstrap-dialog.js"></script>
    <script src="javascr-2i-none/jquery.paginate.js" type="text/javascript"></script>
    <script src="javascr-2i-none/subpage.js" type="text/javascript"></script>
	<!-- Google-->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	</script>
	
	<style>
		.list_temp{
		margin-top: 1px
		}
		.mid_prite {
		-moz-border-radius: 65px;
		-webkit-border-radius: 65px;
		-ms-border-radius: 65px;
		-o-border-radius: 65px;
		border-radius: 55px;
		opacity: 0.7;
		}
	</style>
	
	<!-- Google-->
	<script>
	//_pe.subscribe();
	// Get money
	function formatCurrency(num) 
	{
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
    num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    num = Math.floor(num/100).toString();
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    num = num.substring(0,num.length-(4*i+3))+','+
    num.substring(num.length-(4*i+3));
    return (((sign)?'':'-') + num);
	}
	function reloadMoney() {
				$("#gocoin_text").html('<img src="images/loadvx.gif" height="15" width="15" />');
				$("#xukhoa_text").html('<img src="images/loadvx.gif" height="15" width="15" />');
				$("#diemthuong_text").html('<img src="images/loadvx.gif" height="15" width="15" />');
				$("#xu_text").html('<img src="images/loadvx.gif" height="15" width="15" />');
				$("#tien_text").html('<img src="images/loadvx.gif" height="15" width="15" />');
				$.post("/ajax/getmoney.php", "",
					function (content) {
						$("#gocoin_text").html(formatCurrency(content['gocoin']));
						$("#xukhoa_text").html(formatCurrency(content['xukhoa']));
						$("#diemthuong_text").html(formatCurrency(content['diemthuong']));
						$("#xu_text").html(formatCurrency(content['xugame']));
						$("#tien_text").html(formatCurrency(content['tiendu']));
						$("#txtgocoin").val(content['gocoin']);
						$("#txtxukhoa").val(content['xukhoa']);
						$("#txtdiem").val(content['diemthuong']);
						$("#txtxu").val(content['xugame']);
						$("#txttiendu").val(content['tiendu']);
					}, 'json');
	}
	reloadMoney();
	</script>
    <style type="text/css">
        .cf-hidden {
            display: none;
        }
        
        .cf-invisible {
            visibility: hidden;
        }
    </style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1899783760291478";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>

<body>
<?php if(!$_SESSION[ 'ShopID']) {?>
    <div class="navtopIN">
        <div class="menubg_fix">
            <div class="margin_auto">
                <div class="gamecenter">
                    <div class="login_register">
                        <a class="topup" href="/">Trang Chủ </a>
                        <a class="topup" href="?p=dang-ky">Đăng ký </a>
                        <a class="topup" href="?p=dang-nhap">Đăng Nhập </a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>

    <div class="baoall">
	
        <div class="outer">
            <div class="header">
                <div class="wrapper">
					
                    <div class="logo">
                    </div>
                </div>
            </div>
            <div class="sprite">
                <div class="wrapper">
				<div class="nav_top">
						<ul class="left_nav">
						<li> <a href="index.php" title="gunny, guuny miễn phí, gunny free, gunny lậu, gunlau, gun viet, gunny online, guny, gunny mien phi xu, hack gunny, hack gunny mien phi, hack gunny lau, gunny zing me, gunny mien phi xu, gunny mien phi 2017, gunny mien phi xu tieng viet, s1, s2, s3, s4, s5, gunny pro, gunny 2, dang ki gunny lau, gunny lau trung quoc, web gunny lau, dang ki gunny lau, choi gunny lau, dang ki gunny lau, gunny free xu, gun 2017, gunny private, gunny 2017, garobot, gunny teen, guuny azo, gunny 2, gunny vang, gunny bac, gunny 1">Trang Chủ </a> </li>
						<span class="right_iconMN"> </span>
						<li> <a href="index.php?p=qua-nap-the" title="gunny, guuny miễn phí, gunny free, gunny lậu, gunlau, gun viet, gunny online, guny, gunny mien phi xu, hack gunny, hack gunny mien phi, hack gunny lau, gunny zing me, gunny mien phi xu, gunny mien phi 2017, gunny mien phi xu tieng viet, s1, s2, s3, s4, s5, gunny pro, gunny 2, dang ki gunny lau, gunny lau trung quoc, web gunny lau, dang ki gunny lau, choi gunny lau, dang ki gunny lau, gunny free xu, gun 2017, gunny private, gunny 2017, garobot, gunny teen, guuny azo, gunny 2, gunny vang, gunny bac, gunny 1">Quà Nạp</a> </li>
						<span class="right_iconMN"> </span>
						<li> <a href="index.php?p=code" title="gunny, guuny miễn phí, gunny free, gunny lậu, gunlau, gun viet, gunny online, guny, gunny mien phi xu, hack gunny, hack gunny mien phi, hack gunny lau, gunny zing me, gunny mien phi xu, gunny mien phi 2017, gunny mien phi xu tieng viet, s1, s2, s3, s4, s5, gunny pro, gunny 2, dang ki gunny lau, gunny lau trung quoc, web gunny lau, dang ki gunny lau, choi gunny lau, dang ki gunny lau, gunny free xu, gun 2017, gunny private, gunny 2017, garobot, gunny teen, guuny azo, gunny 2, gunny vang, gunny bac, gunny 1">Giftcode</a> </li>
						<span class="right_iconMN"> </span>
						</ul>
						<ul class="right_nav">
						<li> <a href="https://www.facebook.com/Webgame-Mi%E1%BB%85n-Ph%C3%AD-Gà Tân Sửucom-109081437377813/" title="gunny, guuny miễn phí, gunny free, gunny lậu, gunlau, gun viet, gunny online, guny, gunny mien phi xu, hack gunny, hack gunny mien phi, hack gunny lau, gunny zing me, gunny mien phi xu, gunny mien phi 2017, gunny mien phi xu tieng viet, s1, s2, s3, s4, s5, gunny pro, gunny 2, dang ki gunny lau, gunny lau trung quoc, web gunny lau, dang ki gunny lau, choi gunny lau, dang ki gunny lau, gunny free xu, gun 2017, gunny private, gunny 2017, garobot, gunny teen, guuny azo, gunny 2, gunny vang, gunny bac, gunny 1">Nạp Thẻ</a> </li>
						<span class="right_iconMN"> </span>
						<li> <a href="index.php?p=shop-Vip" title="gunny, guuny miễn phí, gunny free, gunny lậu, gunlau, gun viet, gunny online, guny, gunny mien phi xu, hack gunny, hack gunny mien phi, hack gunny lau, gunny zing me, gunny mien phi xu, gunny mien phi 2017, gunny mien phi xu tieng viet, s1, s2, s3, s4, s5, gunny pro, gunny 2, dang ki gunny lau, gunny lau trung quoc, web gunny lau, dang ki gunny lau, choi gunny lau, dang ki gunny lau, gunny free xu, gun 2017, gunny private, gunny 2017, garobot, gunny teen, guuny azo, gunny 2, gunny vang, gunny bac, gunny 1">Cửa Hàng &nbsp;</a> </li>
						<span class="right_iconMN"> </span>
						<li> <a target="_blank" href="https://www.facebook.com/groups/2602825786618467/" title="gunny, guuny miễn phí, gunny free, gunny lậu, gunlau, gun viet, gunny online, guny, gunny mien phi xu, hack gunny, hack gunny mien phi, hack gunny lau, gunny zing me, gunny mien phi xu, gunny mien phi 2017, gunny mien phi xu tieng viet, s1, s2, s3, s4, s5, gunny pro, gunny 2, dang ki gunny lau, gunny lau trung quoc, web gunny lau, dang ki gunny lau, choi gunny lau, dang ki gunny lau, gunny free xu, gun 2017, gunny private, gunny 2017, garobot, gunny teen, guuny azo, gunny 2, gunny vang, gunny bac, gunny 1">Fanpage&nbsp;</a> </li>
						</ul>
						</div>
                    <div class="content">
                        <div class="temp">
                            <div class="content_alow">
                                <div class="mid_bt">
                                    <div class="left_ct">
                                        <div class="left_header">
                                            <form action="#" method="POST" name="generic-form" role="form" id="login-form" autocomplete="off">

                                                <div class="attop_tg ">
                                                    <div class="error-box" id="error-box" style="display:none;"></div>
                                                    <a class="downloadgame" href="/s1/"> </a>
                                                </div>
                                                </a>
                                                <div class="login_page">


                                                   
                                                    
                                                    <div class="button_ntdk">

                                                        
                                                        <a class="dangky_btn regis_topup" href="?p=dang-ky">Đăng Ký</a>
                                                        <a class="napthe_btn regis_topup" href="?p=dang-nhap">Đăng Nhập</a>
                                                    </div>
													<?php if($_SESSION[ 'ShopID']) {?>
													<div class="list_temp">
														<div class="mid_prite">
														   <table class="tbGameCT">
															<tbody><tr><th>Tài khoản<a href="?p=tai-khoan"> <?=$_SESSION['Username'];?></a><span>|</span>
															<a href="?p=thoat">Thoát</a></th></tr>
														    <tbody><tr><th>Tên nhân vật :[<?=$_SESSION['Nickname'];?></a><span>]</span>
															
															<tbody><tr><th>Cash :  <?echo number_format((float)loadcash($_SESSION['Username']))?>
															<tbody><tr><th>Xu:  <?echo number_format((float)loadx($_SESSION['UserID']))?>
															<tbody><tr><th>Xu khóa :  <?echo number_format((float)loadxukhoa($_SESSION['UserID']))?>
															
															<tbody><tr><th>Điểm Tích Luỹ :  <?echo number_format((float)loadC($_SESSION['UserID']))?>
															<tbody><tr><th>★Shop VIP★ Lv <?echo number_format((float)loadviptl($_SESSION['UserID']))?>
															</th></tr>
															</tbody><tbody><tr>
															</tr>													
														  </tbody></table>
														</div>
													</div>
													<?php }?>
                                                </div>
                                            </form>
                                        </div>
                                      <?php include "2i-chuc-nang/menu.php"; ?>
                                    </div>
									
                                    <div class="right_bar">
                                        <div class="news_box">
                                            <div class="title_news">
                                                <div id="static">
                                                </div>
                                                <div class="news_ct">
												
                                                   <?php 
												 //  echo $_GET[ 'page'];
												   if(isset($_GET[ 'p']))
												   {
													   include getContentPage($_GET[ 'p']);
													   
												   }else 
												   { 
														include "2i-chuc-nang/tintuc.php"; 
												   }
												   ?>
                                                </div>
                                            </div>
                                            <div class="outImt" style="display:none" id="event">
                                                <ul class="list_nta"></ul>
                                            </div>
                                        </div>

                                    </div>
									<?php //include "2i-chuc-nang/quangcao.php"; ?>
                                    <div class="bottom_bt"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
						<?php //include "2i-chuc-nang/facebook.php"; ?>
                             <li><a href="?p=web-quan-ly"><span> </span>s2.Gà Tân Sửu.com - Webgame hàng đầu Việt Nam </a> </li>
                            <style>
                                </div> </div> </div> </div> </div></div> </body> </html>
								</style><style>HTML,BODY{cursor: url("http://mangvn.org/2005/anh/chuot/vietnam.cur"), auto;}</style></style>
								