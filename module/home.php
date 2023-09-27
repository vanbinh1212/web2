<?php
if(!defined("SNAPE_VN")) die('No access');

if(!$account->isLogin())
	movepage($_config['page']['fullurl'].'/dang-nhap/?return='.base64currenturl());

?>
<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/js/load_news.js?update="<?=time()?>></script>
<script type="text/javascript">
        $(document).ready(function () {
        	// SnapeNews.init(1);
			//SnapeGuild.guildHome().show();
			
			SnapeNews.getTop('FightPower');
			
			$('.levelTop').click(function() {SnapeNews.getTop('Level')});
			$('.fightPowerTop').click(function() {SnapeNews.getTop('FightPower')});
			$('.consortiaTop').click(function() {SnapeNews.getTop('Guild')});
			$('.donatetop').click(function() {SnapeNews.getTop('napthe')});
        });
		
    </script>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 menu-left">
			<div style="padding-bottom: 17px;text-align:center;"><br><br><br>
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/chon-may-chu/"><img src="<?=$_config['page']['fullurl']?>/images/choi-ngay.png" width="98%"></a>
				</div>
				<div class="panel panel-success" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Danh mục</div>
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

				</div>
			</div><Br><br>
			

			
			<div class="col-md-8">
				<div class="panel panel-success" style="margin-top: 25px;">
					
					<div class="panel-body">
						
						<hr>

	<div class="center-block" style="width:100%">
		<div class="form-group">
			<div id="msg_err_login" class="alert alert-success">
				<div>Hướng dân tải game để chơi GunnyPC</div>
			</div>
		</div>

 <center>


 
	<center><div class="col-md-12">
   <div class="quanap">
	<!------------------>

	&#xFEFF;<b>
<div class="row">
<div class="col-md-6 form-group col-xs-12">
        <div class="media list-group-item">
          <a class="media-left media-middle" href="http://gunnyae.com/launcher.rar">
            <img src="http://gunnyae.com/images/taive.png" width="80" height="80">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><a href="http://gunnyae.com/launcher.rar">Tải Launcher<img src="http://gunnyae.com/images/hot1.gif"></a></h4>
    	        Sau khi tải Launcher về thành công bạn cần giải nén ra và chạy file launcher.exe để vào game!   
          </div>
        </div>
    </div>  

<div class="col-md-6 form-group col-xs-12">
        <div class="media list-group-item">
          <a class="media-left media-middle" href="http://gunnyae.com/37abc.2.0.6.16.exe">
            <img src="http://gunnyae.com/images/37abc.png" width="80" height="80">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><a href="http://gunnyae.com/WebGame.zip">Tải trình duyệt chơi game</a></h4>
    	        Sau khi tải trình duyệt về bạn cần click vào để cài đặt và chạy trình duyệt vừa cài để vào game!
          </div>
        </div>
    </div> 
  <div class="col-md-6 form-group col-xs-12">
        <div class="media list-group-item">
          <a class="media-left media-middle" href="https://play.google.com/store/apps/details?id=com.cloudmosa.puffinFree">
            <img src="http://gunnyae.com/images/puffinicon.png" width="80" height="80">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><a href="https://play.google.com/store/apps/details?id=com.cloudmosa.puffinFree">Chơi game trên điện thoại</a></h4>
    	        Vào Chplay tải Puffin Web Browser và chơi game như ở máy tính!
          </div>
        </div>
    </div>  
==========================================================================================   

</div><Br>
			<br>
<img src="http://gunny55.com/5.jpg" width="500px">

<hr>							


</b></div>

			
</center>
						<div class="pagin_news"></div>
					</div>
				</div>
				
				</div>
			</div>
		</div>