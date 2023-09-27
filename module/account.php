<?php
if(!defined("SNAPE_VN")) die('No access');

if(!$account->isLogin())
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());

/*
if(($userInfo['Fullname'] == null || $userInfo['Phone'] == null) && !$_SESSION['ss_notice_update_info'] && $_SESSION['ss_notice_update_password']) {

	$text = "Bạn chưa cập nhật SDT hoặc Tên chủ tài khoản. <font color='red'>Hãy cập nhật để được tăng thêm Xu khi thi đấu trong game.</font><br/><br/>";

	if($userInfo['Fullname'] == null)
		$text .= "+ Cập nhật <b>Tên chủ tài khoản:</b> Liên hệ GM để cập nhật, truy cập vào trang <a href='".$_config['page']['fullurl']."/ho-tro/'>Hỗ trợ</a> để yêu cầu.";

	if($userInfo['Phone'] == null)
		$text .= "<br/>+ Cập nhật <b>Số điện thoại:</b> Soạn tin <b>XACTHUC HD</b> gửi 8085.";

	echo '<script>SnapeClass.openModal("Cảnh báo", "'.$text.'", [])</script>';

	$_SESSION['ss_notice_update_info'] = true;
}*/

$accountPage = remoteAccount($_REQUEST['module']);

?>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 menu-left">
			<div style="padding-bottom: 17px;text-align:center;">
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/chon-may-chu/"><img src="<?=$_config['page']['fullurl']?>/images/choi-ngay.png" width="98%"></a>
				</div>
				<div class="page-header">
				    <h4>Danh mục</h4>
				</div>
				
				<div class="list-group">
					
					<a href="<?=$_config['page']['fullurl']?>" class="list-group-item"><span class="icon_menulist glyphicon glyphicon-home"></span> Trang chủ</a>
					<a id="guildAccount" href="<?=$_config['page']['fullurl']?>/tai-khoan/" class="list-group-item"><span class="icon_menulist glyphicon glyphicon-user"></span> Quản lý tài khoản</a>
					<a id="launcher" href="<?=$_config['page']['fullurl']?>/launcher.rar" class="list-group-item"><span class="icon_menulist glyphicon glyphicon-user"></span> Tải Launcher SV <img src="http://gunnyae.com/images/hot1.gif"></a>
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/doi-mat-khau/" class="list-group-item <?=(($accountPage['content'] == 'changepassword') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-th-large"></span> Đổi mật khẩu</a>
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/gui-nap/" class="list-group-item <?=(($accountPage['content'] == 'guinap') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-refresh"></span> Nạp Game<img src="http://gunnyae.com/images/hot1.gif"></a>

					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/chuyen-xu/" class="list-group-item <?=(($accountPage['content'] == 'changemoney') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-refresh"></span> Chuyển Xu</a>
                    <a href="<?=$_config['page']['fullurl']?>/tai-khoan/xoa-ket/" class="list-group-item <?=(($accountPage['content'] == 'xoaket') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-refresh"></span> Xóa Két Guild <img src="http://gunnyae.com/images/new.gif"></a>
                    <a href="<?=$_config['page']['fullurl']?>/tai-khoan/doi-gioi-tinh/" class="list-group-item <?=(($accountPage['content'] == 'doigioitinh') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-refresh"></span> Đổi Giới Tính <img src="http://gunnyae.com/images/new.gif"></a>
                    <a href="<?=$_config['page']['fullurl']?>/tai-khoan/doi-ten/" class="list-group-item <?=(($accountPage['content'] == 'doiten') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-refresh"></span> Đổi Tên <img src="http://gunnyae.com/images/new.gif"></a>
                
					<a id="guildHelp" href="https://www.facebook.com/profile.php?id=100092000605483" class="list-group-item"><span class="icon_menulist glyphicon glyphicon-headphones"></span> Hỗ trợ người chơi</a>
					<a href="javascript:;" onclick="SnapeClass.logout()" class="list-group-item"><span class="icon_menulist glyphicon glyphicon-log-in"></span> Thoát đăng nhập</a><br><br>

				</div>
				<div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">

					<div class="col-md-12" style="margin-top: 20px;">
						<ol class="breadcrumb">
						  <li><a href="<?=$_config['page']['fullurl']?>">Trang chủ</a></li>
						  <?=(($accountPage['content'] == 'accountinfo') ? '<li class="active">Tài khoản</li>' : '<li><a href="'.$_config['page']['fullurl'].'/tai-khoan/">Tài khoản</a></li><li class="active">'.$accountPage['title'].'</li>')?>
						</ol>
					</div>
					
				</div>
				<div class="panel panel-default" style="margin-top: 0px;">
					<div id="namebox" class="panel-heading"><?=$accountPage['title']?></div>
					<div class="panel-body">
						<? include dirname(__FILE__).'/account/'.$accountPage['content'].'.php'; ?>
					</div>
				</div>
			</div>
		</div>