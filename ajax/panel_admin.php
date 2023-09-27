<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

$email = strtolower(trim($_POST['user']));

$qCheckMail = sqlsrv_query($conn, "select * from Mem_Account WHERE Email = ?", array($email), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qCheckMail) > 0) {
	$infouser = sqlsrv_fetch_array($qCheckMail, SQLSRV_FETCH_ASSOC);
	// lenh if
	if($_POST['can'] == 'Block'){
	if($infouser['IsBan'] == 0){
    $userid = $infouser['UserID'];
	$Message = $_POST['mes_block'];
	if($Message == null){
		$Message = 'Tài khoản bạn tạm thời bị khóa. Hãy liên hệ ADMIN';
	}
	sqlsrv_query($conn, "UPDATE Mem_Account SET IsBan = 'True' WHERE Email = N'$email'");
	sqlsrv_query($conn, "INSERT INTO Mem_AccountBlock (UserID,Messager,TimeBlock) VALUES ('$userid',convert(nvarchar(200),N'$Message'),'".strtotime(date('Y-m-d H:i:s'))."')");
	$data['title'] = 'Thành công';
	$data['info'] = 'Khóa tài khoản này thành công.';	
	} else {
	$data['title'] = 'Lỗi';
	$data['info'] = 'Tài khoản này đã bị khóa không thể khóa tiếp.';	
	}
	} else if($_POST['can'] == 'UnBlock'){
	if($infouser['IsBan'] == 1){
    $userid = $infouser['UserID'];		
	sqlsrv_query($conn, "UPDATE Mem_Account SET IsBan = 'False' WHERE UserID = N'$userid'");
	sqlsrv_query($conn, "Delete Mem_AccountBlock WHERE UserID = '$userid'");		
    $data['title'] = 'Thành công';
	$data['info'] = 'Mở Khóa tài khoản này thành công.';	
	} else {
	$data['title'] = 'Lỗi';
	$data['info'] = 'Tài khoản này Đang Mở Khóa không thể Mở Khóa tiếp.';	
	}
	}
	// e lenh
} else {
	$data['title'] = 'Không tồn tại';
	$data['info'] = 'Không tìm thấy tài khoản bạn vừa yêu cầu khóa.';
}

sqlsrv_free_stmt($qCheckMail);
echo json_encode($data);
?>