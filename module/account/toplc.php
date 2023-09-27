<?php
define("SNAPE_VN", true);
	include_once(dirname(__FILE__)."/../#config.php");

	include_once(dirname(__FILE__)."/../class/class.account.php");

	include_once(dirname(__FILE__)."/../class/function.global.php");

	include_once(dirname(__FILE__)."/../class/function.soap.php");
	$userid = $_SESSION['ss_user_id'];
	
	
?>

<div style="padding:5px !important;">
 

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" style="width:100% !important;" class="container tab-pane active"><br>
    
     <div>
	 <div class="panel with-nav-tabs panel-default">
<div class="alert alert-success" role="alert">cập nhật chuẫn nhất khi tài khoản offline.</div>
<table class="table table-bordered">
			<thead>
			  <tr>
				<th><font color=black>Xếp hạng</font></th>
				<th><font color=black>Tên nhân vật</font></th>
				<th><font color=black>level</font></th>
				<th><font color=black>lực chiến</font></th>
			  </tr>
			</thead>
		<tbody style="background:#f5f5f5;">
			<?php
			$loadserver = loadtoplc();
			echo $loadserver == null;
			while($svInfo = sqlsrv_fetch_array($loadserver, SQLSRV_FETCH_ASSOC)) 
			{
				echo '
					<tr>
						<th><font color=black>test</font></th>
						<th><font color=black>'.$svInfo['NickName'].'</font></th>
						<th><font color=black>level</font></th>
						<th><font color=black>lực chiến</font></th>
					 </tr>
				';
				
			}
			?>
			</tbody>
							</table>
    </div>
    </div>	</div>		

   <div id="menu1" class="container tab-pane fade"><br>
<h3>Nạp MOMO </h3>
      			<div id="momo" class="alert alert-success" style="width:80%">

      <p>Chuyển khoản Momo tới SĐT : <b>0869 941 629  </b> hoặc <b>0333 969 553</b>
	  <br/>Kèm tin nhắn cú pháp : <b>Email đăng ký</b>
	  <br/>BQT sẽ duyệt thẻ sau 5 phút nhận được.
	  </div>
	  </p>
	   	<div id="momo" class="alert alert-warning" style="width:80%">
	   <p class="text-warning">Bạn nào chưa có tài khoản ví MOMO có thể nạp trực tiếp </br> tại cửa hàng Thế Giới Di Động hoặc FPT shop trên toàn quốc </p>
	   </div>
    </div>
    <div id="atm" class="container tab-pane fade"><br>
      <h3>Nạp ATM</h3>
	  
	    <div class="alert alert-success" style="width:80%">
      <p>Chuyển tiền vào 1 trong các tài khoản bên dưới với nội dung là tài khoản của bạn :</p>
	  <p><b><u><font color=black>Ngân hàng</u></font> : <font color=red>Vietcombank - Chi Nhánh TP Nam Định</b></font></p>
	  <p><b><u><font color=black>Số Tài Khoản</u></font> : <font color=red>0831000044124</b></font></p>
	  <p><b><u><font color=black>Tên</u></font> : <font color=red>TRIEU HUY HOANG</b></font></p>

	  </div>
	    <div class="alert alert-info" style="width:80%">
	<p>Chuyển tiền vào 1 trong các tài khoản bên dưới với nội dung là tài khoản của bạn :</p>
	  <p><b><u><font color=black>Ngân hàng</u></font> : <font color=red>Vietinbank - Chi Nhánh VINH YEN - VINH PHUC</b></font></p>
	  <p><b><u><font color=black>Số Tài Khoản</u></font> : <font color=red>109869973651</b></font></p>
	  <p><b><u><font color=black>Tên</u></font> : <font color=red>NGUYEN VAN CANH</b></font></p>

	  </div>
	  </div>
	  
	
	   <div id="quanap" class="container tab-pane fade"><br>
<h3>DƯỚI ĐÂY LÀ DANH SÁCH QUÀ TẶNG KHI BẠN NẠP TIỀN </h3>
	    <div id="quanap" class="alert alert-info" style="width:90%">

			 <p class="text-danger">Khi nạp xong vui lòng vào Túi Web để gửi quà vào game ! Và tới Nhiệm vụ Ingame để đổi thưởng ! </a> </p>
</div>
  <table class="table table-striped" style="width:90%">
							<thead>
			  <tr>
				<th>Mệnh Giá</th>
				<th> Vật Phẩm</th>
				<th>Số Lượng</th>	
				<th>Thời Hạn</th>
				
			  </tr>
			</thead>
			<tbody>
			
						<tr>
						<td><span class="label" style="background-color:green">10.000 VNĐ</span</th>
						<th><img width=50 class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">10</span></td>
						<td><i><b><font color=red size=3>Hiệu lực vĩnh cửu</font></b></i></t>						
						</tr>
							<tr>
						<td><span class="label" style="background-color:orange">20.000 VNĐ</span</th>
						<th><img width=50 class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">20</span></td>
						<td><i><b><font color=red size=3>Hiệu lực vĩnh cửu</font></b></i></t>						
						</tr>
						<tr>
						<td><span class="label" style="background-color:brown">30.000 VNĐ</span</th>
						<th><img width=50 class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">30</span></td>
						<td><i><b><font color=red size=3>Hiệu lực vĩnh cửu</font></b></i></td>						
						</tr>
						<tr>
						<td><span class="label" style="background-color:purple">50.000 VNĐ
						</span></td><th><img width="50" class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">50</span></td>
						<td><i><b><font color="red" size="3">Hiệu lực vĩnh cửu</font></b></i>						
						</td></tr>
