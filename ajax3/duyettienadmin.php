<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);
include_once dirname(__FILE__).'/../#config.php';

$money=$_POST['money'];
if($money <= 0){
		echo "Số tiền thanh toán phải lớn hơn 0 ";
return;
}
$qSelect = sqlsrv_query($conn, "Select * From AdminThanhToan Where Money = ? and Status = 1", array($money), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

$qUpdate = sqlsrv_query($conn, "UPDATE AdminThanhToan SET Status = 1 Where Money = ?", array($money), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
if(sqlsrv_num_rows($qSelect) > 0) {
//if(sqlsrv_num_/ows($qInsert) > 0) {
	
	echo "Lệnh này đã thanh toán ";
	return;
} 

if(sqlsrv_num_rows($qUpdate) > 0) {
//if(sqlsrv_num_/ows($qInsert) > 0) {
	
	echo "Thanh Toán Thành Công $money VNĐ ";
} else {
	echo "Thanh Toán Thất Bại $money VNĐ ";
}
sqlsrv_free_stmt($qUpdate);

//sqlsrv_free_stmt($qInsert);
//echo $id;
?>