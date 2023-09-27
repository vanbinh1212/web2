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
	$query = getBody()['query'];	
	$table = getBody()['table'];
	$q = @$data->query($query);
	$sql = @$data->query("SELECT tc.TABLE_NAME ,kcu.COLUMN_NAME as PK FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS tc INNER JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS kcu ON kcu.CONSTRAINT_NAME = tc.CONSTRAINT_NAME
		WHERE tc.CONSTRAINT_TYPE = 'PRIMARY KEY'
		AND tc.TABLE_NAME = '$table'");
	$pk = @$data->query_array($sql)['PK'];
	$value = getBody()['value'];
	if ($value != null) {
		$q = @$data->query("select * from $table where $pk = $value");
	} else if ($pk != null) {
		if (startsWith(strtolower($query), 'select')) {
			$q = @$data->query("$query order by $pk desc");
		} else {
			$q = @$data->query("select top 100 * from $table order by $pk desc");
		}
	} else {
		//$q = @$data->query("select * from $table");
	}	
	$q2 = @$data->query("select count(*) total from $table");
	$i = 0;
	while($info = @$data->query_array($q)) {
		$result['data'][$i] = $info;			
		$i++;
	}
	$result['columns'] = array_keys($result['data'][0]);
	$result['primaryKey'] = $pk;
	$result['total'] = @$data->query_array($q2)['total'];
	echo json_encode($result);

} else if ($method == 'GET'){	
	$sql = @$data->query("SELECT
     tc.TABLE_NAME as 'table'
    ,kcu.COLUMN_NAME as primaryKey
	FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS tc

	INNER JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS kcu
		ON kcu.CONSTRAINT_NAME = tc.CONSTRAINT_NAME

	WHERE tc.CONSTRAINT_TYPE = 'PRIMARY KEY' order by tc.TABLE_NAME");
	$i = 0;
	while($info = @$data->query_array($sql)) {
		$result['data'][$i] = $info;			
		$i++;
	}
	echo json_encode($result);
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

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (strtolower(substr($string, 0, $len)) === $startString);
}
  

/* query lay ra primary key

select sc.name from sys.objects as so
inner join sys.indexes as si        on so.object_id = si.object_id 
                                    and si.is_primary_key = 1
inner join sys.index_columns as ic  on si.object_id = ic.object_id
                                    and si.index_id = ic.index_id
inner join sys.columns as sc            on so.object_id = sc.object_id
                                    and ic.column_id = sc.column_id
where so.object_id = object_id('new_title')
*/
?>

