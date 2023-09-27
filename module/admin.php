
<?php
	session_start();
	
	define("SNAPE_VN", true);
	include_once(dirname(__FILE__)."/../#config.php");

	include_once(dirname(__FILE__)."/../class/class.account.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	$email = $_SESSION['ss_user_email'];
	if($email<>$_config['panel']['Administrator']  and $email<>$_config['panel']['Administrator2'] )
	{
	die('<center><b><font color=red>Bạn không phải admin không thể truy cập</font></b></center>');
	}
	$account = new account();
	$return['type'] = -1;
	$return['content'] = 'Lỗi không xác định';
	$listAccount = trim($_POST['text']);
	$listSeri = trim($_POST['txtSerithe']);	
	$listEmail = trim($_POST['txtEmail']);	
	$listEmailcheck = trim($_POST['emailcheck']);
	$listEmailsua = trim($_POST['txtEmailsua']);
	$sendcoinall=trim($_POST['xuweball']);
	$listItem = trim($_POST['txtItemID']);
	
	
	
	
	if($sendcoinall) {
				
		$money = trim($_POST['xuweball']);;
		$moneylock = trim($_POST['xugameall']);;
				
				account::adminSendcoinall($money, $moneylock);						
				account::logChuyenxu('all', $money, $moneylock);	

				echo '<script>SnapeClass.openModal("Thông báo", "Gửi xu thành công toàn server ! <br> Số Coin : <b>'.$money.'</b> <br> Số Coin Khóa : <b>'.$moneylock.'</b>", [])</script>';
			 
	}
	
	if($listItem) {
		
		$listItemArray = explode(",", $listItem);
		$itemidInfo = account::getItemInfo(''.$listItem.'');
		$gia = trim($_POST['txtItemPrice']);;
		$soluong = trim($_POST['txtItemCount']);;
		$isbind = trim($_POST['txtStatusItem']);;
		$validdate = trim($_POST['txtItemvaliddate']);;
	
		foreach($listItemArray as $item) {
			
			// get userid
			$itemInfo = account::getItemInfo(trim($item));
			$checkIteminfo = account::checkItemInfo(trim($item));
					if($checkIteminfo != false) {
						echo '<script>SnapeClass.openModal("Thông báo", "Vật phẩm đã có trong hệ thống ! ", [])</script>';
						break;
					}
				else {
				echo '<script>SnapeClass.openModal("Thông báo", "Thêm thành công vật phẩm '.$listItem.'  ! ", [])</script>';
			}
			 
			
			
			if($itemInfo != false) {
				account::additemshop($itemInfo[TemplateID], $soluong, $gia, $validdate, $isbind);
				account::updateshop();
				//echo '<script>SnapeClass.openModal("Thông báo", "Thêm thành công vật phẩm '.$listItem.'  <br><br>  ", [])</script>';

				
			} else {
				echo '<script>SnapeClass.openModal("Thông báo", "Vật phẩm '.$listItem.' hiện không có trong hệ thống ! ", [])</script>';
			}
		}
	}
	
	if($listEmailsua) {
				$serial = trim($_POST['txtserial']);;

		if(!vaildCaptcha($serial)) {
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Serial, Vui lòng nhập lại để gửi quà nạp ! ", [])</script>';
			break;
			}
		$emailInfo = account::checkEmailInfo(trim($listEmailsua));
		$xuweb = trim($_POST['txtXuWeb']);;
		$xugame = trim($_POST['txtXuGame']);;
		//$pass = trim($_POST['txtPass']);;
		$isban = trim($_POST['isBan']);;
		//$password = strtoupper(md5($pass));

			if($emailInfo != false) {
				
				account::updateInfoadmin($listEmailsua, $xugame, $xuweb, $isban);						


				echo '<script>SnapeClass.openModal("Thông báo", "Sửa thông tin email : '.$listEmailsua.' thành công !</b>", [])</script>';
			} else{
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Email ", [])</script>';
			}
	}
		if($listEmailcheck) {
				
		$emailInfo = account::checkEmailInfo(trim($listEmailcheck));
		$userInfo = account::getUserInfoByEmail(trim($listEmailcheck));

			if($emailInfo != false) {


				echo '<script>SnapeClass.openModal("Thông báo", "Email : '.$listEmailcheck.' ! <br> Số Coin : <b>'.$userInfo['Money'].'</b> <br> Số Coin Khóa : <b>'.$userInfo['MoneyLock'].'</b> <br> Tổng tiền Nạp : <b> '.$userInfo['TotalMoney'].' <br> IP Tạo : <b> '.$userInfo['IPCreate'].'</b> <br> Trạng thái Ban : <b> '.$userInfo['IsBan'].'</b>", [])</script>';
			} else{
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Email ", [])</script>';
			}
	}
	if($listEmail) {
				$serial = trim($_POST['txtserial']);;

		if(!vaildCaptcha($serial)) {
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Serial, Vui lòng nhập lại để gửi quà nạp ! ", [])</script>';
			break;
			}
		$emailInfo = account::checkEmailInfo(trim($listEmail));
		$xuweb = trim($_POST['txtXuWeb']);;
		$xugame = trim($_POST['txtXuGame']);;
			if($emailInfo != false) {
				
				account::adminSendcoin($listEmail, $xuweb, $xugame);						
				account::logChuyenxu($listEmail, $xuweb, $xugame);	

				echo '<script>SnapeClass.openModal("Thông báo", "Gửi xu thành công cho email : '.$listEmail.' ! <br> Số Coin : <b>'.$xuweb.'</b> <br> Số Coin Khóa : <b>'.$xugame.'</b>", [])</script>';
			} else{
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Email ", [])</script>';
			}
	}
	if($listSeri) {
		$seriInfo = account::checkSeriInfo(trim($listSeri));
		$statuscard = trim($_POST['txtStatusCard']);;
			if($seriInfo != false) {
				account::updateTinhtrangthe($statuscard, $listSeri); // 
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã duyệt thành công Email : '.$listSeri.' ! ", [])</script>';
			} else{
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Email ", [])</script>';
			}
	}
	if($return['type'] == -1) {
	
	$conn_sv = connectTank($serverid);
	
	
	if($listAccount) {
		
		$listAccountArray = explode(",", $listAccount);
		$playerInfo = account::getPlayerInfo(''.$listAccount.'');
		$menhgia = trim($_POST['txtAmount']);;
		$serial = trim($_POST['txtserial']);;
		$status = trim($_POST['txtStatus']);;
		$khuyenmai = trim($_POST['txtKhuyenmai']);;
		$usernhan = trim($_POST['txtUsernhan']);;
		$coinhave = $menhgia/* * $khuyenmai*/;
		$coinkhoa = $menhgia * 15 * 2;
	
		foreach($listAccountArray as $acc) {
			
			// get userid
			$userInfo = account::getUserInfoByEmail(trim($acc));
			if(!vaildCaptcha($serial)) {
				echo '<script>SnapeClass.openModal("Thông báo", "Bạn đã nhập sai Serial, Vui lòng nhập lại để gửi quà nạp ! ", [])</script>';
			break;
			}
			
			if($userInfo != false) {
				switch($menhgia) {
					
					case 10000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 10, true, 0, true); // chdon	
					break;
					case 20000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 20, true, 0, true); // chdon				
					break;
					case 30000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 30, true, 0, true); // chdon
					break;
					case 50000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 50, true, 0, true); // chdon
					break;
					case 100000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 100, true, 0, true); // chdon
					break;
					case 200000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 200, true, 0, true); // chdon
					break;
					case 300000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 300, true, 0, true); // chdon
					break;
					
					case 500000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 500, true, 0, true); // chdon
					break;
					case 1000000:
					account::addItemBag($userInfo['UserID'], 0, 56000057, 1000, true, 0, true); // chdon
					break;
				}
				account::addCoin($userInfo['UserID'], $coinhave, true);						
				account::addNumberField($userInfo['UserID'], "MoneyLock", $coinkhoa);
				account::logCard($userInfo['UserID'], 'ATM/MoMo', $serial, 0 , $menhgia);	
				account::updateLogCard($userInfo['UserID'], $serial, 0, $status, $menhgia, '');
				account::updateUsernhan($userInfo['UserID'], $serial, $usernhan);
				account::log($userInfo['UserID'], 'Nạp Tiền', 2, 'Nạp ATM/MoMo Mệnh giá '.$menhgia.' VNĐ', $menhgia);									
				echo '<script>SnapeClass.openModal("Thông báo", "Nạp thành công ! Tài khoản '.$listAccount.' nhận được '.$coinhave.' Coin và '.$coinkhoa.' Coin Khóa <br><br> Lưu lịch sử nạp thẻ hoàn tất ", [])</script>';

				$menhgia;
				
			} else {
				echo '<script>SnapeClass.openModal("Thông báo", "Tài khoản '.$listAccount.' hiện không có trong hệ thống ! ", [])</script>';
			}
		}
	}
	
	
	
	}
	
	
