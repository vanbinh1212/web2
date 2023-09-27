<?php

/**
* Author : https://www.roytuts.com
*/
$ROLES_FROM_REQUEST = 'Anonymous';

include_once('jwt_utils.php');

$bearer_token  = get_bearer_token();
$database_id = get_database_id();

$is_jwt_valid = is_jwt_valid($bearer_token, $ROLES_FROM_REQUEST);

if($is_jwt_valid) {
	if (!in_array($ROLES_FROM_REQUEST, $ACCEPT_ROLES)) {
		header('Content-Type: application/json');
		http_response_code(403);
		echo json_encode(['error'=>'403 Forbiden, Access denied']);
		exit();
	}
}
?>
