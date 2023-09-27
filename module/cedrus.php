
<?php
	session_start();
	
	define("SNAPE_VN", true);
	include_once(dirname(__FILE__)."/../class/class.account.php");
	$userid = $_SESSION['ss_user_id'];
	if($userid<>'1183' and $userid<>'1183' and $userid<>'4')
	{
	die('<center><b><font color=red>Bạn không phải admin không thể truy cập</font></b></center>');
	}
	$listAccount = trim($_POST['text']);
	
	$serverid = 0;
	
	if($listAccount) {
		
		$listAccountArray = explode(",", $listAccount);
		
		$place = trim($_POST['txtAmount']);;
	
		foreach($listAccountArray as $acc) {
			
			// get userid
			$userInfo = account::getUserInfoByEmail(trim($acc));
			
			if($userInfo != false) {
				
				switch($place) {
					
					case 10000:
					account::addItemBag($userInfo['UserID'], 0, 130035, 50, true, 0, true); // trade 1
					account::addItemBag($userInfo['UserID'], 0, 130036, 50, true, 0, true); // trade 2
					account::addItemBag($userInfo['UserID'], 0, 130038, 50, true, 0, true); // trade 3				
					account::addItemBag($userInfo['UserID'], 0, 7600001, 10, true, 0, true); // honthienwang		
					account::addItemBag($userInfo['UserID'], 0, 7600002, 10, true, 0, true); // trade 3				
					account::addItemBag($userInfo['UserID'], 0, 30101, 1, true, 0, true); // trade 3	
					account::addItemBag($userInfo['UserID'], 0, 31101, 1, true, 0, true); // trade 3		
					account::addItemBag($userInfo['UserID'], 0, 32101, 1, true, 0, true); // trade 3		
					account::addItemBag($userInfo['UserID'], 0, 14038, 1, true, 0, true); // trade 3				
					account::addItemBag($userInfo['UserID'], 0, 16062, 1, true, 0, true); // trade 3			
					account::addItemBag($userInfo['UserID'], 0, 15146, 1, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11026, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11027, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11034, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11035, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11036, 999, true, 0, true); // trade 3
					
					case 20000:
					account::addItemBag($userInfo['UserID'], 0, 130035, 50, true, 0, true); // trade 1
					account::addItemBag($userInfo['UserID'], 0, 130036, 50, true, 0, true); // trade 2
					account::addItemBag($userInfo['UserID'], 0, 130038, 50, true, 0, true); // trade 3				
					account::addItemBag($userInfo['UserID'], 0, 7600001, 10, true, 0, true); // honthienwang		
					account::addItemBag($userInfo['UserID'], 0, 7600002, 10, true, 0, true); // trade 3				
					account::addItemBag($userInfo['UserID'], 0, 30101, 1, true, 0, true); // trade 3	
					account::addItemBag($userInfo['UserID'], 0, 31101, 1, true, 0, true); // trade 3		
					account::addItemBag($userInfo['UserID'], 0, 32101, 1, true, 0, true); // trade 3		
					account::addItemBag($userInfo['UserID'], 0, 14038, 1, true, 0, true); // trade 3				
					account::addItemBag($userInfo['UserID'], 0, 16062, 1, true, 0, true); // trade 3			
					account::addItemBag($userInfo['UserID'], 0, 15146, 1, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11026, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11027, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11034, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11035, 999, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 11036, 999, true, 0, true); // trade 3
					case 30000:
					account::addItemBag($userInfo['UserID'], 0, 315006, 100, true, 0, true); // dch5
					account::addItemBag($userInfo['UserID'], 0, 11162, 100, true, 0, true); // mui khoan 1
					account::addItemBag($userInfo['UserID'], 0, 100100, 300, true, 0, true); // da tinh yeu
					account::addItemBag($userInfo['UserID'], 0, 11163, 999, true, 0, true); // so cap super-bum
					account::addItemBag($userInfo['UserID'], 0, 11169, 50, true, 0, true); // so cap super-bum
					account::addItemBag($userInfo['UserID'], 0, 8017, 1, true, 0, false); // so cap super-bum
					account::addItemBag($userInfo['UserID'], 0, 9028, 1, true, 0, false); // so cap super-bum
					break;
					
					case 50000:
					account::addItemBag($userInfo['UserID'], 0, 130035, 5, true, 0, true); // trade 1
					account::addItemBag($userInfo['UserID'], 0, 130036, 5, true, 0, true); // trade 2
					account::addItemBag($userInfo['UserID'], 0, 130038, 5, true, 0, true); // trade 3
					account::addItemBag($userInfo['UserID'], 0, 201567, 100, true, 0, true); // vang
					account::addItemBag($userInfo['UserID'], 0, 315006, 300, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11162, 300, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 8217, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9228, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 100100, 999, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11163, 3000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11164, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11165, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11166, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 201567, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11167, 15, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11168, 2, true, 0, true);
					break;
					
					case 100000:
					account::addItemBag($userInfo['UserID'], 0, 7135, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 11169, 200, true, 0, true); // da
					account::addItemBag($userInfo['UserID'], 0, 11170, 200, true, 0, true); // dong
					account::addItemBag($userInfo['UserID'], 0, 11171, 200, true, 0, true); // bac
					account::addItemBag($userInfo['UserID'], 0, 11172, 200, true, 0, true); // vang
					account::addItemBag($userInfo['UserID'], 0, 11173, 200, true, 0, true); // ngoc
					account::addItemBag($userInfo['UserID'], 0, 11177, 2500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 35170101, 1, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 8317, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9328, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 315006, 1000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11162, 1200, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 100100, 3000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11163, 7000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 201489, 300, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 201567, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11167, 50, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11164, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11165, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11166, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11168, 10, true, 0, true);
					break;
					
					case 200000:
					case 300000:
					account::addItemBag($userInfo['UserID'], 0, 7139, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 35210101, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 46004, 1, true, 30, false);
					account::addItemBag($userInfo['UserID'], 0, 122318, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 8417, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9428, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 11168, 50, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 17012, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 101011, 20, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 101010, 20, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11906, 999, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11560, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11561, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11562, 100, true, 0, true);
					break;
					
					case 500000:
					account::addItemBag($userInfo['UserID'], 0, 7139, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 35210201, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 46004, 1, true, 90, false);
					account::addItemBag($userInfo['UserID'], 0, 122318, 3, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 17013, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 8517, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9528, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 101011, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 101010, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11168, 200, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 29994, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11560, 500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11561, 500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11562, 500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11906, 3000, true, 0, true);
					break;

				}
				echo '<center><font color=red>Gửi thành công quà nạp tới tài khoản '.$acc.' - Mệnh Giá : '. $place .' VNĐ</font></center></br>';
				$place;
				
			} else {
				echo 'ERROR ACCOUNT '.$acc.' - Mệnh Giá: '. $place .' VNĐ</br>';
			}
		}
	}
	
	
	
	
