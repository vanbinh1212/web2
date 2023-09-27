<?php
if(!defined('Kh4nhHuy3z!99^H2S04')) die('Fuck You');
function getContentPage($tag) {
	switch($tag) {
		case "dang-ky":
		return '2i-chuc-nang/chuc-nang/dangky.php';
		case "quen-mat-khau":
		return 'module/tai-khoan/quenpass.php';
		case "doi-mat-khau":
		return 'module/tai-khoan/doipass.php';
				case "doi-mat-khau-ruong":
		return 'module/tai-khoan/doipassruong.php';
		case "doi-mat-khau-c2":
		return 'module/tai-khoan/doipass2.php';
		case "nap-the":
		return '2i-chuc-nang/chuc-nang/qua-nap-the.php';
		case "nap-the-kq":
		return '2i-chuc-nang/chuc-nang/kqua-nap-the.php';
		case "quan-ly-mod":
		return '2i-chuc-nang/MODER/menu.php';
		case "quan-ly-web":
		return '2i-chuc-nang/admin/menu.php';
		case "dang-nhap":
		return '2i-chuc-nang/chuc-nang/login.php';
		case "login":
		return '2i-chuc-nang/chuc-nang/login1.php';

		case "thoat":
		return '2i-chuc-nang/chuc-nang/logout.php';
	}
}
function getContentName($tag) {
	switch($tag) {
		
		default:
		return '';
		break;
	}
}
?>