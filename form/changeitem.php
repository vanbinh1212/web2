<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

include_once(dirname(__FILE__)."/../class/function.global.php");

include_once(dirname(__FILE__)."/../class/function.soap.php");

include dirname(__FILE__).'/../recaptcha/autoload.php';

// tam dung
die();

$account = new account();

$return['type'] = -1;
$return['content'] = 'Lỗi không xác định';

$serverid = trim($_POST['txtserver']);
$type = trim($_POST['txttype']);
$templateid = trim($_POST['txtitem']);
$count = trim($_POST['txtCount']);

if(!$account->isLogin()) {
	$return['type'] = 1;
	$return['content'] = 'Chưa đăng nhập.';
}

if(!is_numeric($serverid) || $serverid <= 0 || !is_numeric($type) || $type <= 0 || !is_numeric($templateid) || $templateid <= 0 || !is_numeric($count) || $count <= 0 || $count > 999) {
	$return['type'] = 154;
	$return['content'] = 'Error verify params.';
}

$recaptcha = new \ReCaptcha\ReCaptcha($_config['recaptcha']['secret']);

$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if (!$resp->isSuccess()) {
	$return['type'] = -928;
	$return['content'] = 'Mã bảo vệ không chính xác.';
}

if($return['type'] == -1) {
	
	$serverInfo = loadserver($serverid);
	
	if($serverInfo == null) {
		$return['type'] = 2;
		$return['content'] = 'Máy chủ bạn chọn không tồn tại.';
	} else {
		$qItem = sqlsrv_query($conn, "select * from Change_Item_List where TemplateID = ?", array($templateid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
		
		if(sqlsrv_num_rows($qItem) > 0) {
			
			$itemInfo = sqlsrv_fetch_array($qItem, SQLSRV_FETCH_ASSOC);
			
			$typePay = 'Unknown';
			
			$canContinue = false;
			
			$moneyPay = 0;
			
			$currentMoney = 0;
			
			$userInfo = account::getUserInfo($_SESSION['ss_user_id']);
			
			// check item
			if($itemInfo['MaxCount'] < $count)
				$count = $itemInfo['MaxCount'];
			
			switch($type) {
				
				case 1: // coin
				
				$currentMoney = $userInfo['Money'];
				
				$moneyPay = $itemInfo['PriceCoin'] * $count;
				
				if($userInfo['Money'] >= $moneyPay) {
					if($serverid == 3)
						$canContinue = true;
					else
						$canContinue = account::removeMoney($_SESSION['ss_user_id'], 'Money', $moneyPay);
				}
					
				$typePay = 'Coin';
				
				break;
				
				case 2: // coingame
				
				$currentCoinGame = account::getCoinGame($_SESSION['ss_user_id'], $serverid);
				
				$currentMoney = $currentCoinGame;
				
				$moneyPay = $itemInfo['PriceCoinGame'] * $count;
				
				if($currentCoinGame >= $moneyPay) {
					$canContinue = account::updateCoinGame($_SESSION['ss_user_id'], $serverid, $moneyPay, false);
				}
					
				$typePay = 'CoinGame';
				
				break;
			}
			
			if($canContinue) {
				
				account::log($_SESSION['ss_user_id'], 'Đổi quà', 7, 'Đổi vật phẩm #'.$itemInfo['TemplateID'].' tiêu hao '.number_format($moneyPay).' '.$typePay.' vào máy chủ '.$serverInfo['ServerName'], -$moneyPay);
				
				$qBag = account::addItemBag($_SESSION['ss_user_id'], $serverid, $itemInfo['TemplateID'], $count, true, $itemInfo['VaildDate'], $itemInfo['CanMerge']);
				
				if($qBag) {
					$return['type'] = 0;
					$return['content'] = "OKEY";
				}
				
			} else {
				$return['type'] = -1001;
				$return['content'] = "Bạn không đủ tiền để đổi vật phẩm. Hiện bạn chỉ có " . number_format($currentMoney) . " " . $typePay;
			}
			
		} else {
			$return['type'] = 2;
			$return['content'] = 'Vật phẩm mua không tồn tại.';
		}
	}
}
echo json_encode($return);
sqlsrv_close($conn);
?>