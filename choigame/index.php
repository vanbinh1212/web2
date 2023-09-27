<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
define("Gun4S.Net",true);
include "#config.php";
include "function.php";
if($_GET['logout']=='true'){
	session_destroy();
	chuyentrang('http://gunnyae.com/');
}
chuyentrang('http://gunnyae.com/');

$getserver = explode('|',$serverlist);
$i = 1;
while($getserver[$i-1] != ''){
	$i++;
}
$i--;
$rnd = rand(1,6);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="distribution" content="global">
<meta name="resource-type" content="document">
<meta name="language" content="vi">
<meta name="robots" content="noodp,index,follow">
<meta name="revisit-after" content="1 days">
<meta name="google-site-verification" content="X17toTFPCWm1zxrFsdQf3DLPzfhzB6pAmD1bLziR2cA" />

<meta name="author" content="www.gunnyae.com Gunny Free"/>
<meta property="og:image" content="http://idgunny.360game.vn/template/assets/images/bg-login-new.jpg"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="generator" content="gunny, gunny 2019, gunny lau 2019, guny 2019, gunny lau, gunny lậu, gunny lau free xu, gunny full xu, gunny lau mien phi, gunny lau moi, gunny free cash, gunny moi ra, gunny miễn phí, gunny mien phi, web gunny lau, Gunny Free ,gunny lau nhieu nguoi choi, gunny private, gunny full xu, gunny lau hay nhat, gunny lau 2015, idgunny, game gunny, id gunny, gunny 2015, gunny 2, trang chu gunny, guny, gunny mobile">
<meta name="description" content="Gunny lậu mới nhất free full xu và cash,  hay nhất 2019, Gunny lau mien phi full xu. Phiên bản gunny lậu mới nhất, ổn định nhất, đông người chơi nhất">
<meta name="keywords" content="gunny, gunny 2019, gunny lau 2019, guny 2019, gunny lau, gunny lậu, gunny lau free xu, gunny full xu, gunny lau mien phi, gunny lau moi, gunny free cash, gunny moi ra, gunny miễn phí, gunny mien phi, web gunny lau, Gunny Free ,gunny lau nhieu nguoi choi, gunny private, gunny full xu, gunny lau hay nhat, gunny lau 2015, idgunny, game gunny, id gunny, gunny 2015, gunny 2, trang chu gunny, guny, gunny mobile">

<title>
Gunbachay2022-Gunny Private 5.5
</title>
<meta name="robots" content="index,follow" />
<meta name="revisit-after" content="1days" />


<link rel="shortcut icon" href="http://gunnyae.com/images/icon.ico" type="image/x-icon" />

<link type="text/css" href="css/mainsite.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/idlogin.css?v=7" />
<link type="text/css" href="css/leftmenu.css?v=3" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="css/j-select.css?v=3" />
<link type="text/css" rel="stylesheet" href="css/j-select-theme.css?v=3" />
<link type="text/css" rel="stylesheet" href="css/style-iframe-left.css?v=4" />
<link type="text/css" rel="stylesheet" href="css/home.css?v=9" />
<link type="text/css" rel="stylesheet" href="css/jcarousel.css?v=3" />
<link href="facebook/fb.css" rel="stylesheet" type="text/css" />
<script src='facebook/js.js' type='text/javascript'></script>
    <script type='text/javascript' src='jquery.min.js'></script>
	<script type='text/javascript' src='swfobject.js'></script>
    <link href="css/home-style.css?v=7" type="text/css" rel="stylesheet" />
    <link href="css/j-navigation.css?v=3" type="text/css" rel="stylesheet" />
    <link href="css/calendar-home.css?v=3" type="text/css" rel="stylesheet" />
    <link href="css/module.css?v=3" type="text/css" rel="stylesheet" />
    <link href="css/home_event_4.css?v=3" type="text/css" rel="stylesheet" />
   <link href="css/block_facebook.css?v=5" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/hot-code.css"  />
<link rel="stylesheet" href="fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/topbar.css"/>
	
</head>

<body >
<div id="fb-root"></div>
<div id="wrapper"></div>
<div class="SideBarClose"></div>
<script type="text/javascript">
	var usernameGlobal = "";
	var passwordGlobal = "";
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '966242223397117',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    <!--trang chu-->
	<div class="topbar">
    <div class="bg-main">
        <div class="main">
            <div class="box_hot_line">
                <a target="_blank" class="icon-1" href="http://<?=$_SERVER['HTTP_HOST'];?>"></a>
            </div>
            <div class="boxclick">
                               
                               
                                        <a href="http://gunnyae.com/tai-khoan/nap-the/" class="btn_vongquay" target="_blank" style="text-align: center;
