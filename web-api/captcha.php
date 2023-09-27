<?php
define('Kh4nhHuy3z!99^H2S04','Fuck You',true);
session_start();
$md5_hash = md5(rand(0,9999));
$string = substr($md5_hash, 15, 4);
$_SESSION['code'] = $string;
$newImage = imagecreatefromjpeg("images/bg_cap.jpg");
$txtColor =  imagecolorallocate(rand(0,255), rand(0,255), rand(0,255));
imagestring($newImage, 5, 5, 5, $string, $txtColor);
header("Content-type: image/jpeg");
imagejpeg($newImage);
?>