<?php
	$napCard5s = array(
		'status' => 'success',
		'mesage' => 'Nạp thành công',
		'message' => 'Nạp thành công',
		'status_code' => 1000,
		'amount' => 50000,
		'amount_after' => 50000,
		'access_token' => 'jGZoDqHuSMQr1yPw6qPQoVyRuNW6OMgr',
		'transaction_id' => '1234567'
	);
	
	$napCard5s = json_encode($napCard5s);
	
	$x = json_decode($napCard5s);
	
	echo json_encode(napcard5s('100050418112323', '100050418112323', 50000, 2, '123', '1'));
	
	function napcard5s($pin,$serial,$amount, $cardType, $user, $svID){
		$url = "https://doicard5s.com/api/common";
		$access_token = "x93T0RIefgQhBUzLyTKPE3bUVm0xdGk2";
		
		$handle = curl_init($url);
		$data = [
			'access_token' => $access_token,
			'code' => $pin,
			'seri' => $serial,
			'money' => $amount,
			'typeCard' => $cardType,
			'transaction' => $user . '-' . $svID . '-' . time()
		];

		$encodedData = json_encode($data);

		curl_setopt($handle, CURLOPT_POST, 1);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $encodedData);
		curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_TIMEOUT, 300); 
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($handle);
		curl_close($handle);

		$obj = json_decode($result);

		return $obj;
	}

?>