<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

$email = strtolower(trim($_POST['txtEmail']));
$checkuser  = preg_match("/^[a-zA-Z0-9\_\.]{4,20}$/",$email);
$qCheckMail = sqlsrv_query($conn, "select * from Mem_Account WHERE Email = ?", array($email), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qCheckMail) > 0 || $checkuser == 0) {
	echo 'false';
} else {
	echo 'true';
}

sqlsrv_free_stmt($qCheckMail);
?>