?>

<script type="text/javascript" src="<?=$_config['page']['fullurl']?>/js/load_news.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
        	SnapeNews.init(1);
			//SnapeGuild.guildHome().show();
        });
	
    </script>
<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-warning" href="#home" data-toggle="tab"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <div>LỊCH SỬ | DUYỆT THẺ</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-danger" href="#menu1" data-toggle="tab"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
                <div>CHUYỂN XU | NẠP THẺ</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#menu2" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div>QUẢN LÝ TÀI KHOẢN</div>
            </button>
        </div>	
<div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-success" href="#menu3" data-toggle="tab"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>
                <div>QUẢN LÝ WEBSHOP</div>
            </button>
        </div>		

		
    </div>
	 <!-- Tab panes -->
  <div class="tab-content">
   <div id="home" class="container tab-pane fade"><br>
    
     <div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-primary" style="display: none"></div>
			</div>
		</div>
		<div class="col-md-8 menu-left">
				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">TOP THẺ NẠP GẦN NHẤT</div>
					<div class="panel-body">
						<div class="center-block">
							<table class="table table-striped">
							<thead>
			  <tr>
				<th>TÀI KHOẢN</th>				
				<!--th>SỐ SERIAL</th-->
				<th>LOẠI THẺ</th>
				<th>MỆNH GIÁ</th>						
				<th>TRẠNG THÁI</th>		
				<th>THỜI GIAN</th>
				<th>ADMIN</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from Log_Card where Show=1 order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			$qcheck1 = sqlsrv_query($conn, "select * from Log_Card where Status=1 and name != 'ATM/MoMo' and Show=1 order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			$qcheck2 = sqlsrv_query($conn, "select * from Log_Card where Status=1 and name = 'ATM/MoMo' and Show=1 order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			$qcheck3 = sqlsrv_query($conn, "select * from Log_Card where Status=4 and name = 'ATM/MoMo' and Show=1 order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			$qcheck4 = sqlsrv_query($conn, "select * from Log_Card where Usernhan=1 and Status=1 and name = 'ATM/MoMo' and Show=1 order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));			
			$qcheck5 = sqlsrv_query($conn, "select * from Log_Card where Usernhan=2 and Status=1 and name = 'ATM/MoMo' and Show=1 order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));			
			
			$dem = 0;
			if (sqlsrv_num_rows($qcheck1) <> 0) {
					while($r1 =sqlsrv_fetch_array($qcheck1, SQLSRV_FETCH_ASSOC)){
						$dem++;
						echo '
						
						';
						$tongcard += $r1['Money'];
						$truphantramcard = $tongcard - (34/100* $tongcard);

					}
				}
			if (sqlsrv_num_rows($qcheck2) <> 0) {
					while($r2 =sqlsrv_fetch_array($qcheck2, SQLSRV_FETCH_ASSOC)){
						$dem++;
						echo '
						
						';
						$tongatmmomo += $r2['Money'];

					}
				}
			if (sqlsrv_num_rows($qcheck3) <> 0) {
					while($r3 =sqlsrv_fetch_array($qcheck3, SQLSRV_FETCH_ASSOC)){
						$dem++;
						echo '
						
						';
						$tienno += $r3['Money'];

					}
				}
			if (sqlsrv_num_rows($qcheck4) <> 0) {
					while($r4 =sqlsrv_fetch_array($qcheck4, SQLSRV_FETCH_ASSOC)){
						$dem++;
						echo '
						
						';
						$canh += $r4['Money'];

					}
				}			
			if (sqlsrv_num_rows($qcheck5) <> 0) {
					while($r5 =sqlsrv_fetch_array($qcheck5, SQLSRV_FETCH_ASSOC)){
						$dem++;
						echo '
						
						';
						$ducsine += $r5['Money'];

					}
				}				
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						$sst = statusCard($r['Status']);
						$mg = menhgiaCard($r['Money']);
						$usernhan = usernhan($r['Usernhan']);
						
						echo '
						<tr>
						<td>'.$r['Email'].'</td>						
						<th><font color="red">'.$r['Name'].'</font></th>
						<td><span class="label" style="background-color:'.$mg['color'].'">'.$mg['name'].'</span></td>
						<td><span class="label" style="background-color:'.$sst['color'].'">'.$sst['name'].'</span></td>
						<td><i><b><font size=1>'.$r['TimeCreate'].'</font></b></i></t>
						<td><span class="label" style="background-color:'.$usernhan['color'].'">'.$usernhan['name'].'</span></td>
						
						</tr>
						';
						$tong += $r['Money'];

					}
				}else {
										echo '<tr><td align="center" colspan="7"><b>Chưa có giao dịch nào được thực hiện</b></td></tr>';
									}
			?>
			<?php
			$tongthunhap = $truphantramcard + $tongatmmomo;
			?>
			</tbody>
							</table>
						</div>
						<div align="center" class="alert alert-danger" role="alert">
