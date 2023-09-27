<?php
if(!defined('Gun4S.Net')) die('Fuck You');
define("HOST_DB","WIN-L1SSEEUPNP6");
define("MEM_DB","DB_WebShop");
define("MEM_Project_Player34","Project_Player34");
define("USER_DB","sa");
define("PASS_DB","@admin12211993");
define("api_key","vvvvvvvvvvvncmvncmzksnc");/*Config Giống api_key trong web.config, có thể thay đổi mục này
VD : <add key="api_key" value="nmnc,vbmncv,bmncv,mn" />bạn config là nmnc,vbmncv,bmncv,mn thì ở đây cũng phải
config nmnc,vbmncv,bmncv,mn
nó là apikey xác thực giữa php và aspx , không liên quan tới LoginKey của login và req nhé
Nếu không biết thì có thể để nguyên như cũ
*/
$baotri = false; //Laucher false or true

define("Link_WebShop","http://gunnyae.com/webshop");//Link WebShop dạng test.zingun.net/shop
/////////////////////////ServerList////////////////////////////////
$serverlist='Gà Model';//Tên Server ngăn cách bằng dấu "|" , Sắp xếp theo thứ tự để tránh nhầm lẫn, Lưu ý để ít nhất 1 dấu "|"
/////////////////////////End Config////////////////////////////////
////////////////////////Config Link Server///////////////////////// 
//Config s1
//$config['RequestUrl'][1] = 'http://gunnyae.com/request/';
//$config['FlashUrl'][1] = 'http://gunnyae.com/choi-game/flash/';
////$config['FlashUrl'][1] = 'http://gunnyae.com/choi-game/flash/';
//$config['LoginKey'][1] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
//$config['ConfigFlash'][1] = 'http://gunnyae.com/choi-game/config.xml';
////Config s2
//$config['RequestUrl'][2] = 'http://quest2.gunnylaumienphi.com';
//$config['FlashUrl'][2] = 'http://flash2.gunnylaumienphi.com/';
//$config['LoginKey'][2] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
//$config['ConfigFlash'][2] = 'http://play.gunnylaumienphi.com/config2.xml';

$config['RequestUrl'][1] = 'http://gunnyae.com/req/';
$config['FlashUrl'][1] = 'http://gunnyae.com/flash/';
//$config['FlashUrl'][1] = 'http://gunnyae.com/choi-game/flash/';
$config['LoginKey'][1] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$config['ConfigFlash'][1] = 'http://gunnyae.com/choi-game/config.xml';
$config['IsOpen'][1] = "true";

//Config s2
$config['RequestUrl'][2] = 'http://s2.gunnyae.com/request/';
$config['FlashUrl'][2] = 'http://s2.gunnyae.com/flash/';
$config['LoginKey'][2] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$config['ConfigFlash'][2] = 'http://gunnyae.com/choi-game/configServer2.xml';
$config['IsOpen'][2] = "true";
/*Nếu Muốn Config Thêm Server CHỉ cần thêm:
$config['RequestUrl'][id của server] = 'link quest';
$config['FlashUrl'][id của server] = 'link flash';
$config['LoginKey'][id của server] = 'login key của req';
$config['ConfigFlash'][id của server] = 'link file config.xml';
lưu ý id của server tương ứng với tên file server_id của server.php
*/
///////////////////////End Config/////////////////////////////////
/*Thỏa Thuận Sử Dụng*/
/*Login Dev By test.zingun.net
Login Chỉ Sử dụng phù hợp cho shop gun4s
lưu ý : bạn chỉ cần config trong file này và config.xml
Thanks for use it!
*/
?>