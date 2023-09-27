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

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	
	$send = soapSendSystemNotice(1001, 'ádasdsd');
	
	//$send = soapSendMail(1001, 'test', 'test', 22, '11049,1,true,0,0,0,0,0,0', $_config['function']['md5_center'])
	
	if($send) {
		echo 'gui thanh cong<br/>';
	} else {
		echo 'gui that bai<br/>';
	}
?>

<form id="" method="post">
	<textarea name="text" rows="5" cols="20"></textarea></br>
	<input type="submit" value="Send" />
</form>

</body>