font-weight: bold;
color: #fff;
background: #088A29;
height: 36px;
line-height:36px;
padding:0 6px;
display: block;
float: left;">NẠP THẺ</a>

 <a class='bt-vipshop' href="http://gunnyae.com/tai-khoan/"
								style='text-align: center;font-weight: bold;color: #fff;background:#0081FF;padding:
								8px;height: 20px;display: block;float: 
								left;line-height:23px;'>TÀI KHOẢN</a>
								<a class='bt-vipshop' href="https://www.facebook.com/profile.php?id=100092000605483/"
								style='text-align: center;font-weight: bold;color: #fff;background:#610B5E;padding:
								8px;height: 20px;display: block;float: 
								left;line-height:23px;'>FANPAGE Gunbachay2022</a>
<a href="https://www.facebook.com/profile.php?id=100092000605483/" class="btn_vongquay" target="_blank" style="text-align: center;
font-weight: bold;
color: #fff;
background: #08088A;
height: 36px;
line-height:36px;
padding:0 10px;
display: block;
float: left;">HỘI NHÓM GUNNYPRIVATE</a>
<a href="http://gunnyae.com/tai-khoan/cua-hang/" class="webshop" target="_blank" style="text-align: center;
font-weight: bold;
color: #fff;
background: orange;
height: 36px;
line-height:36px;
padding:0 10px;
display: block;
float: left;">WEBSHOP FREE</a>


                            </div>
							
            <div class="wap_hover">
                <span class='span-active-server' id="dangChoii">Đang Chọn...</span>
                <ul class="change_server">
				<?php
				$num3 = 1;
				$i++;
				while($num3 != $i){
					echo '<li>
                        <a class="MoiNhat" href="javascript:void(0)" onclick="window.parent.choiGame('.$num3.')">'.$getserver[$num3-1].'</a>
                    </li>';
					$num3++;
				}
				$i--;
				?>
                  
                                </ul>	
            </div>
            <div class="box_username">
                <div class="wap_fix_us">
                    <span class="text-name">Chào: <font color=purple><b><i><?echo $_SESSION['ss_hlim_user']?></font></b></i></span>
					
                    <div class="wap_us_f">
                        <div class="avatarpp"></div>
                        <div class="usernamepp"></div>
                        <a href="index.php?logout=true" target="_top"><div class="logoutpp">Thoát<i></i></div></a>
                        <div class="quanly"><i></i><a class="NapThe" href="http://gunnyae.com/tai-khoan/"  title="quản lý tài khoản">quản lý tài khoản</a></div>
                    </div>
                </div>

            </div>
            <div class="box_close"></div>
        </div>
    </div>