<tr>
						<td><span class="label" style="background-color:blue">100.000 VNĐ
						</span></td><th><img width="50" class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">100</span></td>
						<td><i><b><font color="red" size="3">Hiệu lực vĩnh cửu</font></b></i>						
						</td></tr>						
<tr>
						<td><span class="label" style="background-color:pink">200.000 VNĐ
						</span></td><th><img width="50" class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">200</span></td>
						<td><i><b><font color="red" size="3">Hiệu lực vĩnh cửu</font></b></i>						
						</td></tr>	
<tr>
						<td><span class="label" style="background-color:#26a69a">300.000 VNĐ
						</span></td><th><img width="50" class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">300</span></td>
						<td><i><b><font color="red" size="3">Hiệu lực vĩnh cửu</font></b></i>						
						</td></tr>							
<tr>
						<td><span class="label" style="background-color:#a94442">500.000 VNĐ
						</span></td><th><img width="50" class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">500</span></td>
						<td><i><b><font color="red" size="3">Hiệu lực vĩnh cửu</font></b></i>						
						</td></tr>		
<tr>
						<td><span class="label" style="background-color:red">1.000.000 VNĐ
						</span></td><th><img width="50" class="personPopupTrigger" alt="55000020,0.Đã khóa" src="http://gunnyae.com/res/image/unfrightprop/v1daquy/icon.png"></th>
						<td><span class="label" style="background-color:black">1000</span></td>
						<td><i><b><font color="red" size="3">Hiệu lực vĩnh cửu</font></b></i>						
						</td></tr>	
		
			</tbody>
							</table>
    
    </div>
    
	
	
	
	
	<div id="thethanhcong" class="container tab-pane fade"><br>
     <table class="table table-striped" style="width:62%">
							<thead>
			  <tr>
				<th>STT</th>
				<th>SỐ SERIAL</th>
				<th>LOẠI THẺ</th>
				<th>MỆNH GIÁ</th>						
				<th>TRẠNG THÁI</th>		
				<th>THỜI GIAN</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from Log_Card WHERE UserID = '$userid' and Status=1 order by id DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
			$dem = 0;
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						$sst = statusCard($r['Status']);
						$mg = menhgiaCard($r['Money']);
						echo '
						<tr>
						<td>'.$dem.'</th>
						<td>'.$r['Serial'].'</td>
						<th><font color="red">'.$r['Name'].'</font></th>
						<td><span class="label" style="background-color:'.$mg['color'].'">'.$mg['name'].'</span></td>
						<td><span class="label" style="background-color:'.$sst['color'].'">'.$sst['name'].'</span></td>
						<td><i><b><font size=1>'.$r['TimeCreate'].'</font></b></i></t>						
						</tr>
						';
					}					
				
				}else {
										echo '<tr><td align="center" colspan="7"><b>Chưa có giao dịch nào được thực hiện</b></td></tr>';
									}
			?>
			</tbody>
							</table>
    </div>
	
	<div id="thethatbai" class="container tab-pane fade"><br>
     <table class="table table-striped" style="width:62%">
							<thead>
			  <tr>
				<th>STT</th>
				<th>SỐ SERIAL</th>
				<th>LOẠI THẺ</th>
				<th>MỆNH GIÁ</th>						
				<th>LÝ DO</th>		
				<th>THỜI GIAN</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from Log_Card WHERE UserID = '$userid' and Status=3 order by id DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
			$dem = 0;
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						$sst = statusCard($r['Status']);
						$mg = menhgiaCard($r['Money']);
						echo '
						<tr>
						<td>'.$dem.'</th>
						<td>'.$r['Serial'].'</td>
						<th><font color="red">'.$r['Name'].'</font></th>
						<td><span class="label" style="background-color:'.$mg['color'].'">'.$mg['name'].'</span></td>
						<td><span class="label" style="background-color:brown">'.$r['Response'].'</span></td>
						<td><i><b><font size=1>'.$r['TimeCreate'].'</font></b></i></t>						
						</tr>
						';

					}					
				
				}else {
										echo '<tr><td align="center" colspan="7"><b>Chưa có giao dịch nào được thực hiện</b></td></tr>';
									}
			?>
			</tbody>
							</table>
    </div>
  </div>
</div>					</div>
				</div>
			</div>
		</div>        <!-- /.row -->
 <div style="height:250px">
       
    </div>
	
    </div>
