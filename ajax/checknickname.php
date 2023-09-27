<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

$nickname = trim($_POST['txtNickname']);

if($_GET['id']){
$svid = $_GET['id'];
}

$conn_sv = connectTank($svid);

$qCheckMail = sqlsrv_query($conn_sv, "select * from Sys_Users_Detail WHERE NickName = ?", array($nickname), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qCheckMail) > 0) {
	echo 'false';
} else {
	echo 'true';
}

sqlsrv_free_stmt($qCheckMail);
?>