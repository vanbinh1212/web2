<?php
session_start();
define("SNAPE_VN", true);

include_once dirname(__FILE__).'/../#config.php';

include dirname(__FILE__).'/../class/class.account.php';

include dirname(__FILE__).'/../class/function.global.php';
define("api_key","vvvvvvvvvvvncmvncmzksnc");
$account = new account(0);

if(!$account->isLogin())
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());

$svid = $_GET['id'];

if(!is_numeric($svid) || $svid <= 0) {
	die();
}


$conn_sv = connectTank($svid);

if(!$conn_sv) {
	die('Server is not avalible');
}

$serverInfo = loadserver($svid);

if($serverInfo == null)
	die('server is not avalible');

if(!$conn_sv) {
	die('Server is not avalible');
}

$serverInfo = loadserver($svid);

if($serverInfo == null)
	die('server is not avalible');

$playerInfo = $account->getListPlayerInfo($_SESSION['ss_user_name']);
if($playerInfo == false) {
movepage($_config['page']['fullurl'].'/create.php?id='.$svid);			
			}
// try connect to request
// create login
$keyrand = rand(111111, 999999);

$timeNow = time();
//content này cho 5. và 4.
$serverid = 1;
$requesturl = 'http://gunnyae.com/req/';
$flashurl = 'http://gunnyae.com/flash/';
$Loginkey = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$configflash = 'http://gunnyae.com/flash/config.xml';
$serverurl = 'http://gunnyae.com/';
$param = 'username='.urlencode($_SESSION['ss_user_email']).'&password='.urlencode($_SESSION['ss_user_pass']).'&key='.urlencode(api_key).'&loginkey='.urlencode($Loginkey).'&loginurl='.urlencode($requesturl);
$fileget = file_get_contents($serverurl.'LoginWithKey.ashx?'.$param);
$fileget1 = explode("-",$fileget)[1];
if(!$fileget1){
	exit("Lỗi Hệ Thống, Server Code : ".$fileget);
}



$userInfo = $account->getUserInfo($_SESSION['ss_user_id']);

if($userInfo['IsBan'] == true)
	die('Your account is banned.');

if($userInfo['Password'] != $_SESSION['ss_user_pass']) {
	$account->removeSession();
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());
}

/*
$eventInfo = $account->getEventInfo($_SESSION['ss_user_id'], 1, $svid);

// event share
$shareFacebook = true;

if($eventInfo != false && $eventInfo['BooleanSuccess'] == true) {
	
	$shareFacebook = false;
	
}
*/
// update effect x2 xu
//$qUpdate = sqlsrv_query($conn_sv, "UPDATE Sys_Users_Detail SET MoneyPlus = ? WHERE UserName = ?", array(account::xuWarPlus($_SESSION['ss_user_id']), $_SESSION['ss_user_email']));

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vn" xmlns:og="http://ogp.me/ns#" lang="vn" class="no-js">

