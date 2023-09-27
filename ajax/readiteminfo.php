<?php
session_start();
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

include_once dirname(__FILE__).'/../class/class.item.php';

$id = $_GET['id'];

$key = $_GET['key'];

if(!is_numeric($id) || $id <= 0) die('Lỗi');

if(!account::isLogin()) {
	die('Chưa đăng nhập');
}

$q = sqlsrv_query($conn, "select * from Shop_Goods WHERE TemplateID = ?", array($id), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

if(sqlsrv_num_rows($q) > 0) {
	
	$itemInfo = sqlsrv_fetch_array($q, SQLSRV_FETCH_ASSOC);
	
	switch ($itemInfo['Quality'])
    {
		case 1:
		$tailQuality = "Thô";
        $colorStyle = "808080";
		break;
		
		case 2:
		$tailQuality = "Thường";
        $colorStyle = "006600";
		break;
		
		case 3:
		$tailQuality = "Ưu";
        $colorStyle = "0000FF";
		break;
		
		case 4:
		$tailQuality = "Tinh Anh";
        $colorStyle = "990099";
		break;
		
		case 5:
		$tailQuality = "Xuất Sắc";
        $colorStyle = "FF9900";
		break;
    }
	
	switch ($itemInfo['CategoryID'])
    {
		case 1:
		case 5:
		$subShowTitles0 = "Áo Giáp";
		break;
		
		case 27:
		case 7:
		$subShowTitles0 = "Sát thương";
		break;
		
		case 17:
		case 31:
		if ($itemInfo['TemplateID'] == 17003 || $itemInfo['TemplateID'] == 17004) {
			
            $subShowTitles0 = "Áo Giáp";
			
        } else {
			
			$subShowTitles0 = "Hồi phục";
			
		}
		break;
    }
	
	if ($subShowTitles0) {
		$ShowTitles0 = $subShowTitles0 . ":&nbsp;&nbsp;<span class=\"span_style205\"> " . $itemInfo['Property7'] . "</span>";
    }
	
	if ($itemInfo['Attack'] != 0) {
		$ShowAttack = "Tấn Công:&nbsp;&nbsp;<span class=\"span_style205\"> " .$itemInfo['Attack']. "</span>";
        $ShowDefence = "Phòng thủ:&nbsp;&nbsp;<span class=\"span_style205\"> " .$itemInfo['Defence']. "</span>";
        $ShowAgility = "Nhanh nhẹn:&nbsp;&nbsp;<span class=\"span_style205\"> " .$itemInfo['Agility']. "</span>";
        $ShowLuck = "May mắn:&nbsp;&nbsp; <span class=\"span_style205\"> " .$itemInfo['Luck']. "</span>";
	}
	
	$ShowDescription = $itemInfo['Description'];
    $Type = "Loại:&nbsp;&nbsp;<span class=\"style202\"> " . item_gunny::getCategoryName($itemInfo['CategoryID']) . "</span>";
    $Quality = "Phẩm chất:&nbsp;&nbsp;<span style=\"color:#" . $colorStyle . "\"> " . $tailQuality . "</span>";
	if ($itemInfo['NeedSex'] == 1) {
        $LbSex = "Giới tính:&nbsp;&nbsp;<span style=\"color:#FF0000\">Nam</span>";
    } else if ($itemInfo['NeedSex'] == 2) {
		$LbSex = "Gới tính:&nbsp;&nbsp;<span style=\"color:#006600\">Nữ</span>";
	}
	
	if ($itemInfo['CanCompose'] == true) {
        $LbCan = "Có thể hợp thành";
    }
	
    if ($itemInfo['CanStrengthen'] == true) {
		$LbCan = "Có thể cường hoá";
    }
	
	$ShowTitles = "<span style=\"color:#" . $colorStyle . "\"> " . $itemInfo['Name'] . "</span>";
	// split key
	if($key != null) {
		$keyArr = explode(".", $key);
		
		if(is_numeric($keyArr[0])) {
			$VaildDate = ($keyArr[0] == 0) ? '<span id="Lb_valid">Hiệu lực vĩnh cửu</span>' : '<span id="Lb_valid">Còn lại '.$keyArr[0].' Ngày</span>';
		}
		
		if(is_numeric($keyArr[1]) && $keyArr[1] == 1) {
			$ShowTitles .= ' <font color="red">(Khóa)</font>';
		}
	}
	
	
	
} else {
	die('Vật phẩm không tồn tại');
}
?>
<div class="style201">
    <table style="width:100%; color:#006600; " cellpadding="1" cellspacing="0">
        <tr>
            <td colspan="2" class="style202">
                <?=$ShowTitles?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="style211">
                <?=$ShowTitles0?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="style214">
                <?=$Type?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="style215">
                <?=$Quality?>
            </td>
        </tr>
        <tr>
            <td class="style212" colspan="2">
                <?=$ShowAttack?>
            </td>
        </tr>
        <tr>
            <td class="style212" colspan="2">
                <?=$ShowDefence?>
            </td>
        </tr>
        <tr>
            <td class="style212" colspan="2">
                <?=$ShowAgility?>
            </td>
        </tr>
        <tr>
            <td class="style212" colspan="2">
                <?=$ShowLuck?>
            </td>
        </tr>
        <tr>
            <td class="style213" colspan="2">
                <?=$LbSex?>
			</td>
        </tr>
        <tr>
            <td class="style213" colspan="2">
                <?=$LbCan?>
			</td>
        </tr>
        <tr>
            <td class="style207" colspan="2">
                <?=$ShowDescription?>
            </td>
        </tr>
		<tr>
            <td class="style217">
				<?=$VaildDate?>
			</td>
        </tr>
    </table>
</div>