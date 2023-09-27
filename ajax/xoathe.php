<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);
include_once dirname(__FILE__).'/../#config.php';

$id=$_POST['id'];
$qUpdate = sqlsrv_query($conn, "Update Log_Card Set Show=0 WHERE ID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
$qInsert = sqlsrv_query($conn, "INSERT INTO AnCard (ID) VALUES (?)", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qUpdate) > 0 && sqlsrv_num_rows($qInsert) > 0) {
	echo "Ẩn thành công thẻ ID : $id";
} else {
	echo "Ẩn thất bại thẻ ID : $id";
}
sqlsrv_free_stmt($qInsert);

sqlsrv_free_stmt($qUpdate);
//echo $id;
?>