<head>
	<link rel="shortcut icon" href="http://gunnyae.com/images/icon.ico">

	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Gunny phiên bản mới nhất - Miễn phí 500.000 Coin Webshop. Miễn phí pet Tôn Ngộ Không. Thích cái gì là có cái đó. Trải nghiệm ngay nào!!!">
	<meta name="keywords" content="gunny free, ddtank, ddtank private, gunny private, gunny lậu, gunny private, gunny miễn phí, gunny đầy đủ tính năng, gunny phó bản chuẩn zing, gunny có doanh chiến, gunny có guild chiến, gunny có tranh bá chí tôn, gunny có pet tôn ngộ không, gunny miễn phí pet tôn ngộ không, gunny, gunny lau, gunny lau moi nhat, gunny phien ban moi, gunny moi nhat, gunny dai chien 7 thanh pho, gunny lau full xu, gunnyfullxu, gunny lau co pet ton ngo khong, gunny lau mien phi pet ton ngo khong, pet ton ngo khong gunny, free pet ton ngo khong, gunny full xu, gunny cay quoc, gunny day du tinh nang, gunny full pho ban, gunny pho ban chuan, gunny pho ban do ngon">
	<meta name="robots" content="index, follow" />
	<title><?=$serverInfo['ServerName']?> - Gunny Miễn Phí</title>
	
	<link rel="stylesheet" href="css/dhtmlwindow.css" type="text/css" />
	<link rel="stylesheet" href="css/chat.css" type="text/css" />
	<link rel="stylesheet" href="css/player.css?v=0.17" type="text/css" />
	<link href="css/responsive-slider.css" rel="stylesheet" media="screen" />
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" type="text/css" href="fancy/jquery.fancybox.css?v=2.1.5" media="screen" />

	<script language="javascript" src="js/swfobject.js"></script>
	<script language="javascript" src="js/jquery-1.11.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.event.move.js"></script>
	<script src="js/responsive-slider.js"></script>
	<script type="text/javascript" src="fancy/jquery.fancybox.js?v=2.1.5"></script>
	<script src="js/fuckadblock.js"></script>
	<script type="text/javascript">
	var canMove = false;
	
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
	
	function goodbye(e) {
		
		if(canMove == false) {
			if(!e) e = window.event;
			//e.cancelBubble is supported by IE - this will kill the bubbling process.
			e.cancelBubble = true;
			e.returnValue = 'Bạn có chắc là muốn rời khỏi trò chơi?'; //This is displayed on the dialog

			//e.stopPropagation works in Firefox.
			if (e.stopPropagation) {
				e.stopPropagation();
				e.preventDefault();
			}
		}
		
	}
	window.onbeforeunload=goodbye;
	
	function toLocation(url,msg){
		alert(msg);
		closeWindow("1",url);
	}
	
	var flashCall = false;    
	
    function closeWindow(flag,loginUrl) {
		
		flashCall = true;
		
		if(flag=="0"){
			top.window.opener=null; 
			
			top.window.open("","_self"); 
			
			top.window.close(); 
			
        }else if(flag=="1") { 
		
	        window.location.href=loginUrl;
			
        }
    }
	
	</script>
</head>
<body scroll="no" class="playing"> 

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


<script type="text/javascript">

var ssUsername = "<?=$userInfo['Email']?>";
	
var ssPassword = "<?=$userInfo['Password']?>";

function game_pay(){
var win = window.open('<?=$_config['page']['fullurl']?>/tai-khoan/nap-the/', '_blank');
  win.focus();
}
function game_interruption(url,msg){
		alert(msg);
		closeWindow("1",url);
	}
	     function closeWindow(flag,loginUrl) {
     flashCall   =true;
     if(flag=="0"){
	    top.window.opener=null;
	    top.window.open("","_self");
	    top.window.close();
         }else if(flag=="1") {
              //修改登陆Url
	        window.location.href=loginUrl;
         }
    }
$(document).ready(function () {
	
	$.fancybox("#event_news_content");
	
	//showWinSpin();
});

function showWinSpin() {
	$.fancybox("#winspin_event_content");
}

var updatingWinCount = false;


function updateWinCount() {
	
	if(updatingWinCount == false) {
		
		updatingWinCount = true;
		
		$("#txt_winspin_count").html("<img src='<?=$_config['page']['fullurl']?>/images/small_loading.gif' />");
		
		$.post("<?=$_config['page']['fullurl']?>/ajax/update_wincount.php", "id=<?=$svid?>",
			function (json) {
				$("#txt_winspin_count").html(json);
				updatingWinCount = false;
		});
	}
	
}

