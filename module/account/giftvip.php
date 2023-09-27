<?php
	session_start();
	
	define("SNAPE_VN", true);
	include_once(dirname(__FILE__)."/../#config.php");

	include_once(dirname(__FILE__)."/../class/class.account.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	$userid = $_SESSION['ss_user_id'];
	
	
	if($_POST)  {
	if($userid) {
		
		$userInfo = account::getUserInfo(trim($userid));
	$userInfoVIP = account::getUserInfoLogVIP(trim($userid));
	$userLevelVIP = account::getUserInfoLogLevelVIP(trim($userInfo['VIPLevel']), trim($userid));
	if($userInfoVIP == 0) {
		
			}		
		if($userLevelVIP == 0) {

			
			// get userid							

				switch($userInfo['VIPLevel']) {
					case 0:
					//account::addItemBag($userid, 0, 11024 , 100, true, 0, true); // 
					//account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 1:
					account::addItemBag($userid, 0, 11024 , 100, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 2:
					account::addItemBag($userid, 0, 11024 , 100, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 3:
					account::addItemBag($userid, 0, 11024 , 200, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 4:
					account::addItemBag($userid, 0, 11024 , 300, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 5:
					account::addItemBag($userid, 0, 11024 , 400, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 6:
					account::addItemBag($userid, 0, 11024 , 500, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 7:
					account::addItemBag($userid, 0, 11024 , 300, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 8:
					account::addItemBag($userid, 0, 11024 , 400, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
					case 9:
					account::addItemBag($userid, 0, 11024 , 500, true, 0, true); // 
					account::log($userid, 'VIP', 2, 'Bạn nhận được quà CẤP VIP '.$userInfo['VIPLevel'].' từ Hệ Thống', 0);
					account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel']);
					break;
				
				}
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhận Quà <b><font color=red> VIP '.$userInfo['VIPLevel'].'</font></b>  thành công vui lòng kiểm tra Túi Web", [])</script>';

				$userInfo['VIPLevel'];
				
			
			}		
				else {
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhận <b><font color=red>Quà VIP '.$userInfo['VIPLevel'].'</font></b> rồi. Vui lòng tăng cấp VIP để nhận thêm !  ", [])</script>';
			}
		
	
	}
	}
	
	
?>
<div style="padding:5px !important;">
 

  <!-- Tab panes -->
  <div class="tab-content">
 </div>
  
	      <div id="tile" class="alert alert-info">
					<div id="namebox" class="panel-heading">TỈ LỆ EXP CẤP VIP</div>
					
   <div id="quanap" class="alert alert-warning" style="width:100%">

			 <p class="text-danger">Exp VIP tương ứng với Số tiền bạn đã nạp ( 1 VNĐ = 1 EXP ) </a> </p>
</div>

  <table border=1 class="table table-striped" style="width:100%">
							<thead>
			 	  <tr>
				<th>CẤP</th>
				<th>EXP</th>	
				<th>Số Coins được nhận thêm</th>	
				
			  </tr>
			</thead>
			<tbody>
						<tr>
						<td><img src="http://gunnyae.com/images/vip/0.png"></th>
						<td><span class="label" style="background-color:#4bd396">0</span></td>
						<td><span class="label" style="background-color:#4bd396">0</span></td>
						</tr>
						<tr>
						<td><img src="http://gunnyae.com/images/vip/1.png"></th>
						<td><span class="label" style="background-color:#4bd396">200.000</span></td>
						<td><span class="label" style="background-color:#4bd396">20.000 Coins</span></td>
						</tr>
							<tr>
						<td><img src="http://gunnyae.com/images/vip/2.png"></th>
						<td><span class="label" style="background-color:#4bd396">500.000</span></td>
						<td><span class="label" style="background-color:#4bd396">50.000 Coins</span></td>
						</tr>
						<tr>
						<td><img src="http://gunnyae.com/images/vip/3.png"></th>
						<td><span class="label" style="background-color:#4bd396">1.000.000</span></td>
						<td><span class="label" style="background-color:#4bd396">100.000 Coins</span></td>
						</tr>
						<tr>
						<td><img src="http://gunnyae.com/images/vip/4.png"></th>
						<td><span class="label" style="background-color:#4bd396">2.000.000</span></td>
						<td><span class="label" style="background-color:#4bd396">200.000 Coins</span></td>
						</td></tr>
						<tr>
						<td><img src="http://gunnyae.com/images/vip/5.png"></td>
						<td><span class="label" style="background-color:#4bd396">4.500.000</span></td>
						<td><span class="label" style="background-color:#4bd396">450.000 Coins</span></td>
						</td></tr>	
						<td><img src="http://gunnyae.com/images/vip/6.png"></td>
						<td><span class="label" style="background-color:#4bd396">6.000.000</span></td>
						<td><span class="label" style="background-color:#4bd396">600.000 Coins</span></td>
						</td></tr>						
						<td><img src="http://gunnyae.com/images/vip/7.png"></td>
						<td><span class="label" style="background-color:#f9c851">10.000.000</span></td>
						<td><span class="label" style="background-color:#4bd396">1.000.000 Coins</span></td>
						</td></tr>	
						<td><img src="http://gunnyae.com/images/vip/8.png"></td>
						<td><span class="label" style="background-color:#f9c851">20.000.000</span></td>
							<td><span class="label" style="background-color:#4bd396">2.000.000 Coins</span></td>
						</td></tr>	
						<td><img src="http://gunnyae.com/images/vip/9.png"></td>
						<td><span class="label" style="background-color:#f9c851">50.000.000</span></td>
						<td><span class="label" style="background-color:#4bd396">5.000.000 Coins</span></td>
						</td></tr>	
			</tbody>
							</table>
    
    </div>
	</div>
  <div id="menu4" class="container tab-pane fade"><br>
   <div id="quanap" class="alert alert-warning" style="width:60%">

			 <p class="text-danger">Exp VIP tương ứng với Số tiền bạn đã nạp ( 1 VNĐ = 1 EXP ) </a> </p>
</div>

  