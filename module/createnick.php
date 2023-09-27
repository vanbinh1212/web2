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



//exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gunny phiên bản cày cuốc xu và huân chương mua đá cường hóa hên xui!!!">
	<meta name="keywords" content="gunny hoi uc, gunny cuong hoa hên xui, gunny 3.0, gunny 3.4, gunny 3.6, gunny 2012, gunny huan chuong ,gunny free, ddtank, ddtank private, gunny private, gunny lậu, gunny private, gunny miễn phí, gunny đầy đủ tính năng, gunny phó bản chuẩn zing, gunny có doanh chiến, gunny có guild chiến, gunny có tranh bá chí tôn, gunny có pet tôn ngộ không, gunny miễn phí pet tôn ngộ không, gunny, gunny lau, gunny lau moi nhat, gunny phien ban moi, gunny moi nhat, gunny dai chien 7 thanh pho, gunny lau full xu, gunnyfullxu, gunny lau co pet ton ngo khong, gunny lau mien phi pet ton ngo khong, pet ton ngo khong gunny, free pet ton ngo khong, gunny full xu, gunny cay quoc, gunny day du tinh nang, gunny full pho ban, gunny pho ban chuan, gunny pho ban do ngon">
    <meta name="author" content="DDT Coder">
	<meta property="og:title" content="gunxua.com - Gunny Huyền Thoại.">
	<meta property="og:image" content="http://i.imgur.com/h3iHD2E.jpg"/>
	<meta property="og:description" content="Gunny phiên bản làm nhiệm vụ, chiến đấu tự do, chiến đấu guild, đi phó bản, không webshop, cày cuốc xu và huân chương mua đá cường hóa hên xui!!!. Trải nghiệm ngay bây giờ.">
    <title>Gunny Hồi Ức | Phiên bản Gunny Huyền Thoại</title>

    <!-- Bootstrap Core CSS -->
	<link href="<?=$_config['page']['fullurl']?>/css/style.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/idlogin.css" rel="stylesheet">
    <link href="<?=$_config['page']['fullurl']?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/font-awesome.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/bootstrap-social.css" rel="stylesheet" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/bootstrap-select.min.css" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/item_reader.css" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/popup_itemreader.css" >
	<link href="<?=$_config['page']['fullurl']?>/css/anno.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1502900789940194"
  theme_color="#ff7e29"
  logged_in_greeting="Xin chào, Gun Hồi Ức có thể giúp gì cho bạn ?"
  logged_out_greeting="Xin chào, Gun Hồi Ức có thể giúp gì cho bạn ?">
      </div>
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

<?php include_once 'module/navbar.php'; ?>
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
      html, body	{ height:100%; }
      body
        {
            margin: 0px auto;
            padding: 0px;
         background-image: url(images/bg_all.jpg) !important;
            background-repeat: no-repeat;
            background-position: center center;
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
		a:hover{
			text-decoration : none;
		}				
    </style>
		
	 <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle">
                    <table border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom: 150px;">
                        <tr>
                            <td align="center">
								<div id="gameOuterContainer"  style="cursor:pointer;width:1000px;height:600px;overflow:hidden;background-image:url('images/gamebg.jpg');background-repeat: no-repeat;background-size: cover;" onclick="showGame();">
                               <div id="gameContainer"  style="margin-top:50px;width:1000px;height:600px;overflow:hidden;">
   <form id="frmCreate" method="post">
	<div class="center-block" style="width:500px;">

		<div id="div_type" class="form-group">
		
			<input type="hidden" id="txtSex" name="txtSex" />
			<ul class="payment">
					<li>
						<a title="Nhân Vật Nam" class="hlk_selectCard" href="javascript:;">
							<div class="type-card-mobile">
							<img class="img-thumbnail" src="<?=$_config['page']['fullurl']?>/images/nam.png"></div>
							<div class="text-character"> Nhân Vật Nam </div>
							<input type="radio" name="txtSex" class="ratio_deposite" value="1" />
						</a>
				
					</li>
		
					<li>
                    <a title="Nhân Vật Nam" class="hlk_selectCard" href="javascript:;">
						<div class="type-card-mobile">
						<img class="img-thumbnail" src="<?=$_config['page']['fullurl']?>/images/nu.png"></div>
						<div class="text-character"> Nhân Vật Nữ </div>
						<input type="radio" name="txtSex" class="ratio_deposite" value="0" />
                    </a>
					</li>
					
			</ul> 
		
		</div>
	
				<div>

					<select id="txtServer" name="txtServer" class="form-control" value="<?=$svid;?>">
						<option value="<?=$svid;?>"><?=$serverInfo['ServerName']?></option>
					</select>
				
				</div><br/>
			<div class="form-group">
				<input type="text" id="txtNickname" placeholder="Vui lòng nhập tên nhân vật." name="txtNickname" autocomplete="off" class="form-control">
			</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-warning btn-block" value="Tạo Nhân Vật">
		</div>
		
</form>
       </div>    </div>                 </td>
                        </tr>
                    </table>
            </td>
        </tr>
    </table>

  	
					<script type="text/javascript">	
$(document).ready(function() {	

	
	function reloadMoney() {
		$("#zcoin_label").html('<img src="../themes/default/img/mini_loading.gif" />');
		$("#zcoinlock_label").html('<img src="../themes/default/img/mini_loading.gif" />');
		$("#gift_label").html('<img src="../themes/default/img/mini_loading.gif" />');
		$("#xu_label").html('<img src="../themes/default/img/mini_loading.gif" />');
		$("#vip_label").html('<img src="../themes/default/img/mini_loading.gif" />');
		$.post("../ajax/reload_point.php", "",
			function(json) {
				$("#zcoin_label").html(json['zcoin']);
				$("#zcoinlock_label").html(json['zcoinfree']);
				$("#gift_label").html(json['giftcard']);
				$("#xu_label").html(json['xu']);
				$("#vip_label").html(json['vip']);
			}, 'json');
	}
	reloadMoney();
	
	
});
	</script>
	

	
            </td>
        </tr>
    </table>


</body>
</html>