function shareFacebook() {
	
	var e = {
		method: "feed",
		picture: "<?=$_config['page']['fullurl']?>/images/gachutuoc.gif",
		link: "gunnyae.com",
		name: "Cùng mình chơi thử Gunny 1 Huyền Thoại Cường Hóa hên Xui +12 này nào!!!",
		caption: 'http://gunnyae.com',
		description: "Nhấp và nhận Giftcode Facebook Cực HOT"
	};
	
	FB.ui(e, function(t) {
		if (t["post_id"]) {
			requestFBCode();
		} else {
			//alert("Vui lòng chia sẻ ở chế độ công khai hoặc thử với tài khoản facebook khác.");
			requestFBCode();
		}
	})
}

function requestFBCode() {
	$("#share_facebook_result").html("<img src='<?=$_config['page']['fullurl']?>/images/loading.gif' />").show();
	$.post("form/share_fb_code.php", "id=<?=$svid?>",
		function (json) {
			if(json['type'] == 0) {
				$("#share_facebook_result").html("<font color='red'>Code: <b>"+json['content']+"</b></font>").show();
			} else {
				alert(json['content']);
			}
	}, 'json');
}
</script>
<script src="js/event_news.js"></script>


<div id="chat_fixed">
    <div align="center" class="chat_fixedHeader"><img src="images/icon-hot.gif" /> Sự kiện - Quà tặng <img src="images/icon-hot.gif" /></div>
    <div class="chat_fixedContent">
		<p align="center"><a href="<?=$_config['page']['fullurl']?>" target="_blank"><font color="red"><b>Nhận Giftcode Miễn Phí</b></font></a></p>
<!-- qc play web -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-3814049986508486"
     data-ad-slot="1774432252"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></p>
	</div>
</div>
<div id="event_news_content" align="center" style="display:none;">
	  <button type="button" id="stars" class="btn btn-success" href="#home" data-toggle="tab"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                <div>VUA ĐỔI XU</div>
            </button>
			<a href="<?=$_config['page']['fullurl']?>/LauncherFC.exe" target="_blank"><button type="button" id="stars" class="btn btn-warning"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                <div>Tải Launcher</div>
            </button></a>
	  <div id="home" style="width:100% !important;" class="container tab-pane active"><br>
    
     <div>
	 <div class="panel with-nav-tabs panel-default">
<div class="alert alert-success" role="alert">BXH được cập nhật liên tục.</div>
<table class="table table-bordered">
			<thead>
			  <tr>
				<th><font color=black>Xếp hạng</font></th>
				<th><font color=black>Tên nhân vật</font></th>
				<th><font color=black>Tổng Xu Đổi</font></th>
				<th><font color=black>Phần Thưởng</font></th>
				
			  </tr>
			</thead>
		<tbody style="background:#f5f5f5;">
			<?php
			$qcheck = sqlsrv_query($conn, "SELECT TOP 10* FROM BXH ORDER BY Conditions DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
			$dem = 0;
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						echo '
						<tr>
						<td>'.$dem.'</th>
						<td class="text-character">'.$r['Nickname'].'</td>
						<td><a class="btn btn-sm btn-warning">'.$r['Conditions'].'</a></td>						
						<th><font color="red">'.$r['Gift'].'</font></th>

						';
					}					
				
				}else {
										echo '<tr><td align="center" colspan="7"><b>Chưa có top</b></td></tr>';
									}
			?>
			</tbody>
							</table>
    </div>
    </div>	</div>		
	
</div>

