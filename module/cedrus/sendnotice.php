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
if($_POST['text']) {
	session_start();
	define("SNAPE_VN", true);

	include_once(dirname(__FILE__)."/../#config.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	
	$send = soapSendSystemNotice($_POST['txtserver'], $_POST['text']);
	
	if($send) {
		echo 'gui thanh cong<br/>';
	} else {
		echo 'gui that bai<br/>';
	}
}
?>

<form id="" method="post">
	<select id="txtserver" name="txtserver">
		<option value="1">S1.Ga Ky Uc</option>
	</select>
	<textarea name="text" rows="5" cols="20"><?=$_POST['text']?></textarea></br>
	<input type="submit" value="Send" />
</form>

</body>