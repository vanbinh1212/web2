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

if (!isset($_SESSION)) {
    session_start();
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
	$body 		   = getBody();
	$TemplateID	   = intval($body['TemplateID']);
	$Name 	       = $body['Name'];
	$Remark 	   = $body['Remark'];
	$CategoryID    = intval($body['CategoryID']);
	$Description   = $body['Description'];
	$Attack        = intval($body['Attack']);
	$Defence       = intval($body['Defence']);
	$Agility       = intval($body['Agility']);
	$Luck 		   = intval($body['Luck']);
	$Level 		   = intval($body['Level']);
	$Quality	   = intval($body['Quality']);
	$Pic           = $body['Pic'];
	$MaxCount      = intval($body['MaxCount']);
	$NeedSex       = intval($body['NeedSex']);
	$NeedLevel 	   = intval($body['NeedLevel']);
	$CanStrengthen = $body['CanStrengthen'] == 'true' ? 1 : 0;
	$CanCompose    = $body['CanCompose'] == 'true' ? 1 : 0;
	$CanDrop       = $body['CanDrop'] == 'true' ? 1 : 0;
	$CanEquip      = $body['CanEquip'] == 'true' ? 1 : 0;
	$CanUse        = $body['CanUse'] == 'true' ? 1 : 0;
	$CanDelete     = $body['CanDelete'] == 'true' ? 1 : 0;
	$Script    	   = $body['Script'];
	$DataV 	       = $body['Data'];
	$Colors        = $body['Colors'];
	$Property1     = intval($body['Property1']);
	$Property2	   = intval($body['Property2']);
	$Property3	   = intval($body['Property3']);
	$Property4	   = intval($body['Property4']);
	$Property5	   = intval($body['Property5']);
	$Property6	   = intval($body['Property6']);
	$Property7	   = intval($body['Property7']);
	$Property8	   = intval($body['Property8']);
	//$Valid = $body['Valid'];
	//$Count = $body['Count'];
	$AddTime 	    = $body['AddTime'];
	$BindType       = intval($body['BindType']);
	$FusionType     = intval($body['FusionType']);
	$FusionRate     = intval($body['FusionRate']);
	$FusionNeedRate = intval($body['FusionNeedRate']);
	$Hole			= $body['Hole'];
	$RefineryLevel  = intval($body['RefineryLevel']);
	$ReclaimValue   = intval($body['ReclaimValue']);
	$ReclaimType    = intval($body['ReclaimType']);
	$CanRecycle     = intval($body['CanRecycle']);
	$FloorPrice	    = intval($body['FloorPrice']);
	$SuitId         = intval($body['SuitId']);
	$CanTransfer    = intval($body['CanTransfer']);

	$exec = @$data->query("insert into [Shop_Goods]([TemplateID],[Name],[Remark],[CategoryID],[Description],[Attack],[Defence],[Agility],[Luck],[Level],[Quality],[Pic],[MaxCount],[NeedSex],[NeedLevel],[CanStrengthen],[CanCompose],[CanDrop],[CanEquip],[CanUse],[CanDelete],[Script],[Data],[Colors],[Property1],[Property2],[Property3],[Property4],[Property5],[Property6],[Property7],[Property8],[Valid],[Count],[AddTime],[BindType],[FusionType],[FusionRate],[FusionNeedRate],[Hole],[RefineryLevel],[ReclaimValue],[ReclaimType],[CanRecycle],[FloorPrice],[SuitId],[CanTransfer])
	values ('$TemplateID', '$Name', '$Remark', $CategoryID, '$Description', '$Attack', '$Defence', '$Agility', '$Luck', '$Level', '$Quality', '$Pic', '$MaxCount', '$NeedSex', '$NeedLevel', '$CanStrengthen', '$CanCompose', '$CanDrop', '$CanEquip', '$CanUse', '$CanDelete', '$Script', '$DataV', '$Colors', '$Property1', '$Property2', '$Property3', '$Property4', '$Property5', '$Property6', '$Property7', '$Property8', 0, 0, '$AddTime', '$BindType', '$FusionType', '$FusionRate', '$FusionNeedRate', '$Hole', '$RefineryLevel', '$ReclaimValue', '$ReclaimType', '$CanRecycle', '$FloorPrice', '$SuitId', '$CanTransfer')");
	if (@$data->query_num($exec) > 0) {
		echo json_encode('ok');
	} else {
		http_response_code(400);
	}	
	
} else if ($method == 'GET') {
	///system("cmd /c C:\\inetpub\\wwwroot-new\\tess.bat &");

	// $address="103.161.180.8";
	// $port="7022";
	// $cmd= $_GET['cmd'];
	// if ($cmd != null) {
		// $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Cannot create a socket");
		// socket_connect($sock,$address,$port) or die("Could not connect to the socket");
		// socket_write($sock,$cmd);
		// socket_close($sock);
		// return;
	// }

	$id = $_GET['id'];
	if ($id == null || $id == "") {
		$id = 1;
	}

	downloadFile("http://quest43.gn.zing.vn/templatealllist.xml", "../xml/templatealllist.xml");
	
	$xmlfile = fopen("../xml/templatealllist.xml",'rb');
	$compressedXml = fread($xmlfile, filesize("../xml/templatealllist.xml"));
	fclose($xmlfile);
	$uncompressedXml = zlib_decode($compressedXml); 
	//file_put_contents("./xml/templatealllist_de.xml", $uncompressedXml);
	//$xml = simplexml_load_string($uncompressedXml, "SimpleXMLElement" ,LIBXML_NOCDATA);

	//$json = json_encode($xml);
	//$arr = "70";
	$xml = new SimpleXMLElement($uncompressedXml);
	
	$res = $xml->ItemTemplate->xpath("//Item[@CategoryID='$id']");
	$q = @$data->query("SELECT TemplateID from [Shop_Goods] where categoryId = '$id'");
	$i = 0;
	$arr;
	while($info = @$data->query_array($q)) {
		$arr[$i] = $info['TemplateID'];
		$i++;
	}
	$res['ids'] = $arr;
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