<div id="winspin_event_content" style="display:none;">
	<div><font color="blue"><a href="http://gunnyae.com/tai-khoan/nap-the/" target="_blank">Khuyến mãi 100% Nạp ATM/MOMO và 50% Nạp Thẻ Cào.</a></font></div>
	<!--<div class="red_line_border">Thắng 5 trận được 1 lần quay. Hiện tại có: <b><span id="txt_winspin_count">0</span></b> lượt quay <a href="javascript:;" onclick="updateWinCount()">[Cập nhật]</a></div>
	<div><font color="blue">Vật phẩm nhận được ở Túi Web. <a href="http://gunnyae.com/hop-qua/" target="_blank">Nhấp vào đây<a> để gửi vật phẩm vào game.</font></div>
	<div align="center">
		<object width="750" height="700" align="middle" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
            <param name="movie" value="images/wincount_spin.swf?loto=<?=$_config['page']['fullurl']?>/winspin/<?=$svid?>.gunht">
            <param name="quality" value="high">
            <param name="play" value="true">
            <param name="loop" value="true">
            <param name="wmode" value="transparent">
            <param name="scale" value="showall">
            <param name="menu" value="true">
            <param name="devicefont" value="false">
            <param name="salign" value="">
            <param name="allowScriptAccess" value="sameDomain">
            <embed width="750" height="700" src="images/wincount_spin.swf?loto=<?=$_config['page']['fullurl']?>/winspin/<?=$svid?>.gunht" quality="high" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" allowscriptaccess="always">
        </object>
	</div>-->
</div>

<!--<img style="position:fixed;z-index:9999;top:0;left:0" src="images/ocuaso.comtopleft.png" /><img style="position:fixed;z-index:9999;top:0;right:0" src="images/ocuaso.comtopright.png" />
<div style="position:fixed;z-index:9999;bottom:-50px;left:0;width:100%;height:104px;background:url(images/ocuaso.comft.png) repeat-x bottom left;"></div><img style="position:fixed;z-index:9999;bottom:20px;left:20px" src="images/ocuaso.combottomleft.png" />
-->

<!--For player:-->
<div class="play-area" id="container" style="overflow-y: auto;">
<!--left-->
<div class="play-sidebar">
    <div class="relative">
        <div class="play-sidebar-split">
            <a href="#" onclick="$('body').toggleClass('hide-sidebar'); return false;">
                <img src="images/play-hide-btn.png">
                <img src="images/play-show-btn.png">
            </a>
        </div>

        <div class="sidebar-content" style="padding-top:0px">
            <div class="play-logo"><a href="http://gunnyae.com" target="_blank"><img src="images/logo-play.png" /></a></div>

            <div class="server">
                <div class="show-list" style="cursor:pointer;">
                    <ul>
                        							                        <li><a href="#">S1.Gà Tử Thần</a></li>
                        						                    </ul>
                    <div class="selected" id="selected_server">Gà Tử Thần<span class="caret"></span></div>
                </div>
            </div>

            <div class="footer">
                <div class="play-social" style="height:50px">
					<p class="text-center text_account">Hi, <?=$_SESSION['ss_user_email']?></p>
					<div class="text_coin">Xu Web: <span class="badge"><?=number_format($userInfo['Money'])?></span></div>
					<div class="text_coin">Xu Khuyến Mãi: <span class="badge"><?=number_format($userInfo['MoneyLock'])?></span></div>
					
                </div>		
                <!--<p><img src="http://stc.cpvm2.vn/w/images/play-footer-text.png"></p>-->
            </div>

            <div class="play-banner" style="display:block">
                <!-- <img src="images/tmp/banner.png"> -->
                <!-- RESPONSIVE SLIDER - START -->
                <section class="responsive-slider" data-spy="responsive-slider">
                    <div class="slides" data-group="slides">
                        <ul>
                            <!--slide 3-->
                            <li>
                                <div class="slide-body" data-group="slide">
                                    <img src="images/play-banner-placeholder.gif" class="slide-image" alt="" />
                                    <div class="slide-content">
                                        <a href="http://gunnyae.com/tai-khoan/nap-the/" class="item" title="Chinh phục bảng vàng" target="_blank">
                                            <img src="http://cpvm.vn/files/news/2015/01/26/origin_1422243752.jpg" class="img-responsive" alt="" />
                                        </a>
                                    </div><!--http://stc.cpvm2.vn/w/images/slider-->
                                </div>
                            </li>

                            <li>
                                <div class="slide-body" data-group="slide">
                                    <img src="http://stc.cpvm2.vn/w/images/slider/play-banner-placeholder.gif" class="slide-image" alt="" />
                                    <div class="slide-content">
                                        <a href="http://gunnyae.com/tai-khoan/nap-the/" class="item" title="Chinh phục bảng vàng" target="_blank">
                                            <img src="http://cpvm.vn/teaser/files/editor//popup_ingame3009a.jpg" class="img-responsive" alt="" />
                                        </a>
                                    </div><!--http://stc.cpvm2.vn/w/images/slider-->
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- <a class="slider-control left" href="#" data-jump="prev"><i class="fa fa-angle-left"></i></a>
                    <a class="slider-control right" href="#" data-jump="next"><i class="fa fa-angle-right"></i></a> -->
                    <div class="pages">
                        <a class="page" href="#" data-jump-to="1">1</a>
                        <a class="page" href="#" data-jump-to="2">2</a>
                    </div>
                </section>
                <!-- RESPONSIVE SLIDER - END -->
            </div>
            <ul class="play-buttons">
                <li>
                    <a href="http://gunnyae.com/" class="play-normal-btn" target="_blank">Trang chủ</a>
                </li>
                
				<li>
                    <a href="http://gunnyae.com/tai-khoan/nap-the/" class="play-normal-btn" target="_blank">Nạp thẻ</a>
                </li>
				<li>
                    <a href="http://gunnyae.com/tai-khoan/chuyen-xu/" class="play-normal-btn" target="_blank">Đổi Xu Web Vào Game</a>
                </li>
				<li>
                    <a href="http://gunnyae.com/tai-khoan/chuyen-xu-game/" class="play-normal-btn" target="_blank">Đổi Xu Game Vào Game</a>
                </li>
				<!--li>
                    <a href="http://gunnyae.com/tai-khoan/cua-hang/" class="play-normal-btn" target="_blank">Webshop</a>
                </li-->
				<!--li>
                    <a href="http://gunnyae.com/" class="play-normal-btn" target="_blank">Giftcode</a>
                </li-->
				<!--li>
                    <a href="http://gunnyae.com/hop-qua/" class="play-normal-btn" target="_blank">Quà tặng</a>
                </li-->
            </ul>
            <div style="padding-bottom:20px"></div>
        </div>
    </div>
