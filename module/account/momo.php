
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
 



  <!-- Tab panes -->
  <div class="tab-content">
  
    <div id="home" style="width:100% !important;" class="container tab-pane active">
	<div class="menubg_fix">
 <span style="color:rgb(252, 250, 251);font-size:20px;font-weight: bold;top:10px"> 
<marquee color="red" bgcolor="green">
Vui lòng ghi rõ tên tài khoản vào nội dung
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Fanpage hỗ trợ : https://www.facebook.com/Gunnypc.vn
</marquee></span>
  </div> 
  <div class="col-md-5">
  <div id="quanap" class="panel panel-default" style="margin-top: 25px;" >
  <div id="namebox" class="panel-heading" style="width=100%">Nap ATM/MOMO</div>

  <div class="panel-body">


   <form id="frmReCharge" method="post">

<div id="div_password" class="form-group">
			<label class="control-label" for="email_login">Máy chủ nhận:</label>
			<select id="txtServer" name="txtServer" class="form-control">
				<option value="0">-- Chọn máy chủ --</option>
				<?php
				// load server list
				$loadserver = loadallserver();
				while($svInfo = sqlsrv_fetch_array($loadserver, SQLSRV_FETCH_ASSOC)) {
					echo '<option value="'.$svInfo['ServerID'].'">'.$svInfo['ServerName'].'</option>';
				}
				?>
			</select>
		</div>	
<div id="div_password" class="form-group">
            <label class="control-label" for="email_login">Tên nhân vật:</label>
            <select id="txtcharacter" name="txtcharacter" class="form-control">
                <option value="0">-- Chọn nhân vật --</option>
            </select>
        </div>
<label class="control-label" for="email_login">Mệnh Giá:</label>
				<input type="text"  name="txtMenhgia" required autocomplete="off" class="form-control" placeholder="Nhập mệnh giá!">
			<br>
	<input type="submit" class="btn btn-cedrusden btn-block" value="Gửi ngay" /><br><br>
</form>
</div>
</div>

	</div>
	<div class="col-md-7">
	<div id="quanap" class="panel panel-default" style="margin-top: 25px;"  >
  <div id="namebox" class="panel-heading" ><font color=green>Chọn thông tin chuyển khoản tại đây :</font></div>

  <div class="panel-body">

	  
     <div class="alert alert-warning" style="width:100%">
<img src="http://gunbavuong.com/images/momohuy.jpg" width="100%"><br><br>	
	  <p><b><B><font color=black>NỘI DUNG</B></font> : <font color=black>napmomo <i><?=$account->getUsername()?></i></b></font></p>
	  
<div id="mb" class="collapse"><br>
<img src="http://gunbavuong.com/images/mbbankhuy.jpg" width="300"><br><br>
	  <p><b><u><font color=black>Ngân hàng</u></font> : <font color=black>MB BANK</b></font></p>
	  <p><b><u><font color=black>Số Tài Khoản</u></font> : <font color=black>0926439124</b></font></p>
	  <p><b><u><font color=black>Tên</u></font> : <font color=black>NGUYEN HOANG HUY</b></font></p><br>

	  </div>
<div id="momo" class="collapse"><br>
<img src="http://gunbavuong.com/images/momo.png" width="200"><br><br>
	  <p><b><u><font color=black>Số Điện Thoại</u></font> : <font color=black>0926439124</b></font></p>
	  <p><b><u><font color=black>Tên</u></font> : <font color=black>NGUYEN HOANG HUY</b></font></p><br>
</div></div>
	  	  </div>
 	</div><br>
					

						
<br>
						</div>
</div>
</div>


	<div id="quanap" class="panel panel-default" style="margin-top: 25px;" >
  <div id="namebox" class="panel-heading"><font color=green>Lịch sử nạp :</font></div>
		<div class="section-heading" style="margin-top: 30px;float: left;width: 100%;">
					<div class="panel-body">
						<div class="center-block">
							<table class="table table-striped">
							<thead>
			  <tr>
				<th>STT</th>
				<th>Mệnh Giá</th>
				<th>Trạng Thái</th>
				<th>THỜI GIAN</th>
				<th>MÁY CHỦ</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from ChoNap where UserID='$userid' order by ID desc", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
			$dem = 0;
		
			if (sqlsrv_num_rows($qcheck) <> 0) {
					while($r =sqlsrv_fetch_array($qcheck, SQLSRV_FETCH_ASSOC)){
						$dem++;
						$sst = statusCard($r['Status']);
						$svid = serverIDcard($r['ServerID']);
						echo '
						<tr>
						<td>'.$dem.'</th>
						<td><span class="label" style="background-color:brown">'.number_format($r['Menhgia']).' VNĐ</span></td>						
						<td><span class="label" style="background-color:'.$sst['color'].'">'.$sst['name'].'</span></td>
						<td><span class="label" style="background-color:green"><i><b>'.$r['TimeCreate'].'</b></i></span></td>
						<td><span class="label" style="background-color:blue">'.$svid['name'].'</span></td>
						
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
     
    </div>		
    </div>	

  
 <div style="height:250px">
       
    </div>
	
    </div>
	
