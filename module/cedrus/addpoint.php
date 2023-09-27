<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>ADM</title>
</head>

<body>
<?php
	session_start();
	
	define("SNAPE_VN", true);

	include_once(dirname(__FILE__)."/../#config.php");
	
	include_once(dirname(__FILE__)."/../class/class.account.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	
	$listAccount = trim($_POST['text']);
	
	$serverid = 0;
	
	if($listAccount) {
		
		$listAccountArray = explode(",", $listAccount);
		
	
		foreach($listAccountArray as $acc) {
			
			// get userid
			$userInfo = account::getUserInfoByEmail(trim($acc));
			
			if($userInfo != false) {
				
				$evntQuery = sqlsrv_query($conn, "select * from Mem_EventLog where UserID = ? AND EventID = ?", array($userInfo["UserID"], 1), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
				if(!$evntQuery)
						die(print_r(sqlsrv_errors()));
					
				if(sqlsrv_num_rows($evntQuery) <= 0) {
					$add = sqlsrv_query($conn, "insert into Mem_EventLog (UserID, EventID, TimeCreate) VALUES (?,?,?)", array($userInfo["UserID"], 1, time()));
					if(!$add)
						die(print_r(sqlsrv_errors()));
					sqlsrv_query($conn, "update Mem_Account SET Point = Point + 100 where UserID = ?", array($userInfo["UserID"]));
					echo 'Add point to '.$acc.'</br>';
				} else {
					echo 'ERROR: '.$acc.' IS RECEIVED THIS EVENT</br>';
				}
				
			} else {
				echo 'ERROR ACCOUNT '.$acc.'</br>';
			}
		}
	}
	
	
	
	
?>

<form id="" method="post">
	<textarea name="text" rows="5" cols="20"></textarea></br>
	<input type="submit" value="Send" />
</form>

</body>