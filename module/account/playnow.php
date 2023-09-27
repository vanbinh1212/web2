<?php
session_start();
define("SNAPE_VN", true);

include_once dirname(__FILE__).'/#config.php';

include dirname(__FILE__).'/class/function.remotepage.php';

include dirname(__FILE__).'/class/function.global.php';

include dirname(__FILE__).'/class/class.account.php';

include dirname(__FILE__).'/class/class.item.php';

$pageRemote = remotePage(str_replace("/", "", $_GET['page']));

$account = new account(0);

if($account->isLogin())
    $userInfo = $account->getUserInfo($_SESSION['ss_user_id']);

?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gunny phiên bản mới nhất - Miễn phí 500.000 Coin Webshop. Miễn phí pet Tôn Ngộ Không. Thích cái gì là có cái đó. Trải nghiệm ngay nào!!!">
	<meta name="keywords" content="gunny free, ddtank, ddtank private, gunny private, gunny lậu, gunny private, gunny miễn phí, gunny đầy đủ tính năng, gunny phó bản chuẩn zing, gunny có doanh chiến, gunny có guild chiến, gunny có tranh bá chí tôn, gunny có pet tôn ngộ không, gunny miễn phí pet tôn ngộ không, gunny, gunny lau, gunny lau moi nhat, gunny phien ban moi, gunny moi nhat, gunny dai chien 7 thanh pho, gunny lau full xu, gunnyfullxu, gunny lau co pet ton ngo khong, gunny lau mien phi pet ton ngo khong, pet ton ngo khong gunny, free pet ton ngo khong, gunny full xu, gunny cay quoc, gunny day du tinh nang, gunny full pho ban, gunny pho ban chuan, gunny pho ban do ngon">
    <meta name="author" content="DDT Coder">
	<meta property="og:title" content="gunbachay.net - Gunny Miễn Phí Đỉnh Cao">
	<meta property="og:image" content="<?=$_config['page']['fullurl']?>/images/meta_logo.png">
	<meta property="og:description" content="Phiên bản luôn theo sát Zing, miễn phí ngay 500.000 Coin Webshop và pet Tôn Ngộ Không. Cày ít mà vẫn VIP, tính năng chuẩn zing nhất. Trải nghiệm ngay bây giờ.">
    <title><?=(($pageRemote['title'] != null) ? $pageRemote['title'].' - ' : '').$_config['page']['title']?></title>

    <!-- Bootstrap Core CSS -->
	<link href="<?=$_config['page']['fullurl']?>/css/style.css" rel="stylesheet">
    <link href="<?=$_config['page']['fullurl']?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/font-awesome.css" rel="stylesheet">
	<link href="<?=$_config['page']['fullurl']?>/css/bootstrap-social.css" rel="stylesheet" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/bootstrap-select.min.css" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/item_reader.css" >
	<link rel="stylesheet" href="<?=$_config['page']['fullurl']?>/css/popup_itemreader.css" >
	<link href="<?=$_config['page']['fullurl']?>/css/anno.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
	<!-- jQuery Version 1.11.1 -->
    <script src="<?=$_config['page']['fullurl']?>/jscedrusv3/jquery-1.11.3.min.js"></script>
	<script src='<?=$_config['page']['fullurl']?>/jscedrusv3/jquery-ui.min.js'></script>
	<script src='<?=$_config['page']['fullurl']?>/jscedrusv3/jquery.number.min.js'></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$_config['page']['fullurl']?>/jscedrusv3/bootstrap.min.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/jscedrusv3/jquery.validate.min.js"></script>
    <script src="<?=$_config['page']['fullurl']?>/jscedrusv3/jquery.twbsPagination.min.js"></script>
    <script type="text/javascript" src="<?=$_config['page']['fullurl']?>/jscedrusv3/pwstrength.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/jscedrusv3/bootstrap-select.min.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/jscedrusv3/fuckadblock.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/jscedrusv3/anno.js"></script>
	<script src="<?=$_config['page']['fullurl']?>/jscedrusv3/guild.js"></script>

	</script>
</head>

