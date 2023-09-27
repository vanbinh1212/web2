<?php
define("SNAPE_VN", true);

error_reporting(E_ALL ^ E_NOTICE);

include_once dirname(__FILE__).'/#config.php';
include dirname(__FILE__).'/class/function.global.php';

$loadserver = loadallserver();
$serverList = [];

while($svInfo = sqlsrv_fetch_array($loadserver, SQLSRV_FETCH_ASSOC)) {
	$serverList[$svInfo['ServerID']] = $svInfo;

	// $connectionInfo = array("Database" => $svInfo['Database'], "UID" => $svInfo['Username'], "PWD" => $svInfo['Password'], "CharacterSet" => "UTF-8");

	// $conn_road = sqlsrv_connect($svInfo['Host'], $connectionInfo);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	//updata
	$prefix = $_POST['prefix'] ? $_POST['prefix'] : false;
	$activeID = $_POST['ActiveID'];
	$svID = $_POST['svid'];
	$amount = $_POST['amount'];
	$len = $_POST['len'] ? $_POST['len'] : 12;
	if(!is_numeric($amount) || !is_numeric($len)) {
		echo 'nhap so luong, độ dài code hop le!';
	} else
	if(isset($serverList[$svID])){
		$svInfo = $serverList[$svID];
		$connectionInfo = array("Database" => 'DDT_Player34', "UID" => $svInfo['Username'], "PWD" => $svInfo['Password'], "CharacterSet" => "UTF-8");
		$connectionInfoPlayer = array("Database" => $svInfo['Database'], "UID" => $svInfo['Username'], "PWD" => $svInfo['Password'], "CharacterSet" => "UTF-8");

		$conn_road = sqlsrv_connect($svInfo['Host'], $connectionInfo);
		$conn_player = sqlsrv_connect($svInfo['Host'], $connectionInfoPlayer);
		if($conn_road) {//have connection
			$loadInfoActiveID = sqlsrv_query($conn_road, "Select ActiveID from dbo.Active where ActiveID = ?", array($activeID), array( "Scrollable" => SQLSRV_CURSOR_KEYSET)) or die( print_r( sqlsrv_errors(), true));
			if(sqlsrv_num_rows($loadInfoActiveID) > 0) {
				for($i = 1; $i <= intval($amount); $i++){
					
					$strRnd = generateRandomString($len);
					$strRnd = $prefix ? $prefix.'-'.$strRnd : $strRnd;
					echo ''.$strRnd.'<br/>';
					sqlsrv_query($conn_player, "INSERT INTO [dbo].[Active_Number]
					   ([AwardID]
					   ,[ActiveID]
					   ,[PullDown]
					   ,[GetDate]
					   ,[UserID]
					   ,[Mark])
				 VALUES
					   (?
					   ,?
					   ,0
					   ,getdate()
					   ,0
					   ,0)", array($strRnd, $activeID), array( "Scrollable" => SQLSRV_CURSOR_KEYSET)) or die( print_r( sqlsrv_errors(), true));
				}
				echo 'ok';
			} else {
				echo 'active id ko hop le activeID : '.$activeID;
			}
		} else {
			echo 'ko ket noi duoc toi road'.json_encode($svInfo);
		}
	} else {
		echo 'chon sv ko hop le';
	}
}
// var_dump($serverList);

?>

		<form action="" method="post" role="form text-left">
			<br>
			<select class="form-control" name="svid" placeholder="svid">
			<?php 
				foreach($serverList as $svInfo) {
					echo '<option class="form-control" value="'.$svInfo['ServerID'].'">'.$svInfo['ServerName'].'</option>';
				}
			?>
			</select>
			<br>
			<!-- <input class="form-control" name="ActiveID" placeholder="ActiveID"/> -->
			<select class="form-control" name="ActiveID" placeholder="ActiveID">
				<option class="form-control" value="90">Code Fanpage</option>
				<option class="form-control" value="50">Code Fan Cứng</option>
			</select>
			<br>
			<input class="form-control" name="amount" placeholder="số lượng code"/>
			<br>
			<input class="form-control" name="len" placeholder="độ dài code. default: 12"/>
			<br>
			<button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">OK</button>
		</form>