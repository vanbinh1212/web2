<?php
	session_start();
	
	define("SNAPE_VN", true);
	include_once(dirname(__FILE__)."/../#config.php");

	include_once(dirname(__FILE__)."/../class/class.account.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	$userid = $_SESSION['ss_user_id'];
	$mathe = trim($_POST['txtserial']);	
	$menhgia = trim($_POST['txtMenhgia']);	
	$serverid = trim($_POST['txtServer']);	
	$uid = trim($_POST['txtcharacter']);
	$status = 2 ;
	
	if($_POST)  {
		if(!is_numeric($menhgia)||!is_numeric($serverid)){
					die('Định hack hả ba');
			
			//break;
		}
		if($menhgia < 10000)
		{
			die('Mệnh giá tối thiểu là 10.000 VNĐ');
		}
		if($menhgia > 50000000)
		{
			die('Mệnh giá tối đa là 50.000.000 VNĐ');
		}
	if($mathe) {
		
		$userInfo = account::getUserInfo(trim($userid));
		if(!vaildCaptcha($mathe)) {
					die('<font size=6 color=red>Bạn đã nhập sai Mã thẻ, Vui lòng nhập đúng để gửi lệnh nạp ! <a href="/tai-khoan/gui-nap/">Click vào đây để quay lại </a></font>');		
			}
			

				else {
					account::guilenhnap($userid, $userInfo['Email'], $menhgia, $status, $mathe, $serverid, $uid);

				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã gửi lệnh thành công đơn của bạn đã được quản trị ghi nhận! Vui lòng kiểm tra lệnh nạp tại mục trạng thái lệnh nạp", [])</script>';
			}
		
	
	}
	}
	
	
?>
 <script type="text/javascript">
    $(document).ready(function () {
		
		//SnapeClass.openModal("Cảnh báo", "<font color='red'><b>Tính năng này tạm dừng cho tới khi hệ thống gộp máy chủ thành công. Vui lòng quay lại sau.</b></font>", []);
		
    	$("#frmReCharge").validate({
    		rules: {
    			'txtServer': {
    				required: true,
					number: true,
					min: 1
    			},
				'txtserial': {
					required: true
				}
    		},
    		messages: {
				txtServer: {
					required: "Vui lòng chọn máy chủ.",
					number: "Máy chủ không hợp lệ!",
					min: "Vui lòng chọn máy chủ."
				}
			},
			
    	});
		
		
	});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#txtServer").change(function() {
            var serverid = $("#txtServer").val();
            if(serverid != null && serverid != 0) {
                SnapeClass.loadPlayersList(serverid, "#txtcharacter");
            }
        });
    });

</script>


  <div style="padding:5px !important;">
 

<style>
.card .card-body {
    padding: 16px;
}
.box {
    width: 100%;
    position: relative;
    margin: 0;
    display: inline-block;
    vertical-align: top;
}
.row {
    height: auto;
    margin: 0;
    box-sizing: border-box;
    display: block;
    clear: both;
}
.col-md-6 {
    width: 50%;
    float: left;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.game-content-wrapper .ddt-game-border {
    border: 1px solid rgba(0, 0, 0, 0.3);
    padding: 7px 10px;
    border-radius: 10px;
    margin-bottom: 10px;
}
.game-content-wrapper .frame {
    padding: 12px 10px !Important;
}
.game-content-wrapper .frame, .game-content-wrapper .inner-frame {
    background: rgba(7, 72, 45, 0.51);
}
.server_font {
    color: rgb(255, 253, 251);
    font-weight: 700;
}
.game-button .game_status {
    border-radius: 50%;
    border: 1px solid rgb(255, 255, 255);
    width: 15px;
    height: 15px;
    margin: 2px 7px 2px 0px;
    padding: 3px;
}
.pull-left {
    float: left;
}

</style>

  <!-- Tab panes -->
	<div class="col-md-7" style="width: 100%">
	<div class="card-body">
    <div class="box list">
      <div class="game-content-wrapper container-fluid no-padding" style="margin: 0;padding: 0;">
        <div class="game-server-wrapper" style="margin: 0;padding: 0;">
          <div class="row">
            <a target="_blank" href="http://gunnyae.com/Launcher.rar"> <img src="https://gunny68.net/images/banner-launcher.png" border="0" width="100%"></a>
            <div class="game-server-wrapper" style="margin-top: 15px;">
			
						<div class="panel-body">
 <span style="color:rgb(252, 250, 251);font-size:20px;font-weight: bold;top:10px"> 
<marquee color="red" bgcolor="green">
CHÚC CÁC BẠN CHƠI GAME VUI VẺ
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Fanpage hỗ trợ : https://www.facebook.com/profile.php?id=100092000605483
</marquee></span>
	  
     <div class="alert alert-success" style="width:100%">  
	   <button type="button" onclick="location.href='http://gunnyae.com/play.php?id=1001'" class="btn btn-success" >S1 - Gà Hồi Ức</button>	   
	  	  </div>
     <div class="alert alert-info" style="width:100%">  
  <div id="namebox" class="panel-heading"><font color=black>Dấu hiệu nhận biết :</font></div>
	   <button type="button" class="btn btn-success" ><b>Ổn định</b></button>
	   <button type="button" class="btn btn-dark" ><b>Chưa ra mắt</b></button>
	   <button type="button" class="btn btn-danger"><b>Không ổn định</b></button>
	   <button type="button" class="btn btn-warning" ><b>Bảo trì</b></button>
	  
	  	  </div>
 	</div>
					          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

  
 <div style="height:250px">
       
    </div>
	
    </div>
	
