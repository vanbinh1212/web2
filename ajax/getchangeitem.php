<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

$id = $_POST['id'];

$result['type'] = -1;
$result['content'] = 'Lỗi không xác định';

// check login
if(!account::isLogin()) {
	$result['type'] = -165;
	$result['content'] = 'Vui lòng đăng nhập trước';
}

if(!is_numeric($id) || $id <= 0) {
	$result['type'] = -165;
	$result['content'] = 'Lỗi hệ thống';
}

if($result['type'] == -1) {
	
	$qItems = sqlsrv_query($conn, "select * from Change_Item_List where TemplateID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
	
	if(sqlsrv_num_rows($qItems) > 0) {
		
		$itemInfo = sqlsrv_fetch_array($qItems, SQLSRV_FETCH_ASSOC);
		
		$result['type'] = 0;
		$result['coin'] = $itemInfo['PriceCoin'];
		$result['coingame'] = $itemInfo['PriceCoinGame'];
		$result['maxcount'] = $itemInfo['MaxCount'];
		$result['content'] = 'okey';
		
	} else {
		$result['type'] = -165;
		$result['content'] = 'Vật phẩm không tồn tại';
	}
}

echo json_encode($result);
?>