</div>
	<!-- end trang chu -->
    <div class="SideBar" id="sidebarLeft"> <a class="Logo TrangChinh" title="Gunny lậu" href="#" >Gunny</a>
        <ul class="QuickLink">
            <li><a title="Diễn đàn" target="_blank" href="https://www.facebook.com/canhars1605" >Facebook</a></li>
            <li class="Last"><a class="NapThe" href="http://www.gunnyae.com/')"  title="Nạp thẻ">TÀI KHOẢN</a></li>
        </ul>
        <div class="BlockContent MayChu">
			<div id="userNoLogin">
				<p id="NoLoginDiv" class="ImgNoLogin"><img src="images/no-login.png" width="230" height="158" alt="Bạn chưa Login" /></p>
				 <p id="LoginDiv" class="BlockLogin" style="display:none;">Chào: <span id="txtUserName"></span></br>

			
				</br> <a href="index.php?logout=true" title="Thoát">[Thoát]</a></p>
            </div>
            <div class="Notify" id="wrapperNotify"> </div>
            <div class="BlockMayChu" style="display:none">

                <div class="ServerName">
                    <p class="TitleMayChu">Máy chủ đang chơi</p>
                    <p class="Name" id="dangChoi"></p>
                </div>
				<a href="index.php" class="DoiServer" title="Đổi server" style="display:block" > Đổi server</a>
                <!-- Begin block serverlist_maychudachoi - MTk0NjB8MjA0fHNlcnZlcmxpc3R8NTIxfGhvbWUtbmV3MjAxNHxtYXljaHVkYWNob2l8UEhQ --><!-- End block serverlist_maychudachoi -->
            </div>
            <div class="BoxIframe">
				<!-- Begin block napthe_leftmenu_napthe_leftmenu - MjA3fG5hcHRoZV9sZWZ0bWVudXw1MjF8aG9tZS1uZXcyMDE0fG5hcHRoZV9sZWZ0bWVudXxIVE1M --><div class="BtLink"> <a class="NapThe" href="http://gunnyae.com/tai-khoan/nap-the/" onclick="quickOpenID('<?php echo Link_WebShop;?>/?page=napthe')"  title="Nạp thẻ">+100&#37;</a> <a class="NhanCode" href="http://facebook.com/Gunbachay2022" onclick="quickOpenID('<?php echo Link_WebShop;?>/?page=eventmenu');"  title="Nhận code" >Nhận code</a> </div><!-- End block napthe_leftmenu_napthe_leftmenu -->
			<!--div class="BtLink"> <a class="NapThe"  target="_blank" onclick="_gaq.push(['_trackEvent','Nap the', 'BoxIframe', 'Home-new2014',1]);" href="https://pay.zing.vn/zingxu/napthe.zg.html"  title="Nạp thẻ">+120&#37;</a> <a class=" NhanCode" onclick="_gaq.push(['_trackEvent','Hot Code', 'Button Image', 'Home-new2014',1]);" href="javascript:void(0)" title="Nhận code" >Nhận code</a> </div-->
                <a  href="#" onclick="_gaq.push(['_trackEvent','Huong dan nguoi choi moi', 'Button Image', 'Home-new2014',1]);" title="Hướng dẫn người chơi mới" class="BtnHuongDan">Hướng dẫn người chơi mới</a> 

                <!-- Begin block banner_banner-left - MTk0NDB8MTkxfGJhbm5lcnw1MjF8aG9tZS1uZXcyMDE0fGJhbm5lci1sZWZ0fFBIUA --><div id="boxEvent">
    <ul id="img">
         <li
            
 class="ActiveBanner" >
            	<a class="NapThe" href="javascript::void(0)" onclick="" title="Rương Gà"><img width="208" height="138" src="images/r1.jpg" alt="Rương Gà"/></a>
            </li>
         <li
            
>
            	<a class="NapThe" href="javascript::void(0)" onclick="
				'<?php echo Link_WebShop;?>/?page=webshop')" title="Xí Ngầu"><img width="208" height="138" src="images/r2.jpg" alt="Xí Ngầu"/></a>
            </li>
         <li
            
>
            	<a class="NapThe" href="javascript::void(0)" onclick="" title="Khuyến Mãi"><img width="208" height="138" src="images/r3.jpg " alt="Khuyến Mãi"/></a>
            </li>
         <li
            
>
            	<a class="NapThe" href="javascript::void(0)" onclick="" title="Sao May Mắn"><img width="208" height="138" src="images/r4.jpg" alt="Sao May Mắn"/></a>
            </li>
         <li
            
>
            	<a class="NapThe" href="javascript::void(0)" onclick="" title="Server 1 GÀ ASM"><img width="208" height="138" src="images/r5.jpg" alt="Server 1 GÀ ASM"/></a>
            </li>
            </ul>
    <ul id="imgControl">
                    <li class="no1"><a  onclick="_gaq.push(['_trackEvent','Event Header', 'position 1', 'Tang xu 150 Mini',1]);" href="#" title="Khuyến mãi 100% khi nạp ATM">
            1            </a></li>
                    <li class="no2"><a   onclick="_gaq.push(['_trackEvent','Event Header', 'position 2', 'Rong Nuoc main',1]);" href="#" title="WebShop Siêu rẻ,Tiện lợi">
            2            </a></li>
                    <li class="no3"><a   onclick="_gaq.push(['_trackEvent','Event Header', 'position 3', 'Qua Tang Tri An',1]);" href="#" title="Quà Tặng Tri Ân">
            3            </a></li>
                    <li class="no4"><a   onclick="_gaq.push(['_trackEvent','Event Header', 'position 4', 'Ga Xep Hinh Mini',1]);" href="#" title="Máy Chủ GÀ ASM">
            4            </a></li>
                    <li class="no5"><a   onclick="_gaq.push(['_trackEvent','Event Header', 'position 5', 'Tang Code Ga Hanh Mini',1]);" href="#" title="Khuyến mãi 50% khi nạp Card">
            5            </a></li>
            </ul>

</div>


