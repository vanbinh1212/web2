<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);
include_once dirname(__FILE__).'/../#config.php';

$money=$_POST['money'];
$sender=$_POST['sender'];
$receiver=$_POST['receiver'];

if($money < 100000){
		echo "Số tiền thanh toán phải từ 100000 VNĐ";
return;
}
$qUpdate = sqlsrv_query($conn, "Update Log_Card Set Show=0 where Status=1");
$qInsert = sqlsrv_query($conn, "INSERT INTO AdminThanhToan (Money, TimeCreate, Usergui, Usernhan) VALUES (?, ?, ? ,?)", array($money, date("H:i:s Y-m-d"), $sender, $receiver), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qInsert) > 0) {
//if(sqlsrv_num_rows($qInsert) > 0) {
	
	echo "Gửi lệnh thành công số tiền $money VNĐ ";
} else {
	echo "Gửi lệnh thất bại số tiền $money VNĐ ";
}
sqlsrv_free_stmt($qUpdate);

sqlsrv_free_stmt($qInsert);
//echo $id;
?>