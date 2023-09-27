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

$id = trim($_POST['id']);
$serverid = trim($_POST['sv']);

if(!$account->isLogin()) {
	$return['type'] = 1;
	$return['content'] = 'Chưa đăng nhập.';
}

if(!is_numeric($serverid) || $serverid <= 0 || !is_numeric($id) || $id <= 0) {
	$return['type'] = 154;
	$return['content'] = 'Error verify params.';
}

if($return['type'] == -1) {
	
	$conn_sv = connectTank($serverid);
	
	if(!$conn_sv) {
		$return['type'] = 2;
		$return['content'] = 'Máy chủ bảo trì hoặc không thể kết nối.';
	} else {
		
		//$serverInfo = loadserver($serverid);
		
		$activeid = 0;
		switch($id) {
			case 11: // code event 1
			$activeid = 2;
			break;
			case 13: // code ga billy
			$activeid = 50;
			break;
			
		
		}
		
		$qSelect = sqlsrv_query($conn_sv, "select top 1 AwardID from Active_Number where ActiveID = ? AND PullDown = ? ORDER BY NEWID()", array($activeid, false), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
		
		if(sqlsrv_num_rows($qSelect) > 0) {
			
			$codeInfo = sqlsrv_fetch_array($qSelect, SQLSRV_FETCH_ASSOC);
			
			$return['type'] = 0;
			$return['content'] = $codeInfo['AwardID'];
		//	echo($codeInfo['AwardID']);
			
		} else {
			$return['type'] = 351;
			$return['content'] = 'Hiện tại Code này đã hết hoặc chưa phát!';
		}
		
		sqlsrv_free_stmt($qSelect);
	}
	sqlsrv_close($conn_sv);
}
echo json_encode($return);
sqlsrv_close($conn);
?>