<!-- End block banner_banner-left --> 

               
                <div class="LeftBlockEvent">
                   
                     <!-- Begin block event_su-kien-left - MTk0NDF8NDB8ZXZlbnR8NTIxfGhvbWUtbmV3MjAxNHxzdS1raWVuLWxlZnR8UEhQ -->     <h2>Hôm nay có sự kiện</h2>
      <a  title="Sự kiện đang diễn ra" class="ViewMoreEventLeft" href="#">Sự kiện đang diễn ra</a>
  
        	  <div class="BlockEvent  In-game_0">

		<div id="dataEvent_0" >
	<ul >
			<li >
            	<a title="Fanpage" href="https://www.facebook.com/profile.php?id=100092000605483/" target="_blank" >Event Nhận Code </a>  
			</li>		    
			
			</ul>
 </div>
	  </div>
	 
 
  <!-- End block event_su-kien-left --> 
                    
                </div>
                <div id="BlockNews">
                    
                    <!-- Begin block news_tin-tuc-left - MTk0NDJ8NHxuZXdzfDUyMXxob21lLW5ldzIwMTR8dGluLXR1Yy1sZWZ0fFBIUA --><h2><a title="Tin tức" href="#">Tin tức</a></h2>
<a title="Tin tức" class="ViewMoreEventLeft" href="#" >Tin tức</a>

<!-- Tab content -->
<ul class="ListNews" id="MTk0NDJ8NHxuZXdzfDUyMXxob21lLW5ldzIwMTR8dGluLXR1Yy1sZWZ0fFBIUA">
             <li >
            	<a class="NapThe" href="javascript::void(0)" onclick="" >SERVER Gunbachay2022 
				</a>
			    
			</li>		
			-SERVER1 : GÀ ASM ....<br>
			
             

 </ul>
<!-- END. Tab content -->
<!-- End block news_tin-tuc-left --> 
                                  </a><br /><br /><hr /><br />
				        		 <!--a href="ymsgr:sendim?liemphan365"><img src="http://opi.yahoo.com/online?u=liemphan365&m=g&t=2"/><br /-->
                                 <b>  •Phiên Bản : 5.5•<b> 
                                 </a><br /><br /><hr /><br />                  
                </div>
            </div>
        </div>
        <a href="javascript:void(0);" onclick="_gaq.push(['_trackEvent','Close-Open', 'Button Image', 'Home-new2014',1]);" title="Đóng/Mở" id="control" class="Control CloseBtn">Đóng / Mở</a> 
<a href="javascript:void(0);" onclick="_gaq.push(['_trackEvent','Close-Open', 'Button Image', 'Home-new2014',1]);" title="Đóng/Mở" id="control2" class="Control Control2 CloseBtn">Đóng / Mở</a> 
</div>
    <div id="iframeGame">
        <!-- Begin block login_formlogin - MTk0NTh8MjAzfGxvZ2lufDUyMXxob21lLW5ldzIwMTR8Zm9ybWxvZ2lufFBIUA --> 

<!--div id="flashContent"></div-->
<img class="BgIDLogin" src="http://idgunny.360game.vn/template/assets/images/bg-login-new.jpg" alt=""/>
        <div id="container"> 
<a href="#"  title="Đăng nhập chơi ngay"  class="BtnDangNhap">Đăng nhập chơi ngay</a> 
            
            <div class="BgLogin">
                <form id="form1" method="post" action="#" id="frmLoginHome" method="post" onsubmit="return checklogin();">
                    <div class="frm_dangnhap">
                        <input type="text" name="u" value="Tài khoản ID" class="txt_box" id="u"/>
                        <input type="password" name="p" value="Mật khẩu" class="txt_box" id="p" />
                        <input type="hidden" name="c" id="c" value="0"/>
                    </div>
                    <div class="frm_button">
                       <input type="submit" value="Chơi ngay" class="ChoiNgay"/>
                    </div>
                    <p id="txtErrorReport" class="InfoError"></p> 
                </form>
<a class="NapThe" href="http://gunnyae.com/?p=lay-lai-mat-khau-bi-quen" >Quên mật khẩu ?</a>
                <div class="BlockNewUser"> <strong class="Question"><a onclick="openYahooPopup();" href="javascript:void(0);">
                        <img src="images/yahoo.png" alt="" />
                    </a>
                    <a onclick="openGooglePopup();" href="javascript:void(0);">
                        <img src="images/google.png" alt="" />
                    </a>
                    <a href="javascript:void(0);" onclick="openFacebookPopup();">
                        <img src="images/fb.png" alt="" />
                    </a> </strong><a href="http://gunnyae.com/" target="_blank" title="Đăng ký nhanh" id="zme-registerwg" class="DangKyNhanh">Đăng ký nhanh</a> </div>
