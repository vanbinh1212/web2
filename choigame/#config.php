<?php
if(!defined('Gun4S.Net')) die('Fuck You');
define("HOST_DB","WIN-L1SSEEUPNP6");
define("MEM_DB","Member");
define("USER_DB","sa");
define("PASS_DB","@admin12211993");
define("api_key","cedrusdeptraipro@123");/*Config Giống api_key trong web.config, có thể thay đổi mục này
VD : <add key="api_key" value="nmnc,vbmncv,bmncv,mn" />bạn config là nmnc,vbmncv,bmncv,mn thì ở đây cũng phải
config nmnc,vbmncv,bmncv,mn
nó là apikey xác thực giữa php và aspx , không liên quan tới LoginKey của login và req nhé
Nếu không biết thì có thể để nguyên như cũ
*/
define("Link_WebShop","http://gunnyae.com/");//Link WebShop dạng test.zingun.net/shop
/////////////////////////ServerList////////////////////////////////
$serverlist='GunnyAE';//Tên Server ngăn cách bằng dấu "|" , Sắp xếp theo thứ tự để tránh nhầm lẫn, Lưu ý để ít nhất 1 dấu "|"
/////////////////////////End Config////////////////////////////////
////////////////////////Config Link Server/////////////////////////

$ip = getenv("REMOTE_ADDR");
if ($ip =="42.116.152.2" || $ip =="42.116.152.97" || $ip=="113.23.52.159" || $ip=="42.112.236.158" || $ip=="113.180.93.51" || $ip =="14.254.52.20" || $ip =="14.249.162.212")
{
echo "Bạn không được quyền truy cập vào trang Web này!";
exit();
}
//Config s1
$config['RequestUrl'][1] = 'http://gunnyae.com/req/';
$config['FlashUrl'][1] = 'http://gunnyae.com/flash/';
$config['LoginKey'][1] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$config['ConfigFlash'][1] = 'http://gunnyae.com/flash/config.xml';
//Config s4
$config['RequestUrl'][4] = 'http://gunnyae.com/req/';
$config['FlashUrl'][4] = 'http://gunnyae.com/choigame/flashv552/';
$config['LoginKey'][4] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$config['ConfigFlash'][] = 'http://gunnyae.com/choigame/config4.xml';
//Config s3
$config['RequestUrl'][3] = 'http://gunnyae.com/req/';
$config['FlashUrl'][3] = 'http://gunnyae.com/choigame/f6/';
$config['LoginKey'][3] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$config['ConfigFlash'][3] = 'http://gunnyae.com/choigame/config3.xml';
//Config s3
$config['RequestUrl'][2] = 'http://gunnyae.com/req/';
$config['FlashUrl'][2] = 'http://gunnyae.com/choigame/flashold2/';
$config['LoginKey'][2] = 'QY-16-WAN-0668-2555555-7ROAD-dandantang-love777nguyenluu';
$config['ConfigFlash'][2] = 'http://gunnyae.com/choigame/config2.xml';
/*Nếu Muốn Config Thêm Server CHỉ cần thêm:
$config['RequestUrl'][id của server] = 'link quest';
$config['FlashUrl'][id của server] = 'link flash';
$config['LoginKey'][id của server] = 'login key của req';
$config['ConfigFlash'][id của server] = 'link file config.xml';
lưu ý id của server tương ứng với tên file server_idcủaserver.php
*/
///////////////////////End Config/////////////////////////////////
/*Thỏa Thuận Sử Dụng*/
/*Login Dev By test.zingun.net
Login Chỉ Sử dụng phù hợp cho shop gun4s
lưu ý : bạn chỉ cần config trong file này và config.xml
Thanks for use it!
*/
?>