<?php
############################# Header
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
//header('Access-Control-Allow-Origin: *');
define('Kh4nhHuy3z!99^H2S04','Fuck You',true);
#############################

############################# Role validate
$ACCEPT_ROLES = array('ADMIN');
include_once("./connect.php");
#############################

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
    $mid = ','.(str_replace('/', '', $_SERVER['PATH_INFO'])).',';
	$q4 = $data->query("SELECT DropId from [Drop_Condiction] where Para1 = '$mid'");
	$result;
	$info = @$data->query_array($q4);
	$templateID = getBody();
	$dropId = $info['DropId'];
	$data->query("Insert into [Drop_Item](DropId,ItemId,ValueDate, IsBind, Random, BeginData, EndData, IsTips, IsLogs) values('$dropId','$templateID',0,0,100000,1,1,1,1 )");
	$result = true;
	
	echo json_encode($result);
} else if ($method == 'GET'){
	$id = $_GET['mid'];
	$array;
	$i = 0;	
	if ($id != null && $id != '') {
		$q2 = @$data->query("SELECT * from [V_Drop_Item] where mid = '$id' order by Id desc");
		$j = 0;
		$array2;
		while($info2 = @$data->query_array($q2))
		{
			$array2[$j] = $info2;
			$j++;
		}
		$array[$i]['Items'] = $array2;				
	} else {
		$q = @$data->query("SELECT distinct Name, Id from [V_Missions_Drops] order by name");
		while($info = @$data->query_array($q))
		{
			$array[$i] = $info;
			//$missionId = $info['Id'];
			//$q2 = @$data->query("SELECT * from [V_Drop_Item] where mid = '$missionId' order by Id desc");
			//$j = 0;
			$array2;
			//while($info2 = @$data->query_array($q2))
			//{
			//	$array2[$j] = $info2;
			//	$j++;
			//}
			$array[$i]['Items'] = [];
			$i++;
		}
	}

	echo json_encode($array);
} else if ($method == 'PUT'){
    // Method is PUT
	$id = intval(str_replace('/', '', $_SERVER['PATH_INFO']));
	$body = getBodyUpdate();
	$column = array_key_last($body);
	$value = $body[$column];
	$s = @$data->query("Update DROP_Item set $column = '$value' where Id = '$id'");
	if (@$data->query_num($s) > 0) {
		echo json_encode('updated');
	} else {
		echo json_encode($id);
	}
} else if ($method == 'DELETE'){
	$id = intval(str_replace('/', '', $_SERVER['PATH_INFO']));
	$s = @$data->query("DELETE DROP_Item where Id = '$id'");
	if (@$data->query_num($s) > 0) {
		echo json_encode('deleted');
	} else {
		echo json_encode($id);
	}
} else {
    // Method unknown
}

function getBody (){
	 $json = file_get_contents('php://input');
	 $data = json_decode($json, true);
	 
	 $templateID = $data['templateID'];
	return $templateID;
}

function getBodyUpdate() {
	$json = file_get_contents('php://input');
	$data = json_decode($json, true);
	return $data;
}

?>