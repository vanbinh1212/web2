<?php
if(!defined("SNAPE_VN")) die('No access');
include_once(dirname(__FILE__)."/../class/class.account.php");
$userid = $_SESSION['ss_user_id'];
 /*$email = $_SESSION['ss_user_email'];
	 if($email<>$_config['panel']['Administrator'] and $email<>$_config['panel']['Administrator2'] and $email<>$_config['panel']['Administrator3'])
	 {
	 die('<center><b><font color=red>Chức năng bảo trì update 10 phút . Vui lòng nạp bằng ATM MoMo</font></b></center>');
	 }*/
?>
<style>
.table table-striped{
	border : red solid 1px;
}
</style>
<script type="text/javascript">
    $(document).ready(function () {
		$(".payment li").click(function() {
            choiceCard(this);
        });
		
		function choiceCard(obj) {

            var o = $(obj).find("input");
            $(".ratio_deposite").prop("checked", false);

            o.prop('checked', true);
            var value = o.val();
            $("#txtType").val(value);

            $(".hlk_selectCard").removeClass("active");
            $(obj).addClass("active");
        }
		
		//SnapeClass.openModal("Khuyến mãi", "<font color='red'><b>Tặng 100% mệnh giá khi nạp ATM/MOMO và 50% Thẻ cào</b></font>", []);
		//SnapeClass.openModal("Khuyến mãi", "<font color='red'><b>Kênh nạp thẻ hiện đang bảo trì để sửa chữa. Vui lòng quay lại sau 15h. Cảm ơn.</b></font>", []);

    	$("#frmReCharge").validate({
    		rules: {
    			'txtSerial': {
    				required: true,
    				minlength: 5
    			},
    			'txtPasscard': {
    				required: true,
    				minlength: 5
    			},
				'txtCode': {
					required: true
				}
    		},
			submitHandler: function(form) {
				// check button
				if($("#txtType").val() <= 0) {
					SnapeClass.openModal("Cảnh báo", "Vui lòng chọn loại thẻ bạn muốn nạp", []);
				} else {
					SnapeClass.disableSubmit();
					$.post(full_url + "/form/recharge.php", $("#frmReCharge").serialize(), function(data) {
						
						if(data['type'] == 0) {
							SnapeClass.clearAllInput();
							SnapeClass.openModal("Thông báo", "<font color='blue'><b>" + data['content'] + "</b></font>", [{Name:"Chuyển Xu", Link: full_url + '/tai-khoan/chuyen-xu/'}, {Name:"Túi Web", Link: full_url + '/tai-khoan/tui-web/'}, {Name:"Lịch sử nạp", Link: full_url + '/tai-khoan/log-card/'}]);
						} else {
							SnapeClass.openModal("Thông báo", "<font color='red'><b>" + data['content'] + "</b></font>", []);
						}
						
						SnapeClass.resetNewCaptcha('captchaImage');
						SnapeClass.undisableSubmit();
					}, 'json');
				}
				return false;
			}
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
 

<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-success" href="#home" data-toggle="tab"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                <div>NẠP THẺ CÀO <font size=1 color="Red"></font></div>
            </button>
        </div>
		<div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#quanap" data-toggle="tab"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
                <div>TỈ LỆ NẠP </div>
            </button>
        </div>
        <div class="btn-group" role="group">
           <a href="<?=$_config['page']['fullurl']?>/tai-khoan/gui-nap/" <button type="button" id="following" class="btn btn-warning"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                <div>NẠP ATM | MOMO <font size=1 color="Red">KM +100%</font></div>
            </button></a>
        </div>
		<div class="btn-group" role="group">
            <button type="button" id="history" class="btn btn-default" href="#menu3" data-toggle="tab"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                <div>LỊCH SỬ NẠP</div>
            </button>
        </div>
		
    </div>



  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" style="width:100% !important;" class="container tab-pane active"><br>
    
     <div>

<form id="frmReCharge" method="post">
	<div class="center-block" style="width:80%">
		<div class="form-group">
			<div id="msg_err_login" class="alert alert-warning">
				<center>
				<h5>Trong trường hợp nạp thẻ bị lỗi vui lòng liên lạc ngay lên <a href="https://www.facebook.com/profile.php?id=100092000605483/" target=_blank><b>Fanpage để được giải quyết</b></a>                            </h3>
				</center>
				

			</div>
			<!--?php echo $_SESSION['ss_user_email'] ?-->
		</div>
		<!--div id="div_type" class="form-group">
			<label class="control-label" for="email_login"></label>
			<input type="hidden" id="txtType" name="txtType" />
			<ul class="payment">
				<li>
                    <a title="Thẻ Vietel" class="hlk_selectCard" href="javascript:;">
						<img src="<?=$_config['page']['fullurl']?>/images/viettel.jpg">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="2" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Mobifone" class="hlk_selectCard" href="javascript:;">
						<img src="<?=$_config['page']['fullurl']?>/images/mobi.jpg">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="3" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Vinaphone" class="hlk_selectCard" href="javascript:;">
						<img src="<?=$_config['page']['fullurl']?>/images/vina.jpg">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="6" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Garena" class="hlk_selectCard" href="javascript:;">
						<img height=20 src="https://doicard5s.com/assets/frontend_new_v1/images/typeCard/garena.png">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="4" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Zing" class="hlk_selectCard" href="javascript:;">
						<img height=30  src="https://doicard5s.com/assets/frontend_new_v1/images/typeCard/zing.png">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="5" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Gate" class="hlk_selectCard" href="javascript:;">
						<img height=20 src="https://doicard5s.com/assets/frontend_new_v1/images/typeCard/gate.png">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="7" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Vcoin" class="hlk_selectCard" href="javascript:;">
						<img height=20 src="https://doicard5s.com/assets/frontend_new_v1/images/typeCard/vcoin-vtc.png">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="8" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ VNMB" class="hlk_selectCard" href="javascript:;">
						<img height=20 src="https://doicard5s.com/assets/frontend_new_v1/images/typeCard/vnmb.png">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="11" />
                    </a>
                </li>
			</ul>
		</div-->
		<div id="div_type" class="form-group">
			<label class="control-label" for="email_login"></label>
			<input type="hidden" id="txtType" name="txtType" />
			<ul class="payment">
				<li>
                    <a title="Thẻ Vietel" class="hlk_selectCard" href="javascript:;">
						<img src="<?=$_config['page']['fullurl']?>/images/viettel.jpg">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="1" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Mobifone" class="hlk_selectCard" href="javascript:;">
						<img src="<?=$_config['page']['fullurl']?>/images/mobi.jpg">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="2" />
                    </a>
                </li>
				<li>
                    <a title="Thẻ Vinaphone" class="hlk_selectCard" href="javascript:;">
						<img src="<?=$_config['page']['fullurl']?>/images/vina.jpg">
						<input type="radio" name="rdoCardType" class="ratio_deposite" value="3" />
                    </a>
                </li>
			</ul>
		</div>			
		
		
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
		<div id="div_money" class="form-group">
			<label class="control-label" for="email_login">Mệnh giá:</label>
			<select class="form-control" name="txtAmount">
			<option value="0">-- Chọn đúng mệnh giá , sai mất thẻ --</option>
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
		</div>

		<div id="div_newpassword" class="form-group">
			<label class="control-label" for="email_login">Số Serial:</label>
			<input type="text" id="txtSerial" name="txtSerial" autocomplete="off" class="form-control">
		</div>
		<div id="div_repassword" class="form-group">
			<label class="control-label" for="email_login">Mã thẻ:</label>
			<input type="text" id="txtPasscard" name="txtPasscard" autocomplete="off" class="form-control">
		</div>
		<div class="form-group">
			<label class="control-label" for="captcha_login">
				<a href="javascript:;" onclick="SnapeClass.resetNewCaptcha('captchaImage')"><img id="captchaImage" src="<?=$_config['page']['fullurl']?>/captcha.php" /></a>
			</label>
			
			<input type="text" id="txtCode" name="txtCode" autocomplete="off" class="form-control" placeholder="Nhập chuỗi phía trên">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary btn-block" value="Nạp thẻ">
		</div>
			<div>
		</div>
</form>
 </div></div>
    </div>			

   
    <div id="atm" class="container tab-pane fade"><br>
      <h3>Nạp ATM | MOMO</h3>
	  
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
	    <div id="momo" class="alert alert-warning" style="width:80%">

      <p>Chuyển khoản Momo tới SĐT : <b>0869 941 629  </b> hoặc <b>0333 969 553</b>
	  <br/>Kèm tin nhắn cú pháp : <b>Email đăng ký</b>
	  <br/>BQT sẽ duyệt thẻ sau 5 phút nhận được.
	  </div>
	  </p>
	   	<div id="momo" class="alert alert-danger" style="width:80%">
	   <p class="text-warning">Bạn nào chưa có tài khoản ví MOMO có thể nạp trực tiếp </br> tại cửa hàng Thế Giới Di Động hoặc FPT shop trên toàn quốc </p>
	   </div>
	  </div>
	  
	
	   <div id="quanap" style="width:100% !important;" class="container tab-pane fade"><br>
  <table class="table table-striped" style="width:100%">
							<thead>
			  <tr>
				<th>Mệnh Giá</th>
				<th> Coin Nhận (Gốc)</th>
				<th> Nạp ATM/MOMO <font color=red>( KM 100% )</font></th>
				
			  </tr>
			</thead>
			<tbody>
			
						<tr>
						<td><span class="label" style="background-color:green">10.000 VNĐ</span></td>
						<td><a class="btn btn-sm btn-success">10.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">20.000 Coin </td>						
						</tr>
							<tr>
						<td><span class="label" style="background-color:orange">20.000 VNĐ</span></td>
						<td><a class="btn btn-sm btn-success">20.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">40.000 Coin </td>					
						</tr>
						<tr>
						<td><span class="label" style="background-color:brown">30.000 VNĐ</span></th>
						<td><a class="btn btn-sm btn-success">30.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">60.000 Coin </td>					
						</tr>
						<tr>
						<td><span class="label" style="background-color:purple">50.000 VNĐ
						</span></td>
						<td><a class="btn btn-sm btn-success">50.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">100.000 Coin </td>				
						</td></tr>
<tr>
						<td><span class="label" style="background-color:blue">100.000 VNĐ
						</span></td>
						<td><a class="btn btn-sm btn-success">100.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">200.000 Coin </td>				
						</td></tr>						
<tr>
						<td><span class="label" style="background-color:pink">200.000 VNĐ
						</span></td>
						<td><a class="btn btn-sm btn-success">200.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">400.000 Coin </td>					
						</td></tr>	
<tr>
						<td><span class="label" style="background-color:#26a69a">300.000 VNĐ
						</span></td>
						<td><a class="btn btn-sm btn-success">300.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">600.000 Coin </td>				
						</td></tr>							
<tr>
						<td><span class="label" style="background-color:#a94442">500.000 VNĐ
						</span></td>
						<td><a class="btn btn-sm btn-success">500.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">1.000.000 Coin </td>				
						</td></tr>		
<tr>
						<td><span class="label" style="background-color:red">1.000.000 VNĐ
						</span></td>
						<td><a class="btn btn-sm btn-success">1.000.000 Coin</span></td>
						<td><a class="btn btn-sm btn-danger">2.000.000 Coin </td>				
						</td></tr>	
		
			</tbody>
							</table>
    
    </div>
    
	
	
	<div id="menu3" style="width:100% !important;" class="container tab-pane fade"><br>
     <table class="table table-striped" style="width:100%">
							<thead>
			  <tr>
				<th>STT</th>
				<th>SỐ SERIAL</th>
				<th>MÃ THẺ</th>				
				<th>LOẠI NẠP</th>
				<th>MỆNH GIÁ</th>						
				<th>TRẠNG THÁI</th>		
				<th>THỜI GIAN</th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$qcheck = sqlsrv_query($conn, "select * from Log_Card WHERE UserID = '$userid' order by id DESC", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
			
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
						<td>'.$r['Passcard'].'</td>						
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