</div>

<!--right-->
<div class="play-content">
    <div class="relative" style="margin-left:7px;">
        <table>
            <tr>
                <td>
                    <div class="fcontent frame" id="flashcontent">
                                                <div class="frame-top"></div>
                        <script src="js/swfobject.js"></script>
                        <script>
                            var swfPath = "http://gunnyae.com/choigame/flashnew3/Loading.swf";
                            var flashvars = {
                                user: "<?=$_SESSION['ss_user_email']?>",
                                key: "<?=$keyrand?>",
                                v: "104",
                                rand: "92386938",
                                config: "<?=$serverInfo['LinkConfig']?>"
                            };
                            var params = {
                                menu: "false",
                                scale: "noScale",
                                //allowFullscreen: "true",
                                allowScriptAccess: "always",
                                //bgcolor: "",
                                wmode: "direct" // can cause issues with FP settings & webcam
                            };
                            var attributes = {
                                id:"gameContent",
                                name:"Gunny 1",
                                style:"margin: 0 auto;position: relative;left: -16px; display:block !important;"
                            };
                            swfobject.embedSWF(
                                swfPath,
                                "gameContent", "1000", "600", "11.8.0",
                                "expressInstall.swf",
                                flashvars, params, attributes);
                        </script>
                        <div id="gameContent">
                            <p><a href="http://www.adobe.com/go/getflashplayer">Vui lòng tải Adobe Flash Player để chơi game.</a></p>
                        </div>
                                            </div>
                    <!--<div id="videocontent" style="display:none; margin: 0 auto; width:1010px">
                    </div>-->
                </td>
            </tr>
        </table>
    </div>
</div>



<script>
	function HideAds() {
		$('.float-ads-left').hide();
		$('.float-ads-right').hide();
	}
