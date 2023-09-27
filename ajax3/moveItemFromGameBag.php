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

$id = $_GET['id'];
$uid = $_GET['uid'];
$serverid = $_GET['serverid'];
$account = new account();
if(!is_numeric($id) || $id <= 0) {
	$result['type'] = -165;
	$result['content'] = 'Không tìm thấy thông tin vật phẩm';
}
if(!is_numeric($serverid) || $serverid <= 0) {
	$result['type'] = -165;
	$result['content'] = 'Không tìm thấy máy chủ';
}
// load
if($result['type'] == -1) {
	$serverInfo = loadserver($serverid);
	$result['type'] = 0;
	$result['list'] = array();
	$connect = connectTank($serverid);
	 $qCheckAccount = sqlsrv_query($connect, "select UserID, State, UserName, NickName, Money, Win from Sys_Users_Detail where UserID = ?", array($uid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

        if(sqlsrv_num_rows($qCheckAccount) > 0) {
            $userInfo = sqlsrv_fetch_array($qCheckAccount, SQLSRV_FETCH_ASSOC);

            sqlsrv_free_stmt($qCheckAccount);

            $playerInfo = $userInfo;

        }
		$qCheck = sqlsrv_query($connect, "select ItemID, BagType,UserID from Sys_Users_Goods where ItemID = ? AND UserID = ?", array($id,$uid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

        if(sqlsrv_num_rows($qCheck) > 0) {
            $Good = sqlsrv_fetch_array($qCheck, SQLSRV_FETCH_ASSOC);

            sqlsrv_free_stmt($qCheck);

			if($playerInfo != null) {				
				{
					if($playerInfo['State']  == 0 ) {						
						
						{
								$qCheck = sqlsrv_query($connect, "INSERT INTO Web_Bag VALUES(?,?,?,1,?)", array($serverid,$uid,$Good["ItemID"],$Good["BagType"]), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
								$qCheck = sqlsrv_query($connect, "UPDATE Sys_Users_Goods SET BagType = 113 where ItemID = ? AND UserID = ?", array($Good["ItemID"],$Good["UserID"], $playerInfo["UserID"]), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
								
								$result['content'] = 'Thành công';
						}
					}
					 else 
					 {
						$result['type'] = -1010;
						$result['content'] = 'Vui lòng thoát game rồi thực hiện lại !';
					}
				}				
			} 
			else 
			{
				$result['type'] = -1010;
				$result['content'] = 'Vui lòng tạo nhân vật để sử dụng dịch vụ..';
			}

        } 
		else 
		{
			$result['content'] = 'Không tìm thấy máy chủ';
        }
}

echo json_encode($result);
?>