<?php
if(!defined('Kh4nhHuy3z!99^H2S04')) die('Fuck You');
include_once('jwt/request.php');
# Khai bao thong tin ket noi
$config['dbhostdata'] = 'WIN-L1SSEEUPNP6';					# Server name cua mssql

$config['dbuserdata'] = 'sa';							# User name cua mssql ( mac dinh la sa )

$config['dbpassdata'] = '@admin12211993';					# Pass cua mssql ( pass cua sa )


$config['dbdatatank'] = 'Project_Game34';					# Db chua du lieu ( mac dinh la Db_Tank_New )


$connectionInfo = array("Database" => $config['dbdatatank'], "UID" => $config['dbuserdata'], "PWD" => $config['dbpassdata'], "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($config['dbhostdata'], $connectionInfo);
# Include class webshopv3
include_once 'include/global.php';
# Khoi tao class ket noi mssql
$data = new webshopv3($config);
?>