</script>

<script type="text/JavaScript">
    var game = "cpvm_313.swf";
    //var can_change_server = 1;

    function getGameEmbedTag(_server, _port){
        var embedTag = '<div class="frame-top"></div>'
            + '<embed src="http://stc.cpvm2.vn/cpvm_313.swf'
            + '?CONTENT_VERSION=313&WEB_ROOT=http://stc.cpvm2.vn/&SERVER_IP='+server
            + '&SERVER_PORT='+port+'&SIGN_USER=144965098972963&LOGIN_TYPE=4&STATE=4'
            + '&IS_DEV=0&CACHE_VERSION=?v1"'
            + 'quality=high width="1000" height="560" name="Monopoly"  allowScriptAccess="always" wmode="direct" align=""'
            + 'type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" style="display: block !important;"></embed>';
        console.log(embedTag);
        return embedTag;
    }

    //check for auto hide sidebar:
    function myFunction() {
        //var myWidth = $(window).width();
        //if (myWidth <= 1024) {
        $('body').addClass('hide-sidebar');
        //}
    }

    $( document ).ready( function() {
        $('.responsive-slider').responsiveSlider({
            autoplay: true,
            interval: 5000,
            transitionTime: 300
        });

        var myWidth = $(window).width();
        if (myWidth <= 1024) {
            //$('.play-sidebar').css('margin-left', -240);
            $('.play-sidebar').css('position', 'absolute');
            $('.play-sidebar').css('z-index', 99999999);
            $('.play-content').css('margin-left', -1);
            $('.frame').css('padding-left', 19);
        }

        //window.scrollTo(0,130);

        setTimeout(myFunction, 300000);

                $('#flashcontent').css('padding-bottom', 80);
            });

    function change_server(server, port, name) {
//        	if (can_change_server != 1)
//        		return false;

        data = getGameEmbedTag(server, port);
        $('#flashcontent').html(data);

        $('#selected_server').html(name);
        $('#selected_port').val(port);
        $('#selected_ip').val(server);

        return false;
    }

    function get_ranking(type,st) {
        if (typeof(type) == 'undefined') {
            var type = 0;
        }
        jQuery.post("/game/rank", {
                type: type,
                st: st
            },
            function(msg){
                $('#first-dialog').html(msg);
                $('#first-dialog').addClass('show');
                //$('#flashcontent').hide();
                $('#flashcontent').addClass('hide_flash');
            });
        return false;
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
        }
        return "";
    }

    function openUrl(url) {
        //alert("open url");
        //console.log("openUrl " + url[0]);
        window.open(url[0],"_blank");
    }

    function openDailyStory(){
        $('#story-dialog').addClass('show');
        $('#flashcontent').addClass('hide_flash');
    }
	
	function openTouchEnglish(src){
			// window.open(src,"_blank");
			document.getElementById('te-dialog').style.position = 'fixed';
			document.getElementById('te-frame').src=src;
			$('#te-dialog').addClass('show');
			$('#flashcontent').addClass('hide_flash');	
		}
		
		function closeTouchEnglish() {
			document.getElementById('te-frame').src='';
			document.getElementById('te-dialog').style.position = 'relative'; 
			$('#te-dialog').removeClass('show'); 
			$('#flashcontent').removeClass('hide_flash'); 
			return false;
		}

    function cpvmReconnect(){
        //alert("test");
        window.location.reload();
    }

    function refreshGame() {
        window.location.reload();
    }
    
	function open_iframe(url) {
        jQuery.post('/game/zme_payment', {
                url:url
            },
            function(msg){
                $('#zme-dialog').html(msg);
                $('#zme-dialog').addClass('show');
                //$('#flashcontent').hide();
                $('#flashcontent').addClass('hide_flash');
            });
        return false;
    }
</script>
</div>
<a href="#one"></a>
<script>
    window.scrollTo(0,2000);
	
</script>
<!-- /For player--> 

</body>
</html>