<a href="#" title="Thu nhỏ" class="ThuNho">Thu nhỏ</a> 
            </div>
        </div><!-- End block login_formlogin -->

</div>



<script type="text/javascript" src="js/mainsite.js?v=1"></script> 
<script type="text/javascript" src="js/j-select.js"></script> 
<script type="text/javascript" src="js/j-select.external.js?v=1"></script> 
<script type="text/javascript" src="js/fadegallery.js"></script> 
<script type="text/javascript" src="js/common.js?v=10"></script> 

<script type="text/javascript" src="js/json-notify.js?v=1"></script>
<script type="text/javascript" src="js/carousel.js?v=1"></script>
<script type="text/javascript" src="js/common-server.js?v=1"></script>

 <script type="text/javascript" src="js/navigation.js?v=1"></script>
    <script type="text/javascript" src="js/call_navigation.js?v=1"></script>
    <script type="text/javascript" src="js/fadegallery.js?v=1"></script>
	<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<script type="text/javascript" src="js/widget-login-gn-leftmenu.js?v=3"></script>
      <script type="text/javascript" >
    activemenu_nav ="menu2"
    </script>
 <script type="text/javascript" src="js/block_facebook.js?v=1"></script>
 <script type="text/javascript" src="js/popup.js"></script> 
 <script type="text/javascript" src="fancybox/jquery.fancybox.pack.js"></script>
  <script type="text/javascript" src="fb/fb-traffic-pop.min.js"></script>
  <link type="text/css" rel="stylesheet" href="fb/fb-traffic-pop.css">
