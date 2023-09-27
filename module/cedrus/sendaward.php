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
	
	include_once(dirname(__FILE__)."/../class/class.account.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	
	$listAccount = trim($_POST['text']);
	
	$serverid = 0;
	
	if($listAccount) {
		
		$listAccountArray = explode(",", $listAccount);
		
		$place = trim($_POST['txtAmount']);;
	
		foreach($listAccountArray as $acc) {
			
			// get userid
			$userInfo = account::getUserInfoByEmail(trim($acc));
			
			if($userInfo != false) {
				
				switch($place) {
					
					case 10000:
					account::addItemBag($userInfo['UserID'], 0, 100100, 100, true, 0, true); // chdon					
					case 20000:
					case 30000:
					account::addItemBag($userInfo['UserID'], 0, 315006, 100, true, 0, true); // dch5
					account::addItemBag($userInfo['UserID'], 0, 11162, 100, true, 0, true); // mui khoan 1
					account::addItemBag($userInfo['UserID'], 0, 100100, 300, true, 0, true); // da tinh yeu
					account::addItemBag($userInfo['UserID'], 0, 11163, 999, true, 0, true); // so cap super-bum
					account::addItemBag($userInfo['UserID'], 0, 11169, 50, true, 0, true); // so cap super-bum
					account::addItemBag($userInfo['UserID'], 0, 8017, 1, true, 0, false); // so cap super-bum
					account::addItemBag($userInfo['UserID'], 0, 9028, 1, true, 0, false); // so cap super-bum
					break;
					
					case 50000:
					account::addItemBag($userInfo['UserID'], 0, 11169, 100, true, 0, true); // da
					account::addItemBag($userInfo['UserID'], 0, 11170, 100, true, 0, true); // dong
					account::addItemBag($userInfo['UserID'], 0, 11171, 100, true, 0, true); // bac
					account::addItemBag($userInfo['UserID'], 0, 11172, 100, true, 0, true); // vang
					account::addItemBag($userInfo['UserID'], 0, 11173, 100, true, 0, true); // ngoc
					account::addItemBag($userInfo['UserID'], 0, 11177, 999, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 315006, 300, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11162, 300, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 8217, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9228, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 100100, 999, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11163, 3000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11164, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11165, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11166, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 201567, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11167, 15, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11168, 2, true, 0, true);
					break;
					
					case 100000:
					account::addItemBag($userInfo['UserID'], 0, 7135, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 11169, 200, true, 0, true); // da
					account::addItemBag($userInfo['UserID'], 0, 11170, 200, true, 0, true); // dong
					account::addItemBag($userInfo['UserID'], 0, 11171, 200, true, 0, true); // bac
					account::addItemBag($userInfo['UserID'], 0, 11172, 200, true, 0, true); // vang
					account::addItemBag($userInfo['UserID'], 0, 11173, 200, true, 0, true); // ngoc
					account::addItemBag($userInfo['UserID'], 0, 11177, 2500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 35170101, 1, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 8317, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9328, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 315006, 1000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11162, 1200, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 100100, 3000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11163, 7000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 201489, 300, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 201567, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11167, 50, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11164, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11165, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11166, 5000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11168, 10, true, 0, true);
					break;
					
					case 200000:
					case 300000:
					account::addItemBag($userInfo['UserID'], 0, 7139, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 35210101, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 46004, 1, true, 30, false);
					account::addItemBag($userInfo['UserID'], 0, 122318, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 8417, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9428, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 11168, 50, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 17012, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 101011, 20, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 101010, 20, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11906, 999, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11560, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11561, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11562, 100, true, 0, true);
					break;
					
					case 500000:
					account::addItemBag($userInfo['UserID'], 0, 7139, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 35210201, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 46004, 1, true, 90, false);
					account::addItemBag($userInfo['UserID'], 0, 122318, 3, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 17013, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 8517, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 9528, 1, true, 0, false);
					account::addItemBag($userInfo['UserID'], 0, 101011, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 101010, 100, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11168, 200, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 29994, 2000, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11560, 500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11561, 500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11562, 500, true, 0, true);
					account::addItemBag($userInfo['UserID'], 0, 11906, 3000, true, 0, true);
					break;

				}
				
				echo 'Gửi thành công quà nạp tới tài khoản '.$acc.' - Mệnh Giá : '. $place .' VNĐ</br>';
				
				$place;
				
			} else {
				echo 'ERROR ACCOUNT '.$acc.' - Mệnh Giá: '. $place .' VNĐ</br>';
			}
		}
	}
	
	
	
	
?>

<form id="" method="post">
	Username ngăn cách nhau bằng dấu phẩy ,<textarea name="text" rows="5" cols="20"></textarea></br>
<label class="control-label" for="email_login">Mệnh giá:</label>
			<select class="form-control" name="txtAmount">
			<option value="10000">10.000 VNĐ</option>
			<option value="20000">20.000 VNĐ</option>
			<option value="30000">30.000 VNĐ</option>
			<option value="50000">50.000 VNĐ</option>
            <option value="100000">100.000 VNĐ</option>
			<option value="200000">200.000 VNĐ</option>
			<option value="300000">300.000 VNĐ</option>
			<option value="500000">500.000 VNĐ</option>
			<option value="1000000">1.000.000 VNĐ</option>			
			</select>
	<input type="submit" value="Gửi" />
</form>

</body>