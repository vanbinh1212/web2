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

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'PUT')
{
	$id 	= intval(getJsonRaw()['id']);	  #ID của shop
	$newID 	= intval(getJsonRaw()['NewID']);  #ID mới sau khi thay đổi, ví dụ thay đổi bán từ shop guild sang shop xu thì thay đổi ID
	$ShowID = getJsonRaw()['ShowID'];		  #ID của ShopGoodsShowList
	$Type   = getJsonRaw()['Type'];			  #Type: bày bán trong shop nào ví dụ type = 50 thì bán trong shop guild lv1
	$ShopID = getJsonRaw()['ShopID'];		  #ShopID: Ví dụ ShopID = 1 là shop xu, 11: Shop Guild level1	
	
	#--- [Cập nhật lại ID mới cho bảng Shop] ----
	#Kiểm tra xem newID đã tồn tại trong shop chưa
	$check = @$data->query("select * from V_Shop where ID = $newID");
	#Nếu đã tồn tại
	if (@$data->query_num($check) > 0)
	{
		$checkData = @$data->query_array($check);
		#Nếu đã tồn tại và trùng kiểu bán
		if (intval($checkData["Type"]) == intval($Type)) 
		{
			http_response_code(400);
			exit(json_encode("Vật phẩm đã tồn tại trong shop"));
		}
		else 
		{
			$Type = intval($Type);
			#Nếu chưa bày bán thì insert
			if ($ShowID == null)
			{
				@$data->query("insert into ShopGoodsShowList(ShopID, Type) values ('$newID','$Type')");	
			}
		    else 
			{
				#Nếu đã bày bán và không muốn bán nữa thì xóa
				if (intval($Type) == -999)
				{
					@$data->query("delete ShopGoodsShowList where TempID = '$ShowID'");
				}	
				#Cập nhật lại chỗ bán
				else 
				{
					@$data->query("update ShopGoodsShowList set [Type] = '$Type', ShopID = '$newID' where TempID = '$ShowID'");	
				}								
			}
		}
	}
	#Nếu là vật phẩm vừa thêm mới thì thêm vào bảng Shop good show list
	else 
	{
		$Type = intval($Type);
		if ($ShowID == null && $Type != -999)
		{
			@$data->query("insert into ShopGoodsShowList(ShopID, Type) values ('$newID','$Type')");	
		}
	}

	#Cập nhật lại ID mới theo SHOPID ví dụ SHOPID = 1 và templateID = 11906 thành 1190601
	if (intval($Type) != -999)
	{
		$updateShopNewID = "update Shop set id = '$newID', ShopID = '$ShopID' where id = '$id'";
		$updated 		 = @$data->query($updateShopNewID);
		if (!$updated)
		{
			http_response_code(400);
			exit(json_encode("Có lỗi sảy ra trong quá trình update new id bảng Shop"));
		}
	}	
	
	
	#Nếu bỏ bán khỏi shop, giữ nguyên id gốc và select lại theo id cũ
	if (intval($Type) == -999) 
	{
		$sql2 = @$data->query("select * from V_Shop where id = '$id'");
	}
	#Nếu thay đổi bán trong shop khác thì select theo id mới
	else
	{
		$sql2 = @$data->query("select * from V_Shop where id = '$newID' and Type = '$Type'");
	}		
	exit(json_encode(@$data->query_array($sql2)));
}

function getJsonRaw(){
	$json = file_get_contents('php://input');
	$data = json_decode($json, true);
	return $data;
}
?>