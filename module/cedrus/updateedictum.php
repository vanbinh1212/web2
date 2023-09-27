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
	
	$textlist = trim($_POST['text']);
	
	$serverid = 1001;
	
	
	
	if(count($textlist) > 0) {
		$conn_sv = connectTank($serverid);
		$val = sqlsrv_query($conn_sv, "UPDATE Edictum SET Text = ?", array($textlist));
		
		if(!$val)
			print_r(sqlsrv_errors());
		else
			echo 'Success';
	}
?>

<form id="" method="post">
	<textarea name="text" rows="5" cols="20"></textarea></br>
	<input type="submit" value="Send" />
</form>

</body>