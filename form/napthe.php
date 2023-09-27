<?php

session_start();
define("SNAPE_VN", true);

ignore_user_abort(true);
set_time_limit(0);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");
	include_once(dirname(__FILE__)."/../class/function.soap.php");

//include dirname(__FILE__).'/../recaptcha/autoload.php';

include_once(dirname(__FILE__)."/../class/function.global.php");

require_once(dirname(__FILE__)."/../class/trumthe247.class.php");
//exit();
function napcard5s($pin,$serial,$amount, $cardType, $user, $svID){
	$url = "https://doicard5s.com/api/common";
	$access_token = "OSQzwfvjnETrAfWaaBRNJyqLMxxneExd";
	
	$handle = curl_init($url);
	$data = [
		'access_token' => $access_token,
		'code' => $pin,
		'seri' => $serial,
		'money' => $amount,
		'typeCard' => $cardType,
		'transaction_id' => $user . '-' . $svID . '-' . date("ymdhis")
	];

	$encodedData = json_encode($data);

	curl_setopt($handle, CURLOPT_POST, 1);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $encodedData);
	curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_TIMEOUT, 300); 
	curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($handle);
	curl_close($handle);

	$obj = json_decode($result);

	return $obj;
}

$return = -1;

$type = trim($_GET['txtType']);
$serial = trim($_GET['txtSerial']);
$passcard = trim($_GET['txtPasscard']);
$code = trim($_GET['txtCode']);
$amount = trim($_GET['txtAmount']);
$serverid = trim($_GET['txtServer']);
$username = trim($_GET['txtUser']);