<script type="text/javascript" >
		var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
        
		$(document).ready(function(){
            jQuery('#codeClose').bind('click', function() {
                closeVideo('codePopup');
                
                    return false;
            });
			if(jQuery("#u").length>0){jQuery('#u').bind('focus',function(){if(jQuery(this).val()=='Tài khoản ID'){jQuery(this).val('');}});jQuery('#u').bind('blur',function(){if(jQuery(this).val()==''){jQuery(this).val('Tài khoản ID');}});}
if(jQuery("#p").length>0){jQuery('#p').bind('focus',function(){if(jQuery(this).val()=='Mật khẩu'){jQuery(this).val('');}});jQuery('#p').bind('blur',function(){if(jQuery(this).val()==''){jQuery(this).val('Mật khẩu');}});}

           // jQuery('.NhanCode').bind('click', function() {
                // createOverlays("codePopup"); 
                
                 //   return false;
           // });
		   <?php
	if(isset($_SESSION['ss_hlim_userid'])) { 
	$infouser = loaduser($_SESSION['ss_hlim_user']);
	$cash = $infouser['Money'];
	if ($infouser['IsBan'] == 1){
	session_destroy();
	}else{
	?>
	CreateLogin(true, "<?php echo $_SESSION['ss_hlim_user'];?>" , "<?php echo $_SESSION['ss_hlim_getpass_user'];?>", "", "<?php echo number_format($cash) ?>", "<?php echo $_SESSION['ss_hlim_user'];?>"); CreateSelectServer();
	
	<?php
	}
	}
	
	?>
						popupAds();        });
		
		function popupAds() {
			 // $.fancybox.open('<a href="<?php echo Link_WebShop;?>/index.php?page=napthe" target="_blank"><img src="http://gunny3z.com/images/khuyenmai.jpg" /></a>');
		}

		function quickOpenID(url) {
			$(document).ready(function() {
				$.fancybox({
					type: 'iframe',
				    href: '<?php echo Link_WebShop;?>/quicklogin.php?username='+ usernameGlobal +'&password='+ passwordGlobal +'&url=' + Base64.encode(url),
					width: '100%',
					height: '90%'
				});
			});
		}
		function register(url) {
			$(document).ready(function() {
				$.fancybox({
					type: 'iframe',
					href: '<?php echo Link_WebShop;?>/register.php',
					width: '100%',
					height: '90%'
				});
			});
		}
		function choiGame(serverid) {
			var serverName = "Không xác định";
			var urlLoad = "";
			switch(serverid) {
				<?php
				$num3 = 1;
				$i++;
				while($num3 != $i){
					echo 'case '.$num3.':
					serverName = "'.$getserver[$num3-1].'";
					urlLoad = "server_'.$num3.'.php";
					break;';
					$num3++;
				}
				$i--;
				?>
							}
			$("#dangChoi").html(serverName);
			$("#dangChoii").html(serverName);
			$("#iframeGame").css("left", "225px").html('<iframe class="autoHeight" name="_opener" scrolling="no" width="100%" height="1000" src="' + urlLoad + '" frameborder="0" allowtransparency="true" ></iframe>');
			if ($(".Control").hasClass('CloseBtn')) {

                jQuery('.SideBar').animate({
                    'margin-left': "-220px"

                }, 1000, function() {
                    // Animation complete.
                });
                $(".Control").removeClass('CloseBtn');
                $(".Control").addClass('OpenBtn');

                $('#iframeGame').animate({
                    'left': 15,
                    'width': $(window).width() - 15
                });
                $('#iframeGame iframe').animate({
                    'left': 15,
                    'width': $(window).width() - 15
                });
            } else {
				$('#iframeGame').animate({
                    'left': 15,
                    'width': $(window).width() - 15
                });
                $('#iframeGame iframe').animate({
                    'left': 15,
                    'width': $(window).width() - 15
                });
			}
		}
		
		var PopupManager = {
            popup_window: null,
            interval: null,
            interval_time: 80,
            waitForPopupClose: function () {
                if (PopupManager.isPopupClosed()) {
                    PopupManager.destroyPopup();
                    //window.location.reload();
                }
            },
            destroyPopup: function () {
                this.popup_window = null;
                window.clearInterval(this.interval);
                this.interval = null;
            },
            isPopupClosed: function () {
                return (!this.popup_window || this.popup_window.closed);
            },
            open: function (url, width, height) {
                this.popup_window = window.open(url, "", this.getWindowParams(width, height));
                /*this.interval = window.setInterval(this.waitForPopupClose, this.interval_time);*/
                return this.popup_window;
            },
            getWindowParams: function (width, height) {
                var center = this.getCenterCoords(width, height);
                return "width=" + width + ",height=" + height + ",status=1,location=0,resizable=no,left=" + center.x + ",top=" + center.y;
            },
            getCenterCoords: function (width, height) {
                var parentPos = this.getParentCoords();
                var parentSize = this.getWindowInnerSize();
                var xPos = parentPos.width + Math.max(0, Math.floor((parentSize.width - width) / 2));
                var yPos = parentPos.height + Math.max(0, Math.floor((parentSize.height - height) / 2));
                return {
                    x: xPos,
                    y: yPos
                };
            },
            getWindowInnerSize: function () {
                var w = 0;
                var h = 0;
                if ('innerWidth' in window) {
                    /* For non-IE */
                    w = window.innerWidth;
                    h = window.innerHeight;
                } else {
                    /* For IE*/
                    var elem = null;
                    if (('BackCompat' === window.document.compatMode) && ('body' in window.document)) {
                        elem = window.document.body;
                    } else if ('documentElement' in window.document) {
                        elem = window.document.documentElement;
                    }
                    if (elem !== null) {
                        w = elem.offsetWidth;
                        h = elem.offsetHeight;
                    }
                }
                return {
                    width: w,
                    height: h
                };
            },
            getParentCoords: function () {
                var w = 0;
                var h = 0;
                if ('screenLeft' in window) {
                    /* IE-compatible variants*/
                    w = window.screenLeft;
                    h = window.screenTop;
                } else if ('screenX' in window) {
                    /* Firefox-compatible*/
                    w = window.screenX;
                    h = window.screenY;
                }
                return {
                    width: w,
                    height: h
                };
            }
        };

        function openYahooPopup() {
            PopupManager.open("oauth2/oa_reg_yahoo.php", 800, 550);
        }

        function openGooglePopup() {
            PopupManager.open("oauth2/oa_reg_google.php", 800, 550);
        }

        function openFacebookPopup() {
            PopupManager.open("oauth2/oa_reg_facebook.php", 800, 550);
        }
		 function Ads() {
            PopupManager.open("<?=$ads[$rnd]?>", 1, 1);
        }
</script> 
<script type="text/javascript">
window.onbeforeunload = function () {
	return 'Trải nghiệm thêm và bạn sẽ cảm nhận được sự khác biệt';
}
</script>
<!----------------Fuck----------------->
</body>
<footer>
			 <b>     
<div>

</div>
 </b> 
 </footer>
</html>