<font color=purple><b>Tổng tiền nạp vào tài khoản: </b></font>: <i><b><font color=blue> <b><?php echo number_format($tong) ?></b> VNĐ       </font></i> </b> 
<br><font color=orange><b>Tổng tiền nạp thẻ: </b></font>: <i><b><font color=blue> <b><?php echo number_format($truphantramcard) ?></b> VNĐ   </font><font color=red>- Đã trừ 34% chiết khấu    </font></i> </b>
<br><font color=darkgreen><b>Tổng tiền nạp ATM/MOMO: </b></font>: <i><b><font color=blue> <b><?php echo number_format($tongatmmomo) ?></b> VNĐ       </font></i> </b>
<br><font color=black><b>Tổng tiền người chơi nạp nợ: </b></font>: <i><b><font color=blue> <b><?php echo number_format($tienno) ?></b> VNĐ       </font></i> </b>
<br><font color=brown><b>Tổng tiền Admin1 nhận: </b></font>: <i><b><font color=blue> <b><?php echo number_format($canh) ?></b> VNĐ       </font></i> </b>
<br><font color=violet><b>Tổng tiền Đức Sine nhận: </b></font>: <i><b><font color=blue> <b><?php echo number_format($ducsine) ?></b> VNĐ       </font></i> </b>
<br><font color=#3104B4><b>Tổng thu nhập máy chủ: </b></font>: <i><b><font color=blue> <b><?php echo number_format($tongthunhap) ?></b> VNĐ       </font></i> </b>

