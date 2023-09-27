<?php

session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

$result = 0;

$serverid = $_POST['id'];

if(!is_numeric($serverid) || $serverid <= 0) die('-1');

// get event process

if(!account::isLogin()) {
	
	$result = 0;
	
} else {
	
	$eventInfo = account::getEventInfo($_SESSION['ss_user_id'], 2, $serverid);
	
	$lastwincount = 0;

	if($eventInfo) {
		
		$lastwincount = $eventInfo['ProcessInt2'];
		
	} else {
		
		// create new
		$qInsert = sqlsrv_query($conn, "INSERT INTO Mem_EventProcess (UserID, EventID, ServerID, ProcessInt1, ProcessInt2) VALUES (?, ?, ?, ?)", array($_SESSION['ss_user_id'], 2, $serverid, 0, 0));
		
	}
	
	// select
	$conn_sv = connectTank($serverid);
	
	if(!$conn_sv) die('connect fail...');
	
	$playerInfo = account::getPlayerInfo($_SESSION['ss_user_email']);
	
	if($playerInfo != null) {
		
		$currentCanConvert = $playerInfo['Win'] - $lastwincount;
		
		$countAdd = 0;
		
		if($currentCanConvert >= 5) {
			
			$countAdd = floor($currentCanConvert / 5);
			
		}
		
		if($countAdd > 0) {
			
			$winUpdateAdd = $countAdd * 5;
			
			$qUpdate = sqlsrv_query($conn, "UPDATE Mem_EventProcess SET ProcessInt1 = ProcessInt1 + ?, ProcessInt2 = ProcessInt2 + ? WHERE UserID = ? AND EventID = ? AND ServerID = ?", array($countAdd, $winUpdateAdd, $_SESSION['ss_user_id'], 2, $serverid));
			
		}
		
		$eventInfo = account::getEventInfo($_SESSION['ss_user_id'], 2, $serverid);
		
		$result = $eventInfo['ProcessInt1'];
		
	}
}


echo $result;
?>