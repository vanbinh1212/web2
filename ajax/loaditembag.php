<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

$result['type'] = -1;
$result['content'] = 'Lỗi không xác định';
// check login
if(!account::isLogin()) {
	$result['type'] = -165;
	$result['content'] = 'Vui lòng đăng nhập trước';
}

// load
if($result['type'] == -1) {
	
	$result['type'] = 0;
	
	$result['list'] = array();
	
	$qLoad = sqlsrv_query($conn, "select Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic, Mem_Bag.* from Shop_Goods, Mem_Bag where Mem_Bag.UserID = ? AND Mem_Bag.IsSend = ? AND Mem_Bag.TemplateID = Shop_Goods.TemplateID ORDER by Mem_Bag.ItemID DESC", array($_SESSION['ss_user_id'], false), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
	
	if(sqlsrv_num_rows($qLoad) > 0) {
		while($itemInfo = sqlsrv_fetch_array($qLoad, SQLSRV_FETCH_ASSOC)) {
			
			$servername = "Tất cả";
			
			

			if($itemInfo['ServerID'] != 0) {
				
				$serverInfo = loadserver($itemInfo['ServerID']);
				
				if($serverInfo != null)
					$servername = $serverInfo['ServerName'];
				
			}
			
			$result['list'][] = array("Picture" => $_config['function']['url_resource'].'/'.item_gunny::getImage($itemInfo['NeedSex'], $itemInfo['CategoryID'], $itemInfo['Pic']),
									  "Count" => $itemInfo['Count'],
									  "VaildDate" => $itemInfo['VaildDate'],
									  "IsBind" => (($itemInfo['IsBind'] == true) ? 'Đã khóa' : 'Không khóa'),
									  "ServerName" => $servername,
									  "TemplateID" => $itemInfo['TemplateID']);
		}
	}
	
	sqlsrv_free_stmt($qLoad);
}

echo json_encode($result);
?>