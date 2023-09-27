<?php
	define("SNAPE_VN", true);
	include_once(dirname(__FILE__)."/#config.php");
	include_once(dirname(__FILE__)."/class/class.account.php");
	include_once(dirname(__FILE__)."/class/function.global.php");
	include dirname(__FILE__).'/class/trumthe247.class.php';
	
	$trumthe247 = new Trumthe247();
	
	$validate = $trumthe247->ValidateCallback();

	//$trumthe247->WriteLog('trumthe247_callback_log.txt', json_encode($_POST)); //Ghi log để debug.
	
	if($validate != false) { //Nếu xác thực callback đúng thì chạy vào đây.
		$status = $validate['status']; //Trạng thái thẻ nạp, thẻ thành công = 1, thẻ thất bại != 1, xem bảng mã lỗi.
		$desc = $validate['desc']; //Mô tả chi tiết lỗi.
		$serial = $validate['card_data']['serial']; //Số serial của thẻ.
		$pin = $validate['card_data']['pin']; //Mã pin của thẻ.
		$card_type = $validate['card_data']['card_type']; //Loại thẻ. vd: VTT, VMS, VNP.
		$cardName = $validate['card_data']['card_type_str']; //Loại thẻ. vd: Viettel, Mobifone, Vinaphone
		$amount = $validate['card_data']['amount']; //Mệnh giá của thẻ.
		$content = $validate["content"];
		
		$splitTran = explode("-",$content);
		
		$user = $splitTran[0];
		$serverid = $splitTran[1];
		$userid = $splitTran[2];
		//if($_SESSION['ss_user_email'] == 'cedrusisme@gmail.com')
				//$amount = 100000;
		if($status == 1) {
			
			$account = new account();
			$userInfo = $account->getUserInfo($user);
			$tinhtrangthe = $account->checkFullcard($pin);
			
			$playerInfo2 = account::getPlayerInfoNapbyuid($userid, $serverid);

			$account->updateLogCard($user, $serial, $pin, 1, $amount, 'Nạp thẻ thành công', $serverid);
			//$account->updateLogCard($user, $serial, ''.$pin.'km', 1, $amount, 'Nạp thẻ thành công', $serverid);
			$account->updateUsernhan($user, $serial, 0);
			//$account->Naptichluy($playerInfo,$amount,$serverid);
			//$account->GuiItemNapThe($templateid, $playerInfo2, $serverid);
			$account->updateNaplandau($amount, $user);		
			$khuyenmai = 50/100 ;
			//$money = $amount * 15 ;
			//$totalmoney = $money + ($money * $khuyenmai);
			if($tinhtrangthe['IsCard'] == 0){
				$account->updateIsCard($userInfo['Email'], $pin);
				$account->addCoin($userInfo['UserID'], $amount + ($amount * $khuyenmai ), true);
				/*if($playerInfo2['State'] == 1)
				{
					$noticeResult = soapChargeMoney($serverid, $playerInfo2['UserID'], $result);
				}*/
			}
			// chuyen tien vao tai khoan
			$canAdd = $account->addCoin($user, 0, true);
							 
			if($canAdd) {
				$account->log($user, 'Nạp thẻ', 2, 'Nạp thẻ '.$cardName.' mệnh giá '.number_format($amount).'VNĐ', $amount);
				
				$haveitem = false;
								
			}

		} else {
			//Xử lý nạp thẻ thất bại tại đây.
			
			$account = new account();
			$account->updateLogCard($user, $serial, $pin, 3, $amount, $desc, $serverid);
			//$account->updateLogCard($user, $serial, ''.$pin.'km', 3, $amount, $desc, $serverid);
			
			$trumthe247->WriteLog('trumthe247_callback_failed.txt', json_encode($validate)); //Ghi log để debug.
		}
	}
?>