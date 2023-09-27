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
include_once("../connect.php");
#############################

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
    // Method is POST
	$id = intval(getBody()['id']);
	$ShowID = getBody()['ShowID'];
	$Type = (getBody()['Type']);
	if ($ShowID == null) {
		$Type = intval($Type);
		$sql = "insert into ShopGoodsShowList(ShopID, Type, NeedVip) values ('$id','$Type',0)";
	} else {
		$ShowID = intval($ShowID);
		if ($Type == 'null' || $Type == null || !is_numeric($Type)) {
			$sql = "delete ShopGoodsShowList where ID = '$ShowID'";
		} else {
			$Type = intval($Type);
			if ($Type != 0) {
				$sql = "update ShopGoodsShowList set [Type] = '$Type' where ID = '$ShowID'";
			}		
		}		
	}
	$q = @$data->query($sql);
	$result = @$data->query_num($q);
	if ($result > 0) {
		$sql2 = @$data->query("select * from V_Shop where id = '$id'");
		echo json_encode(@$data->query_array($sql2));
		return;
	}
	http_response_code(400);
} else if ($method == 'GET'){	
	// $search = trim(mb_convert_encoding($_GET['search'],'HTML-ENTITIES','utf-8'));
	// $search = (html_entity_decode($search, ENT_HTML401, 'UTF-8'));
	// if ($search == '') return;
	$page = $_GET['page'];
	$sql = "SELECT ID,ShopID,GroupID,TemplateID,BuyType,IsContinue,
		IsBind,IsVouch,Label,Beat,AUnit,APrice1,AValue1,APrice2,AValue2,
		APrice3,AValue3,BUnit,BPrice1,BValue1,BPrice2,BValue2,BPrice3,
		BValue3,CUnit,CPrice1,CValue1,CPrice2,CValue2,CPrice3,Sort,CValue3,
		IsCheap,LimitCount,StartDate,EndDate,ValidDate,StrengthenLevel,Compose,
		ShowID,Type,Name,NeedSex,CategoryID,Pic 
		from V_Shop order by UpdatedAt desc, id asc OFFSET (($page)*100) ROWS FETCH NEXT 100 ROWS ONLY";
    $q = @$data->query($sql);
	$array;
	$i = 0;
	while($info = @$data->query_array($q))
	{
		$array[$i] = $info;
		$i++;
	}
	echo json_encode($array);
} else if ($method == 'PUT') {
	$body = getBody();
    $id = intval($body['id']);
	$key;
	$value;
	foreach($body as $k=>$v) {
		if ($k != "id") {
			$key = $k;
			$value = $v;
		}
	}
	$sql = "update Shop set $key = '$value' where id = '$id'";
	$q = @$data->query($sql);
	$result = @$data->query_num($q);
	if ($result > 0) {
		$sql2 = @$data->query("select top 1 ID,ShopID,GroupID
		,TemplateID,BuyType,IsContinue,IsBind,IsVouch,Label
		,Beat,AUnit,APrice1,AValue1,APrice2,AValue2,APrice3,AValue3
		,BUnit,BPrice1,BValue1,BPrice2,BValue2,BPrice3,BValue3,CUnit,CPrice1
		,CValue1,CPrice2,CValue2,CPrice3,Sort,CValue3,IsCheap,LimitCount,StartDate
		,EndDate,ValidDate,StrengthenLevel,Compose,ShowID,Type,Name,NeedSex,CategoryID,Pic,UpdatedAt
		from V_Shop order by UpdatedAt desc");
		echo json_encode(@$data->query_array($sql2));
		return;
	}
	http_response_code(400);
} else if ($method == 'DELETE') {
	$id = $_GET['id'];
	$sql = "delete Shop where id = '$id'";
	$q = @$data->query($sql);
	$result = @$data->query_num($q);
	if ($result > 0) {
		echo json_encode(@$data->query_num($q));	
		return;
	}
	http_response_code(400);
} else {
    // Method unknown
}
function getBody (){
	 $json = file_get_contents('php://input');
	 $data = json_decode($json, true);
	return $data;
}
?>