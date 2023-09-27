<?php

require_once 'jwt_utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	http_response_code(200);
	exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// get posted data
	$data = json_decode(file_get_contents("php://input", true));

	if ($data->username == 'admin' && $data->password == '123456') {
      $headers = array('alg'=>'HS256','typ'=>'JWT');
      $payload = array('username'=>$data->username, 'role' => 'ADMIN', 'exps'=>(time() + $max_age));

      $jwt = generate_jwt($headers, $payload);
	  
	  header('X-Authenticate: Negotiate');
	  http_response_code(200);
      echo json_encode(array('token' => $jwt));
	  exit();
    }
	if ($data->username == 'moder' && $data->password == '123456') {
      $headers = array('alg'=>'HS256','typ'=>'JWT');
      $payload = array('username'=>$data->username, 'role' => 'MODER', 'exps'=>(time() + $max_age));

      $jwt = generate_jwt($headers, $payload);
	  
	  header('X-Authenticate: Negotiate');
	  http_response_code(200);
      echo json_encode(array('token' => $jwt));
	  exit();
    }
	http_response_code(404);
    echo json_encode(array('msg' => 'error'));
	exit();
}
    http_response_code(200);
    echo json_encode(array('msg' => 'error'));
	exit();
?>