?>

<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/jscedrusv3/load_news.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
        	SnapeNews.init(1);
			//SnapeGuild.guildHome().show();
        });
    </script>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 menu-left">
				<div class="page-header">
				    <h4>Công cụ quản lý game</h4>
				</div>
				<div class="list-group">
					<a href="<?=$_config['page']['fullurl']?>" class="list-group-item"><span class="icon_menulist glyphicon glyphicon-home"></span> Trang chủ</a>
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/" class="list-group-item <?=(($accountPage['content'] == 'accountinfo') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-user"></span> Thông tin tài khoản</a>
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/doi-mat-khau/" class="list-group-item <?=(($accountPage['content'] == 'changepassword') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-th-large"></span> Đổi mật khẩu</a>
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/nap-the/" class="list-group-item <?=(($accountPage['content'] == 'recharge') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-euro"></span> Nạp thẻ</a>
					<a href="<?=$_config['page']['fullurl']?>/tai-khoan/log-card/" class="list-group-item <?=(($accountPage['content'] == 'logcard') ? 'active' : '')?>"><span class="icon_menulist glyphicon glyphicon-usd"></span>Lịch sử nạp thẻ</a>					
					<a href="javascript:;" onclick="SnapeClass.logout()" class="list-group-item"><span class="icon_menulist glyphicon glyphicon-log-in"></span> Thoát đăng nhập</a>
				</div>
				
			</div>
			<div class="col-md-8">
				<div class="panel panel-success" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Gửi Quà Mốc Nạp</div>
					<div class="panel-body">
<form id="" method="post">
<b>	Tài khoản </b>			<input type="text" id="text" name="text" autocomplete="off" style="width:60%" class="form-control">
</br>
<label class="control-label" for="email_login">Mốc nạp:</label>
			<select class="form-control" style="width:50%" name="txtAmount">
			<option value="10000">1.000.000 VNĐ</option>
			<option value="20000">2.000.000 VNĐ</option>
			<option value="30000">3.000.000 VNĐ</option>
			<option value="50000">5.000.000 VNĐ</option>
            <option value="100000">10.000.000 VNĐ</option>
			<option value="200000">20.000.000 VNĐ</option>
			<option value="300000">30.000.000 VNĐ</option>
			<option value="500000">50.000.000 VNĐ</option>			
			</select>
			<br>
	<center><input type="submit" class="btn btn-primary btn-block" style="width:10%" value="Gửi" /></center>
</form>
</div>
</div>
</div>
</div>

</body>