<body>
	<script>
	
	// khai bao ham global
	var max_loading_gif_count = <?=$_config['effect']['loading_max_count']?>;
	
	var full_url = "<?=$_config['page']['fullurl']?>";
	
	var isAdsDisplayed = true;

    </script>
	
	<script src="<?=$_config['page']['fullurl']?>/jscedrusv3/script_global.js"></script>

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
    <!-- Navigation -->
    <nav class="navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=$_config['page']['fullurl']?>">
					<img height="35" src="<?=$_config['page']['fullurl']?>/images/fclogo.png" />
				</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?=$_config['page']['fullurl']?>">Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?=$_config['page']['fullurl']?>/chonserver.php">Chơi game</a>
                    </li>
                    <li>
                        <a href="<?=$_config['page']['fullurl']?>/tai-khoan/nap-the/">Nạp thẻ</a>
                    </li>
                    <!--li>
                        <a href="<?=$_config['page']['fullurl']?>/hop-qua/">Hộp quà</a>
                    </li-->
					<li>
                        <a href="<?=$_config['page']['fullurl']?>/tai-khoan/cua-hang/">Cửa hàng</a>
                    </li>
                    <li>
                        <a href="<?=$_config['page']['fullurl']?>/ho-tro/">Hỗ trợ</a>
                    </li>
                </ul>
				
				<ul class="nav navbar-nav navbar-right">
                    <?php
                    if($account->isLogin()) {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$account->getUsername()?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a>Coin: <b><?=number_format($userInfo['Money'])?></a></b></li>
                            <li><a>Coin khóa:  <b><?=number_format($userInfo['MoneyLock'])?></a></b></a></li>
                            <li class="divider"></li>
                            <li><a href="<?=$_config['page']['fullurl']?>/tai-khoan/">Quản lý tài khoản</a></li>
                            <li><a href="<?=$_config['page']['fullurl']?>/tai-khoan/nap-the/">Nạp thẻ</a></li>
                            <!--li><a href="<?=$_config['page']['fullurl']?>/hop-qua/">Hộp quà may mắn</a></li-->
                            <li><a href="<?=$_config['page']['fullurl']?>/tinh-nang/">Tính năng</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:;" onclick="SnapeClass.logout()">Thoát</a></li>
                        </ul>
                    </li>
                    <?php
                    } else {
                    ?>
                    <li><a href="<?=$_config['page']['fullurl']?>/dang-ky/"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
                    <li><a href="<?=$_config['page']['fullurl']?>/dang-nhap/"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
                    <? } ?>
				</ul>

            </div>
			
            <!-- /.navbar-collapse -->
        </div>
       <!-- /.container -->
    </nav>
	<div class="outer">

	    <div class="container">

</div>
	    <!-- Page Content -->
    <div class="container">

        		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row">
							<div class="col-md-12 center">
				<div class="panel panel-success" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Chọn máy chủ</div>
					<div class="panel-body">
						<!---div class="card">
  <div class="card-block">
    <h3 class="card-title">Gà Vườn Alphatest</h3>
    <p class="card-text">Open : 13 giờ 00 ngày 28-01-2019</p>
    <a href="<?=$_config['page']['fullurl']?>login/index.php?id=1001" class="btn btn-warning">CHƠI NGAY</a>
  </div>
</div---->
<div class="col-md-3">
<div class="card">
  <img src="<?=$_config['page']['fullurl']?>/images/gamua.png" width="auto" height="129px" alt="Card image cap">
  <div class="card-body">

   <div class="ribbon"><span class="moinhat">MỚI NHẤT</span></div>

   <h5></h5>
    <p class="text-muted">Cụm máy chủ Gà Mưa ra mắt vào lúc 19h00 ngày 12/07</p>
	
     <a href="http://gunbachay.net/play/play.php?id=1001" class="btn btn-warning"><span class="glyphicon glyphicon-play"></span> MÁY CHỦ : Gà Mưa</a>
  </div>