</div>

					

						</div>
</div>
</div>
<br>

		<div class="row">
			
			<div class="col-md-4">

				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Duyệt thẻ</div>
					<div class="panel-body">
<form id="frmReCharge" method="post">
<b>	Tài khoản </b>			<input type="text" id="txtSerithe" name="txtSerithe" required autocomplete="off" class="form-control"  placeholder="Nhập Email ! Copy từ khung bên trái">
</br>

			<label class="control-label" for="email_login">Trạng thái:</label>
			<select class="form-control"  name="txtStatusCard">
			<option value="1">Đã thanh toán</option>
			<option value="4">Chưa thanh toán</option>
			</select>
</br>
			
	<center><input type="submit" class="btn btn-success btn-block" value="Duyệt Ngay !" />
	<br>

</form>
</div>
</div>

  </div>


</div>
	</div>
</div>

   <div id="menu1" class="container tab-pane fade"><br>
      			
	  		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="col-md-8 menu-left">
				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">CHUYỂN XU</div>
					<div class="panel-body">
						<div class="center-block">
							<form id="frmReCharge" method="post">
<b>	Tài Khoản </b>			<input type="text" id="txtEmail" name="txtEmail" required autocomplete="off" class="form-control"  placeholder="Nhập Tài khoản muốn gửi Xu !">
</br>

			<b>	Coin </b>			<input type="text" id="txtXuWeb" name="txtXuWeb" value='0' required autocomplete="off" class="form-control"  placeholder="Số Coin muốn gửi !">

