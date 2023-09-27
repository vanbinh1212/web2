
<?php
############################# Header
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE");
//header('Access-Control-Allow-Origin: *');
define('Kh4nhHuy3z!99^H2S04','Fuck You',true);
#############################

############################# Role validate
$ACCEPT_ROLES = array('ADMIN');
include_once("./connect.php");
#############################

if (!isset($_SESSION)) {
    session_start();
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
	
	
} else if ($method == 'GET') {
	$userid = $_GET['userid'];
	$bagType = $_GET['bagtype'];
	if ($bagType == 21) {
		$q = @$data->query("SELECT a.*, b.CategoryID, b.NeedSex, b.Pic, b.Description, b.Attack, b.Defence, b.Luck, b.Agility, b.Property7,c.BaseLevel as Level,CONCAT(c.Name, CONCAT(' Lv', c.BaseLevel)) Name from [sys_users_goods] a inner join Shop_goods b on a.TemplateID = b.TemplateID inner join Rune_Template c on c.TemplateID = a.TemplateID where userid = $userid and bagtype = $bagType");
	} else {
		$q = @$data->query("SELECT a.*, b.CategoryID, b.NeedSex, b.Pic, b.Description, b.Attack, b.Defence, b.Luck, b.Agility, b.Property7,b.Level,b.Name from [sys_users_goods] a inner join Shop_goods b on a.TemplateID = b.TemplateID where userid = $userid and bagtype = $bagType");
	}
	$q2 = @$data->query("SELECT UserID, Username, Nickname, Money, GiftToken, Grade, FightPower from [V_Sys_Users_Detail] where userid = $userid");
	$i = 0;
	$arr;
	while($info = @$data->query_array($q)) {
		$arr[$i] = $info;
		$i++;
	}
	$res[0] = $arr;
	while($info = @$data->query_array($q2)) {
		$res[1] = @$info;
	}	

	//$xml = new XMLReader();
	//$xml->xml($uncompressedXml);
	//$xml2 = simplexml_load_file($uncompressedXml);
	echo (json_encode($res));
	//echo ($uncompressedXml);
} else if ($method == 'PUT'){
  
	
} else if ($method == 'DELETE'){

} else {
    // Method unknown
}

function getBody (){
	 $json = file_get_contents('php://input');
	 $data = json_decode($json, true);

	return $data;
}

?>