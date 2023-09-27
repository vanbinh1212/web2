<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

$email = strtolower(trim($_POST['user']));

$qCheckMail = sqlsrv_query($conn, "select * from Mem_Account WHERE Email = ?", array($email), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($qCheckMail) > 0) {
	$infouser = sqlsrv_fetch_array($qCheckMail, SQLSRV_FETCH_ASSOC);
	$data['error'] = 1;
	$style = '';
	if($infouser['IsBan'] == 1){
		$style = 'text-decoration: line-through;';
	}
	$data['text'] = '<tr>
<td>'.$infouser['UserID'].'</td>
<td style="'.$style.'">'.$infouser['Email'].'</td>
<td>'.number_format($infouser['Money']).'</td>
<td>'.number_format($infouser['TotalMoney']).'</td>
<td><a href="javascript:;" class="btn btn-warning button_luckybox" onclick="block_user('.$infouser['UserID'].',\''.$infouser['Email'].'\')" data-toggle="tooltip" data-placement="top">Khóa</a>
<a href="javascript:;" class="btn btn-danger button_luckybox" onclick="unlock_user('.$infouser['UserID'].',\''.$infouser['Email'].'\')" data-toggle="tooltip" data-placement="top">Mở Khóa</a></td>
</tr>';
} else {
	$data['error'] = 0;
	$data['title'] = 'Không tồn tại';
	$data['text'] = 'Không tìm thấy tài khoản bạn vừa nhập.';
}

sqlsrv_free_stmt($qCheckMail);
echo json_encode($data);
?>