</br>
		 <b>	Coin Khóa </b>			<input type="text" id="txtXuGame" name="txtXuGame" value='0' required autocomplete="off" class="form-control"  placeholder="Số Coin Khóa muốn gửi">
	<br>
	<div class="form-group">
								<label class="control-label" for="captcha_login">
									<a href="javascript:;" name="serial" onclick="SnapeClass.resetNewCaptchaseri('serial')"><img id="serial" src="<?=$_config['page']['fullurl']?>/seriatm.php" /></a>
								</label>
								
								<input type="text" id="txtserial" name="txtserial" required autocomplete="off" class="form-control" placeholder="Nhập chuỗi phía trên, đây chính là Serial !">
								</div>
								<br>
	<center><input type="submit" class="btn btn-warning btn-block" value="Gửi Ngay !" />
	<br>

</form>
						</div>
				
					

						</div>
</div>
</div>
<br>

		<div class="row">
			
			<div class="col-md-4">
				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Gửi Xu Nạp Thẻ</div>
					<div class="panel-body">
<form id="frmReCharge" method="post">
<b>	Tài khoản </b>			<input type="text" id="text" name="text" required autocomplete="off" class="form-control"  placeholder="Ngăn cách các tài khoản bằng dấu phẩy , ">
</br>

<label class="control-label" for="email_login">Mệnh giá:</label>
			<select class="form-control"  name="txtAmount">
			<option value="10000">10.000 VNĐ</option>
			<option value="20000">20.000 VNĐ</option>
			<option value="30000">30.000 VNĐ</option>
			<option value="50000">50.000 VNĐ</option>
            <option value="100000">100.000 VNĐ</option>
			<option value="200000">200.000 VNĐ</option>
			<option value="300000">300.000 VNĐ</option>
			<option value="500000">500.000 VNĐ</option>
			<option value="1000000">1.000.000 VNĐ</option>			
			</select>
			<br>
			<label class="control-label" for="email_login">Trạng thái:</label>
			<select class="form-control"  name="txtStatus">
			<option value="1">Đã thanh toán</option>
			<option value="4">Chưa thanh toán</option>
			</select>

			<br>
			<label class="control-label" for="email_login">Khuyến Mãi:</label>
			<select class="form-control"  name="txtKhuyenmai">
			<option value="2">100%</option>
			<option value disabled="1/2">50%</option>
			</select>

			<br>
			<label class="control-label" for="email_login">Người nhận tiền:</label>
			<select class="form-control"  name="txtUsernhan">
			<option value="1">Hệ Thống</option>
			<option value="2">Đức Sine</option>
			</select>

			<br>
			<div class="form-group">
								<label class="control-label" for="captcha_login">
									<a href="javascript:;" name="serial" onclick="SnapeClass.resetNewCaptchaseri('serial')"><img id="serial" src="<?=$_config['page']['fullurl']?>/seriatm.php" /></a>
								</label>
								
								<input type="text" id="txtserial" name="txtserial" required autocomplete="off" class="form-control" placeholder="Nhập chuỗi phía trên, đây chính là Serial !">
								</div>
	<center><input type="submit" class="btn btn-info btn-block" value="Gửi Ngay !" />
	<br>

