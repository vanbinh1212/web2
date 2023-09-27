<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

include dirname(__FILE__).'/../recaptcha/autoload.php';
include_once(dirname(__FILE__)."/../class/function.global.php");

include_once(dirname(__FILE__)."/../class/function.soap.php");
$userid = $_SESSION['ss_user_id'];
$mathe = trim($_POST['txtserial']);	
$menhgia = trim($_POST['txtMenhgia']);	
$serverid = trim($_POST['txtServer']);	
$status = 2 ;

$account = new account();

if($_POST)  {
	if($mathe) {
		
		$userInfo = account::getUserInfo(trim($userid));
		if(!vaildCaptcha($mathe)) {
				//echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Mã thẻ, Vui lòng nhập lại để gửi lệnh nạp ! ", [])</script>';
					die('<font size=6 color=red>Bạn đã nhập sai Mã thẻ, Vui lòng nhập đúng để gửi lệnh nạp ! <a href="http://gunnyae.com/tai-khoan/gui-nap/">Click vào đây để quay lại </a></font>');
		

			break;
			}
			

				else {
					account::guilenhnap($userid, $userInfo['Email'], $menhgia, $status, $mathe, $serverid);

				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã gửi lệnh thành công ! Vui lòng kiểm tra lệnh nạp tại mục Trạng thái lệnh nạp . Sau khi thành công Mã Giftcode nhận thưởng sẽ là<font color=red><b> : '.$mathe.'</b> ", [])</script>';
			}
		
	
	}
	}

sqlsrv_close($conn);
?>