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
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="./css-2i-hackcc/zing.css" rel="stylesheet" media="screen" />
	<title><?php if($title==Null){echo ('Gà Tân Sửu- Bộ tộc Gunny - Server giải trí đỉnh cao');} else { echo $title;}?></title>
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
	<link href="./css-2i-hackcc/showitemvq.css" media="screen" rel="stylesheet" type="text/css">
	<link href="./css-2i-hackcc/show-acc.css" media="screen" rel="stylesheet" type="text/css">
	<link href="./css-2i-hackcc/thongtinacc.css" media="screen" rel="stylesheet" type="text/css">
    <link type="text/css" href="./css-2i-hackcc/index.css" rel="stylesheet" />
	<script type="text/javascript" src="javascr-2i-none/mainsite.js"></script>
    <script src="javascr-2i-none/bootstrap.min.js"></script>
    <script src="javascr-2i-none/bootstrap-dialog.js"></script>
    <script src="javascr-2i-none/jquery.paginate.js" type="text/javascript"></script>
    <script src="javascr-2i-none/subpage.js" type="text/javascript"></script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>


<script src="javascr-2i-none/menu.js"></script>
<body onkeydown="return false">
<style>
.head_nav.fix {
  left: 0;
  max-width: 100%;
  overflow: visible;
  display: block;
  position: fixed !important;
  top: 0;
  width: 100%;
  z-index: 1000;
}
.infoUser {
	color : red;

	text-align: center;
}
.head_nav.fix ul li a{
	text-align : left;
	font-size: 16px;
	color: red;
	margin-top: 20px;
	display:block;position:relative;
}
@keyframes top
{
    0%      {transform: rotate(0deg);left:0px;}
    25%     {transform: rotate(20deg);left:0px;}
    50%     {transform: rotate(0deg);left:500px;}
    55%     {transform: rotate(0deg);left:500px;}
    70%     {transform: rotate(0deg);left:500px; background: url(../nav-right.png) no repeat;}
    100%    {transform: rotate(-360deg);left:0px;}
}

#top
{
    display: block;
    margin-top: 0px;
    background: url(../nav-right.png) no repeat;
    position:relative;

    // animation
    animation:top 15s infinite;
    -moz-animation:top 15s infinite;
    -webkit-animation:top 15s infinite;
    -o-animation:top 15s infinite;
}

@keyframes top
{
    0%      {transform: rotate(0deg);top:0px;}
    25%     {transform: rotate(0deg);top:50px;}
    50%     {transform: rotate(0deg);top:100px;}
    55%     {transform: rotate(0deg);top:150px;}
    70%     {transform: rotate(0deg);top:200px; background: url(../nav-right.png) no repeat;}
    100%    {transform: rotate(0deg);top:0px;}
}

@-webkit-keyframes top
{
    0%      {transform: rotate(0deg);top:0px;}
    25%     {transform: rotate(5deg);top:50px;}
    50%     {transform: rotate(0deg);top:100px;}
    55%     {transform: rotate(0deg);top:150px;}
    70%     {transform: rotate(0deg);top:200px; background: url(../nav-right.png) no repeat;}
    100%    {transform: rotate(0deg);top:0px;}
}

@-moz-keyframes top
{
    0%      {transform: rotate(0deg);top:0px;}
    25%     {transform: rotate(5deg);top:50px;}
    50%     {transform: rotate(0deg);top:100px;}
    55%     {transform: rotate(0deg);top:150px;}
    70%     {transform: rotate(0deg);top:200px; background: url(../nav-right.png) no repeat;}
    100%    {transform: rotate(0deg);top:0px;}
}

