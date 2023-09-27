<?php
session_start();
define("Gun4S.Net",true);
include "#config.php";
include "function.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$requestkey = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$kq = 0;
$key			= $_GET['checkkey'];
if ($key == "gunnyhey2020")
{
	$kq = $requestkey;
}
$search = [' ','_','-','*',':',']','[',"'",'+'];
$username			= str_replace($search,"",$_GET['user']);
$pass				= str_replace($search,"",$_GET['pass']);
if (strlen(trim($username)) > 0 && strlen(trim($pass)) > 0 && strlen(trim($username)) <= 20)
{
	$usernamedangnhap     = trim($username);
	$passworddangnhap     = trim($pass);
	if(strlen($usernamedangnhap) >= 4 && strlen($usernamedangnhap) <= 20 && strlen($passworddangnhap) >= 4)
	{
		$tendangnhap = strtoupper($usernamedangnhap);
		$dataImport = array($tendangnhap, $passworddangnhap);
		$check_info = sqlsrv_query($conn, "select * from Mem_Account WHERE Email = ? AND Password = ?" , $dataImport, array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
		if(sqlsrv_num_rows($check_info) > 0) {
			$result = sqlsrv_fetch_array($check_info, SQLSRV_FETCH_ASSOC);
			$NickName = "laucher";
			$username = $result['UserName'];
			$kq = "1*".$NickName;
		}
	}
}
echo ''.$kq.'';