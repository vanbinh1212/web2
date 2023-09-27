<?php
if(!defined('Tu4nMR@PRoKAK4')) die('Fuck You');
# Khai bao cac duong link
define('linkserver', './');
define('nameweb', 'Gunny');
define('login', 'http://gunnyonl.com/shop/');
define('link_forum', 'https://www.facebook.com/Gunny-Private-Hay-Nh%E1%BA%A5t-204976296604597/?fref=ts');
define('link_trangchu','./');
define('link_resource','http://gunnyonl.com/Res/image/');
define('link_sever1','./');
define('link_taonv', './');
define('currency', 50000000); # tỉ lệ đổi cash ra xu
define('rename', 2000); # phí đổi tên



//fbabb 

$title='Hot Hot Gunnyonl.com cam kết không đóng cửa dù chỉ 1 người chơi mọi người vào chơi cùng mình nhé vui lắm !';
$fbappid ='705739886240952';
$linkshare ='https://apps.facebook.com/fywsname';
$link="http://gunnyonl.com/shop/register";
$name="Hot Hot Gunnyonl.com cam kết không đóng cửa dù chỉ 1 người chơi mọi người vào chơi cùng mình nhé vui lắm !";
$caption="Hot Hot Gunnyonl.com cam kết không đóng cửa dù chỉ 1 người chơi mọi người vào chơi cùng mình nhé vui lắm !";
$description="Hot Hot Gunnyonl.com cam kết không đóng cửa dù chỉ 1 người chơi mọi người vào chơi cùng mình nhé vui lắm !";
$picture ="http://kiemgame.net/wp-content/uploads/2015/05/game-gunny-lau.jpg";
$username = 'nghichtu91';
$hashtag='#gunny 360';
$url='http://gunnyonl.com/kichthu/WebForm1.aspx?uid='.$_SESSION['UserID'].'&sid=1';



# Khai bao thong tin ket noi
$config['dbhostdata'] = 'WIN-L1SSEEUPNP6';							# Server name cua mssql

$config['dbuserdata'] = 'sa';							# User name cua mssql ( mac dinh la sa )

$config['dbpassdata'] = 'AnhHoang!@#';						# Pass cua mssql ( pass cua sa )

$config['dbdatatank'] = 'MemberFC';							# Db chua du lieu ( mac dinh la db_tank )

$config['dbdatamemb'] = 'MemberFC';							# Db membership

# Include class webshopv3
include_once 'include/global.php';

# Khoi tao class ket noi mssql
$data = new webshopv3($config);