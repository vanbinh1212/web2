<?php
if(!defined('Gun4S.Net')) die('Fuck You');
#function
$conn = sqlsrv_connect(HOST_DB, array("Database"=>MEM_DB,"UID"=>USER_DB,"PWD"=>PASS_DB,"CharacterSet" => "UTF-8"))or die("Can Not Connect To Database :".MEM_DB);//Khong Duoc Sua
function chuyentrang($url){
	echo '<script>document.location="'.$url.'"</script>';
	die();
}
function chuyentrangtop($url){
	echo '<script>window.top.location.href="'.$url.'"</script>';
	die();
}
function alert($text){
	echo '<script>alert("'.$text.'")</script>';

}
function loaduser($user){
global $conn;
$dataImport = array($user);
$check_info = sqlsrv_query($conn, "select UserID,IsBan,Money from Mem_Account WHERE Email = ?" , $dataImport, array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
if(sqlsrv_num_rows($check_info) > 0) {
		//isreg
		$userInfo = sqlsrv_fetch_array($check_info, SQLSRV_FETCH_ASSOC);
return $userInfo;
}
}
?>