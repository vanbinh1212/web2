<?php
	session_start();
	
	define("SNAPE_VN", true);
	include_once(dirname(__FILE__)."/../#config.php");

	include_once(dirname(__FILE__)."/../class/class.account.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	$userid = $_SESSION['ss_user_id'];
	$codevip = "";
	$serverid = trim($_POST['txtServer']);
	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for($i = 0; $i < 15; $i++)
  {
      $random_int = mt_rand();
      $codevip .= $charset[$random_int % strlen($charset)];
	}
	if($serverid <= 0) {
	$return['type'] = 154;
	$return['content'] = 'Error verify params.';
}
	if($_POST)  {
			$conn_sv = connectTank($serverid);
		$serverInfo = loadserver($serverid);
			$playerInfo = $account->getPlayerInfo($userInfo['Email']);
		if($playerInfo['State'] == 1 || $userInfo['Money'] < 0 ) {
							echo '<script>SnapeClass.openModal("Thông báo", "Tài khoản chưa thoát Game hoặc không đủ 10k Coin !", [])</script>';
				break;
	}else
		
	

	
			
			// get userid							

				account::Deleteketguild($userInfo['Email'], $serverid);
				//account::logvip($userid, $userInfo['Email'], $userInfo['VIPLevel'], $codevip);
				account::removeCoin($userid, 0);

				
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã xóa két sắt thành công máy chủ <font color=black><b>'.$serverInfo['ServerName'].'</b></font> !", [])</script>';

				
			
			
			}
		
	
	
	
	
	
?>
<div style="padding:0px !important;">




  <!-- Tab panes -->
  
  <style>
  .news_ct {
    width: 690px;
    float: left;
    color: #333;
    font-size: 13px;
    padding: 0 15px 15px;
}</style>


	  
   
   <center>

 
	<center><div class="col-md-12">
   <div class="quanap">
	<!------------------>

	&#xFEFF;<b>
<div class="row">
<div class="col-md-6 form-group col-xs-12">
        <div class="media list-group-item">
          <a class="media-left media-middle" href="http://gunnyae.com/launcher.rar">
            <img src="http://gunnylau360.net/images/taive.png" width="80" height="80">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><a href="http://gunnyae.com/launcher.rar">Tải Launcher<img src="http://gunnylau360.net/images/hot1.gif"></a></h4>
    	        Sau khi tải Launcher về thành công bạn cần giải nén ra và chạy file launcher.exe để vào game!   
          </div>
        </div>
    </div>  

<div class="col-md-6 form-group col-xs-12">
        <div class="media list-group-item">
          <a class="media-left media-middle" href="http://gunnylau360.net/serverconfig/37abc.2.0.6.16.exe">
            <img src="http://gunnylau360.net/images/37abc.png" width="80" height="80">
          </a>
          <div class="media-body"><br>
            <h4 class="media-heading"><a href="http://gunnylau360.net/serverconfig/WebGame.zip">Tải trình duyệt chơi game</a></h4>
    	        Sau khi tải trình duyệt về bạn cần click vào để cài đặt và chạy trình duyệt vừa cài để vào game!
          </div>
        </div>
    </div> 
  <div class="col-md-6 form-group col-xs-12">
        <div class="media list-group-item">
          <a class="media-left media-middle" href="https://play.google.com/store/apps/details?id=com.cloudmosa.puffinFree">
            <img src="http://gunnylau360.net/images/puffinicon.png" width="80" height="80">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><a href="https://play.google.com/store/apps/details?id=com.cloudmosa.puffinFree">Chơi game trên điện thoại</a></h4>
    	        Vào Chplay tải Puffin Web Browser và chơi game như ở máy tính!
          </div>
        </div>
    </div>  
   

</div><Br>
			<h3 align="center" >HƯỚNG DẪN CÀI TRÌNH DUYỆT WEB</h3><br>
<img src="http://gunnylau360.net/images/caidat37abc.png" width="600px">

<hr>							


</b></div>

			
</center>
