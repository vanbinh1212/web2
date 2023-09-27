<?php
session_start();
define("SNAPE_VN", true);

include_once dirname(__FILE__).'/#config.php';

include dirname(__FILE__).'/class/class.account.php';

include dirname(__FILE__).'/class/function.global.php';
//movepage($_config['page']['fullurl'].'/baotri.php');



$account = new account(0);

$svid = $_GET['id'];
$username = $_GET['u'];

$pass = $_GET['p'];




if(!$account->isLogin())
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());


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

$playerInfo = account::getPlayerInfo($_SESSION['ss_user_email']);
if($playerInfo == true) {
movepage($_config['page']['fullurl'].'/play.php?id='.$svid);	
}

//exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">

<head>

    <meta charset="utf-8">
	<link rel="shortcut icon" href="http://gunbachay.net/images/icon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gunny Phiên Bản 5.5 Sức Mạnh Thời Trang!!!">
	<meta name="keywords" content="gunny free, ddtank, ddtank private, gunny private, gunny lậu, gunny private, gunny miễn phí, gunny đầy đủ tính năng, gunny phó bản chuẩn zing, gunny có doanh chiến, gunny có guild chiến, gunny có tranh bá chí tôn, gunny có pet tôn ngộ không, gunny miễn phí pet tôn ngộ không, gunny, gunny lau, gunny lau moi nhat, gunny phien ban moi, gunny moi nhat, gunny dai chien 7 thanh pho, gunny lau full xu, gunnyfullxu, gunny lau co pet ton ngo khong, gunny lau mien phi pet ton ngo khong, pet ton ngo khong gunny, free pet ton ngo khong, gunny full xu, gunny cay quoc, gunny day du tinh nang, gunny full pho ban, gunny pho ban chuan, gunny pho ban do ngon">
    <meta name="author" content="DDT Coder">
	<meta property="og:title" content="gunbachay.net - Đẳng Cấp Gunny Cày Cuốc">
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
		
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
		$(".payment li").click(function() {
            choiceCard(this);
        });
		
		function choiceCard(obj) {

            var o = $(obj).find("input");
            $(".ratio_deposite").prop("checked", false);

            o.prop('checked', true);
            var value = o.val();
            $("#txtSex").val(value);

            $(".hlk_selectCard").removeClass("active");
            $(obj).addClass("active");
        }
		//SnapeClass.openModal("Cảnh báo", "<font color='red'><b>Tính năng này tạm dừng cho tới khi hệ thống gộp máy chủ thành công. Vui lòng quay lại sau.</b></font>", []);
		
    	$("#frmCreate").validate({
    		rules: {
				'txtSex': {
					required: true,
    			},
    			'txtServer': {
    				required: true,
					number: true,
					min: 1
    			},
    			'txtNickname': {
    				required: true,
				   minlength: 6,
			      maxlength: 20,
					remote: {
							url: "<?=$_config['page']['fullurl']?>/ajax/checknickname.php?id=<?=$svid?>",
							type: "post"
						}
    			}

    		},
				messages: {
				txtNickname: {
					required: "Vui lòng nhập Tên Nhân Vật",
					remote: "Tên nhân vật đã có người sử dụng !"
				}
			},
			submitHandler: function(form) {
				SnapeClass.disableSubmit();
				$.post(full_url + "/form/taonhanvat.php", $("#frmCreate").serialize(), function(data) {
					if(data['type'] == 0) {
						SnapeClass.openModal("Thành công", "Tạo nhân vật "+data['nickname']+" tại máy chủ "+data['servername'], []);
						SnapeClass.clearAllInput();
						//top.window.location = full_url+"/play.php?id="+data['serverid'];
						top.window.location = full_url+"/play.php?id="+data['serverid'];

					} else {
						SnapeClass.openModal("Lỗi tạo nhân vật", data['content'], []);
					}
					SnapeClass.undisableSubmit();
				}, 'json');
				return false;
			}
    	});
		

	});
</script>

	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '101464772507169');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=101464772507169&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      
</head>
<body scroll="yes">
	<script>
	
	// khai bao ham global
	var max_loading_gif_count = <?=$_config['effect']['loading_max_count']?>;
	
	var full_url = "<?=$_config['page']['fullurl']?>";
	
	var isAdsDisplayed = true;

    </script>
	
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

<script>
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

</script>
<style>
.error {
    color: red;
    margin-top: -69px;
}
img#nam {
	height:300px;
	    margin-left: -71px;
}
img#nu {
	height:300px;
}
		a:hover, a:focus{
			text-decoration : none;


		}
		.text-character{
			font-size: 19px;
		   font-family: 'UVNVan_B';
		       padding-bottom: 5px;

		}
		
		.img-thumbnail {
    display: inline-block;
    max-width: 100%;
    
    height: 315px;
    padding: 4px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}
