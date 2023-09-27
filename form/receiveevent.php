<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

include_once(dirname(__FILE__)."/../class/function.global.php");


$account = new account();

$return['type'] = -1;
$return['content'] = 'Lỗi không xác định';

$id = trim($_POST['id']);

if(!$account->isLogin()) {
	$return['type'] = 1;
	$return['content'] = 'Chưa đăng nhập.';
}

if(!is_numeric($id) || $id <= 0) {
	$return['type'] = 154;
	$return['content'] = 'Error verify params.';
}

if($return['type'] == -1) {
	
	$curDateStr = date("d-m-Y");
	
	switch(intval($id)) {
		case 2:
		// point free everyday
		
		$qSelect = sqlsrv_query($conn, "select top 1 * from Mem_EventLog where UserID = ? AND EventID = ? AND String1 = ?", array($_SESSION['ss_user_id'], $id, $curDateStr), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
		if(sqlsrv_num_rows($qSelect) <= 0) {
			
			$qInsert = sqlsrv_query($conn, "insert into Mem_EventLog (UserID, EventID, String1, TimeCreate) VALUES (?, ?, ?, ?)", array($_SESSION['ss_user_id'], $id, $curDateStr, time()));
			
			if($qInsert) {
				$pointHave = 2;
				if($account->getUserInfoByField($_SESSION['ss_user_id'], "VIPLevel") > 0)
					$pointHave = 4;
				$account->addNumberField($_SESSION['ss_user_id'], "Point", $pointHave);
				
				$return['type'] = 0;
				$return['content'] = 'Bạn nhận được '.$pointHave.' Điểm <a href="'.$_config['page']['fullurl'].'/hop-qua/">Quay hộp quà</a>';
			} else {
				$return['type'] = 0;
				$return['content'] = var_dump(sqlsrv_errors());
			}
		} else {
			$return['type'] = -435;
			$return['content'] = 'Hôm nay bạn đã nhận rồi!';
		}
		break;
		
		case 3:
		// coin lock everyday
		$qSelect = sqlsrv_query($conn, "select top 1 * from Mem_EventLog where UserID = ? AND EventID = ? AND String1 = ?", array($_SESSION['ss_user_id'], $id, $curDateStr), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
		if(sqlsrv_num_rows($qSelect) <= 0) {
			$qInsert = sqlsrv_query($conn, "insert into Mem_EventLog (UserID, EventID, String1, TimeCreate) VALUES (?, ?, ?, ?)", array($_SESSION['ss_user_id'], $id, $curDateStr, time()));
			if($qInsert) {
				$coinhave = rand(100, 2000);
				if($account->getUserInfoByField($_SESSION['ss_user_id'], "VIPLevel") > 0)
					$coinhave = rand(2000, 4000);
				$account->addNumberField($_SESSION['ss_user_id'], "MoneyLock", $coinhave);
				$return['type'] = 0;
				$return['content'] = 'Bạn nhận được '.$coinhave.' Coin khóa. Dùng tại <a href="'.$_config['page']['fullurl'].'/tai-khoan/cua-hang/">Webshop</a>';
			} else {
				$return['type'] = 0;
				$return['content'] = var_dump(sqlsrv_errors());
			}
		} else {
			$return['type'] = -435;
			$return['content'] = 'Hôm nay bạn đã nhận rồi!';
		}
		break;
	}
	
}
echo json_encode($return);
sqlsrv_close($conn);
?>