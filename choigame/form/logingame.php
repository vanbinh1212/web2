<?php
session_start();
define("Gun4S.Net",true);
include "../#config.php";
include "../function.php";
$msg="Dữ liệu không hợp lệ.";
$ss_hlim_user=strtolower($_POST['u']);
$ss_hlim_getpass_user=strtoupper(md5($_POST['p']));
$checkuser  = false;
if ($checkuser == true){
	$json["content"] = "Tên tài khoản không hợp lệ. Tên tài khoản chỉ bao gồm chữ và số và có độ dài từ 4 đến 20 kí tự.";
	$json["type"] = 2;
	}else {
$dataImport = array($ss_hlim_user, $ss_hlim_getpass_user);
$check_info = sqlsrv_query($conn, "select UserID,Email,Password,IsBan,Money from Mem_Account where Email = ? and Password = ?" , $dataImport, array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
if(sqlsrv_num_rows($check_info) > 0) {
		
		$userInfo = sqlsrv_fetch_array($check_info, SQLSRV_FETCH_ASSOC);
		if($userInfo['IsBan'] == 0){
		$cash = $userInfo['Money'];
		$_SESSION['ss_hlim_userid'] = $userInfo['UserID'];
		$_SESSION['ss_hlim_user'] = $ss_hlim_user;
		$_SESSION['ss_hlim_getpass_user'] = $ss_hlim_getpass_user;
		$json["type"] = 0;
		$json['username'] = $ss_hlim_user;
		$json['password'] = $ss_hlim_getpass_user;
		$json['cash'] = number_format($cash);
		$json['user'] = $ss_hlim_user;
		}else {
		$json["content"] = "Tài khoản của bạn đang tạm khóa vui lòng liên hệ GM để biết thêm chi tiết";
		$json["type"] = 2;
		}
}else{
	$json["content"] = "Tài khoản hoặc mật khẩu không đúng!";
	$json["type"] = 1;
}
}
echo json_encode($json);
?>