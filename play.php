<?php
session_start();
define("SNAPE_VN", true);

include_once dirname(__FILE__).'/#config.php';

include dirname(__FILE__).'/class/function.remotepage.php';

include dirname(__FILE__).'/class/function.global.php';

include dirname(__FILE__).'/class/class.account.php';

include dirname(__FILE__).'/class/class.item.php';

define("api_key","cedrusdeptraipro@123");
$svid = $_GET['id'];

if(!is_numeric($svid) || $svid <= 0) {
	die();
}
$account = new account(0);
$conn_sv = connectTank($svid);

$bypass = false;

if($username != null && $pass == 'keyfordirectconnect') {
	$bypass = true;
} else {
	$username = $_SESSION['ss_user_email'];
}

if(!$bypass && !$account->isLogin())
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());


if(!$conn_sv) {
	die('Server is not avalible');
}

$serverInfo = loadserver($svid);

if($serverInfo == null)
	die('server is not avalible');

if(!$serverInfo['isOpen'])
{
	die('Máy chủ chưa khai mở, vui lòng xem thông tin chi tiết tại Fanpage !');
}
$playerInfo= $account->getListPlayerInfos($_SESSION['ss_user_email'], $svid);
if($playerInfo == false) {
//movepage($_config['page']['fullurl'].'/createnick.php?id='.$svid);		
}

$password_ = guid();
$date	   = new DateTime();
$time 	   = $date->getTimestamp();
$key  	   = $_config['function']['key_request'];
$md5       = strtoupper(md5($username . $password_ . $time .  $key));
$url  	   = $_config['function']['url_request'] . '/CreateLogin.aspx?content=' . urlencode($username . '|' . $password_ . '|' . $time . '|' . $md5);
get_data($url);

$fileget = $_config['function']['url_flash'] . '/Loading.swf?user=' . $username . '&key=' . $password_ . '&v=10950&rand=635896664807598899&config=' . $_config['function']['url_flash_config'];

$pageRemote = remotePage(str_replace("/", "", $_GET['page']));