if($return == -1) {
	if(!is_numeric($type) || $type <= 0 || strlen($serial) < 5 || strlen($passcard) < 5) {
		
		$return = 2;
		
		
	} else {
		
		$cardName = null;
		$typeCode = null;
		
		switch($type) {
			case 2:
			$cardName = 'Viettel';
			break;
			
			case 3:
			$cardName = 'Mobifone';
			break;
			
			case 6:
			$cardName = 'Vinaphone';
			break;
			
			case 4:
			$cardName = 'Garena';
			break;
			
			case 5:
			$cardName = 'Zing';
			break;
			
			case 7:
			$cardName = 'Gate';
			break;
			
			case 8:
			$cardName = 'Vcoin';
			break;
			
			case 11:
			$cardName = 'VNMB';
			break;
			
		}
		/*
		if($_SESSION['ss_user_id'] != '354'){
			die('no');
		}*/
		
		$napCard5s = napcard5s($passcard, $serial, $amount, $type, $_SESSION['ss_user_id'], $serverid);
		/*$napCard5s = array(
			'status' => 'processing',
			'mesage' => 'Nạp thành công',
			'message' => 'Nạp thành công',
			'status_code' => 1000,
			'amount' => $amount,
			'amount_after' => $amount,
			'access_token' => 'bRTPT9NZ7nCcjOphcbDkAgD9tAYEfQVG',
			'transaction_id' => '354-1001-123456'
		);
		$napCard5s = json_decode(json_encode($napCard5s));*/
		
		$object = $napCard5s;
		
		if($object->status=="success"){
			// Những loại thẻ được xử lý ngay Zing, Garena, Gate, Vcoin
			$account = new account();

			
			$user = $username;
			$pin = $passcard;
			$userInfo = $account->getUserInfoByEmail($user);
			$account->logCard($userInfo['UserID'], $cardName, $serial, $passcard, $amount);			
			$account->insertNaplandau($userInfo['UserID']);
			$playerInfo2 = account::getPlayerInfoNap($user, $serverid);
			$account->updateLogCard($userInfo['UserID'], $serial, $pin, 1, $amount, 'Nạp thẻ thành công', $serverid);
			$account->updateUsernhan($userInfo['UserID'], $serial, 0);
		//	$account->InsertCodeNap($pin, $amount,$serverid);		
			//$naplandauInfo = $account->getUserNaplandau($user);
			$khuyenmai = 0 ;
			$money = $amount /1 ;
			$totalmoney = $money + ($money * $khuyenmai);
			$result = $account->chargeMoney($playerInfo2, $totalmoney, $serverid);
			if($playerInfo2['State'] == 1)
			{
				$noticeResult = soapChargeMoney($serverid , $playerInfo2['UserID'], $result);
			}
			// chuyen tien vao tai khoan
			$canAdd = $account->addCoin($userInfo['UserID'], 0, true);
			
			if($canAdd) {
				$account->log($userInfo['UserID'], 'Nạp thẻ', 2, 'Nạp thẻ '.$cardName.' mệnh giá '.number_format($amount).'VNĐ', $coinhave);
				
				$haveitem = false;
				
				switch($amount) {
					case 10000:
							
					break;
					
					case 20000:
					//account::InsertCodeNap($codekhuyenmai, 10000,$serverid);
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 10000, $userInfo['Email'], 1, 3, $serverid);					
					break;
					
					case 30000:
					//account::InsertCodeNap($codekhuyenmai, 10000,$serverid);
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 10000, $userInfo['Email'], 1, 3, $serverid);										
					break;
										
					case 50000:
					//account::InsertCodeNap($codekhuyenmai, 20000,$serverid);	
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 20000, $userInfo['Email'], 1, 3, $serverid);					

					break;
					
					case 100000:
					//account::InsertCodeNap($codekhuyenmai, 50000,$serverid);	
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 50000, $userInfo['Email'], 1, 3, $serverid);					
					
					break;
					
					case 200000:
					//account::InsertCodeNap($codekhuyenmai, 100000,$serverid);	
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 100000, $userInfo['Email'], 1, 3, $serverid);					

					break;
					
					case 300000:
					//account::InsertCodeNap($codekhuyenmai, 100000,$serverid);
					//account::InsertCodeNap($codekhuyenmai*100, 50000,$serverid);	
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 100000, $userInfo['Email'], 1, 3, $serverid);					
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai2, 50000, $userInfo['Email'], 1, 3, $serverid);					
					
					break;
					
					case 500000:
					//account::InsertCodeNap($codekhuyenmai, 300000,$serverid);
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 300000, $userInfo['Email'], 1, 3, $serverid);					
					
					break;
										
					case 1000000:
					//account::InsertCodeNap($codekhuyenmai, 500000,$serverid);
					//account::logCardATM($user, 'Khuyến Mãi', 0, $codekhuyenmai, 500000, $userInfo['Email'], 1, 3, $serverid);					
					
					break;										
				}
			}else{
				$account = new account();
				$account->updateLogCard($userInfo['UserID'], $serial, $pin, 3, $amount, "Error canAdd", $serverid);
				//$account->updateLogCard($user, $serial, ''.$pin.'km', 3, $amount, "Error canAdd", $serverid);
			}	
			
			$return = 0;
			$return['content'] = 'Chúc mừng bạn nạp thẻ thành công với mệnh giá '.$object->amount;
		} elseif($object->status=="processing") {
			// Những loại thẻ được sử lý trong vào 1->3s Viettel, Mobile, Vina
			$account = new account();
			$account->logCard($userInfo['UserID'], $cardName, $serial, $passcard, $amount);
			$account->insertNaplandau($userInfo['UserID']);

			$return = 0;
			
			
		} else {
			// Thẻ sai hoặc đã tồn tại trên hệ thống
			$err = $object->message;
			$return = $object->status_code;
		}
		
		/*if($amount < 50000) //Nếu thẻ <50k ==> thêm 2;
			$typeCode .= '2';
		
		// Trumthe247
		//$trumthe247 = new Trumthe247();
		//$note = $_SESSION['ss_user_id']."|".$serverid;
		//$charge_result = $trumthe247->ChargeCard($typeCode, $serial, $passcard, $amount, $note); //thực hiện đẩy thẻ lên hệ thống TrumThe247.Com
		
		//if($charge_result == false) { //Có lỗi trong quá trình đẩy thẻ.
		//	$err = 'Có lỗi trong quá trình xử lý, xin thử lại hoặc liên hệ Admin';
		//	$return = -9918;
		//	$return['content'] = $err;
			
			//var_dump($charge_result);exit();
		} else if(is_string($charge_result)) { //Có lỗi trả về của hệ thống TRUMTHE247.COM.
			$err = $charge_result;
			$return = -9918;
			$return['content'] = $err;
		} else if(is_object($charge_result)) { //Gửi thẻ thành công lên hệ thống.
			//$success = 'Gửi thẻ thành công!';
			
			$account = new account();
			$account->logCard($_SESSION['ss_user_id'], $cardName, $serial, $passcard, $amount);
			$account->insertNaplandau($_SESSION['ss_user_id']);

			$return = 0;
			$return['content'] = "Gửi thẻ thành công lên hệ thống, vui lòng đợi duyệt! Hãy kiểm tra lịch sử nạp.Nếu thẻ nạp thành công , mã Giftcode sẽ là mã thẻ của bạn";
			
		} else {
			$err = 'Có lỗi trong quá trình xử lý';
			$return = -9918;
			$return['content'] = $err;
		}*/
		
		
		
		
	}
}



echo json_encode($return);
sqlsrv_close($conn);




?>