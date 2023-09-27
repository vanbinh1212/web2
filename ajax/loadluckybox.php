<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

$id = $_GET['id'];

if(!is_numeric($id) || $id <= 0) die();

function inReviewList($value) {
	
	global $reviewList;
	
	foreach($reviewList as $item) {
		if($item['Name'] == $value['Name'])
			return true;
	}
	return false;
}

// get box Info
$arrayList = array();

$qBox = sqlsrv_query($conn, "select * from LuckyBox_List where ID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qBox) > 0) {
	
	$boxInfo = sqlsrv_fetch_array($qBox, SQLSRV_FETCH_ASSOC);
	
	$arrayList['Name'] = $boxInfo['Name'];
	
	$arrayList['Coin'] = $boxInfo['PriceCoin'];
	
	$arrayList['CoinGame'] = $boxInfo['PriceCG'];
	
	// get list item in this box
	$reviewList = array();
	
	$qItems = sqlsrv_query($conn, "select Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic, LuckyBox_Data.* from Shop_Goods, LuckyBox_Data where LuckyBox_Data.BoxID = ? AND LuckyBox_Data.TemplateID = Shop_Goods.TemplateID ORDER by NEWID()", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
	
	while($itemInfo = sqlsrv_fetch_array($qItems, SQLSRV_FETCH_ASSOC)) {
		$arrayList['list'][] = array("Picture" => $_config['function']['url_resource'].'/'.item_gunny::getImage($itemInfo['NeedSex'], $itemInfo['CategoryID'], $itemInfo['Pic']), "Name" => $itemInfo['Name'], "IsHot" => $itemInfo['IsHot'], "Count" => $itemInfo['Count']);
	}
	
	foreach($arrayList['list'] as $itemValue) {
		if(!inReviewList($itemValue)) {
			$reviewList[] = $itemValue;
		}
	}
	
	$arrayList['review'] = $reviewList;
	
	sqlsrv_free_stmt($qItems);
}

sqlsrv_free_stmt($qBox);

echo json_encode($arrayList);
?>