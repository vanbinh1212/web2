<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

// check login
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
	$connect = connectTank($serverid);
	 $qCheckAccount = sqlsrv_query($connect, "select UserID, State, UserName, NickName, Money, Win from Sys_Users_Detail where UserID = ?", array($uid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

        if(sqlsrv_num_rows($qCheckAccount) > 0) {
            $userInfo = sqlsrv_fetch_array($qCheckAccount, SQLSRV_FETCH_ASSOC);

            sqlsrv_free_stmt($qCheckAccount);

            $playerInfo = $userInfo;

        }
		$qCheck = sqlsrv_query($connect, "select * from Web_Bag where ID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

        if(sqlsrv_num_rows($qCheck) > 0) {
            $webBagInfo = sqlsrv_fetch_array($qCheck, SQLSRV_FETCH_ASSOC);

            sqlsrv_free_stmt($qCheck);

			if($playerInfo != null) {
				if($webBagInfo["UserID"] == $playerInfo["UserID"])
				{
					if($playerInfo['State']  == 0 ) {
						/*$slot = $account->findEmptySlotByBagType($webBagInfo["BagType"], $uid,$connect);
						if($slot!=-1)
						{
								$qCheck = sqlsrv_query($connect, "UPDATE Web_Bag SET IsExits = 0 where ID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
								$qCheck = sqlsrv_query($connect, "UPDATE Sys_Users_Goods SET BagType = ? where ItemID = ? AND UserID = ?", array($webBagInfo["BagType"],$webBagInfo["ItemID"], $playerInfo["UserID"]), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
								
								//echo'Thành công';
								echo $id;
						}
						 else 
						{
							echo 'Túi game đầy, vui lòng dọn dẹp trước';
						}*/
							sqlsrv_query($connect, "UPDATE Web_Bag SET IsExits = 0 where ID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
						sqlsrv_query($connect, "UPDATE Sys_Users_Goods SET BagType = ?, UserID = 0, Place =-1 where ItemID = ? AND UserID = ?", array($webBagInfo["BagType"],$webBagInfo["ItemID"], $playerInfo["UserID"]), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
						sqlsrv_query($connect, " INSERT INTO User_Messages( SenderID, Sender, ReceiverID, Receiver, Title, Content, SendTime, IsRead, IsDelR, IfDelS, IsDelete, Annex1, Annex2, Gold, Money, IsExist,Type,Remark) 
												VALUES( ?,?,  ?,?, N'Kho Web', N'Bạn đã chuyển thành công item từ Kho Web vào Game', getdate(), 0,0, 0, 0, ?,0, 0, 0, 1,51,'')", array($playerInfo["UserID"],$playerInfo["NickName"],$playerInfo["UserID"],$playerInfo["NickName"],$webBagInfo["ItemID"]), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
						echo $id;
					}
					 else 
					 {
						echo 'Vui lòng thoát game rồi thực hiện lại';
					}
				}
				else
				{
					echo 'Không tìm thấy dữ liệu';
				}				
			} 
			else 
			{
				echo'Vui lòng tạo nhân vật để sử dụng dịch vụ..';
			}

        } 
		else 
		{
			echo'Không tìm thấy máy chủ';
        }
?>