</form>
</div>
</div>



</div>
	
</div>
    </div>
	
   <div id="menu2" class="container tab-pane fade"><br>
      			
	  		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-danger" style="display: none"></div>
			</div>
		</div>
		<div class="col-md-8 menu-left">
				<div class="panel panel-info" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">SỬA THÔNG TIN</div>
					<div class="panel-body">
						<div class="center-block">
							<form id="frmReCharge" method="post">
<b>	Tài khoản </b>			<input type="text" id="txtEmailsua" name="txtEmailsua" required autocomplete="off" class="form-control"  placeholder="Nhập Email muốn sửa !">
</br>


			<b>	Coin </b>			<input type="text" id="txtXuWeb" name="txtXuWeb" required autocomplete="off" class="form-control"  placeholder="Số Coin muốn sửa !">

</br>
		 <b>	Coin Khóa </b>			<input type="text" id="txtXuGame" name="txtXuGame" required autocomplete="off" class="form-control"  placeholder="Số Coin Khóa muốn sửa">
	<br>
	<label class="control-label" for="email_login">Trạng thái:</label>
			<select class="form-control"  name="isBan">
			<option value="0">Mở Khóa</option>			
			<option value="1">Khóa</option>
			</select>
			<br>
	<div class="form-group">
								<label class="control-label" for="captcha_login">
									<a href="javascript:;" name="serial" onclick="SnapeClass.resetNewCaptchaseri('serial')"><img id="serial" src="<?=$_config['page']['fullurl']?>/seriatm.php" /></a>
								</label>
								
								<input type="text" id="txtserial" name="txtserial" required autocomplete="off" class="form-control" placeholder="Nhập chuỗi phía trên, đây chính là Serial !">
								</div>
								<br>
	<center><input type="submit" class="btn btn-warning btn-block" value="Xác Nhận !" />
	<br>

</form>
						</div>
				
					

						</div>
</div>
</div>
<br>

		<div class="row">
			
			<div class="col-md-4">
				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Kiểm tra Tài Khoản</div>
					<div class="panel-body">
<form id="frmReCharge" method="post">
<b>	Tài khoản </b>			<input type="text" id="emailcheck" name="emailcheck" required autocomplete="off" class="form-control"  placeholder="Ngăn cách các tài khoản bằng dấu phẩy , ">
</br>



			<br>
		
	<center><input type="submit" class="btn btn-info btn-danger" value="Kiểm Tra !" />
	<br>

</form>
</div>
</div>



</div>
	<div class="col-md-4">
				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Gửi Xu Toàn Server</div>
					<div class="panel-body">
<form id="frmReCharge" method="post">
<b>	Coin</b>			<input type="text" id="xuweball" name="xuweball" required autocomplete="off" class="form-control"  placeholder="Số Coin ">
</br>
<b>	Coin Khóa</b>			<input type="text" id="xugameall" name="xugameall" required autocomplete="off" class="form-control"  placeholder="Số Coin Khóa ">
</br>


			<br>
		
	<center><input type="submit" class="btn btn-info btn-danger" value="Kiểm Tra !" />
	<br>

