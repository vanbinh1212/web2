<?php

session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.item.php';

include_once dirname(__FILE__).'/../class/class.account.php';

$result = -1;

$serverid = $_GET['id'];

if(!is_numeric($serverid) || $serverid <= 0) die('-1');

// get event process

if(!account::isLogin()) {
	
	$result = -2;
	
} else {
	
	$eventInfo = account::getEventInfo($_SESSION['ss_user_id'], 2, $serverid);

	if($eventInfo) {
		
		// check have more
		if($eventInfo['ProcessInt1'] > 0) {
			
			// du luot quay => remove luot quay
			$qUpdate = sqlsrv_query($conn, "UPDATE Mem_EventProcess SET ProcessInt1 = ProcessInt1 - ? WHERE UserID = ? AND EventID = ? AND ServerID = ?", array(1, $_SESSION['ss_user_id'], 2, $serverid));
			
			if($qUpdate) {
				
				// spin
				$randSelect = rand(0, 50000);
				
				$qSelect = sqlsrv_query($conn, "select TOP 1 * from WinSpin_Items WHERE Random >= ? ORDER by newid()", array($randSelect), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
				
				if(sqlsrv_num_rows($qSelect) > 0) {
					
					$itemInfo = sqlsrv_fetch_array($qSelect, SQLSRV_FETCH_ASSOC);
					
					$qBag = account::addItemBag($_SESSION['ss_user_id'], $serverid, $itemInfo['TemplateID'], $itemInfo['Count'], true, $itemInfo['VaildDate'], $itemInfo['CanMerge']);
					
					if($qBag) {
						
						$result = $itemInfo['SlotID'];
						
					}
				}
				
			}
			
		} else {
			
			// totalplayer
			$result = 0;
		}
	} else {
		
		// create new
		$qInsert = sqlsrv_query($conn, "INSERT INTO Mem_EventProcess (UserID, EventID, ServerID, ProcessInt1) VALUES (?, ?, ?, ?)", array($_SESSION['ss_user_id'], 2, $serverid, 0));
		
		$result = 0;
		
	}
	
}

?>
<loto>
	<item><?=$result?></item>
</loto>