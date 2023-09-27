<?php
session_start();
define("SNAPE_VN", true);

if(!$_SERVER['REQUEST_METHOD'] === 'POST') die();

include_once dirname(__FILE__).'/../#config.php';

include_once dirname(__FILE__).'/../class/class.account.php';

include_once dirname(__FILE__).'/../class/function.global.php';

include_once dirname(__FILE__).'/../class/class.item.php';

$page = $_POST['page'];

$type = $_POST['type'];

$itemOnPage = $_config['function']['ws_per_page'];



if(!account::isLogin()) {
	die('Chưa đăng nhập');
}

if(!is_numeric($page) || $page <= 0 || $page > 999999 || !is_numeric($type)) {
	die("Lỗi dữ liệu.");
}

$whereSql = '';

$orderSql = 'Webshop_Items.ID DESC';

switch($type) {
	
	case 0: // moi nhat
	$orderSql = 'Webshop_Items.ID DESC';
	break;
	
	case -1: // mua nhieu
	$orderSql = 'Webshop_Items.CountBuy DESC';
	break;
	
	case -2: // he thong ban
	$whereSql = 'AND Webshop_Items.UserID = 0';
	break;
	
	case -3: // nguoi choi ban
	$whereSql = 'AND Webshop_Items.UserID != 0';
	break;
	
	default:
	if(is_numeric($type) && $type > 0) {
		$whereSql = 'AND Shop_Goods.CategoryID = '.$type;
	}
	break;
}

$q = sqlsrv_query($conn, "Select Top($itemOnPage) *, RowID , TotalRows from
									(
									Select
									RowID=ROW_NUMBER() OVER (ORDER BY $orderSql),
									Webshop_Items.*, Shop_Goods.Name, Shop_Goods.NeedSex, Shop_Goods.CategoryID, Shop_Goods.Pic,
									TotalRows=Count(*) OVER()
									from Webshop_Items, Shop_Goods where Webshop_Items.TemplateID = Shop_Goods.TemplateID $whereSql
									) A
									Where A.RowId > (($page-1)*$itemOnPage)
						", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));

$return = array();

$return['list'] = array();

if(!$q) print_r(sqlsrv_errors());


if(sqlsrv_num_rows($q) > 0) {
	$i = 0;
	
	while($wsInfo = sqlsrv_fetch_array($q, SQLSRV_FETCH_ASSOC)) {

		//$return['list'][$i] = $newsInfo;
		$return['list'][$i]['ID'] = $wsInfo['ID'];
		$return['list'][$i]['Name'] = $wsInfo['Name'];
		$return['list'][$i]['Seller'] = (($wsInfo['UserID'] == 0) ? "<font color='red'>Hệ thống</font>" : "<font color='blue'>".account::getFullname($wsInfo['UserID'])."</font>");
		$return['list'][$i]['ServerName'] = ($wsInfo['ServerID'] == 0) ? "Toàn bộ" : getServerName($wsInfo['ServerID']);
		$return['list'][$i]['TemplateID'] = $wsInfo['TemplateID'];
		$return['list'][$i]['Count'] = $wsInfo['Count'];
		$return['list'][$i]['Price'] = $wsInfo['Price'];
		$return['list'][$i]['VaildDate'] = $wsInfo['VaildDate'];
		$return['list'][$i]['IsBind'] = $wsInfo['IsBind'];
		$return['list'][$i]['MultiBuy'] = $wsInfo['MultiBuy'];
		$return['list'][$i]['Picture'] = $_config['function']['url_resource'].'/'.item_gunny::getImage($wsInfo['NeedSex'], $wsInfo['CategoryID'], $wsInfo['Pic']);
		
		$return['list'][$i]['DataCart'] = $wsInfo['ID'].','.$return['list'][$i]['Seller'].','.$wsInfo['TemplateID'].','.$wsInfo['Count'].','.$return['list'][$i]['Price'].','.$return['list'][$i]['VaildDate'].','.$return['list'][$i]['IsBind'].','.$return['list'][$i]['MultiBuy'].','.$return['list'][$i]['Picture'].','.$wsInfo['UserID'].','.$return['list'][$i]['ServerName'];

		if(!$totalitem)
			$totalitem = $wsInfo['TotalRows'];
		$i++;
		
		
	}

	if($totalitem) {
		$return['totalpage'] = ceil($totalitem / $i);
		$return['totalitem'] = $totalitem;
		$return['itemOnPage'] = $i;
	}
}

echo json_encode($return);

sqlsrv_free_stmt($q);
sqlsrv_close($conn);
?>