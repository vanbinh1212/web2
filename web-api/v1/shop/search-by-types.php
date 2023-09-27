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
include_once("../../connect.php");
#############################

#--- [ Tìm kiếm bằng ShopgoodsShowList type ] ---
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
{
	$arr = getJsonRaw();
	$isEmptyFilter = false;
	if ($arr == '{}' || count($arr) == 0 || $arr == null)
	{
		$arr = array(-999);
		$isEmptyFilter = true;
	} 
	if (!$isEmptyFilter)
	{
		$ids = '('.implode(',', $arr).')';
		$sql = "SELECT * from V_Shop where type in $ids order by shopid";
	}
	else
	{
		$sql = "SELECT * from V_Shop where type is null";
	}
    $q = @$data->query($sql);
	$array;
	$i = 0;
	while($info = @$data->query_array($q))
	{
		$array[$i] = $info;
		$i++;
	}
	echo json_encode($array);
}

function getJsonRaw(){
	$json = file_get_contents('php://input');
	$data = json_decode($json, true);
	return $data;
}
?>