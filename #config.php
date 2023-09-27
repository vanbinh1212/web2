<?php
if(!defined("SNAPE_VN")) die ('No access');

error_reporting(E_ALL ^ E_NOTICE);
// config site
$_config['page']['title']                          = 'GunnyPC - Game Hồi Ức Kỷ Niệm';
$_config['page']['fullurl']                        = 'http://gunnyae.com';
$_config['page']['fanpage']                        = 'https://www.facebook.com/profile.php?id=61550627900083/';
$_config['panel']['Administrator']                        = 'admin';


//config recaptcha
$_config['recaptcha']['sitekey']                   = '6LdINtMZAAAAALY_vysLpD2kfLRosdLnV2mNBD3E';
$_config['recaptcha']['secret']                    = '6LdINtMZAAAAADZC11cXiPDPMIkEWj0X7iz_fHDv';
$_config['recaptcha']['language']                  = 'vi';

// config card
$_config['recharge']['uid']                        = 678;
$_config['recharge']['user']                       = '55e25e5ca976f';
$_config['recharge']['pass']                       = '3a55b871248802e44e5be9bc5fc018bf';

//config social
$_config['social']['google']['id']                 = '271496820614-rebdgngmrtghthd.apps.googleusercontent.com';
$_config['social']['google']['secret']             = 'AIzaSyAu1VYZ3CTa0_GBzofxV3adj1XxwIgCqZs';
$_config['social']['yahoo']['id']                  = 'dj0yJmk9TnoyNm00OTVTVU1SJmQ9WVdrOVNGaEpSRFV6TmpJbhgfhftnsrewsnM9Y29uc3VtZXJzZWNyZXQmeD02Mg--';
$_config['social']['yahoo']['secret']              = 'dfsgwregsgg85dd6a50cdec5a73ec00';
$_config['social']['yahoo']['domain']              = 'Cedrus.Live';
$_config['social']['facebook']['id']               = '632696097212412';
$_config['social']['facebook']['secret']           = 'c9556e47bc0265fcf0c8549362719a73';

$ip = getenv("REMOTE_ADDR");
if ($ip =="42.113.158.224" || $ip =="42.116.152.97" || $ip=="113.23.52.159" || $ip=="42.112.236.158" || $ip=="113.180.93.51" || $ip =="14.254.52.20" || $ip =="14.249.162.212" || $ip =="42.112.237.141" || $ip =="1.55.239.147")
{
echo "Bạn không được quyền truy cập vào trang Web này!";
exit();
}

// config festury
$_config['effect']['loading_max_count']            = 10;


// config function
$_config['function']['code_anti_hack_session']     = 'gegBsdrebfhesdBshehwdBsba'; // chong hack session
$_config['function']['news_per_page']              = 10; // tin tuc moi trang
$_config['function']['his_per_page']               = 20; // gd mỗi trang
$_config['function']['ws_per_page']                = 12; // item webshop mỗi trang
$_config['function']['url_resource']               = 'http://gunnyae.com/res/';
$_config['function']['url_request']                = 'http://gunnyae.com/req/';
$_config['function']['url_flash']                  = 'http://gunnyae.com/flash/';
$_config['function']['url_flash_config']           = 'http://gunnyae.com/flash/config.xml';
$_config['function']['md5_center']                 = 'gsgej209SNbjeg9w4jrbmsbmeoj2shaddbkssksSogeskg';
$_config['function']['key_request']                = 'LAMPROVIP-DIGGORY-CYRUS-22111999-LOGINWEBKEY';
$_config['function']['fee_seller_webshop']         = 10;

// config sql server
$_config['sql']['host']                            = 'WIN-L1SSEEUPNP6';
$_config['sql']['username']                        = 'sa';
$_config['sql']['password']                        = '@admin12211993';
$_config['sql']['database']                        = 'Member';

// # this function make connect to sqlsrv. don't modify it
$connectionInfo = array("Database" => $_config['sql']['database'], "UID" => $_config['sql']['username'], "PWD" => $_config['sql']['password'], "CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($_config['sql']['host'], $connectionInfo);

if(!$conn) {
	die("No avalible now!");
}

?>