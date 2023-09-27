<?php
if(!defined("SNAPE_VN")) die ('No access');

function nameTypeNews($type) {
	switch ($type) {
		case 1:
			return 'Tin tức';
			break;

		case 2:
			return 'Sự kiện';
			break;

		case 3:
			return 'Quà tặng';
			break;

		case 4:
			return 'Khuyến mãi';
			break;

		case 4:
			return 'Hướng dẫn';
			break;
		
		default:
			# code...
			return 'Không xác định';
			break;
	}
}

function convertncr($string) {
	$convmap = array(0x80, 0xffff, 0, 0xffff);
	return mb_encode_numericentity($string, $convmap, 'UTF-8');
}

function loadserver($serverid) {

	global $conn;

	$qCheck = sqlsrv_query($conn, "select * from Server_List where ServerID = ?", array($serverid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

	if(sqlsrv_num_rows($qCheck) > 0) {
		$serverInfo = sqlsrv_fetch_array($qCheck, SQLSRV_FETCH_ASSOC);
		return $serverInfo;
	} else {
		return null;
	}
}

function getServerName($serverid) {

	global $conn;

	$qCheck = sqlsrv_query($conn, "select ServerName from Server_List where ServerID = ?", array($serverid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

	if(sqlsrv_num_rows($qCheck) > 0) {
		
		$serverInfo = sqlsrv_fetch_array($qCheck, SQLSRV_FETCH_ASSOC);
		
		return $serverInfo['ServerName'];
		
	} else {
		
		return "Unknown";
		
	}
}

function loadallserver() {

	global $conn;

	$qCheck = sqlsrv_query($conn, "select * from Server_List order by ServerID DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

	return $qCheck;
}
function loadtheno() {

	global $conn;

	$qCheck = sqlsrv_query($conn, "select * from Log_Card Where Status = 4 order by ID DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

	return $qCheck;
}
function lenhnap() {

	global $conn;

	$qCheck = sqlsrv_query($conn, "select * from ChoNap Where Status = 2 order by TimeCreate DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

	return $qCheck;
}

function loadAllSupportCategory() {
	global $conn;

	$qCheck = sqlsrv_query($conn, "select * from Support_Category order by ID ASC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

	return $qCheck;
}

function loadSupportCategory($id) {

	global $conn;

	$qCheck = sqlsrv_query($conn, "select * from Support_Category where ID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

	if(sqlsrv_num_rows($qCheck) > 0) {
		$serverInfo = sqlsrv_fetch_array($qCheck, SQLSRV_FETCH_ASSOC);
		return $serverInfo;
	} else {
		return false;
	}
}
function IsBind($type) {
	$result = array();
	
	switch($type) {
		case 0:
		$result['name'] = 'Không Khóa';
		$result['color'] = '#188ae2';
		break;
		case 1:
		$result['name'] = 'Khóa';
		$result['color'] = '#1e2eb8';
		break;
	}
	
	return $result;
}
function NeedSex($type) {
	$result = array();
	
	switch($type) {
		case 0:
		$result['name'] = 'Bê đê';
		$result['color'] = 'red';
		break;
		case 1:
		$result['name'] = 'Nam';
		$result['color'] = '#009451';
		break;
		case 2:
		$result['name'] = 'Nữ';
		$result['color'] = '#ff9000';
		break;
	}
	
	return $result;
}
function MultiBuy($type) {
	$result = array();
	
	switch($type) {
		case 0:
		$result['name'] = 'Không';
		$result['color'] = '#DBA901';
		break;
		case 1:
		$result['name'] = 'Có';
		$result['color'] = '#1C1C1C';
		break;
	}
	
	return $result;
}
function ValidDate($type) {
	$result = array();
	
	switch($type) {
		case 0:
		$result['name'] = 'Vô hạn';
		$result['color'] = '#DF01A5';
		break;

	}
	
	return $result;
}
function statusName($type) {
	$result = array();
	
	switch($type) {
		case 0:
		$result['name'] = 'Chờ trả lời...';
		$result['color'] = '#EF380F';
		break;
		case 1:
		$result['name'] = 'Đã hồi âm';
		$result['color'] = '#5cb85c';
		break;
		case 2:
		$result['name'] = 'Đã đóng';
		$result['color'] = '#747579';
		break;
	}
	
	return $result;
}
function statusCard($type) {
	$result = array();
	
	switch($type) {
		case 2:
		$result['name'] = 'Đợi duyệt';
		$result['color'] = '#EF380F';
		break;
		case 1:
		$result['name'] = 'Thành công';
		$result['color'] = '#5cb85c';
		break;
		case 4:
		$result['name'] = 'Chưa thanh toán';
		$result['color'] = 'red';
		break;
		case 3:
		$result['name'] = 'Hủy';
		$result['color'] = '#f5707a';
		break;
	}
	
	return $result;
}
function statusGiftcode($type) {
	$result = array();
	
	switch($type) {
		case 1:
		$result['name'] = 'Đã Dùng';
		$result['color'] = '#EF380F';
		break;
		case 0:
		$result['name'] = 'Chưa sử dụng';
		$result['color'] = '#5cb85c';
		break;
		
	}
	
	return $result;
}
function serverIDcard($type) {
	$result = array();
	
	switch($type) {
		case 1001:
		$result['name'] = 'Gà Hồi Ức';
		$result['color'] = '#EF380F';
		break;

	}
	
	return $result;
}
function STTOP($type) {
	$result = array();
	
	switch($type) {
		case 2:
		$result['name'] = 'Đợi duyệt';
		$result['color'] = '#EF380F';
		break;
		case 1:
		$result['name'] = 'Thành công';
		$result['color'] = '#5cb85c';
		break;
		case 4:
		$result['name'] = 'Chưa thanh toán';
		$result['color'] = 'red';
		break;
		case 3:
		$result['name'] = 'Hủy';
		$result['color'] = '#f5707a';
		break;
	}
	
	return $result;
}
function usernhan($type) {
	$result = array();
	
	switch($type) {
		case 2:
		$result['name'] = 'Huy';
		$result['color'] = '#99CF00';
		break;
		case 1:
		$result['name'] = 'Đức';
		$result['color'] = '#5cb85c';
		break;
		case 3:
		$result['name'] = 'Khuyến mãi';
		$result['color'] = 'red';
		break;		
		case 0:
		$result['name'] = 'Quang';
		$result['color'] = '#634a71';
		break;
	}
	
	return $result;
}
function menhgiaCard($type) {
	$result = array();
	
	switch($type) {
		default:
		$result['name'] = ''.number_format($type).' VNĐ';
		$result['color'] = '#188ae2';		
	}
	
	return $result;
}

function notice($text) {
	echo '<script>alert("'.$text.'")</script>';
}

function movepage($link) {
	die('<script>window.location="'.$link.'"</script>');
}

function url_origin($s, $use_forwarded_host=false)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url($s, $use_forwarded_host=false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

function base64currenturl() {

	$urlSite = full_url($_SERVER);

	return base64_encode($urlSite);
}

function actionPopup($link, $close = false, $action = null) {

	echo '<script>';

	if($link != null)
		echo 'window.opener.location = "'.$link.'";';

	if($action != null)
		echo $action;

	if($close)
		echo 'window.close();';

	echo '</script>';
	
	die();
}

function connectTank($serverid) {
	
	global $conn;
	
	$check = sqlsrv_query($conn, "select * from Server_List WHERE ServerID = ?" , array($serverid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
	
	if(sqlsrv_num_rows($check) > 0) {
		
		$svInfo = sqlsrv_fetch_array($check, SQLSRV_FETCH_ASSOC);
		
		$connectionInfo = array("Database" => $svInfo['Database'], "UID" => $svInfo['Username'], "PWD" => $svInfo['Password'], "CharacterSet" => "UTF-8");

		$conn_sv = sqlsrv_connect($svInfo['Host'], $connectionInfo);
		
	}
	
	sqlsrv_free_stmt($check);
	
	return $conn_sv;
}

function createGiftcode($subcode) {
	
	$rand1 = rand(0, 999);

	$rand2 = rand(0, 999);

	$rand3 = rand(0, 999);

	$rand4 = rand(0, 999);

	$rand5 = rand(1, 10);

	$code1 = md5($rand1).md5($rand2);

	if($rand5 > 5) {
		$code2 = md5($rand3).md5($rand4);
	} else {
		$code2 = md5($rand4).md5($rand3);
	}

	$code3 = md5($code1.$code2);

	$finalCode = strtoupper($subcode.substr($code3, 0, 40));
	
	return $finalCode;
}


function addGiftcode($activeid, $subcode) {
	
	global $conn_sv;
	
	$code = createGiftcode($subcode.$activeid);
	
	$insert = sqlsrv_query($conn_sv, "insert into Active_Number (AwardID, ActiveID, PullDown, UserID, Mark) VALUES (?, ?, ?, ?, ?)" , array($code, $activeid, false, 0, 0));
	
	if($insert) {
		return $code;
	}
	
	return false;
}

function getDateTime($unix) {
	
	//$timezone = new DateTimeZone("GMT");
	$date = new DateTime("now");
	
	if($unix != "now")
		$date->setTimestamp($unix);
	
	return $date;
	
}

function vaildCaptcha($code) {
	
	$vaild = true;
	
	if (empty($_SESSION['captcha']) || trim(strtolower($code)) != $_SESSION['captcha'])
        $vaild = false;
	
	unset($_SESSION['captcha']);
	
	return $vaild;
}
?>