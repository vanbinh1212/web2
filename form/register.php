<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once(dirname(__FILE__)."/../#config.php");

include_once(dirname(__FILE__)."/../class/class.account.php");

include_once(dirname(__FILE__)."/../class/function.global.php");

//include dirname(__FILE__).'/../recaptcha/autoload.php';


$return['type'] = -1;
$return['content'] = 'Lỗi không xác định';
$phone	= $_POST['txtPhone'];
$email = strtolower(trim($_POST['txtEmail']));

$password = trim($_POST['txtPassword']);
$code = trim($_POST['txtCode']);
if($_SESSION['ss_user_id']) {
	$return['type'] = 1;
	$return['content'] = 'Bạn đã đăng nhập rồi.';
}
$checkuser  = preg_match("/^[a-zA-Z0-9\_\.]{4,20}$/",$email);

//$recaptcha = new \ReCaptcha\ReCaptcha($_config['recaptcha']['secret']);

//$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

/*if (!$resp->isSuccess()) {
	$return['type'] = -928;
	$return['content'] = 'Mã bảo vệ không chính xác.';
}*/

/*if(!vaildCaptcha($code)) {
	$return['type'] = -928;
	$return['content'] = 'Mã bảo vệ không chính xác.';
}*/

if($return['type'] == -1) {
	if(strlen($password) < 6 || strlen($password) > 100 || $checkuser == 0) {
		$return['type'] = 2;
		$return['content'] = 'Dữ liệu không hợp lệ. ';
	} else {

		$email = strtolower($email);

		$password = strtoupper(md5($password));

		$account = new account(0);

		if($account->create($email, $password, $phone) > 0) {
			$account->login($email, $password);
			$return['type'] = 0;
			$return['content'] = 'Đăng ký thành công!';

		} else {

			// can't create account
			$return['type'] = -1938;
			$return['content'] = 'Không thể khởi tạo tài khoản. Vui lòng kiểm tra lại.';

		}
	}
}
echo json_encode($return);
sqlsrv_close($conn);
?>