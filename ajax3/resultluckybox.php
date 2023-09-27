<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

$arrayList = array();
$arrayList['type'] = -1;
$arrayList['content'] = "Unknown";

$id = $_GET['id'];

$type = $_GET['type'];

$serverid = $_GET['serverid'];

if(!is_numeric($id) || $id <= 0 || !is_numeric($type) || !is_numeric($serverid) || $serverid <= 0) {
	$arrayList['type'] = -435;
	$arrayList['content'] = "Lỗi dữ liệu truyền vào. Kiểm tra lại.";
} else if(!account::isLogin()) {
	$arrayList['type'] = -435;
	$arrayList['content'] = "Vui lòng đăng nhập.";
} else {
	
	// check serverid
	$serverInfo = loadserver($serverid);
	
	if($serverInfo != null) {
		// check bag
		$qBagCheck = sqlsrv_query($conn, "select * from Mem_Bag where UserID = ? AND IsSend = ?", array($_SESSION['ss_user_id'], false), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
		if(sqlsrv_num_rows($qBagCheck) > 10) {
			$arrayList['type'] = -435;
			$arrayList['content'] = "Túi web tối đa chứa 10 vật phẩm. Vui lòng chuyển vào game để tiếp tục.";
		} else {
			// get type
			$qBox = sqlsrv_query($conn, "select * from LuckyBox_List where ID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
			if(sqlsrv_num_rows($qBox) > 0) {
			
				$boxInfo = sqlsrv_fetch_array($qBox, SQLSRV_FETCH_ASSOC);
				
				$canContinue = false;
				
				$typePay = 'Unknown';
				
				$moneyPay = 0;
				
				// get user info
				$userInfo = account::getUserInfo($_SESSION['ss_user_id']);
				
				switch($type) {
					case 1:
					// điểm miễn phí
					if($userInfo['Point'] > 0)
						$canContinue = account::removeMoney($_SESSION['ss_user_id'], 'Point', 1);
					
					$typePay = 'Điểm';
					$moneyPay = 1;
					break;
					
					case 2:
					// cash
					if($userInfo['Money'] >= $boxInfo['PriceCoin'] && $boxInfo['PriceCoin'] > 0) {
						if($serverid == 3)
							$canContinue = true;
						else
							$canContinue = account::removeMoney($_SESSION['ss_user_id'], 'Money', $boxInfo['PriceCoin']);
					}
					
					$typePay = 'Coin';
					$moneyPay = $boxInfo['PriceCoin'];
					break;
					
					case 3:
					// coin game
					//get coingame
					$currentCoinGame = account::getCoinGame($_SESSION['ss_user_id'], $serverid);
					
					if($currentCoinGame >= $boxInfo['PriceCG'] && $boxInfo['PriceCG'] > 0)
						//$canContinue = account::removeMoney($_SESSION['ss_user_id'], 'LockMoney', $boxInfo['PriceCG']);
						$canContinue = account::updateCoinGame($_SESSION['ss_user_id'], $serverid, $boxInfo['PriceCG'], false);
					
					$typePay = 'CoinGame';
					$moneyPay = $boxInfo['PriceCG'];
					break;
				}
				
				if($canContinue) {
					// open box
					$subQuery = "";
					if($type == 1 || $type == 3) {
						$subQuery = "AND LuckyBox_Data.IsOnlyVIP = 'False'";
					}
					
					// count
					account::addNumberField($_SESSION['ss_user_id'], 'CountLucky', 1);
					
					// log it
					account::log($_SESSION['ss_user_id'], 'Hộp quà', 5, 'Mở hộp quà '.$boxInfo['Name'].' tiêu hao '.number_format($moneyPay).' '.$typePay.' vào máy chủ '.$serverInfo['ServerName'], -$moneyPay);
					
					//select Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic, LuckyBox_Data.* from Shop_Goods, LuckyBox_Data where LuckyBox_Data.BoxID = ? AND LuckyBox_Data.TemplateID = Shop_Goods.TemplateID ORDER by NEWID()
					$qOpenBox = sqlsrv_query($conn, "select Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic, LuckyBox_Data.* from Shop_Goods, LuckyBox_Data where LuckyBox_Data.BoxID = ? AND LuckyBox_Data.TemplateID = Shop_Goods.TemplateID $subQuery ORDER by NEWID()", array($id), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
					
					if(sqlsrv_num_rows($qOpenBox) > 0) {
						// có item => check xem có lấy luôn không
						$itemInfo = sqlsrv_fetch_array($qOpenBox, SQLSRV_FETCH_ASSOC);
						
						if(!$itemInfo['IsSelected']) {
							
							$randCheck = rand(0, $itemInfo['Random']);
							
							if($randCheck > $itemInfo['RandomMax']) {
								// lấy vật phẩm khác
								$qOpenBox2 = sqlsrv_query($conn, "select Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic, LuckyBox_Data.* from Shop_Goods, LuckyBox_Data where LuckyBox_Data.BoxID = ? AND LuckyBox_Data.IsSelected = ? AND LuckyBox_Data.TemplateID = Shop_Goods.TemplateID $subQuery ORDER by NEWID()", array($id, true), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
								
								$itemInfo = sqlsrv_fetch_array($qOpenBox2, SQLSRV_FETCH_ASSOC);
							}
							
						}
						
						// check can merge or not
						// open it
						//$qBag = sqlsrv_query($conn, "INSERT INTO Mem_Bag (UserID, TemplateID, Count, StrengthenLevel, IsBind, VaildDate, IsSend) VALUES (?, ?, ?, ?, ?, ?, ?)", array($_SESSION['ss_user_id'], $itemInfo['TemplateID'], $itemInfo['Count'], 0, $itemInfo['IsBind'], $itemInfo['VaildDate'], false));
						
						$qBag = account::addItemBag($_SESSION['ss_user_id'], $serverid, $itemInfo['TemplateID'], $itemInfo['Count'], $itemInfo['IsBind'], $itemInfo['VaildDate'], $itemInfo['CanMerge']);
						
						if($qBag) {
							
							$arrayList['type'] = 0;
							$arrayList['award'] = array("Picture" => $_config['function']['url_resource'].'/'.item_gunny::getImage($itemInfo['NeedSex'], $itemInfo['CategoryID'], $itemInfo['Pic']), "Name" => $itemInfo['Name'], "Count" => $itemInfo['Count']);
							$arrayList['content'] = "OKEY";
						}
					}
				} else {
					$arrayList['type'] = -1001;
					$arrayList['content'] = "Bạn không đủ tiền để mở hộp quà này.";
				}
				
			} else {
				$arrayList['type'] = -1001;
				$arrayList['content'] = "Không tồn tại hộp quà này.";
			}
			
			sqlsrv_free_stmt($qBox);
		}
	} else {
		$arrayList['type'] = -1001;
		$arrayList['content'] = "Máy chủ này không tồn tại";
	}
}

echo json_encode($arrayList);
?>