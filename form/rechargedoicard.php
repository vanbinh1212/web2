<?php
session_start();
define("SNAPE_VN", true);

ignore_user_abort(true);
set_time_limit(0);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

//include dirname(__FILE__).'/../recaptcha/autoload.php';

include_once(dirname(__FILE__)."/../class/function.global.php");

require_once(dirname(__FILE__)."/../class/trumthe247.class.php");
//exit();

$return['type'] = -1;
$return['content'] = 'Lỗi không xác định';

$type = trim($_POST['txtType']);
$serial = trim($_POST['txtSerial']);
$passcard = trim($_POST['txtPasscard']);
$code = trim($_POST['txtCode']);
$amount = trim($_POST['txtAmount']);
$serverid = trim($_POST['txtServer']);
if($serverid <= 0)
{
	$return['type'] = 1;
	$return['content'] = 'Vui lòng chọn máy chủ.';
}
if(!$_SESSION['ss_user_id']) {
	$return['type'] = 1;
	$return['content'] = 'Vui lòng đăng nhập để sử dụng tính năng này.';
}

if(!vaildCaptcha($code)) {
	$return['type'] = -928;
	$return['content'] = 'Mã bảo vệ không chính xác.';
}

if($return['type'] == -1) {
	if(!is_numeric($type) || $type <= 0 || strlen($serial) < 5 || strlen($passcard) < 5) {
		
		$return['type'] = 2;
		
		$return['content'] = 'Dữ liệu không hợp lệ. ';
		
	} else {
		
		$cardName = null;
		$typeCode = null;
		
		switch($type) {
			case 1:
			$cardName = 'Viettel';
			$typeCode = 'VTT';
			break;
			
			case 2:
			$cardName = 'Mobifone';
			$typeCode = 'VMS';
			break;
			
			case 3:
			$cardName = 'Vinaphone';
			$typeCode = 'VNP';
			break;
			
		}
		
		if($amount < 50000) //Nếu thẻ <50k ==> thêm 2;
			$typeCode .= '2';
		
		// Trumthe247
		$trumthe247 = new Trumthe247();
		$note = $_SESSION['ss_user_id']."|".$serverid;
		$charge_result = $trumthe247->ChargeCard($typeCode, $serial, $passcard, $amount, $note); //thực hiện đẩy thẻ lên hệ thống TrumThe247.Com
		
		if($charge_result == false) { //Có lỗi trong quá trình đẩy thẻ.
			$err = 'Có lỗi trong quá trình xử lý, xin thử lại hoặc liên hệ Admin';
			$return['type'] = -9918;
			$return['content'] = $err;
			
			//var_dump($charge_result);exit();
		} else if(is_string($charge_result)) { //Có lỗi trả về của hệ thống TRUMTHE247.COM.
			$err = $charge_result;
			$return['type'] = -9918;
			$return['content'] = $err;
		} else if(is_object($charge_result)) { //Gửi thẻ thành công lên hệ thống.
			//$success = 'Gửi thẻ thành công!';
			
			$account = new account();
			$account->logCard($_SESSION['ss_user_id'], $cardName, $serial, $passcard, $amount);
			$account->insertNaplandau($_SESSION['ss_user_id']);

			$return['type'] = 0;
			$return['content'] = "Gửi thẻ thành công lên hệ thống, vui lòng đợi duyệt! Hãy kiểm tra lịch sử nạp.Nếu thẻ nạp thành công , mã Giftcode sẽ là mã thẻ của bạn";
			
		} else {
			$err = 'Có lỗi trong quá trình xử lý';
			$return['type'] = -9918;
			$return['content'] = $err;
		}
	}
}
echo json_encode($return);
sqlsrv_close($conn);
?>