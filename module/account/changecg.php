<?php
if(!defined("SNAPE_VN")) die('No access');

?>
<script type="text/javascript">
    $(document).ready(function () {
		
		//SnapeClass.openModal("Cảnh báo", "<font color='red'><b>Tính năng này tạm dừng cho tới khi hệ thống gộp máy chủ thành công. Vui lòng quay lại sau.</b></font>", []);
		
		$("#txtServer").change(function() {
			var serverid = $("#txtServer").val();
			if(serverid != null && serverid != 0) {
				SnapeClass.loadPlayersList(serverid, "#txtcharacter");
			}
		});
		
    	$("#frmChangePassword").validate({
    		rules: {
    			'txtServer': {
    				required: true,
					number: true,
					min: 1
    			},
				'txtcharacter': {
    				required: true,
					number: true,
					min: 1
    			}
    		},
    		messages: {
				txtServer: {
					required: "Vui lòng chọn máy chủ.",
					number: "Máy chủ không hợp lệ!",
					min: "Vui lòng chọn máy chủ."
				},
				txtcharacter: {
					required: "Vui lòng chọn nhân vật.",
					number: "Nhân vật không hợp lệ!",
					min: "Vui lòng chọn nhân vật."
				}
			},
			submitHandler: function(form) {
				SnapeClass.disableSubmit();
				$.post(full_url + "/form/changecg.php", $("#frmChangePassword").serialize(), function(data) {
					if(data['type'] == 0) {
						SnapeClass.openModal("Thành công", "Đổi CoinGame vào web thành công. Bạn có thể sử dụng CG của bạn ngay bây giờ.", []);
						SnapeClass.clearAllInput();
					} else {
						SnapeClass.openModal("Lỗi đổi CoinGame", data['content'], []);
					}
					SnapeClass.resetCaptcha();
					SnapeClass.undisableSubmit();
				}, 'json');
				return false;
			}
    	});
	});
</script>
<form id="frmChangePassword" method="post">
	<div class="center-block" style="width:80%">
		<div class="form-group">
			<div id="msg_err_login" class="alert alert-danger">- Thoát khỏi game mới có thể đổi.<br/>- Tối thiểu mỗi lần đổi vào web là 5 CG.<br/>- CoinGame là vật phẩm đặc biệt rớt ra từ tự do và phó bản.</div>
		</div>
		<div id="div_password" class="form-group">
			<label class="control-label" for="email_login">Máy chủ đổi:</label>
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
			<label class="control-label" for="email_login">Nhân vật đổi:</label>
			<select id="txtcharacter" name="txtcharacter" class="form-control">
				<option value="0">-- Chọn nhân vật --</option>
			</select>
		</div>
		
		<div class="form-group">
			<label class="control-label" for="captcha_login">Human Verify</label>
			<div style="text-align: center;"><div class="g-recaptcha" data-sitekey="<?=$_config['recaptcha']['sitekey']?>" style="display: inline;"></div></div>
			<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?=$_config['recaptcha']['language']?>"></script>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary btn-block" value="Đổi CoinGame">
		</div>
	</div>
</form>