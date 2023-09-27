<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';
if(!account::isLogin()) {
	echo 'Vui lòng đăng nhập trước';
}

$id = $_POST['vp'];
$uid = $_POST['uid'];
$serverid = $_POST['serverid'];
$account = new account();
if(!is_numeric($id) || $id <= 0) {
	echo 'Không tìm thấy thông tin vật phẩm';
}
if(!is_numeric($serverid) || $serverid <= 0) {
	echo 'Không tìm thấy máy chủ';
}
// load
	$serverInfo = loadserver($serverid);
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
								echo $id;
						}
					}
					 else 
					 {
						echo 'Vui lòng thoát game rồi thực hiện lại !';
					}
				}				
			} 
			else 
			{
				echo 'Vui lòng tạo nhân vật để sử dụng dịch vụ..';
			}

        } 
		else 
		{
			echo 'Không tìm thấy máy chủ';
        }
?>