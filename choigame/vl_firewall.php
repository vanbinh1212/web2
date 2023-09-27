<?php
//Life begins. Question is, how to make it worthliving.
session_start();

//It should know what mistakes it makes and learns from them
error_reporting(E_ERROR | E_PARSE);

//To defined itself as somebody.
define('NO_REGISTER_GLOBALS', 1);
define('THIS_SCRIPT', 'firewall');

//We need what we need so let's need them
require_once('vl_firewall_trangchu.php');
require_once('vl_firewall_config.php');

//It takes patience..	
//I don't think search engines use cookie
function check_cookie(){
    if (setcookie("test", "test", time() + 360))
    {
        if (isset ($_COOKIE['test']))
        {
            return true;
        }
    }
return false;
}

$destination_ready = $_GET['vl_firewall_redirect'];

//2nd-Layer Protection
		if($config['vl_firewall_2nd_layer'] == 1){		

		if($_SESSION['vl_firewall_penalty_count'] > $config['vl_firewall_penalty_allow']){
			if($_SESSION['vl_firewall_wait_time'] > time() - $config['vl_firewall_wait_time'])
			{
			$seconds = $config['vl_firewall_wait_time'] - (time() - $_SESSION['vl_firewall_wait_time']);
			
			if($seconds < 2){$_SESSION['vl_firewall_penalty_count'] = 0; unset($_SESSION['shfirewall']);}
			
			echo "<center><b style='color:red'>Khong Truy Cap Trang Web Qua Nhanh! Vui Long Cho Trong Giay Lat!</b></center>";
			exit;
			}
		}
		
		if((time() - $_SESSION['vl_firewall_last_request_timestamp']) < 1 ){			
			$_SESSION['vl_firewall_penalty_count'] = $_SESSION['vl_firewall_penalty_count'] + 1;
			$_SESSION['vl_firewall_wait_time'] = time();
		}
		
		if((time() - $_SESSION['vl_firewall_last_request_timestamp']) > 2 ){
			$_SESSION['vl_firewall_penalty_count'] = 0;			
		}
							
		$_SESSION['vl_firewall_last_request_timestamp'] = time();
		}

//Search Engines do not need to see the firewall	
	$agent_mode = 0;
	
	$get_user_agent = $_SERVER['HTTP_USER_AGENT'];
	if(empty($get_user_agent)){
		$get_user_agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
	}
		
foreach ($UserAgent as $Agent)
{
	if(strstr($get_user_agent ,$Agent) and check_cookie() == false) 
	{
		$agent_mode++;
	}

}
//Search Engines do not need to see the firewall
	
if($agent_mode == 0)
{
	if (empty($_SESSION['shfirewall']))
	{
		if (!empty($destination_ready) and !empty($_SESSION['temp']))
		{
			$Domain_Allowed = 0;
			foreach ($Forum_domain as $Domain)
			{
					if(strpos($_SERVER['HTTP_REFERER'], $Domain) !== false)
					{
					$Domain_Allowed++;									
					}
			}

			
				
			if($destination_ready < 1)
			{
				$_SESSION['shfirewall'] = 'ready';
						
				header("location: ".$destination_ready);	
			}else{
				echo 'Sorry, Connection from your IP Address is not allowed!';
				exit;
			}
						
		}else{		
				echo $Layout.$copyrights_notice;
				$_SESSION['temp'] = 1;
				exit;
		}
		
	}
}
?>