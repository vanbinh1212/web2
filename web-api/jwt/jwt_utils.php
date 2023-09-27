<?php
$max_age = 84600;
//header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
//header("Cache-Control: max-age=$max_age");
header("Access-Control-Max-Age: $max_age");

function generate_jwt($headers, $payload, $secret = '-Kh4zhhuy3z!99^') {
	$headers_encoded = base64url_encode(json_encode($headers));
	
	$payload_encoded = base64url_encode(json_encode($payload));
	
	$signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
	$signature_encoded = base64url_encode($signature);
	
	$jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
	
	return $jwt;
}

function is_jwt_valid($jwt, &$ROLES_FROM_REQUEST, $secret = '-Kh4zhhuy3z!99^') {
	// split the jwt
	$tokenParts = explode('.', $jwt);
	$header 	= base64_decode($tokenParts[0]);
	$payload 	= base64_decode($tokenParts[1]);

	$signature_provided = $tokenParts[2];

	$json = json_decode(trim($payload));
	$exps = (((array)$json)["exps"]);
	
	$ROLES_FROM_REQUEST = (((array)$json)["role"]);

	$is_token_expired = (intval($exps) - intval(time())) <= 0;

	// build a signature based on the header and payload using the secret
	$base64_url_header = base64url_encode($header);
	$base64_url_payload = base64url_encode($payload);
	$signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
	$base64_url_signature = base64url_encode($signature);

	// verify it matches the signature provided in the jwt
	$is_signature_valid = ($base64_url_signature == $signature_provided);

	if (($is_token_expired) || !$is_signature_valid) {
		header('Content-Type: application/json');
		http_response_code(401);
		echo json_encode(['error'=>'This is an error']);
		exit();
	} else {
		http_response_code(200);
		return TRUE;
	}
}

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function get_authorization_header(){
	$headers = null;
	if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
		http_response_code(200);
		exit();
	}
	if (isset($_SERVER['Authorization'])) {
		$headers = trim($_SERVER["Authorization"]);
	} else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
		$headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
	} else if (function_exists('apache_request_headers')) {
		$requestHeaders = apache_request_headers();
		// Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
		$requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
		//print_r($requestHeaders);
		if (isset($requestHeaders['Authorization'])) {
			$headers = trim($requestHeaders['Authorization']);
		}
	}
	
	return $headers;
}

function get_bearer_token() {
    $headers = get_authorization_header();
	
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}

function get_database_header(){
	$headers = null;
	if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
		http_response_code(200);
		exit();
	}
	if (isset($_SERVER['Gunny'])) {
		$headers = trim($_SERVER["Gunny"]);
	} else if (isset($_SERVER['HTTP_GUNNY'])) { //Nginx or fast CGI
		$headers = trim($_SERVER["HTTP_GUNNY"]);
	} else if (function_exists('apache_request_headers')) {
		$requestHeaders = apache_request_headers();
		$requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
		if (isset($requestHeaders['Gunny'])) {
			$headers = trim($requestHeaders['Gunny']);
		}
	}
	
	return $headers;
}

function get_database_id() {
    $headers = get_database_header();
	
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Database\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}