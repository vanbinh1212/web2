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
$email = $_SESSION['ss_user_email'];
$nickname = trim($_POST['txtNickname']);
$sex = trim($_POST['txtSex']);
$serverid = trim($_POST['txtServer']);
$serverInfo = loadserver($serverid);

if(!$account->isLogin()) {
	$return['type'] = 1;
	$return['content'] = 'Chưa đăng nhập.';
}

if(!is_numeric($serverid) || $serverid <= 0) {
	$return['type'] = 154;
	$return['content'] = 'Error verify params.';
}
if(!is_numeric($sex)) {
	$return['type'] = 154;
	$return['content'] = 'Giới tính không hợp lệ.';
}

if(strlen($nickname) < 6 || strlen($nickname) > 20) { 
	$return['type'] = 154;
	$return['content'] = 'Tên nhân vật quá dài hoặc quá ngắn';
}
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
		
			// du tien
			// kiem tra xem co nhan vat hay khong
			$playerInfo = $account->getPlayerInfo($email); 
			if($playerInfo == false) {
			
				$result = $account->createNickname($userInfo['Email'], 'bot', $nickname , $sex, '0', '1'); // do cai hamplayerinfo chu a @@
				
				$playerInfo = $account->getPlayerInfo($email);
				if($playerInfo != false) {
				$return['type'] = 0;
				$return['nickname'] = $playerInfo['NickName'];
				$return['servername'] = $serverInfo['ServerName'];
				$return['serverid'] = $serverInfo['ServerID'];
				$return['content'] = 'Tạo nhân vật thành công!';
				}else{
				$return['type'] = -1010;
				$return['content'] = 'Lỗi tạo nhân vật liên hệ GM để được giải đáp';
				}
			} else {
				$return['type'] = -1010;
				$return['content'] = 'Bạn đã tạo nhân vật ở máy chủ này rồi';
			}

	
	}
	
}
echo json_encode($return);
sqlsrv_close($conn_sv);
sqlsrv_close($conn);
?>