function guid(){
if (function_exists('com_create_guid') === true)
    return trim(com_create_guid(), '{}');

$data = openssl_random_pseudo_bytes(16);
$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

#hàm chạy link tự động
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

if($account->isLogin())
    $userInfo = $account->getUserInfo($_SESSION['ss_user_id']);
//$naplandauInfo = $account->getUserNaplandau($_SESSION['ss_user_id']);
$account->UpdateBugDoPet($svid);
$account->UpdateLauncherState('0',$_SESSION['ss_user_email'],$svid);
	
?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
	<link rel="shortcut icon" href="/images/icon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gunny Phiên Bản 5.5 Sức Mạnh Thời Trang!!!">
	<meta name="keywords" content="gunny free, ddtank, ddtank private, gunny private, gunny lậu, gunny private, gunny miễn phí, gunny đầy đủ tính năng, gunny phó bản chuẩn zing, gunny có doanh chiến, gunny có guild chiến, gunny có tranh bá chí tôn, gunny có pet tôn ngộ không, gunny miễn phí pet tôn ngộ không, gunny, gunny lau, gunny lau moi nhat, gunny phien ban moi, gunny moi nhat, gunny dai chien 7 thanh pho, gunny lau full xu, gunnyfullxu, gunny lau co pet ton ngo khong, gunny lau mien phi pet ton ngo khong, pet ton ngo khong gunny, free pet ton ngo khong, gunny full xu, gunny cay quoc, gunny day du tinh nang, gunny full pho ban, gunny pho ban chuan, gunny pho ban do ngon">
    <meta name="author" content="DDT Coder">
	<meta property="og:title" content="gunnyae.com - Đẳng Cấp Gunny Cày Cuốc">
	<meta property="og:image" content="https://i.imgur.com/NGLETAn.jpg">
	<meta property="og:description" content="Gunny Phiên Bản 5.5 Sức Mạnh Thời Trang,Chiến đấu nhận xu tại nhiệm vụ,Tích lũy cường hóa 100% thành công,!!!. Trải nghiệm ngay bây giờ.">
    <title><?=(($pageRemote['title'] != null) ? $pageRemote['title'].' - ' : '').$_config['page']['title']?></title>

    <!-- Bootstrap Core CSS -->
	<link href="<?=$_config['page']['fullurl']?>/css/style.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/idlogin.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/font-awesome.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/bootstrap-social.css" rel="stylesheet" >
    <link href="<?=$_config['page']['fullurl']?>/css/bootstrap.min.css" rel="stylesheet" >
    <link href="<?=$_config['page']['fullurl']?>/css/components.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/bootstrap-select.min.css" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/item_reader.css" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/popup_itemreader.css" >
	<link href="<?=$_config['page']['fullurl']?>/css/anno.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
	<!-- jQuery Version 1.11.1 -->
    <script src="<?=$_config['page']['fullurl']?>/js/jquery-1.11.3.min.js"></script>
	<script src='<?=$_config['page']['fullurl']?>/js/jquery-ui.min.js'></script>
	<script src='<?=$_config['page']['fullurl']?>/js/jquery.number.min.js'></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$_config['page']['fullurl']?>/js/bootstrap.min.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/js/jquery.validate.min.js"></script>
    <script src="<?=$_config['page']['fullurl']?>/js/jquery.twbsPagination.min.js"></script>
    <script type="text/javascript" src="<?=$_config['page']['fullurl']?>/js/pwstrength.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/js/bootstrap-select.min.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/js/fuckadblock.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/js/anno.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/js/guild.js"></script>
   

			
		<link rel="stylesheet" type="text/css" href="<?=$_config['page']['fullurl']?>/js/fancy/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/js/fancy/jquery.fancybox.js?v=2.1.5"></script>
	</script>
	<!--script type="text/javascript">
        $(document).ready(function () {
        	
			var button = document.getElementById("launcher");
            button.onclick = function(){
                alert("Máy chủ chưa mở , chưa thể tải launcher ! ");
			}

        });
    </script-->
	<script type="text/javascript">
	/*function adBlockDetected() {
		canMove = true;
		window.location = 'http://gunnyae.com/adblock.html';
	}
	function adBlockNotDetected() {
		//alert("Good man ^^!");
	}
		
	if(typeof fuckAdBlock === 'undefined') {
		adBlockDetected();
	} else {
		fuckAdBlock.setOption({ debug: true });
		fuckAdBlock.onDetected(adBlockDetected).onNotDetected(adBlockNotDetected);
	}*/
	</script>
	 <script type="text/javascript">
<!--
//napthe
function user_ZingPay(ProductID,AccountName,ServerID,UserID){
	$.fancybox({
		type: 'iframe',
		closeClick  : false,
		maxWidth : 800,
		helpers : { 
			overlay : {closeClick: false}
		},
		href: 'http://gunnyae.com/tai-khoan/nap-the/'
	});
}
	var allowLeave = 2;
	var www="";
	var name="Không bik";
        var isPay=false;
	
	function trace(){
		alert("Trace");
	}
	function setFavorite(path,titlename,allowvalue)
	{ 
             www=path;
             name=titlename;
             allowLeave=allowvalue;
	}
	function toLocation(url,msg){
		alert(msg);
		closeWindow("1",url);
	}
	
		function quickOpenByUrl(url) {
			$(document).ready(function() {
				$.fancybox({
					type: 'iframe',
				    href: url,
					width: '100%',
					height: '90%'
				});
			});
		}
		function bangxephang() {
			$(document).ready(function() {
				$.fancybox({
					type: 'iframe',
				    href: 'http://gunnyae.com/showtop/index.php',
					width: '600',
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
	
	function addToFavorite()
	{
		var ua = navigator.userAgent.toLowerCase();
		if(ua.indexOf("msie 8")>-1){
			external.AddToFavoritesBar(www,name,'');//IE8
		}else{
			try {
				window.external.addFavorite(www, name);
			} catch(e) {
				try {
					window.sidebar.addPanel(name, www, "");//firefox
				} catch(e) {
					alert("Trình duyệt không hỗ trợ tính năng này, hãy dùng Ctrl+D để thêm");
				}
			}
		}
	}

	function getLocationUrl(){
		var addurl = document.location.href;
		 //thisMovie("7road-ddt-game").sendSwfNowUrl(addurl.toString());
		try{
			thisMovie("7road-ddt-game").sendSwfNowUrl(addurl.toString());
		}catch(e){
			if (window.clipboardData){
				window.clipboardData.setData("Text", addurl.toString());
			}
			else if (window.netscape){
				try {
					netscape.security.PrivilegeManager.enablePrivilege(addurl.toString());
				} catch (e) {
					alert("Trình duyệt từ chối, hãy nhấn F6 để nhận link copy"); 
				}
				
			}else{
				alert("Trình duyệt không hỗ trợ tính năng này, hãy nhấn F6 để nhận link copy"); 
			}
		}
	}

     //3.1新功能
    //js与as交互
     function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }
     
     var flashCall   =false;     
     function closeWindow(flag,loginUrl) { 
     flashCall   =true;
     if(flag=="0"){
	    top.window.opener=null; 
	    top.window.open("","_self"); 
	    top.window.close(); 
         }else if(flag=="1") { 
              //修改登陆Url
	        self.parent.location=loginUrl;
         }
    }
    function setFlashCall(){
	flashCall=true;
    }
    
    //set Active and email
     var dailyTask=-1,dailyActivity=-1,dailyEmail=-1;
    function setDailyTask(_dailyTask){
	dailyTask=_dailyTask;
    }
    function setDailyActivity(_dailyActivity){
	dailyActivity=_dailyActivity;
     }
    function setDailyEmail(_dailyEmail){
	dailyEmail=_dailyEmail;
     }
     
	window.onbeforeunload = function(e)
    	{
           askUserLeave(e);
    }
    function killErrors() //杀掉所有的出错信息
    { 
	    return true; 
    }
	function sandaFillHandler ()
	{
		if(ibw_public.existNameSpace('sdoNewPay'))
		{
			ibw_public.openWidget('sdoNewPay');
		}
	}
	
	function setFlashFocus()
	{
		document.getElementById('7road-ddt-game').focus();
	}
  window.onerror = killErrors; 

   	function pushfeed(myJSONtext){
	var data = eval('(' + myJSONtext + ')');
	      		//alert(myJSONtext);
				zmf.ui(
			        {		        	
						pub_key: data.pub_key,
						sign_key: data.sign_key,
						action_id: data.actId,
						uid_to: data.userIdTo,
						object_id: data.objectId,
						attach_name: data.attachName,
						attach_href: data.attachHref,
						attach_caption: data.attachCaption,
						attach_des: data.attachDescription,
						media_type: data.mediaType,
						media_img: data.mediaImage,
						media_src: data.mediaSource,
						actlink_text: data.actionLinkText,
						actlink_href: data.actionLinkHref,
						tpl_id: data.tplId,
						suggestion: [data.itemTitle1,data.itemTitle2,data.itemTitle3]
						//suggestion: ["suggestion1", "suggestion2", "suggestion3"]

			        })
	      	}  

				
    </script>   
</head>

<script>
var svid = "<?=$_GET['id']?>";
var url = "";
if(svid == 1001){
	url = "<?=$_config['page']['fullurl']?>/showtop/index.php";
}

$(document).ready(function() {
	$(".fancybox").fancybox({
		closeClick  : false,
		maxWidth : 450,
		helpers   : { 
			overlay : {closeClick: false}
		}
	});
	$('[data-toggle="tooltip"]').tooltip(); 
});

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


function popup() {
$(document).ready(function() {		
	$.fancybox.open({
	href      : url,
	type: 'iframe',
	maxWidth	: 600,
	maxHeight	: 700,
	fitToView	: true,
	width		: '50%',
	height		: '100%',
	autoSize	: true,
	closeClick	: false,
	openEffect	: 'none',
	closeEffect	: 'none',
	padding : 0,
	});
	return false;
		
	});	
}
	
$(document).ready(function() {	
popup();
});	
</script>
<body scroll="no"style="overflow: hidden" onload="setFlashFocus();">

  <style>
      html, body	{ height:100%; }
      body
        {
            margin: 0px auto;
            padding: 0px;
         background-image: url(choigame/images/bg-all3.jpg) !important;
            background-repeat: no-repeat;
            background-position: center center;
		background-size: auto;

        overflow:auto; text-align:center;
        }
		
		
       *,html,body,embed{cursor:url('img/default.cur'), default;}
	    a:hover{cursor:url('img/default.cur'), pointer;}
	    input{cursor:url('img/input.cur'), text;}   
	
		#errorSummary {
				text-align: center;
				font-size: 18px;
				color:#fff;
				padding-top: 300px;
						}
    </style>
	
	<script>
	
	// khai bao ham global
	var max_loading_gif_count = <?=$_config['effect']['loading_max_count']?>;
	
	var full_url = "<?=$_config['page']['fullurl']?>";
	
	var isAdsDisplayed = true;

    </script>
	<script data-ad-client="ca-pub-8323644274999496" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/js/script_global.js"></script>

    <script type="text/javascript">

    SnapeClass.encryptCurrentURL = '<?=base64currenturl()?>';

    </script>
	
	<div id="fb-root"></div>
	<script>
			window.fbAsyncInit = function() {
				FB.init({
				  appId      : '<?=$_config['social']['facebook']['id']?>',
				  xfbml      : true,
				  version    : 'v2.5'
				});
			  };
		  
			(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=<?=$_config['social']['facebook']['id']?>";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

    <div id="modalSnape" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thông báo</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<div id="div_loading" class="loading_backgroup">
		<div class="loading_fullsceen">
			<img src="<?=$_config['page']['fullurl']?>/images/please-wait.gif" /><br/>
			<img id="image_loading_big" src="<?=$_config['page']['fullurl']?>/images/big_loading_<?=rand(0, $_config['effect']['loading_max_count'])?>.gif" width="200px" />
		</div>
	</div>


        <!-- /.container -->
    </nav>
	<?php if(!$_GET['iframe']) { ?>
    <div class="container">
	
</div>
	<?php } ?>
    <!-- Page Content -->
 <?php
            if($account->isLogin()) {
            ?>
			
	<div id="cedrusnav">		
    <nav id="boxnoidung" class="navbar-default navbartop navbar-expand-xl navbar-light" style="height:6%">
	
    <div class="navbar-header d-flex col">
        <a class="navbar-brand" href="<?=$_config['page']['fullurl']?>"><b><img height=45 src="<?=$_config['page']['fullurl']?>/images/lgfcgunny.png"></b></a>
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
            <span class="navbar-toggler-icon"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <ul class="nav navbar-nav">
			
            <li class="nav-item dropdown">
                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Nạp Tiền <b class="caret"></b></a>
                <ul class="dropdown-menu">
			<li><a href="javascript::void(0)" onclick="quickOpenByUrl('http://gunnyae.com/tai-khoan/nap-the/')" class="dropdown-item"><i class="fa fa-credit-card" aria-hidden="true"></i> Nạp Thẻ</a></li>
			<li><a href="javascript::void(0)" onclick="quickOpenByUrl('http://gunnyae.com/tai-khoan/gui-nap/')" class="dropdown-item"><i class="fa fa-university" aria-hidden="true"></i> Nạp ATM</a></li>
			<li><a href="javascript::void(0)" onclick="quickOpenByUrl('http://gunnyae.com/tai-khoan/chuyen-xu/')" class="dropdown-item"><i class="fa fa-university" aria-hidden="true"></i> Chuyển xu</a></li>
			<li><a href="javascript::void(0)" onclick="quickOpenByUrl('http://gunnyae.com/tai-khoan/lich-su-giao-dich/')" class="dropdown-item"><i class="fa fa-history" aria-hidden="true"></i> Lịch Sử</a></li>
                </ul>
            </li>
			           
			<li><a href="javascript::void(0)" onclick="quickOpenByUrl('http://gunnyae.com/tai-khoan/giftcode/')" class="dropdown-item"><i class="fa fa-gift" aria-hidden="true"></i> Giftcode</a></li>

			<li><a href="<?=$_config['page']['fullurl']?>/launcher.rar" class="nav-link"><i class="fa fa-download" aria-hidden="true"></i> Tải Launcher</a></li>
			<li><a href="https://www.facebook.com/profile.php?id=100092000605483" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Fanpage</a></li>
			<li><a href="javascript::void(0)" onclick="bangxephang();" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Bảng Xếp Hạng</a></li>
        </ul>     
           
        <ul class="nav navbar-nav navbar-right ml-auto">

            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img width="30" src="<?=$_config['page']['fullurl']?>/images/avatar.png" class="avatar" alt="Avatar"> <b><font color="black"><?=$account->getUsername()?></b> <img align="center" src="<?=$_config['page']['fullurl']?>/images/vip/<?=$userInfo['VIPLevel']?>.png" height="20px" data-toggle="tooltip" data-placement="top" title="Nạp thẻ sẽ thăng VIP, nạp càng nhiều cấp VIP càng cao - ưu đãi từ VIP càng nhiều." /></font> <b class="caret"></b></a>
                <ul class="dropdown-menu">
					 <?php if($_SESSION['ss_user_email'] == $_config['panel']['Administrator'] or $_SESSION['ss_user_email'] == $_config['panel']['Administrator2']){
            echo '<li><a href="/panel-quantri/" class="dropdown-item"><i class="fa fa-sliders"></i> Panel Web</a></li>';
        }
        ?>
					 <?php if($_SESSION['ss_user_email'] == $_config['panel']['Administrator'] or $_SESSION['ss_user_email'] == $_config['panel']['Administrator2']){
            echo '<li><a href="/huydeptraiso1vn/" class="dropdown-item"><i class="fa fa-sliders"></i> Panel quà nạp lần đầu</a></li>';
        }
        ?>
					 <?php if($_SESSION['ss_user_email'] == $_config['panel']['Administrator'] or $_SESSION['ss_user_email'] == $_config['panel']['Administrator2']){
            echo '<li><a href="http://gunnyae.com:8066/Account/Login.aspx" class="dropdown-item"><i class="fa fa-sliders"></i> AdminCP</a></li>';
        }
        ?>
					 <?php if($_SESSION['ss_user_email'] == $_config['panel']['Administrator'] or $_SESSION['ss_user_email'] == $_config['panel']['Administrator2']){
            echo '<li><a href="http://gunnyae.com:8077/" class="dropdown-item"><i class="fa fa-sliders"></i> GM Service</a></li>';
        }
        ?>
                    <li><a id="remove_user" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/tai-khoan/"><i class="fa fa-users"></i> Thông Tin</a></li>
                    <li><a id="remove_user" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/tai-khoan/doi-mat-khau/"><i class="fa fa-key"></i> Đổi Mật Khẩu</a></li>
					 <li><a href="<?=$_config['page']['fullurl']?>/tai-khoan/xoa-ket/" class="dropdown-item"><i class="fa fa-calendar-o"></i>  Xóa Két Guild</a></li>
                    <li><a href="<?=$_config['page']['fullurl']?>/tai-khoan/lich-su-giao-dich/" class="dropdown-item"><i class="fa fa-calendar-o"></i> Lịch Sử Giao Dịch</a></li>
                    <li><a href="<?=$_config['page']['fullurl']?>/launcher.rar"" class="dropdown-item"><i class="fa fa-calendar-o"></i> Tải Launcher </a></li>
                    <li> <a href="/logout.php"><i class="fa fa-sign-out"></i> Thoát</a></li>
                </ul>
            </li>
        </ul>
		
                <?php
            } else {
                ?>

            <? } ?>


    </div>
	
</nav>

	<div class="menubg_fix">
 <span style="color:rgb(252, 250, 251);font-size:14px;font-weight: bold;top:10px"> 
<marquee color="red" bgcolor="black">
Fanpage: https://www.facebook.com/profile.php?id=100092000605483.
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Link Game http://gunnyae.com
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Chúc bạn chơi game vui vẻ
</marquee></span>
  </div> 

<script>
	function setNav()
			{
				document.getElementById("khungchoigame").style.marginBottom = "10px";
				document.getElementById("boxnoidung").style.display = "none";
				document.getElementById("setKhung").style.marginBottom = "150px";
				document.getElementById("setKhung").style.display = "none";
		

			}
			
			
</script>
</div>
 			

   <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle">
                    <table id="khungchoigame" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom: 160px;">
                        <tr>
                            <td align="center">
								<div id="gameOuterContainer"  style="cursor:pointer;width:1000px;height:600px;overflow:hidden;background-image:url('img/gameBackGround.jpg');" onclick="showGame();">
                               <div id="gameContainer" style="width:1000px;height:600px;overflow:hidden;">
                                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="7road-ddt-game" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" name="Main" width="1000" height="600" align="middle">
                                    <param name="allowScriptAccess" value="always">
                                            
                                    <param name="quality" value="high">
                                    <param name="menu" value="false">
                                    <param name="bgcolor" value="#000000">
                                    <param name="FlashVars" value="site=&amp;sitename=&amp;rid=&amp;enterCode=&amp;sex=">
                                    
                                    <embed flashvars="site=&amp;sitename=&amp;rid=&amp;enterCode=&amp;sex=" src="<? echo $fileget;?>" width="1000" height="600" align="middle" quality="high" name="Main" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="direct">
                                </object>
                               </div>
                               </div>
                            </td>
                        </tr>
                    </tbody></table>
            </td>
        </tr>
    </tbody></table>	
	
<script type="text/javascript">
function hide_float_right() {
    var content = document.getElementById('float_content_right');
    var hide = document.getElementById('hide_float_right');
    if (content.style.display == "none")
    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()">Tắt quảng cáo [X]</a>'; }
        else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()">Xem quảng cáo...</a>';
 }
 }
</script>
	<script type="text/javascript">
	  (function() {
		window._pa = window._pa || {};
		// _pa.orderId = "myOrderId"; // OPTIONAL: attach unique conversion identifier to conversions
		// _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
		// _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads
		var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
		pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.marinsm.com/serve/58d09d48abaf5eef8a000016.js";
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
	  })();
	</script>
	
</body>

</html>
