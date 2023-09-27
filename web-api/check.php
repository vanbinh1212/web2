<?php
session_start();
# Hàm Mỡ kết nối
define('Kh4nhHuy3z!99^H2S04','Fuck You',true);
#Include file
error_reporting(-1);
ini_set('display_errors', 'On');
include_once "connect.php";
include_once "function.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
//////========================================config
$requestkey = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777axzygunnyvipvn';
$kq = 0;

//lấy key của request
$key			= $_GET['checkkey'];
if ($key == "lkirwf897+22#b1trm5814z5ql=498j5")
{
	$kq = $requestkey;
}
///////////////////////////////////
//check username
$username			= $_GET['user'];
$pass				= $_GET['pass'];
$server = '4';
if (strlen(trim($username)) > 0 && strlen(trim($pass)) > 0 && strlen(trim($username)) <= 20)
{
	$usernamedangnhap     = trim($username);// cái xulystring này là hàm ui xét ký tự tráng sqlinject. ông có chưa tôi chưa có bỏ đi cũng đc
	$passworddangnhap     = trim($pass);
	if(strlen($usernamedangnhap) >= 4 && strlen($usernamedangnhap) <= 20 && strlen($passworddangnhap) >= 4)
	{
		$tendangnhap = strtoupper($usernamedangnhap);
		$sql = $data->query("Select * from [Db_Web].[dbo].[Ws_Username] Where UserName = N'".$tendangnhap."' and Password = N'".$passworddangnhap."'","mem");
		if($data->query_num($sql) <> 0)
		{
			$result = $data->query_array($sql);
			$NickName = "Chưa tạo nhân vật";
			$username = $result['UserName'];
			$q = $data->query("select NickName FROM Sys_Users_Detail WHERE UserName = '".$username."'");
			if($data->query_num($q) == 1) 
			{
				$obj = $data->query_array($q);
				$NickName = $obj['NickName'];
			}
			$kq = "1*".$NickName;
		}
	}
}
///////////////////////////////////