@-o-keyframes top
{
    0%      {transform: rotate(0deg);top:0px;}
    25%     {transform: rotate(5deg);top:50px;}
    50%     {transform: rotate(0deg);top:100px;}
    55%     {transform: rotate(0deg);top:150px;}
    70%     {transform: rotate(0deg);top:200px; background: url(../nav-right.png) no repeat;}
    100%    {transform: rotate(0deg);top:0px;}
}
</style>
   <!-- <div id="topbar"></div> -->
    <div id="wrapper">
        <div class="wrapperIn"  >
			<div id="container">
				<div class="left-side" >     
					<!--block main navigation -->
					
					<div id='left-nav'>				 
						<ul>
							<li id="tabmenu1"  class="has-sub">
								<a id="submenu1" class="left-nav_item-mamnon" data-active-path="" style="text-shadow: rgba(255, 255, 255, 0.34902) 0px 1px 0px;" target="_self" title="">Tài Khoản</a>
								<ul>
									<li>
										<a href="/tai-khoan/lich-su-dang-nhap" routerlink="/tai-khoan/lich-su-dang-nhap">Đổi Pass Cấp 2</a>
									</li>
									<li>
										<a href="/tai-khoan" routerlink="/tai-khoan">Đổi Mật Khẩu</a>
									</li>
									<li>
										<a href="/tai-khoan/two-factor-authentication" routerlink="/tai-khoan/two-factor-authentication">Quên Mật Khẩu Rương</a>
									</li>
									<li>
										<a href="/tai-khoan/doi-mat-khau" routerlink="/tai-khoan/doi-mat-khau">Đổi xu khóa - Cash</a>
									</li>
									<li>
										<a href="/tai-khoan/doi-so-dien-thoai" routerlink="/tai-khoan/doi-so-dien-thoai">Đổi Xu - Cash</a>
									</li>
									<li>
										<a href="/tai-khoan/doi-email" routerlink="/tai-khoan/doi-email">Đổi Xu khóa - Xu</a>
									</li>
								</ul>
							</li>
							<li id="tabmenu2" class="has-sub">
								<a id="submenu2" class="left-nav_item-tieuhoc" data-active-path="" style="text-shadow: rgba(255, 255, 255, 0.34902) 0px 1px 0px;" target="_self" title="Nạp Thẻ">Nạp Thẻ</a>
								<ul>
									<li>
										<a href="/nap-the-cham">Nạp thẻ</a>
									</li>
									<li>
										<a href="/nap-gnb?PayType=4">Bảng giá & quà tặng</a>
									</li>
								</ul>
							</li>
							<li id="tabmenu3" class="has-sub">
								<a id="submenu3" class="left-nav_item-cap2" data-active-path="" style="text-shadow: rgba(255, 255, 255, 0.34902) 0px 1px 0px;" target="_self" title="Cửa Hàng">Cửa Hàng</a>
								<ul>
									<li>
										<a href="/cua-hang" routerlink="/cua-hang">Mua Sắm</a>
									</li>
									<li>
										<a href="/cua-hang" routerlink="/cua-hang">Cửa hàng V.I.P</a>
									</li>
								</ul>
							</li>
							<li id="tabmenu4" class="has-sub">
								<a id="submenu4" class="left-nav_item-cap3" data-active-path="" style="text-shadow: rgba(255, 255, 255, 0.34902) 0px 1px 0px;" target="_self" title="Sự Kiên">Sự Kiện</a>
								<ul>
									<li>
										<a href="/su-kien/doi-code" routerlink="/su-kien/doi-code">Đổi GiftCode</a>
									</li>
									<li>
										<a href="/su-kien/nhan-code" routerlink="/su-kien/nhan-code">Nhận code live stream</a>
									</li>
									<li>
										<a href="/su-kien/nhap-code" routerlink="/su-kien/nhap-code">Nhập code các sự kiện</a>
									</li>
									<li>
										<a href="/su-kien/giai-dau" routerlink="/su-kien/giai-dau">Giải Đấu</a>
									</li>
									<li>
										<a href="/su-kien/dau-gia-nguoc" routerlink="/su-kien/dau-gia-nguoc">Đấu giá ngược</a>
									</li>
								</ul>
							</li>
							<li id="tabmenu5" class="has-sub">
								<a id="submenu5" class="left-nav_item-daihoc" data-active-path="" style="text-shadow: rgba(255, 255, 255, 0.34902) 0px 1px 0px;" target="_self" title="Tính năng">Tiện ích</a>
								<ul>
									<li>
										<a href="/mua-ban/ban-code" routerlink="/mua-ban/ban-code">Online nhận Cash</a>
									</li>
									<li>
										<a href="/mua-ban/mua-code" routerlink="/mua-ban/mua-code">Danh hiệu Địa phương</a>
									</li>
									<li>
										<a href="/mua-ban/ban-xu" routerlink="/mua-ban/ban-xu">Gia hạn vật phẩm</a>
									</li>
									<li>
										<a href="/mua-ban/mua-xu" routerlink="/mua-ban/mua-xu">Nâng cấp vật phẩm</a>
									</li>
									<li>
										<a href="/mua-ban/ban-nickname" routerlink="/mua-ban/ban-nickname">Cộng dồn hợp thành</a>
									</li>
									<li>
										<a href="/mua-ban/mua-nickname" routerlink="/mua-ban/mua-nickname">Tẩy thẻ bài +999</a>
									</li>
									<li>
										<a href="/mua-ban/mua-nickname" routerlink="/mua-ban/mua-nickname">Trùng sinh</a>
									</li>
									<li>
										<a href="/mua-ban/mua-nickname" routerlink="/mua-ban/mua-nickname">Hạ công</a>
									</li>	
									<li>
										<a href="/mua-ban/mua-nickname" routerlink="/mua-ban/mua-nickname">Xóa pet 5*</a>
									</li>
									<li>
										<a href="/mua-ban/mua-nickname" routerlink="/mua-ban/mua-nickname">Xóa rác</a>
									</li>									
								</ul>
							</li>
							<li id="tabmenu6" class="has-sub">
								<a id="submenu6" class="left-nav_item-thucung" data-active-path="" style="text-shadow: rgba(255, 255, 255, 0.34902) 0px 1px 0px;" target="_self" title="Tiện Ích">Tin Tức</a>
								<ul>
									<li>
										<a href="/tien-ich/tang-cap-ma-thach" routerlink="/tien-ich/tang-cap-ma-thach">Tin tức khuyến mại</a>
									</li>
								</ul>
							</li>
							<li id="tabmenu7" class="has-sub">
								<a id="submenu7" class="left-nav_item-thucuoi" data-active-path="" style="text-shadow: rgba(255, 255, 255, 0.34902) 0px 1px 0px;" target="_self" title="Bảng TOP">Xếp Hạng</a>
								<ul>
									<li>
										<a href="/tin-tuc/giao-dien-moi" routerlink="/tin-tuc/giao-dien-moi">Top lực chiến</a>
									</li>
									<li>
										<a href="/huong-dan/xoa-cache" routerlink="/huong-dan/xoa-cache">Top Online</a>
									</li>
									<li>
										<a href="/huong-dan/choi-game-tren-website" routerlink="/huong-dan/choi-game-tren-website">Top Win</a>
									</li>
									<li>
										<a href="/huong-dan/diem-danh-nhan-qua" routerlink="/huong-dan/diem-danh-nhan-qua">Top Danh Vọng</a>
									</li>
									<li>
										<a href="/huong-dan/fix-allow-tren-launcher" routerlink="/huong-dan/fix-allow-tren-launcher">Top Cash</a>
									</li>
									<li>
										<a href="/huong-dan/su-dung-launcher-choi-game" routerlink="/huong-dan/su-dung-launcher-choi-game">Top Công Trạng</a>
									</li>
									<li>
										<a href="/huong-dan/huong-dan-quay-vong-quay-may-man" routerlink="/huong-dan/huong-dan-quay-vong-quay-may-man">Top Nạp Thẻ Tuần</a>
									</li>
									<li>
										<a href="/huong-dan/bao-danh-dua-top-win" routerlink="/huong-dan/bao-danh-dua-top-win">Top Tiêu Cash Shop</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>	 
				</div>   
				
				
					<div id="header">
					    <div class="TopLink">
							<ul>
								<li><a  title="Trở về Trang chủ Gunny" href="/" >Trang chủ</a>|</li>
								<li><a title="Fanpage" href="https://www.facebook.com/Gà Tân Sửucom-Gunny-gi%E1%BA%A3i-tr%C3%AD-%C4%91%E1%BB%89nh-cao-109081437377813" target="_blank" >Fanpage</a></li>
							</ul>
							
						</div>                      
                           <a class="downloadgame" href="/s2/"> </a>    
						   
					</div>
					<div id="MainContent">
					
						<div class="main-content__header">
							<h3><marquee><span style="color: blue;background:orange; border-radius: 10px;"> <img src="./images/icon.png" style="width:40px;"> ADMIN thông báo: Máy chủ bảo trì, Mọi dữ liệu được đảm bảo tuyệt đối, Page hoạt động 24/24, mọi người nói chuyện trao đổi tại mục Box Chém Gió nhé! <strong> <span style="color: red;"><?=$_SESSION['Nickname'];?></span> </strong>Vui lòng ghé Page để biết thêm thông tin chi tiết!</span></marquee></h3>                      
						</div>
					<div class="news_ct">
						  <?php if(!isset($_GET[ 'p']) && ($_SESSION['UserID'])){
									
								include "2i-chuc-nang/chuc-nang/qua-nap-the.php";
						  }
								else if(!$_SESSION['ShopID'] && !isset($_GET[ 'p']))
									{ 
											include "2i-chuc-nang/chuc-nang/gioi-thieu.php"; 
											
									   }else{
										   
									   }
							?>
						<?php    if(isset($_GET[ 'p']))
								{
								   include getContentPage($_GET[ 'p']);				   
								}  
						?> 
					</div>
				
			</div>
			
			<div id="Footer">
			

			</div>  
			
		</div>
		
			</div>
    </div>
    			
	<script type="text/javascript">
        jQuery(document).ready(function($) {
            var $filter = $('#top');
            var $filterSpacer = $('<div />', {
                "class": "vnkings-spacer",
                "height": $filter.outerHeight()
            });
            if ($filter.size())
            {
                $(window).bind('scroll', function ()
                {
                    if ($(window).scrollTop() >= 0)
                    {
                        $filter.before($filterSpacer);
                        $filter.addClass("fix");
                    }
                });
            }
 
        });
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
				$.post("/ajaxweb/getmoney.php", "",
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
</body>
</html>