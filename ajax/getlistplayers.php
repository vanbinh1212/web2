<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

$id = $_POST['serverid'];

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
	
	$conn_sv = connectTank($id);
	
	if(!$conn_sv) {
		
		$return['type'] = 2;
		$return['content'] = 'Máy chủ bảo trì hoặc không thể kết nối.';
		
	} else {
		
		$playerList = account::getListPlayerInfo($_SESSION['ss_user_email']);
		
		$loop = 0;
		
		foreach($playerList as $player) {
			
			$result['type'] = 0;
			
			$result['items'][$loop]['UserID'] = $player['UserID'];
			
			$result['items'][$loop]['NickName'] = $player['NickName'];
			
			$loop++;
			
		}
		
	}
}

echo json_encode($result);
?>