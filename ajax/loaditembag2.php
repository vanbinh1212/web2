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

$serverid = $_GET['svid'];
$characterid = $_GET['cid'];

if(!is_numeric($serverid) || $serverid <= 0) {
	$result['type'] = -165;
	$result['content'] = 'Chưa chọn máy chủ';
}

if(!is_numeric($characterid) || $characterid <= 0) {
	$result['type'] = -165;
	$result['content'] = 'Chưa chọn nhân vật';
}

// load
if($result['type'] == -1) {
	$serverInfo = loadserver($serverid);
	$result['type'] = 0;
	$dbName = $serverInfo['Database'];
	$result['list'] = array();
	$connect = connectTank($serverid);
	$qLoad = sqlsrv_query($connect, @"select Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic, Sys_Users_Goods.TemplateID,Sys_Users_Goods.Count,Sys_Users_Goods.StrengthenLevel,Sys_Users_Goods.IsBinds,Sys_Users_Goods.BagType, Sys_Users_Goods.ValidDate, Web_Bag.* 
										from Sys_Users_Goods 
										inner join  Web_Bag on Sys_Users_Goods.ItemID = Web_Bag.ItemID
										inner join  Shop_Goods on Sys_Users_Goods.TemplateID = Shop_Goods.TemplateID 	
										where Web_Bag.IsExits = 1 AND Web_Bag.UserID = ? AND Sys_Users_Goods.BagType = 113 ORDER by Web_Bag.ID DESC", array($characterid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
	
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
									  "VaildDate" => $itemInfo['ValidDate'],
									  "IsBind" => (($itemInfo['IsBind'] == true) ? 'Đã khóa' : 'Không khóa'),
									  "ServerName" => $servername,
									  "TemplateID" => $itemInfo['TemplateID'],
									  "ID" => $itemInfo['ID']);
		}
	}
	else
	{
		$result['content'] = 'Khong co vat pham';
	}
	sqlsrv_free_stmt($qLoad);
}

echo json_encode($result);
?>