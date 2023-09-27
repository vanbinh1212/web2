<?php
if(!defined('Gun4S.Net')) die('Fuck You');
#connect_function
$conn = sqlsrv_connect(HOST_DB, array("Database"=>MEM_DB,"UID"=>USER_DB,"PWD"=>PASS_DB,"CharacterSet" => "UTF-8"))or die("Can Not Connect To Database");//Khong Duoc Sua
?>