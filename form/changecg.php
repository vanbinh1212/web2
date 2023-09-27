<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

include_once(dirname(__FILE__)."/../class/function.global.php");

include_once(dirname(__FILE__)."/../class/function.soap.php");

include dirname(__FILE__).'/../recaptcha/autoload.php';

$account = new account();

$return['type'] = -1;
$return['content'] = 'Lỗi không xác định';

$quickchange = trim($_POST['quickchange']);
$serverid = trim($_POST['txtServer']);
$chacterid = trim($_POST['txtcharacter']);

if(!$account->isLogin()) {
	$return['type'] = 1;
	$return['content'] = 'Chưa đăng nhập.';
}

if(!is_numeric($serverid) || $serverid <= 0 || !is_numeric($chacterid) || $chacterid <= 0) {
	$return['type'] = 154;
	$return['content'] = 'Error verify params.';
}

if(!$quickchange) {
	
	$recaptcha = new \ReCaptcha\ReCaptcha($_config['recaptcha']['secret']);

	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

	if (!$resp->isSuccess()) {
		$return['type'] = -928;
		$return['content'] = 'Mã bảo vệ không chính xác.';
	}
}

if($return['type'] == -1) {
	
	$conn_sv = connectTank($serverid);
	
	if(!$conn_sv) {
		$return['type'] = 2;
		$return['content'] = 'Máy chủ bảo trì hoặc không thể kết nối.';
	} else {
		
		$serverInfo = loadserver($serverid);
		
		$playerInfo = $account->getPlayerInfoByUserID($chacterid);
		
		if($playerInfo != null && $playerInfo['UserName'] == $_SESSION['ss_user_email']) {
			
			if($playerInfo['MoneyLock'] >= 5000) {
				// convert 
				if($playerInfo['State'] == 0) {
					// import to money
					$account->log($_SESSION['ss_user_id'], 'Chuyển CoinGame', 4, 'Chuyển '.number_format($playerInfo['MoneyLock']).' CoinGame từ máy chủ '.$serverInfo['ServerName'].' nhân vật '.$playerInfo['NickName'] , 0);
					$qRemove = sqlsrv_query($conn_sv, "UPDATE Sys_Users_Detail SET MoneyLock = 0 WHERE UserID = ?", array($playerInfo['UserID']));
					if($qRemove) {
						//$qUpdate = sqlsrv_query($conn, "UPDATE Mem_Account SET MoneyLock = MoneyLock + ? WHERE UserID = ?", array($playerInfo['MoneyLock'], $_SESSION['ss_user_id']));
						$qUpdate = account::updateCoinGame($_SESSION['ss_user_id'], $serverid, $playerInfo['MoneyLock'], true);
						
						$return['type'] = 0;
						$return['content'] = 'Success';
						
					} else {
						$return['type'] = -1011;
						$return['content'] = 'Hệ thống lỗi. Liên hệ GM để được trợ giúp.';
					}
				} else {
					$return['type'] = -1010;
					$return['content'] = 'Vui lòng thoát khỏi trò chơi.';
				}
			} else {
				$return['type'] = -1010;
				$return['content'] = 'CoinGame tối thiểu để chuyển vào là 5.000 CoinGame.';
			}
			
		} else {
			$return['type'] = -1010;
			$return['content'] = 'Nhân vật này không thuộc quyền sở hữu của bạn.';
		}
	}
	sqlsrv_close($conn_sv);
}
echo json_encode($return);
sqlsrv_close($conn);
?>