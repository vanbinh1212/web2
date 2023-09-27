<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);
ignore_user_abort(true);
set_time_limit(0);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/function.soap.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

include_once dirname(__FILE__).'/../class/class.item.info.php';

include_once dirname(__FILE__).'/../class/class.mail.info.php';

$result['type'] = -1;
$result['content'] = 'Lỗi không xác định';
// check login
if(!account::isLogin()) {
	$result['type'] = -165;
	$result['content'] = 'Vui lòng đăng nhập trước';
}

if($_SESSION['ss_lock'] == true) {
	$result['type'] = -165;
	$result['content'] = 'Phiên làm việc trước đó vẫn đang chạy. Vui lòng chờ trong giây lát.';
}

// tam dung
//die();
$fullurl= 'http://gunnyae.com';
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

//if($serverid != 1) die();

// load
if($result['type'] == -1) {
	
	$_SESSION['ss_lock'] = true;
	
	try {
		// load server
		$serverInfo = loadserver($serverid);
		
		if($serverInfo == null) {
			$result['type'] = -165;
			$result['content'] = 'Không tồn tại máy chủ này.';
		} else {

			// check have player
			$conn_sv = connectTank($serverid);
			
			if($conn_sv) {
				
				$playerInfo = account::getPlayerInfoByUserID($characterid);
			
				if(!$playerInfo) {
					$result['type'] = -165;
					$result['content'] = 'Không tồn tại nhân vật tại máy chủ này.';
				} else {
					
					// check is player of client
					if($playerInfo['UserName'] != $_SESSION['ss_user_email']) {
						
						$result['type'] = -165;
						
						$result['content'] = 'Nhân vật này không thuộc quyền sở hữu của bạn.';
						
					} else {
						
						// check item bag
						$qBag = sqlsrv_query($conn, "select * from Mem_Bag WHERE UserID = ? AND IsSend = ? AND ServerID IN (0, ?)", array($_SESSION['ss_user_id'], false, $serverid), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
						
						if(sqlsrv_num_rows($qBag) > 0) {
							// co vat pham => loop item
							
							$itemArray = array();
							
							$idList = array();
							
							$currDate = getDateTime('now');
							
							while($itemInfo = sqlsrv_fetch_array($qBag, SQLSRV_FETCH_ASSOC)) {
								$itemReal = new ItemInfo($currDate);
								$itemReal->TemplateID = $itemInfo['TemplateID'];
								$itemReal->Count = $itemInfo['Count'];
								$itemReal->IsBinds = $itemInfo['IsBind'];
								$itemReal->ValidDate = $itemInfo['VaildDate'];
								
								$insertItem = sqlsrv_query($conn_sv, $itemReal->GetQuery(), $itemReal->GetValues(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
								if(sqlsrv_num_rows($insertItem) > 0) {
									sqlsrv_next_result($insertItem); 
									sqlsrv_fetch($insertItem); 
									$itemReal->ItemID = sqlsrv_get_field($insertItem, 0);	
									sqlsrv_free_stmt($insertItem);
								}
								
								$itemArray[] = $itemReal;
								
								$idList[] = $itemInfo['ItemID'];
							}
							
							if(count($itemArray) > 0) {
								$qUpdate = sqlsrv_query($conn, "update Mem_Bag SET IsSend = ? WHERE UserID = ? AND ServerID IN (0, ?)", array(true, $_SESSION['ss_user_id'], $serverid));
								
								if($qUpdate) {
									
									account::log($_SESSION['ss_user_id'], 'Túi web', 6, 'Chuyển vật phẩm ở túi web vào máy chủ '.$serverInfo['ServerName'].' nhân vật '.$playerInfo['NickName'].' ('.implode(',', $idList).')', 0);
									
									$resultSend = account::sendMail($conn_sv, $playerInfo['UserID'], 'Vật phẩm túi web', 'Hệ thống gửi bạn các vật phẩm từ túi web với ID: '.implode(', ', $idList), $itemArray);
									
									if($resultSend) {
										if($playerInfo['State'] == 1)
											noticeMail($serverid, $playerInfo['UserID']);
										//$url=''.$fullurl.'/kichthu/WebForm1.aspx?uid='.$playerInfo['UserID'].'&sid=1';
										
										//kickthu($url);
										
										$result['type'] = 0;
										$result['content'] = 'Gửi thành công';
									} else {
										$result['type'] = -165;
										$result['content'] = 'Gửi lỗi. Liên hệ GameMaster để được trợ giúp.';
									}
								} else {
									$result['type'] = -165;
									$result['content'] = 'Cập nhật lỗi. Liên hệ GameMaster để được trợ giúp.';
								}
							}
						} else {
							$result['type'] = -165;
							$result['content'] = 'Túi web không có vật phẩm để gửi vào game.';
						}
					}
				}
			} else {
				$result['type'] = -165;
				$result['content'] = 'Kết nối tới máy chủ game thất bại. Liên hệ GM.';
			}
		}
	} catch (Exception $e) {
		$result['type'] = -165;
		$result['content'] = 'Xảy ra lỗi trong quá trình xử lý. Liên hệ GameMaster để được trợ giúp.';
	}
	
	$_SESSION['ss_lock'] = false;
}


echo json_encode($result);
?>