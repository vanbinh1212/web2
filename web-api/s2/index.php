<?php
session_start();
$USER = $_SESSION['Username'];
$PWD = $_SESSION['Userpass'];
// MINIFY THE HTML
ob_start('compress_html');
ob_start();
define('Kh4nhHuy3z!99^H2S04','Fuck You',true);
include_once("../connect.php");
#kiem tra xem da login chua
$baotrix = 1;
$q1 = @$data->query("Select Baotri from [Db_Web].[dbo].[ws_bao_tri] Where ID = '2' and Baotri='1'");
if (strcmp($baotrix,@$data->query_num($q1))==0)
{
	die('&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<iframe width="660" height="355" src="https://www.youtube.com/embed/-eVqy4spWV0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<iframe width="660" height="355" src="https://www.youtube.com/embed/7fkn0IkBivs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><center><h1><a href="http://s2.Gà Tân Sửu.com" target="_blank" style="color : red;">Máy chủ bảo trì đến ngày 10-12-2020, Hẹn gặp lại mọi người!</a></h1></center>');
			
}

if(!isset($_SESSION['ShopID'])) {
	thongbao('Đăng nhập vào webshop sau đó click chữ vào game để chơi');
}

$q = @$data->query("Select * from Sys_Users_Detail Where Username = '$USER' And (NickName like N'%:%' or NickName like N'%[%' or NickName like N'%]%')");
			if(@$data->query_num($q) <> 0) {
				die('Tên nhân vật không hợp lệ vui lòng đổi tên khác');
			}
$q = @$data->query("Select * from [Db_Web].[dbo].[ws_username] Where Username = '$USER' And Block='1'");
			if(@$data->query_num($q) <> 0) {
				die('<center><h1><a href="https://www.facebook.com/Webgame-Mi%E1%BB%85n-Ph%C3%AD-Gà Tân Sửucom-109081437377813" target="_blank" style="color : red;">Tài khoản bị khóa bởi admin, liên hệ page để khiếu nại!</a></h1></center>');
			}
//die('Đợi xíu nhé AE');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language=JavaScript> var txt="(¯`·.º-:¦:-Gà Tân Sửu - Đẳng cấp là mãi mãi| Chúc Bạn Chơi Game Vui Vẻ-:¦:-º.·´¯)"; var espera=200; var refresco=null; function rotulo_title() { document.title=txt; txt=txt.substring(1,txt.length)+txt.charAt(0); refresco=setTimeout("rotulo_title()",espera); } rotulo_title();</SCRIPT>
	<meta name="description" content="Gunny Đỉnh Cao " />
	<meta name="keywords" content="Web game, game ban sung, Web game moi, Webgame, game vui nhon, ban sung truc tuyen, gunny II, gunny online, web game gunny, game truc tuyen" />
	<meta property="og:image" content="/img.zing.vn/gn/images/gunny-ldg.jpg"/>
	<meta name="google-site-verification" content="wPF5RJbnJs8udIb5n7FeCl04mHe3hP2676GpCiXwH6o" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>	
</head>
<style>
html, body	{ height:100%; }
			body {
				 margin: 0px auto;
            padding: 0px;
            background-image:url(images/bg_all.jpg);
			background-repeat: no-repeat;
			background-position: center center;
			}
			#flashgame {
				text-align: center;
				font-size: 18px;
				color:green;
				padding-top: 300px;
						}
.menubg_fix {
    //background: url(http://s2.Gà Tân Sửu.com/images/bg-navtop.png) repeat-x;
    height: 33px;
    width: 100%;
    float: left;
    color: #333;
    line-height: 33px;
    position: fixed;
    z-index: 1000;
    //box-shadow: 0 1px 2px #333;
}
.margin_auto {
   
    margin: 0 auto;
}
.gameconfix {
    float: left;
    color: #333;
    font-weight: bold;
    text-decoration: none;
}
.login_register {
    float: left;
    margin-left: 7%;
    width: 90%;
}
.login_register a {
	color: #fff;
    font-weight: bold;
    text-align: center;
    font-size: 12px;
    text-decoration: none;
}
.login_register a:hover{
	color: #f9ff00;
    font-size: 13px;
    text-decoration: none;
}
.name_te {
    color: #999 !important;
    float: left;
}
.arrowiconleft {
    background: url(http://s2.Gà Tân Sửu.com/images/right-icontop.png) no-repeat;
    width: 2px;
    height: 22px;
    float: left;
    margin: 4px 10px 0;
}
.name_te {
    color: #999 !important;
    float: left;
}
.arrowiconleft {
    background: url(http://s2.Gà Tân Sửu.com/images/right-icontop.png) no-repeat;
    width: 2px;
    height: 22px;
    float: left;
    margin: 4px 10px 0;
}
.topup {
    background: #2ca406;
   
    padding: 0 11px;
    height: 24px;
    line-height: 24px;
    margin-top: 4px;
    margin-right: 10px;
    border-radius: 20px;
    float: left;
}
</style>

<script>
$(document).ready(function () {
	
	$.ajax({
		type: 'GET',
		url: '//<?php echo $_SERVER['HTTP_HOST']; ?>/<?=$link_game;?>/checkuser.ashx',
		data: '<?php echo 'username='. $USER .'&password='. $PWD ?>',
		success: function (data_revert) {
			
			if(data_revert != 'ok'){
				alert('Vui lòng tải Laucher !');
			}
			else{
				
				var html = '<div style="width:1345px; height:680px;vertical-align: middle;display: table-cell;">';
				html += '<center><b><font color="#FF0000" size="2">Đang vào game vui lòng đợi...</center>';
				html += '</div>';
				
				$('#flashgame').html(html);
				
				setTimeout(function () {
					
					$.ajax({
						type: 'GET',
						url: '//<?php echo $_SERVER['HTTP_HOST']; ?>/<?=$link_game;?>/LoginGame.aspx',
						success: function (data_revert) {
							
							$('#flashgame').html(html);
							
							if (data_revert != "0") {
								
								
                            //location.replace(data_revert);
							var centerIframe = document.createElement("iframe");
							centerIframe.setAttribute("frameBorder","0");
							centerIframe.setAttribute("border","0");
							centerIframe.setAttribute("marginwidth","0");
							centerIframe.setAttribute("marginheight","0");
							centerIframe.setAttribute("scrolling","no");
							centerIframe.setAttribute("allowTransparency","true");
							centerIframe.style.width = "100%";
							centerIframe.style.height = "100%";
							centerIframe.src = data_revert;
							document.getElementById("flashgame").style.display = "none";
							document.body.appendChild(centerIframe);
							console.log(data_revert);	
								
							}
							else{ 
								$('#flashgame').html(html);
								/* redireciona("/logout.php"); */
							}
						
							
						}
					});
					
				}, 2000);
				
			}
			
		}
		
	});
	
});
</script>
  <body>    
	<div id="flashgame" >
      Đang tải game, vui lòng chờ trong giây lát!
	  <br/><br/>
	  <img alt=""  src="../images/loadvx.gif" />
     </div>    
    </body>
</html>