</div></div>
<div class="col-md-3">
<div class="card">
  <img src="<?=$_config['page']['fullurl']?>/images/gabien.png" width="auto" height="129px" alt="Card image cap">
  <div class="card-body">

   <div class="ribbon"><span class="moinhat">MỚI NHẤT</span></div>

   <h5></h5>
    <p class="text-muted">Máy chủ Gà Heroes ra mắt vào lúc 19h00 ngày 06/07</p>
	
     <a href="http://play.gunbachay.net/" class="btn btn-warning"><span class="glyphicon glyphicon-play"></span> MÁY CHỦ : Gà Heroes</a>
  </div>
</div></div>


<div class="col-md-3">

<div class="card">
  <img src="<?=$_config['page']['fullurl']?>/images/gachoi.png" alt="Card image cap">
  <div class="card-body">
  <div class="ribbon"><span class="dongnhat">ĐÔNG NHẤT</span></div>
   <h5></h5>
    <p class="text-muted">Máy chủ Gà Vista ra mắt vào lúc 15h00 ngày 31/07</p>
	
    <a href="http://play.gunbachay.net/" class="btn btn-success"><span class="glyphicon glyphicon-play"></span> MÁY CHỦ : GÀ VISTA</a>
  </div>
</div></div-->
<!---div class="col-md-3">
<div class="card">
  <img src="<?=$_config['page']['fullurl']?>/images/garung.png" width="auto" height="129px" alt="Card image cap">
  <div class="card-body">

   <div class="ribbon"><span class="moinhat">MỚI NHẤT</span></div>

   <h5></h5>
    <p class="text-muted">Ra mắt : 13 giờ ngày 12 tháng 04 năm 2019</p>
	
     <a href="<?=$_config['page']['fullurl']?>/login/index.php?id=1004" class="btn btn-primary"><span class="glyphicon glyphicon-play"></span> MÁY CHỦ : Gà Hồi Ức</a>
  </div>
</div></div---->

<!--div class="col-md-3">
<div class="card">
  <img src="<?=$_config['page']['fullurl']?>/images/gamo.png" width="auto" height="129px" alt="Card image cap">
  <div class="card-body">

   <div class="ribbon"><span class="moinhat">MỚI NHẤT</span></div>

   <h5></h5>
    <p class="text-muted">Máy chủ Gộp giữa Gà Con,Gà Mờ,Gà Vườn</p>
	
     <a href="<?=$_config['page']['fullurl']?>/login/index.php?id=1002" class="btn btn-primary"><span class="glyphicon glyphicon-play"></span> MÁY CHỦ : GÀ TRỐNG</a>
  </div>
</div></div>

<div class="col-md-3">
<div class="card">
  <img src="<?=$_config['page']['fullurl']?>/images/giaidau.png" width="auto" height="129px" alt="Card image cap">
  <div class="card-body">

   <div class="ribbon"><span class="moinhat">MỚI NHẤT</span></div>

   <h5></h5>
    <p class="text-muted">Diễn ra vào ngày 22/07</p>
	
     <a href="<?=$_config['page']['fullurl']?>/login/index.php?id=1005" class="btn btn-warning"><span class="glyphicon glyphicon-play"></span> MÁY CHỦ : GIẢI ĐẤU</a>
  </div>
</div></div-->




					</div>
				</div>
			</div>
		</div>        <!-- /.row -->
 <div style="height:250px">
       
    </div>
	
    </div>
    <!-- /.container -->
	
	</div>
    	
  <div class="footer">
		<div class="container">
			<div class="foo-intro col-sm-10">
				<h3>gunhoiuc.com - GUNNY MIỄN PHÍ MỚI NHẤT</h3>
				<p>Đây là phiên bản <b>GUNNY PRIVATE</b> mở ra nhằm tạo sân chơi vui vẻ cho cộng đồng gunner Việt Nam.</p>
				<p>Khi các bạn tham gia <b>gunhoiuc.com</b> là đã đồng ý các quy định của <b>gunhoiuc.com</b></p>
				<p>Email: <b>(chưa cập nhật)</b> | Số điện thoại: <b>(chưa cập nhật)</b></p>
			</div>
		</div>
	</div>
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