</form>
</div>
</div>



</div>
</div>
    </div>
    <div id="menu3" style="width:100% !important;" class="container tab-pane active"><br>
      			
			
		

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="msg_err_spin" class="alert alert-primary" style="display: none"></div>
			</div>
		</div>
		<div class="col-md-8 menu-left">
				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">DANH SÁCH VẬT PHẨM TẠI WEBSHOP</div>
					<div class="panel-body">
						<div class="center-block">
							<table class="table table-striped">
							<thead>
			  <tr>
			  	<th>ID</th>				
				<th>TÊN VẬT PHẨM</th>				
				<!--th>SỐ SERIAL</th-->
				<th>GIÁ</th>						
				<th>SỐ LƯỢNG</th>		
				<th>THỜI HẠN</th>
				<th>TRẠNG THÁI</th>
				<th>SEX</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from V_Webshop order by CountBuy desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
		
			
			$dem = 0;			
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						$sst = statusCard($r['Status']);
						$isbind = IsBind($r['IsBind']);
						//$multibuy = MultiBuy($r['MultiBuy']);
						$validdate = ValidDate($r['ValidDate']);
						$needsex = NeedSex($r['NeedSex']);

						echo '
						<tr>
						<td><span class="label" style="background-color:purple">'.$r['TemplateID'].'</td>						
						<td><b><font color=black>'.$r['Name'].'</font></b></td>						
						<td><span class="label" style="background-color:brown">'.$r['Price'].'</td>
						<td><span class="label" style="background-color:black">'.$r['Count'].'</td>
						<td><span class="label" style="background-color:'.$validdate['color'].'">'.$validdate['name'].'</span></td>
						<td><span class="label" style="background-color:'.$isbind['color'].'">'.$isbind['name'].'</span></td>
					
						<td><span class="label" style="background-color:'.$needsex['color'].'">'.$needsex['name'].'</span></td>
						
						</tr>
						';
						$tong += $r['Money'];

					}
				}else {
										echo '<tr><td align="center" colspan="7"><b>Chưa có vật phẩm nào được bán trên hệ thống</b></td></tr>';
									}
			?>
		
			</tbody>
							</table>
						</div>
					

					

						</div>
</div>
</div>
<br>

		<div class="row">
			
			<div class="col-md-4">

				<div class="panel panel-primary" style="margin-top: 25px;">
					<div id="namebox" class="panel-heading">Thêm Vật Phẩm</div>
					<div class="panel-body">
<form id="frmReCharge" method="post">
<b>	TemplateID </b>			<input type="text" id="txtItemID" name="txtItemID" required autocomplete="off" class="form-control"  placeholder="Nhập ID Vật Phẩm">
</br>
<b>	Giá </b>			<input type="text" value='10000' id="txtItemPrice" name="txtItemPrice" required autocomplete="off" class="form-control"  placeholder="Nhập Giá Vật Phẩm">
</br>
<b>	Số lượng </b>			<input type="text" id="txtItemCount" value='1' name="txtItemCount" required autocomplete="off" class="form-control"  placeholder="Nhập Số lượng vật phẩm muốn bán">
</br>
<b>	Thời hạn </b>			<input type="text" id="txtItemvaliddate" value='0' name="txtItemvaliddate" required autocomplete="off" class="form-control"  placeholder="Nhập thời hạn vật phẩm ">
</br>
			<label class="control-label" for="email_login">Trạng thái:</label>
			<select class="form-control"  name="txtStatusItem">
			<option value="1">Khóa</option>
			<option value="0">Không Khóa</option>
			</select>
</br>
			
	<center><input type="submit" class="btn btn-success btn-block" value="Thêm Ngay !" />
	<br>

</form>
</div>
</div>

  </div>


</div>
	</div>
			
			
	
</div>
    </div>
</body>