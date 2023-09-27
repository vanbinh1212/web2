<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.account.php';

// get box Info
$arrayList = array();

$qBox = sqlsrv_query($conn, "select TOP 10 * from Mem_Account where CountLucky > ? order by CountLucky DESC", array(0), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qBox) > 0) {

	$arrayList['type'] = 0;

	while($boxInfo = sqlsrv_fetch_array($qBox, SQLSRV_FETCH_ASSOC)) {

		$arrayList['content'][] = array("Username" => account::getUsername($boxInfo['Email']), "CountLucky" => number_format($boxInfo['CountLucky']));

	}

} else {

	$arrayList['type'] = -103;

}

sqlsrv_free_stmt($qBox);

echo json_encode($arrayList);
?>