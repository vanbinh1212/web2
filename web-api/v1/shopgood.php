
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
} else if ($method == 'GET'){	
	$search = trim(mb_convert_encoding($_GET['search'],'HTML-ENTITIES','utf-8'));
	$search = (html_entity_decode($search, ENT_HTML401, 'UTF-8'));
	if ($search == '') return;
	$sql = "SELECT Top 10 Name, TemplateID, Pic, NeedSex,CategoryID,Description  from [Shop_goods] where name like N'%$search%' or templateid like '$search' order by name desc";
    $q = @$data->query($sql);
	$array;
	$i = 0;
	while($info = @$data->query_array($q))
	{
		$array[$i] = $info;
		$i++;
	}
	echo json_encode($array);
} else if ($method == 'PUT'){
    // Method is PUT
} else if ($method == 'DELETE'){

} else {
    // Method unknown
}

?>