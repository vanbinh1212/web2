<?php
if(!defined('Gun4S.Net')) die();
date_default_timezone_set('Asia/Ho_Chi_Minh');
# Khai bao cac duong link
define('link_resource','http://gunnyncm.com/Res/image/');
define('link_shop','http://gunnyncm.com/webshop/'); //không config lổi
define('link_game','http://gunnyncm.com/choi-game/'); //không config lổi
define('link_request','http://gunnyncm.com/request/'); //không config lổi
$cash = 0;// tặng khi đăng ký
$cashfree = 0;// tặng khi đăng ký

$title = 'gunnyncm.com';
$admin = array("ADMIN","ADMINGUNNY5S");// Chinh tai khoan admin o day

// Config NẠP THẺ GAMEBANK
$merchant_id = '72774'; // interger
$api_user = "5f61cac2d636b"; // string
$api_password = "831a16a24f43f787359d13a0ef4a53c6"; // string

//CONFIG NẠP MOMO API.GATEPAY.VN
$api_key = "5dd003152dfbff88b99191ffadce3813"; // api key của bạn.
$phone = "0949699436";
$api_url = "https://api.gatepay.vn/api/momo/";

$serverlist='Gà Model';//Tên Server ngăn cách bằng dấu "|" , Sắp xếp theo thứ tự để tránh nhầm lẫn, Lưu ý để ít nhất 1 dấu "|", 
////////////////////////////lổi do config sai chúng tôi không chịu trách nhiệm///////////////////////
$numsv = 2;// số server hiện có để check kg nó lổi
$max = 10000;//max Hop thanh
$gia = 50;//gia Hop thanh
$cashbag = 50;//gia xoa pass ruong
$chagmoney = 1;//gia doi xu = 1 coin
$chagmoneyf = 0.5;//gia doi xu = 1 coin
$chagcoinfree = 1;//gia doi coin free = 1 coin
$cashgioi = 100;//gia chuyen gioi
$cashrename = 50;//gia doi ten
$pt = 50;// % cash tang chuc nang moi ban 
$expvipdaily = 5;//exp vip được + khi điểm danh
$vipexp = 50;//vip exp phải lớn hơn số này mới cho dùng chức năng free
$cashfb = 50; //cash chính tặng khi nhận code share fb
$cashfreefb = 20;// cash free tặng khi nhận code share fb
$pointms1 = 100;// gói pointms 1
$pointms2 = 200;// gói pointms 2
$pointms3 = 500;// gói pointms 3
$insertrankfrompaycard = False;// True là mở false là tắt nạp thẻ tặng danh hiệu
$tyle = 100;//nap xu
$expVIPGame = 0.001;//100k coin = 100 exp víp trong game
$firstRecharge = 100000; //Nạp 100k dc nhận

//$id_app_fb = '';//app fb developers.facebook.com

# Khai bao thong tin ket noi
$config['dbhostdata'] = '103.92.24.148';			# Server name cua mssql

$config['dbuserdata'] = 'sa';							# User name cua mssql ( mac dinh la sa )

$config['dbpassdata'] = '@admin12211993';					# Pass cua mssql ( pass cua sa )

$config['dbdatatank'] = 'Project_Player34';				# Db chua du lieu ( mac dinh la Project_Player34 )

//$config['dbdatamemb'] = 'Db_Membership';			# Db membership

$config['ws'] = 'DB_WebShop';							#Db web shop

$config['dbdatatanks2'] = 'Project_Player34SV2';					#s2 kg có thì khỏi config

$config['dbdatatanks3'] = 'Db_Tan';					#s3 kg có thì khỏi config

$config['dbdatatanks4'] = 'Db_Tan';					#s4 kg có thì khỏi config

$config['dbdatatanks5'] = 'Db_Tan';					#s5 kg có thì khỏi config

$config['dbdatatanks6'] = 'Db_Tan';					#s6 kg có thì khỏi config

# Include class webshopv3
include_once 'include/global.php';

# Khoi tao class ket noi mssql
$data = new webshopv3($config);