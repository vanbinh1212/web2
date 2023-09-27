<?php
session_start();
#Khai bao hang
define('Tu4nMR@PRoKAK4','Fuck You',true);
#Include file
include_once "connect.php";
// 1. Nhan du lieu request tu iNET gui qua
$code               = $_REQUEST['code'];            // Ma chinh
$subCode            = $_REQUEST['subCode'];         // Ma phu
$mobile             = $_REQUEST['mobile'];          // So dien thoai +84
$serviceNumber      = $_REQUEST['serviceNumber'];   // Dau so 8x85
$info               = $_REQUEST['info'];            // Noi dung tin nhan
$ipremote           = $_SERVER['REMOTE_ADDR'];      // IP server goi qua truyen du lieu
$maxacnhan = substr(strtoupper(rand(100000,999999)), 0, 6);
$password2 = strtoupper(md5($maxacnhan));
$sdt = ltrim( $mobile,84 );
// xu ly du lieu
$sql = $data->query("select Email from Mem_Account WHERE Phone = '$sdt'");
if($serviceNumber>=8085)
{
	if($data->query_num($sql) ==1){
		$info 	= @$data->query_array($sql);
		$username 	= $info['Email'];
		$data->query("Update Mem_Account set Password='$password2' WHERE Phone = '$sdt'");
		$noidung = "Hi ".$username."! \nMat khau moi cua ban la:".$maxacnhan."";
	}
	else
	{
		$noidung = "Hi ".$mobile."! \nSo dien thoai cua ban chua duoc dang ky cho tai khoan nao";
	}
	echo "0|".$noidung;
}
else
{
	die('FUCK');
}
?>