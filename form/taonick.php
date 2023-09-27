<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

include_once(dirname(__FILE__)."/../class/function.global.php");

include_once(dirname(__FILE__)."/../class/function.soap.php");

//include dirname(__FILE__).'/../recaptcha/autoload.php';

$account = new account();

$return['type'] = -1;
$return['content'] = 'Lỗi không xác định';

$serverid = trim($_POST['txtServer']);
$code = trim($_POST['txtCode']);
$nickname = trim($_POST['txtNickname']);
$email = $_SESSION['ss_user_email'];
if(!$account->isLogin()) {
	$return['type'] = 1;
	$return['content'] = 'Chưa đăng nhập.';
}

if(!is_numeric($serverid) || $serverid <= 0) {
	$return['type'] = 154;
	$return['content'] = 'Error verify params.';
}

if(!vaildCaptcha($code)) {
	$return['type'] = -928;
	$return['content'] = 'Mã bảo vệ không chính xác.';
}


if($serverid == 3) {
	$return['type'] = -928;
	$return['content'] = 'Máy chủ này không hỗ trợ chuyển Xu vào game.';
}
$coin = 500;
if($return['type'] == -1) {
	
	$conn_sv = connectTank($serverid);
	
	if(!$conn_sv) {
		$return['type'] = 2;
		$return['content'] = 'Máy chủ bảo trì hoặc không thể kết nối.';
	} else {
		//$result = $account->chargeMoney($_SESSION['ss_user_email'], 100);
		$serverInfo = loadserver($serverid);
		// check money
		$userInfo = $account->getUserInfo($_SESSION['ss_user_id']);
		
		if($coin != null) {
			// du tien
			// kiem tra xem co nhan vat hay khong
            $playerInfo = $account->getPlayerInfoNap($email,$serverid);
			//$playerInfo = $account->getPlayerInfo($_SESSION['ss_user_email']);
			
			if($playerInfo != true) {

							
						//die('aaaa:'.$val);
						if(1 == 1) {
							//if($result4 != false) {						
						
							// notice
							$account->createNick($email, 'bot', $nickname, true, 0, 1, 7008, 5101, 1102, 2102, 61000000, 74000000, 13105);				
							$return['type'] = 0;
							$return['nickname'] = $nickname;
							$return['money'] = $xuhave;
							$return['servername'] = $serverInfo['ServerName'];
							$return['content'] = 'Success.';
						} else {
							$return['type'] = -1010;
							$return['content'] = 'Lỗi hệ thống. Liên hệ GM để được hỗ trợ. CRE';
						}
					
				
				
			} else {
				$return['type'] = -1010;
				$return['content'] = 'Tài khoản của bạn đã tạo nhân vật vui lòng vào game';
			}
		} else {
			$return['type'] = -1010;
			$return['content'] = 'Số dư không đủ. Không thể thực hiện giao dịch, vui lòng nạp thêm !';
		}
	}
	sqlsrv_close($conn_sv);
}
echo json_encode($return);
sqlsrv_close($conn);
?>