.has-feedback {
    margin-top: 345px;
}

	.btn-warning {
    background-color: hsla(0, 64%, 42%, 0.73) !important;
    border: 1px solid #8BC34A !important;
   
		}
		ul.payment li{
			width: 185px;
			background-color : #dbdbdb00;
		}
      html, body	{ height:100%; }
      body
        {
            margin: 0px auto;
            padding: 0px;
         background-image: url(choigame/images/bg_all3.jpg) !important;
            background-repeat: no-repeat;
            background-position: center center;
        overflow:auto; text-align:center;
		background-size: auto;
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
			input[type="radio"] { 
			display: none;
		  }
	ul.payment{
					border-bottom : none;
	}
	.gogame-btn{
		background-image: url('http://GunBaChay.Net/images/gogame.png') !important; 
		background-repeat: no-repeat; 
		background-position:center center;
		background-color : #ff000000;
		border : none;
		width: 234px;
		height: 84px;
		
	}
	.gogame-btn:active{
		
  background-color: #ff000000;
  box-shadow: 0 5px #666;
  transform: translateY(4px);


	}
	
	img.fanpagebolac {
    margin-top: -73px;
    float: right;
    margin-right: -209px;
	cursor:url('img/pointer.cur');
	border: #e5aa31 solid 3px;
	border-radius: 31px;
}
  
    </style>
	
	<nav class="navbar-default navbartop navbar-expand-xl navbar-light" style="height:6%">
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
                    <li><a id="pay" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/tai-khoan/nap-the/" class="dropdown-item"><i class="fa fa-credit-card" aria-hidden="true"></i> Nạp Thẻ</a></li>
                    <li><a id="pay" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/tai-khoan/gui-nap/" class="dropdown-item"><i class="fa fa-university" aria-hidden="true"></i> Nạp ATM/MoMo</a></li>                 
				  <li><a id="eventtop" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/tai-khoan/lich-su-giao-dich/" class="dropdown-item"><i class="fa fa-history" aria-hidden="true"></i> Lịch Sử</a></li>

                </ul>
            </li>
			           
            <li><a href="<?=$_config['page']['fullurl']?>/tai-khoan/giftcode/" class="nav-link"><i class="fa fa-gift" aria-hidden="true"></i> Giftcode</a></li>
			<li>
                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="<?=$_config['page']['fullurl']?>/launcher.rar"><i class="fa fa-download" aria-hidden="true"></i> Tải Launcher <b class="caret"></b></a>
                <!--ul class="dropdown-menu">
                    <li><a id="pay" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/launcher.exe" class="dropdown-item"><i class="fa fa-credit-card" aria-hidden="true"></i> Launcher V1</a></li>
                    <li><a id="pay" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/launcherv2.exe" class="dropdown-item"><i class="fa fa-university" aria-hidden="true"></i> Launcher V2</a></li>                 

                </ul-->
            </li>
        </ul>
		
       
        
<!--div class="btn-group navbar-form">
            <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Tải Launcher<span class="caret"></span></button>
            <ul class="dropdown-menu">

                <li><a href="<?=$_config['page']['fullurl']?>/launcher.rar">Launcher V1</a></li>
				<li><a href="<?=$_config['page']['fullurl']?>/launcherv2.rar">Launcher V2</a></li>

            </ul>

        </div-->
       
           
        <ul class="nav navbar-nav navbar-right ml-auto">

            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img width="30" src="<?=$_config['page']['fullurl']?>/images/avatar.png" class="avatar" alt="Avatar"> <b><font color="red"><?=$account->getUsername()?></b></font> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a id="remove_user" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/tai-khoan/doi-mat-khau/"><i class="fa fa-key"></i> Đổi Mật Khẩu</a></li>
					  <li><a id="changecash" data-fancybox-type="iframe" href="<?=$_config['page']['fullurl']?>/tai-khoan/log-card/"><i class="fa fa-money"></i> <span class="badge">Giftcode đang có :<?=number_format($userInfo['CountGC'])?> </span> </a></li>
                    <li><a href="<?=$_config['page']['fullurl']?>/ho-tro/" class="dropdown-item"><i class="fa fa-users"></i> Gửi phiếu hỗ trợ</a></li>
                    <li><a href="<?=$_config['page']['fullurl']?>/tai-khoan/lich-su-giao-dich/" class="dropdown-item"><i class="fa fa-calendar-o"></i> Lịch Sử Giao Dịch</a></li>
					 <!--?php if($_SESSION['ss_user_email'] == $_config['panel']['Administrator'] or $_SESSION['ss_user_email'] == $_config['panel']['Administrator2']){
            echo '<li><a href="/quantri/" class="dropdown-item"><i class="fa fa-sliders"></i> AdminCP</a></li>';
        }
        ?-->
                    <li class="divider dropdown-divider"></li>
                    <li> <a href="javascript:;" onclick="SnapeClass.logout()"><i class="fa fa-sign-out"></i> Thoát</a></li>
                </ul>
            </li>
        </ul>
               


    </div>
</nav>

	 <table  width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle">

                    <table border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom: 150px;">

                        <tr>
                            <td align="center">
								<div id="gameOuterContainer"  style="cursor:pointer;width:1000px;height:600px;overflow:hidden;background-image:url('images/gamebg.jpg');background-repeat: no-repeat;background-size: cover;">
                              
							  <div id="gameContainer"  style="margin-top:25px;width:1000px;height:600px;overflow:hidden;">
							   <img style="cursor:pointer;margin-top: -12px;" src="http://GunBaChay.Net/images/43.png">

   <form id="frmCreate" method="post">
	<div class="center-block" style="width:500px;">
		<div id="div_type" class="form-group">
		
			<input type="hidden" id="txtSex" name="txtSex" />
			<ul  style="cursor:pointer" class="payment">
			<script>
			function nvNam()
			{
				document.getElementById("nam").style.height = "300px";
				document.getElementById("nu").style.height = "280px";
				document.getElementById("random").style.height = "37px";
				document.getElementById("nam").style.backgroundImage = "url('http://GunBaChay.Net/images/19.png')";
				document.getElementById("nu").style.backgroundImage = "none";
				document.getElementById("random").style.backgroundImage = "none";
				
			}
			function nvNu()
			{
				document.getElementById("nu").style.height = "300px";
				document.getElementById("nam").style.height = "280px";
				document.getElementById("random").style.height = "37px";
				document.getElementById("nu").style.backgroundImage = "url('http://GunBaChay.Net/images/19.png')";
				document.getElementById("nam").style.backgroundImage = "none";
				document.getElementById("random").style.backgroundImage = "none";
				
			}
			function nvRandom()
			{
				document.getElementById("nu").style.height = "280px";
				document.getElementById("nam").style.height = "280px";
				document.getElementById("random").style.height = "50px";
				document.getElementById("random").style.backgroundImage = "url('http://GunBaChay.Net/images/19.png')";
				document.getElementById("nam").style.backgroundImage = "none";
				document.getElementById("nu").style.backgroundImage = "none";
				
			}
			
			</script>
							
					<li>
						<a title="Nhân Vật Nam" class="hlk_selectCard" href="javascript:;">
							<img id="nam" onclick='nvNam();' style="cursor:pointer" src="<?=$_config['page']['fullurl']?>/images/male.png">
							<input style="cursor:pointer" type="radio" name="txtSex" class="ratio_deposite" value="1" />
						</a>
				
					</li>
<li>
						<a title="Ngẫu nhiên" class="hlk_selectCard" href="javascript:;">
							<img id="random" onclick='nvRandom();' style="cursor:pointer;margin-right: -135px;margin-top: -63px;" src="<?=$_config['page']['fullurl']?>/images/56.png">
							<input style="cursor:pointer" type="radio" name="txtSex" class="ratio_deposite" value="1" />
						</a>
				
					</li>
					<li>
                    <a title="Nhân Vật Nữ" class="hlk_selectCard" href="javascript:;">
						<div class="type-card-mobile">
						<img onclick='nvNu();'
						style="cursor:pointer"  id="nu" src="<?=$_config['page']['fullurl']?>/images/female.png"></div>
						<input style="cursor:pointer" type="radio" name="txtSex" class="ratio_deposite" value="0" />
                    </a>
					</li>
					
			</ul> 

        
		</div>
	
				<div>

					<select id="txtServer" name="txtServer" class="form-control" style="color:white; height: 0px;width: 0px;display: none;" value="<?=$svid;?>">
						<option value="<?=$svid;?>"><?=$serverInfo['ServerName']?></option>
					</select>
				
				</div><br/>

			<div class="form-group">

				<input type="text" id="txtNickname" style="color:white;letter-spacing:1px;width:80%;
				background-image: url(http://GunBaChay.Net/images/42.png);background-repeat : no-repeat;background-position: 0px center;
				background-color:#696969;padding-left:123px;font-family: 'UVNVan_B';font-weight:bold;margin-left: 21px;				
				border:none;font-size : large;" placeholder="Vui lòng nhập tên nhân vật
				" maxlength="20" name="txtNickname" autocomplete="off" class="form-control">
			</div>

		<div class="form-group">
			<!--input type="submit" style="width:80%;height:40px;margin-left: 21px;font-family: 'UVNVan_B';font-size: large; font-weight: bold;border-radius: 10px;" class="btn btn-warning btn-block" value="Tạo Nhân Vật"-->
				<input type="submit" id="gogamebtn" class="gogame-btn" value="">
	
		</div>
								<a href="<?=$_config['page']['fanpage']?>" target="_blank"><img class="fanpagebolac" title="Fanpage Bộ Lạc Gunny" alt="Fanpage Bộ Lạc Gunny" src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" width="50"></a>

</form>
       </div>    </div>                 </td>
                        </tr>
                    </table>
            </td>
        </tr>
    </table>

  	
	

	
            </td>
        </tr>
    </table>


</body>
</html>